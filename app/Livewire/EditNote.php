<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EditNote extends Component
{
    public $title,$content,$noteId;
    #[On('edit-note')]

    public function editNote($id)
    {
        // dd("edit note revieved : {$id}");
        $note=Note::findOrFail($id);
        $this->noteId=$note->id;
        $this->title=$note->title;
        $this->content=$note->content;
        Flux::modal('edit-note')->show();

    }
    public function update(){
        $this->validate([
            'title'=>['required','string','max:255',Rule::unique('notes','title')->ignore($this->noteId)],
            'content'=>['required','string'],
        ]);
        $note=Note::findOrFail($this->noteId);
        $note->title=$this->title;
        $note->content=$this->content;
        $note->save();
        //close the modal
        Flux::modal('edit-note')->close();
        //flash message
        session()->flash('success', 'Note updated successfully.');
        //redirect to the notes page
        return redirect()->route('notes');
    }
    public function render()
    {
        return view('livewire.edit-note');
    }
}
