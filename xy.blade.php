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
    <div class="min-h-screen bg-gray-50 dark:bg-neutral-900 py-10">
    <div class="mx-auto max-w-4xl px-6">

        {{-- Page Title --}}
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                Submit Job Application
            </h1>
            <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                Please review your details and submit your application
            </p>
        </div>

        {{-- Application Card --}}
        <div class="rounded-2xl bg-white dark:bg-neutral-800 shadow-sm border border-gray-200 dark:border-neutral-700">

            {{-- Job Summary --}}
            <div class="border-b border-gray-200 dark:border-neutral-700 p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Job Details
                </h2>

                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500 dark:text-neutral-400">Position</span>
                        <p class="font-medium text-gray-900 dark:text-white">
                            Software Developer
                        </p>
                    </div>
                    <div>
                        <span class="text-gray-500 dark:text-neutral-400">Department</span>
                        <p class="font-medium text-gray-900 dark:text-white">
                            ICT Department
                        </p>
                    </div>
                </div>
            </div>

            {{-- Applicant Confirmation --}}
            <div class="p-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Applicant Declaration
                </h2>

                <p class="mt-3 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed">
                    By submitting this application, you confirm that all the information
                    provided in your profile, including education, experience, and uploaded
                    documents, is accurate and truthful.
                </p>

                {{-- Declaration Checkbox --}}
                <div class="mt-5 flex items-start gap-3">
                    <input
                        id="declaration"
                        type="checkbox"
                        class="mt-1 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                        required
                    >
                    <label for="declaration" class="text-sm text-gray-700 dark:text-neutral-300">
                        I confirm that the information provided is true and correct to the best
                        of my knowledge.
                    </label>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-end">
                    <a
                        href=" "
                        class="inline-flex justify-center rounded-xl border border-gray-300 dark:border-neutral-600 px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-neutral-300 hover:bg-gray-100 dark:hover:bg-neutral-700 transition"
                    >
                        Back to Jobs
                    </a>

                    <form method="POST" action=" ">
                        @csrf
                        <button
                            type="submit"
                            class="inline-flex justify-center rounded-xl bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white hover:bg-indigo-700 transition"
                        >
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
