<div>
    <flux:modal name="add-academic" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Add New Education</flux:heading>
                <flux:text class="mt-2">Fill in your academic background details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Institution" size="sm" name="institution" placeholder="e.g. Jomo Kenyatta University"
                    wire:model.defer="institution" />

                <flux:select label="Level of Study" size="sm" name="level_of_study" wire:model.defer="level_of_study">
                    <option value="">-- Select Level --</option>
                    @foreach (['KCPE', 'KCSE', 'Vocational Training', 'Certificate', 'Diploma', 'Higher Diploma', 'Bachelor', 'Master', 'PhD'] as $level)
                        <option value="{{ $level }}">{{ $level }}</option>
                    @endforeach
                </flux:select>

                <flux:input label="Course" size="sm" name="field_of_study" placeholder="e.g. Computer Science"
                    wire:model.defer="field_of_study" />

                <flux:input label="Award" size="sm" name="award" placeholder="e.g. Bachelor of Science"
                    wire:model.defer="award" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Start Date" size="sm" type="date" name="start_date" wire:model.defer="start_date" />

                <flux:input label="End Date" size="sm" type="date" name="end_date" wire:model.defer="end_date" />
            </div>
            <!-- code to handle uploads-->
            <div class="space-y-2">
                <flux:label for="academic_document" class="block text-sm font-medium text-gray-700">
                    Academic Document (PDF only)
                </flux:label>

                <div x-data="{
            progress: 0,
            isUploading: false,
            removeFile() {
                @this.set('academic_document', null);
                this.progress = 0;
            }
        }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    class="relative border border-dashed border-gray-300 rounded-lg p-4">
                    <input type="file" id="academic_document" name="academic_document"
                        wire:model.defer="academic_document" accept=".pdf"
                        class="opacity-0 absolute inset-0 cursor-pointer z-10" />

                    <div class="flex items-center space-x-3 pointer-events-none">
                        <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
                        <span class="text-indigo-600 text-sm font-medium">
                            Click or drag to upload Academic Certificate
                        </span>
                    </div>

                    <!-- Progress bar -->
                    <template x-if="isUploading">
                        <div class="mt-3">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full" :style="`width: ${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>

                <!-- File preview & remove -->
                @if ($academic_document)
                    <div class="flex items-center justify-between mt-2 bg-gray-100 p-2 rounded-md text-sm text-gray-700">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-file-pdf text-red-500"></i>
                            <span>{{ $academic_document->getClientOriginalName() }}</span>
                        </div>
                        <button type="button" class="text-red-600 hover:text-red-800" wire:click="removeDocument">
                            <i class="fas fa-times-circle"></i> Remove
                        </button>
                    </div>
                @endif

                @error('academic_document')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- end of code to handle uploads-->
            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="submit">Save</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
