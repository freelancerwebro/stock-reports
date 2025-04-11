<?php

namespace Tests\Unit\Jobs;

use App\Jobs\FetchStockDataJob;
use App\Services\StockReportsService;
use App\Events\StockDataReady;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class FetchStockDataJobTest extends TestCase
{
    public function test_it_dispatches_stock_data_ready_event()
    {
        $symbol = 'AAPL';
        $startDate = '2025-04-01';
        $endDate = '2025-04-05';
        $email = 'user@example.com';
        $jobId = 'test-job-id';

        $expectedPrices = [
            ['date' => '2025-04-01', 'close' => 181.23],
            ['date' => '2025-04-02', 'close' => 185.12],
        ];

        Event::fake();

        $mockService = $this->createMock(StockReportsService::class);
        $mockService->expects($this->once())
            ->method('getPrices')
            ->with($symbol, $startDate, $endDate)
            ->willReturn($expectedPrices);

        $job = new FetchStockDataJob($symbol, $startDate, $endDate, $email, $jobId);
        $job->handle($mockService);

        Event::assertDispatched(StockDataReady::class, function ($event) use ($jobId, $expectedPrices, $symbol, $startDate, $endDate, $email) {
            return $event->jobId === $jobId
                && $event->result['data'] === $expectedPrices
                && $event->result['fields']['symbol'] === $symbol
                && $event->result['fields']['startDate'] === $startDate
                && $event->result['fields']['endDate'] === $endDate
                && $event->result['fields']['email'] === $email;
        });
    }
}
