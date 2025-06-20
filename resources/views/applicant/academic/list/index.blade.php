<x-layouts.app>
    <div class="relative mb-1 w-full  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 mb-1">
            <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
            <div>
                <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                    {{ __('Welcome to Bandari Maritime Academy E-Recruitment Portal') }}
                </flux:heading>
                <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                    {{ __('Manage your profile,education,employment , submit ,track applications, and update your account settings with ease.') }}
                </flux:subheading>
            </div>
        </div>
        <flux:separator variant="subtle" />
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                toast: true, // Makes it a toast
                position: 'top-end', // Position at top-end
                icon: 'success', // Type of message
                title: '{{ session('success') }}', // Message
                showConfirmButton: false, // Hides the confirm button
                timer: 1500, // Duration for which the toast will stay visible (1500ms = 1.5 seconds)
                timerProgressBar: true, // Shows a progress bar
            });
        </script>
    @endif
    <div class="py-2 w-5xl mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-lg bg-white">
        <p class="mt-1 text-sm text-red-600">
            {{ __('Please provide your Educational information with the most recent.') }}
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <flux:input size=sm label="Institution" name="institution" value="{{ old('institution') }}"
                placeholder="e.g. University of Nairobi" required autofocus />

            <flux:select size=sm label="Qualification" name="level_of_study" required>
                <option value="">Select Level</option>
                @foreach (['KCPE', 'KCSE', 'Vocational Training', 'Certificate', 'Diploma', 'Higher Diploma', 'Bachelor', 'Master', 'PhD'] as $level)
                    <option value="{{ $level }}" @selected(old('level_of_study') === $level)>{{ $level }}</option>
                @endforeach
            </flux:select>

            <flux:input label="Course" name="field_of_study" value="{{ old('field_of_study') }}"
                placeholder="e.g. Computer Science" required />

            <flux:select size=sm label="Award" name="award" required>
                <option value="">Select Award</option>
                @foreach (['First Class', 'Second Class hnr(Upper)', 'Second Class hnr(Lower)', 'Pass', 'Distinction', 'Credit'] as $award)
                    <option value="{{ $award }}" @selected(old('award') === $award)>{{ $award }}</option>
                @endforeach
            </flux:select>

            <flux:input size=sm label="Start Date" name="start_date" type="date" value="{{ old('start_date') }}"
                required />
            <flux:input size=sm label="End Date" name="end_date" type="date" value="{{ old('end_date') }}"
                required />
        </div>

        <div class="sm:col-span-2" x-data="{ fileName: '', fileSize: 0, progress: 0, fileInput: null, filePreview: '', isImage: false }">
            <label for="academic_document" class="block text-sm font-medium text-gray-700">
                {{ __('Upload Certificate (PDF or Image)') }}
            </label>
            <div class="border border-gray-300 p-3 rounded-lg shadow-sm bg-white">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-file-upload text-blue-600"></i>

                    <!-- Hidden Input -->
                    <input id="academic_document" name="academic_document" type="file" accept=".pdf,.jpg,.png"
                        class="hidden" x-ref="fileInput"
                        @change="
                        let file = $event.target.files[0];
                        if (file) {
                            fileName = file.name;
                            fileSize = file.size;
                            progress = 100;

                            if (file.size > 2097152) {
                                fileName = 'File too large!';
                                progress = 0;
                            } else {
                                let reader = new FileReader();
                                reader.onload = e => {
                                    filePreview = e.target.result;
                                    isImage = file.type.startsWith('image/');
                                };
                                reader.readAsDataURL(file);
                            }
                        } else {
                            fileName = '';
                            fileSize = 0;
                            progress = 0;
                            filePreview = '';
                            isImage = false;
                        }
                    ">

                    <!-- Upload Button -->
                    <label for="academic_document"
                        class="cursor-pointer bg-blue-600 text-white px-3 py-2 text-sm rounded-md hover:bg-blue-700">
                        Choose File
                    </label>

                    <!-- File Name Display -->
                    <span x-text="fileName" class="text-sm text-gray-700"></span>

                    <!-- Clear/Cancel Button -->
                    <button type="button" x-show="fileName"
                        @click="
                        fileName = '';
                        fileSize = 0;
                        progress = 0;
                        filePreview = '';
                        isImage = false;
                        $refs.fileInput.value = ''
                        "
                        class="ml-2 bg-red-600 text-white px-2 py-1 text-xs rounded-md hover:bg-red-700">
                        Clear
                    </button>
                </div>

                <!-- File Size Warning -->
                <p x-show="fileSize > 2097152" class="text-red-500 text-xs mt-2">
                    File is too large. Max size is 2MB.
                </p>

                <!-- File Preview for Images -->
                <div x-show="isImage" class="mt-3">
                    <p class="text-xs text-gray-500">Preview:</p>
                    <img :src="filePreview" alt="Preview" class="w-40 h-auto rounded-lg shadow">
                </div>

                <!-- Progress Bar -->
                <div x-show="fileName && fileSize <= 2097152" class="mt-3">
                    <p class="text-xs text-gray-500">Uploaded Successfully...</p>
                    <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-2 transition-all duration-300" :style="'width:' + progress + '%'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkbox for false information warning -->
        <div class="mt-4">
            <label class="inline-flex items-center text-sm">
                <input type="checkbox" name="disqualification_warning" required
                    class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded">
                <span class="ml-2 text-gray-700">I understand that providing false information may lead to
                    disqualification
                    and/or legal action.</span>
            </label>
        </div>
        <div class="flex justify-end">
            <flux:button type="submit" size="sm" variant="primary">
                <i class="fas fa-save mr-1"></i> Save Academic Qualification
            </flux:button>
        </div>
    </div>


    <div class="py-6 container   mx-auto sm:px-6 lg:px-8">
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">

            <!-- Section Title -->
            <h2 class="text-base font-medium text-indigo-700 flex items-center gap-1">
                <i class="fas fa-graduation-cap text-blue-500 text-xl"></i>
                {{ __('Academic Qualifications') }}
            </h2>
            {{-- <p class="mt-1 text-sm text-red-600">
                {{ __('Please provide your Educational information with the most recent.') }}
            </p> --}}
            <!-- Desktop Table View -->
            <div class="overflow-auto rounded-lg shadow-md mt-4 hidden md:block">
                <table class="w-full border-collapse text-sm">
                    <thead class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                        <tr>
                            <th class="p-3 text-center"><i class="fas fa-hashtag"></i></th>
                            <th class="p-3 text-left">
                                <input type="checkbox" class="form-checkbox rounded-sm h-3 w-3 text-indigo-600"
                                    id="selectAllCheckbox">
                            </th>
                            <th class="p-3 text-left">Institution</th>
                            <th class="p-3 text-left">Qualification</th>
                            <th class="p-3 text-left">Course</th>
                            <th class="p-3 text-left">Award</th>
                            <th class="p-3 text-left">Duration</th>
                            <th class="p-3 text-left">Certificate</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($educations as $education)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-3 text-center text-gray-800">{{ $loop->iteration }}</td>
                                <td class="p-3 text-gray-800 whitespace-nowrap">
                                    <input type="checkbox" name="education_ids[]" value="{{ $education->id }}"
                                        class="vacancy-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-school text-gray-500 mr-1"></i>{{ $education->institution }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    <i
                                        class="fas fa-graduation-cap text-gray-500 mr-1"></i>{{ $education->level_of_study }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    <i class="fas fa-book text-gray-500 mr-1"></i>{{ $education->field_of_study }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">{{ $education->award }}</td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('m/Y') }} -
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('m/Y') }}
                                </td>
                                <td class="p-3 text-gray-700 whitespace-nowrap">
                                    @if ($education->academic_document)
                                        <a href="{{ asset('storage/' . $education->academic_document) }}"
                                            target="_blank"
                                            class="text-blue-500 hover:text-blue-700 flex items-center gap-1">
                                            <i class="fas fa-file-pdf"></i> View
                                        </a>
                                    @else
                                        <span class="text-gray-400">No file</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="p-4 text-center">
                                    <div
                                        class="bg-blue-100 border border-blue-300 text-blue-700 px-4 py-8 rounded-lg shadow-sm">
                                        <h4 class="text-md font-semibold flex items-center justify-center gap-2">
                                            <i class="fas fa-info-circle"></i>
                                            <span>Informations</span>
                                        </h4>
                                        <p class="mt-1 text-sm">No Academic Qualification Details Found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile View (Stacked Cards) -->
            <div class="mt-4 space-y-4 md:hidden">
                @forelse ($educations as $education)
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between">
                            <h3 class="text-md font-semibold text-gray-900 flex items-center gap-2">
                                <i class="fas fa-school text-blue-500"></i> {{ $education->institution }}
                            </h3>
                            @if ($education->academic_document)
                                <a href="{{ asset('storage/' . $education->academic_document) }}" target="_blank"
                                    class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out text-sm">
                                    <i class="fas fa-file-pdf"></i> View
                                </a>
                            @endif
                        </div>

                        <div class="mt-2 text-sm text-gray-600 space-y-1">
                            <p class="flex items-center gap-2">
                                <i class="fas fa-graduation-cap text-gray-500"></i> <span
                                    class="font-medium">{{ $education->level_of_study }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-book text-gray-500"></i>
                                <span>{{ $education->field_of_study }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-award text-gray-500"></i> <span>{{ $education->award }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-gray-500"></i>
                                <span>
                                    {{ \Carbon\Carbon::parse($education->start_date)->format('Y') }} -
                                    {{ \Carbon\Carbon::parse($education->end_date)->format('Y') }}
                                </span>
                            </p>
                        </div>
                        <div class="flex justify-between items-center mt-3 space-x-4">
                            <button
                                @click="$dispatch('open-modal', { modal: 'edit-education', education: {{ json_encode($education) }} })"
                                class="text-blue-500 hover:text-blue-700 flex items-center gap-1 transition-all duration-200 ease-in-out">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <form id="delete-form-{{ $education->id }}"
                                action="{{ route('education.destroy', $education->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-500 hover:text-red-700 flex items-center gap-1"
                                    onclick="confirmDelete({{ $education->id }})">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div
                        class="bg-blue-100 border border-blue-300 text-blue-700 px-6 py-12 min-h-[180px] rounded-2xl shadow-lg flex flex-col justify-center items-center text-center">
                        <h4 class="text-lg font-semibold flex items-center gap-2">
                            <i class="fas fa-info-circle text-blue-600 text-xl"></i>
                            <span>Information</span>
                        </h4>
                        <p class="mt-4 text-base text-blue-800">
                            {{ __('No Academic Qualification Details. Click Add') }}
                        </p>
                    </div>
                @endforelse
            </div>
            <div class="mt-4 flex justify-right border-t border-gray-200 pt-4">
                <!-- Add Vacancy Button (Green) -->
                <flux:modal.trigger name="add-education">
                    <button type="button"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-plus-circle text-sm"></i> {{ __('Add New') }}
                    </button>
                </flux:modal.trigger>
                <!-- Edit Button -->
                <button type="button"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-edit text-sm"></i> {{ __('Update/Edit') }}
                </button>
                <!-- Delete Button -->
                <button type="button"
                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete') }}
                </button>

            </div>
            <!-- Add Education Button -->
            @include('applicant.academic.modals.add-education')
            @include('applicant.academic.modals.edit-education')

        </div>
    </div>

</x-layouts.app>
