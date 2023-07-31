<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProcessNotification extends Mailable
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
        $subject  = $this->data['subject'];
        $content  = $this->data['content'];

        return $this->markdown('vendor.mail.html.notification')
        ->subject($subject)
        ->with('slot','1')
        ->with('content', $content);
    }
}
