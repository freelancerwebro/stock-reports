<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\StockDataReady;
use App\Mail\FormSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification implements ShouldQueue
{
    use InteractsWithQueue;
    private string $subject = 'Stock historical data for %s (%s)';
    private string $body = 'From %s to %s';

    public function handle(StockDataReady $event): void
    {
        Log::debug('SendEmailNotification event triggered', [
            'event' => $event,
        ]);
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
