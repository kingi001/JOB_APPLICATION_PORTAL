<flux:modal name="add-vacancy"  class="md:w-900" variant="default" :show="$errors->any() || session('openModal') === 'add-vacancy'">
    <form method="POST" action="{{ route('vacancies.store') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <div>
            <flux:heading size="lg">Add New Vacancy</flux:heading>
            <flux:text class="mt-2">Fill out the form below to post a new job vacancy.</flux:text>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <flux:input label="Reference No." size="sm" name="ref_no" placeholder="e.g. BMA/VAC/001/2025" required />
            <flux:input label="Position" size="sm" name="position" placeholder="e.g. Finance Officer" required />
            <flux:select label="Job Grade" size="sm" name="job_grade" required>
                <option value="">-- Select Grade --</option>
                @foreach (['BMA1', 'BMA2', 'BMA3', 'BMA4', 'BMA5', 'BMA6', 'BMA7', 'BMA8', 'BMA9', 'BMA10', 'BMA11', 'BMA12'] as $grade)
                    <option value="{{ $grade }}">{{ $grade }}</option>
                @endforeach
            </flux:select>
        </div>
        <flux:textarea label="Job Requirements" name="requirements" rows="5" placeholder="Describe the job requirements..." required />
        <flux:textarea label="Job Duties" name="duties" rows="5" placeholder="List the job duties..." required />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <flux:input label="Application Deadline" size="sm" name="application_deadline" type="date" required />
            <flux:select label="Status" name="status" size="sm" required>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
            </flux:select>
        </div>
        <div class="flex justify-end">
            <flux:spacer />
            <flux:button type="submit" size="sm" variant="primary">
                <i class="fas fa-save mr-1"></i> Save Vacancy
            </flux:button>
        </div>
    </form>
</flux:modal>
