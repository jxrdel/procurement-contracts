<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateExternalCompany extends Component
{
    #[Title('Create External Company')] 

    public $name;
    public $email;
    public $address1;
    public $address2;
    public $phone1;
    public $phone2;
    public $note;
    public $isactive = true;

    //Contact Information
    public $firstname;
    public $lastname;
    public $contactemail;
    public $contactphone1;
    public $contactphone2;
    public $contactnote;
    public $contactisactive = true;

    public $contacts = [];


    public function render()
    {
        return view('livewire.create-external-company');
    }

    public function save()
    {

        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address1' => 'required',
            'phone1' => 'required',
        ]);
        
        $newcompany = ExternalCompany::create([
            'name' => $this->name,
            'email' => $this->email,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'note' => $this->note,
            'isactive' => $this->isactive,
        ]);

        foreach ($this->contacts as $contact) {
            $newcompany->contacts()->create([
                'fname' => $contact['firstname'],
                'lname' => $contact['lastname'],
                'email' => $contact['contactemail'],
                'phone1' => $contact['contactphone1'],
                'phone2' => $contact['contactphone2'],
                'note' => $contact['contactnote'],
                'is_active' => $contact['contactisactive'],
            ]);
        }

        return redirect()->route('external-companies.index')->with('success', 'External Company created successfully.');
    }

    public function addContact()
    {
        // dd('add contact');
        $this->contacts[] = [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'contactemail' => $this->contactemail,
            'contactphone1' => $this->contactphone1,
            'contactphone2' => $this->contactphone2,
            'contactnote' => $this->contactnote,
            'contactisactive' => $this->contactisactive,
        ];

        $this->firstname = null;
        $this->lastname = null;
        $this->contactemail = null;
        $this->contactphone1 = null;
        $this->contactphone2 = null;
        $this->contactnote = null;
        $this->contactisactive = true;
        $this->dispatch('close-contact-modal');
        $this->dispatch('show-message', message: 'Contact added successfully');
    }

    public function removeContact($index)
    {
        unset($this->contacts[$index]);
    }
}
