<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Vacancy;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubmitApplication extends Component
{
    public $vacancy_id;
    public $declaration = false; // <-- bind the checkbox

    public $vacancies = [];
    public function mount()
    {
        $this->vacancies = Vacancy::where('status', 'open')
            ->orderBy('position')
            ->get();
    }
    public function submit()
    {
        $this->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
            'declaration'     => 'accepted', // ✅ checkbox must be checked

        ]);

        // Prevent multiple applications for same job
        if (Application::where('user_id', Auth::id())->where('vacancy_id', $this->vacancy_id)->exists()) {
            session()->flash('error', 'You have already applied for this job.');
            return;
        }

        Application::create([
            'user_id' => Auth::id(),
            'vacancy_id' => $this->vacancy_id,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Application submitted successfully!');
        $this->reset(['vacancy_id', 'declaration']); // reset select
    }

    public function render()
    {
        return view('livewire.submit-application');
    }
}
