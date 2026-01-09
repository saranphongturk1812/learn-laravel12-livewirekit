<?php

namespace App\Livewire;

use App\Models\Note;
use Flux\Flux;
use Livewire\Component;

class CreateNote extends Component
{
    public $title = '';
    public $content = '';

    protected $rules = [
        'title' => 'required|string|unique:notes,title|max:255',
        'content' => 'required|string',
    ];
    public function save()
    {
        $this->validate();

        // dd('ok');
        Note::create(attributes: [
            'title' => $this->title,
            'content' => $this->content,
        ]);
        //reset input fields
        $this->reset();
        // close modal using browser event
        Flux::modals()->close('create-note');
        // show success toast
        session()->flash(key: 'success', value: 'Note created successfully!');
        // go to notes list page
        $this->redirectRoute('notes', navigate: true);
    }
    public function render()
    {
        return view('livewire.create-note');
    }
}
