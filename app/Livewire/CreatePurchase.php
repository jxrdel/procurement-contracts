<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use Carbon\Carbon;
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
    public $start_date;
    public $end_date;
    public $is_continuous = false;
    public $notifiedusers = [];
    public $notification_date;
    public $notifications = [];
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


    public function addNotification()
    {
        if ($this->notification_date == null) {
            $this->dispatch('show-alert', message: "Please select a date");
            return;
        } else if (in_array($this->notification_date, $this->notifications)) {
            $this->dispatch('show-alert', message: "Notification already added");
            return;
        } else if (Carbon::parse($this->notification_date) < Carbon::now()) {
            $this->dispatch('show-alert', message: "Notification date must be after today's date");
            return;
        }
        $this->notifications[] = $this->notification_date;
        $this->notification_date = null;
    }

    public function updating($name, $value)
    {
        $this->dispatch('preserveScroll');
    }
}
