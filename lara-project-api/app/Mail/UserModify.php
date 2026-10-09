<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserModify extends Mailable
{
    use Queueable, SerializesModels;

    // public $name;

    // public $email;
    // public $role;

    // /**
    //  * Create a new message instance.
    //  */
    // public function __construct($_name, $_email,$_role)
    // {
    //     $this->name = $_name;
    //     $this->email = $_email;
    //     $this->role = $_role;
    // }
    public $user;

   
    /**
     * Create a new message instance.
     */
    public function __construct($_user)
    {
        $this->user = $_user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Update your User info',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.usermodify',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
