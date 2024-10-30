<?php

namespace App\Mail;

use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class OrderConfirmedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public UserHistory $history, public User $user)
    {
    }

    public function envelope(): Envelope
    {
        //get all users with permission admin.order.order
        $notify_users = array();

        foreach(User::all() as $user){
            if($user->can("admin.order.order"))
            {
                $notify_users[] = new Address($user->email, $user->name);
            }
        }


        return new Envelope(
            bcc: $notify_users,
            subject: 'Bestellung bestätigt',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-confirmed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
