<div>
    <livewire:professionanl-qualification.addprofessional>
        <livewire:header>
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-500"
                    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="fixed top-6 right-6 w-full max-w-sm bg-white border-l-4 border-green-500 text-green-800 p-3 rounded-lg shadow-lg flex items-start space-x-3 z-50"
                    role="alert">
                    <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <div class="flex-1">
                        <p class="font-semibold text-sm">Success</p>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-400 hover:text-green-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif
            <div
                class="py-1 mt-2 container  mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-lg bg-white ">
                <div class="p-2 bg-white border-b border-gray-200 rounded-lg">
                    <!-- Section Title -->
                    <h2 class="text-lg font-semibold text-indigo-700 flex items-center gap-1">
                        <i class="fas fa-certificate text-indigo-800 text-xl"></i>
                        {{ __('Professional Qualification') }}
                    </h2>
                </div>
                <div class="px-4 py-3">
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Please provide details of your academic background, <span
                            class="font-medium text-indigo-600">starting with the most recent professional
                            qualification.</span> Ensure
                        that all fields are completed accurately, as this information is critical for evaluating your
                        educational profile.
                    </p>
                </div>
                <!----TABLE---->
                <div>
                    @if ($professional->isEmpty())
                        <div
                            class="text-center py-6 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                            <div class="flex justify-center mb-3">
                                <i class="fas fa-certificate text-5xl text-gray-400"></i>
                            </div>
                            <h3 class="text-base font-semibold text-gray-700">
                                <i class="fas fa-circle-info mr-1"></i> No Professional Qualification Records Found
                            </h3>
                            <p class="text-sm text-gray-500 mt-2">
                                You haven't added any academic qualifications yet. Click the
                                <span class="font-medium text-indigo-600">"Add Professional Qualification"</span>
                                button above to begin entering your educational background.
                            </p>
                        </div>
                    @else
                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                                <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                                    <tr>
                                        <th class=" text-left px-4 py-3">#</th>
                                        <th class="text-left px-4 py-3">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>

                                        </th>
                                        <th class="px-4 py-3 text-left">Qualification</th>
                                        <th class="px-4 py-3 text-left">Certifying Body</th>
                                        <th class="px-4 py-3 text-left">Certificate Number</th>
                                        <th class="px-4 py-3 text-left">Award</th>
                                        <th class="px-4 py-3 text-left">Date Awarded</th>
                                        <th class="px-4 py-3 text-left">Valid Until</th>
                                        <th class="px-4 py-3 text-left">Qualification Document</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                                    @foreach ($professional as $profession)
                                        <tr>
                                            <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                                <input type="checkbox" wire:model="selectedIds" name="education_ids[]"
                                                    value="{{ $profession->id }}"
                                                    class="education-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                            </td>
                                            <td class="px-4 py-2">{{ $profession->qualification_name }}</td>
                                            <td class="px-4 py-2">{{ $profession->certifying_body }}</td>
                                            <td class="px-4 py-2">{{ $profession->certificate_number }}</td>
                                            <td class="px-4 py-2">{{ $profession->award }}</td>
                                            <td class="px-4 py-2">
                                                {{ \Carbon\Carbon::parse($profession->date_awarded)->toFormattedDateString() }}</td>
                                            <td class="px-4 py-2">
                                                {{ $profession->valid_until ? \Carbon\Carbon::parse($profession->valid_until)->toFormattedDateString() : 'Indefinite' }}
                                            </td>
                                            <td class="px-4 py-2">
                                                @if ($profession->qualification_document)
                                                    <a href="{{ Storage::url($profession->qualification_document) }}"
                                                        target="_blank"
                                                        class="text-indigo-600 hover:underline flex items-center space-x-1">
                                                        <i class="fas fa-file-pdf text-red-500"></i><span>View</span>
                                                    </a>
                                                @else
                                                    <span class="text-gray-400 italic">None</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <!-- Action Buttons -->
                <div class="mt-4 flex justify-right border-t border-gray-200 pt-2 ">
                    <!-- Add Vacancy Button (Green) -->
                    <flux:modal.trigger name="add-qualification">
                        <button type="button"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                            <i class="fas fa-plus-circle text-sm"></i> {{ __('Add Professional Qualification') }}
                        </button>
                    </flux:modal.trigger>
                    <!-- Edit Button -->
                    <button type="button" onclick="handleEditClick()"
                        class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-edit text-sm"></i> {{ __('Update Qualification ') }}
                    </button>
                    <!-- Delete Button -->
                    <button type="button" onclick="handleDeleteClick()"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete Qualification') }}
                    </button>
                </div>
            </div>
</div>
