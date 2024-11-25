<?php

namespace App\Livewire;

use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePurchaseContract extends Component
{
    use WithFileUploads;

    #[Title('Create Purchase Contract')]

    public $purchase_id;
    public $purchases;
    public $employees;
    public $file_number;
    public $file_name;
    public $contract_type = 'expires';
    public $start_date;
    public $end_date;
    public $note;
    public $cost;
    public $is_continuous = false;
    public $assigned_to = [];
    public $notifiedusers = [];
    public $notification_date;
    public $notifications = [];
    public $is_custom_notification = false;
    public $notification_message;

    public $uploads;

    public function mount()
    {
        $this->purchases = Purchase::all();
        $this->employees = User::all();
    }

    public function render()
    {
        return view('livewire.create-purchase-contract');
    }

    public function save()
    {
        $this->is_continuous = $this->contract_type == 'continuous' ? true : false;

        $this->validate(
            [
                'purchase_id' => 'required',
                'start_date' => 'required|date|after_or_equal:1900-01-01|',
                'end_date' => 'required_if:contract_type,expires|date|after:start_date',
                'cost' => 'required',
                'assigned_to' => 'array|min:1',
                'notifiedusers' => 'array|min:1',
                'notifications' => 'array|min:1',
            ],
            [
                'purchase_id.required' => 'The purchase field is required.',
                'assigned_to.min' => 'Please select at least 1 employee.',
                'end_date.required_if' => 'The end date field is required when contract type is expires.',
                'end_date.after' => 'The end date must be a date after start date.',
                'notifiedusers.min' => 'Please select at least 1 user to be notified.',
                'notifications.min' => 'Please select at least 1 notification.',
            ]
        );

        $purchase = Purchase::find($this->purchase_id);

        $newcontract = $purchase->contracts()->create([
            'file_number' => $this->file_number,
            'file_name' => $this->file_name,
            'contract_type' => $this->contract_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'note' => $this->note,
            'cost' => $this->cost,
            'is_continuous' => $this->is_continuous,
            'assigned_to' => $this->assigned_to,
            'notifiedusers' => $this->notifiedusers,
            'notification_date' => $this->notification_date,
            'notifications' => $this->notifications,
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

        return redirect()->route('purchase-contracts.index')->with('success', 'Purchase contract created successfully');
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
        if ($name == 'assigned_to' || $name == 'notifiedusers' || $name == 'uploads') {
            $this->skipRender();
        } else {
            $this->dispatch('preserveScroll');
        }
    }
}
