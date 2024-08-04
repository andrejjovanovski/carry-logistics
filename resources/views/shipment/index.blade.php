<x-app-layout>
    <div class="container mx-auto">
        <div class="heading flex items-center">
            <h3 class="font-semibold mr-3">My orders</h3>
            <ul class="items-center w-1/6 text-sm text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r text-center">
                    <div class="flex items-center peer">
                        <input id="horizontal-list-radio-license" checked type="radio" value="" name="list-radio" class="peer hidden">
                        <label for="horizontal-list-radio-license" class="w-full py-3 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200"><i class="fa-solid fa-cart-shopping mr-2"></i>Open</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r text-center">
                    <div class="flex items-center peer">
                        <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio" class="peer hidden">
                        <label for="horizontal-list-radio-id" class="w-full py-3 text-sm font-medium text-gray-900 peer-checked:bg-blue-100 hover:cursor-pointer hover:bg-blue-200">Closed</label>
                    </div>
                </li>
            </ul>
        </div>

        <div style="min-height: calc(100vh - 170px)">
            <div>

            </div>
        </div>

    </div>
</x-app-layout>
