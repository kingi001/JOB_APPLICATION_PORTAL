<?php

namespace App\Livewire\AcademicQualification;

use App\Models\Education;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Academic extends Component
{
    public $educationId;
    public array $selectedIds = [];
    public function render()
    {
        $education = Education::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view(
            'livewire.academic-qualification.academic',
            ['education' => $education]
        );
    }
    public function getSelectedIds()
    {
        return $this->selectedIds;
    }
    public function edit($id)
    {
        $this->dispatch('edit-academic', $id);
    }
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
}
