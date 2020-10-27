<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;

class ContactEdit extends Component
{
    public $contactId;
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required',
        'phone' => 'required',
    ];


    public function mount(Contact $contact)
    {
        //$contact = Contact::find($contact);

        $this->name = $contact->name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->contactId = $contact->id;
    }

    public function update()
    {
        $contact = Contact::find($this->contactId);

        $this->validate();

        $contact->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        session()->flash('message', 'Contato atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.contact.contact-edit')->layout('welcome');
    }
}
