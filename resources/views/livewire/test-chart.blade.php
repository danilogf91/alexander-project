<div>

    <div class="rounded flex flex-col sm:flex-row mt-2 sm:space-x-4">
            <div class="w-1/3 bg-white rounded" >
                <div class="p-4 ">
                    <span class="text-2xl font-extrabold">Booked</span>
                    <h3 class="text-xl font-semibold mt-2">{{ $booked }} $</h3>
                </div>
            </div>

            <div class="w-1/3 bg-white rounded">
                <div class="p-4">
                    <span class="text-2xl font-extrabold">Budgeted</span>
                    <h3 class="text-xl font-semibold mt-2">{{ $budgeted }} $</h3>
                </div>
            </div>

            <div class="w-1/3 bg-white rounded">
                <div class="p-4">
                    <span class="text-2xl font-extrabold">Executed</span>
                    <h3 class="text-xl font-semibold mt-2">{{ $executed }} $</h3>
                </div>
            </div>
    </div>

    <div class="space-y-4 sticky mt-2 top-0 bg-white p-4 shadow z-50 rounded">
        <ul class="text-xs flex flex-col sm:flex-row sm:space-x-8 sm:items-center">
            <li>
                <input type="checkbox" value="innovation" wire:model.live="types"/>
                <span>Innovation</span>
            </li>
            <li>
                <input type="checkbox" value="efficiency_&_saving" wire:model.live="types"/>
                <span>Efficiency Saving</span>
            </li>
            <li>
                <input type="checkbox" value="replacement_&_restructuring" wire:model.live="types"/>
                <span>Replacement Restructuring</span>
            </li>
            <li>
                <input type="checkbox" value="quality_&_hygiene" wire:model.live="types"/>
                <span>Quality Hygiene</span>
            </li>
            <li>
                <input type="checkbox" value="health_&_safety" wire:model.live="types"/>
                <span>Health Safety</span>
            </li>
            <li>
                <input type="checkbox" value="environment" wire:model.live="types"/>
                <span>Environment</span>
            </li>
            <li>
                <input type="checkbox" value="maintenance" wire:model.live="types"/>
                <span>Maintenance</span>
            </li>
            <li>
                <input type="checkbox" value="capacity_increase" wire:model.live="types"/>
                <span>Capacity Increase</span>
            </li>
        </ul>

        <div class="text-xs">
            <input type="checkbox" value="other" wire:model.live="showDataLabels"/>
            <span>Show data labels</span>
        </div>
    </div>

        <div class="flex flex-col mt-2 sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">

            <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel->reactiveKey() }}"
                    :column-chart-model="$columnChartModel"
                />
            </div>
            <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel2->reactiveKey() }}"
                    :column-chart-model="$columnChartModel2"
                />
            </div>

            <div class="shadow rounded p-4 border bg-white flex-1" style="height: 20rem;">

                <livewire:livewire-radar-chart
                    key="{{ $radarChartModel->reactiveKey() }}"
                    :radar-chart-model="$radarChartModel"
                />
            </div>
        </div>
</div>
