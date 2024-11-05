<?php

namespace App\Livewire;

use App\Models\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewNotificationModal extends Component
{
    public $notification;
    public $itemname;
    public $display_date;
    public $is_custom_notification;
    public $message;
    public $notifiedusers;
    public $notifieduserscount;


    public function render()
    {
        return view('livewire.view-notification-modal');
    }

    #[On('show-view-modal')]
    public function displayModal($id)
    {
        $this->notification = Notification::find($id);
        $this->itemname = $this->notification->purchaseContract->purchase->name;
        $this->display_date = $this->notification->display_date;
        $this->is_custom_notification = $this->notification->is_custom_notification;
        $this->message = $this->notification->message;

        $this->notifiedusers = $this->notification->notifiedUsers()->get();
        $this->notifieduserscount = $this->notifiedusers->count();
        $this->dispatch('display-view-modal');
    }
}
