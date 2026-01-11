<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Note;
use Flux\Flux;

class Notes extends Component
{
    use WithPagination;
    public $noteId;

    public function edit($id)
    {
        // dd($id);
        $this->dispatch('edit-note', $id);
    }

    public function delete($id)
    {
        // dd($id);
        $this->noteId = $id;
        Flux::modal('delete-note')->show();
    }
    function deleteNote(){
        $note = Note::findOrFail($this->noteId);
        $note->delete();
        // close modal using browser event
        Flux::modals()->close('delete-note');
        // show success toast
        session()->flash('success', 'Note deleted successfully!');
        // go to notes list page
        $this->redirectRoute('notes', navigate: true);
    }
    public function render()
    {
        $notes = Note::orderByDesc('created_at')->paginate(5);
        return view('livewire.notes', ['notes' => $notes]);
    }
}
