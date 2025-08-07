<?php

namespace App\Livewire\Membership;

use App\Models\Membership as MembershipModel;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Addmembership extends Component
{
    use WithFileUploads;
    public $membership_body, $membership_type, $membership_no, $date_renewed, $expiry_date, $membership_document;
    protected $rules = [
        'membership_body' => 'required|string|max:255',
        'membership_type' => 'required|string|max:255',
        'membership_no' => 'required|string|max:255|unique:memberships',
        'date_renewed' => 'required|date|before_or_equal:today',
        'expiry_date' => 'required|date|after_or_equal:date_renewed',
        'membership_document' => 'nullable|file|mimes:pdf|max:5120',
    ];
    public function submit()
    {
        $this->validate();
        $filePath = null;
        if ($this->membership_document) {
            $filePath = $this->membership_document->store('documents/memberships', 'public');
        }
        try {
            MembershipModel::create([
                'user_id' => Auth::id(),
                'membership_body' => $this->membership_body,
                'membership_type' => $this->membership_type,
                'membership_no' => $this->membership_no,
                'date_renewed' => $this->date_renewed,
                'expiry_date' => $this->expiry_date,
                'membership_document' => $filePath,
            ]);
            session()->flash('message', 'Membership added successfully!');
            $this->reset(['membership_body', 'membership_type', 'membership_no', 'date_renewed', 'expiry_date', 'membership_document']);
            return redirect()->route('membership');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation
                session()->flash('error', 'Membership number already exists.');
            } else {
                session()->flash('error', 'Validation failed: ' . $e->getMessage());
            }
            return;
        }
    }
    public function removeDocument()
    {
        $this->membership_document = null;
        $this->resetErrorBag('membership_document');
        $this->resetValidation(); // optional: use if you want to clear all errors
    }
    public function render()
    {
        return view('livewire.membership.addmembership');
    }
}
