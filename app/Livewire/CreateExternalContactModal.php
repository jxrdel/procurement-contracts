<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateExternalContactModal extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone1;
    public $phone2;
    public $note;
    public $isactive = true;
    public $company;

    public $companies;

    public function mount()
    {
        $this->companies = ExternalCompany::all();
    }

    public function render()
    {
        return view('livewire.create-external-contact-modal');
    }

    public function createContact()
    {

        ExternalContact::create([
            'fname' => $this->firstname,
            'lname' => $this->lastname,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'note' => $this->note,
            'is_active' => $this->isactive,
            'external_company_id' => $this->company,
            'created_by' => Auth::user()->username,
        ]);

        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->phone1 = null;
        $this->phone2 = null;
        $this->note = null;
        $this->isactive = true;
        $this->company = null;

        $this->dispatch('close-create-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Contact added successfully');
    }
}
