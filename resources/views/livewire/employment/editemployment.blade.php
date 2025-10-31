<div>
    <flux:modal name="edit-employment" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Edit Employment</flux:heading>
                <flux:text class="mt-2">Update your employment details below.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <flux:input label="Designation" size="sm" name="designation" placeholder="e.g. Software Engineer"
                    wire:model.defer="designation" />

                <flux:input label="Job Scale" size="sm" name="job_scale" placeholder="e.g. Scale 1"
                    wire:model.defer="job_scale" />

                <flux:input label="Organization" size="sm" name="organization" placeholder="e.g. ABC Company"
                    wire:model.defer="organization" />

            </div>
            <flux:textarea label="Duties" size="sm" name="duties" placeholder="e.g. System development, support"
                    wire:model.defer="duties" rows="7" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Start Date" size="sm" type="date" name="start_date" wire:model.defer="start_date" />

                <flux:input label="End Date (leave blank if current)" size="sm" type="date" name="end_date"
                    wire:model.defer="end_date" />
            </div>

            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="update">Update</flux:button>
                <div wire:loading class="flex items-center space-x-2 text-sm text-blue-600 ml-2 animate-pulse">
                    <svg class="w-4 h-4 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                    </svg>
                    <span>Updating Employment...</span>
                </div>
            </div>
        </div>
    </flux:modal>
</div>
