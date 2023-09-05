<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $name ?? "Project Name" }}
        </h2>
    </x-slot>

    @if ($active)
    <section class="mt-4">
        <div class="mx-auto ">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d px-4 py-1">
                    <div class="flex items-center">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                wire:model.live.debounce.500ms='search'
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Search" required="">
                            </div>

                            <button
                                wire:click="$set('search', '')"
                                class="w-6 h-6 ml-3 bg-red-500 text-white rounded">
                                <x-icon name="x-mark" />
                            </button>
                    </div>

                    <div class="py-4 px-3">
                        <div class="space-x-4 items-center mb-3">
                            <button
                                wire:click="export"
                                class="p-1 flex items-center bg-green-500 text-white rounded">
                                Export <x-icon class="ml-1 w-8 h-8" name="circle-stack" />
                            </button>
                        </div>
                    </div>

                    <div class="py-4 px-3">
                        <div class="flex ">
                            <div class="flex space-x-4 items-center mb-3">
                                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                                <select
                                    wire:model.live="perPage"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th wire:click="setSortBy('id')" scope="col" class="px-2 py-1">id</th>
                                <th wire:click="setSortBy('area')" scope="col" class="px-2 py-1">area</th>
                                <th wire:click="setSortBy('group_1')" scope="col" class="px-2 py-1">group 1</th>
                                <th wire:click="setSortBy('group_2')" scope="col" class="px-2 py-1">group 2</th>
                                <th wire:click="setSortBy('general_classification')" scope="col" class="px-2 py-1">classification</th>
                                <th wire:click="setSortBy('item_type')" scope="col" class="px-2 py-1">item type</th>
                                <th wire:click="setSortBy('qty')" scope="col" class="px-2 py-1">qty</th>
                                <th wire:click="setSortBy('unit_price')" scope="col" class="px-2 py-1">unit price</th>
                                <th wire:click="setSortBy('global_price')" scope="col" class="px-2 py-1">global price</th>
                                <th wire:click="setSortBy('stage')" scope="col" class="px-2 py-1">stage</th>
                                <th wire:click="setSortBy('real')" scope="col" class="px-2 py-1">real</th>
                                <th wire:click="setSortBy('committed')" scope="col" class="px-2 py-1">committed</th>
                                <th wire:click="setSortBy('percentage')" scope="col" class="px-2 py-1">percentage</th>
                                <th wire:click="setSortBy('supplier')" scope="col" class="px-2 py-1">supplier</th>
                                <th wire:click="setSortBy('code')" scope="col" class="px-2 py-1">code</th>
                                <th wire:click="setSortBy('order_no')" scope="col" class="px-2 py-1">order no</th>
                                <th wire:click="setSortBy('input_num')" scope="col" class="px-2 py-1">input num</th>
                                <th wire:click="setSortBy('observations')" scope="col" class="px-2 py-1">observations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $item )

                            <tr wire:key="{{ $item->id }}" class="text-xs border-b dark:border-gray-700">
                                <th scope="row"
                                class="px-2 py-1 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->id }}</th>
                                 <th scope="row"
                                    class="px-2 py-1 text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->area }}</th>
                                <td class="px-2 py-1">{{ $item->group_1 }}</td>
                                <td class="px-2 py-1">{{ $item->group_2 }}</td>
                                <td class="px-2 py-1">{{ $item->general_classification }}</td>
                                <td class="px-2 py-1">{{ $item->item_type }}</td>
                                <td class="px-2 py-1">{{ $item->qty }}</td>
                                <td class="px-2 py-1">{{ $item->unit_price }}</td>
                                <td class="px-2 py-1">{{ $item->global_price }}</td>
                                <td class="px-2 py-1">{{ $item->stage }}</td>
                                <td class="px-2 py-1">{{ $item->real }}</td>
                                <td class="px-2 py-1">{{ $item->committed }}</td>
                                <td class="px-2 py-1">{{ $item->percentage }}</td>
                                <td class="px-2 py-1">{{ $item->supplier }}</td>
                                <td class="px-2 py-1">{{ $item->code }}</td>
                                <td class="px-2 py-1">{{ $item->order_no }}</td>
                                <td class="px-2 py-1">{{ $item->input_num }}</td>
                                <td class="px-2 py-1">{{ $item->observations }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </section>
    @else
        @livewire('user-disabled')
    @endif
</div>
