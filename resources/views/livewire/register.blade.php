<div>
    <x-guest-layout>
        <div class="w-full sm:max-w-5xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex content-center justify-center">
                    <a href="{{route('home')}}" class="h-1/5 w-1/5">
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
                                              wire:model.live="name"
                                              autofocus autocomplete="name"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            </div>


                            <!-- Date of birth -->
                            <div class="mt-4">
                                <x-input-label for="date_of_birth" :value="__('Date of birth')"/>

                                <x-text-input id="date_of_birth" class="block mt-1 w-full"
                                              type="date"
                                              wire:model.live="date_of_birth"
                                              :value="old('date_of_birth')"
                                              name="date_of_birth" autocomplete="date_of_birth"/>
                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                            </div>

                            <!-- Gender -->
                            <div class="mt-4">
                                <x-input-label for="gender" :value="__('Gender')"/>
                                <x-select wire:model.live="gender" id="gender" name="gender">
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
                                <x-text-input id="phone_number" wire:model.live="phone_number" class="block mt-1 w-full"
                                              name="phone_number"
                                              :value="old('phoneNumber')"
                                              type="text"
                                              autocomplete="phone_number"/>
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" class="block mt-1 w-full" wire:model.live="email" type="email" name="email"
                                              :value="old('email')"
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
                                              wire:model.live="password"
                                              name="password"
                                              autocomplete="new-password"/>

                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                              type="password"
                                              wire:model.live="password_confirmation"
                                              name="password_confirmation" autocomplete="new-password"/>

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

                            {{--CITY AND ZIP CODE--}}
                            <div class="flex mt-4 justify-between space-x-4">
                                <!-- City -->
                                <div class="w-3/4 justify-between inline-block">
                                    <x-input-label for="city" :value="__('City')"/>

                                    <x-select id="city" wire:model.live.debounce.500ms="cityID" class="mt-1 w-full"
                                              name="city" autocomplete="city">
                                        <x-slot name="content" id="city">
                                            <option selected>Options</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{ $city->name }}</option>
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
                                                  value="{{ $zipCode }}"
                                                  disabled
                                                  name="zip-code" autocomplete="zip-code"/>

                                    <x-input-error :messages="$errors->get('zip-code')" class="mt-2"/>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-input-label for='area' :value="__('Area')"/>

                                <x-select id="area" wire:model.live.debounce.500ms="areaID" class="mt-1 w-full"
                                          name="area" autocomplete="area">

                                    <x-slot name="content" id="area">
                                        @foreach($areas as $area)
                                            <option value="{{$area->id}}">{{$area->name}}</option>
                                        @endforeach
                                    </x-slot>
                                </x-select>

                                <x-input-error :messages="$errors->get('area')" class="mt-2"/>
                            </div>
                            <div class="mt-4">
                                <x-input-label for="address" :value="__('Address')"/>

                                <x-text-input id="address" class="block mt-1 w-full"
                                              type="text"
                                              wire:model.live="address"
                                              :value="old('address')"
                                              name="address"/>

                                <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="d-flex items-center justify-center mt-11">
                        <x-primary-button class="w-full py-3" type="submit">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </div>
            </form>
            <div class="flex items-center justify-center py-4 text-center bg-gray-100">
                <span class="text-sm text-gray-600">{{ __('Already registered?') }} </span>

                <a href="{{route('login')}}" class="mx-2 text-sm font-bold text-blue-500 hover:underline">Login</a>
            </div>
        </div>
    </x-guest-layout>
</div>
