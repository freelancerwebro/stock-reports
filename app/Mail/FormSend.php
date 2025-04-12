<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSend extends Mailable
{
    use Queueable, SerializesModels;

    private string $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.form-send', ['body' => $this->body])
            ->subject($this->subject);
    }
}
