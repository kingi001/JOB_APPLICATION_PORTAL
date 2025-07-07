<div class="relative mb-2 w-full  mx-auto px-4 sm:px-6 lg:px-8">
    <livewire:header>

    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 3000)"
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 4000)"
            class="fixed top-6 right-6 w-full max-w-sm bg-white border-l-4 border-red-500 text-red-800 p-3 rounded-md shadow-md flex items-start space-x-3 z-50"
            role="alert">
            <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <div class="flex-1">
                <p class="font-semibold text-sm">Error</p>
                <p class="text-sm">{{ session('error') }}</p>
            </div>
            <button @click="show = false" class="text-red-400 hover:text-red-600 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
    <livewire:vacancy.create-vacancy />
    <livewire:vacancy.edit-vacancy />
    <div class="py-1 mt-2 container  mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-md bg-white ">
        <div class="p-2 bg-white border-b border-gray-200 rounded-lg">
            <!-- Page Heading -->
            <h3 class="text-lg font-bold text-indigo-800 flex items-center gap-3">
                <i class="fas fa-briefcase text-blue-600 text-lg"></i>
                {{ __('Job Vacancies') }}
            </h3>
            <p class="text-sm text-gray-500 mt-1">
                Explore, manage, and publish open positions. Easily track job applications, deadlines, and
                candidate status.
            </p>

            <flux:separator variant="subtle" />
            <!-- Search Section -->
            <div x-data="{ showForm: false }" class="w-full">
                <div class="flex justify-end mt-1">
                    <button @click="showForm = !showForm"
                        class="bg-gray-600 text-white text-sm py-1 px-4 rounded-md hover:bg-gray-700 transition duration-200">
                        <i class="fa fa-search mr-1"></i> Search
                    </button>
                </div>
                <div x-show="showForm" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="mx-auto max-w-3xl bg-white p-2 rounded-lg mt-1">

                    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-end">
                            <!-- Search Input -->
                            <div>
                                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Keyword
                                    Search</label>
                                <div class="relative">
                                    <!-- Icon -->
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z" />
                                        </svg>
                                    </span>
                                    <flux:input type="text" name="search" wire:model.live.debounce.200ms="search"
                                        id="search"
                                        placeholder="Enter keyword (refno, position,duties,responsibilities etc.)"
                                        class="w-full text-sm" />
                                </div>
                            </div>
                            <!-- Status Filter -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <flux:select wire:model.live.debounce.200ms="status" id="status"
                                    class="w-full text-sm border border-gray-300 rounded-xl shadow-sm bg-white py-1 px-4 focus:border-blue-500 focus:ring-2 focus:ring-blue-500">
                                    <option value="">-- Select Status --</option>
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                    <option value="deleted">Deleted</option>
                                </flux:select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Vacancies Table -->
            <div class="overflow-x-auto hidden md:block mt-2">
                <div class="relative w-full mt-4 mb-4 pl-2">
                    @if ($vacancies->isEmpty())
                        <div
                            class="text-center py-8 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                            <div class="flex justify-center mb-3">
                                <i class="fas fa-briefcase-slash text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-700">No Vacancies Available</h3>
                            <p class="text-sm text-gray-500 mt-2">
                                There are currently no open positions. Please check back later or follow us for updates.
                            </p>
                        </div>
                    @else
                        <table class="w-full border-collapse text-sm">
                            <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                                <tr>
                                    <th class="text-left px-4 py-3">#</th>
                                    <th class="text-left px-4 py-3">
                                        <input type="checkbox" class="form-checkbox rounded-sm h-3 w-3 text-indigo-600"
                                            id="selectAllCheckbox">
                                    </th>
                                    <th class="text-left px-4 py-3">Ref No</th>
                                    <th class="text-left px-4 py-3">Position</th>
                                    <th class="text-left px-4 py-3">Grade</th>
                                    <th class="text-left px-4 py-3">Requirements</th>
                                    <th class="text-left px-4 py-3">Duties</th>
                                    <th class="text-left px-4 py-3">Status</th>
                                    <th class="text-left px-4 py-3">T.O.Employment</th>
                                    <th class="text-left px-4 py-3">Applicants</th>
                                    <th class="text-left px-4 py-3">Posted</th>
                                    <th class="text-left px-4 py-3">Deadline</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700">
                                @foreach ($vacancies as $vacancy)
                                    <tr class="hover:bg-gray-50 transition duration-200">
                                        <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                            <input type="checkbox" wire:model="selectedIds" name="vacancy_ids[]"
                                                value="{{ $vacancy->id }}"
                                                class="vacancy-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                        </td>
                                        <td class="px-4 py-3 font-semibold text-blue-600 whitespace-nowrap">
                                            <a href="#">{{ $vacancy->ref_no }}</a>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">{{ $vacancy->position }}</td>
                                        <td class="px-4 py-3">{{ $vacancy->job_grade }}</td>
                                        <td class="px-4 py-3"> {{ Str::limit($vacancy->requirements, 100, '...') }}
                                        </td>
                                        <td class="px-4 py-3">{{ Str::limit($vacancy->duties, 100, '...') }}</td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @php
                                                $isOpen = strtolower($vacancy->status) === 'open';
                                            @endphp
                                            <span
                                                class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full border
                                                    {{ $isOpen ? 'text-green-800 hover:bg-green-400 bg-green-200 border-green-300' : 'text-red-800 bg-red-100 border-red-300' }}">
                                                <i class="fas {{ $isOpen ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                {{ ucfirst($vacancy->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            @php
                                                $colors = [
                                                    'Internship' => 'bg-blue-100 text-blue-800',
                                                    'Permanent' => 'bg-green-100 text-green-800',
                                                    'Contract' => 'bg-yellow-100 text-yellow-800',
                                                    'Attachment' => 'bg-purple-100 text-purple-800',
                                                ];
                                            @endphp

                                            <span
                                                class="px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$vacancy->terms_of_employment] ?? 'bg-gray-100 text-gray-800' }}">
                                                {{ $vacancy->terms_of_employment }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-center">
                                            <a href="#"
                                                class="inline-flex items-center px-2 py-1 text-sm font-medium text-blue-700 bg-blue-100 rounded-md hover:bg-blue-200 hover:text-blue-900 transition-all">
                                                <i class="fas fa-users mr-1 text-blue-500"></i>
                                                <span>{{ $vacancy->applications_count ?? 0 }}</span>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($vacancy->posted_date)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('d/m/Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $vacancies->links() }} <!-- This will render Laravel's default pagination links -->
                    </div>
                </div>
                <!-- Add Vacancy Button -->
                <div class="mt-4 flex justify-right border-t border-gray-200 pt-4">
                    <!-- Add Vacancy Button (Green) -->
                    <flux:modal.trigger name="create-vacancy" class="flex items-center gap-2">
                        <button type="button"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                            <i class="fas fa-plus-circle text-sm"></i> {{ __('Create Vacancy') }}
                        </button>
                    </flux:modal.trigger>
                    <!-- Update Vacancy Button (Blue) -->
                    <button type="button" onclick="handleEditClick()"
                        class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-edit text-sm"></i> {{ __('Update ') }}
                    </button>
                    <!-- Delete Vacancy Button -->
                    <button onclick="handleDeleteClick()"
                        class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm flex items-center gap-2 border border-red-700 shadow-lg hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-400">
                        <i class="fas fa-trash-alt text-xs"></i> {{ __('Delete') }}
                    </button>
                    <!-- Delete All Selected Button -->
                    <button onclick="handleBulkDelete()"
                        class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 text-sm flex items-center gap-2 border border-red-600 shadow-lg hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300">
                        <i class="fas fa-trash text-xs"></i> {{ __('Delete All Selected') }}
                    </button>
                    <button type="button" onclick="handleRestoreClick()"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-undo-alt text-sm"></i> {{ __('Restore') }}
                    </button>
                    <!-- Delete Permanently Button -->
                    <button type="button" onclick="handleForceDeleteClick()"
                        class="bg-gray-800 hover:bg-black text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-times-circle text-sm"></i> {{ __('Delete Permanently') }}
                    </button>
                </div>
            </div>
        </div>
        <flux:modal name="delete-vacancy" class="min-w-[22rem]">
            <div class="space-y-6">
                <!-- Heading with Icon -->
                <div class="flex items-start gap-3">
                    <svg class="w-8 h-8 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                    </svg>
                    <div>
                        <flux:heading size="lg" class="text-red-700">Delete vacancy?</flux:heading>
                        <flux:text class="mt-2 text-sm text-gray-600">
                            <p>Are you sure you want to delete vacancy <span
                                    class="font-semibold text-red-600">{{ $selectedRefNo }}</span>?</p>
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
                        <span wire:loading.remove wire:target="confirmDelete">Delete vacancy</span>
                        <span wire:loading wire:target="confirmDelete">Deleting...</span>
                    </flux:button>
                </div>
            </div>
        </flux:modal>
        <flux:modal name="confirm-bulk-delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <!-- Heading -->
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                    </svg>
                    <div>
                        <flux:heading size="lg" class="text-red-700">Confirm Bulk Delete</flux:heading>
                        <flux:text class="mt-2 text-sm text-gray-600">
                            <p>Are you sure you want to delete all selected vacancies?</p>
                            <p class="mt-1">This action <span class="font-semibold text-red-600">cannot be
                                    undone.</span></p>
                        </flux:text>
                    </div>
                </div>
                <!-- Actions -->
                <div class="flex justify-end gap-2">
                    <flux:modal.close>
                        <flux:button variant="ghost" wire:click="cancelBulkDelete"
                            class="hover:bg-gray-100 focus:ring-2 focus:ring-offset-1 focus:ring-gray-300">
                            Cancel
                        </flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="bulkDelete" wire:loading.attr="disabled"
                        wire:target="bulkDelete" class="focus:ring-2 focus:ring-offset-1 focus:ring-red-400">
                        <span wire:loading.remove wire:target="bulkDelete">Delete Selected</span>
                        <span wire:loading wire:target="bulkDelete">Deleting...</span>
                    </flux:button>
                </div>
            </div>
        </flux:modal>
        <script>
            function getSelectedVacancyId() {
                const selected = document.querySelectorAll('.vacancy-checkbox:checked');
                if (selected.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Selection',
                        text: 'Please select a vacancy.',
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
                        text: 'Please select only one vacancy.',
                        confirmButtonColor: '#d33',
                    });
                    return null;
                }
                return selected[0].value;
            }

            function handleEditClick() {
                const vacancyId = getSelectedVacancyId();
                if (vacancyId) {
                    @this.edit(vacancyId); // Calls Livewire method directly
                }
            }

            function handleDeleteClick() {
                const vacancyId = getSelectedVacancyId();
                if (vacancyId) {
                    @this.delete(vacancyId); // Calls Livewire method directly
                }
            }
            // Select All functionality
            document.getElementById('selectAllCheckbox').addEventListener('change', function () {
                document.querySelectorAll('.vacancy-checkbox').forEach(cb => cb.checked = this.checked);
            });

            document.querySelectorAll('.vacancy-checkbox').forEach(cb => {
                cb.addEventListener('change', function () {
                    const all = document.querySelectorAll('.vacancy-checkbox');
                    const allChecked = Array.from(all).every(cb => cb.checked);
                    document.getElementById('selectAllCheckbox').checked = allChecked;
                });
            });
        </script>
        <script>
            function handleBulkDelete() {
                const selected = document.querySelectorAll('.vacancy-checkbox:checked');
                if (selected.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Selection',
                        text: 'Please select at least one vacancy.',
                        confirmButtonColor: '#3085d6',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                    return;
                }
                const ids = Array.from(selected).map(cb => cb.value);
                @this.confirmBulkDeleteModal(); // Calls Livewire method directly
            }

            function handleRestoreClick() {
                const selected = document.querySelectorAll('.vacancy-checkbox:checked');
                if (selected.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Selection',
                        text: 'Please select at least one vacancy.',
                        confirmButtonColor: '#3085d6',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                    return;
                }
                const ids = Array.from(selected).map(cb => cb.value);
                @this.restore(ids); // Calls Livewire method directly
            }

            function handleForceDeleteClick() {
                const selected = document.querySelectorAll('.vacancy-checkbox:checked');
                if (selected.length === 0) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Selection',
                        text: 'Please select at least one vacancy.',
                        confirmButtonColor: '#3085d6',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    });
                    return;
                }

                const ids = Array.from(selected).map(cb => cb.value);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will permanently delete the selected vacancies!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete permanently!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.forceDelete(ids); // Livewire method call
                    }
                });
            }
        </script>
    </div>
</div>
