<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMA-Jobs Portal</title>
    @vite('resources/css/app.css')
<!-- Font Awesome v7 -->
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Top Bar (Desktop Only) -->
    <div class="hidden lg:block bg-blue-400 border-b border-gray-300 text-white-700">
        <div class="container mx-auto flex items-center justify-between py-2 px-4 text-sm">
            <!-- Left: Contact Info -->
            <div class="flex gap-6 items-center">
                <span>Admissions: <a href="tel:+254709665011" class="text-white hover:underline">+254 709 665
                        011</a></span>
                <span>Office: <a href="tel:+254709665000" class="text-white hover:underline">+254 709 665
                        000</a></span>
            </div>
            <!-- Right: Social & Actions -->
            <div class="flex gap-6 items-center">
                <!-- Social Links -->
                <div class="flex gap-4">
                    <a href="#" class="flex items-center gap-1 hover:text-white">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i> Facebook
                    </a>
                    <a href="#" class="flex items-center gap-1 hover:text-white">
                        <i class="fab fa-twitter" aria-hidden="true"></i> X-Twitter
                    </a>
                    <a href="#" class="flex items-center gap-1 hover:text-white">
                        <i class="fab fa-instagram" aria-hidden="true"></i> Instagram
                    </a>
                </div>
                <!-- Quick Actions -->
                <div class="flex gap-2">
                    <a href="#"
                        class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 transition">Enquire</a>
                    <a href="#"
                        class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">Apply course</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Hero Section --}}
    <section class="bg-white border-b border-gray-200 py-8">
        <div class="container mx-auto px-6 md:px-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                {{-- Left Side (Logo + Title) --}}
                <div class="flex items-center space-x-4 mb-1">
                    <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" />
                    <div>
                        <flux:heading size="xl" level="2"
                            class="text-indigo-800 font-semibold tracking-wide mb-2 text-3xl md:text-3xl">
                            {{ __('Welcome to Bandari Maritime Academy Job Application Portal') }}
                        </flux:heading>
                        <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                            {{ __('Manage your profile, track applications, and stay updated—fast and simple.') }}
                        </flux:subheading>
                    </div>
                </div>
                {{-- CTA Buttons --}}
                <div class="flex flex-col sm:flex-row gap-2 sm:justify-end">
                    @guest
                        <a href="{{ route('register') }}"
                            class="bg-indigo-600 text-white font-semibold px-8 py-2 rounded-xl shadow-md hover:bg-indigo-700 transition">
                            Get Started
                        </a>
                        <a href="{{ route('login') }}"
                            class="border border-indigo-600 text-indigo-600 font-semibold px-8 py-2 rounded-xl hover:bg-indigo-600 hover:text-white transition">
                            Log In
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>
    {{-- About Section --}}
    <section class="py-6 bg-white">
        <div class="container mx-auto px-6 ">

            <h2 class="text-xl font-semibold text-indigo-700 text-center mb-4">
                About Bandari Maritime Academy (BMA)
            </h2>
            <div class="bg-gray-50 border border-gray-200 p-8 rounded-xl shadow-md">
                <p class="text-gray-700 leading-relaxed text-lg">
                    Bandari Maritime Academy was established through a Legal Notice No. 233 of 28th November 2018, with
                    the
                    mandate to develop academic and vocational skills and provide competent Maritime Human Resource for
                    a
                    Sustainable Blue Economy.
                    Applications are invited from interested qualified persons for the available positions below.
                </p>
            </div>
        </div>
    </section>
    {{-- Job Listings --}}
    <section class="py-5 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-xl font-bold text-gray-800 text-center mb-6">
                Available Job Openings
            </h2>
            {{-- Administrative Jobs --}}
            <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Administrative Positions</h3>
            <div class="grid md:grid-cols-3 gap-6 mb-6">
                @php
                    $adminJobs = [
                        [
                            'title' => 'HR Officer',
                            'description' => 'Manage employee relations, recruitment, and organizational policies.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-12-31'
                        ],
                        [
                            'title' => 'Finance Assistant',
                            'description' => 'Assist in financial reporting, budgeting, and auditing processes.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-11-30'
                        ],
                        [
                            'title' => 'ICT Assistant',
                            'description' => 'Assist in managing ICT equipment, troubleshooting, and system maintenance.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-11-30'
                        ],
                    ];
                @endphp
                @foreach($adminJobs as $job)
                    <div
                        class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition flex flex-col justify-between border border-gray-200">
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-indigo-700">{{ $job['title'] }}</h4>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $job['description'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Location:</strong> {{ $job['location'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Deadline:</strong>
                                {{ \Carbon\Carbon::parse($job['deadline'])->format('M d, Y') }}</p>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('login') }}"
                                class="bg-white border border-indigo-600 text-indigo-600 px-3 py-1 rounded-lg hover:bg-indigo-50 transition">
                                View Details
                            </a>
                            <a href="{{ route('login') }}"
                                class="bg-indigo-600 text-white px-3 py-1 rounded-lg hover:bg-indigo-700 transition">
                                Apply Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Teaching Jobs --}}
            <h3 class="text-2xl font-semibold text-indigo-700 mb-4">Teaching Positions</h3>
            <div class="grid md:grid-cols-3 gap-6">
                @php
                    $teachingJobs = [
                        [
                            'title' => 'Marine Engineering Instructor',
                            'description' => 'Teach marine engineering courses and supervise practical sessions.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-12-15'
                        ],
                        [
                            'title' => 'Navigation Lecturer',
                            'description' => 'Conduct classes on navigation, safety at sea, and vessel operations.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-12-10'
                        ],
                        [
                            'title' => 'Swimming Instructor',
                            'description' => 'Train students on swimming techniques and water safety.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-12-10'
                        ],
                    ];
                @endphp
                @foreach($teachingJobs as $job)
                    <div
                        class="bg-white p-6 rounded-xl shadow hover:shadow-xl transition flex flex-col justify-between border border-gray-200">
                        <div>
                            <h4 class="text-xl font-bold mb-2 text-indigo-700">{{ $job['title'] }}</h4>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $job['description'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Location:</strong> {{ $job['location'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Deadline:</strong>
                                {{ \Carbon\Carbon::parse($job['deadline'])->format('M d, Y') }}</p>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <a href="{{ route('login') }}"
                                class="bg-white border border-indigo-600 text-indigo-600 px-3 py-1 rounded-lg hover:bg-indigo-50 transition">
                                View Details
                            </a>

                            <a href="{{ route('login') }}"
                                class="bg-indigo-600 text-white px-3 py-1 rounded-lg hover:bg-indigo-700 transition">
                                Apply Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="bg-blue-400 py-6 mt-12">
        <div class="container mx-auto text-center text-white">
            &copy; {{ date('Y') }} Bandari Maritime Academy Job Portal. All rights reserved.
        </div>
    </footer>
</body>
</html>
