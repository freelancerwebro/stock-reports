<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class StockDataReady implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $jobId,
        public array $result
    ) {}

    public function broadcastOn(): Channel
    {
        $response = new Channel('stock-data.' . $this->jobId);
        Log::debug('StockDataReady response for job ID ' . $this->jobId, ['response' => $response]);

        return $response;
    }

    public function broadcastWith(): array
    {
        return ['result' => $this->result];
    }

    public function broadcastAs(): string
    {
        return 'StockDataReady';
    }
}
