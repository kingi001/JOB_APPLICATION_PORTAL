<x-layouts.app>
    <div class="relative mb-6 w-full  mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center space-x-4 mb-1">
            <img src="{{ asset('images/logo.png') }}" alt="BMA Logo" />
            <div>
                <flux:heading size="xl" level="2" class="text-indigo-800 font-semibold tracking-wide mb-2">
                    {{ __('Welcome to Bandari Maritime Academy E-Recruitment Portal') }}
                </flux:heading>
                <flux:subheading size="base" class="text-gray-600 leading-relaxed max-w-4xl">
                    {{ __('Manage your profile, track applications, and update your account settings with ease.') }}
                </flux:subheading>
            </div>
        </div>
        <flux:separator variant="subtle" />
    </div>
    <div class="py-1 container  mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-md bg-white ">
        <div class="p-2 bg-white border-b border-gray-100 rounded-lg">
            <h2 class="text-base font-medium  text-indigo-700">
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
            <!----Form Section 1: Personal Information---->
            <form method="POST" action="{{ route('personal-info.store', $personalInformation->id ?? '') }}" class="rounded-lg">
                @csrf
                @method('POST')

                <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-2">

                    <!----First Row: Salutation, Surname, Other Names, National ID Number---->
                    <!-- Salutation -->
                    <div class="w-full">
                        <!-- Optional: Label with icon -->
                        <label for="salutation" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-handshake mr-2 text-gray-500"></i>{{ __('Salutation') }}
                        </label>

                        <div class="relative">

                          <flux:select
                                id="salutation"
                                name="salutation"
                                class="w-full text-sm"
                                {{-- :options="$salutations" --}}
                                placeholder="--Select Salutation--"
                                {{-- :selected="old('salutation', $personalInformation->salutation ?? '')" --}}
                            />
                        </div>

                        {{-- @error('salutation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>


                    <!-- Surname -->
                    <div class="w-full">
                        <!-- Label with optional icon -->
                        <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fa-solid fa-id-card mr-2 text-gray-500"></i>{{ __('Surname') }}
                        </label>

                        <div class="relative">
                            <!-- Input field with left padding for icon -->
                            <flux:input
                                id="surname"
                                name="surname"
                                type="text"
                                class="w-full text-sm"
                                placeholder="Enter your Surname"
                                {{-- :value="old('surname', $personalInformation->surname ?? '')" --}}
                                required
                            />
                        </div>

                        {{-- @error('surname')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>
{{--
                    <flux:field>
    <flux:label badge="Required">Email</flux:label>
    <flux:input type="email" required       class="w-full text-sm"
                                placeholder="Enter your Surname"/>
    <flux:error name="email" />
</flux:field> --}}


                    <!-- Other Names -->
                    <div class="w-full">
                        <!-- Label with icon (optional inline) -->
                        <label for="other_names" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-user mr-2 text-gray-500"></i>{{ __('Other Names') }}
                        </label>

                        <div class="relative">
                            <!-- Input with padding-left to avoid overlap with icon -->
                            <flux:input
                                id="other_names"
                                name="other_names"
                                type="text"
                                class="w-full text-sm"
                                placeholder="Enter your Other Names"
                                {{-- :value="old('other_names', $personalInformation->other_names ?? '')" --}}
                                required
                            />
                        </div>

                        {{-- @error('other_names')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>


                    <!-- National ID Number -->
                    <div class="w-full">
                        <!-- Label with optional icon inline -->
                        <label for="national_id_number" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-id-card mr-2 text-gray-500"></i>{{ __('National ID Number') }}
                        </label>

                        <div class="relative">



                            <!-- Input field with left padding for icon space -->
                            <flux:input
                                id="national_id_number"
                                name="national_id_number"
                                type="text"
                                class="w-full text-sm"
                                placeholder="Enter your ID Number"
                                :value="old('national_id_number', $personalInformation->national_id_number ?? '')"
                                required
                            />
                        </div>

                        {{-- @error('national_id_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                    </div>


                    <!-- Second Row---->

                  <!-- Ethnicity -->
                    <div class="w-full">
                        <label for="ethnicity" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-users mr-2 text-gray-500"></i>{{ __('Ethnicity') }}
                        </label>
                        <div class="relative">

                            <flux:select
                                id="ethnicity"
                                name="ethnicity"
                                class="w-full text-sm"
                            >
                                <option value="">Select Ethnicity</option>
                                <option value="Luhya">Luhya</option>
                                <option value="Kikuyu">Kikuyu</option>
                            </flux:select>
                        </div>
                    </div>

                        <!-- County -->
                        <div class="w-full">
                            <label for="county" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-map-marker-alt mr-2 text-gray-500"></i>{{ __('County') }}
                            </label>
                            <div class="relative">

                                <flux:select
                                    id="county"
                                    name="county"
                                    class="w-full text-sm"
                                >
                                    <option value="">Select County</option>
                                    <option value="Kilifi">Kilifi</option>
                                    <option value="Nairobi">Nairobi</option>
                                </flux:select>
                            </div>
                        </div>

                    <!-- Subcounty -->
                    <div class="w-full">
                        <label for="subcounty" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-map mr-2 text-gray-500"></i>{{ __('Subcounty') }}
                        </label>
                        <div class="relative">

                            <flux:select
                                id="subcounty"
                                name="subcounty"
                                class="w-full text-sm"
                            >
                                <option value="">Select Subcounty</option>
                                <option value="Malindi">Malindi</option>
                                <option value="Langata">Langata</option>
                            </flux:select>
                        </div>
                    </div>

                        <!-- Ward -->
                        <div class="w-full">
                            <label for="ward" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-map-pin mr-2 text-gray-500"></i>{{ __('Ward') }}
                            </label>
                            <div class="relative">

                                <flux:select
                                    id="ward"
                                    name="ward"
                                    class="w-full text-sm"
                                >
                                    <option value="">Select Ward</option>
                                    <option value="Jilore">Jilore</option>
                                    <option value="Karen">Karen</option>
                                </flux:select>
                            </div>
                        </div>
                </div>


                        <!--Third Row---->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 mt-2">
                            <!-- Date of Birth -->
                            <div class="w-full">
                                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-calendar-alt mr-2 text-gray-500"></i>{{ __('Date of Birth') }}
                                </label>
                                <flux:input
                                    id="date_of_birth"
                                    name="date_of_birth"
                                    type="date"
                                    class="w-full text-sm"
                                    placeholder="YYYY-MM-DD"
                                    {{-- :value="old('date_of_birth', $personalInformation->date_of_birth ?? '')" --}}
                                />
                            </div>

                            <!-- Gender -->
                            <div class="w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-venus-mars mr-2 text-gray-500"></i>{{ __('Gender') }}
                                </label>
                                <div class="flex items-center space-x-4 pl-2 mt-3">
                                    <label class="flex items-center text-sm text-gray-700">
                                        <input type="radio" name="gender" value="Male" class="text-indigo-600 focus:ring-indigo-500" />
                                        <span class="ml-1">Male</span>
                                    </label>
                                    <label class="flex items-center text-sm text-gray-700 ">
                                        <input type="radio" name="gender" value="Female" class="text-indigo-600 focus:ring-indigo-500" />
                                        <span class="ml-1">Female</span>
                                    </label>
                                </div>
                            </div>

                                <!-- Religion -->
                            <div>
                                <label for="religion" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-praying-hands mr-2 text-gray-500"></i>{{ __('Religion') }}
                                </label>
                                <div class="relative">

                                    <flux:select
                                        id="religion"
                                        name="religion"
                                        class="w-full text-sm"
                                    >
                                        <option value="">Select Religion</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Islam">Islam</option>
                                    </flux:select>
                                </div>
                            </div>

                                <!-- Mobile Number -->
                            <div class="w-full">
                                <label for="mobile_number" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-phone-alt mr-2 text-gray-500"></i>{{ __('Mobile Number') }}
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-3 flex items-center text-gray-500 pointer-events-none">
                                        <i class="fas fa-phone-alt"></i>
                                    </span>
                                    <flux:input
                                        id="mobile_number"
                                        name="mobile_number"
                                        type="text"
                                        placeholder="07XXXXXXXX"
                                        class="w-full text-sm"
                                    />
                                </div>
                            </div>
                            <!---Postal Code-->
                            <div>
                                <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-mail-bulk mr-2 text-gray-500"></i>{{ __('Postal Code') }}
                                </label>
                                <div class="relative">

                                    <flux:input
                                        id="postal_code"
                                        name="postal_code"
                                        type="text"
                                        placeholder="e.g. 80100"
                                        class="w-full text-sm"
                                        {{-- :value="old('postal_code', $personalInformation->postal_code ?? '')" --}}
                                        required
                                    />
                                </div>
                            </div>
                        </div>

                                                    <!-- 5th Row: Disability Status -->
                            <!-- 5th Row: Disability Status -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-start pt-4"
                        x-data="{ hasDisability: '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}' }"
                        x-init="hasDisability = '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}'">

                        <!-- Disability Status (Radio Buttons) -->
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-wheelchair mr-2 text-gray-500"></i>{{ __('Person With  Disability') }}
                            </label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center text-sm text-gray-700">
                                <input type="radio" name="is_pwd" value="1"
                                        class="form-radio text-indigo-600 focus:ring-indigo-500"
                                        x-model="hasDisability" required>
                                <span class="ml-2">Yes</span>
                            </label>
                            <label class="flex items-center text-sm text-gray-700">
                                <input type="radio" name="is_pwd" value="0"
                                        class="form-radio text-indigo-600 focus:ring-indigo-500"
                                        x-model="hasDisability" required>
                                <span class="ml-2">No</span>
                            </label>
                        </div>
                        </div>

                        <!-- Disability Type Dropdown -->
                        <div x-show="hasDisability == 1" x-transition x-cloak>
                            <label for="pwd" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-wheelchair mr-2 text-gray-500"></i>{{ __('Disability Type') }}
                            </label>
                        <select id="pwd_type" name="pwd_type"
                                class="w-full border-gray-300 rounded-md shadow-sm text-sm pl-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                                x-bind:required="hasDisability == 1">
                            <option value="">-- Select Disability Type --</option>
                            <option value="visual" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'visual' ? 'selected' : '' }}>Visual Impairment</option>
                            <option value="hearing" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'hearing' ? 'selected' : '' }}>Hearing Impairment</option>
                            <option value="physical" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'physical' ? 'selected' : '' }}>Physical Disability</option>
                            <option value="mental" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'mental' ? 'selected' : '' }}>Mental Disability</option>
                            <option value="other" {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        </div>

                        <!-- NCPWD Number Input -->
                        <div x-show="hasDisability == 1" x-transition x-cloak>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-id-card text-gray-500 mr-2"></i>{{ __('NCPWD Number') }}
                            </label>
                        <div class="relative">
                            <flux:input
                                id="ncpwd_number"
                                name="ncpwd_number"
                                type="text"
                                class="w-full text-sm"
                                placeholder="Enter your NCPWD Number"
                                :value="old('ncpwd_number', $personalInformation->ncpwd_number ?? '')"
                                x-bind:required="hasDisability == 1"
                            />
                        </div>
                        </div>

                        <!-- Validation Errors -->
                        <div class="col-span-full">
                        <error class="mt-2" :messages="$errors->get('is_pwd')" />
                        <error class="mt-2" :messages="$errors->get('pwd_type')" />
                        <error class="mt-2" :messages="$errors->get('ncpwd_number')" />
                        </div>
                        </div>





                            <div class="p-2 bg-white border-b border-gray-100 rounded-lg">
                                <h2 class="text-base font-medium text-indigo-700 flex items-center justify-start">
                                    <i class="fas fa-briefcase text-blue-500 text-lg"></i>
                                    <span class="ml-2">{{ __('Section 2: Internal Applicant') }}</span>
                                </h2>

                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 items-center py-2"
                                    x-data="{ isApplicant: '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}' }"
                                    x-init="isApplicant = '{{ old('bma_applicant', $personalInformation->bma_applicant ?? 'no') }}'">

                                    <!-- Are you an applicant in BMA? -->
                                    <div class="flex items-center space-x-4">
                                        <label for="bma_applicant" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-universal-access mr-2 text-gray-500"></i>{{ __('Are you an applicant in Bandari Maritime Academy?') }}
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
                                        <label for="department" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-building mr-2 text-gray-500"></i>{{ __('Department') }}
                                        </label>
                                        <flux:select name="department" id="department"
                                            class="w-full text-sm"
                                            x-bind:required="isApplicant === 'yes'">
                                            <option value="">--Select Department--</option>
                                            <option value="ICT" {{ old('department', $personalInformation->department ?? '') == 'ICT' ? 'selected' : '' }}>ICT</option>
                                            <option value="maritime_affairs" {{ old('department', $personalInformation->department ?? '') == 'maritime_affairs' ? 'selected' : '' }}>Maritime Affairs</option>
                                            <option value="port_operations" {{ old('department', $personalInformation->department ?? '') == 'port_operations' ? 'selected' : '' }}>Port Operations</option>
                                            <option value="finance" {{ old('department', $personalInformation->department ?? '') == 'finance' ? 'selected' : '' }}>Finance</option>
                                            <option value="hr" {{ old('department', $personalInformation->department ?? '') == 'hr' ? 'selected' : '' }}>Human Resources</option>
                                            <option value="other" {{ old('department', $personalInformation->department ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                        </flux:select>
                                    </div>

                                    <!-- Designation Input -->
                                    <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                                        <label for="designation" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-id-badge mr-2 text-gray-500"></i>{{ __('Designation') }}
                                        </label>
                                        <flux:input id="designation" name="designation" type="text"
                                            class="w-full text-sm"
                                            :value="old('designation', $personalInformation->designation ?? '')"
                                            x-bind:required="isApplicant === 'yes'" placeholder="Enter your designation" />
                                    </div>

                                    <!-- Terms of Service -->
                                    <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                                        <label for="terms_of_service" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-file-contract mr-2 text-gray-500"></i>{{ __('Terms of Service') }}
                                        </label>
                                         <flux:select name="terms_of_service" id="terms_of_service"
                                            class="w-full text-sm"
                                            x-bind:required="isApplicant === 'yes'">
                                            <option value="">--Select Terms of Service--</option>
                                            <option value="permanent" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                            <option value="contract" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
                                            <option value="internship" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'internship' ? 'selected' : '' }}>Internship</option>
                                            <option value="casual" {{ old('terms_of_service', $personalInformation->terms_of_service ?? '') == 'casual' ? 'selected' : '' }}>Casual</option>
                                        </flux:select>
                                    </div>

                                    <!-- Job Scale -->
                                    <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                                        <label for="job_scale" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-layer-group mr-2 text-gray-500"></i>{{ __('Job Scale') }}
                                        </label>
                                        <flux:select name="job_scale" id="job_scale"
                                            class="w-full text-sm"
                                            x-bind:required="isApplicant === 'yes'">
                                            <option value="">--Select Job Scale--</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="bma{{ $i }}" {{ old('job_scale', $personalInformation->job_scale ?? '') == "bma$i" ? 'selected' : '' }}>
                                                    BMA {{ $i }}
                                                </option>
                                            @endfor
                                        </flux:select>
                                    </div>

                                    <!-- Date of Appointment -->
                                    <div x-show="isApplicant === 'yes'" x-transition x-cloak class="w-full">
                                        <label for="date_of_appointment" class="block text-sm font-medium text-gray-700 mb-1">
                                            <i class="fas fa-calendar-check mr-2 text-gray-500"></i>{{ __('Date of Appointment') }}
                                        </label>
                                        <flux:input id="date_of_appointment" name="date_of_appointment" type="date"
                                            class="w-full text-sm"
                                            :value="old('date_of_appointment', $personalInformation->date_of_appointment ?? '')"
                                            x-bind:required="isApplicant === 'yes'" />
                                    </div>

                                </div>
                            </div>

                        <!---End of Section 2: Internal Applicant--->

                        <div class="p-2 bg-white rounded-lg">
                            <h2 class="text-base font-medium text-indigo-700 flex items-center space-x-2">
                                <i class="fas fa-id-badge text-blue-500 text-xl"></i>
                                <span>{{ __('Section 3: Other Personal Details') }}</span>
                            </h2>

                            @php
                                $criminalOffense = old('criminal_offense', $personalInformation->criminal_offense ?? 'no');
                                $criminalDetails = old('criminal_details', $personalInformation->criminal_details ?? '');
                            @endphp

                            <div class="grid grid-cols-1 text-sm sm:grid-cols-3 gap-2 py-4" x-data="{ criminal_offense: '{{ $criminalOffense }}' }">

                                <!-- Criminal Offense Question -->
                                <div class="col-span-3 flex items-center space-x-2">
                                    <label for="criminal_offense" class="block text-sm font-medium text-gray-700 mb-1">
                                        <i class="fas fa-gavel text-red-500 mr-2"></i>
                                        {{ __('Have you ever been convicted of any criminal offence or been subject to a probation order?') }}
                                    </label>
                                </div>

                                <!-- Yes Option -->
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="criminal_offense" value="yes"
                                            class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense"
                                            {{ $criminalOffense == 'yes' ? 'checked' : '' }} required>
                                        <span>Yes</span>
                                    </label>
                                </div>

                                <!-- No Option -->
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="criminal_offense" value="no"
                                            class="form-radio text-indigo-600 focus:ring-indigo-500" x-model="criminal_offense"
                                            {{ $criminalOffense == 'no' ? 'checked' : '' }} required>
                                        <span>No</span>
                                    </label>
                                </div>

                                <!-- Criminal Details (Only Show if 'Yes' is Selected) -->
                                <div x-show="criminal_offense === 'yes'" x-cloak class="w-full col-span-3">
                                    <label for="criminal_details" class="block text-sm font-medium text-gray-700 mb-1">
                                        <i class="fas fa-info-circle text-yellow-500 mr-2"></i>
                                        {{ __('If Yes, state the nature of the offense, the year, and duration of conviction') }}
                                    </label>
                                    <textarea id="criminal_details" name="criminal_details"
                                        class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm h-24 p-2"
                                        x-bind:required="criminal_offense === 'yes'">{{ $criminalDetails }}</textarea>
                                    {{-- <x-input-error class="mt-2" :messages="$errors->get('criminal_details')" /> --}}
                                </div>

                            </div>

                            <!-- Save Button -->
                            <div class="w-full pt-2 flex justify-end border-t border-gray-200">
                                <button type="submit"
                                    class="flex items-center gap-1 px-5 py-1 bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 focus:ring-4 focus:ring-blue-300">
                                    <i class="fas fa-save"></i>
                                    {{ __('Save Personal Details') }}
                                </button>
                            </div>
                        </div>



                </div>
            </form>
            <!----End of Form Section 1: Personal Information---->
        </div>
    </div>
</x-layouts.app>
