<?php

namespace App\Livewire\AcademicQualification;

use App\Models\Education;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;



class DeleteAcademic extends Component
{
    public $educationId;
    public array $selectedIds = [];
    public function getSelectedIds()
    {
        return $this->selected ?? [];
    }
    #[On('delete-education')]


    public function delete($id)
    {
        // Step 1: Find the education record or fail
        $education = Education::findOrFail($id);

        // Step 2: Store ID for deletion
        $this->educationId = $education->id;

        // Step 3: Store only necessary fields in the array
        $this->selectedIds = $education->only(['id', 'institution', 'start_date', 'end_date']);

        // Step 4: Show the delete confirmation modal
        Flux::modal('delete-education')->show();
    }

    public function confirmDelete()
    {
        // Step 5: Perform the actual deletion
        Education::findOrFail($this->educationId)->delete();

        // Step 6: Reset state
        $this->reset(['educationId', 'selectedIds']);

        // Step 7: Close the modal and flash message
        Flux::modal('delete-education')->close();
        session()->flash('message', 'Education record deleted successfully.');

        // Optional: Redirect to education route if needed
        return redirect()->route('education');
    }

    public function render()
    {
        return view('livewire.academic-qualification.delete-academic');
    }
}

