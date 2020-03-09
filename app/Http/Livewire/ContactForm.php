<?php

namespace App\Http\Livewire;

use App\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $phone;
    public $selectedId;
    public $updateMode = false;
    public $createMode = false;

    protected $listeners = ['edit', 'destroy'];

    public function render()
    {
        return view('livewire.contacts.contact-form');
    }

    public function create()
    {
        $this->createMode = true;
    }

    public function closeForm($value)
    {
        $this->reset($value);
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'min:5'],
            'phone' => 'required',
        ]);

        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'A new contact is saved successful.');

        $this->reset();
        $this->emit('submitted');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        $this->selectedId = $id;
        $this->name = $contact->name;
        $this->phone = $contact->phone;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selectedId' => ['required', 'numeric'],
            'name' => ['required', 'min:5'],
            'phone' => 'required',
        ]);

        if ($this->selectedId) {
            Contact::whereId($this->selectedId)->update([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);

           $this->reset();

            session()->flash('message', 'A contact is updated successful.');

            $this->emit('submitted');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Contact::whereId($id)->delete();

            session()->flash('message', 'A contact is deleted successful.');

            $this->emit('submitted');
        }
    }
}
