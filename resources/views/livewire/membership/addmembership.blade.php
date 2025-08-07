{{-- filepath: c:\Users\BAHATI_KINGI\Desktop\ICT PROJECTS\my-app\resources\views\livewire\membership\addmembership.blade.php --}}
<div>
    <flux:modal name="add-membership" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Add New Membership</flux:heading>
                <flux:text class="mt-2">Fill in your professional membership details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Membership Body" size="sm" name="membership_body" placeholder="e.g. Kenya Medical Association"
                    wire:model.defer="membership_body" />

                <flux:select label="Membership Type" size="sm" name="membership_type" wire:model.defer="membership_type">
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

                <flux:input label="Next Renewal Date / Expiry Date" size="sm" type="date" name="expiry_date"
                    wire:model.defer="expiry_date" />
            </div>

            <!-- Document Upload -->
            <div class="space-y-2">
                <flux:label for="membership_document" class="block text-sm font-medium text-gray-700">
                    Supporting Document (PDF only)
                </flux:label>

                <div x-data="{
                    progress: 0,
                    isUploading: false,
                    removeFile() {
                        @this.set('membership_document', null);
                        this.progress = 0;
                    }
                }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    class="relative border-2 border-dashed border-gray-300 rounded-lg p-5 transition">
                    <input type="file" id="membership_document" name="membership_document"
                        wire:model.defer="membership_document" accept=".pdf"
                        class="opacity-0 absolute inset-0 cursor-pointer z-10" />

                    <div class="flex items-center space-x-3 pointer-events-none">
                        <i class="fas fa-file-upload text-indigo-500 text-2xl"></i>
                        <span class="text-indigo-600 text-sm font-medium">
                            Click or drag to upload Membership Certificate / Document
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
                @if ($membership_document)
                    <div class="flex items-center justify-between mt-2 bg-gray-100 p-2 rounded-md text-sm text-gray-700">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-file-pdf text-red-500"></i>
                            <span>
                                @if (is_object($membership_document) && method_exists($membership_document, 'getClientOriginalName'))
                                    {{ $membership_document->getClientOriginalName() }}
                                @else
                                    {{ basename($membership_document) }}
                                @endif
                            </span>
                        </div>
                        <button type="button" class="text-red-600 hover:text-red-800" wire:click="removeDocument">
                            <i class="fas fa-times-circle"></i> Remove
                        </button>
                    </div>
                @endif

                @error('membership_document')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <!-- End Document Upload -->

            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="submit">Add Membership Body</flux:button>
                <div wire:loading class="flex items-center space-x-2 text-sm text-blue-600 ml-2 animate-pulse">
                    <svg class="w-4 h-4 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span>Adding Membership...</span>
                </div>
            </div>
        </div>
    </flux:modal>
</div>
