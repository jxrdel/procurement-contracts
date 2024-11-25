<?php

namespace App\Mail;

use App\Models\Notification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Notification $notification, public User $user)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contract Reminder',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $today = Carbon::now();
        $enddate = Carbon::parse($this->notification->purchaseContract->end_date);
        $difference = Carbon::parse($today)->diff($enddate);
        $label = '';

        if ($this->notification->is_custom_notification) {
            $label = $this->notification->message;
        } else {
            if ($difference->y > 0) {
                $label = 'Please be advised that the contract for ' . $this->notification->purchaseContract->purchase->name . ' ends in ' . $difference->y . ' year(s), ' . $difference->m . ' month(s) and ' . $difference->d . ' day(s) on ' . Carbon::parse($enddate)->format('F jS, Y');
            } elseif ($difference->y < 1 && $difference->m > 0) {
                $label = 'Please be advised that the contract for ' . $this->notification->purchaseContract->purchase->name . ' ends in ' . $difference->m . ' month(s) and ' . $difference->d . ' day(s) on ' . Carbon::parse($enddate)->format('F jS, Y');
            } elseif ($difference->y < 1 && $difference->m < 1 && $difference->d > 0) {
                $label = 'Please be advised that the contract for ' . $this->notification->purchaseContract->purchase->name . ' ends in ' . $difference->d . ' day(s) on ' . Carbon::parse($enddate)->format('F jS, Y');
            } elseif ($difference->y < 1 && $difference->m < 1 && $difference->d < 1) {
                $label = 'Please be advised that the contract for ' . $this->notification->purchaseContract->purchase->name . ' ends today on ' . Carbon::parse($enddate)->format('F jS, Y');
            }
        }

        return new Content(
            markdown: 'emails.notification',
            with: [
                'label' => $label,
                'user' => $this->user,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
