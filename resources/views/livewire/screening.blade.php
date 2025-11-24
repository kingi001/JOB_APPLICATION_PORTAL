<div>
    <livewire:header />
    <div x-data="{ tab: 'requirements' }" class="mt-4 px-4">
        <!-- Tabs Navigation -->
        <div class="flex border-b border-gray-300 mb-4 space-x-4">
            <button @click="tab = 'requirements'"
                :class="tab === 'requirements' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'"
                class="px-2 py-1 font-semibold text-sm focus:outline-none">
                <i class="fas fa-clipboard-check mr-1"></i> Minimum Job Requirements
            </button>
            <button @click="tab = 'analysis'"
                :class="tab === 'analysis' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'"
                class="px-2 py-1 font-semibold text-sm focus:outline-none">
                <i class="fas fa-chart-bar mr-1"></i> Analysis Results
            </button>
            <button @click="tab = 'bulk'"
                :class="tab === 'bulk' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'"
                class="px-2 py-1 font-semibold text-sm focus:outline-none">
                <i class="fas fa-tasks mr-1"></i> Bulk Actions
            </button>
            <button @click="tab = 'reports'"
                :class="tab === 'reports' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500'"
                class="px-2 py-1 font-semibold text-sm focus:outline-none">
                <i class="fas fa-file-alt mr-1"></i> Reports
            </button>
        </div>

        <!-- Tab Content -->
        <div x-show="tab === 'requirements'" x-cloak>
            {{-- @include('livewire.tabs.requirements') --}}
            <div class="bg-white p-6 border rounded-lg shadow-sm space-y-6">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-indigo-700 flex items-center gap-2">
                        <i class="fas fa-clipboard-check text-indigo-600"></i> Minimum Job Requirements
                    </h3>
                    <button wire:click="$toggle('editing')"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm rounded shadow flex items-center gap-1">
                        <i class="fas fa-edit text-sm"></i> {{ $editing ? 'Cancel Edit' : 'Edit Requirements' }}
                    </button>
                </div>

                <!-- Display Mode -->
                @if (!$editing)
                    <div class="text-sm text-gray-700 space-y-3">
                        <div>
                            <strong>Minimum Education:</strong> {{ $education ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>Minimum Experience:</strong> {{ $experience ?? 'Not set' }}
                        </div>
                        <div>
                            <strong>Required Documents:</strong>
                            @if (!empty($documents))
                                <ul class="list-disc pl-5">
                                    @foreach ($documents as $doc)
                                        <li>{{ $doc }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span class="italic text-gray-500">Not specified</span>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Edit Mode -->
                @if ($editing)
                    <form wire:submit.prevent="saveRequirements"
                        class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-700">

                        <!-- Minimum Education -->
                        <div>
                            <label class="font-medium text-gray-800">Minimum Education</label>
                            <flux:select id="education" wire:model.defer="education" class="mt-1 w-full">
                                <option value="">-- Select Education Level --</option>
                                <option value="PhD">PhD</option>
                                <option value="Master">Master</option>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Higher Diploma">Higher Diploma</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Certificate">Certificate</option>
                                <option value="Vocational Training">Vocational Training</option>
                                <option value="KCSE">KCSE</option>
                                <option value="KCPE">KCPE</option>
                            </flux:select>
                            @error('education') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Minimum Experience -->
                        <div>
                            <label class="font-medium text-gray-800">Minimum Experience (Years)</label>
                            <flux:input type="number" min="0" id="experience" wire:model.defer="experience"
                                class="mt-1 w-full" />
                            @error('experience') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Minimum Age -->
                        <div>
                            <label class="font-medium text-gray-800">Minimum Age</label>
                            <flux:input type="number" min="18" id="age" wire:model.defer="age" class="mt-1 w-full" />
                            @error('age') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Gender Preference -->
                        <div>
                            <label class="font-medium text-gray-800">Gender Preference</label>
                            <flux:select id="gender" wire:model.defer="gender" class="mt-1 w-full">
                                <option value="">-- Select Gender --</option>
                                <option value="Any">Any</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </flux:select>
                            @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Certifications -->
                        <div>
                            <label class="font-medium text-gray-800">Required Certifications</label>
                            <flux:input type="text" id="certifications" wire:model.defer="certifications"
                                placeholder="Comma separated" class="mt-1 w-full" />
                            @error('certifications') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Languages -->
                        <div>
                            <label class="font-medium text-gray-800">Languages Required</label>
                            <flux:input type="text" id="languages" wire:model.defer="languages"
                                placeholder="Comma separated" class="mt-1 w-full" />
                            @error('languages') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Required Documents -->
                        <div class="md:col-span-3">
                            <label class="font-medium text-gray-800">Required Documents</label>
                            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                                @foreach ($availableDocuments as $doc)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" wire:model.defer="documents" value="{{ $doc }}"
                                            class="form-checkbox text-indigo-600 rounded" />
                                        <span class="text-sm text-gray-700">{{ $doc }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @error('documents') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Other Skills -->
                        <div class="md:col-span-3">
                            <label class="font-medium text-gray-800">Other Skills / Competencies</label>
                            <flux:textarea wire:model.defer="skills" rows="3"
                                placeholder="Optional: List any other skills or competencies" class="mt-1 w-full" />
                            @error('skills') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-3 flex justify-end">
                            <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow-md flex items-center gap-2">
                                <i class="fas fa-magnifying-glass text-sm"></i> Screen Analysis
                            </button>

                        </div>
                    </form>

                @endif
            </div>


        </div>

        <div x-show="tab === 'analysis'" x-cloak>
            <div
                class="py-1 mt-2 container mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-lg bg-white">
                <div class="p-2 bg-white border-b border-gray-200 rounded-lg">
                    <h2 class="text-lg font-semibold text-indigo-700 flex items-center gap-1">
                        <i class="fas fa-filter text-indigo-800 text-xl"></i>
                        {{ __('Screening & Analysis') }}
                    </h2>
                </div>

                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                        <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                            <tr>
                                <th class=" text-left px-4 py-3">#</th>
                                <th class="text-left px-4 py-3">
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                </th>
                                <th class="px-4 py-3 text-left">Name</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">County</th>
                                <th class="px-4 py-3 text-left">Gender</th>
                                <th class="px-4 py-3 text-left">PWD</th>
                                <th class="px-4 py-3 text-left">Docs</th>
                                <th class="px-4 py-3 text-left">Criteria</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Submitted</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                            @foreach ($applications as $app)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        <input type="checkbox" wire:model="selectedIds" name="education_ids[]"
                                            class="education-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                    </td>
                                    <td class="px-4 py-2">{{ $app['name'] }}</td>
                                    <td class="px-4 py-2">{{ $app['email'] }}</td>
                                    <td class="px-4 py-2">{{ $app['county'] }}</td>
                                    <td class="px-4 py-2">{{ $app['gender'] }}</td>
                                    <td class="px-4 py-2">
                                        @if ($app['pwd'])
                                            <span class="text-green-600 font-semibold">Yes</span>
                                        @else
                                            <span class="text-gray-500">No</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        @if ($app['has_all_documents'])
                                            <i class="fas fa-circle-check text-green-600 text-lg"
                                                title="All docs submitted"></i>
                                        @else
                                            <i class="fas fa-circle-xmark text-red-500 text-lg" title="Missing documents"></i>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($app['meets_criteria'])
                                            <span class="text-green-700">✓ Meets</span>
                                        @else
                                            <span class="text-red-600">✗ Does not meet</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        @php
                                            $statusColor = match ($app['screening_status']) {
                                                'Qualified' => 'bg-green-100 text-green-800',
                                                'Incomplete' => 'bg-yellow-100 text-yellow-800',
                                                'Disqualified' => 'bg-red-100 text-red-800',
                                                default => 'bg-gray-100 text-gray-700'
                                            };
                                        @endphp
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $statusColor }}">
                                            {{ $app['screening_status'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ \Carbon\Carbon::parse($app['date_submitted'])->format('d M Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex border-t border-gray-200 pt-2 gap-1">
                    <button type="button" onclick="handleViewClick()"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-eye text-sm"></i> {{ __('Inspect') }}
                    </button>

                    <!-- Bulk Status Update Button -->
                    <button type="button" onclick="handleBulkStatusUpdate()"
                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-check-double text-sm"></i> {{ __('Update Status') }}
                    </button>



                    <!-- Export Report Button -->
                    <button type="button" onclick="handleExportClick()"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-file-export text-sm"></i> {{ __('Export Report') }}
                    </button>


                </div>
            </div>
        </div>

        <div x-show="tab === 'bulk'" x-cloak>
            {{-- @include('livewire.tabs.bulk-actions') --}}
            <!-- Bulk Analysis Actions -->
            <div class="bg-white p-4 border rounded-lg shadow-sm space-y-4 mt-6">
                <h3 class="text-indigo-700 text-lg font-semibold flex items-center gap-2">
                    <i class="fas fa-bolt text-indigo-600"></i> Bulk Analysis Actions
                </h3>

                <p class="text-sm text-gray-600">
                    Perform analysis on multiple applications simultaneously.
                    This will analyze all applications that haven't been processed yet against the current job
                    requirements.
                </p>

                <div class="flex flex-wrap gap-3 mt-3">
                    <!-- Analyze All Pending -->
                    <button wire:click="analyzeAllPending"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 text-sm rounded shadow-md flex items-center gap-2 transition-all">
                        <i class="fas fa-magic"></i> Analyze All Pending
                    </button>

                    <!-- Re-analyze Selected -->
                    <button wire:click="reanalyzeSelected"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 text-sm rounded shadow-md flex items-center gap-2 transition-all">
                        <i class="fas fa-sync-alt"></i> Re-analyze Selected
                    </button>

                    <!-- Export Analysis Report -->
                    <button wire:click="exportAnalysisReport"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 text-sm rounded shadow-md flex items-center gap-2 transition-all">
                        <i class="fas fa-file-export"></i> Export Analysis Report
                    </button>
                </div>
            </div>

        </div>
        <div x-show="tab === 'reports'" x-cloak>
            {{-- @include(view: 'livewire.tabs.reports') --}}
            <div class="bg-white p-6 border rounded-lg shadow-sm space-y-6">

                <!-- Title -->
                <div>
                    <h3 class="text-xl font-semibold text-indigo-700 flex items-center gap-2">
                        <i class="fas fa-file-alt text-indigo-600"></i> HR Analysis Reports Generator
                    </h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Generate comprehensive reports for HR analysis and decision making
                    </p>
                </div>

                <!-- Bulk Actions -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" wire:model="selectAll" class="form-checkbox text-indigo-600">
                        <span class="text-sm text-gray-700 font-medium">Select All</span>
                    </div>
                    <button wire:click="generateSelectedReports"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 text-sm rounded shadow-md flex items-center gap-2">
                        <i class="fas fa-cogs"></i> Generate Selected Reports ({{ count($selectedReports) }})
                    </button>
                </div>

                <!-- Reports Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($reports as $report)
                        <div class="border rounded-lg p-6 shadow-sm hover:shadow-md transition">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="text-md font-semibold text-gray-800 flex items-center gap-1">
                                        <input type="checkbox" wire:model="selectedReports" value="{{ $report['key'] }}"
                                            class="form-checkbox text-indigo-600 mr-2">
                                        {{ $report['title'] }}
                                    </h4>
                                    <p class="text-xs text-gray-500">{{ $report['records'] }} records</p>
                                    <p class="text-sm text-gray-600 mt-2">{{ $report['description'] }}</p>
                                    <p class="text-xs text-gray-400 mt-1">Last updated: {{ $report['updated'] }}</p>
                                </div>
                                <button wire:click="download('{{ $report['key'] }}')"
                                    class="text-indigo-600 hover:underline text-sm font-medium">
                                    Download
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Export Options -->
                <div class="mt-6">
                    <h4 class="text-md font-semibold text-indigo-700 flex items-center gap-2">
                        <i class="fas fa-file-export text-indigo-600"></i> Export Options
                    </h4>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-gray-50 border rounded-lg p-3">
                            <h5 class="text-sm font-semibold text-gray-700">Excel (.xlsx)</h5>
                            <p class="text-sm text-gray-500">Structured data with filtering and sorting capabilities</p>
                        </div>
                        <div class="bg-gray-50 border rounded-lg p-3">
                            <h5 class="text-sm font-semibold text-gray-700">PDF Report</h5>
                            <p class="text-sm text-gray-500">Formatted report suitable for printing and sharing</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



</div>
