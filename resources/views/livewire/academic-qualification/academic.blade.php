<div class="relative mb-6 w-full  mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center space-x-4 mb-1">
        <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
        <div>
            <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                {{ __('Welcome to Bandari Maritime Academy Job Application Portal') }}
            </flux:heading>
            <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                {{ __('Manage your profile, track applications, and update your account settings with ease.') }}
            </flux:subheading>
        </div>
    </div>
    <flux:separator variant="subtle"/>
    {{-- Bread Crumbs --}}
    <div class="bg-gray-100 dark:bg-gray-800 py-0.5"> <!-- Reduced py-2 to py-1 -->
        <div class="mx-auto flex items-center text-xs text-gray-600 dark:text-gray-400">
            <!-- Reduced text-sm to text-xs -->
            <nav class="flex px-6 py-1 text-blue-700 border border-blue-200 rounded-lg bg-blue-50 dark:bg-blue-800 dark:border-blue-700"
                aria-label="Breadcrumb"> <!-- Reduced px-12 to px-6 -->
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <!-- Home Link -->
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <!-- Reduced text-sm to text-xs -->
                            <svg class="w-3 h-3 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20"> <!-- Reduced w-4 h-4 to w-3 h-3 -->
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    @php
                        $segments = request()->segments();
                        $url = '';
                    @endphp
                    <!-- Dynamic Breadcrumbs -->
                    @foreach ($segments as $index => $segment)
                        @php
                            $url .= '/' . $segment;
                            $isLast = $loop->last;
                            $name = ucwords(str_replace('-', ' ', $segment));
                        @endphp
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-2 h-2 mx-1 text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <!-- Reduced w-3 h-1 to w-2 h-2 -->
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                @if (!$isLast)
                                    <a href="{{ url($url) }}"
                                        class="ms-1 text-xs font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                        {{ $name }}
                                    </a>
                                @else
                                    <span class="ms-1 text-xs font-medium text-gray-500 md:ms-2 dark:text-gray-400">
                                        {{ $name }}
                                    </span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
