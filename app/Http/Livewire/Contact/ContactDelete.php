<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\Contact;

class ContactDelete extends Component
{
    public $contact;

    public function mount($id)
    {
        $this->contact = Contact::find($id);
    }

    public function contactDelete()
    {
        if(!$this->contact) {
            session()->flash('error', 'Contato não encontrado!');
            return;
        }

        $this->contact->delete();

        session()->flash('success', 'Contato removido com sucesso!');

        $this->emit('contactDeleted');
    }

    public function render()
    {
        return view('livewire.contact.contact-delete');
    }
}
