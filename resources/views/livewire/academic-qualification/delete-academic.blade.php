<div>
    <flux:modal name="delete-education" class="min-w-[22rem]">
        <div class="space-y-6">
            <!-- Heading with Icon -->
            <div class="flex items-start gap-3">
                <svg class="w-10 h-10 text-red-600 mt-1 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M12 6a9 9 0 100 18 9 9 0 000-18z" />
                </svg>
                <div>
                    <flux:heading size="lg" class="text-red-700">Delete Academic Qualification?</flux:heading>
                    <flux:text class="mt-2 text-sm text-gray-600">
                        <p>Are you sure you want to delete the academic qualification with
                            <span class="font-semibold text-red-600">{{ $selectedIds['institution'] ?? '' }}</span>
                        </p>
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
                    <span wire:loading.remove wire:target="confirmDelete">Delete Qualification</span>
                    <span wire:loading wire:target="confirmDelete">Deleting...</span>
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
