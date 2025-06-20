<?php

namespace App\Livewire\Vacancy;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateVacancy extends Component
{
    public $ref_no, $position, $job_grade, $requirements, $duties, $application_deadline, $status = 'open', $terms_of_employment;
    protected $rules = [
        'ref_no' => 'required|string|unique:vacancies,ref_no',
        'position' => 'required|string|max:255',
        'job_grade' => 'required|in:BMA1,BMA2,BMA3,BMA4,BMA5,BMA6,BMA7,BMA8,BMA9,BMA10,BMA11,BMA12',
        'requirements' => 'required|string',
        'duties' => 'required|string',
        'application_deadline' => 'required|date|after_or_equal:today',
        'status' => 'required|in:open,closed',
        'terms_of_employment' => 'required|in:Internship,Permanent,Contract,Attachment',
    ];
    public function submit()
    {
        $this->validate();
        Vacancy::create([
            'user_id' => Auth::id(),
            'ref_no' => $this->ref_no,
            'position' => $this->position,
            'job_grade' => $this->job_grade,
            'requirements' => $this->requirements,
            'duties' => $this->duties,
            'application_deadline' => $this->application_deadline,
            'status' => $this->status,
            'terms_of_employment' => $this->terms_of_employment,
        ]);
        session()->flash('success', 'Vacancy created successfully!');
        // Reset the form fields
        $this->reset(['ref_no', 'position', 'job_grade', 'requirements', 'duties', 'application_deadline', 'status']);
        return redirect()->route('vacancies');
    }
    public function render()
    {
        return view('livewire.vacancy.create-vacancy');
    }
}
