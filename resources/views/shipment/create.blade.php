<x-app-layout>
    <div class="w-full overflow-hidden sm:rounded-lg mx-auto">
        <form method="POST" action="{{ route('shipment.store') }}">
            @csrf
            <h3 class="font-semibold text-xl mb-3 bg-white inline-block px-6 py-2 rounded-lg"><i class="fa-solid fa-plus text-blue-500 mr-2"></i>Book a shipment</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{--PICKUP COLUMN--}}
                <div class="left-col shadow-md bg-white px-3 py-4 rounded-lg">
                    <p class="border-b border-gray-300 text-gray-400">Pickup Information</p>
                    <!-- Note for pickup driver -->
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('Pickup name')"/>
                        <x-select id="gender"> <!-- Default selected value should be the logged in user -->
                            <x-slot name="content" id="gender">
                                <option selected>Select pickup location</option>
                                <option value="male">My name</option>
                                <option value="female">Female</option>
                                <option value="rather-not-say">Rather not say</option>
                            </x-slot>
                        </x-select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                    </div>

                    <!-- Delivery Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Delivery refernce')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="full-name"
                                      :value="old('name')"
                                      required
                                      autofocus autocomplete="name"/>
                        <x-input-error :messages="$errors->get('fullName')" class="mt-2"/>
                    </div>

                    <p class="border-b border-gray-300 text-gray-400 mt-4">Collection window</p>
                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- Pickup date-time -->
                        <div class="w-3/4 justify-between inline-block">
{{--                            <x-input-label for="dateOfBirth" :value="__('Pickup delivery date')"/>--}}

                            <x-text-input id="dateOfBirth" class="block mt-1 w-full"
                                          type="date"
                                          name="dateOfBirth" required autocomplete="new-dateOfBirth"/>
                            <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2"/>
                        </div>
                        <!-- Pickup date-time -->
                        <div class="w-3/4 justify-between inline-block">
{{--                            <x-input-label for="dateOfBirth" :value="__('Pickup time')"/>--}}

                            <x-text-input id="dateOfBirth" class="block mt-1 w-full"
                                          type="time"
                                          name="dateOfBirth" required autocomplete="new-dateOfBirth"/>
                            <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2"/>
                        </div>
                        <!-- Pickup date-time -->
                        <div class="w-3/4 justify-between inline-block">
{{--                            <x-input-label for="dateOfBirth" :value="__('Pickup time')"/>--}}

                            <x-text-input id="dateOfBirth" class="block mt-1 w-full"
                                          type="time"
                                          name="dateOfBirth" required autocomplete="new-dateOfBirth"/>
                            <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2"/>
                        </div>
                    </div>

                    <!-- Note for pickup driver -->
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('Note for pickup driver')"/>
                        <x-text-input id="note-for-pickup-driver" type="text">
                        </x-text-input>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                    </div>
                </div>

                {{--DELIVERY COLUMN--}}
                <div class="right-col shadow-md bg-white px-3 py-4 rounded-lg">
                    <p class="border-b border-gray-300 text-gray-400">Delivery Information</p>

                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- Delivery Name -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="name" :value="__('Delivery name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="full-name"
                                          :value="old('name')"
                                          required
                                          autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('fullName')" class="mt-2"/>
                        </div>
                        <!-- Phone number -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="phoneNumber" :value="__('Delivery phone number')"/>
                            <x-text-input id="phoneNumber" class="block mt-1 w-full" type="phoneNumber"
                                          name="phoneNumber"
                                          :value="old('phoneNumber')"
                                          type="text"
                                          required
                                          autocomplete="phoneNumber"/>
                            <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2"/>
                        </div>
                    </div>

                    <!-- Delivery country -->
                    <div class="mt-4">
                        <x-input-label for="country" :value="__('Delivery country')"/>

                        <x-select id="country" class="block mt-1 w-full"
                                  name="country" required autocomplete="country">
                            <x-slot name="content" id="country">
                                <option selected>Select country</option>
                                <option value="#">MK</option>
                                <option value="#">SRB</option>
                                <option value="#">D</option>
                            </x-slot>
                        </x-select>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>

                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- Pickup city -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="country" :value="__('Pickup city')"/>

                            <x-select id="country" class="block mt-1 w-full"
                                      name="country" required autocomplete="country">
                                <x-slot name="content" id="country">
                                    <option selected>Select city</option>
                                    <option value="#">MK</option>
                                    <option value="#">SRB</option>
                                    <option value="#">D</option>
                                </x-slot>
                            </x-select>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>
                        <!-- Area -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="city" :value="__('Area')"/>

                            <x-select id="city" class="mt-1 w-full"
                                      name="city" required autocomplete="city">
                                <x-slot name="content" id="city">
                                    <option selected>Select area</option>
                                    <option value="#">MK</option>
                                    <option value="#">SRB</option>
                                    <option value="#">D</option>
                                </x-slot>
                            </x-select>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>

                        <!-- Zip Code -->
                        <div class="w-1/4 inline-block">
                            <x-input-label for="zip-code" :value="__('Zip Code')"/>

                            <x-text-input id="zip-code" class="mt-1 w-full"
                                          type="password"
                                          disabled
                                          name="zip-code" required autocomplete="zip-code"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Delivery address')"/>

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>

                    <!-- Delivery date-time -->
                    <div class="mt-4">
                        <x-input-label for="dateOfBirth" :value="__('Delivery date and time (07:00 - 19:00)')"/>

                        <x-text-input id="dateOfBirth" class="block mt-1 w-full"
                                      type="datetime-local"
                                      min="0000-00-00T07:00"
                                      max="0000-00-00T19:00"
                                      name="dateOfBirth" required autocomplete="new-dateOfBirth"/>
                        <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2"/>
                    </div>

                    <!-- Delivery notes -->
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('Delivery notes')"/>
                        <x-select id="gender">
                            <x-slot name="content" id="gender">
                                <option selected>Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="rather-not-say">Rather not say</option>
                            </x-slot>
                        </x-select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!--TODO: PACKAGES (JS FOR ADD NEW PACKAGE AND TRACK THE NUMBER IN THE TAG CIRCLE NEXT TO PACKAGES HEADING) -->
            <div class="col shadow-md bg-white px-3 py-4 rounded-lg mt-6">
                <div class="border-b border-gray-300 text-gray-400">
                    <p class="inline-block">Packages</p>
                    <span
                        class="inline-flex items-center justify-center px-2 m2-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">1</span>
                </div>

                {{--PICKUP AREA AND ZIP CODE--}}
                <div class="flex mt-4 content-center items-end justify-between space-x-4">
                    <!-- Description -->
                    <div class="w-10/12 inline-block">
                        <x-input-label for="phoneNumber" :value="__('Description')"/>
                        <x-text-input id="phoneNumber" class="block mt-1 w-full" type="phoneNumber"
                                      name="phoneNumber"
                                      :value="old('phoneNumber')"
                                      type="text"
                                      required
                                      autocomplete="phoneNumber"/>
                        <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2"/>
                    </div>

                    <!-- Zip Code -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="zip-code" :value="__('Weight (kg)')"/>

                        <x-text-input id="zip-code" class="mt-1 w-full"
                                      type="text"
                                      name="zip-code" required autocomplete="zip-code"/>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>

                    <!-- Zip Code -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="zip-code" :value="__('Length (cm)')"/>

                        <x-text-input id="zip-code" class="mt-1 w-full"
                                      type="password"
                                      name="zip-code" required autocomplete="zip-code"/>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>

                    <!-- Zip Code -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="zip-code" :value="__('Width (cm)')"/>

                        <x-text-input id="zip-code" class="mt-1 w-full"
                                      type="password"
                                      name="zip-code" required autocomplete="zip-code"/>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>

                    <!-- Zip Code -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="zip-code" :value="__('Height (cm)')"/>

                        <x-text-input id="zip-code" class="mt-1 w-full"
                                      type="password"
                                      name="zip-code" required autocomplete="zip-code"/>

                        <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                    </div>
                    <div class="w-1/12 inline-block align-baseline text-center">
                        <button type="button" class="text-gray-400 hover:text-gray-600">
                            <i class="fa-solid fa-trash pb-2 text-2xl"></i>
                        </button>
                    </div>
                </div>

                <div class="border-t border-gray-300 text-gray-400 mt-6 pt-2">
                    <button class="hover:text-gray-600" type="button">
                        <i class="fa-solid fa-plus mr-1"></i>
                        Add new package
                    </button>
                </div>
            </div>

            <!-- Button -->
            <div class="d-flex items-center justify-center mt-6">
                <x-primary-button class="w-full py-3">
                    {{ __('Book shipment') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
