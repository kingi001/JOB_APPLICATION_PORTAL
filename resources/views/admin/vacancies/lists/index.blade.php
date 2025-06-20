<x-layouts.app :title="__('Vacancies')">
    <div class="relative mb-1 w-full  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 mb-1">
            <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
            <div>
                <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                    {{ __('Welcome to Bandari Maritime Academy E-Recruitment Portal') }}
                </flux:heading>
                <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                    {{ __('Manage your profile, track applications, and update your account settings with ease.') }}
                </flux:subheading>
            </div>
        </div>
        <flux:separator variant="subtle" />
    </div>
    <div class="py-1  mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
            <!-- Page Heading -->
            <div class="flex items-center justify-between mb-1 pb-1 border-b border-gray-200">
                <h3 class="text-base font-semibold text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-briefcase text-blue-600 text-xl"></i>
                    {{ __('Vacancies') }}
                    <p class="text-sm text-gray-300">....Manage job vacancies</p>
                </h3>
            </div>
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

                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <form method="GET" action="{{ route('vacancies.index') }}" id="search-form"
                            class="space-y-2 space-x-1 text-sm">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 items-center">

                                <div>

                                    <flux:input icon="magnifying-glass" size="sm" id="keyword" name="keyword"
                                        type="text" label="Keyword Search" value="{{ request()->get('keyword') }}"
                                        placeholder="Enter keyword (e.g., position, duties, etc.)" />
                                </div>



                                <div>
                                    <flux:input size="sm" id="ref_no" name="ref_no" type="text"
                                        label="RefNo" value="{{ request()->get('ref_no') }}"
                                        placeholder="Enter RefNo" />

                                </div>

                                <div>
                                    <flux:input size="sm" id="position" name="position" type="text"
                                        label="Position" value="{{ request()->get('position') }}"
                                        placeholder="Enter position" />

                                </div>
                                <div>
                                    <flux:select id="status" size="sm" name="status" label="Status"
                                        class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="">--Select Status--</option>
                                        <option value="open"
                                            {{ request()->get('status') == 'open' ? 'selected' : '' }}>
                                            Open</option>
                                        <option value="closed"
                                            {{ request()->get('status') == 'closed' ? 'selected' : '' }}>
                                            Closed</option>
                                    </flux:select>
                                </div>

                            </div>
                            <div class="flex justify-end mt-4 space-x-4">
                                <button type="button" @click="showForm = false"
                                    class="bg-gray-400 text-white py-1 px-4 rounded-md text-sm hover:bg-gray-500 transition duration-200 flex items-center">
                                    <i class="fa fa-repeat text-sm mr-1"></i><span>Reset</span>
                                </button>
                                <button type="submit"
                                    class="bg-blue-600 text-white py-1 px-4 rounded-md text-sm hover:bg-blue-700 transition duration-200 flex items-center">
                                    <i class="fa fa-search text-sm mr-1"></i><span>Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Vacancies Table -->
            <div class="overflow-x-auto hidden md:block mt-4">
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
                                <th class="text-left px-4 py-3">Job Grade</th>
                                <th class="text-left px-4 py-3">Requirements</th>
                                <th class="text-left px-4 py-3">Duties</th>
                                <th class="text-left px-4 py-3">Status</th>
                                <th class="text-left px-4 py-3">Applicants</th>
                                <th class="text-left px-4 py-3">Posted</th>
                                <th class="text-left px-4 py-3">Deadline</th>

                                {{-- <th class="text-left px-4 py-3">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700">
                            @foreach ($vacancies as $vacancy)
                                <tr class="hover:bg-gray-50 transition duration-200">
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                                        <input type="checkbox" name="vacancy_ids[]" value="{{ $vacancy->id }}"
                                            class="vacancy-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                    </td>

                                    <td class="px-4 py-3 font-semibold text-blue-600 whitespace-nowrap">
                                        <a
                                            href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->ref_no }}</a>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">{{ $vacancy->position }}</td>
                                    <td class="px-4 py-3">{{ $vacancy->job_grade }}</td>
                                    <td class="px-4 py-3"> {{ Str::limit($vacancy->requirements, 40, '...') }}
                                    </td>
                                    <td class="px-4 py-3">{{ Str::limit($vacancy->duties, 40, '...') }}</td>
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
                                    <td class="px-4 py-3 whitespace-nowrap text-center">
                                        <a href="{{ route('vacancies.index', $vacancy->id) }}"
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
                <flux:modal.trigger name="add-vacancy">
                    <button type="button"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-plus-circle text-sm"></i> {{ __('Add New') }}
                    </button>
                </flux:modal.trigger>

                <!-- Update Vacancy Button (Blue) -->
                <button type="button" onclick="handleEditClick()"
                    class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-edit text-sm"></i> {{ __('Update') }}
                </button>
                <!-- Delete Vacancy Button -->
                <button onclick="handleDeleteClick()"
                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete') }}
                </button>

                <button type="button" onclick="handleRestoreClick()"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-undo-alt text-sm"></i> {{ __('Restore') }}
                </button>
                <!-- Delete Permanently Button -->
                <button type="button" onclick="handleForceDeleteClick()"
                    class="bg-gray-800 hover:bg-black text-white px-1 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-times-circle text-sm"></i> {{ __('Delete Permanently') }}
                </button>
            </div>
        </div>

        @include('admin.vacancies.modals.add-vacancy')
        @include('admin.vacancies.modals.update-vacancy')
    </div>

    <script>
        async function handleDeleteClick() {
            const selectedCheckboxes = document.querySelectorAll('.vacancy-checkbox:checked');

            if (selectedCheckboxes.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Selection',
                    text: 'Please select a vacancy to delete.',
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

            if (selectedCheckboxes.length > 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Multiple Selections',
                    text: 'Please select only one vacancy to delete.',
                    confirmButtonColor: '#d33',
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    }
                });
                return;
            }
        }
    </script>
    <script>
        document.getElementById('selectAllCheckbox').addEventListener('change', function() {
            const all = document.querySelectorAll('.vacancy-checkbox');
            all.forEach(cb => cb.checked = this.checked);
        });

        document.querySelectorAll('.vacancy-checkbox').forEach(cb => {
            cb.addEventListener('change', function() {
                const all = document.querySelectorAll('.vacancy-checkbox');
                const allChecked = Array.from(all).every(checkbox => checkbox.checked);
                document.getElementById('selectAllCheckbox').checked = allChecked;
            });
        });
    </script>
</x-layouts.app>
