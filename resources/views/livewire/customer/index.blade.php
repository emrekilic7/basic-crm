<div class="container mx-auto p-4 w-full">
    <div class="pb-4 flex justify-end">
        <livewire:customer.create />
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" x-data="{ open: false }">
        <div class="grid grid-cols-8 py-4 px-4 bg-white dark:bg-gray-800 gap-2">
            <div class="col-span-3  md:col-span-2">
                <x-form.select wire:model="sortField" id="sortField">
                    <option value="name">Name</option>
                    <option value="id">ID</option>
                    <option value="created_at">Created At</option>
                </x-form.select>
            </div>
            <div class="col-span-3  md:col-span-2">
                <x-form.select wire:model="sortAsc" id="sortAsc">
                    <option value="1">Asc</option>
                    <option value="0">Desc</option>
                </x-form.select>
            </div>
            <div class="col-span-2">
                <x-form.select wire:model="perPage" id="perPage">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </x-form.select>
            </div>
            <div class="col-span-8 md:col-span-2">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <x-form.input wire:model.debounce.300ms="search" type="text" id="table-search-customers" class="pl-10" placeholder="Search for customers"/>
                </div>
            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Created At</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            {{-- <img class="w-10 h-10 rounded-full" src="/"> --}}
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $customer->name. " ".$customer->surname }}</div>
                                <div class="font-normal text-gray-500">{{ $customer->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            {{ $customer->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center" x-data="{ isDeleted: {{ $customer->deleted_at ? 'true' : 'false' }} }">
                                <div :class="{'bg-red-500' : isDeleted, 'bg-green-500': !isDeleted}" class="h-2.5 w-2.5 rounded-full mr-2"></div> {{ $customer->deleted_at ? 'Inactive' : 'Active' }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('customer.edit', $customer->uuid ) }}"><x-button.primary class="text-xs">Edit</x-button.primary></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="p-2">
            {{ $customers->links('pagination::tailwind') }}
        </div>
    </div>
</div>