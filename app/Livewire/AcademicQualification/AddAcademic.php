<?php

namespace App\Livewire\AcademicQualification;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddAcademic extends Component
{
    use WithFileUploads;
    public $institution, $level_of_study, $field_of_study, $award, $academic_document, $start_date, $end_date;
    protected $rules = [
        'institution' => 'required|string|max:255',
        'level_of_study' => 'required|in:KCPE,KCSE,Vocational Training,Certificate,Diploma,Higher Diploma,Bachelor,Master,PhD',
        'field_of_study' => 'required|string|max:255',
        'award' => 'required|string|max:255',
        'academic_document' => 'nullable|file|mimes:pdf|max:5120',
        'start_date' => 'required|date|before_or_equal:today',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ];
    public function submit()
    {
        $this->validate();
        $filePath = null;
        if ($this->academic_document) {
            $filePath = $this->academic_document->store('documents/education', 'public');
        }
        Education::create([
            'user_id' => Auth::id(),
            'institution' => $this->institution,
            'level_of_study' => $this->level_of_study,
            'field_of_study' => $this->field_of_study,
            'award' => $this->award,
            'academic_document' => $filePath,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        session()->flash('success', 'Academic qualification added successfully!');
        $this->reset(['institution', 'level_of_study', 'field_of_study', 'award', 'academic_document', 'start_date', 'end_date']);
        return redirect()->route('education');
    }
    //SODE TO REMOVE VALIDATION ERROR WHEN DOCUMENT IS REMOVED
    // This method is called when the user clicks the "Remove Document" button
    // It sets the academic_document property to null and resets the validation error for that field
    public function removeDocument()
    {
        $this->academic_document = null;
        $this->resetErrorBag('academic_document');
        $this->resetValidation(); // optional: use if you want to clear all errors
    }
    public function render()
    {
        return view('livewire.academic-qualification.add-academic');
    }
}
