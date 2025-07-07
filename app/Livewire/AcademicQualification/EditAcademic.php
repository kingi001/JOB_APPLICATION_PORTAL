<?php

namespace App\Livewire\AcademicQualification;

use App\Models\Education;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditAcademic extends Component
{
    use WithFileUploads;
    public $educationId, $institution, $qualification, $course, $award, $academic_document, $start_date, $end_date;
    public $education_document_path;

    #[On('edit-academic')]
    public function editAcademic($id)
    {
        $academic = Education::findOrFail($id);
        $this->educationId = $academic->id;
        $this->institution = $academic->institution;
        $this->qualification = $academic->qualification;
        $this->course = $academic->course;
        $this->award = $academic->award;
        $this->education_document_path = $academic->academic_document; // ✅ pass to view
        $this->start_date = optional($academic->start_date)->format('Y-m-d');
        $this->end_date = optional($academic->end_date)->format('Y-m-d');
        Flux::modal('edit-academic')->show();
    }
    public function update()
    {
        $this->validate([
            'institution' => 'required|string|max:255',
            'qualification' => 'required|in:KCPE,KCSE,Vocational Training,Certificate,Diploma,Higher Diploma,Bachelor,Master,PhD',
            'course' => 'required|string|max:255',
            'award' => 'required|string|max:255',
            'academic_document' => 'nullable|file|mimes:pdf|max:2048',
            'start_date' => 'required|date|before_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        $academic = Education::findOrFail($this->educationId);
        $filePath = $this->academic_document
            ? $this->academic_document->store('documents/education', 'public')
            : $academic->academic_document;

        $academic->update([
            'institution' => $this->institution,
            'qualification' => $this->qualification,
            'course' => $this->course,
            'award' => $this->award,
            'academic_document' => $filePath,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        session()->flash('message', 'Academic qualification updated successfully!');
        $this->reset(['educationId', 'institution', 'qualification', 'course', 'award', 'academic_document', 'start_date', 'end_date']);
        $this->resetValidation();
        Flux::modal('edit-academic')->close();
        return redirect()->route('education');
    }
    public function removeDocument()
    {
        $this->academic_document = null;
        $this->resetErrorBag('academic_document');
        $this->resetValidation(); // optional: use if you want to clear all errors
    }
    public function render()
    {
        return view('livewire.academic-qualification.edit-academic');
    }
}
