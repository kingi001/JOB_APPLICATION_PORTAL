<div>
    <flux:modal name="edit-profession" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Update Professional Qualification</flux:heading>
                <flux:text class="mt-2">Update your professional qualification details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Qualification Name" size="sm" name="qualification_name"
                    placeholder="e.g. Certified Network Associate" wire:model.defer="qualification_name" />

                <flux:input label="Certifying Body" size="sm" name="certifying_body" placeholder="e.g. Cisco"
                    wire:model.defer="certifying_body" />

                <flux:input label="Certificate Number" size="sm" name="certificate_number" placeholder="e.g. CNAXXX1234"
                    wire:model.defer="certificate_number" />

                <flux:select label="Award" size="sm" name="award" wire:model.defer="award">
                    <option value="">-- Select Award --</option>
                    <option value="Licensed">Licensed</option>
                    <option value="Certified">Certified</option>
                    <option value="Pass">Pass</option>
                    <option value="Distinction">Distinction</option>
                    <option value="Credit">Credit</option>
                </flux:select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Date Awarded" size="sm" type="date" name="date_awarded"
                    wire:model.defer="date_awarded" />

                <flux:input label="Valid Until (leave blank if indefinite)" size="sm" type="date" name="valid_until"
                    wire:model.defer="valid_until" />
            </div>

            <!-- Upload section -->
            <div class="space-y-2">
                <flux:label for="qualification_document" class="block text-sm font-medium text-gray-700">
                    Qualification Document (PDF only)
                </flux:label>

                <div x-data="{
                    progress: 0,
                    isUploading: false,
                    removeFile() {
                        @this.set('qualification_document', null);
                        this.progress = 0;
                    }
                }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    class="relative border border-dashed border-gray-300 rounded-lg p-4">

                    <input type="file" id="qualification_document" name="qualification_document"
                        wire:model.defer="qualification_document" accept=".pdf"
                        class="opacity-0 absolute inset-0 cursor-pointer z-10" />

                    <div class="flex items-center space-x-3 pointer-events-none">
                        <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
                        <span class="text-indigo-600 text-sm font-medium">
                            Click or drag to replace uploaded Professional Qualification Certificate
                        </span>
                    </div>

                    <template x-if="isUploading">
                        <div class="mt-3">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full" :style="`width: ${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>

                <!-- Preview / Remove -->
                @if ($qualification_document)
                    <div
                        class="flex items-center justify-between mt-3 bg-white border border-gray-200 rounded-lg shadow-sm p-3 transition-all duration-300 ease-in-out animate-fade-in">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                            <span class="text-gray-800 font-medium">
                                {{ $qualification_document->getClientOriginalName() }}
                            </span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-0.5 rounded-full">New
                                Upload</span>
                        </div>
                        <button type="button"
                            class="text-red-500 hover:text-red-700 text-sm flex items-center space-x-1 transition-all duration-200"
                            wire:click="removeDocument">
                            <i class="fas fa-times-circle"></i>
                            <span>Remove</span>
                        </button>
                    </div>

                @elseif ($qualification_document_path)
                    <div
                        class="flex items-center justify-between mt-3 bg-white border border-gray-200 rounded-lg shadow-sm p-3 transition-all duration-300 ease-in-out animate-fade-in">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                            <a href="{{ Storage::url($qualification_document_path) }}" target="_blank"
                                class="text-indigo-600 hover:underline font-medium">
                                View current document
                            </a>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">Saved</span>
                        </div>
                        {{-- <button type="button"
                            class="text-red-500 hover:text-red-700 text-sm flex items-center space-x-1 transition-all duration-200"
                            wire:click="removeDocument">
                            <i class="fas fa-times-circle"></i>
                            <span>Remove</span>
                        </button> --}}
                    </div>
                @endif

                @error('qualification_document')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Upload -->

            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="update">Update Qualification
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
