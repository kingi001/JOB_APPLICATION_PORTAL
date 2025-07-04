<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Notes extends Component
{
    public $noteId;
    use WithPagination;
    public function render()
    {
        // Fetch notes from the database
        $notes = Note::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.notes', [
            'notes' => $notes
        ]);
    }
    public function edit($id)
    {
        $this->dispatch('edit-note', $id);
    }
    public function delete($id)
    {
        $this->noteId = $id;
        Flux::modal('delete-note')->show();
    }
    public function confirmDelete()
    {
        $note = Note::findOrFail($this->noteId);
        $note->delete();
        session()->flash('success', 'Note deleted successfully.');
        Flux::modal('delete-note')->close();
        // Redirect to the notes page
        return redirect()->route('notes');
    }
    public function cancelDelete()
    {
        $this->noteId = null;
        Flux::modal('delete-note')->close();
    }
}
