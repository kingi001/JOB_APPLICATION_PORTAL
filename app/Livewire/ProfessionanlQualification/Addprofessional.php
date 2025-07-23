<?php

namespace App\Livewire\ProfessionanlQualification;

use App\Models\ProfessionalQualification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;


use Livewire\Component;

class Addprofessional extends Component
{
    use WithFileUploads;
    public $qualification_name, $certifying_body, $certificate_number, $award, $date_awarded, $valid_until, $qualification_document;
    protected $rules = [
        'qualification_name' => 'required|string|max:255',
        'certifying_body' => 'required|string|max:255',
        'certificate_number' => 'required|string|max:255|unique:professional_qualifications,certificate_number',
        'award' => 'required|in:Licensed,Certified,Pass,Distinction,Credit',
        'date_awarded' => 'required|date',
        'valid_until' => 'nullable|date|after_or_equal:date_awarded',
        'qualification_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // Assuming the document can be a PDF or image
    ];
    public function submit()
    {
        $this->validate();
        $filePath = null;
        if ($this->qualification_document) {
            $filePath = $this->qualification_document->store('documents/professional', 'public');
        }
        // Assuming you have a ProfessionalQualification model to handle the database interaction
        ProfessionalQualification::create([
            'user_id' => Auth::id(),
            'qualification_name' => $this->qualification_name,
            'certifying_body' => $this->certifying_body,
            'certificate_number' => $this->certificate_number,
            'award' => $this->award,
            'date_awarded' => $this->date_awarded,
            'valid_until' => $this->valid_until,
            'qualification_document' => $filePath,
        ]);
        session()->flash('success', 'Professional qualification added successfully!');
        // Reset the form fields
        $this->reset(['qualification_name', 'certifying_body', 'certificate_number', 'award', 'date_awarded', 'valid_until', 'qualification_document']);
        return redirect()->route('professional-qualification');
    }
       public function removeDocument()
    {
        $this->qualification_document = null;
        $this->resetErrorBag('academic_document');
        $this->resetValidation(); // optional: use if you want to clear all errors
    }
    public function render()
    {
        return view('livewire.professionanl-qualification.addprofessional');
    }
}
