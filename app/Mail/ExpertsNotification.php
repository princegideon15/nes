<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExpertsNotification extends Mailable
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
        $subject  = $this->data['subject'];
        $content  = $this->data['content'];

        $stps  = $this->data['stps'];
        $eid  = $this->data['eid'];
        $token  = $this->data['token'];

        return $this->markdown('vendor.mail.html.experts')
        ->subject($subject)
        ->with('slot','1')
        ->with('content', $content)
        ->with('accept', url('/expert_request/'.$stps.'/'.$eid.'/'.$token.'/1'))
        ->with('decline', url('/expert_request/'.$stps.'/'.$eid.'/'.$token.'/2'));
    }
}
