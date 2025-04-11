<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Helpers\StockArrayHelper;
use App\Services\StockReportsService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class StockReportsServiceTest extends TestCase
{
    public function test_get_prices_returns_filtered_data_from_api()
    {
        $expectedRawData = [
            'body' => [
                "1744032600" => [
                    'date' => '07-04-2025',
                    'close' => 181.46,
                ],
                "1744119000" => [
                    'date' => '08-04-2025',
                    'close' => 184.12,
                ]
            ]
        ];

        $filtered = [
            ['date' => '07-04-2025', 'close' => 181.46],
        ];

        Cache::shouldReceive('remember')
            ->once()
            ->withArgs(function ($key) {
                return str_contains($key, 'stock_raw_data_');
            })
            ->andReturnUsing(function () use ($expectedRawData) {
                return $expectedRawData;
            });

        Cache::shouldReceive('remember')
            ->once()
            ->withArgs(function ($key) {
                return str_contains($key, 'stock_data_');
            })
            ->andReturnUsing(function ($key, $ttl, $callback) use ($filtered) {
                return $callback();
            });

        $mockClient = $this->createMock(Client::class);
        $mockClient->expects($this->never())
        ->method('get');

        $mockHelper = $this->createMock(StockArrayHelper::class);
        $mockHelper->expects($this->once())
            ->method('filterArrayByRange')
            ->with($expectedRawData['body'], '2025-04-07', '2025-04-07')
            ->willReturn($filtered);

        $service = new StockReportsService($mockHelper, $mockClient);

        $result = $service->getPrices('AAPL', '2025-04-07', '2025-04-07');

        $this->assertEquals($filtered, $result);
    }

    public function test_get_prices_returns_cached_data()
    {
        $cached = [
            ['date' => '07-04-2025', 'close' => 181.46],
        ];

        Cache::shouldReceive('remember')
            ->once()
            ->andReturn($cached);

        $mockHelper = $this->createMock(StockArrayHelper::class);
        $mockClient = $this->createMock(Client::class);

        $service = new StockReportsService($mockHelper, $mockClient);

        $result = $service->getPrices('AAPL', '2025-04-07', '2025-04-07');

        $this->assertEquals($cached, $result);
    }
}
