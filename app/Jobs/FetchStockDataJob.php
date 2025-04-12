<?php

namespace App\Jobs;

use App\Events\StockDataReady;
use App\Services\StockReportsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchStockDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $symbol,
        public string $startDate,
        public string $endDate,
        public string $email,
        public string $jobId,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(StockReportsService $service): void
    {
        $prices = $service->getPrices(
            $this->symbol,
            $this->startDate,
            $this->endDate
        );

        $result = [
            'data' => $prices,
            'fields' => [
                'symbol' => $this->symbol,
                'startDate' => $this->startDate,
                'endDate' => $this->endDate,
                'email' => $this->email,
            ],
        ];

        event(new StockDataReady($this->jobId, $result));
    }
}
