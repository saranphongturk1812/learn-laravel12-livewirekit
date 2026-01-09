<div>
    <flux:modal name="create-note" class="md:w-900">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Create Note</flux:heading>
                <flux:text class="mt-2">Make Notes to the memory</flux:text>
            </div>

            <flux:input type="text" label="Title" placeholder="Add your title" wire:model="title" />


            <flux:input type="textarea" label="Content" placeholder="Add your content" wire:model="content" />

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="save">Save</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
