<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Notes') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your notes') }}</flux:subheading>
    <flux:separator variant="subtle" />
    <flux:modal.trigger name="create-note">
        <flux:button class="mt-4">Create Note</flux:button>
    </flux:modal.trigger>
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
    <livewire:create-note />
    <livewire:edit-note />

    <div class="relative w-full rounded-lg shadow-md mt-6">
        <table class="min-w-full divide-y divide-gray-200 bg-white">
            <thead class="bg-gray-100">
                <tr>

                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                    <th class="text-left px-4 py-3">
                        <input type="checkbox" class="form-checkbox rounded-sm h-3 w-3 text-indigo-600"
                            id="selectAllCheckbox">
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                @forelse ($notes as $note)
                    <tr class="hover:bg-gray-50">
                        <td class="px-2 py-4 font-medium">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-gray-800 whitespace-nowrap">
                            <input type="checkbox" name="note_ids[]" value="{{ $note->id }}"
                                class="note-checkbox form-checkbox rounded-sm h-3 w-3 text-indigo-600">
                        </td>
                        <td class="px-2 py-4 font-medium">{{ $note->title }}</td>
                        <td class="px-2 py-4">{{ $note->content }}</td>
                        <td class="px-1 py-1">
                            <flux:button size="sm" wire:click="edit({{ $note->id }})">
                                <i class="fas fa-edit text-sm"></i>
                            </flux:button>
                            <flux:button size="sm" wire:click="delete({{ $note->id }})">
                                <i class="fas fa-trash text-sm text-red-500"></i>
                            </flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">No notes found.</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

         <!-- Add note Button -->
            <div class="mt-4 flex justify-right border-t border-gray-200 pt-4">
                <!-- Add note Button (Green) -->
                <flux:modal.trigger name="create-note">
                    <button type="button"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                        <i class="fas fa-plus-circle text-sm"></i> {{ __('Add New') }}
                    </button>
                </flux:modal.trigger>

                <!-- Update note Button (Blue) -->
                <button type="button" onclick="handleEditClick()"
                    class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-edit text-sm"></i> {{ __('Update') }}
                </button>
                <!-- Delete note Button -->
                <button onclick="handleDeleteClick()"
                    class="bg-red-600 hover:bg-red-700 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-trash-alt text-sm"></i> {{ __('Delete') }}
                </button>

                <button type="button" onclick="handleRestoreClick()"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-undo-alt text-sm"></i> {{ __('Restore') }}
                </button>
                <!-- Delete Permanently Button -->
                <button type="button" onclick="handleForceDeleteClick()"
                    class="bg-gray-800 hover:bg-black text-white px-1 py-1 text-sm flex items-center gap-2 shadow-md hover:shadow-lg transition-all duration-200 ease-in-out">
                    <i class="fas fa-times-circle text-sm"></i> {{ __('Delete Permanently') }}
                </button>
            </div>
    </div>
    <div class="mt-2  pb-3">
        {{ $notes->links() }}
    </div>
    <!-- Delete Confirmation Modal -->
    <flux:modal name="delete-note" class="min-w-[22rem]">
        <div class="space-y-6">
            <!-- Heading with Icon -->
            <div class="flex items-start gap-3">
                <svg class="w-6 h-6 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                </svg>

                <div>
                    <flux:heading size="lg" class="text-red-700">Delete note?</flux:heading>

                    <flux:text class="mt-2 text-sm text-gray-600">
                        <p>Are you sure you want to permanently delete this note?</p>
                        <p class="mt-1">This action <span class="font-semibold text-red-600">cannot be undone.</span>
                        </p>
                    </flux:text>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost" wire:click="cancelDelete()"
                        class="hover:bg-gray-100 focus:ring-2 focus:ring-offset-1 focus:ring-gray-300">
                        Cancel
                    </flux:button>
                </flux:modal.close>

                <flux:button type="submit" variant="danger" wire:click="confirmDelete()" wire:loading.attr="disabled"
                    wire:target="confirmDelete" class="focus:ring-2 focus:ring-offset-1 focus:ring-red-400">
                    <span wire:loading.remove wire:target="confirmDelete">Delete note</span>
                    <span wire:loading wire:target="confirmDelete">Deleting...</span>
                </flux:button>
            </div>
        </div>
    </flux:modal>

<script>
    function getSelectedNoteId() {
        const selected = document.querySelectorAll('.note-checkbox:checked');
        if (selected.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'No Selection',
                text: 'Please select a note.',
                confirmButtonColor: '#3085d6',
                showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
            });
            return null;
        }

        if (selected.length > 1) {
            Swal.fire({
                icon: 'error',
                title: 'Multiple Selections',
                text: 'Please select only one note.',
                confirmButtonColor: '#d33',
            });
            return null;
        }

        return selected[0].value;
    }

    function handleEditClick() {
        const noteId = getSelectedNoteId();
        if (noteId) {
            @this.edit(noteId); // Calls Livewire method directly
        }
    }

    function handleDeleteClick() {
        const noteId = getSelectedNoteId();
        if (noteId) {
            @this.delete(noteId); // Calls Livewire method directly
        }
    }

    function handleRestoreClick() {
        const noteId = getSelectedNoteId();
        if (noteId) {
            @this.restore(noteId);
        }
    }

    function handleForceDeleteClick() {
        const noteId = getSelectedNoteId();
        if (noteId) {
            @this.forceDelete(noteId);
        }
    }

    // Select All functionality
    document.getElementById('selectAllCheckbox').addEventListener('change', function () {
        document.querySelectorAll('.note-checkbox').forEach(cb => cb.checked = this.checked);
    });

    document.querySelectorAll('.note-checkbox').forEach(cb => {
        cb.addEventListener('change', function () {
            const all = document.querySelectorAll('.note-checkbox');
            const allChecked = Array.from(all).every(cb => cb.checked);
            document.getElementById('selectAllCheckbox').checked = allChecked;
        });
    });
</script>
</div>
