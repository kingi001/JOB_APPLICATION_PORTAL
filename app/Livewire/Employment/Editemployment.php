<?php

namespace App\Livewire\Employment;

use App\Models\Employment as EmploymentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Flux\Flux;

class Editemployment extends Component
{
    public $employmentId;
    public $designation;
    public $organization;
    public $job_scale;
    public $duties;
    public $start_date;
    public $end_date;

    #[On('edit-employment')]
    public function editEmployment($id)
    {
        $employment = EmploymentModel::findOrFail($id);

        // ✅ Security check: ensure logged-in user owns this record
        if ($employment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

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

        // ✅ Security check again before updating
        if ($employment->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $employment->update([
            'designation' => $this->designation,
            'organization' => $this->organization,
            'job_scale' => $this->job_scale,
            'duties' => $this->duties,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        session()->flash('message', 'Employment updated successfully!');
        $this->reset([
            'employmentId',
            'designation',
            'organization',
            'job_scale',
            'duties',
            'start_date',
            'end_date',
        ]);

        Flux::modal('edit-employment')->close();

        // ✅ Instead of full redirect, just refresh component to improve UX
        $this->dispatch('employment-updated'); // optional event to refresh list
    }
}
