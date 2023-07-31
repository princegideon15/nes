<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordLink extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name  = $this->data['name'];
        $token  = $this->data['token'];

        return $this->markdown('vendor.mail.html.resetpasswordlink')
        ->subject('Reset Password')
        ->with('slot','1')
        ->with('name', $name)
        ->with('token', $token);
    }
}
