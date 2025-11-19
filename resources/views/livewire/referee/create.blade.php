<div>
   <flux:modal name="create-referee" class="md:w-[32rem] rounded-xl shadow-xl">
    <div class="space-y-3 p-1">

        {{-- Header --}}
        <div class="space-y-1.5">
            <flux:heading size="lg" class="font-semibold">
                Add New Referee
            </flux:heading>

            <flux:text class="text-gray-600 text-sm">
                Please fill in the information below to create a new referee profile.
            </flux:text>
        </div>

        <flux:separator />

        {{-- Form Fields --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <flux:input
                label="Full Name *"
                size="sm"
                name="full_name"
                placeholder="John Doe"
                wire:model.defer="full_name"
                required />

            <flux:input
                label="Occupation *"
                size="sm"
                placeholder="Manager, CEO"
                name="occupation"
                wire:model.defer="occupation"
                required />

            <flux:input
                label="City *"
                size="sm"
                placeholder="Nairobi"
                name="city"
                wire:model.defer="city"
                required />

            <flux:input
                label="Email"
                size="sm"
                placeholder="john@example.com"
                name="email"
                wire:model.defer="email" />

            <flux:input
                label="Phone *"
                size="sm"
                placeholder="0712345678"
                name="phone_number"
                wire:model.defer="phone_number"
                required />

            <flux:input
                label="Postal Address"
                size="sm"
                placeholder="1254"
                name="postal_address"
                wire:model.defer="postal_address" />

            <flux:input
                label="Postal Code"
                size="sm"
                placeholder="00100"
                name="postal_code"
                wire:model.defer="postal_code" />

            <flux:input
                label="Years Known"
                size="sm"
                placeholder="5"
                name="years_known"
                wire:model.defer="years_known" />

        </div>

        <flux:separator />

        {{-- Footer Actions --}}
        <div class="flex justify-end items-center gap-3 mt-1">
            {{-- Save Button --}}
            <flux:button
                size="sm"
                variant="primary"
                wire:click="submit"
                wire:loading.attr="disabled"
                wire:target="submit"
                class="rounded-lg shadow-sm hover:shadow-md transition-all">

                <span wire:loading.remove wire:target="submit">
                    Save Referee
                </span>

                <span wire:loading wire:target="submit" class="flex items-center gap-2">
                    <svg class="w-4 h-4 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-30" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                        <path class="opacity-70" fill="currentColor"
                            d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z" />
                    </svg>
                    Saving...
                </span>

            </flux:button>
        </div>
    </div>
</flux:modal>

</div>
