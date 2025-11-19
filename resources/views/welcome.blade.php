<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BMA Job Portal</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans antialiased">

    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white py-10">
        <div class="container mx-auto text-center px-4">

            {{-- Logo --}}
            <div class="mb-6 flex justify-center">
                <img src="{{ asset('images/logo-main.png') }}" alt="BMA Logo" class="w-auto">
            </div>

            {{-- Heading --}}
            <h1 class="text-4xl md:text-4xl font-extrabold mb-4">
                Welcome to Bandari Maritime Academy Job Portal
            </h1>

            {{-- Subheading --}}
            <p class="text-lg md:text-xl mb-4">
                Your gateway to career opportunities at the Bandari Maritime Academy.
            </p>

            {{-- Call to Action Buttons --}}
            <div class="flex justify-center gap-4">
                @guest
                    <a href="{{ route('register') }}"
                        class="bg-white text-indigo-600 font-semibold px-6 py-3 rounded-md shadow-md hover:shadow-lg transition">
                        Get Started
                    </a>
                    <a href="{{ route('login') }}"
                        class="bg-transparent border border-white text-white font-semibold px-6 py-3 rounded-md hover:bg-white hover:text-indigo-600 transition">
                        Log In
                    </a>
                @endguest
            </div>
        </div>
    </section>

    {{-- Jobs Section --}}
    <section class="py-8 bg-gray-100">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-5">Available Job Openings</h2>

            {{-- Administrative Jobs --}}
            <h3 class="text-xl font-semibold text-indigo-600 mb-6">Administrative</h3>
            <div class="grid md:grid-cols-3 gap-4 mb-6">
                {{-- Hardcoded Administrative Jobs --}}
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
                            'description' => 'Assist in managing ict equipments, budgeting, and auditing processes.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-11-30'
                        ],
                    ];
                @endphp

                @foreach($adminJobs as $job)
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition flex flex-col justify-between">
                        <div>
                            <h4 class="text-xl font-semibold mb-2 text-indigo-600">{{ $job['title'] }}</h4>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $job['description'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Location:</strong> {{ $job['location'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Deadline:</strong>
                                {{ \Carbon\Carbon::parse($job['deadline'])->format('M d, Y') }}</p>
                        </div>
                        <div class="mt-4 text-center flex justify-center gap-4">
                              <a href="{{ route('login') }}"
                                class="inline-block bg-white text-indigo-600 px-4 py-2 rounded-md shadow hover:bg-gray-100 transition">
                                View Details
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">
                                Apply Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Teaching Jobs --}}
            <h3 class="text-xl font-semibold text-indigo-600 mb-6">Teaching</h3>
            <div class="grid md:grid-cols-3 gap-4">
                {{-- Hardcoded Teaching Jobs --}}
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
                            'description' => 'Conduct classes on swimming, safety at sea, and vessel operations.',
                            'location' => 'Mombasa',
                            'deadline' => '2025-12-10'
                        ],
                    ];
                @endphp

                @foreach($teachingJobs as $job)
                    <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition flex flex-col justify-between">
                        <div>
                            <h4 class="text-xl font-semibold mb-2 text-indigo-600">{{ $job['title'] }}</h4>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $job['description'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Location:</strong> {{ $job['location'] }}</p>
                            <p class="text-sm text-gray-500"><strong>Deadline:</strong>
                                {{ \Carbon\Carbon::parse($job['deadline'])->format('M d, Y') }}</p>
                        </div>
                        <div class="mt-4 text-center flex justify-center gap-4">
                              <a href="{{ route('login') }}"
                                class="inline-block bg-white text-indigo-600 px-4 py-2 rounded-md shadow hover:bg-gray-100 transition">
                                View Details
                            </a>
                            <a href="{{ route('login') }}"
                                class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">
                                Apply Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-100 py-6 mt-12">
        <div class="container mx-auto text-center text-gray-600">
            &copy; {{ date('Y') }} Bandari Maritime Academy Job Portal. All rights reserved.
        </div>
    </footer>

</body>

</html>
