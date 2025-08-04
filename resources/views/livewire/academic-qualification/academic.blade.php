<div>
    <livewire:header>
    <livewire:academic-qualification.add-academic />
    <livewire:academic-qualification.edit-academic />
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
                Please provide details of your academic background, <span class="font-medium text-indigo-600">starting with the most recent qualification.</span> Ensure
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
                                <th class="px-4 py-3 text-left">Qualification Attained</th>
                                <th class="px-4 py-3 text-left">Course</th>
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
                                    <td class="px-4 py-2">{{ $edu->qualification }}</td>
                                    <td class="px-4 py-2">{{ $edu->course }}</td>
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
            <button type="button" onclick="handleDeleteClick()"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete Education') }}
            </button>
        </div>
    </div>
    <div>
        <flux:modal name="delete-education" class="min-w-[22rem]">
            <div class="space-y-6">
                <!-- Heading with Icon -->
                <div class="flex items-start gap-3">
                    <svg class="w-10 h-10 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                    </svg>
                    <div>
                        <flux:heading size="lg" class="text-red-700">Delete Academic Qualification?</flux:heading>
                        <flux:text class="mt-2 text-sm text-gray-600">
                            <p>Are you sure you want to delete the academic qualification for
                                <span class="font-semibold text-red-600">{{ $selectedInstitution}}</span>
                            </p>
                            <p class="mt-1">This action <span class="font-semibold text-red-600">cannot be
                                    undone.</span>
                            </p>
                        </flux:text>
                    </div>
                </div>
                <!-- Actions -->
                <div class="flex justify-end gap-2">
                    <flux:modal.close>
                        <flux:button variant="ghost" wire:click="cancelDelete()"
                            class="hover:bg-gray-100 focus:ring-2 focus:ring-offset-1 focus:ring-gray-300">
                            Cancel
                        </flux:button>
                    </flux:modal.close>
                    <flux:button type="submit" variant="danger" wire:click="confirmDelete()"
                        wire:loading.attr="disabled" wire:target="confirmDelete"
                        class="focus:ring-2 focus:ring-offset-1 focus:ring-red-400">
                        <span wire:loading.remove wire:target="confirmDelete">Delete Qualification</span>
                        <span wire:loading wire:target="confirmDelete">Deleting...</span>
                    </flux:button>
                </div>
            </div>
        </flux:modal>
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
    function handleDeleteClick() {
        const educationId = getSelectedEducationId();
        if (educationId) {
            @this.delete(educationId); // Calls Livewire method directly
        }
    }
</script>
