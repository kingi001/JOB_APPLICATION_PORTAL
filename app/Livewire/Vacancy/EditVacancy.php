<?php

namespace App\Livewire\Vacancy;

use App\Models\Vacancy as VacancyModel; // Alias to avoid conflict

use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EditVacancy extends Component
{
    public $vacancyId, $ref_no, $position, $job_grade, $requirements, $duties, $application_deadline, $status, $terms_of_employment;
    #[On('edit-vacancy')]
    public function editVacancy($id)
    {
        $vacancy = VacancyModel::findOrFail($id);
        $this->vacancyId = $vacancy->id;
        $this->ref_no = $vacancy->ref_no;
        $this->position = $vacancy->position;
        $this->job_grade = $vacancy->job_grade;
        $this->requirements = $vacancy->requirements;
        $this->duties = $vacancy->duties;
        $this->application_deadline = optional($vacancy->application_deadline)->format('Y-m-d'); // ✅ key part
        $this->status = $vacancy->status;
        $this->terms_of_employment = $vacancy->terms_of_employment;
        Flux::modal('edit-vacancy')->show();
    }
    public function update()
    {
        $this->validate([
            'ref_no' => [
                'required',
                'string',
                'max:50',
                Rule::unique('vacancies', 'ref_no')->ignore($this->vacancyId),
            ],
            'position' => ['required', 'string', 'max:255'],
            'job_grade' => ['required', Rule::in([
                'BMA1',
                'BMA2',
                'BMA3',
                'BMA4',
                'BMA5',
                'BMA6',
                'BMA7',
                'BMA8',
                'BMA9',
                'BMA10',
                'BMA11',
                'BMA12'
            ])],
            'requirements' => ['required', 'string'],
            'duties' => ['required', 'string'],
            'application_deadline' => ['required', 'date', 'after_or_equal:today'],
            'status' => ['required', Rule::in(['open', 'closed'])],
            'terms_of_employment' => ['required', Rule::in(['Internship', 'Permanent', 'Contract', 'Attachment'])],
        ]);
        $vacancy = VacancyModel::findOrFail($this->vacancyId);
        $vacancy->ref_no = $this->ref_no;
        $vacancy->position = $this->position;
        $vacancy->job_grade = $this->job_grade;
        $vacancy->requirements = $this->requirements;
        $vacancy->duties = $this->duties;
        $vacancy->application_deadline = $this->application_deadline;
        $vacancy->status = $this->status;
        $vacancy->terms_of_employment = $this->terms_of_employment;
        $vacancy->save();

        //close the modal
        Flux::modal('edit-vacancy')->close();
        //flash message
        session()->flash('success', 'Vacancy updated successfully.');
        //redirect to the vacancies page
        return redirect()->route('vacancies');
    }
    public function render()
    {
        return view('livewire.vacancy.edit-vacancy');
    }
}
