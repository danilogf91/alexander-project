{{-- <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="col-span-3">
            <label
                htmlFor="name"
                class="block text-sm font-medium"
            >
                Project Name
            </label>
            <input
                wire:model.live.debounce.250ms="form.name"
                type="text"
                name="name"
                class="mt-1 p-2 w-full border rounded"
            />
            <x-input-error for='name'/>
        </div>
        <div class="col-span-3">
            <label
                htmlFor="pda_code"
                class="block text-sm font-medium"
            >
                PDA code
            </label>
            <input
                wire:model.live.debounce.250ms="pda_code"
                type="text"
                name="pda_code"
                class="mt-1 p-2 w-full border rounded"
            />
            <x-input-error for='pda_code'/>
        </div>

        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="rate"
                class="block text-sm font-medium"
            >
                Rate $ to €
            </label>
            <input
                wire:model.live.debounce.250ms="rate"
                type="number"
                min={0}
                step={0.01}
                name="rate"
                class="mt-1 p-2 w-full border rounded"
            />
            <x-input-error for='rate'/>
        </div>
        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="state"
                class="block text-sm font-medium"
            >
                Project State
            </label>
            <select
                wire:model.live.debounce.250ms="state"
                name="state"
                class="mt-1 p-2 w-full border rounded"
            >
                <option value="planification">
                    Planification
                </option>
                <option value="execution">Execution</option>
                <option value="finished">Finished</option>
            </select>
            <x-input-error for='planification'/>
        </div>
        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="investments"
                class="block text-sm font-medium"
            >
                Investments
            </label>
            <select
                wire:model.live.debounce.250ms="investments"
                name="investments"
                class="mt-1 p-2 w-full border rounded"
            >
                <option value="innovation">Innovation</option>
                <option value="efficiency_&_saving">
                    Efficiency & Saving
                </option>
                <option value="replacement_&_restructuring">
                    Replacement & Restructuring
                </option>
                <option value="quality_&_hygiene">
                    Quality & Hygiene
                </option>
                <option value="health_&_safety">
                    Health & Safety
                </option>
                <option value="environment">Environment</option>
                <option value="maintenance">Maintenance</option>
                <option value="capacity_increase">
                    Capacity Increase
                </option>
            </select>
            <x-input-error for='innovation'/>
        </div>
        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="justification"
                class="block text-sm font-medium"
            >
                Justification
            </label>
            <select
                wire:model.live.debounce.250ms="justification"
                name="justification"
                class="mt-1 p-2 w-full border rounded"
            >
                <option value="normal_capex">
                    Normal Capex
                </option>
                <option value="special_project">
                    Justification
                </option>
            </select>
            <x-input-error for='normal_capex'/>
        </div>
        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="start_date"
                class="block text-sm font-medium"
            >
                Start Date
            </label>
            <input
                wire:model.live.debounce.250ms="start_date"
                type="date"
                name="start_date"
                class="mt-1 p-2 w-full border rounded"
            />
            <x-input-error for='start_date'/>
        </div>
        <div class="md:col-span-1 col-span-3">
            <label
                htmlFor="finish_date"
                class="block text-sm font-medium"
            >
                Ending Date
            </label>
            <input
                wire:model.live.debounce.250ms="finish_date"
                type="date"
                name="finish_date"
                class="mt-1 p-2 w-full border rounded"
            />
            <x-input-error for='finish_date'/>
        </div>
    </div>
</div> --}}

<div>
    <section class="mt-4">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
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

                    @if ($is_admin_user)
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">

                            <livewire:create-projects/>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th wire:click="setSortBy('id')" scope="col" class="px-2 py-1">id</th>
                                <th wire:click="setSortBy('name')" scope="col" class="px-2 py-1">name</th>
                                <th wire:click="setSortBy('pda_code')" scope="col" class="px-2 py-1">pda code</th>
                                <th wire:click="setSortBy('rate')" scope="col" class="px-2 py-1">rate</th>
                                <th wire:click="setSortBy('state')" scope="col" class="px-2 py-1">state</th>
                                <th wire:click="setSortBy('investments')" scope="col" class="px-2 py-1">investments</th>
                                <th wire:click="setSortBy('justification')" scope="col" class="px-2 py-1">justification</th>
                                @if ($is_admin_user)
                                <th scope="col" class="px-2 py-1">
                                    <span class="sr-only">Actions</span>
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $projects as $project )

                            <tr wire:key="{{ $project->id }}" class="border-b dark:border-gray-700">
                                <th scope="row"
                                class="px-2 py-1 font-sm text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $project->id }}</th>
                                <th scope="row"
                                    class="px-2 py-1 font-sm text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $project->name }}
                                </th>

                                <td class="px-2 py-1">{{ $project->pda_code }}</td>
                                <td class="px-2 py-1">{{ $project->rate }}</td>
                                <td class="px-2 py-1">{{ $project->state }}</td>
                                <td class="px-2 py-1">{{ $project->investments }}</td>
                                <td class="px-2 py-1">{{ $project->justification }}</td>

                                @if ($is_admin_user)
                                    <td class="px-2 py-1 flex items-center justify-center">
                                        <livewire:edit-projects :key="$project->id" :project="$project" />
                                        <livewire:delete-projects :key="$project->id.$project->name" :project="$project" />
                                        <livewire:save-projects-data :key="$project->name.$project->id" :project="$project" />
                                    </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="py-4 px-3">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
