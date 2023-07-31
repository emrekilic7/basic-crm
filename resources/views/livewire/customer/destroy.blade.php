<div>
    @if(!$customer->deleted_at)
        <x-button.danger class="text-sm" wire:click="openModalToDestroyCustomer" wire:loading.attr="disabled">Deactivate</x-button.danger>

        <x-modal.dialog-modal wire:model="openModal">
            <x-slot name="title">
                {{ __("Deactivated users can be recovered later") }}
            </x-slot>
            <x-slot name="content">
                <x-button.danger wire:click="destroy" wire:loading.attr='disabled'>Proceed</x-button.danger>
                <x-button.secondary wire:click.prevent="$toggle('openModal')">Cancel</x-button.secondary>
            </x-slot>
        </x-modal.dialog-modal>
    @else
        <x-button.success class="text-sm" wire:click="restore" wire:loading.attr="disabled">Restore</x-button.success>
    @endif
</div>