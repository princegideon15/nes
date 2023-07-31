<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccountNotification extends Mailable
{
    use Queueable, SerializesModels;

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
        $uid  = $this->data['user_id'];
        $temp_pass  = $this->data['temp_pass'];

        return $this->markdown('vendor.mail.html.newaccount')
        ->subject('Activate Account')
        ->with('slot','1')
        ->with('uid', $uid)
        ->with('temp_pass', $temp_pass)
        ->with('name', $name);
    }
}
