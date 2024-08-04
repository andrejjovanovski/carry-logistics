<x-guest-layout>
    <div class="w-full sm:max-w-5xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex content-center justify-center">
                <a href="{{route('dashboard')}}" class="h-1/5 w-1/5">
                    <x-application-logo class="h-full w-full"/>
                </a>
            </div>

            <div class="pb-4 px-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="left-col">

                        <!-- Full Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Full name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name')"
                                          required
                                          autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('fullName')" class="mt-2"/>
                        </div>


                        <!-- Date of birth -->
                        <div class="mt-4">
                            <x-input-label for="date_of_birth" :value="__('Date of birth')"/>

                            <x-text-input id="date_of_birth" class="block mt-1 w-full"
                                          type="date"
                                          :value="old('date_of_birth')"
                                          name="date_of_birth" required autocomplete="date_of_birth"/>
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                        </div>

                        <!-- Gender -->
                        <div class="mt-4">
                            <x-input-label for="gender" :value="__('Gender')"/>
                            <x-select id="gender" name="gender">
                                <x-slot name="content" id="gender">
                                    <option value="" selected>Select gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="rather-not-say">Rather not say</option>
                                </x-slot>
                            </x-select>
                            <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                        </div>

                        <!-- Phone number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone number')"/>
                            <x-text-input id="phone_number" class="block mt-1 w-full"
                                          name="phone_number"
                                          :value="old('phoneNumber')"
                                          type="text"
                                          required
                                          autocomplete="phone_number"/>
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')"
                                          required
                                          autocomplete="email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>


                    </div>
                    <div class="right-col">

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')"/>

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>

                        <!-- Country -->
                        <div class="mt-4">
                            <x-input-label for="country" :value="__('Country')"/>

                            <x-select id="country" class="block mt-1 w-full" name="country" disabled>
                                <x-slot name="content" id="country">
                                    <option value="128" selected>Macedonia</option>
                                </x-slot>
                            </x-select>

                            <x-input-error :messages="$errors->get('country')" class="mt-2"/>
                        </div>
                        @php
                            $cities = \App\Models\City::with('areas')->where('country_id', 128)->get();
                        @endphp
                        {{--CITY AND ZIP CODE--}}
                        <div class="flex mt-4 justify-between space-x-4">
                            <!-- City -->
                            <div class="w-3/4 justify-between inline-block">
                                <x-input-label for="city" :value="__('City')"/>

                                <x-select id="city" class="mt-1 w-full"
                                          name="city" required autocomplete="city">
                                    <option selected>Options</option>
                                    <x-slot name="content" id="city">
                                        <option selected>Options</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                    data-areas="{{ json_encode($city->areas)}}">{{ $city->getTranslation('name', 'mk') }}</option>
                                        @endforeach
                                    </x-slot>
                                </x-select>

                                <x-input-error :messages="$errors->get('city')" class="mt-2"/>
                            </div>
                            <!-- Zip Code -->
                            <div class="w-1/4 inline-block">
                                <x-input-label for="zip-code" :value="__('Zip Code')"/>

                                <x-text-input id="zip-code" class="mt-1 w-full"
                                              type="text"
                                              :value="old('zip-code')"
                                              disabled
                                              name="zip-code" required autocomplete="zip-code"/>

                                <x-input-error :messages="$errors->get('zip-code')" class="mt-2"/>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-input-label for='area' :value="__('Area')"/>

                            <x-select id="area" class="mt-1 w-full"
                                      name="area" required autocomplete="area">

                                <x-slot name="content" id="area">
                                    <option value="" selected>Select Area</option>
                                </x-slot>
                            </x-select>

                            <x-input-error :messages="$errors->get('area')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Address')"/>

                            <x-text-input id="address" class="block mt-1 w-full"
                                          type="text"
                                          :value="old('address')"
                                          name="address" required/>

                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var citySelect = document.getElementById('city');
                        var areaSelect = document.getElementById('area');
                        var zipCodeInput = document.getElementById('zip-code');

                        citySelect.addEventListener('change', function () {
                            var selectedOptions = citySelect.selectedOptions[0];
                            var areas = selectedOptions ? JSON.parse(selectedOptions.getAttribute('data-areas')) : [];

                            // Clear current options
                            areaSelect.innerHTML = '<option value="" selected>Select Area</option>';
                            zipCodeInput.value = '';

                            // Populate area options
                            areas.forEach(function (area) {
                                var option = document.createElement('option');
                                option.value = area.id;
                                option.textContent = area.name;
                                option.setAttribute('data-zip-code', area.zip_code); // Add zip code to the option
                                areaSelect.appendChild(option);
                            });
                        });

                        areaSelect.addEventListener('change', function () {
                            var selectedOption = areaSelect.selectedOptions[0];
                            var zipCode = selectedOption ? selectedOption.getAttribute('data-zip-code') : '';

                            // Set zip code
                            zipCodeInput.value = zipCode;
                        });
                    });
                </script>

                <!-- Button -->
                <div class="d-flex items-center justify-center mt-11">
                    <x-primary-button class="w-full py-3">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
        <div class="flex items-center justify-center py-4 text-center bg-gray-100">
            <span class="text-sm text-gray-600">{{ __('Already registered?') }} </span>

            <a href="{{route('login')}}" class="mx-2 text-sm font-bold text-blue-500 hover:underline">Login</a>
        </div>
</x-guest-layout>
