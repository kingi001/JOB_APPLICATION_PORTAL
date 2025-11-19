<div>
    <flux:modal name="edit-referee" class="md:w-400">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Update Referee</flux:heading>
                <flux:text class="mt-2">Fill out the details below to add a new referee.</flux:text>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Full Name *" size="sm" name="full_name" placeholder="e.g. John Doe"
                    wire:model.defer="full_name" required aria-label="Full name" />
                <flux:input label="Occupation *" size="sm" name="occupation" placeholder="e.g. Manager,CEO"
                    wire:model.defer="occupation" />
                <flux:input label="City *" size="sm" name="city" placeholder="e.g. Nairobi" wire:model.defer="city" />
                <flux:input label="Email" size="sm" name="email" placeholder="e.g.doe@gmail.com"
                    wire:model.defer="email" />
                <flux:input label="Phone" size="sm" name="phone_number" placeholder="e.g. 071234**" required
                    wire:model.defer="phone_number" />
                <flux:input label="Postal Address" size="sm" name="postal_address" placeholder="e.g. 1254"
                    wire:model.defer="postal_address" />
                <flux:input label="Postal Code" size="sm" name="postal_code" placeholder="e.g. 00100"
                    wire:model.defer="postal_code" />
                <flux:input label="Years Known" size="sm" name="years_known" placeholder="e.g. 5"
                    wire:model.defer="years_known" />
                <div class="relative mt-4 w-full">
                    <flux:spacer />
                    <flux:button size="sm" type="submit" variant="primary" wire:click="update" loading="true">Update
                    </flux:button>
                    <div wire:loading class="flex items-center space-x-2 text-sm text-blue-600 ml-2 animate-pulse">
                        <svg class="w-4 h-4 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                        </svg>
                        <span>Updating Referee...</span>
                    </div>
                </div>
            </div>
    </flux:modal>
</div>
