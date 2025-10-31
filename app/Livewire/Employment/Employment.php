<?php
namespace App\Livewire\Employment;
use App\Models\Employment as EmploymentModel;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Employment extends Component
{
    public  $employmentId;
    public  $selectedEmployment ;
    public array $selectedIds = [];
    public function render()
    {
        $userId = Auth::id();

        return view('livewire.employment.employment', [
            'employment' => EmploymentModel::where('user_id', $userId)
                ->orderBy('created_at')
                ->get(),
        ]);
    }

    public function edit($id)
    {
        $this->dispatch('edit-employment', $id);
    }

    public function delete($id)
    {
        $employment = EmploymentModel::findOrFail($id);
        $this->authorizeEmployment($employment);

        $this->employmentId = $employment->id;
        $this->selectedEmployment = $employment->organization ?? 'Selected';
        Flux::modal('delete-employment')->show();
    }

    public function confirmDelete()
    {
        $employment = EmploymentModel::findOrFail($this->employmentId);
        $this->authorizeEmployment($employment);

        $employment->delete();

        $this->reset(['employmentId', 'selectedEmployment']);
        $this->dispatch('$refresh');

        session()->flash('message', 'Employment deleted successfully.');
        Flux::modal('delete-employment')->close();
    }

    public function cancelDelete()
    {
        $this->reset(['employmentId', 'selectedEmployment']);
        Flux::modal('delete-employment')->close();
    }

    private function authorizeEmployment($employment): void
    {
        if ($employment->user_id !== Auth::id()) {
            abort(403);
        }
    }
}
