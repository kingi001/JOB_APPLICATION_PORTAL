<div>
    <flux:modal name="add-qualification" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Add Professional Qualification</flux:heading>
                <flux:text class="mt-2">Fill in your professional qualification details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Qualification Name" size="sm" name="qualification_name" placeholder="e.g. Certified Network Associate"
                    wire:model="qualification_name" />

                <flux:input label="Certifying Body" size="sm" name="certifying_body" placeholder="e.g. Cisco"
                    wire:model="certifying_body" />

                <flux:input label="Certificate Number" size="sm" name="certificate_number" placeholder="e.g. CNAXXX1234"
                    wire:model="certificate_number" />

                <flux:select label="Award" size="sm" name="award" wire:model="award">
                    <option value="">-- Select Award --</option>
                    <option value="Licensed">Licensed</option>
                    <option value="Certified">Certified</option>
                    <option value="Pass">Pass</option>
                    <option value="Distinction">Distinction</option>
                    <option value="Credit">Credit</option>
                </flux:select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Date Awarded" size="sm" type="date" name="date_awarded" wire:model="date_awarded" />

                <flux:input label="Valid Until (leave blank if indefinite)" size="sm" type="date" name="valid_until" wire:model="valid_until" />
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
                }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    class="relative border border-dashed border-gray-300 rounded-lg p-4">

                    <input type="file" id="qualification_document" name="qualification_document"
                        wire:model.defer="qualification_document" accept=".pdf"
                        class="opacity-0 absolute inset-0 cursor-pointer z-10" />

                    <div class="flex items-center space-x-3 pointer-events-none">
                        <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
                        <span class="text-indigo-600 text-sm font-medium">
                            Click or drag to upload Qualification Certificate
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

                @if ($qualification_document)
                    <div class="flex items-center justify-between mt-2 bg-gray-100 p-2 rounded-md text-sm text-gray-700">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-file-pdf text-red-500"></i>
                            <span>{{ $qualification_document->getClientOriginalName() }}</span>
                        </div>
                        <button type="button" class="text-red-600 hover:text-red-800" wire:click="removeQualificationDocument">
                            <i class="fas fa-times-circle"></i> Remove
                        </button>
                    </div>
                @endif

                @error('qualification_document')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Upload -->

            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="submit">Save</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
