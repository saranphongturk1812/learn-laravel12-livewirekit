<div>
    <flux:modal name="edit-note" class="md:w-900">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit Note</flux:heading>
                <flux:text class="mt-2">Edit Notes to the memory</flux:text>
            </div>

            <flux:input type="text" label="Title" placeholder="Chang your title" wire:model="title" />


            <flux:input type="textarea" label="Content" placeholder="Chang your content" wire:model="content" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="update">Edit</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
