<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class ViewExternalCompany extends Component
{
    #[Title('Create External Company')]

    public $company;
    public $name;
    public $email;
    public $address1;
    public $address2;
    public $phone1;
    public $phone2;
    public $note;
    public $rating;
    public $is_active;

    //Contact Information
    public $firstname;
    public $lastname;
    public $contactemail;
    public $contactphone1;
    public $contactphone2;
    public $contactnote;
    public $contactisactive = true;

    public $contacts = [];
    public $isEditing = false;
    public $contracts;

    public function render()
    {
        $this->contacts = $this->company->contacts()->get();
        return view('livewire.view-external-company')->title($this->name . ' | View External Company');
    }

    public function mount($id)
    {
        $this->company = ExternalCompany::find($id);
        $this->name = $this->company->name;
        $this->email = $this->company->email;
        $this->address1 = $this->company->address1;
        $this->address2 = $this->company->address2;
        $this->phone1 = $this->company->phone1;
        $this->phone2 = $this->company->phone2;
        $this->note = $this->company->note;
        $this->is_active = $this->company->is_active == 1 ? true : false;
        $this->contracts = $this->company->contracts;
        $this->rating = $this->company->averageRating;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:external_companies,name,' . $this->company->id,
            'email' => 'required|email',
            'address1' => 'required',
            'phone1' => 'required',
        ]);

        $this->company->update([
            'name' => $this->name,
            'email' => $this->email,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'phone1' => $this->phone1,
            'phone2' => $this->phone2,
            'note' => $this->note,
            'is_active' => $this->is_active,
            'updated_by' => Auth::user()->username,
        ]);

        $this->isEditing = false;
        $this->dispatch('show-message', message: 'Company updated successfully');
    }

    public function addContact()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'contactemail' => 'required|email',
            'contactphone1' => 'required',
        ]);

        $this->company->contacts()->create([
            'fname' => $this->firstname,
            'lname' => $this->lastname,
            'email' => $this->contactemail,
            'phone1' => $this->contactphone1,
            'phone2' => $this->contactphone2,
            'note' => $this->contactnote,
            'is_active' => $this->contactisactive,
            'created_by' => Auth::user()->username,
        ]);

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

    public function deleteContact($id)
    {
        $contact = $this->company->contacts()->find($id);
        $contact->delete();
        $this->dispatch('show-message', message: 'Contact deleted successfully');
    }
}
