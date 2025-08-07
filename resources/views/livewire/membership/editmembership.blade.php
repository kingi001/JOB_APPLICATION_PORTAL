<div>
    <flux:modal name="edit-membership" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Update Membership to Professional Body</flux:heading>
                <flux:text class="mt-2">Update your professional membership details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Membership Body" size="sm" name="membership_body"
                    placeholder="e.g. Kenya Medical Association" wire:model.defer="membership_body" />

                <flux:select label="Membership Type" size="sm" name="membership_type"
                    wire:model.defer="membership_type">
                    <option value="">-- Select Type --</option>
                    <option value="Individual">Individual</option>
                    <option value="Professional">Professional</option>
                    <option value="Associate">Associate</option>
                    <option value="Honorary">Honorary</option>
                    <option value="Affiliate">Affiliate</option>
                    <option value="Fellow">Fellow</option>
                    <option value="Life">Life</option>
                    <option value="Corporate">Corporate</option>
                    <option value="Student">Student</option>
                </flux:select>

                <flux:input label="Membership / Registration Number" size="sm" name="membership_no"
                    placeholder="e.g. KMA/12345" wire:model.defer="membership_no" />

                <flux:input label="Date Renewed" size="sm" type="date" name="date_renewed"
                    wire:model.defer="date_renewed" />

                <flux:input label="Next Renewal/Expiry Date" size="sm" type="date" name="expiry_date"
                    wire:model.defer="expiry_date" />
            </div>

            <!-- Upload Section -->
            <div class="space-y-2">
                <flux:label for="membership_document" class="block text-sm font-medium text-gray-700">
                    Supporting Document (PDF only)
                </flux:label>

                <div x-data="{
                        progress: 0,
                        isUploading: false,
                        removeFile() {
                            @this.call('removeDocument')
                            this.progress = 0;
                        }
                    }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    class="relative border border-dashed border-gray-300 rounded-lg p-4">
                    <input type="file" id="membership_document" name="membership_document"
                        wire:model.defer="membership_document" accept=".pdf"
                        class="opacity-0 absolute inset-0 cursor-pointer z-10" />

                    <div class="flex items-center space-x-3 pointer-events-none">
                        <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
                        <span class="text-indigo-600 text-sm font-medium">
                            Click or drag to replace supporting document
                        </span>
                    </div>

                    <!-- Progress Bar -->
                    <template x-if="isUploading">
                        <div class="mt-3">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-indigo-600 h-2.5 rounded-full" :style="`width: ${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>
                @if ($membership_document)
                    <div
                        class="flex items-center justify-between mt-3 bg-white border border-gray-200 rounded-lg shadow-sm p-3 transition-all duration-300 ease-in-out animate-fade-in">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                            <span class="text-gray-800 font-medium">
                                {{ $membership_document->getClientOriginalName() }}
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

                @elseif ($membership_document_path)
                    <div
                        class="flex items-center justify-between mt-3 bg-white border border-gray-200 rounded-lg shadow-sm p-3 transition-all duration-300 ease-in-out animate-fade-in">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                            <a href="{{ Storage::url($membership_document_path) }}" target="_blank"
                                class="text-indigo-600 hover:underline font-medium">
                                View current document </a>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2 py-0.5 rounded-full">Saved</span>
                        </div>
                       
                    </div>
                @endif

                @error('membership_document')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Upload -->

            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="update">Update</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
