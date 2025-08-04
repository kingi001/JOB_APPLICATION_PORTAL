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
    <flux:sidebar sticky stashable class="border-e border-blue-200 bg-blue-50 dark:border-blue-700 dark:bg-blue-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>


<flux:navlist variant="outline" class="space-y-4">

    {{-- E-recruitment --}}
    <flux:navlist.group :heading="__('🧭 E-recruitment')" class="grid gap-1">
        <flux:navlist.item
            :href="route('dashboard')"
            :current="request()->routeIs('dashboard')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Applicant Dashboard') }}"
        >
            <i class="fas fa-home text-primary text-sm mr-3"></i>{{ __('Applicant Dashboard') }}
        </flux:navlist.item>

        <flux:navlist.item
            :href="route('vacancies')"
            :current="request()->routeIs('vacancies')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Vacancies') }}"
        >
            <i class="fas fa-briefcase text-primary text-sm mr-3"></i>{{ __('Vacancies') }}
        </flux:navlist.item>

        <flux:navlist.item
            :href="route('applications')"
            :current="request()->routeIs('applications')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Applications') }}"
        >
            <i class="fas fa-file-alt text-primary text-sm mr-3"></i>{{ __('Applications') }}
        </flux:navlist.item>

        <flux:navlist.item
            :href="route('screening')"
            :current="request()->routeIs('screening')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Screening') }}"
        >
            <i class="fas fa-search text-primary text-sm mr-3"></i>{{ __('Screening') }}
        </flux:navlist.item>

        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Shortlisting') }}"
        >
            <i class="fas fa-user-check text-primary text-sm mr-3"></i>{{ __('Shortlisting') }}
        </flux:navlist.item>

        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Interview') }}"
        >
            <i class="fas fa-comments text-primary text-sm mr-3"></i>{{ __('Interview') }}
        </flux:navlist.item>

        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Selection') }}"
        >
            <i class="fas fa-check-circle text-primary text-sm mr-3"></i>{{ __('Selection') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Personal Profile --}}
    <flux:navlist.group :heading="__('👤 Personal Profile')" class="grid gap-1">
        <flux:navlist.item
            :href="route('personal-information')"
            :current="request()->routeIs('personal-information')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Personal Information') }}"
        >
            <i class="fas fa-user text-primary text-sm mr-3"></i>{{ __('Personal Information') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Education --}}
    <flux:navlist.group :heading="__('🎓 Education')" class="grid gap-1">
        <flux:navlist.item
            :href="route('education')"
            :current="request()->routeIs('education')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Academic Qualifications') }}"
        >
            <i class="fas fa-graduation-cap text-primary text-sm mr-3"></i>{{ __('Academic Qualifications') }}
        </flux:navlist.item>

        <flux:navlist.item
            :href="route('professional-qualification')"
            :current="request()->routeIs('professional-qualification')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Professional Qualifications') }}"
        >
            <i class="fas fa-certificate text-primary text-sm mr-3"></i>{{ __('Professional Qualifications') }}
        </flux:navlist.item>

        <flux:navlist.item
            :href="route('membership')"
            :current="request()->routeIs('membership')"
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Membership to P.Bodies') }}"
        >
            <i class="fas fa-id-badge text-primary text-sm mr-3"></i>{{ __('Membership to P.Bodies') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Employment History --}}
    <flux:navlist.group :heading="__('💼 Employment History')" class="grid gap-1">
        <flux:navlist.item

            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Employment History') }}"
        >
            <i class="fas fa-briefcase text-primary text-sm mr-3"></i>{{ __('Employment History') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Referees --}}
    <flux:navlist.group :heading="__('📇 Referees')" class="grid gap-1">
        <flux:navlist.item

            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Referees Details') }}"
        >
            <i class="fas fa-user-friends text-primary text-sm mr-3"></i>{{ __('Referees Details') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Documents --}}
    <flux:navlist.group :heading="__('📤 Document Upload')" class="grid gap-1">
        <flux:navlist.item
            
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Upload Documents') }}"
        >
            <i class="fas fa-upload text-primary text-sm mr-3"></i>{{ __('Upload Documents') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Application --}}
    <flux:navlist.group :heading="__('📝 Application')" class="grid gap-1">
        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Submit Application') }}"
        >
            <i class="fas fa-paper-plane text-primary text-sm mr-3"></i>{{ __('Submit Application') }}
        </flux:navlist.item>

        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Status of My Application(s)') }}"
        >
            <i class="fas fa-tasks text-primary text-sm mr-3"></i>{{ __('Status of My Application(s)') }}
        </flux:navlist.item>

        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('My Offer Letters') }}"
        >
            <i class="fas fa-envelope-open-text text-primary text-sm mr-3"></i>{{ __('My Offer Letters') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Notifications --}}
    <flux:navlist.group :heading="__('🔔 Notifications')" class="grid gap-1">
        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('My Notifications') }}"
        >
            <i class="fas fa-bell text-primary text-sm mr-3"></i>{{ __('My Notifications') }}
        </flux:navlist.item>
    </flux:navlist.group>

    {{-- Courses --}}
    <flux:navlist.group :heading="__('📚 Courses')" class="grid gap-1">
        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('View Courses') }}"
        >
            <i class="fas fa-book-open text-primary text-sm mr-3"></i>{{ __('View Courses') }}
        </flux:navlist.item>

        {{-- Uncomment to enable course application --}}
        {{--
        <flux:navlist.item
            wire:navigate
            class="transition-colors duration-200 hover:bg-gray-100 px-2 py-1 rounded"
            title="{{ __('Apply for a Course') }}"
        >
            <i class="fas fa-edit text-primary text-sm mr-3"></i>{{ __('Apply for a Course') }}
        </flux:navlist.item>
        --}}
    </flux:navlist.group>

</flux:navlist>





        <flux:spacer />

        {{-- <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit"
                target="_blank">
                {{ __('Repository') }}
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits#livewire"
                target="_blank">
                {{ __('Documentation') }}
            </flux:navlist.item>
        </flux:navlist> --}}

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
