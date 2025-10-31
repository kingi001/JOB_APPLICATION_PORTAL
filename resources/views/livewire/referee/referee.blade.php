<div>
    <livewire:header>
    <livewire:referee.create/>
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
                        Please add at least two referees who know you professionally (for example: former managers,
                        supervisors or
                        colleagues).

                    </p>
                    <flux:modal.trigger name="create-referee" class="flex items-center gap-2">
                        <button type="button"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
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
                                                <button wire:click="edit({{ $r->id }})"
                                                    class="inline-flex items-center px-3 py-1 text-sm bg-indigo-600 text-white rounded hover:bg-indigo-700 mr-2">
                                                    <i class="fas fa-edit mr-2"></i>Edit
                                                </button>
                                                <button wire:click="delete({{ $r->id }})"
                                                    class="inline-flex items-center px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                                    <i class="fas fa-trash-alt mr-2"></i>Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- mobile list -->
                        <div class="block md:hidden mt-4 space-y-3">
                            @foreach($referee as $r)
                                <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h4 class="text-sm font-semibold text-gray-800">{{ $r->full_name }}</h4>
                                            <p class="text-xs text-gray-500">{{ $r->occupation }} · {{ $r->city }}</p>
                                            <p class="text-xs text-gray-500 mt-2">{{ $r->email }} · {{ $r->phone_number }}</p>
                                        </div>
                                        <div class="flex flex-col items-end space-y-2">
                                            <button wire:click="edit({{ $r->id }})"
                                                class="text-xs px-2 py-1 bg-indigo-600 text-white rounded">Edit</button>
                                            <button wire:click="delete({{ $r->id }})"
                                                class="text-xs px-2 py-1 bg-red-600 text-white rounded">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>





        </div>
