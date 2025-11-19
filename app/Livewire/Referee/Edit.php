<?php

namespace App\Livewire\Referee;
use Flux\Flux;
use Livewire\Attributes\On;
use App\Models\Referee;
use Livewire\Component;

class Edit extends Component
{
    public $refereeId, $full_name, $occupation, $postal_address, $postal_code, $city, $email, $phone_number, $years_known;
    #[On('edit-referee')]
    public function edit($id){
        $referee = Referee::findOrFail($id);
        $this->refereeId = $referee->id;
        $this->full_name = $referee->full_name;
        $this->occupation = $referee->occupation;
        $this->postal_address = $referee->postal_address;
        $this->postal_code = $referee->postal_code;
        $this->city = $referee->city;
        $this->email = $referee->email;
        $this->phone_number = $referee->phone_number;
        $this->years_known = $referee->years_known;
        Flux::modal('edit-referee')->show();
    }
    public function update(){
        $this->validate([
            'full_name' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'postal_address' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'years_known' => 'required|integer|min:0',
        ]);
        $referee = Referee::findOrFail($this->refereeId);
        $referee->update([
            'full_name' => $this->full_name,
            'occupation' => $this->occupation,
            'postal_address' => $this->postal_address,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'years_known' => $this->years_known,
        ]);
        Flux::modal('edit-referee')->close();
        session()->flash('success', 'Referee updated successfully.');
        return redirect()->route('referee');
    }

}
