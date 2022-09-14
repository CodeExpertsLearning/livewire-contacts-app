<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactCreate extends Component
{
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|min:5',
        'email' => 'required',
        'phone' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        $this->name = $this->email = $this->phone = null;

        session()->flash('message', 'Contato criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.contact-create')->layout('welcome');
    }
}
