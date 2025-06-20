<div>
<flux:modal name="edit-note" class="md:w-900">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Update</flux:heading>
            <flux:text class="mt-2">Update notes for Personal Use.</flux:text>
        </div>
        <flux:input
         label="Title"
         wire:model="title"
         size="sm"
         placeholder="Enter Note Title" />

        <flux:textarea
         label="Content"
         size="sm"
         wire:model="content"
         placeholder="Enter Note Content" />

        <div class="flex">
            <flux:spacer/>
            <flux:button type="submit" size="sm" variant="primary" wire:click="update" >Update</flux:button>
        </div>
    </div>
</flux:modal>
</div>

