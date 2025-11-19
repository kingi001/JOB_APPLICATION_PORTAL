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
    public function render()
    {

        $employment = EmploymentModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();

        return view('livewire.employment.employment', [
            'employment' => $employment,
        ]);
    }

    public function edit($id)
    {
        $this->dispatch('edit-employment', $id);
    }

    public function delete($id)
    {
        $employment = EmploymentModel::findOrFail($id);
        $this->employmentId = $employment->id;
        $this->selectedEmployment = $employment->organization;
        Flux::modal('delete-employment')->show();
    }

    public function confirmDelete()
    {
        $employment = EmploymentModel::findOrFail($this->employmentId);
        $employment->delete();
        session()->flash('message', 'Employment deleted successfully.');
        Flux::modal('delete-employment')->close();
        return redirect()->route('employment');
    }

    public function cancelDelete()
    {
        $this->reset(['employmentId', 'selectedEmployment']);
        Flux::modal('delete-employment')->close();
    }
}
