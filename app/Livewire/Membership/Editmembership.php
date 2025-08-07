<?php
namespace App\Livewire\Membership;
use App\Models\Membership as MembershipModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Flux\Flux;
use Livewire\WithFileUploads;
use Livewire\Component;

class Editmembership extends Component
{
    use WithFileUploads;
    public $membershipId,$membership_body,$membership_type, $membership_no,$membership_document,$date_renewed, $expiry_date;
    public $membership_document_path;
    #[On('edit-membership')]
    public function editMembership($id)
    {
        $membership = MembershipModel::findOrFail($id);
        $this->membershipId = $membership->id;
        $this->membership_body = $membership->membership_body;
        $this->membership_type = $membership->membership_type;
        $this->membership_no = $membership->membership_no;
        $this->membership_document_path = $membership->membership_document;
        $this->date_renewed = optional($membership->date_renewed)->format('Y-m-d');
        $this->expiry_date = optional($membership->expiry_date)->format('Y-m-d');
        Flux::modal('edit-membership')->show();
    }
    public function update()
    {
       $this->validate([
            'membership_body' => 'required|string|max:255',
            'membership_type' => 'required|string|max:255',
            'membership_no' => 'required|string|max:255|unique:memberships,membership_no,' . $this->membershipId,
            'membership_document' => 'nullable|file|mimes:pdf|max:2048',
            'date_renewed' => 'required|date|before_or_equal:today',
            'expiry_date' => 'nullable|date|after_or_equal:date_renewed',
        ]);
        $membership = MembershipModel::findOrFail($this->membershipId);
        $filePath = $this->membership_document
            ? $this->membership_document->store('documents/membership', 'public')
            : $membership->membership_document;

        $membership->update([
            'membership_body' => $this->membership_body,
            'membership_type' => $this->membership_type,
            'membership_no' => $this->membership_no,
            'membership_document' => $filePath,
            'date_renewed' => $this->date_renewed,
            'expiry_date' => $this->expiry_date,
        ]);
        session()->flash('message', 'Membership updated successfully!');
        $this->reset(['membershipId', 'membership_no', 'membership_document', 'membership_body', 'membership_type', 'date_renewed', 'expiry_date']);
        $this->resetValidation();
        Flux::modal('edit-membership')->close();
        return redirect()->route('membership');
    }
    public function removeDocument()
    {

    $membership = MembershipModel::findOrFail($this->membershipId);
    if ($membership->membership_document) {
        Storage::disk('public')->delete($membership->membership_document);
        $membership->update(['membership_document' => null]);
        $this->membership_document = null;
        session()->flash('message', 'Membership document removed successfully!');
    }
    }
    public function render()
    {
        return view('livewire.membership.editmembership');
    }
}
