<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class EditExternalContactModal extends Component
{
    public $contact;
    public $firstname;
    public $lastname;
    public $email;
    public $phone1;
    public $phone2;
    public $note;
    public $is_active = true;
    public $company;

    public $companies;

    public function mount()
    {
        $this->companies = ExternalCompany::all();
    }

    public function render()
    {
        return view('livewire.edit-external-contact-modal');
    }


    #[On('show-edit-modal')]
    public function displayModal($id)
    {
        $this->contact = ExternalContact::find($id);
        $this->firstname = $this->contact->fname;
        $this->lastname = $this->contact->lname;
        $this->email = $this->contact->email;
        $this->phone1 = $this->contact->phone1;
        $this->phone2 = $this->contact->phone2;
        $this->note = $this->contact->note;
        $this->is_active = $this->contact->is_active;
        $this->company = $this->contact->external_company_id;
        $this->dispatch('display-edit-modal');
    }

    public function editContact()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone1' => 'required',
            'company' => 'required',
        ]);

        $this->contact->update([
            'fname' => $this->firstname,
            'lname' => $this->lastname,
            'email' => $this->email,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'note' => $this->note,
            'is_active' => $this->is_active,
            'external_company_id' => $this->company,
            'updated_by' => Auth::user()->username,
        ]);

        $this->dispatch('close-edit-modal');
        $this->dispatch('refresh-table');
        $this->dispatch('show-message', message: 'Contact updated successfully');
    }
}
