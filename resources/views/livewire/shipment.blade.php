<div>
    {{--    {{dd($contacts)}}--}}
    <form wire:submit.prevent="submit">
        @csrf
        <h3 class="font-semibold text-xl mb-3 bg-white inline-block px-6 py-2 rounded-lg"><i
                class="fa-solid fa-plus text-blue-500 mr-2"></i>Book a shipment</h3>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

            {{--PICKUP COLUMN--}}
            <div class="left-col shadow-md bg-white px-3 py-4 rounded-lg">
                <p class="border-b border-gray-300 text-gray-400">Pickup Information</p>
                <!-- Pickup name -->
                <div class="mt-4">
                    <x-input-label for="pickup_address_id" :value="__('Pickup Address')"/>
                    <x-select wire:model="pickup_address_id" id="pickup_address_id" name="pickup_name">
                        <x-slot name="content" id="pickup_name">
                            @foreach($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->name }}, {{ $contact->street_address }}, {{ $contact->area->name }}, {{ $contact->area->zip_code }}, {{ $contact->city->name }}</option>
                            @endforeach
                        </x-slot>
                    </x-select>

                    <x-input-error :messages="$errors->get('pickup_name')" class="mt-2"/>
                </div>

                <!-- Delivery reference -->
                <div class="mt-4">
                    <x-input-label for="deliveryReference" :value="__('Delivery reference')"/>
                    <x-text-input id="deliveryReference" class="block mt-1 w-full" type="text" name="delivery_reference"
                                  :value="old('delivery_reference')"
                                  autofocus autocomplete="deliveryReference"
                                  wire:model="delivery_reference"/>
                    <x-input-error :messages="$errors->get('delivery_reference')" class="mt-2"/>
                </div>

                <p class="border-b border-gray-300 text-gray-400 mt-4">Collection window</p>
                <div class="flex mt-4 justify-between space-x-4">
                    <!-- Pickup date -->
                    <div class="w-3/4 justify-between inline-block">

                        <x-text-input id="pickupDate" class="block mt-1 w-full"
                                      type="date"
                                      name="pickup_date" autocomplete="pickupDate"
                                      wire:model="pickup_date"/>
                        <x-input-error :messages="$errors->get('pickup_date')" class="mt-2"/>
                    </div>
                    <!-- Pickup time -->
                    <div class="w-3/4 justify-between inline-block">

                        <x-text-input id="pickupTimeOne" class="block mt-1 w-full"
                                      type="time"
                                      name="pickup_time_one" autocomplete="pickupTimeOne"
                                      wire:model="pickup_time_one"/>
                        <x-input-error :messages="$errors->get('pickup_time_one')" class="mt-2"/>
                    </div>
                    <!-- Pickup time -->
                    <div class="w-3/4 justify-between inline-block">

                        <x-text-input id="pickupTimeTwo" class="block mt-1 w-full"
                                      type="time"
                                      name="pickup_time_two" autocomplete="pickupTimeTwo"
                                      wire:model="pickup_time_two"/>
                        <x-input-error :messages="$errors->get('pickup_time_two')" class="mt-2"/>
                    </div>
                </div>

                <!-- Note for pickup driver -->
                <div class="mt-4">
                    <x-input-label for="gender" :value="__('Note for pickup driver')"/>
                    <x-text-input id="pickupDriverNote" name="pickup-driver-note" type="text" autocomplete="pickupDriverNote" wire:model="note_for_pickup_driver"/>
                    <x-input-error :messages="$errors->get('pickup-driver-note')" class="mt-2"/>
                </div>
            </div>


            {{--DELIVERY COLUMN--}}
            <div class="right-col shadow-md bg-white px-3 py-4 rounded-lg">
                <p class="border-b border-gray-300 text-gray-400">Delivery Information</p>

                <div class="flex mt-4 justify-between space-x-4">
                    <!-- Delivery Name -->
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for="deliveryName" :value="__('Delivery name')"/>
                        <x-text-input id="deliveryName" class="block mt-1 w-full" type="text" name="delivery_name"
                                      :value="old('delivery_name')"
                                      autofocus autocomplete="deliveryName"
                                      wire:model="delivery_name"/>
                        <x-input-error :messages="$errors->get('delivery_name')" class="mt-2"/>
                    </div>
                    <!-- Phone number -->
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for="deliveryPhoneNumber" :value="__('Delivery phone number')"/>
                        <x-text-input id="deliveryPhoneNumber" class="block mt-1 w-full" type="text"
                                      name="delivery_phone_number"
                                      :value="old('delivery_phone_number')"
                                      type="text"
                                      wire:model="delivery_phone_number"
                                      autocomplete="phoneNumber"/>
                        <x-input-error :messages="$errors->get('delivery_phone_number')" class="mt-2"/>
                    </div>
                </div>

                <!-- Delivery country -->
                <div class="mt-4">
                    <x-input-label for="deliveryCountry" :value="__('Delivery country')"/>

                    <x-select id="deliveryCountry" class="block mt-1 w-full"
                              name="delivery_country" autocomplete="deliveryCountry" disabled>
                        <x-slot name="content" id="country">
                            <option value="128" selected>Macedonia</option>
                        </x-slot>
                    </x-select>

                    <x-input-error :messages="$errors->get('passwordConfirmation')" class="mt-2"/>
                </div>

                <div class="flex mt-4 justify-between space-x-4">
                    <!-- City -->
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for="deliveryCity" :value="__('City')"/>

                        <x-select id="deliveryCity" wire:model.live="cityID" class="mt-1 w-full"
                                  name="delivery_city" autocomplete="city">
                            <option selected>Options</option>
                            <x-slot name="content" id="city">
                                <option selected>Options</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{ $city->name }}</option>
                                @endforeach
                            </x-slot>
                        </x-select>

                        <x-input-error :messages="$errors->get('delivery_city')" class="mt-2"/>
                    </div>

                    <!-- Area -->
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for='deliveryArea' :value="__('Area')"/>

                        <x-select id="deliveryArea" wire:model.live="areaID" class="mt-1 w-full"
                                  name="delivery_area" autocomplete="area">

                            <x-slot name="content" id="area">
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach
                            </x-slot>
                        </x-select>

                        <x-input-error :messages="$errors->get('delivery_area')" class="mt-2"/>
                    </div>

                    <!-- Zip Code -->
                    <div class="w-1/4 inline-block">
                        <x-input-label for="zip-code" :value="__('Zip Code')"/>

                        <x-text-input id="zip-code" class="mt-1 w-full" type="text" value="{{ $zipCode }}" disabled name="zip-code" autocomplete="zip-code"/>


                        <x-input-error :messages="$errors->get('zip-code')" class="mt-2"/>
                    </div>
                </div>

                <!-- Delivery Address -->
                <div class="mt-4">
                    <x-input-label for="deliveryAddress" :value="__('Delivery address')"/>

                    <x-text-input id="deliveryAddress" class="block mt-1 w-full"
                                  type="text"
                                  wire:model="delivery_address"
                                  name="delivery_address" autocomplete="deliveryAddress"/>

                    <x-input-error :messages="$errors->get('delivery_address')" class="mt-2"/>
                </div>

                <!-- Delivery note -->
                <div class="mt-4">
                    <x-input-label for="deliveryNote" :value="__('Delivery note')"/>
                    <x-text-input id="deliveryNote" name="delivery_note" class="block mt-1 w-full" wire:model="delivery_note"/>

                    <x-input-error :messages="$errors->get('delivery_note')" class="mt-2"/>
                </div>
            </div>
        </div>

        <!-- PACKAGES -->
        <div class="col shadow-md bg-white px-3 py-4 rounded-lg mt-6">
            <div class="border-b border-gray-300 text-gray-400">
                <p class="inline-block">Packages</p>
                <span
                    class="inline-flex items-center justify-center px-2 m2-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">{{$totalPackages}}</span>
            </div>

            {{--Packages--}}
            @foreach($packages as $index => $package)
                <div class="flex mt-4 content-center items-end justify-between space-x-4">
                    <!-- Description -->
                    <div class="w-10/12 inline-block">
                        <x-input-label for="description{{$index}}" :value="__('Description')"/>
                        <x-text-input id="description{{$index}}" class="block mt-1 w-full" type="text"
                                      wire:model="packages.{{$index}}.description" />
                        <x-input-error :messages="$errors->get('packages.'.$index.'.description')" class="mt-2"/>
                    </div>

                    <!-- Weight -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="weight{{$index}}" :value="__('Weight (kg)')"/>
                        <x-text-input id="weight{{$index}}" class="mt-1 w-full"
                                      wire:model="packages.{{$index}}.weight" />
                        <x-input-error :messages="$errors->get('packages.'.$index.'.weight')" class="mt-2"/>
                    </div>

                    <!-- Length -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="length{{$index}}" :value="__('Length (cm)')"/>
                        <x-text-input id="length{{$index}}" class="mt-1 w-full"
                                      wire:model="packages.{{$index}}.length" />
                        <x-input-error :messages="$errors->get('packages.'.$index.'.length')" class="mt-2"/>
                    </div>

                    <!-- Width -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="width{{$index}}" :value="__('Width (cm)')"/>
                        <x-text-input id="width{{$index}}" class="mt-1 w-full"
                                      wire:model="packages.{{$index}}.width" />
                        <x-input-error :messages="$errors->get('packages.'.$index.'.width')" class="mt-2"/>
                    </div>

                    <!-- Height -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="height{{$index}}" :value="__('Height (cm)')"/>
                        <x-text-input id="height{{$index}}" class="mt-1 w-full"
                                      wire:model="packages.{{$index}}.height" />
                        <x-input-error :messages="$errors->get('packages.'.$index.'.height')" class="mt-2"/>
                    </div>

                    <div class="w-1/12 inline-block align-baseline text-center">
                        <button wire:click.prevent="deletePackage({{$index}})" type="button" class="text-gray-400 hover:text-gray-600">
                            <i class="fa-solid fa-trash pb-2 text-2xl"></i>
                        </button>
                    </div>
                </div>
            @endforeach


            <div class="border-t border-gray-300 text-gray-400 mt-6 pt-2">
                <button wire:click.prevent="addNewPackage" class="hover:text-gray-600" type="button">
                    <i class="fa-solid fa-plus mr-1"></i>
                    Add new package
                </button>
            </div>
        </div>


        {{--PAYMENT METHOD, SHIPPING TYPE--}}
        <div class="col shadow-md bg-white px-3 py-4 rounded-lg mt-6">
            <div class="border-b border-gray-300 text-gray-400">
                <p class="inline-block">Shipment services</p>
            </div>
            <div class="flex mt-4 content-center items-end justify-between space-x-4">
            {{--Shipment type--}}
                <div class="w-3/4 justify-between inline-block">
                    <x-input-label for='shipmentType' :value="__('Shipment type')"/>

                    <x-select id="shipmentType" class="mt-1 w-full"
                              name="shipment_type_id" wire:model="shipment_type_id">

                        <x-slot name="content" id="shipmentType">
{{--                            @foreach($shipmentTypes as $type)--}}
{{--                                <option value=""></option>--}}
{{--                            @endforeach--}}
                            <option value="1" selected>Standard</option>
                        </x-slot>
                    </x-select>

                    <x-input-error :messages="$errors->get('shipment_type_id')" class="mt-2"/>
                </div>

                {{--Payment method--}}
                <div class="w-3/4 justify-between inline-block">
                    <x-input-label for='paymentMethod' :value="__('Payment method')"/>

                    <x-select id="paymentMethod" class="mt-1 w-full"
                              name="payment_method_id" wire:model="payment_method_id">

                        <x-slot name="content" id="paymentMethod">
                            <option value="1" selected>Cash</option>
                            {{--                            @foreach($shipmentTypes as $type)--}}
                            {{--                                <option value=""></option>--}}
                            {{--                            @endforeach--}}
                        </x-slot>
                    </x-select>

                    <x-input-error :messages="$errors->get('payment_method_id')" class="mt-2"/>
                </div>

            </div>
            <div class="w-full justify-between block text-center mt-6">
                <p class="font-semibold text-2xl">TOTAL: $1023</p>
            </div>
        </div>

        <!-- Button -->
        <div class="d-flex items-center justify-center mt-6">
            <x-primary-button type="submit" wire:click.prevent="submit" class="w-full py-3">
                {{ __('Book shipment') }}
            </x-primary-button>
        </div>
    </form>
</div>
