<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" />

    @include('partials.head')
</head>
<body class="min-h-screen bg-gray-50 dark:bg-zinc-800" style="background-image: url('{{ asset('images/bgpattern.gif') }}');
       background-repeat: repeat;
       background-attachment: fixed;">
    <flux:sidebar sticky stashable class="border-e border-blue-200 bg-blue-100 dark:border-blue-700 dark:bg-blue-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>
        <div x-data="{ openEducation: false }" class="w-full">
            <flux:navlist variant="outline" class="space-y-2">
                {{-- 🧭 E-Recruitment --}}
                <flux:navlist.group :heading="__('E-Recruitment')" class="grid gap-1">
                    <flux:navlist.item :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                        wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-home text-primary text-sm"></i>
                        <span>{{ __('Admin Dashboard') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item :href="route('vacancies')" :current="request()->routeIs('vacancies')"
                        wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-briefcase text-primary text-sm"></i>
                        <span>{{ __('Vacancies') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item :href="route('applications')" :current="request()->routeIs('applications')"
                        wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-file-alt text-primary text-sm"></i>
                        <span>{{ __('Applications') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item :href="route('screening')" :current="request()->routeIs('screening')"
                        wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-search text-primary text-sm"></i>
                        <span>{{ __('Screening') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-user-check text-primary text-sm"></i>
                        <span>{{ __('Shortlisting') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-comments text-primary text-sm"></i>
                        <span>{{ __('Interview') }}</span>
                    </flux:navlist.item>

                    <flux:navlist.item wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-check-circle text-primary text-sm"></i>
                        <span>{{ __('Selection') }}</span>
                    </flux:navlist.item>
                </flux:navlist.group>

                {{-- 👤 Personal Profile --}}
                <flux:navlist.group :heading="__('Personal Profile')" class="grid gap-1">
                    <flux:navlist.item :href="route('personal-information')"
                        :current="request()->routeIs('personal-information')" wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-user text-primary text-sm"></i>
                        <span>{{ __('Personal Information') }}</span>
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Education" expandable icon="fas fa-graduation-cap">

                    <flux:navlist.item :href="route('education')" :current="request()->routeIs('education')"
                        wire:navigate>
                        {{ __('Academic Qualifications') }}
                    </flux:navlist.item>

                    <flux:navlist.item :href="route('professional-qualification')"
                        :current="request()->routeIs('professional-qualification')" wire:navigate>
                        {{ __('Professional Qualifications') }}
                    </flux:navlist.item>

                    <flux:navlist.item :href="route('membership')" :current="request()->routeIs('membership')"
                        wire:navigate>
                        {{ __('Membership to P.Bodies') }}
                    </flux:navlist.item>

                </flux:navlist.group>


                {{-- 🎓 Education (Collapsible Dropdown) --}}
                {{-- <div>
                    <button @click="openEducation = !openEducation"
                        class="w-full flex items-center justify-between px-2 py-1 rounded-md hover:bg-indigo-50 transition-all duration-200">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-graduation-cap text-primary text-sm"></i>
                            <span class="text-sm">{{ __('Education') }}</span>
                        </div>
                        <i
                            :class="openEducation ? 'fas fa-chevron-up text-gray-500 text-xs' : 'fas fa-chevron-down text-gray-500 text-xs'"></i>
                    </button>

                    <div x-show="openEducation" x-collapse class="mt-1 ml-6 space-y-1">
                        <flux:navlist.item :href="route('education')" :current="request()->routeIs('education')"
                            wire:navigate
                            class="flex items-center gap-2 px-2 py-1 rounded hover:bg-indigo-50 transition-all duration-200">
                            {{ __('Academic Qualifications') }}
                        </flux:navlist.item>

                        <flux:navlist.item :href="route('professional-qualification')"
                            :current="request()->routeIs('professional-qualification')" wire:navigate
                            class="flex items-center gap-2 px-2 py-1 rounded hover:bg-indigo-50 transition-all duration-200">
                            {{ __('Professional Qualifications') }}
                        </flux:navlist.item>

                        <flux:navlist.item :href="route('membership')" :current="request()->routeIs('membership')"
                            wire:navigate
                            class="flex items-center gap-2 px-2 py-1 rounded hover:bg-indigo-50 transition-all duration-200">
                            {{ __('Membership to P.Bodies') }}
                        </flux:navlist.item>
                    </div>
                </div> --}}

                {{-- 💼 Employment History --}}
                <flux:navlist.item :href="route('employment')" :current="request()->routeIs('employment')" wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-briefcase text-primary text-sm"></i>
                    <span>{{ __('Employment History') }}</span>
                </flux:navlist.item>

                {{-- 👥 Referees --}}
                <flux:navlist.item :href="route('referee')" :current="request()->routeIs('referee')" wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-user-friends text-primary text-sm"></i>
                    <span>{{ __('Referees Details') }}</span>
                </flux:navlist.item>

                {{-- 📁 Documents --}}
                <flux:navlist.item :href="route('documents-upload')" :current="request()->routeIs('documents-upload')" wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-upload text-primary text-sm"></i>
                    <span>{{ __('Document Upload') }}</span>
                </flux:navlist.item>

                {{-- 📨 Application --}}
                <flux:navlist.item wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-paper-plane text-primary text-sm"></i>
                    <span>{{ __('Apply Job') }}</span>
                </flux:navlist.item>

                <flux:navlist.item wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-tasks text-primary text-sm"></i>
                    <span>{{ __('Status of My Application(s)') }}</span>
                </flux:navlist.item>

                {{-- <flux:navlist.item wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-envelope-open-text text-primary text-sm"></i>
                    <span>{{ __('My Offer Letters') }}</span>
                </flux:navlist.item> --}}

                {{-- 🔔 Notifications --}}
                <flux:navlist.item wire:navigate
                    class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                    <i class="fas fa-bell text-primary text-sm"></i>
                    <span>{{ __('Notifications') }}</span>
                </flux:navlist.item>

                {{-- 📚 Courses --}}
                {{-- <flux:navlist.group :heading="__('Courses')" class="grid gap-1">
                    <flux:navlist.item wire:navigate
                        class="transition-all duration-200 hover:bg-indigo-50 flex items-center gap-3 px-3 py-2 rounded-md">
                        <i class="fas fa-book-open text-primary text-sm"></i>
                        <span>{{ __('View Courses') }}</span>
                    </flux:navlist.item>
                </flux:navlist.group> --}}
            </flux:navlist>
        </div>


        <flux:spacer />


        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile :initials="auth()->user()->initials()" icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts



</body>

</html>
