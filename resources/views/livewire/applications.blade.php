<div>
    <livewire:header />
    <div class="py-1 mt-2 container mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-lg bg-white">
        <div class="p-2 bg-white border-b border-gray-200 rounded-lg">
            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-indigo-700 flex items-center gap-1">
                <i class="fas fa-users text-indigo-800 text-xl"></i>
                {{ __('Applications Received') }}
            </h2>
        </div>

        <div class="px-4 py-3">
            <p class="text-sm text-gray-600 leading-relaxed">
                Below is a summary of applications submitted. <span class="font-medium text-indigo-600">This includes
                    applicant details and document submission status.</span>
            </p>
        </div>

        <!-- TABLE -->
        <div>
            @if (empty($applications))
                <div class="text-center py-6 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                    <div class="flex justify-center mb-3">
                        <i class="fas fa-folder-open text-5xl text-gray-400"></i>
                    </div>
                    <h3 class="text-base font-semibold text-gray-700">
                        <i class="fas fa-circle-info mr-1"></i> No Applications Found
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        There are no application records yet. Once candidates submit, their applications will appear here.
                    </p>
                </div>
            @else
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                        <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class="text-left px-4 py-3">#</th>
                                <th class="text-left px-4 py-3">
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                </th>
                                <th class="text-left px-4 py-3">Name</th>
                                <th class="text-left px-4 py-3">Email</th>
                                <th class="text-left px-4 py-3">National ID </th>
                                <th class="text-left px-4 py-3">County</th>
                                <th class="text-left px-4 py-3">Gender</th>
                                <th class="text-left px-4 py-3">PWD</th>
                                <th class="text-left px-4 py-3">Documents</th>
                                <th class="text-left px-4 py-3">Submitted</th>
                                <th class="text-left px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                            @foreach ($applications as $index => $app)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        <input type="checkbox" wire:model="selectedIds" name="education_ids[]"
                                            class="education-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                    </td>
                                    <td class="px-4 py-2">{{ $app['name'] }}</td>
                                    <td class="px-4 py-2">{{ $app['email'] }}</td>
                                    <td class="text-left px-4 py-3">{{ $app['nationalid'] }}</td>
                                    <td class="px-4 py-2">{{ $app['county'] }}</td>
                                    <td class="px-4 py-2">{{ $app['gender'] }}</td>
                                    <td class="px-4 py-2">
                                        <span
                                            class="text-xs px-2 py-1 rounded-full {{ $app['pwd'] ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                            {{ $app['pwd'] ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        @php
                                            $requiredDocs = ['cv.pdf', 'id.pdf', 'certificate.pdf'];
                                            $submittedDocs = $app['documents'];
                                            $hasAllDocuments = count(array_intersect($requiredDocs, $submittedDocs)) === count($requiredDocs);
                                        @endphp

                                        @if ($hasAllDocuments)
                                            <i class="fas fa-circle-check text-green-600 text-lg"
                                                title="All documents submitted"></i>
                                        @else
                                            <i class="fas fa-circle-xmark text-red-500 text-lg" title="Incomplete documents"></i>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2"><i class="fas fa-calendar-days text-indigo-500"></i>
                                        {{ \Carbon\Carbon::parse($app['date_submitted'])->format('d M Y') }}</td>
                                    <td class="px-4 py-2">
                                        <span
                                            class="text-xs px-2 py-1 rounded-full font-semibold
                                                                {{ $app['status'] === 'Complete' ? 'bg-green-200 text-green-900' : 'bg-yellow-200 text-yellow-900' }}">
                                            {{ $app['status'] }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>

        <!-- Action Buttons -->
        <div class="mt-4 flex  border-t border-gray-200 pt-2 gap-2">
            <!-- View / Inspect Application Button -->
            <button type="button" onclick="handleViewClick()"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-eye text-sm"></i> {{ __('View Application') }}
            </button>

            <!-- Bulk Status Update Button -->
            <button type="button" onclick="handleBulkStatusUpdate()"
                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-check-double text-sm"></i> {{ __('Update Status') }}
            </button>

            <!-- Download Documents Button -->
            <button type="button" onclick="handleDownloadDocuments()"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-download text-sm"></i> {{ __('Download Docs') }}
            </button>

            <!-- Export Report Button -->
            <button type="button" onclick="handleExportClick()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-file-export text-sm"></i> {{ __('Export Report') }}
            </button>

            <!-- Add Manual Entry Button -->
            <flux:modal.trigger name="add-manual-entry">
                <button type="button"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus-circle text-sm"></i> {{ __('Add Manual Entry') }}
                </button>
            </flux:modal.trigger>
        </div>
    </div>

</div>
