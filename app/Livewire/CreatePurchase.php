<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreatePurchase extends Component
{
    #[Title('Create Purchase')] 

    public $name;
    public $note;
    public $is_active = true;
    public $company;

    //Purchase Contract Information
    public $filename;
    public $filenumber;
    public $contracttype = 'expires';
    public $contratnote;
    public $assignedto = [];
    public $cost;
    public $purchasetype;
    public $startdate;
    public $enddate;
    public $notifiedusers = [];
    public $uploads;

    public $companies;
    public $employees;

    public function mount()
    {
        $this->companies = ExternalCompany::all();
        $this->employees = ExternalContact::all();
    }
    

    public function render()
    {
        return view('livewire.create-purchase');
    }
}
