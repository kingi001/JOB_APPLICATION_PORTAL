<section class="bg-white border-b border-gray-200 py-8">
        <div class="container mx-auto px-6 md:px-12">

            <div class="flex flex-col md:flex-row items-center md:items-center justify-start gap-6">
                {{-- Logo --}}
                <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" class="w-32 md:w-40 lg:w-48">

                {{-- Title & CTA --}}
                <div class="flex flex-col items-center md:items-start space-y-3">

                    <h1
                        class="text-2xl md:text-3xl lg:text-4xl font-bold text-indigo-700 whitespace-nowrap leading-tight mr-5">
                        Welcome to Bandari Maritime Academy Job Application Portal
                    </h1>

                    <p class="text-base md:text-lg text-gray-600 max-w-lg md:text-left text-center">
                        Your gateway to career opportunities at the Bandari Maritime Academy.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-2 sm:justify-end">
                        @guest
                            <a href="{{ route('register') }}"
                                class="bg-indigo-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                                Get Started
                            </a>

                            <a href="{{ route('login') }}"
                                class="border border-indigo-600 text-indigo-600 font-semibold px-6 py-3 rounded-lg hover:bg-indigo-600 hover:text-white transition">
                                Log In
                            </a>
                        @endguest
                    </div>
                </div>

            </div>

        </div>
    </section>
