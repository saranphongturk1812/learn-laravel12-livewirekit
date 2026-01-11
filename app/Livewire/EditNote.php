<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;

class EditNote extends Component
{
    public $title;
    public $content;
    public $noteId;

    #[On('edit-note')]
    public function editNote($id)
    {
        $note = Note::findOrFail($id);
        $this->noteId = $note->id;
        $this->title = $note->title;
        $this->content = $note->content;
        Flux::modal('edit-note')->show();
    }


    public function update()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('notes', 'title')->ignore($this->noteId)],
            'content' => 'required|string',
        ]);
        $note = Note::findOrFail($this->noteId);
        $note->title = $this->title;
        $note->content = $this->content;
        $note->save();
        // close modal using browser event
        Flux::modals()->close('edit-note');
        // show success toast
        session()->flash('success', 'Note updated successfully!');
        // go to notes list page
        $this->redirectRoute('notes', navigate: true);
    }
    public function render()
    {
        return view('livewire.edit-note');
    }
}
