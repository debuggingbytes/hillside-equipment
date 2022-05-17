<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $fullName, $phone, $email, $message;
    public function __construct($fullName, $phone, $email, $message)
    {
        //
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('contact', [
          'fullName' => $this->fullName,
          'phone' => $this->phone,
          'email' => $this->email,
          'message' => $this->message
        ]);
    }
}
