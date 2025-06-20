<flux:modal name="edit-education" class="max-w-4xl" variant="default" :show="$errors->any() || session('openModal') === 'edit-education'">
    <form method="POST" action="{{ route('education.update', ['education' => $education->id]) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT') <!-- Use PUT for update -->
        <div>
            <flux:heading size="lg">Edit Academic Qualifications</flux:heading>
            <flux:text class="mt-2">Modify your educational information.</flux:text>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <flux:input size=sm label="Institution" name="institution" value="{{ old('institution', $education->institution) }}" placeholder="e.g. University of Nairobi" required autofocus />

            <flux:select size=sm label="Qualification" name="level_of_study" required>
                <option value="">Select Level</option>
                @foreach (['KCPE', 'KCSE', 'Vocational Training', 'Certificate', 'Diploma', 'Higher Diploma', 'Bachelor', 'Master', 'PhD'] as $level)
                    <option value="{{ $level }}" @selected(old('level_of_study', $education->level_of_study) === $level)>{{ $level }}</option>
                @endforeach
            </flux:select>

            <flux:input label="Course" name="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}" placeholder="e.g. Computer Science" required />

            <flux:select size=sm label="Award" name="award" required>
                <option value="">Select Award</option>
                @foreach (['First Class', 'Second Class hnr(Upper)', 'Second Class hnr(Lower)', 'Pass', 'Distinction', 'Credit'] as $award)
                    <option value="{{ $award }}" @selected(old('award', $education->award) === $award)>{{ $award }}</option>
                @endforeach
            </flux:select>

            <flux:input size=sm label="Start Date" name="start_date" type="date" value="{{ old('start_date', $education->start_date) }}" required />
            <flux:input size=sm label="End Date" name="end_date" type="date" value="{{ old('end_date', $education->end_date) }}" required />
        </div>

        <div class="sm:col-span-2" x-data="{ fileName: '{{ old('academic_document', $education->academic_document) }}', fileSize: 0, progress: 0, fileInput: null, filePreview: '', isImage: false }">
            <label for="academic_document" class="block text-sm font-medium text-gray-700">
                {{ __('Upload Certificate (PDF or Image)') }}
            </label>
            <div class="border border-gray-300 p-3 rounded-lg shadow-sm bg-white">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-file-upload text-blue-600"></i>

                    <!-- Hidden Input -->
                    <input id="academic_document" name="academic_document" type="file"
                        accept=".pdf,.jpg,.png" class="hidden" x-ref="fileInput"
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
                        <div class="bg-blue-500 h-2 transition-all duration-300"
                            :style="'width:' + progress + '%'"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkbox for false information warning -->
        <div class="mt-4">
            <label class="inline-flex items-center text-sm">
                <input type="checkbox" name="disqualification_warning" required class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded">
                <span class="ml-2 text-gray-700">I understand that providing false information may lead to disqualification and/or legal action.</span>
            </label>
        </div>

        <div class="flex justify-end">
            <flux:spacer />
            <flux:button type="submit" size="sm" variant="primary">
                <i class="fas fa-save mr-1"></i> Save Changes
            </flux:button>
        </div>
    </form>
</flux:modal>
