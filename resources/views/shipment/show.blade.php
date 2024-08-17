<x-app-layout>
    {{--    {{dd($shipment)}}--}}
    <div class="w-full overflow-hidden sm:rounded-lg mx-auto" style="height: calc(100vh - 130px)">
        <p class="font-semibold text-md">Shipment number: {{$shipment->shipment_number}}</p>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 mt-4">
            <div class="left-col shadow-md bg-white px-3 py-4 rounded-lg">
                <p class="border-b border-gray-300 text-gray-400">Pickup Information</p>
                <p>Pickup name: {{$shipment->pickupAddress->name}}</p>
                <p>Pickup country: {{$shipment->pickupAddress->country->name}}</p>
                <p>Pickup city: {{$shipment->pickupAddress->city->name}}</p>
                <p>Pickup area: {{$shipment->pickupAddress->area->name}}</p>
                <p>Pickup zip code: {{$shipment->pickupAddress->area->zip_code}}</p>
                <p>Pickup address: {{$shipment->pickupAddress->street_address}}</p>
                <p>Pickup phone number: {{$shipment->pickupAddress->phone_number}}</p>
                <p>Pickup email: {{$shipment->pickupAddress->email}}</p>
                <p>Pickup date: {{$shipment->pickup_date}}</p>
                <p>Pickup time window: {{$shipment->pickup_time}}</p>
                <p>Note for pickup driver: {{$shipment->note_for_pickup_driver}}</p>
                <p>Delivery reference: {{$shipment->delivery_reference}}</p>
            </div>
            <div class="right-col shadow-md bg-white px-3 py-4 rounded-lg">
                <p class="border-b border-gray-300 text-gray-400">Delivery Information</p>
                <p>Delivery name: {{$shipment->delivery_name}}</p>
                <p>Delivery phone number: {{$shipment->delivery_phone_number}}</p>
                <p>Delivery email: {{$shipment->delivery_email}}</p>
                <p>Delivery country: {{$shipment->country->name}}</p>
                <p>Delivery city: {{$shipment->city->name}}</p>
                <p>Delivery area: {{$shipment->area->name}}</p>
                <p>Delivery zip code: {{$shipment->area->zip_code}}</p>
                <p>Delivery address: {{$shipment->delivery_address}}</p>
                <p>Delivery note: {{$shipment->delivery_note}}</p>
            </div>
        </div>

        <div class="bg-white shadow-md px-3 py-4 rounded-lg mt-6">
            <p class="border-b border-gray-300 text-gray-400">Shipment Information</p>
            <p>Dangerous</p>
        </div>

        <div class="bg-white shadow-md px-3 py-4 rounded-lg mt-6">
            <p class="font-semibold text-lg mb-2">Packages</p>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Weight (kg)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Length (cm)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Width (cm)
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Height (cm)
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($shipment->packages as $package)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            {{$package->description}}
                        </td>
                        <td class="px-6 py-4">
                            {{$package->weight}}
                        </td>
                        <td class="px-6 py-4">
                            {{$package->length}}
                        </td>
                        <td class="px-6 py-4">
                            {{$package->width}}
                        </td>
                        <td class="px-6 py-4">
                            {{$package->height}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
