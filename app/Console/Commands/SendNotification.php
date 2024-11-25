<?php

namespace App\Console\Commands;

use App\Mail\EmailNotification;
use App\Models\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send contract notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $notifications = Notification::where('display_date', now()->toDateString())->get();

        // foreach ($notifications as $notification) {
        //     $users = $notification->purchaseContract->assignedTo;

        //     foreach ($users as $user) {
        //         $user->notify(new ContractNotification($notification));
        //     }
        // }

        $notification = Notification::find(2);

        $users = $notification->notifiedUsers;

        foreach ($users as $user) {
            Mail::to($user->email)->send(new EmailNotification($notification, $user));
        }
    }
}
