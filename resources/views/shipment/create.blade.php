<x-app-layout>
    <div class="w-full overflow-hidden sm:rounded-lg mx-auto">
        <form method="POST" action="{{ route('shipment.store') }}">
            @csrf
            <h3 class="font-semibold text-xl mb-3 bg-white inline-block px-6 py-2 rounded-lg"><i class="fa-solid fa-plus text-blue-500 mr-2"></i>Book a shipment</h3>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                {{-- PICKUP COLUMN --}}
                <div class="left-col shadow-md bg-white px-3 py-4 rounded-lg">
                    <p class="border-b border-gray-300 text-gray-400">Pickup Information</p>
                    <!-- Pickup name -->
                    <div class="mt-4">
                        <x-input-label for="pickup_address_id" :value="__('Pickup Address')"/>
                        <x-select id="pickup_address_id" name="pickup_address_id">
                            <x-slot name="content" id="pickup_name">
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name }}, {{ $contact->street_address }}, {{ $contact->area->name }}, {{ $contact->area->zip_code }}, {{ $contact->city->name }}</option>
                                @endforeach
                            </x-slot>
                        </x-select>
                        <x-input-error :messages="$errors->get('pickup_address_id')" class="mt-2"/>
                    </div>

                    <!-- Delivery reference -->
                    <div class="mt-4">
                        <x-input-label for="deliveryReference" :value="__('Delivery reference')"/>
                        <x-text-input id="deliveryReference" class="block mt-1 w-full" type="text" name="delivery_reference" :value="old('delivery_reference')" autofocus autocomplete="deliveryReference"/>
                        <x-input-error :messages="$errors->get('delivery_reference')" class="mt-2"/>
                    </div>

                    <p class="border-b border-gray-300 text-gray-400 mt-4">Collection window</p>
                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- Pickup date -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-text-input id="pickupDate" class="block mt-1 w-full" type="date" name="pickup_date" autocomplete="pickupDate"/>
                            <x-input-error :messages="$errors->get('pickup_date')" class="mt-2"/>
                        </div>
                        <!-- Pickup time -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-text-input id="pickupTimeOne" class="block mt-1 w-full" type="time" name="pickup_time_one" autocomplete="pickupTimeOne"/>
                            <x-input-error :messages="$errors->get('pickup_time_one')" class="mt-2"/>
                        </div>
                        <!-- Pickup time -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-text-input id="pickupTimeTwo" class="block mt-1 w-full" type="time" name="pickup_time_two" autocomplete="pickupTimeTwo"/>
                            <x-input-error :messages="$errors->get('pickup_time_two')" class="mt-2"/>
                        </div>
                    </div>

                    <!-- Note for pickup driver -->
                    <div class="mt-4">
                        <x-input-label for="pickupDriverNote" :value="__('Note for pickup driver')"/>
                        <x-text-input id="pickupDriverNote" name="pickup_driver_note" type="text" autocomplete="pickupDriverNote"/>
                        <x-input-error :messages="$errors->get('pickup_driver_note')" class="mt-2"/>
                    </div>
                </div>

                {{-- DELIVERY COLUMN --}}
                <div class="right-col shadow-md bg-white px-3 py-4 rounded-lg">
                    <p class="border-b border-gray-300 text-gray-400">Delivery Information</p>

                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- Delivery Name -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="deliveryName" :value="__('Delivery name')"/>
                            <x-text-input id="deliveryName" class="block mt-1 w-full" type="text" name="delivery_name" :value="old('delivery_name')" autofocus autocomplete="deliveryName"/>
                            <x-input-error :messages="$errors->get('delivery_name')" class="mt-2"/>
                        </div>
                        <!-- Phone number -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="deliveryPhoneNumber" :value="__('Delivery phone number')"/>
                            <x-text-input id="deliveryPhoneNumber" class="block mt-1 w-full" type="text" name="delivery_phone_number" :value="old('delivery_phone_number')" type="text" autocomplete="phoneNumber"/>
                            <x-input-error :messages="$errors->get('delivery_phone_number')" class="mt-2"/>
                        </div>
                    </div>

                    <!-- Delivery country -->
                    <div class="mt-4">
                        <x-input-label for="deliveryCountry" :value="__('Delivery country')"/>
                        <x-select id="deliveryCountry" class="block mt-1 w-full" name="delivery_country" autocomplete="deliveryCountry" disabled>
                            <x-slot name="content" id="country">
                                <option value="128" selected>Macedonia</option>
                            </x-slot>
                        </x-select>
                        <x-input-error :messages="$errors->get('delivery_country')" class="mt-2"/>
                    </div>

                    <div class="flex mt-4 justify-between space-x-4">
                        <!-- City -->
                        <div class="w-3/4 justify-between inline-block">
                            <x-input-label for="city" :value="__('City')"/>
                            <x-select id="city" class="mt-1 w-full" name="city_id" onchange="fetchAreas(this.value)">
                                <option selected>Options</option>
                                <x-slot name="content" id="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{ $city->name }}</option>
                                    @endforeach
                                </x-slot>
                            </x-select>
                            <x-input-error :messages="$errors->get('city_id')" class="mt-2"/>
                        </div>

                        <!-- Area -->
                        <div class="w-3/4 justify-between inline-block">

                            <x-input-label for="area" :value="__('Area')"/>
                            <x-select id="area" class="mt-1 w-full" name="area_id" onchange="fetchZipCode(this.value)">
                                <x-slot name="content" id="area_id">
                                    <option value="" selected disabled>Select an Area</option>
                                </x-slot>
                            </x-select>
                            <x-input-error :messages="$errors->get('area_id')" class="mt-2"/>

                        </div>

                        <!-- Zip Code -->
                        <div class="w-1/4 inline-block">
                            <x-input-label for="zip_code" :value="__('Zip Code')"/>
                            <x-text-input id="zip_code" name="zip_code" class="mt-1 w-full" readonly/>
                            <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>

                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="mt-4">
                        <x-input-label for="deliveryAddress" :value="__('Delivery address')"/>
                        <x-text-input id="deliveryAddress" class="block mt-1 w-full" type="text" name="delivery_address" autocomplete="deliveryAddress"/>
                        <x-input-error :messages="$errors->get('delivery_address')" class="mt-2"/>
                    </div>

                    <!-- Delivery note -->
                    <div class="mt-4">
                        <x-input-label for="deliveryNote" :value="__('Delivery note')"/>
                        <x-text-input id="deliveryNote" name="delivery_note" class="block mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('delivery_note')" class="mt-2"/>
                    </div>
                </div>
            </div>

            <!-- PACKAGES -->
            <div class="col shadow-md bg-white px-3 py-4 rounded-lg mt-6">
                <div class="border-b border-gray-300 text-gray-400">
                    <p class="inline-block">Packages</p>
                </div>

                <!-- Packages Container -->
                <div id="packages-container">
                    @php
                        $packages = old('packages', []);
                    @endphp
                    @foreach($packages as $index => $package)
                        <div class="flex mt-4 content-center items-end justify-between space-x-4">
                            <!-- Description -->
                            <div class="w-10/12 inline-block">
                                <x-input-label for="packages[{{$index}}][description]" :value="__('Description')"/>
                                <x-text-input id="packages[{{$index}}][description]" name="packages[{{$index}}][description]" :value="$package['description']" class="block mt-1 w-full" type="text"/>
                                <x-input-error :messages="$errors->get('packages.'.$index.'.description')" class="mt-2"/>
                            </div>

                            <!-- Weight -->
                            <div class="w-2/12 inline-block">
                                <x-input-label for="weight{{$index}}" :value="__('Weight (kg)')"/>
                                <x-text-input id="weight{{$index}}" name="packages[{{$index}}][weight]" :value="$package['weight']" class="mt-1 w-full"/>
                                <x-input-error :messages="$errors->get('packages.'.$index.'.weight')" class="mt-2"/>
                            </div>

                            <!-- Length -->
                            <div class="w-2/12 inline-block">
                                <x-input-label for="length{{$index}}" :value="__('Length (cm)')"/>
                                <x-text-input id="length{{$index}}" name="packages[{{$index}}][length]" :value="$package['length']" class="mt-1 w-full"/>
                                <x-input-error :messages="$errors->get('packages.'.$index.'.length')" class="mt-2"/>
                            </div>

                            <!-- Width -->
                            <div class="w-2/12 inline-block">
                                <x-input-label for="width{{$index}}" :value="__('Width (cm)')"/>
                                <x-text-input id="width{{$index}}" name="packages[{{$index}}][width]" :value="$package['width']" class="mt-1 w-full"/>
                                <x-input-error :messages="$errors->get('packages.'.$index.'.width')" class="mt-2"/>
                            </div>

                            <!-- Height -->
                            <div class="w-2/12 inline-block">
                                <x-input-label for="height{{$index}}" :value="__('Height (cm)')"/>
                                <x-text-input id="height{{$index}}" name="packages[{{$index}}][height]" :value="$package['height']" class="mt-1 w-full"/>
                                <x-input-error :messages="$errors->get('packages.'.$index.'.height')" class="mt-2"/>
                            </div>

                            <div class="w-1/12 inline-block align-baseline text-center">
                                <button type="button" class="text-gray-400 hover:text-gray-600" onclick="removePackage({{$index}})">
                                    <i class="fa-solid fa-trash pb-2 text-2xl"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-gray-300 text-gray-400 mt-6 pt-2">
                    <button type="button" class="hover:text-gray-600" onclick="addNewPackage()">
                        <i class="fa-solid fa-plus mr-1"></i>
                        Add new package
                    </button>
                </div>
            </div>

            {{-- PAYMENT METHOD, SHIPPING TYPE --}}
            <div class="col shadow-md bg-white px-3 py-4 rounded-lg mt-6">
                <div class="border-b border-gray-300 text-gray-400">
                    <p class="inline-block">Shipment services</p>
                </div>
                <div class="flex mt-4 content-center items-end justify-between space-x-4">
                    {{-- Shipment type --}}
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for='shipmentType' :value="__('Shipment type')"/>
                        <x-select id="shipmentType" class="mt-1 w-full" name="shipment_type_id">
                            <x-slot name="content" id="shipmentType">
                                <option value="1" selected>Standard</option>
                            </x-slot>
                        </x-select>
                        <x-input-error :messages="$errors->get('shipment_type_id')" class="mt-2"/>
                    </div>

                    {{-- Payment method --}}
                    <div class="w-3/4 justify-between inline-block">
                        <x-input-label for='paymentMethod' :value="__('Payment method')"/>
                        <x-select id="paymentMethod" class="mt-1 w-full" name="payment_method_id">
                            <x-slot name="content" id="paymentMethod">
                                <option value="1" selected>Cash</option>
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
                <x-primary-button type="submit" class="w-full py-3">
                    {{ __('Book shipment') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <script>
        let packageIndex = @json(count($packages)); // Start index for new packages

        function addNewPackage() {
            const container = document.getElementById('packages-container');
            const index = packageIndex++;
            const packageHtml = `
                <div class="flex mt-4 content-center items-end justify-between space-x-4">
                    <!-- Description -->
                    <div class="w-10/12 inline-block">
                        <x-input-label for="packages[${index}][description]" :value="__('Description')"/>
                        <x-text-input id="packages[${index}][description]" name="packages[${index}][description]" class="block mt-1 w-full" type="text"/>
                        <x-input-error :messages="$errors->get('packages.${index}.description')" class="mt-2"/>
                    </div>
                    <!-- Weight -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="weight${index}" :value="__('Weight (kg)')"/>
                        <x-text-input id="weight${index}" name="packages[${index}][weight]" class="mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('packages.${index}.weight')" class="mt-2"/>
                    </div>
                    <!-- Length -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="length${index}" :value="__('Length (cm)')"/>
                        <x-text-input id="length${index}" name="packages[${index}][length]" class="mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('packages.${index}.length')" class="mt-2"/>
                    </div>
                    <!-- Width -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="width${index}" :value="__('Width (cm)')"/>
                        <x-text-input id="width${index}" name="packages[${index}][width]" class="mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('packages.${index}.width')" class="mt-2"/>
                    </div>
                    <!-- Height -->
                    <div class="w-2/12 inline-block">
                        <x-input-label for="height${index}" :value="__('Height (cm)')"/>
                        <x-text-input id="height${index}" name="packages[${index}][height]" class="mt-1 w-full"/>
                        <x-input-error :messages="$errors->get('packages.${index}.height')" class="mt-2"/>
                    </div>
                    <div class="w-1/12 inline-block align-baseline text-center">
                        <button type="button" class="text-gray-400 hover:text-gray-600" onclick="removePackage(${index})">
                            <i class="fa-solid fa-trash pb-2 text-2xl"></i>
                        </button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', packageHtml);
            document.getElementById('totalPackages').textContent = packageIndex;

        }

        function removePackage(index) {
            const container = document.getElementById('packages-container');
            const packageDiv = Array.from(container.children).find(child => child.querySelector(`#packages\\[${index}\\]\\[description\\]`));
            if (packageDiv) {
                container.removeChild(packageDiv);
                packageIndex--;
                document.getElementById('totalPackages').textContent = packageIndex;
            }
        }
        function fetchAreas(cityId) {
            const areaSelect = document.getElementById('area');
            areaSelect.innerHTML = '<option value="" selected disabled>Select an Area</option>';

            if (cityId) {
                fetch(`/api/cities/${cityId}/areas`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(area => {
                            const option = document.createElement('option');
                            option.value = area.id;
                            option.textContent = area.name;
                            areaSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching areas:', error));
            }
        }

        function fetchZipCode(areaId) {
            const zipCodeInput = document.getElementById('zip_code');

            if (areaId) {
                fetch(`/api/areas/${areaId}/zipcode`)
                    .then(response => response.json())
                    .then(data => {
                        zipCodeInput.value = data.zip_code;
                    })
                    .catch(error => console.error('Error fetching zip code:', error));
            }
        }
    </script>
</x-app-layout>

