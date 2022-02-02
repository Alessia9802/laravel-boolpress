<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Contact;

class MarkdownContactFormEmail extends Mailable
{
    use Queueable, SerializesModels;

     public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('noreply@admin.com')
        ->subject('New Contact 🥳')
        ->markdown('mail.contacts.mdlead')->with([
            'url' => route('home')
        ]);
    }
}
