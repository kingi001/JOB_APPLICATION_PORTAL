<?php
namespace App\Livewire\Membership;
use Livewire\Component;
use Flux\Flux;
use App\Models\Membership as MembershipModel; // Assuming you have a Membership model
use Illuminate\Support\Facades\Auth;
class Membership extends Component
{
    public $membershipId;
    public $selectedMembership;
    public function render()
    {
        $memberships = MembershipModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
        return view('livewire.membership.membership', [
            'memberships' => $memberships,
        ]);
    }
    public function edit($id)
    {
        $this->dispatch('edit-membership', $id);
    }
    public function delete($id)
    {
        $membership = MembershipModel::findOrFail($id);
        if ($membership->user_id !== Auth::id()) {
            abort(403);
        }
        $this->membershipId = $membership->id;
        $this->selectedMembership = $membership->membership_body ?? 'Selected'; // Avoid undefined property
        Flux::modal('delete-membership')->show();
    }
    public function confirmDelete()
    {
        $membership = MembershipModel::findOrFail($this->membershipId);

        if ($membership->user_id !== Auth::id()) {
            abort(403);
        }
        $membership->delete();
        session()->flash('message', 'Membership deleted successfully.');
        Flux::modal('delete-membership')->close();
    }
    public function cancelDelete()
    {
        $this->reset(['membershipId', 'selectedMembership']);
        Flux::modal('delete-membership')->close();
    }
}
