<div class="space-y-8">

    <livewire:header />

    <div class="py-4 mt-4 container mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-xl shadow-md bg-white">

        <!-- Section Header -->
        <div class="p-4 border-b border-gray-200 bg-white rounded-t-xl">
            <h3 class="text-lg font-bold text-indigo-800 flex items-center gap-2">
                <i class="fas fa-file-signature text-blue-600 text-xl"></i>
                {{ __('Document Uploads') }}
            </h3>
            <p class="text-sm text-gray-600 mt-1">
                Upload all required documents for your application. Only PDF files are accepted.
            </p>
        </div>

        <!-- Upload Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">

            {{-- Application Letter --}}
            <div class="space-y-2">
                <flux:label class="text-sm font-semibold text-red-600">
                    * Application Letter (PDF) *
                </flux:label>

                <div x-data="{ isUploading:false, progress:0 }"
                     x-on:livewire-upload-start="isUploading=true"
                     x-on:livewire-upload-finish="isUploading=false"
                     x-on:livewire-upload-error="isUploading=false"
                     x-on:livewire-upload-progress="progress=$event.detail.progress"
                     class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                    <input type="file" wire:model="application_letter" accept="application/pdf"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <i class="fas fa-upload text-indigo-600 text-3xl mb-2"></i>
                        <span class="font-medium text-gray-700 text-center text-sm">
                            Click or drag to upload Application Letter
                        </span>
                    </div>

                    <template x-if="isUploading">
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1 text-center" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>

                {{-- Preview --}}
                @if ($application_letter)
                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                <span>{{ $application_letter->getClientOriginalName() }}</span>
                            </div>
                            <span class="text-xs text-gray-500 mt-1">
                                {{ number_format($application_letter->getSize() / 1024, 2) }} KB
                            </span>
                        </div>
                        <button type="button" wire:click="removeApplicationLetter"
                                class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-times-circle mr-1"></i> Remove
                        </button>
                    </div>
                @elseif($existingDocuments && $existingDocuments->application_letter)
                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                                <a href="{{ Storage::url($existingDocuments->application_letter) }}" target="_blank"
                                   class="font-medium text-indigo-600 underline">
                                    View Uploaded Application Letter
                                </a>
                            </div>
                            <span class="text-xs text-gray-500 mt-1">
                                @if (Storage::disk('public')->exists($existingDocuments->application_letter))
                                    {{ number_format(Storage::disk('public')->size($existingDocuments->application_letter) / 1024, 2) }} KB
                                @else
                                    File not found
                                @endif
                            </span>
                        </div>
                        <button wire:click="removeApplicationLetter" class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-times-circle mr-1"></i> Delete
                        </button>
                    </div>
                @endif
            </div>

            {{-- National ID / Passport --}}
            <div class="space-y-2">
                <flux:label class="text-sm font-semibold text-red-600">
                    * National ID / Passport (PDF) *
                </flux:label>

                <div x-data="{ isUploading:false, progress:0 }"
                     x-on:livewire-upload-start="isUploading=true"
                     x-on:livewire-upload-finish="isUploading=false"
                     x-on:livewire-upload-error="isUploading=false"
                     x-on:livewire-upload-progress="progress=$event.detail.progress"
                     class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                    <input type="file" wire:model="national_id" accept="application/pdf"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <i class="fas fa-id-card text-indigo-600 text-3xl mb-2"></i>
                        <span class="font-medium text-gray-700 text-center">
                            Click or drag to upload National ID / Passport
                        </span>
                    </div>

                    <template x-if="isUploading">
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1 text-center" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>

                {{-- Preview --}}
                @if ($national_id)
                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                <span class="font-medium text-gray-800">
                                    {{ $national_id->getClientOriginalName() }}
                                </span>
                            </div>
                            <span class="text-xs text-gray-500 mt-1">
                                {{ number_format($national_id->getSize() / 1024, 2) }} KB
                            </span>
                        </div>
                        <button wire:click="removeNationalId" class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-times-circle mr-1"></i> Remove
                        </button>
                    </div>
                @elseif ($existingDocuments && $existingDocuments->national_id)
                    <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                                <a href="{{ Storage::url($existingDocuments->national_id) }}" target="_blank"
                                   class="font-medium text-indigo-600 underline">
                                    View Uploaded National ID / Passport
                                </a>
                            </div>
                            <span class="text-xs text-gray-500 mt-1">
                                @if (Storage::disk('public')->exists($existingDocuments->national_id))
                                    {{ number_format(Storage::disk('public')->size($existingDocuments->national_id) / 1024, 2) }} KB
                                @else
                                    File not found
                                @endif
                            </span>
                        </div>
                        <button wire:click="removeNationalId" class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-times-circle mr-1"></i> Delete
                        </button>
                    </div>
                @endif
            </div>

            {{-- Testimonials (Multiple PDFs) --}}
            <div class="space-y-2">
                <flux:label class="text-sm font-semibold text-gray-800">
                    Testimonials (Optional, Multiple PDFs)
                </flux:label>

                <div x-data="{ isUploading:false, progress:0 }"
                     x-on:livewire-upload-start="isUploading=true"
                     x-on:livewire-upload-finish="isUploading=false"
                     x-on:livewire-upload-error="isUploading=false"
                     x-on:livewire-upload-progress="progress=$event.detail.progress"
                     class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 bg-white hover:bg-gray-50 shadow-sm transition">

                    <input type="file" wire:model="testimonials" multiple accept="application/pdf"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />

                    <div class="flex flex-col items-center justify-center pointer-events-none">
                        <i class="fas fa-file-pdf text-indigo-600 text-3xl mb-2"></i>
                        <span class="font-medium text-gray-700 text-center">
                            Click or drag to upload Testimonials
                        </span>
                    </div>

                    <template x-if="isUploading">
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2 overflow-hidden">
                                <div class="bg-indigo-600 h-2 rounded-full" :style="`width:${progress}%`"></div>
                            </div>
                            <p class="text-xs text-gray-600 mt-1 text-center" x-text="`Uploading: ${progress}%`"></p>
                        </div>
                    </template>
                </div>

                <!-- PREVIEWS -->
                @if($testimonials)
                    @foreach($testimonials as $index => $testimonial)
                        <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                            <div class="flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-file-pdf text-red-500 text-lg"></i>
                                    <span class="font-medium text-gray-800">
                                        {{ $testimonial->getClientOriginalName() }}
                                    </span>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">
                                    {{ number_format($testimonial->getSize() / 1024, 2) }} KB
                                </span>
                            </div>
                            <button wire:click="removeTestimonial({{ $index }})"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                <i class="fas fa-times-circle mr-1"></i> Remove
                            </button>
                        </div>
                    @endforeach
                @endif

                <!-- Existing uploaded testimonials -->
                @if($existingDocuments && $existingDocuments->testimonials)
                    @foreach(json_decode($existingDocuments->testimonials) as $index => $file)
                        <div class="flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm mt-3">
                            <div class="flex flex-col">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-file-pdf text-red-600 text-lg"></i>
                                    <a href="{{ Storage::url($file) }}" target="_blank"
                                       class="font-medium text-indigo-600 underline">
                                        {{ basename($file) }}
                                    </a>
                                </div>
                                <span class="text-xs text-gray-500 mt-1">
                                    @if (Storage::disk('public')->exists($file))
                                        {{ number_format(Storage::disk('public')->size($file) / 1024, 2) }} KB
                                    @else
                                        File not found
                                    @endif
                                </span>
                            </div>
                            <button wire:click="removeTestimonial({{ $index }})"
                                    class="text-red-600 hover:text-red-800 font-medium">
                                <i class="fas fa-times-circle mr-1"></i> Delete
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex justify-end p-2 border-t border-gray-200">
            <button wire:click="save"
                    class="px-2 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition font-normal text-sm">
                Save Documents
            </button>
        </div>
    </div>
</div>
