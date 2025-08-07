<?php

namespace App\Livewire\Employment;
use App\Models\Employment as EmploymentModel;
use Livewire\Attributes\On;
use Flux\Flux;

use Livewire\Component;

class Editemployment extends Component
{
    public $employmentId, $designation, $organization, $job_scale, $duties, $start_date, $end_date;
    #[On('edit-employment')]
    public function editEmployment($id){
        $employment = EmploymentModel::findOrFail($id);
        $this->employmentId = $employment->id;
        $this->designation = $employment->designation;
        $this->organization = $employment->organization;
        $this->job_scale = $employment->job_scale;
        $this->duties = $employment->duties;
        $this->start_date = optional($employment->start_date)->format('Y-m-d');
        $this->end_date = optional($employment->end_date)->format('Y-m-d');
        Flux::modal('edit-employment')->show();
    }
    public function update()
    {
        $this->validate([
            'designation' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'job_scale' => 'required|string|max:255',
            'duties' => 'required|string|max:65000',
            'start_date' => 'required|date|before_or_equal:today',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $employment = EmploymentModel::findOrFail($this->employmentId);
        $employment->update([
            'designation' => $this->designation,
            'organization' => $this->organization,
            'job_scale' => $this->job_scale,
            'duties' => $this->duties,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Employment updated successfully!');
        $this->reset(['employmentId', 'designation', 'organization', 'job_scale', 'duties', 'start_date', 'end_date']);
        Flux::modal('edit-employment')->close();
        return redirect()->route('employment');
    }
    public function render()
    {
        return view('livewire.employment.editemployment');
    }
}
