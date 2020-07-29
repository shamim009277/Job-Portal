<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
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
        return $this->from($this->data['my_email'])->
                    view('frontend.mail')
                    ->attach($this->data['file']->getRealPath(),[
                    'as' => $this->data['file']->getClientOriginalName(),
                    'mime' => $this->data['file']->getMimeType()
                    ])
                    ->with('data',$this->data);
    }
}
