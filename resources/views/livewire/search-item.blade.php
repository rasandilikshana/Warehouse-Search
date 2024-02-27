<div>
    @include('guest.layout.nav')
    <div id="search-header">
        <h1
            class="mt-16 mb-8 text-4xl text-center font-extrabold leading-none tracking-tight text-white md:text-5xl lg:text-6xl dark:text-white">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-500 from-cyan-500">Developer Item
            </span>Master
        </h1>
        <div class="mb-4 text-center text-sm font-semibold text-white">
            Total Results: {{ $totalCount }}
        </div>
        <div class="relative mx-10 md:mx-60 xl:mx-72">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" wire:model="searchTerm" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Drill, Button, Socket..." required>
        </div>
        <br/>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="scrollable-table">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-700">
                <tr class="bg-gray-100">
                    <th scope="col" class="px-6 py-3">
                        CODE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        PRODUCT NAME
                    </th>
                    <th scope="col" class="px-6 py-3">
                        UOM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ASSET TYPE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ItemCat4Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ItemCat5Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ItemCat6Code
                    </th>
                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach($itemprocess as $item)
                <tr class="bg-white border-b hover:bg-gray-100 dark:bg-gray-900 dark:border-gray-700 dark:hover:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->code }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->uom }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->asset_type }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->itemCat4Code }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->itemCat5Code }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->itemCat6Code }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5 mb-2 px-2">
            {{ $itemprocess->links() }}
        </div>
        @include('guest.layout.footer')
    </div>
</div>



