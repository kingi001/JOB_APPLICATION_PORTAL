<x-layouts.app :title="__('Dashboard')">
    <div class="relative mb-1 w-full  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 mb-1">
            <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
            <div>
                <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                    {{ __('Welcome to Bandari Maritime Academy Job Application Portal') }}
                </flux:heading>
                <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                    {{ __('Manage your profile,education,employment , submit ,track applications, and update your account settings with ease.') }}
                </flux:subheading>
            </div>
        </div>
        <flux:separator variant="subtle" />
    </div>
    <main class=" mx-auto w-full px-4 sm:px-6 lg:px-8 mt-4">
        <!-- Grid Summary Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Active Applications -->
            <div
                class="p-8 bg-blue-100 rounded-lg shadow-md flex items-start gap-4 hover:scale-105 hover:shadow-lg transition-transform">
                <i class="fas fa-check-circle text-blue-600 text-3xl"></i>
                <div class="space-y-1">
                    <h3 class="font-semibold text-blue-900 text-lg">Active Applications</h3>
                    <p class="text-sm text-gray-700">
                        There are <span class="font-semibold">0</span> active/open applications.
                    </p>
                </div>
            </div>
            <!-- Jobs Applied -->
            <div
                class="p-8 bg-green-100 rounded-lg shadow-md flex items-start gap-4 hover:scale-105 hover:shadow-lg transition-transform">
                <i class="fas fa-clipboard-check text-green-600 text-3xl"></i>
                <div class="space-y-1">
                    <h3 class="font-semibold text-green-900 text-lg">Jobs Applied</h3>
                    <p class="text-sm text-gray-700">
                        You have <span class="font-semibold">0</span> applied jobs.
                    </p>
                </div>
            </div>
            <!-- Application Status -->
            <div
                class="p-8 bg-yellow-100 rounded-lg shadow-md flex items-start gap-4 hover:scale-105 hover:shadow-lg transition-transform">
                <i class="fas fa-paper-plane text-yellow-600 text-3xl"></i>
                <div class="space-y-1">
                    <h3 class="font-semibold text-yellow-900 text-lg">Application Status</h3>
                    <p class="text-sm text-gray-700">Review your application progress here.</p>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
            <div class="bg-white shadow rounded-xl p-5 border-l-4 border-blue-600">
                <h3 class="text-sm text-gray-500">Total Applications</h3>
                <p class="text-2xl font-bold text-blue-800">0</p>
            </div>
            <div class="bg-white shadow rounded-xl p-5 border-l-4 border-yellow-500">
                <h3 class="text-sm text-gray-500">Pending</h3>
                <p class="text-2xl font-bold text-yellow-600">0</p>
            </div>
            <div class="bg-white shadow rounded-xl p-5 border-l-4 border-green-500">
                <h3 class="text-sm text-gray-500">Shortlisted</h3>
                <p class="text-2xl font-bold text-green-600">0</p>
            </div>
            <div class="bg-white shadow rounded-xl p-5 border-l-4 border-red-500">
                <h3 class="text-sm text-gray-500">Rejected</h3>
                <p class="text-2xl font-bold text-red-600">0</p>
            </div>
        </div>
    </main>

    <!-- Job Listings -->
    <div class="py-3">
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <!-- Header -->
                <div class="p-2 text-base font-semibold text-indigo-700 border-b border-gray-100 flex items-center">
                    <i class="fas fa-briefcase text-blue-600 mr-2"></i>
                    {{ __('Job Listings') }}
                </div>

                <!-- Desktop Table View -->
                <div class="overflow-x-auto mt-1 hidden md:block">
                    @if ($vacancies->isEmpty())
                        <div
                            class="text-center py-6 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                            <div class="flex justify-center mb-3">
                                <i class="fas fa-briefcase-slash text-5xl text-gray-400"></i>
                            </div>
                            <h3 class="text-base font-semibold text-gray-700">
                                <i class="fas fa-circle-info mr-1"></i> No Vacancies Available
                            </h3>
                            <p class="text-sm text-gray-500 mt-2">
                                There are currently no open positions. Please check back later or follow us for updates.
                            </p>
                        </div>
                    @else
                        <div class="rounded-lg overflow-hidden shadow border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200 text-sm">
                                <thead
                                    class="bg-indigo-50 text-indigo-800 uppercase text-xs font-semibold tracking-wider">
                                    <tr>
                                        <th class="text-left px-4 py-3">#</th>
                                        <th class="text-left px-4 py-3">Ref No</th>
                                        <th class="text-left px-4 py-3">Position</th>
                                        <th class="text-left px-4 py-3">Grade</th>
                                        <th class="text-left px-4 py-3">Requirements</th>
                                        <th class="text-left px-4 py-3">Duties</th>
                                        <th class="text-left px-4 py-3">Status</th>
                                        <th class="text-left px-4 py-3">Deadline</th>
                                        <th class="text-left px-4 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 text-gray-700 bg-white">
                                    @foreach ($vacancies as $vacancy)
                                        <tr class="hover:bg-gray-50 transition duration-200">
                                            <td class="px-4 py-3 whitespace-nowrap text-gray-800">{{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-3 font-semibold text-blue-600 whitespace-nowrap">
                                                <a href=" ">{{ $vacancy->ref_no }}</a>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">{{ $vacancy->position }}</td>
                                            <td class="px-4 py-3">{{ $vacancy->job_grade }}</td>
                                            <td class="px-4 py-3">{{ Str::limit($vacancy->requirements, 30, '...') }}
                                            </td>
                                            <td class="px-4 py-3">{{ Str::limit($vacancy->duties, 30, '...') }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                @php
                                                    $isOpen = strtolower($vacancy->status) === 'open';
                                                @endphp
                                                <span
                                                    class="inline-flex items-center gap-1 px-3 py-1.5 text-xs font-semibold rounded-full border
                                    {{ $isOpen ? 'text-green-800 bg-green-200 border-green-300 hover:bg-green-300' : 'text-red-800 bg-red-100 border-red-300' }}">
                                                    <i
                                                        class="fas {{ $isOpen ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                                    {{ ucfirst($vacancy->status) }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('d/m/Y') }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                @if ($vacancy->status === 'open')
                                                    <form action=" " method="POST">
                                                        @csrf
                                                        <input type="hidden" name="cover_letter"
                                                            value="I'm interested in this role.">
                                                        <button type="submit"
                                                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded hover:from-blue-700 hover:to-blue-900 transition">
                                                            <i class="fas fa-paper-plane mr-1"></i> Apply
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-400 text-xs italic">Closed</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <!-- Mobile View -->
                <div class="sm:block md:hidden mt-4 space-y-4">
                    @if ($vacancies->isEmpty())
                        <div
                            class="text-center py-4 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                            <div class="flex justify-center mb-3">
                                <i class="fas fa-briefcase-slash text-4xl text-gray-400"></i>
                            </div>
                            <h3 class="text-base font-semibold text-gray-700"><i class="fas fa-circle-info"></i> No
                                Vacancies Available</h3>
                            <p class="text-sm text-gray-500 mt-2">
                                There are currently no open positions. Please check back later or follow us for updates.
                            </p>
                        </div>
                    @else
                        @foreach ($vacancies as $vacancy)
                            <div class="bg-white border rounded-lg shadow-sm p-4">
                                <div class="flex justify-between items-center mb-2">
                                    <h3 class="font-bold text-blue-800">{{ $vacancy->position }}</h3>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full border
                        {{ strtolower($vacancy->status) === 'open' ? 'text-green-700 bg-green-100 border-green-300' : 'text-red-700 bg-red-100 border-red-300' }}">
                                        <i
                                            class="fas {{ strtolower($vacancy->status) === 'open' ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                        {{ ucfirst($vacancy->status) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600"><strong>Ref No:</strong> {{ $vacancy->ref_no }}</p>
                                <p class="text-sm text-gray-600"><strong>Grade:</strong> {{ $vacancy->job_grade }}</p>
                                <p class="text-sm text-gray-600"><strong>Requirements:</strong>
                                    {{ Str::limit($vacancy->requirements, 30) }}</p>
                                <p class="text-sm text-gray-600"><strong>Duties:</strong>
                                    {{ Str::limit($vacancy->duties, 30) }}</p>
                                <p class="text-sm text-gray-600"><strong>Deadline:</strong>
                                    {{ \Carbon\Carbon::parse($vacancy->application_deadline)->format('d/m/Y') }}</p>

                                <div class="mt-3">
                                    @if ($vacancy->status === 'open')
                                        <form action=" " method="POST">
                                            @csrf
                                            <input type="hidden" name="cover_letter"
                                                value="I'm interested in this role.">
                                            <button type="submit"
                                                class="w-full inline-flex items-center justify-center gap-2 px-4 py-2 text-xs font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-800 rounded-lg hover:from-blue-700 hover:to-blue-900 transition">
                                                <i class="fas fa-paper-plane"></i> Apply
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500 text-xs">Closed</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>


            </div>
        </div>
    </div>

    <div class="py-1">
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-xl overflow-hidden">
                <!-- My Job Applications Header -->
                <div class="p-2 text-base font-semibold text-indigo-700 border-b border-gray-100 flex items-center">
                    <i class="fas fa-check-circle text-blue-600 mr-2"></i>
                    {{ __('My Job Applications') }}
                </div>
                <div class="overflow-x-auto hidden md:block mt-1">
                    <div
                        class="text-center py-4 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-briefcase-slash text-1xl text-gray-400"></i>
                        </div>
                        <h3 class="text-base font-semibold text-gray-700"><i class="fas fa-circle-info mr-1"></i>You
                            haven’t submitted any job
                            applications yet.</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Your job applications will be displayed here.
                        </p>
                    </div>
                </div>
                <!-- Mobile View -->
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class=" mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <div class="p-2 text-base font-medium text-indigo-700 flex items-center">
                    <i class="fas fa-tasks text-blue-500 mr-2"></i>
                    {{ __('Application Status Tracker') }}
                </div>
                <div class="overflow-x-auto hidden md:block mt-1">
                    <div
                        class="text-center py-4 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-briefcase-slash text-1xl text-gray-400"></i>
                        </div>
                        <h3 class="text-base font-semibold text-gray-700"><i class="fas fa-circle-info"></i>You
                            haven’t
                            submitted any job
                            applications yet.</h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Your application status will be displayed here.
                        </p>
                    </div>

                    <!-- Desktop View -->
                    <!-- Mobile View -->
                </div>
            </div>
        </div>
        <div class="py-2">
            <div class=" mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="p-1 flex items-center border-b border-gray-200">
                        <i class="fas fa-file-upload text-indigo-600 text-lg mr-2"></i>
                        <h2 class="text-base font-medium text-indigo-700">
                            {{ __('Uploaded Documents') }}
                        </h2>
                    </div>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-1 p-4 text-sm text-gray-800">
                        <li class="flex justify-between items-center bg-gray-50 p-1 rounded-md hover:bg-gray-100">
                            <span>Application Letter</span>
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li class="flex justify-between items-center bg-gray-50 p-1 rounded-md hover:bg-gray-100">
                            <span>Academic Certificates</span>
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li class="flex justify-between items-center bg-gray-50 p-1 rounded-md hover:bg-gray-100">
                            <span>ID/Passport</span>
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                        <li class="flex justify-between items-center bg-gray-50 p-1 rounded-md hover:bg-gray-100">
                            <span>Professional Certificates</span>
                            <span class="inline-flex items-center gap-1 text-yellow-600 font-semibold">
                                <i class="fas fa-exclamation-circle"></i> Missing
                            </span>
                        </li>
                        <li class="flex justify-between items-center bg-gray-50 p-1 rounded-md hover:bg-gray-100">
                            <span>Referees</span>
                            <span class="inline-flex items-center gap-1 text-yellow-600 font-semibold">
                                <i class="fas fa-exclamation-circle"></i> Missing
                            </span>
                        </li>
                        <li class="flex justify-between items-center bg-gray-50 p-3 rounded-md hover:bg-gray-100">
                            <span>Membership to Professional Bodies</span>
                            <span class="inline-flex items-center gap-1 text-green-600 font-semibold">
                                <i class="fas fa-check-circle"></i> Uploaded
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

</x-layouts.app>
