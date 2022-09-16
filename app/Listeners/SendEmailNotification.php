<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\FormSubmitEvent;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\SendmailTransport;
use Symfony\Component\Mime\Email;

class SendEmailNotification
{
    private $subject = 'For submitted Company Symbol = %s => Company’s Name = %s';
    private $body = 'From %s to %s';

    public function handle(FormSubmitEvent $event)
    {
        $transport = new SendmailTransport();
        $mailer = new Mailer($transport);

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

        $email = (new Email())
            ->from('sender@example.test')
            ->to($event->getEmail())
            ->priority(Email::PRIORITY_HIGHEST)
            ->subject($subject)
            ->text($body);

        //$mailer->send($email);
    }
}
