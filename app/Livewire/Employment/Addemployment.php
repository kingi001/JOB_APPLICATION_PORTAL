<?php

namespace App\Livewire\Employment;

use App\Models\Employment as EmploymentModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Addemployment extends Component
{
    public $designation, $organization, $job_scale, $duties, $start_date, $end_date;
    protected $rules = [
        'designation' => 'required|string|max:255',
        'organization' => 'required|string|max:255',
        'job_scale' => 'required|string|max:255',
        'duties' => 'required|string|max:65000',
        'start_date' => 'required|date|before_or_equal:today',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ];
    public function submit()
    {
        $this->validate();
        try {
            EmploymentModel::create([
                'user_id' => Auth::id(),
                'designation' => $this->designation,
                'organization' => $this->organization,
                'job_scale' => $this->job_scale,
                'duties' => $this->duties,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);
            session()->flash('message', 'Employment added successfully!');
            $this->reset(['designation', 'organization', 'job_scale', 'duties', 'start_date', 'end_date']);
            return redirect()->route('employment');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                session()->flash('error', 'Employment record already exists.');
            } else {
                session()->flash('error', 'Validation failed: ' . $e->getMessage());
            }
            return;
        }
    }

    public function render()
    {
        return view('livewire.employment.addemployment');
    }
}
