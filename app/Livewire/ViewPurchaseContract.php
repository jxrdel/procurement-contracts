<?php

namespace App\Livewire;

use App\Models\FileUpload;
use App\Models\Purchase;
use App\Models\PurchaseContract;
use App\Models\User;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewPurchaseContract extends Component
{
    use WithFileUploads;

    #[Title('View Purchase Contract')]

    public $contract;
    public $purchase_id;
    public $purchases;
    public $employees;
    public $rating;
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

    public $editedAssignedTo = [];
    public $isEditedAssignedTo = false;
    public $editedNotifiedUsers = [];
    public $isEditedNotifiedUsers = false;

    public $deletedNotifications = [];

    public $upload;
    public $uploads;

    public function mount($id)
    {
        $this->purchases = Purchase::all();
        $this->employees = User::all();

        $this->contract = PurchaseContract::find($id);
        $this->purchase_id = $this->contract->purchase_id;
        $this->rating = $this->contract->rating;
        $this->file_number = $this->contract->file_number;
        $this->file_name = $this->contract->file_name;
        $this->contract_type = $this->contract->is_continuous ? 'continuous' : 'expires';
        $this->start_date = $this->contract->start_date;
        $this->end_date = $this->contract->end_date;
        $this->note = $this->contract->note;
        $this->cost = $this->contract->cost;

        $this->notifications = $this->contract->notifications->toArray();
        $this->assigned_to = $this->contract->assignedTo()->pluck('users.id')->toArray();
        $this->notifiedusers = $this->notifiedusers = $this->contract->notifications()
            ->with('notifiedUsers') // eager load to avoid N+1
            ->get()
            ->pluck('notifiedUsers.*.id')
            ->flatten()
            ->unique()
            ->toArray();
    }

    public function render()
    {
        $this->uploads = $this->contract->fileUploads()->get();
        return view('livewire.view-purchase-contract');
    }

    public function save()
    {
        $this->is_continuous = $this->contract_type == 'continuous' ? true : false;

        $this->contract->update([
            'purchase_id' => $this->purchase_id,
            'file_number' => $this->file_number,
            'file_name' => $this->file_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'note' => $this->note,
            'cost' => $this->cost,
            'rating' => $this->rating,
            'updated_by' => Auth::user()->username,
        ]);

        // Sync associated employees
        if ($this->isEditedAssignedTo) {
            $this->contract->assignedTo()->sync($this->editedAssignedTo);
        }

        // Delete removed notifications
        if ($this->deletedNotifications) {
            $this->contract->notifications()->whereIn('id', $this->deletedNotifications)->delete();
        }

        // Sync users for notifications
        if ($this->isEditedNotifiedUsers) {
            foreach ($this->notifications as $notification) {
                if (isset($notification['id'])) {
                    $this->contract->notifications()->find($notification['id'])->notifiedUsers()->sync($this->editedNotifiedUsers);
                }
            }
        }

        // Create new notifications
        foreach ($this->notifications as $notification) {
            if (!isset($notification['id'])) {
                $newnotification = $this->contract->notifications()->create($notification);

                if ($this->isEditedNotifiedUsers) {
                    $newnotification->notifiedUsers()->attach($this->editedNotifiedUsers);
                } else {
                    $newnotification->notifiedUsers()->attach($this->notifiedusers);
                }
            }
        }

        return redirect()->route('purchase-contracts.index')->with('success', 'Contract updated successfully');
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

    public function updating($name, $value)
    {
        if ($name == 'editedAssignedTo' || $name == 'editedNotifiedUsers' || $name == 'upload' || $name == 'rating') {
            $this->skipRender();
        } else {
            $this->dispatch('preserveScroll');
        }
    }

    public function removeNotification($index)
    {
        $this->deletedNotifications[] = $this->notifications[$index]['id'];
        unset($this->notifications[$index]);
        $this->dispatch('preserveScroll');
    }
    public function uploadFile()
    {

        $this->validate([
            'upload' => 'required|file|max:1024',
        ], [
            'upload.required' => 'Please upload a file before proceeding.',
            'upload.max' => 'The file must not be larger than 1MB.',
        ]);
        $filename = $this->upload->getClientOriginalName();

        $path = $this->upload->store('file_uploads', 'public');
        $this->contract->fileUploads()->create([
            'file_name' => $filename,
            'file_path' => $path,
            'uploaded_by' => Auth::user()->username,
        ]);

        $this->upload = null;
        $this->contract = $this->contract->fresh();
        $this->dispatch('show-message', message: 'File uploaded successfully');
        $this->dispatch('preserveScroll');
    }

    public function deleteFile($id)
    {
        $file = FileUpload::find($id);

        if ($file) {
            $file->delete();
        }

        $this->dispatch('preserveScroll');

        $this->dispatch('show-message', message: 'File deleted successfully');
    }

    #[On('set-rating')]
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}
