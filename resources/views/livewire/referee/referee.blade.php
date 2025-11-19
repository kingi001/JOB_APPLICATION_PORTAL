<div>
    <livewire:header>
        <livewire:referee.create />
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-6 right-6 w-full max-w-sm bg-white border-l-4 border-green-500 text-green-800 p-3 rounded-lg shadow-lg flex items-start space-x-3 z-50"
                role="alert">
                <svg class="w-6 h-6 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <div class="flex-1">
                    <p class="font-semibold text-sm">Success</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-green-400 hover:text-green-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session('validation_errors'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 4000)"
                class="fixed top-6 right-6 w-full max-w-sm bg-white border-l-4 border-red-500 text-red-800 p-3 rounded-md shadow-md flex items-start space-x-3 z-50"
                role="alert">
                <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <div class="flex-1">
                    <p class="font-semibold text-sm">Error</p>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
                <button @click="show = false" class="text-red-400 hover:text-red-600 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="py-1 mt-2 container mx-auto sm:px-6 lg:px-8 border border-gray-200 rounded-lg shadow-md bg-white">
            <div class="p-2 bg-white border-b border-gray-200 rounded-lg flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-indigo-800 flex items-center gap-3">
                        <i class="fas fa-user-tie text-blue-600 text-lg"></i>
                        {{ __('Referee Details') }}
                    </h3>
                    <p class="text-sm text-gray-500 mt-1">
                        Manage your referees used in applications. You have
                        <span class="font-medium text-gray-800">{{ $referee->count() ?? 0 }}</span>
                        saved referee{{ ($referee->count() ?? 0) === 1 ? '' : 's' }}.
                    </p>
                    <p class="text-sm text-gray-500 mt-1">
                        Please have at least three referees who know you professionally (for example: former managers,
                        supervisors or
                        colleagues).
                    </p>
                    <flux:modal.trigger name="create-referee" class="flex items-center gap-2">
                        <button type="button"
                            class="bg-blue-600 mt-5 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                            <i class="fas fa-plus-circle text-sm"></i> {{ __('Add Referee') }}
                        </button>
                    </flux:modal.trigger>
                </div>
                <!--referee table-->
                <div class="mt-4">
                    @if($referee->isEmpty())
                        <div class="overflow-x-auto hidden md:block mt-2">
                            <div class="relative w-full mt-4 mb-4 pl-2">
                                <div
                                    class="text-center py-8 px-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg shadow-sm">
                                    <div class="flex justify-center mb-3">
                                        <i class="fas fa-user-tie text-4xl text-gray-400"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-700">No Referee Available</h3>
                                    <p class="text-sm text-gray-500 mt-2">
                                        You have not added any referees yet. Click "Add Referee" to store referee details
                                        used on your applications.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- mobile empty state -->
                        <div class="block md:hidden mt-4">
                            <div class="p-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg text-center">
                                <i class="fas fa-user-tie text-3xl text-gray-400 mb-2"></i>
                                <p class="text-sm text-gray-600">No referees added. Use the Add Referee button to create
                                    one.</p>
                            </div>
                        </div>
                    @else
                        <!-- desktop table -->
                        <div class="overflow-x-auto mt-2">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Full
                                            name</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">
                                            Occupation</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">City
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email
                                        </th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Phone
                                        </th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">Years
                                            known</th>
                                        <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($referee as $r)
                                        <tr>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700">{{ $r->full_name }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $r->occupation }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $r->city }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $r->email }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-600">{{ $r->phone_number }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-center text-sm text-gray-600">
                                                {{ $r->years_known }}
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap text-center text-sm">
                                                <flux:modal.trigger name="edit-referee" wire:click="edit({{ $r->id }})">
                                                    <button type="button"
                                                        class="inline-flex items-center px-3 py-1 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700 mr-2">
                                                        <i class="fas fa-edit mr-2"></i>Edit
                                                    </button>
                                                </flux:modal.trigger>
                                                <flux:modal.trigger name="delete-referee" wire:click="delete({{ $r->id }})">
                                                    <button type="button"
                                                        class="inline-flex items-center px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                                        <i class="fas fa-trash-alt mr-2"></i>Delete
                                                    </button>
                                                </flux:modal.trigger>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <flux:modal name="delete-referee" class="min-w-[22rem]">
            <div class="space-y-6">
                {{-- Header Section --}}
                <div class="flex items-start gap-3">
                    <svg class="w-10 h-10 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                    </svg>

                    <div>
                        <flux:heading size="lg" class="text-red-700">Delete Referee?</flux:heading>
                        <flux:text class="mt-2 text-sm text-gray-600">
                            <p>
                                Are you sure you want to delete the employment record for
                                <span class="font-semibold text-red-600">{{ $selectedName }}</span>?
                            </p>
                            <p class="mt-1">
                                This action
                                <span class="font-semibold text-red-600">cannot be undone.</span>
                            </p>
                        </flux:text>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex justify-end gap-2">
                    {{-- Cancel button --}}
                    <flux:button variant="ghost" wire:click="cancelDelete()"
                        class="hover:bg-gray-100 focus:ring-2 focus:ring-offset-1 focus:ring-gray-300">
                        Cancel
                    </flux:button>

                    {{-- Confirm Delete --}}
                    <flux:button type="button" variant="danger" size="sm" wire:click="confirmDelete()"
                        wire:loading.attr="disabled" wire:target="confirmDelete"
                        class="focus:ring-2 focus:ring-offset-1 focus:ring-red-400">
                        <span wire:loading.remove wire:target="confirmDelete">Delete Employment</span>
                        <span wire:loading wire:target="confirmDelete">Deleting...</span>
                    </flux:button>
                </div>
            </div>
        </flux:modal>

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
                    <flux:input label="City *" size="sm" name="city" placeholder="e.g. Nairobi"
                        wire:model.defer="city" />
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
                        <flux:button size="sm" type="submit" variant="primary" wire:click="update" loading="true">
                            Update
                        </flux:button>
                        <div wire:loading class="flex items-center space-x-2 text-sm text-blue-600 ml-2 animate-pulse">
                            <svg class="w-4 h-4 animate-spin text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
                                </path>
                            </svg>
                            <span>Updating Referee...</span>
                        </div>
                    </div>
                </div>
        </flux:modal>


</div>
