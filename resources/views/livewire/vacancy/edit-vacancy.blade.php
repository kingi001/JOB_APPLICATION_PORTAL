<div>
    <flux:modal name="edit-vacancy" class="md:w-900">
        <div class="space-y-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <div>
                <flux:heading size="lg">Update Vacancy</flux:heading>
                <flux:text class="mt-2">Modify the vacancy details below to keep job listings accurate and up to date.
                </flux:text>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <flux:input label="Reference No." size="sm" name="ref_no" placeholder="e.g. BMA/VAC/001/2025"
                    wire:model="ref_no" />
                <flux:input label="Position" size="sm" name="position" placeholder="e.g. Finance Officer"
                    wire:model="position" />
                <flux:select label="Job Grade" size="sm" name="job_grade" wire:model="job_grade" required>
                    <option value="">-- Select Grade --</option>
                    @foreach (['BMA1', 'BMA2', 'BMA3', 'BMA4', 'BMA5', 'BMA6', 'BMA7', 'BMA8', 'BMA9', 'BMA10', 'BMA11', 'BMA12'] as $grade)
                        <option value="{{ $grade }}">{{ $grade }}</option>
                    @endforeach
                </flux:select>
                <flux:select label="Terms of Employment" size="sm" name="employment_type"
                    wire:model="terms_of_employment" required>
                    <option value="">-- Select Type --</option>
                    @foreach (['Permanent', 'Contract', 'Internship', 'Attachment'] as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </flux:select>
            </div>
            <flux:textarea label="Job Requirements" name="requirements" rows="5"
                placeholder="Describe the job requirements..." wire:model="requirements" />
            <flux:textarea label="Job Duties" name="duties" rows="5" placeholder="List the job duties..."
                wire:model="duties" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <flux:input label="Application Deadline" size="sm" name="application_deadline" type="date"
                    wire:model="application_deadline" />
                <flux:select label="Status" name="status" size="sm" wire:model="status">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </flux:select>
            </div>
            <div class="flex">
                <flux:spacer />
                <flux:button size="sm" type="submit" variant="primary" wire:click="update">Update Vacancy</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
