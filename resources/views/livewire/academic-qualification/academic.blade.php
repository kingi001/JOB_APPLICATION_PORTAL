<div class="relative mb-6 w-full  mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center space-x-4 mb-1">
        <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
        <div>
            <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                {{ __('Welcome to Bandari Maritime Academy Job Application Portal') }}
            </flux:heading>
            <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                {{ __('Manage your profile, track applications, and update your account settings with ease.') }}
            </flux:subheading>
        </div>
    </div>
    <flux:separator variant="subtle" />
    {{-- Bread Crumbs --}}
    <div class="bg-gray-100 dark:bg-gray-800 py-0.5"> <!-- Reduced py-2 to py-1 -->
        <div class="mx-auto flex items-center text-xs text-gray-600 dark:text-gray-400">
            <!-- Reduced text-sm to text-xs -->
            <nav class="flex px-6 py-1 text-blue-700 border border-blue-200 rounded-lg bg-blue-50 dark:bg-blue-800 dark:border-blue-700"
                aria-label="Breadcrumb"> <!-- Reduced px-12 to px-6 -->
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <!-- Home Link -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <!-- Reduced text-sm to text-xs -->
                            <svg class="w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20"> <!-- Reduced w-4 h-4 to w-3 h-3 -->
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    @php
                        $segments = request()->segments();
                        $url = '';
                    @endphp
                    <!-- Dynamic Breadcrumbs -->
                    @foreach ($segments as $index => $segment)
                        @php
                            $url .= '/' . $segment;
                            $isLast = $loop->last;
                            $name = ucwords(str_replace('-', ' ', $segment));
                        @endphp
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-2 h-2 mx-1 text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <!-- Reduced w-3 h-1 to w-2 h-2 -->
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                @if (!$isLast)
                                    <a href="{{ url($url) }}"
                                        class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                        {{ $name }}
                                    </a>
                                @else
                                    <span class="ms-1 text-xs font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                        {{ $name }}
                                    </span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
    <livewire:academic-qualification.add-academic />
    <livewire:academic-qualification.edit-academic />
    <div class="py-1 mt-2 container  mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-lg bg-white ">
        <div class="p-2 bg-white border-b border-gray-200 rounded-lg">
            <!-- Section Title -->
            <h2 class="text-lg font-semibold text-indigo-700 flex items-center gap-1">
                <i class="fas fa-graduation-cap text-indigo-800 text-xl"></i>
                {{ __('Academic Qualifications') }}
            </h2>
        </div>
        <div class="px-4 py-3">
            <p class="text-sm text-gray-600 leading-relaxed">
                Please provide details of your academic background, starting with the most recent qualification. Ensure
                that all fields are completed accurately, as this information is critical for evaluating your
                educational profile.
            </p>
        </div>
        <!----TABLE---->
        <div>
            @if ($education->isEmpty())
                <div class="text-center py-6 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                    <div class="flex justify-center mb-3">
                        <i class="fas fa-graduation-cap text-5xl text-gray-400"></i>
                    </div>
                    <h3 class="text-base font-semibold text-gray-700">
                        <i class="fas fa-circle-info mr-1"></i> No Academic Records Found
                    </h3>
                    <p class="text-sm text-gray-500 mt-2">
                        You haven't added any academic qualifications yet. Click the
                        <span class="font-medium text-indigo-600">"Add Education"</span>
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
                                <th class="px-4 py-3 text-left">Institution</th>
                                <th class="px-4 py-3 text-left">Level of Study</th>
                                <th class="px-4 py-3 text-left">Field of Study</th>
                                <th class="px-4 py-3 text-left">Award</th>
                                <th class="px-4 py-3 text-left">Document</th>
                                <th class="px-4 py-3 text-left">Start Date</th>
                                <th class="px-4 py-3 text-left">End Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                            @foreach ($education as $edu)
                                <tr>
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        <input type="checkbox" wire:model="selectedIds" name="education_ids[]"
                                            value="{{ $edu->id }}"
                                            class="education-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                    </td>
                                    <td class="px-4 py-2">{{ $edu->institution }}</td>
                                    <td class="px-4 py-2">{{ $edu->level_of_study }}</td>
                                    <td class="px-4 py-2">{{ $edu->field_of_study }}</td>
                                    <td class="px-4 py-2">{{ $edu->award }}</td>
                                    <td class="px-4 py-2">
                                        @if ($edu->academic_document)
                                            <a href="{{ Storage::url($edu->academic_document) }}" target="_blank"
                                                class="text-indigo-600 hover:underline flex items-center space-x-1">
                                                <i class="fas fa-file-pdf text-red-500"></i><span>View</span>
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">None</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($edu->start_date)->format('M Y') }}</td>
                                    <td class="px-4 py-2">
                                        {{ $edu->end_date ? \Carbon\Carbon::parse($edu->end_date)->format('M Y') : 'Ongoing' }}
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
            <flux:modal.trigger name="add-academic">
                <button type="button"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-plus-circle text-sm"></i> {{ __('Add Education') }}
                </button>
            </flux:modal.trigger>
            <!-- Edit Button -->
            <button type="button" onclick="handleEditClick()"
                class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-edit text-sm"></i> {{ __('Update Education ') }}
            </button>
            <!-- Delete Button -->
            <button type="button"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete Education') }}
            </button>
        </div>
    </div>
</div>
<script>
    function getSelectedEducationId() {
        const selected = document.querySelectorAll('.education-checkbox:checked');
        if (selected.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Selection',
                text: 'Please select an education record.',
                confirmButtonColor: '#3085d6',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            return null;
        }
        if (selected.length > 1) {
            Swal.fire({
                icon: 'error',
                title: 'Multiple Selections',
                text: 'Please select only one academic education.',
                confirmButtonColor: '#d33',
            });
            return null;
        }
        return selected[0].value;
    }
    function handleEditClick() {
        const educationId = getSelectedEducationId();
        if (educationId) {
            @this.edit(educationId); // Calls Livewire method directly
        }
    }
</script>
