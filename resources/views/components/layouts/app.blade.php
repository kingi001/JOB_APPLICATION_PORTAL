<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main >
        {{ $slot }}
    </flux:main>
    <footer class="fixed bottom-0 left-64 z-20 right-0 bg-white shadow-md dark:bg-blue-800 border-t border-gray-300">
        <div
            class="w-full px-3 py-1 text-xs flex flex-col md:flex-row md:items-center md:justify-between max-w-screen-xl mx-auto">
            <!-- Copyright Section (Always Visible) -->
            <span
                class="flex items-center justify-center md:justify-start text-blue-600 dark:text-blue-300 text-xs font-medium tracking-wide uppercase"
                title="Copyright notice">
                © 2025 Jobs Application Portal. All rights reserved.
            </span>
            <!-- Footer Items (Hidden on Mobile, Shown on Medium Screens and Above) -->
            <ul
                class="hidden md:flex flex-wrap justify-center md:justify-end items-center mt-1 md:mt-0 text-blue-600 dark:text-blue-300 space-x-4 md:space-x-6">
                <li class="flex items-center gap-2 text-blue-600 dark:text-blue-300 font-medium uppercase">
                    <i class="fa fa-leaf text-sm text-green-500" aria-hidden="true"></i>
                    <span title="Current system version">Version 1.0</span>
                </li>
                <li class="flex items-center gap-2 text-blue-600 dark:text-blue-300 font-medium uppercase">
                    <i class="fa fa-briefcase text-sm" aria-hidden="true"></i>
                    <span title="System ownership">Licensed to Bandari Maritime Academy</span>
                </li>
                <li class="flex items-center gap-2 text-blue-600 dark:text-blue-300 font-medium uppercase">
                    <i class="fa fa-user text-sm" aria-hidden="true"></i>
                    <span title="Currently logged in user">Signed In: {{ Auth::user()->name }}</span>
                </li>
            </ul>
        </div>
    </footer>
</x-layouts.app.sidebar>
