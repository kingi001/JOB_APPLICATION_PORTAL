<div>
    <livewire:header />
    {{-- Notifications Component --}}
    @foreach (['success' => 'green', 'error' => 'red'] as $type => $color)
        @if (session($type))
            <div x-data="{ show: true, progress: 100 }" x-show="show"
                x-init="                                                                                        let interval = setInterval(() => { progress -= 0.5; if(progress <= 0){ show = false; clearInterval(interval); } }, 15);                                                               "
                x-transition:enter="transform transition ease-out duration-500"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transform transition ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
                class="fixed top-6 right-6 w-full max-w-sm bg-white border-l-4 border-{{ $color }}-500 text-{{ $color }}-800 p-4 rounded-lg shadow-lg flex flex-col space-y-2 z-50"
                role="alert">
                <div class="flex items-start justify-between">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 text-{{ $color }}-500 shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            @if($type === 'success')
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            @endif
                        </svg>
                        <div class="flex-1">
                            <p class="font-semibold text-sm capitalize">{{ $type }}</p>
                            <p class="text-sm">{{ session($type) }}</p>
                        </div>
                    </div>
                    <button @click="show = false"
                        class="text-{{ $color }}-400 hover:text-{{ $color }}-600 focus:outline-none ml-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                {{-- Optional Auto-dismiss Progress Bar --}}
                <div class="h-1 w-full bg-{{ $color }}-100 rounded-full overflow-hidden">
                    <div class="h-1 bg-{{ $color }}-500 rounded-full" :style="'width: ' + progress + '%;'"></div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="py-6 container max-width mx-auto sm:px-6 lg:px-2">
        <div class="p-6 bg-white border border-gray-200 rounded-xl shadow-md">
            {{-- Section Header --}}
            <div class="flex items-center justify-between border-b  mb-3">
                <h2 class="text-base font-semibold text-indigo-700 flex items-center gap-2">
                    <i class="fas fa-file-alt"></i> {{ __('Job Application') }}
                </h2>
                <span class="text-sm text-indigo-600">{{ now()->format('F j, Y') }}</span>
            </div>
            <p class="text-sm text-gray-600">
                Select the job you want to apply for and submit your application.
            </p>
            {{-- Application Form --}}
            <div class="mt-3 space-y-4">
                
                {{-- Job Selection --}}
                <div>
                    <flux:label size="sm">Select Job Position</flux:label>
                    <flux:select wire:model="vacancy_id" required>
                        <option value="" size="sm">-- Choose Position --</option>
                        @foreach ($vacancies as $vacancy)
                            <option value="{{ $vacancy->id }}">{{ $vacancy->position }}</option>
                        @endforeach
                    </flux:select>

                    @error('vacancy_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Declaration --}}
                <div class="flex items-start gap-2">
                    <div class="flex items-start gap-2">
                        <flux:checkbox wire:model="declaration" required class="mt-1" />
                        <p class="text-sm text-indigo-600 dark:text-neutral-400 leading-relaxed">
                            By submitting this application, you confirm that all the information
                            provided in your profile, including education, experience, and uploaded
                            documents, is accurate and truthful.
                        </p>
                    </div>
                </div>
                @error('declaration')
                    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-1"
                        class="flex items-center gap-2 mt-1 px-3 py-2 text-sm text-red-700 bg-red-100 border border-red-300 rounded-md shadow-sm">


                        <svg class="w-4 h-4 text-red-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>

                        <span>{{ $message }}</span>

                        <button @click="show = false" class="ml-auto text-red-400 hover:text-red-600 focus:outline-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                @enderror
                {{-- Submit Button --}}
                <flux:button type="submit" wire:click="submit" wire:loading.attr="disabled" wire:target="submit"
                    variant="primary" color="green" size="sm" class="flex items-center gap-2">

                    {{-- Show spinner when submitting --}}
                    <span wire:loading wire:target="submit" class="animate-spin">
                        <i class="fas fa-spinner"></i>
                    </span>

                    {{-- Show normal icon when not submitting --}}
                    <span wire:loading.remove wire:target="submit">
                        <i class="fas fa-paper-plane"></i>
                    </span>
                    Submit Application
                </flux:button>
            </div>
            {{-- CV Generator --}}
            <div class="mt-2 p-4 bg-gray-100 border border-gray-200 rounded-lg">
                <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-file-pdf text-red-500"></i> (Preview)
                </h3>
                <p class="text-sm text-gray-600">
                    Generate a CV using the information in your profile.
                </p>
                @if($previewUrl)
                    <iframe src="{{ $previewUrl }}" class="w-full h-[400px] border mt-2 rounded"></iframe>
                @else
                    <p class="text-gray-500 mt-2">Generating preview...</p>
                @endif
                {{-- <button
                    class="mt-2 text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow flex items-center gap-2">
                    <i class="fas fa-download"></i> Download CV
                </button> --}}
            </div>
            {{-- Application Status --}}
            @if($latestApplication)
                <div class="mt-6">
                    <h3 class="text-sm font-semibold text-gray-700 flex items-center gap-2">
                        <i class="fas fa-info-circle text-indigo-500"></i> Application Status
                    </h3>
                    <p class="text-sm text-gray-600">
                        Your latest application for the position of
                        <strong>{{ $latestApplication->vacancy->position }}</strong> was submitted on
                        <strong>{{ $latestApplication->created_at->format('F j, Y') }}</strong>.
                    </p>
                    <span class="inline-block mt-2 px-3 py-1 text-sm font-medium rounded-full
                        @if($latestApplication->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($latestApplication->status === 'shortlisted') bg-green-100 text-green-700
                        @elseif($latestApplication->status === 'rejected') bg-red-100 text-red-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ ucfirst($latestApplication->status) }}
                    </span>
                </div>
            @endif
        </div>
    </div>
