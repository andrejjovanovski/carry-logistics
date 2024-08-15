<x-app-layout>
    <div class="container mx-auto relative" style="height: calc(100vh - 130px)">
        <div class="heading flex items-center">
            <h3 class="font-semibold mr-3">My orders</h3>
            <ul class="items-center w-1/6 text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r text-center">
                    <div class="flex items-center peer">
                        <input id="horizontal-list-radio-license" checked type="radio" value="" name="list-radio"
                               class="peer hidden">
                        <label for="horizontal-list-radio-license"
                               class="w-full py-3 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200"><i
                                class="fa-solid fa-cart-shopping mr-2"></i>Open</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r text-center">
                    <div class="flex items-center peer">
                        <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio"
                               class="peer hidden">
                        <label for="horizontal-list-radio-id"
                               class="w-full py-3 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200">All</label>
                    </div>
                </li>
            </ul>
            <x-primary-nav-button class="block mx-auto mt-3" href="{{ route('shipment.create') }}">
                {{ __('+ shipment') }}
            </x-primary-nav-button>
        </div>

        <div class="absolute pt-4 w-full text-center">
            <div class="wrapper">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase border dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Reference</th>
                        <th scope="col" class="px-4 py-3">Shipment Number</th>
                        <th scope="col" class="px-4 py-3">Consignee</th>
                        <th scope="col" class="px-4 py-3">Destination</th>
                        <th scope="col" class="px-4 py-3">Packages</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($shipments as $shipment)
                        <tr class="border-b">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">{{$shipment->delivery_reference}}</th>
                            <td class="px-4 py-3 font-semibold text-gray-900 ">{{$shipment->shipment_number}}</td>
                            <td class="px-4 py-3 text-gray-900 ">{{$shipment->delivery_name}}</td>
                            <td class="px-4 py-3  text-gray-900">{{$shipment->city->name}}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">{{$shipment->packages_count}}</td>
                        </tr>
                    @empty
                        <tr class="border-b">
                            <td class="px-4 py-3" colspan="5">
                                <p class="text-sm text-gray-600">No shipments found.</p>

                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
