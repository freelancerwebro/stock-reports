<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\FormSubmitEvent;
use App\Mail\FormSend;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification
{
    private string $subject = 'For submitted Company Symbol = %s => Company’s Name = %s';
    private string $body = 'From %s to %s';

    public function handle(FormSubmitEvent $event): void
    {
        $subject = sprintf(
            $this->subject,
            $event->getSymbol(),
            $event->getCompanyName()
        );
        $body = sprintf(
            $this->body,
            $event->getStartDate(),
            $event->getEndDate()
        );

        Mail::to($event->getEmail())->send(
            new FormSend(
                $subject,
                $body
            )
        );
    }
}
