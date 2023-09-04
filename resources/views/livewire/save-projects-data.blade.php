<div>
    <button
        wire:click="$set('openModal', true)"
        class="w-6 h-6 mr-1 bg-yellow-500 text-white rounded">
        <x-icon name="table-cells" />
    </button>


    <x-dialog-modal wire:model.live="openModal">
        <x-slot name="title" class="font-extrabold text-xl">
            {{ __('Upload Data') }}
        </x-slot>

        <x-slot name="content">
            <span class="font-extrabold text-xl">
                <h1>FILE UPLOAD</h1>
            </span>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('openModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click='delete({{ $project->id }})' wire:loading.attr="disabled">
                {{ __('Save Data') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
