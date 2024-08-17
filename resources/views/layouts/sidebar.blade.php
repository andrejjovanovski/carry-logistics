<aside :class="{'-translate-x-0': open, '-translate-x-full': ! open}"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform  bg-white border-r border-gray-200 sm:translate-x-0">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class="fa-solid fa-chart-line text-blue-500"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('shipment.index')"
                            :active="request()->routeIs('shipment.index') || request()->routeIs('shipment.create') || request()->routeIs('shipment.show')">
                    <i class="fa-solid fa-truck-fast text-blue-500"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">My orders</span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('tracking.index')" :active="request()->routeIs('tracking.index')">
                    <i class="fa-solid fa-location-dot text-blue-500"></i>
                    <span class="flex-1 ms-3 whitespace-nowrap">Tracking</span>
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('inbox')">
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                </x-nav-link>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <svg
                        class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
