<?php
namespace App\Livewire\AcademicQualification;
use App\Models\Education;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Academic extends Component
{
    public $educationId;
    public $selectedInstitution;
    public array $selectedIds = [];
    public function render()
    {
        $education = Education::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
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
        $education = Education::findOrFail($id);
        $this->educationId = $education->id;
        $this->selectedInstitution = $education->institution; // Assuming institution is a field in the Education model
        Flux::modal('delete-education')->show();
    }
    public function confirmDelete()
    {
        $education = Education::findOrFail($this->educationId);
        $education->delete();
        session()->flash('message', 'Academic qualification deleted successfully.');
        Flux::modal('delete-education')->close();
        redirect()->route('education');
    }
    public function cancelDelete()
    {
        $this->reset(['educationId', 'selectedIds']);
        Flux::modal('delete-education')->close();
    }
}
