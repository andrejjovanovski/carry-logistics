<x-app-layout>
    <div class="container mx-auto relative" style="height: calc(100vh - 130px)">
        <div class="heading flex justify-between">
            <div class="flex items-center">
                <h3 class="font-semibold mr-3">My orders</h3>
{{--                <div class="">--}}
{{--                    <ul class="w-full items-center text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">--}}
{{--                        <li class="">--}}
{{--                            <div class="flex items-center peer">--}}
{{--                                <input id="horizontal-list-radio-license" checked type="radio" value=""--}}
{{--                                       name="list-radio"--}}
{{--                                       class="peer hidden w-full">--}}
{{--                                <label for="horizontal-list-radio-license"--}}
{{--                                       class="border-b border-gray-200 sm:border-b-0 sm:border-r text-center w-full px-5 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200"><i--}}
{{--                                        class="fa-solid fa-cart-shopping mr-2 "></i>Open</label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <div class="flex items-center peer">--}}
{{--                                <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio"--}}
{{--                                       class="peer hidden">--}}
{{--                                <label for="horizontal-list-radio-id"--}}
{{--                                       class="border-b border-gray-200 sm:border-b-0 sm:border-r text-center w-full py-3 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200">All</label>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
            <x-primary-nav-button class="place-self" href="{{ route('shipment.create') }}">
                <i class="fa-solid fa-plus"></i> Shipment
            </x-primary-nav-button>
        </div>

        <div class="mx-auto pt-4 w-full text-center">
            <div class="wrapper">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase border dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Status</th>
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
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                @switch($shipment->shipping_status_id)
                                    @case(1)
                                        <p class="inline-block bg-blue-300  rounded-full px-2 uppercase text-center">Pending</p>
                                        @break

                                    @case(2)
                                        <p class="inline-block bg-yellow-300  rounded-full px-2 uppercase text-center">Approved</p>
                                        @break
                                @endswitch
                            </th>
                            <th scope="row"
                                class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap ">{{$shipment->delivery_reference}}</th>
                            <td class="px-4 py-3 font-semibold text-gray-900 ">{{$shipment->shipment_number}}</td>
                            <td class="px-4 py-3 text-gray-900 ">{{$shipment->delivery_name}}</td>
                            <td class="px-4 py-3  text-gray-900">{{$shipment->city->name}}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">{{$shipment->packages_count}}</td>
                            <td class="px-4 py-3 font-semibold text-gray-900">
                                <x-primary-nav-button href="{{route('shipment.show', $shipment->id)}}"
                                                      class=" mx-auto bg-yellow-400 hover:bg-yellow-300 mr-3">
                                    <i class="fa-solid fa-magnifying-glass mr-2"></i>View
                                </x-primary-nav-button>
                                @if($shipment->shipping_status_id === 1)
                                    <x-primary-nav-button x-data=""
                                                          x-on:click.prevent="$dispatch('open-modal', 'cancel-shipment-modal')"
                                                          class=" mx-auto bg-red-400 hover:bg-red-300 cursor-pointer">
                                        <i class="fa-solid fa-xmark mr-2"></i>Cancel
                                    </x-primary-nav-button>

                                    <x-modal name="cancel-shipment-modal" focusable>
                                        <form method="post" action="{{route('shipment.destroy', $shipment->id)}}" class="p-6">
                                            @csrf
                                            @method('delete')
                                            <p class="text-lg mb-3">Are you sure you want to cancel the shipment with the following number: <br>{{$shipment->shipment_number}}?</p>
                                            <p>This action cannot be undone.</p>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Dismiss') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    {{ __('Cancel shipment') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                @endif
                            </td>
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
