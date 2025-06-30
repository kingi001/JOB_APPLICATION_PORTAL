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
    <div class="py-1 mt-2 container  mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-md bg-white ">
        <div class="p-2 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-base font-semibold  text-indigo-800">
                <i class="fas fa-user text-blue-500 text-lg"></i>
                {{ __('Section 1 :') }}
                {{ __('Personal Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Please provide your personal information with accuracy.') }}
            </p>
            <div class="bg-yellow-100 text-yellow-800 text-sm px-4 py-2 rounded mb-4 border-l-4 border-yellow-400">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ __('Your profile is 40% complete. Please update your education and work experience.') }}
            </div>

            <!------First Row----->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-2">
                <!---Salutation Field--->
                <flux:field class="w-full text-sm">
                    <div class="flex items-center gap-2 mb-1">
                        <i class="fas fa-handshake text-gray-500"></i>
                        <flux:label badge="Required">Salutation</flux:label>
                    </div>

                    <flux:select name="salutation" required class="w-full text-sm">
                        <option value="">-- Select Salutation --</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                        <option value="Prof">Prof</option>
                    </flux:select>

                    <flux:error name="salutation" />
                </flux:field>
                <!---end of Salutation Field--->

                <!---surname field--->
                <flux:field class="w-full text-xs">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-id-card mr-2 text-gray-500"></i>
                        Surname
                    </flux:label>

                    <flux:input type="text" name="surname" required placeholder="Enter your surname"
                        class="w-full text-xs" />

                    <flux:error name="surname" />
                </flux:field>
                <!---end of surname field--->

                <!---othernames field--->
                <flux:field class="w-full text-xs">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-id-card mr-2 text-gray-500"></i>
                        Other Names
                    </flux:label>

                    <flux:input type="text" name="othernames" required placeholder="Enter your other names"
                        class="w-full text-xs" />

                    <flux:error name="othernames" />
                </flux:field>
                <!---end of othernames field--->

                <!--national id / passport field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-id-badge mr-2 text-gray-500"></i>
                        National ID / Passport
                    </flux:label>

                    <flux:input type="text" name="national_id" required
                        placeholder="Enter your National ID or Passport number" class="w-full text-xs" />

                    <flux:error name="national_id" />
                </flux:field>
                <!--end of national id / passport field--->
            </div>
            <!------Second Row----->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-2">
                <!---Date of Birth Field--->
                <flux:field class="w-full text-sm">
                    <div class="flex items-center gap-2 mb-1">
                        <i class="fas fa-calendar-alt text-gray-500"></i>
                        <flux:label badge="Required">Date of Birth</flux:label>
                    </div>

                    <flux:input type="date" name="date_of_birth" required class="w-full text-sm" />

                    <flux:error name="date_of_birth" />
                </flux:field>
                <!---end of Date of Birth field--->

                <!---gender field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-venus-mars mr-2 text-gray-500"></i>
                        Gender
                    </flux:label>

                    <div class="flex items-center gap-6 mt-2">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="Male" required class="text-sm" />
                            Male
                        </label>

                        <label class="flex items-center gap-2">
                            <input type="radio" name="gender" value="Female" required class="text-sm" />
                            Female
                        </label>
                    </div>

                    <flux:error name="gender" />
                </flux:field>
                <!---end of gender field--->

                <!---county field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-map-marker-alt mr-2 text-gray-500"></i>
                        County
                    </flux:label>

                    <flux:select name="county" required class="w-full text-sm">
                        <option value="">-- Select County --</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="Kilifi">Kilifi</option>
                        <option value="Nairobi">Nairobi</option>
                        <option value="Kisumu">Kisumu</option>
                        <option value="Nakuru">Nakuru</option>
                    </flux:select>

                    <flux:error name="county" />
                </flux:field>
                <!---end of county field--->

                <!---ethnicity field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-users mr-2 text-gray-500"></i>
                        Ethnicity
                    </flux:label>

                    <flux:select name="ethnicity" required class="w-full text-sm">
                        <option value="">-- Select Ethnicity --</option>
                        <option value="Luo">Luo</option>
                        <option value="Kikuyu">Kikuyu</option>
                        <option value="Luhya">Luhya</option>
                        <option value="Kalenjin">Kalenjin</option>
                        <option value="Mijikenda">Mijikenda</option>
                    </flux:select>

                    <flux:error name="ethnicity" />
                </flux:field>
                <!---end of ethnicity field--->
            </div>
            <!------Third Row----->
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-2">
                <!---mobile number field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-phone mr-2 text-gray-500"></i>
                        Mobile Number
                    </flux:label>

                    <flux:input type="tel" name="phone_number" required placeholder="e.g. 0712345678"
                        pattern="^0[1-9]\d{8}$" class="w-full text-sm" />

                    <flux:error name="phone_number" />
                </flux:field>
                <!---end of mobile number field--->

                <!---postal code field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-envelope mr-2 text-gray-500"></i>
                        Postal Code
                    </flux:label>

                    <flux:input type="text" name="postal_code" required placeholder="e.g. 80100" pattern="^\d{5}$"
                        class="w-full text-sm" />

                    <flux:error name="postal_code" />
                </flux:field>
                <!---end of postal code field--->

                <!---alternative email address field (optional)--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Optional">
                        <i class="fa-solid fa-envelope-open-text mr-2 text-gray-500"></i>
                        Alternative Email Address
                    </flux:label>

                    <flux:input type="email" name="alternative_email" placeholder="e.g. example@gmail.com"
                        class="w-full text-sm" />

                    <flux:error name="alternative_email" />
                </flux:field>
                <!---end of alternative email address field--->
                <!---religion field--->
                <flux:field class="w-full text-sm">
                    <flux:label badge="Optional">
                        <i class="fa-solid fa-place-of-worship mr-2 text-gray-500"></i>
                        Religion
                    </flux:label>

                    <flux:select name="religion" required class="w-full text-sm">
                        <option value="">-- Select Religion --</option>
                        <option value="Christianity">Christianity</option>
                        <option value="Islam">Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Other">Other</option>
                    </flux:select>

                    <flux:error name="religion" />
                </flux:field>
                <!---end of religion field--->
            </div>
            <!------Fourth Row----->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-center pt-4 "
                x-data="{ hasDisability: '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}' }"
                x-init="hasDisability = '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}'">

                <!-- Person with Disability (Radio Buttons) -->
                <flux:field class="w-full text-sm">
                    <div class="flex items-center gap-2 mb-1">
                        <i class="fa-solid fa-wheelchair text-gray-500"></i>
                        <flux:label badge="Optional">Person with Disability</flux:label>
                    </div>
                    <div class="flex items-center gap-6 mt-1">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="is_pwd" value="1" x-model="hasDisability"
                                class="form-radio text-indigo-600 focus:ring-indigo-500" required>
                            <span>Yes</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="is_pwd" value="0" x-model="hasDisability"
                                class="form-radio text-indigo-600 focus:ring-indigo-500" required>
                            <span>No</span>
                        </label>
                    </div>
                    <flux:error name="is_pwd" />
                </flux:field>
                <!-- Disability Type Dropdown (Visible if Yes is selected) -->
                <div x-show="hasDisability == 1" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="pwd_type" badge="Required">
                            <i class="fas fa-universal-access mr-2 text-gray-500"></i>
                            {{ __('Disability Type') }}
                        </flux:label>

                        <flux:select name="pwd_type" id="pwd_type"
                            class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                            x-bind:required="hasDisability == 1">
                            <option value="">--Select Disability Type--</option>
                            <option value="visual" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'visual' ? 'selected' : '' }}>
                                Visual Impairment
                            </option>
                            <option value="hearing" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'hearing' ? 'selected' : '' }}>
                                Hearing Impairment
                            </option>
                            <option value="physical" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'physical' ? 'selected' : '' }}>
                                Physical Disability
                            </option>
                            <option value="mental" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'mental' ? 'selected' : '' }}>
                                Mental Disability
                            </option>
                            <option value="other" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </flux:select>

                        <flux:error name="pwd_type" />
                    </flux:field>
                </div>

                <!-- Registration No (Visible if Yes is selected) -->
                <div x-show="hasDisability == 1" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="ncpwd_number" badge="Required"
                            class="text-gray-700 font-medium flex items-center gap-1">
                            <i class="fas fa-id-card text-sm"></i>
                            {{ __('NCPWD Number') }}
                        </flux:label>
                        <flux:input id="ncpwd_number" name="ncpwd_number" type="text" class="w-full text-sm"
                            value="{{ old('ncpwd_number', $personalInformation->ncpwd_number ?? '') }}"
                            x-bind:required="hasDisability == 1" placeholder="Enter your NCPWD Number" />
                        <flux:error name="ncpwd_number" />
                    </flux:field>
                </div>
            </div>

            <flux:separator variant="subtle" class="my-2" />

            <h2 class="text-base font-semibold text-indigo-800 mt-6">
                <i class="fas fa-id-badge text-blue-500 text-lg"></i>
                {{ __('Section 2 :') }}
                {{ __('Internal Applicant') }}
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center py-2"
                x-data="{ isApplicant: '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}' }"
                x-init="isApplicant = '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}'">

                <!-- Are you an applicant in BMA? -->
                <div class="flex items-center space-x-4">
                    <label for="bma_applicant" class="block text-sm font-medium text-gray-700 mb-1">
                        <i
                            class="fas fa-universal-access mr-2 text-gray-500"></i>{{ __('Are you an applicant in Bandari Maritime Academy?') }}
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="bma_applicant" value="yes"
                            class="form-radio text-sm text-indigo-600 focus:ring-indigo-500" x-model="isApplicant" required>
                        <span class="ml-2 text-sm">Yes</span>
                    </label>

                    <label class="flex items-center">
                        <input type="radio" name="bma_applicant" value="no"
                            class="form-radio text-sm text-indigo-600 focus:ring-indigo-500" x-model="isApplicant" required>
                        <span class="ml-2">No</span>
                    </label>
                </div>
                <!-- Department Selection -->
                <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="department" badge="Required">
                            <i class="fas fa-building mr-2 text-gray-500"></i>
                            {{ __('Department') }}
                        </flux:label>

                        <flux:select name="department" id="department" class="w-full text-sm"
                            x-bind:required="isApplicant === '1'">
                            <option value="">--Select Department--</option>
                            <option value="ICT" {{ old('department', $personalInformation->department ?? '') == 'ICT' ? 'selected' : '' }}>ICT</option>
                            <option value="maritime_affairs" {{ old('department', $personalInformation->department ?? '') == 'maritime_affairs' ? 'selected' : '' }}>Maritime Affairs</option>
                            <option value="port_operations" {{ old('department', $personalInformation->department ?? '') == 'port_operations' ? 'selected' : '' }}>Port Operations</option>
                            <option value="finance" {{ old('department', $personalInformation->department ?? '') == 'finance' ? 'selected' : '' }}>Finance</option>
                            <option value="hr" {{ old('department', $personalInformation->department ?? '') == 'hr' ? 'selected' : '' }}>
                                Human Resources</option>
                            <option value="other" {{ old('department', $personalInformation->department ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </flux:select>

                        <flux:error name="department" />
                    </flux:field>
                </div>
                <!-- Designation Input -->
                <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="designation" badge="Required">
                            <i class="fas fa-id-badge mr-2 text-gray-500"></i>
                            {{ __('Designation') }}
                        </flux:label>

                        <flux:input id="designation" name="designation" type="text" class="w-full text-sm"
                            value="{{ old('designation', $personalInformation->designation ?? '') }}"
                            x-bind:required="isApplicant === '1'" placeholder="Enter your designation" />

                        <flux:error name="designation" />
                    </flux:field>
                </div>

                <!-- Terms of Service -->
                <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="terms_of_service" badge="Required">
                            <i class="fas fa-file-contract mr-2 text-gray-500"></i>
                            {{ __('Terms of Service') }}
                        </flux:label>

                        <flux:select name="terms_of_service" id="terms_of_service" class="w-full text-sm"
                            x-bind:required="isApplicant === '1'">
                            <option value="">--Select Terms of Service--</option>
                            <option value="permanent" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                            <option value="contract" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
                            <option value="internship" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'internship' ? 'selected' : '' }}>Internship</option>
                            <option value="casual" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'casual' ? 'selected' : '' }}>Casual</option>
                        </flux:select>

                        <flux:error name="terms_of_service" />
                    </flux:field>
                </div>
                <!-- Job Scale -->
                <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="job_scale" badge="Required">
                            <i class="fas fa-layer-group mr-2 text-gray-500"></i>
                            {{ __('Job Scale') }}
                        </flux:label>

                        <flux:select name="job_scale" id="job_scale" class="w-full text-sm"
                            x-bind:required="isApplicant === '1'">
                            <option value="">--Select Job Scale--</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="bma{{ $i }}" {{ old('job_scale', $personalInformation->job_scale ?? '') == "bma$i" ? 'selected' : '' }}>
                                    BMA {{ $i }}
                                </option>
                            @endfor
                        </flux:select>

                        <flux:error name="job_scale" />
                    </flux:field>
                </div>

                <!-- Date of Appointment -->
                <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                    <flux:field class="w-full text-sm">
                        <flux:label for="date_of_appointment" badge="Required">
                            <i class="fas fa-calendar-check mr-2 text-gray-500"></i>
                            {{ __('Date of Appointment') }}
                        </flux:label>

                        <flux:input id="date_of_appointment" name="date_of_appointment" type="date" class="w-full text-sm"
                            value="{{ old('date_of_appointment', $personalInformation->date_of_appointment ?? '') }}"
                            x-bind:required="isApplicant === '1'" />

                        <flux:error name="date_of_appointment" />
                    </flux:field>
                </div>

            </div>

            <flux:separator variant="subtle" class="my-2" />
            <!-- Section 3: Other Personal Details -->
            <div>
                <h2 class="text-base font-semibold text-indigo-800 flex items-center space-x-2">
                    <i class="fas fa-id-badge text-blue-500 text-xl"></i>
                    <span>{{ __('Section 3: Other Personal Details') }}</span>
                </h2>
                @php
$criminalOffense = old('criminal_offense', $personalInformation->criminal_offense ?? 'no');
$criminalDetails = old('criminal_details', $personalInformation->criminal_details ?? '');
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4 text-sm"
                    x-data="{ criminal_offense: '{{ $criminalOffense }}' }">
                    <!-- Criminal Offense Question -->
                    <div class="col-span-3">
                        <flux:field>
                            <flux:label class="text-gray-700 flex items-start gap-2">
                                <i class="fas fa-gavel text-red-500 text-base mt-0.5"></i>
                                {{ __('Have you ever been convicted of any criminal offence or been subject to a probation order?') }}
                            </flux:label>

                            <div class="flex items-center gap-6 mt-2">
                                <label class="flex items-center gap-2">
                                    <input type="radio" name="criminal_offense" value="yes"
                                        class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense"
                                        {{ $criminalOffense == 'yes' ? 'checked' : '' }} required>
                                    <span>Yes</span>
                                </label>

                                <label class="flex items-center gap-2">
                                    <input type="radio" name="criminal_offense" value="no"
                                        class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense"
                                        {{ $criminalOffense == 'no' ? 'checked' : '' }} required>
                                    <span>No</span>
                                </label>
                            </div>
                            <flux:error name="criminal_offense" />
                        </flux:field>
                    </div>

                    <!-- Criminal Details Textarea (conditionally shown) -->
                    <div x-show="criminal_offense === 'yes'" x-transition x-cloak class="col-span-3">
                        <flux:field class="w-full text-sm">
                            <flux:label for="criminal_details" badge="Required"
                                class="flex items-start gap-2 text-gray-700">
                                <i class="fas fa-info-circle text-yellow-500 text-base mt-0.5"></i>
                                {{ __('If Yes, state the nature of the offense, the year, and duration of conviction') }}
                            </flux:label>

                            <flux:textarea id="criminal_details" name="criminal_details"
                                x-bind:required="criminal_offense === 'yes'">
                                {{ $criminalDetails }}
                            </flux:textarea>

                            <flux:error name="criminal_details" />
                        </flux:field>
                    </div>

                </div>

            </div>

            <flux:separator variant="subtle" class="my-2" />
            <!-- Section 4: Declaration -->
    <div >
        <h2 class="text-base font-semibold text-indigo-800 flex items-center gap-3 mb-2">
            <i class="fas fa-file-signature text-blue-600 text-base"></i>
            <span>{{ __('Section 4: Declaration') }}</span>
        </h2>

        <p class="text-sm text-gray-700 mb-4 leading-relaxed">
            {{ __('By submitting this form, you declare that the information provided is true, accurate, and complete to the best of your knowledge and belief. Providing false or misleading information may result in disqualification or disciplinary action.') }}
        </p>

        <flux:field>
            <flux:checkbox name="declaration" required>
                <span class="text-sm text-gray-800 leading-snug">
                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                    {{ __('I confirm that I have read and understood the above declaration and affirm its truthfulness.') }}
                </span>
            </flux:checkbox>
            <flux:error name="declaration" />
        </flux:field>
    </div>


            <flux:separator variant="subtle" class="my-2" />


            <!-- Submit Button -->
            <div class="mt-1 flex justify-end">
                <flux:button type="submit" variant="primary" color="indigo" size="sm">
                    <i class="fas fa-save mr-2 text-sm"></i>
                    {{ isset($personalInformation->id) ? __('Update Personal Information') : __('Save Personal Information') }}
                </flux:button>
            </div>


        </div>
    </div>
</div>
