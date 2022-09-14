<?php

namespace App\Http\Livewire\Contact;

use Livewire\{Component, WithPagination};
use App\Models\Contact;

class ContactIndex extends Component
{
    use WithPagination;

    protected $listeners = ['contactDeleted' => '$refresh'];

    public function render(Contact $contact)
    {
        $contacts = $contact->paginate(10);

        return view('livewire.contact.contact-index', compact('contacts'))
                ->layout('welcome');
    }
}
