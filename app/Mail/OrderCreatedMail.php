<?php

namespace App\Mail;

use App\Models\UserHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public UserHistory $history)
    {
    }

    public function envelope(): Envelope
    {
        //notify users with permission admin.order.confirm which are in the same team as the ordering user
        $notify_users = array();

        //get the creating users team
        $user = $this->history->user;
        $teams = $user->team;


        foreach($teams as $team){
            foreach($team->user as $user){
                if($user->can('admin.order.confirm')){
                    $notify_users[] = new Address($user->email, $user->name);
                }
            }
        }




        return new Envelope(
            bcc: $notify_users,
            subject: 'neue Bestellung',

        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-created',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
