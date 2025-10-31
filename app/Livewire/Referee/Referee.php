<?php

namespace App\Livewire\Referee;

use App\Models\Referee as RefereeModel;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Referee extends Component
{
    public $refereeId;
    public $selectedName;
    public function render()
    {
        $userId = Auth::id();
        return view('livewire.referee.referee', [
            'referee' => Refereemodel::where('user_id', $userId)
                ->orderBy('created_at')
                ->get(),
        ]);
    }
    public function edit($id)
    {
        $this->dispatch('edit-referee', $id);
    }
    public function delete($id)
    {
        $referee = Refereemodel::findOrFail($id);
        $this->refereeId = $referee->id;
        //display the modal with the referee details
        $this->selectedName = $referee->full_name;
        Flux::modal('delete-referee')->show();
    }
    public function confirmDelete()
    {
        $referee = Refereemodel::findOrFail($this->refereeId);
        $referee->delete();
        Flux::modal('delete-referee')->close();
        $this->dispatch('referee-deleted');
    }
    public function cancelDelete()
    {
        $this->reset(['refereeId', 'selectedName']);
        Flux::modal('delete-referee')->close();
    }
}
