<div>
    <flux:modal name="add-employment" class="md:w-[42rem] rounded-xl shadow-xl" variant="flyout">

        <div class="space-y-6 p-1">

            {{-- Header --}}
            <div class="space-y-1.5">
                <flux:heading size="lg" class="font-semibold">
                    Add New Employment
                </flux:heading>

                <flux:text class="text-gray-600 text-sm">
                    Please provide your employment details below.
                </flux:text>
            </div>

            <flux:separator />

            {{-- Form Fields --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <flux:input
                    label="Designation / Position"
                    size="sm"
                    name="designation"
                    placeholder="Software Engineer"
                    wire:model.defer="designation"
                    required />

                <flux:input
                    label="Grade/Gross Salary(Ksh)"
                    size="sm"
                    name="job_scale"
                    placeholder="GRADE 4 / 200,000"
                    wire:model.defer="job_scale" />

                <flux:input
                    label="Organization"
                    size="sm"
                    name="organization"
                    placeholder="KRA, KPA, etc."
                    wire:model.defer="organization"
                    required />
            </div>

            {{-- Duties --}}
            <flux:textarea
                label="Nature of Work / Duties & Responsibilities"
                size="sm"
                name="duties"
                wire:model.defer="duties"
                placeholder="Describe the responsibilities, key tasks, and scope of your role."
                rows="10"
                class="text-sm" />

            {{-- Dates --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <flux:input
                    label="Start Date"
                    size="sm"
                    type="date"
                    name="start_date"
                    wire:model.defer="start_date"
                    required />

                <flux:input
                    label="End Date (Leave blank if current)"
                    size="sm"
                    type="date"
                    name="end_date"
                    wire:model.defer="end_date" />
            </div>

            <flux:separator />

            {{-- Footer --}}
            <div class="flex justify-end items-center gap-3">

                {{-- Cancel --}}
                {{-- <flux:button
                    variant="ghost"
                    size="sm"
                    class="text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-lg"
                    click-action="close">
                    Cancel
                </flux:button> --}}

                {{-- Save --}}
                <flux:button
                    size="sm"
                    type="submit"
                    variant="primary"
                    wire:click="submit"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                    class="rounded-lg shadow-sm hover:shadow-md transition-all">

                    <span wire:loading.remove wire:target="submit">
                        Save Employment
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
