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
        </div>

        <div class="flex absolute top-2/4 left-2/4 -translate-x-1/2 -translate-y-1/2 text-center">
            <div class="wrapper">
                <i class="fa-solid fa-cart-shopping bg-blue-100 text-blue-500 py-2 px-3 rounded-full text-xl"></i>
                <p class="">No open orders</p>
                <small class="text-gray-500">Book your next shipment now</small>

                <x-primary-nav-button class="block mx-auto mt-3" href="{{route('shipment.create')}}">
                    {{__('+ shipment')}}
                </x-primary-nav-button>
            </div>
        </div>

    </div>
</x-app-layout>
