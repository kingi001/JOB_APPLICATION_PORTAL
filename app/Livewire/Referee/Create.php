<?php

namespace App\Livewire\Referee;
use App\Models\Referee;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $full_name,$occupation,$postal_address,$postal_code,$city,$email,$phone_number,$years_known;
    protected $rules = [
        'full_name' => 'required|string|max:255',
        'occupation' => 'required|string|max:255',
        'postal_address' => 'nullable|string|max:255',
        'postal_code' => 'nullable|string|max:20',
        'city' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string|max:10',
        'years_known' => 'required|integer|min:0',
    ];
    public function submit(){
        $this->validate();
        Referee::create([
            'user_id' => Auth::id(),
            'full_name' => $this->full_name,
            'occupation' => $this->occupation,
            'postal_address' => $this->postal_address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'years_known' => $this->years_known,
        ]);
        session()->flash('success', 'Referee added successfully!');
        // Reset the form fields
        $this->reset(['full_name','occupation','postal_address','postal_code','city','email','phone_number','years_known']);
        return redirect()->route('referee');
    }
}
