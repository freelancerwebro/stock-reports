<?php

namespace App\Events;

use App\Models\Company;
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

    public function getSymbol(): string
    {
        return $this->result['fields']['symbol'];
    }

    public function getCompanyName(): string
    {
        $company = Company::where('symbol', $this->getSymbol())->first();
        return $company->name;
    }

    public function getEmail(): string
    {
        return $this->result['fields']['email'];
    }

    public function getStartDate(): string
    {
        return $this->result['fields']['startDate'];
    }

    public function getEndDate(): string
    {
        return $this->result['fields']['endDate'];
    }

    public function getData(): array
    {
        return $this->result['data'];
    }
}
