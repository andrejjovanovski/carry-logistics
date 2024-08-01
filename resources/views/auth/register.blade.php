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
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="full-name"
                                          :value="old('name')"
                                          required
                                          autofocus autocomplete="name"/>
                            <x-input-error :messages="$errors->get('fullName')" class="mt-2"/>
                        </div>


                        <!-- Date of birth -->
                        <div class="mt-4">
                            <x-input-label for="dateOfBirth" :value="__('Date of birth')"/>

                            <x-text-input id="dateOfBirth" class="block mt-1 w-full"
                                          type="date"
                                          name="dateOfBirth" required autocomplete="new-dateOfBirth"/>
                            <x-input-error :messages="$errors->get('dateOfBirth')" class="mt-2"/>
                        </div>

                        <!-- Gender -->
                        <div class="mt-4">
                            <x-input-label for="gender" :value="__('Gender')"/>
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

                    </div>
                    <div class="right-col">


                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')"/>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                          :value="old('email')"
                                          required
                                          autocomplete="email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>

                        <!-- County -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('County')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>

                        <!-- City -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('City')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>

                        <!-- Zip Code -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Zip Code')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>



                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Address')"/>

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                          type="password"
                                          name="password_confirmation" required autocomplete="new-password"/>

                            <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                        </div>


                        <!-- Button -->
                        <div class="d-flex items-center justify-center mt-6">
                            <x-primary-button class="w-full py-3">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </div>



                </div>
            </div>
        </form>
        <div class="flex items-center justify-center py-4 text-center bg-gray-100">
            <span class="text-sm text-gray-600">{{ __('Already registered?') }} </span>

            <a href="{{route('login')}}" class="mx-2 text-sm font-bold text-blue-500 hover:underline">Login</a>
        </div>
    </div>
</x-guest-layout>
