<?php

namespace App\Livewire\ProfessionanlQualification;
use App\Models\ProfessionalQualification;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editprofessional extends Component
{
    use WithFileUploads;
    public $qualificationId, $qualification_name, $certifying_body, $certificate_number, $award, $date_awarded, $valid_until, $qualification_document;
    public $qualification_document_path;
    #[On('edit-profession')]
    public function editProfession($id)
    {
        $professional = ProfessionalQualification::findOrFail($id);
        $this->qualificationId = $professional->id;
        $this->qualification_name = $professional->qualification_name;
        $this->certifying_body = $professional->certifying_body;
        $this->certificate_number = $professional->certificate_number;
        $this->award = $professional->award;
        $this->qualification_document_path = $professional->qualification_document; // ✅ pass to view
        $this->date_awarded = optional($professional->date_awarded)->format('Y-m-d');
        $this->valid_until = optional($professional->valid_until)->format('Y-m-d');
        Flux::modal('edit-profession')->show();
    }
    public function update()
    {
        $this->validate([
            'qualification_name' => 'required|string|max:255',
            'certifying_body' => 'required|string|max:255',
            'certificate_number' =>'required|string|max:255|unique:professional_qualifications,certificate_number,' . $this->qualificationId,
            'award' => 'required|in:Licensed,Certified,Pass,Distinction,Credit',
            'date_awarded' => 'required|date',
            'valid_until' => 'nullable|date|after_or_equal:date_awarded',
            'qualification_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Assuming the document can be a PDF or image
        ]);
        $professional = ProfessionalQualification::findOrFail($this->qualificationId);
        $filePath = $this->qualification_document
            ? $this->qualification_document->store('documents/professional', 'public')
            : $professional->qualification_document;

        $professional->update([
            'user_id' => Auth::id(),
            'qualification_name' => $this->qualification_name,
            'certifying_body' => $this->certifying_body,
            'certificate_number' => $this->certificate_number,
            'award' => $this->award,
            'date_awarded' => $this->date_awarded,
            'valid_until' => $this->valid_until,
            'qualification_document' => $filePath,
        ]);
        session()->flash('success', 'Professional qualification updated successfully!');
        // Reset the form fields
        $this->reset(['qualification_name', 'certifying_body', 'certificate_number', 'award', 'date_awarded', 'valid_until', 'qualification_document']);
        $this->resetValidation();
        Flux::modal('edit-professional')->close();
        return redirect()->route('professional-qualification');
    }
    public function removeDocument()
    {
        $this->qualification_document = null;
        $this->resetErrorBag('qualification_document');
        $this->resetValidation(); // optional: use if you want to clear all errors
    }
    public function render()
    {
        return view('livewire.professionanl-qualification.editprofessional');
    }
}
