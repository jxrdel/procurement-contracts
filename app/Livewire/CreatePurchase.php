<?php

namespace App\Livewire;

use App\Models\ExternalCompany;
use App\Models\ExternalContact;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePurchase extends Component
{
    use WithFileUploads;

    #[Title('Create Purchase')]

    public $name;
    public $note;
    public $is_active = true;
    public $company;

    //Purchase Contract Information
    public $file_name;
    public $file_number;
    public $contract_type = 'expires';
    public $contratnote;
    public $assigned_to = [];
    public $cost;
    public $purchasetype;
    public $start_date;
    public $end_date;
    public $is_continuous = false;
    public $notifiedusers = [];
    public $notification_date;
    public $notifications = [];
    public $is_custom_notification = false;
    public $notification_message;
    public $uploads;

    public $companies;
    public $employees;

    public function mount()
    {
        $this->companies = ExternalCompany::all();
        $this->employees = User::all();
    }


    public function render()
    {
        return view('livewire.create-purchase');
    }

    public function save()
    {
        $this->is_continuous = $this->contract_type == 'continuous' ? true : false;

        $this->validate([
            'name' => 'required',
            'company' => 'required',
            'assigned_to' => 'array|min:1',
            'start_date' => 'required|date|after_or_equal:1900-01-01|',
            'end_date' => 'required_if:contract_type,expires|date|after:start_date',
            'cost' => 'required',
            'notifiedusers' => 'array|min:1',
            'notifications' => 'array|min:1',
        ], [
            'assigned_to.min' => 'Please select at least one employee to be assigned.',
            'notifiedusers.min' => 'Please select at least one user to notify.',
            'notifications.min' => 'Please add at least one notification.',
            'start_date.before_or_equal' => 'The start date must not be in the future.',
            'end_date.after' => 'The end date must be after the start date.',
        ]);


        $newpurchase = Purchase::create([
            'name' => $this->name,
            'note' => $this->note,
            'is_active' => $this->is_active,
            'external_company_id' => $this->company,
            'created_by' => Auth::user()->username,
        ]);

        $newcontract = $newpurchase->contracts()->create([
            'file_number' => $this->file_number,
            'file_name' => $this->file_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'note' => $this->contratnote,
            'cost' => $this->cost,
            'is_continuous' => $this->is_continuous,
            'created_by' => Auth::user()->username,
        ]);

        $newcontract->assignedTo()->attach($this->assigned_to);

        foreach ($this->notifications as $notification) {
            $newnotification = $newcontract->notifications()->create($notification);

            $newnotification->notifiedUsers()->attach($this->notifiedusers);
        }

        if (!is_null($this->uploads)) {
            foreach ($this->uploads as $photo) {
                $filename = $photo->getClientOriginalName();
                $path = $photo->store('file_uploads', 'public');
                $newcontract->fileUploads()->create([
                    'file_name' => $filename,
                    'file_path' => $path,
                    'uploaded_by' => Auth::user()->username,
                ]);
            }
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully');
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
        } else if ($this->is_custom_notification && ($this->notification_message == null || trim($this->notification_message) == '')) {
            $this->dispatch('show-alert', message: "Please enter a notification message");
            return;
        }

        $this->notifications[] = [
            'display_date' => $this->notification_date,
            'is_custom_notification' => $this->is_custom_notification,
            'message' => $this->notification_message,
            'created_by' => Auth::user()->username,
        ];

        $this->notification_date = null;
        $this->is_custom_notification = false;
        $this->notification_message = null;

        $this->dispatch('close-notification-modal');
        $this->dispatch('show-message', message: 'Notification addded successfully');
    }

    public function removeNotification($index)
    {
        unset($this->notifications[$index]);
        $this->dispatch('preserveScroll');
    }


    public function updating($name, $value)
    {
        if ($name == 'assigned_to' || $name == 'notifiedusers' || $name == 'uploads' || $name == 'contract_type') {
            $this->skipRender();
        } else {
            $this->dispatch('preserveScroll');
        }
    }
}
