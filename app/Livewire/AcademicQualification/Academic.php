<?php

namespace App\Livewire\AcademicQualification;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Academic extends Component
{
    public $educationId;
    public array $selectedIds = [];
    public function render()
    {
        $education = Education::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        return view(
            'livewire.academic-qualification.academic',
            ['education' => $education]
        );
    }
     public function getSelectedIds()
    {
        return $this->selectedIds;
    }
    public function edit($id)
    {
        $this->dispatch('edit-academic', $id);
    }

}
