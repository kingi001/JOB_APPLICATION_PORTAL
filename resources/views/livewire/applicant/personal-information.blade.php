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
    <flux:separator variant="subtle" />

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
                <flux:field class="w-full text-xm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-id-card mr-2 text-gray-500"></i>
                        Surname
                    </flux:label>

                    <flux:input type="text" name="surname" required placeholder="Enter your surname"
                        class="w-full text-xm" />

                    <flux:error name="surname" />
                </flux:field>
                <!---end of surname field--->

                <!---othernames field--->
                <flux:field class="w-full text-xm">
                    <flux:label badge="Required">
                        <i class="fa-solid fa-id-card mr-2 text-gray-500"></i>
                        Other Names
                    </flux:label>

                    <flux:input type="text" name="othernames" required placeholder="Enter your other names"
                        class="w-full text-xm" />

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
                        placeholder="Enter your National ID or Passport number" class="w-full text-xm" />

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

                    <flux:input type="text" name="postal_code" required placeholder="e.g. 80100"
                        pattern="^\d{5}$" class="w-full text-sm" />

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
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 items-center pt-4 " x-data="{ hasDisability: '{{ old('is_pwd', $personalInformation->is_pwd ?? 0) }}' }"
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
                    <flux:label for="pwd_type" :value="__('Disability Type')" />
                    <flux:select name="pwd_type" id="pwd_type"
                        class="w-full text-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                        x-bind:required="hasDisability == 1">
                        <option value="">--Select Disability Type--</option>
                        <option value="visual"
                            {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'visual' ? 'selected' : '' }}>
                            Visual Impairment</option>
                        <option value="hearing"
                            {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'hearing' ? 'selected' : '' }}>
                            Hearing Impairment</option>
                        <option value="physical"
                            {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'physical' ? 'selected' : '' }}>
                            Physical Disability</option>
                        <option value="mental"
                            {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'mental' ? 'selected' : '' }}>
                            Mental Disability</option>
                        <option value="other"
                            {{ old('pwd_type', $personalInformation->pwd_type ?? '') == 'other' ? 'selected' : '' }}>
                            Other</option>
                    </flux:select>
                </div>
                <!-- Registration No (Visible if Yes is selected) -->
                <div x-show="hasDisability == 1" x-transition x-cloak class="w-full">
                    <flux:label for="ncpwd_number" :value="__('ncpwd Number')"
                        class="text-gray-700 font-medium flex items-center gap-1">
                        <i class="fas fa-id-card text-blue-500 text-sm"></i>
                    </flux:label>

                    <div
                        class="flex items-center border border-gray-300 focus-within:border-indigo-500 focus-within:ring-indigo-500 rounded-lg shadow-sm px-3 py-2 transition duration-300">
                        <span class="text-gray-500"><i class="fas fa-address-card text-sm"></i></span>
                        <input id="ncpwd_number" name="ncpwd_number" type="text"
                            class="w-full  outline-none border-none focus:ring-0 px-2 py-1 text-sm"
                            :value="old('ncpwd_number', $personalInformation - > ncpwd_number ?? '')"
                            x-bind:required="hasDisability == 1" placeholder="Enter your NCPWD Number" />
                    </div>
                </div>


            </div>

            <h2 class="text-base font-medium text-indigo-700 mt-6">
                <i class="fas fa-user text-blue-500 text-lg"></i>
                {{ __('Section 2 :') }}
                {{ __('Internal Applicant') }}
            </h2>

        </div>
    </div>
</div>
