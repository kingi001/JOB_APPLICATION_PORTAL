<?php

namespace App\Livewire\ProfessionanlQualification;

use App\Models\ProfessionalQualification;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Professional extends Component
{
    public $professionalId;
    public $selectedqualificationname;
    public $selected;
    // an array to hold selected qualifications for bulk delete
    public array $selectedIds = [];
    public function render()
    {
        // This method is responsible for rendering the view
        $professional = ProfessionalQualification::where('user_id', Auth::id())
        ->orderBy('created_at', 'asc')
        ->get();

        return view('livewire.professionanl-qualification.professional', [
            'professional' => $professional
        ]);
    }
     public function getSelectedIds()
    {
        return $this->selectedIds;
    }
    public function edit($id)
    {
        $this->dispatch('edit-professional', $id);
    }
     public function delete($id)
    {
        $professional = ProfessionalQualification::findOrFail($id);
        $this->professionalId = $professional->id;
        $this->selectedqualificationname = $professional->institution; // Assuming institution is a field in the professional model
        Flux::modal('delete-professional')->show();
    }
        public function confirmDelete()
    {
        $professional = ProfessionalQualification::findOrFail($this->professionalId);
        $professional->delete();
        session()->flash('message', 'Academic qualification deleted successfully.');
        Flux::modal('delete-professional')->close();
        redirect()->route('ProfessionalQualification');
    }
}



