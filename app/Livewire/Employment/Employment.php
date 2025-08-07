<?php

namespace App\Livewire\Employment;

use App\Models\Employment as EmploymentModel;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Employment extends Component
{
    public $employmentId;
    public $selectedEmployment;

    public $selectedId = null; // instead of public $selectedIds = [];
    public function render()
    {
        $employment = EmploymentModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view(
            'livewire.employment.employment',
            [
                'employment' => $employment,
            ]
        );
    }
    public function edit($id)
    {
        $this->dispatch('edit-employment', $id);
    }
    public function delete($id)
    {
        $employment = EmploymentModel::findOrFail($id);
        if ($employment->user_id !== Auth::id()) {
            abort(403);
        }
        $this->employmentId = $employment->id;
        $this->selectedEmployment = $employment->organization ?? 'Selected'; // Avoid undefined property
        Flux::modal('delete-employment')->show();
    }
    public function confirmDelete()
    {
        $employment = EmploymentModel::findOrFail($this->employmentId);

        if ($employment->user_id !== Auth::id()) {
            abort(403);
        }
        $employment->delete();
        session()->flash('message', 'Employment deleted successfully.');
        Flux::modal('delete-employment')->close();
    }
    public function cancelDelete()
    {
        $this->reset(['employmentId', 'selectedEmployment']);
        Flux::modal('delete-employment')->close();
    }
}
