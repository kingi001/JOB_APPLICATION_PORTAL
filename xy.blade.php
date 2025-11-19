<div class="space-y-5">

        <h2 class="text-xl font-semibold text-gray-800">Upload Required Documents</h2>

        <!-- APPLICATION LETTER -->
        <div class="space-y-2">
            <flux:label class="text-sm font-semibold text-gray-800">Application Letter (PDF)</flux:label>

            <div x-data="{ isUploading:false, progress:0 }" x-on:livewire-upload-start="isUploading=true"
                x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
                x-on:livewire-upload-progress="progress=$event.detail.progress"
                class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                <input type="file" wire:model="application_letter" accept="application/pdf"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                <div class="flex items-center space-x-3 pointer-events-none">
                    <i class="fas fa-file-upload text-indigo-600 text-3xl"></i>
                    <span class="font-medium text-gray-700">Click or drag to upload Application Letter</span>
                </div>

                <!-- Progress -->
                <template x-if="isUploading">
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                    </div>
                </template>
            </div>

            <!-- PREVIEW -->
            @if ($application_letter)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                        <span class="font-medium text-gray-800">
                            {{ $application_letter->getClientOriginalName() }}
                        </span>
                    </div>
                    <button wire:click="removeApplicationLetter" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Remove
                    </button>
                </div>
            @elseif ($existingDocuments && $existingDocuments->application_letter)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                        <a href="{{ Storage::url($existingDocuments->application_letter) }}" target="_blank"
                            class="font-medium text-indigo-600 underline">
                            View Uploaded Application Letter
                        </a>
                    </div>
                    <button wire:click="removeApplicationLetter" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Delete
                    </button>
                </div>
            @endif
        </div>

        <!-- NATIONAL ID -->
        <div class="space-y-2">
            <flux:label class="text-sm font-semibold text-gray-800">National ID / Passport (PDF)</flux:label>

            <div x-data="{ isUploading:false, progress:0 }" x-on:livewire-upload-start="isUploading=true"
                x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
                x-on:livewire-upload-progress="progress=$event.detail.progress"
                class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                <input type="file" wire:model="national_id" accept="application/pdf"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                <div class="flex items-center space-x-3 pointer-events-none">
                    <i class="fas fa-file-upload text-indigo-600 text-3xl"></i>
                    <span class="font-medium text-gray-700">Click or drag to upload National ID / Passport</span>
                </div>

                <template x-if="isUploading">
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                    </div>
                </template>
            </div>

            <!-- PREVIEW -->
            @if ($national_id)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                        <span class="font-medium text-gray-800">
                            {{ $national_id->getClientOriginalName() }}
                        </span>
                    </div>
                    <button wire:click="removeNationalId" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Remove
                    </button>
                </div>
            @elseif ($existingDocuments && $existingDocuments->national_id)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                        <a href="{{ Storage::url($existingDocuments->national_id) }}" target="_blank"
                            class="font-medium text-indigo-600 underline">
                            View Uploaded National ID / Passport
                        </a>
                    </div>
                    <button wire:click="removeNationalId" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Delete
                    </button>
                </div>
            @endif
        </div>

        <!-- TESTIMONIALS -->
        <div class="space-y-2">
            <flux:label class="text-sm font-semibold text-gray-800">Testimonials (Optional)</flux:label>

            <div x-data="{ isUploading:false, progress:0 }" x-on:livewire-upload-start="isUploading=true"
                x-on:livewire-upload-finish="isUploading=false" x-on:livewire-upload-error="isUploading=false"
                x-on:livewire-upload-progress="progress=$event.detail.progress"
                class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                <input type="file" wire:model="testimonials" accept="application/pdf"
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                <div class="flex items-center space-x-3 pointer-events-none">
                    <i class="fas fa-file-upload text-indigo-600 text-3xl"></i>
                    <span class="font-medium text-gray-700">Click or drag to upload Testimonials</span>
                </div>

                <template x-if="isUploading">
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                            <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                        </div>
                        <p class="text-xs text-gray-600 mt-1" x-text="`Uploading: ${progress}%`"></p>
                    </div>
                </template>
            </div>

            <!-- PREVIEW -->
            @if ($testimonials)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                        <span class="font-medium text-gray-800">
                            {{ $testimonials->getClientOriginalName() }}
                        </span>
                    </div>
                    <button wire:click="removeTestimonials" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Remove
                    </button>
                </div>
            @elseif ($existingDocuments && $existingDocuments->testimonials)
                <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                        <a href="{{ Storage::url($existingDocuments->testimonials) }}" target="_blank"
                            class="font-medium text-indigo-600 underline">
                            View Testimonials
                        </a>
                    </div>
                    <button wire:click="removeTestimonials" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-times-circle mr-1"></i> Delete
                    </button>
                </div>
            @endif
        </div>

        <button wire:click="save"
            class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition font-semibold">
            Save Documents
        </button>

    </div>
