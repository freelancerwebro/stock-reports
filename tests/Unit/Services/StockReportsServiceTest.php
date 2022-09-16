<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Helpers\StockArrayHelper;
use App\Services\StockReportsService;
use Illuminate\Http\Request;
use Mockery;
use Tests\TestCase;
use TypeError;

class StockReportsServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = Mockery::mock(StockReportsService::class);
        $this->request = Mockery::mock(Request::class);
        $this->array = [
            [
                'date' => '1663286400', // 2022-09-16
                'open' => '102.06999969482',
                'high' => '103.12000274658',
            ],
            [
                'date' => '1663113600', // 2022-09-14
                'open' => '104.06999969482',
                'high' => '105.12000274658',
            ]
        ];
    }

    public function test_fail_on_empty_request()
    {
        $this->request->shouldReceive('input')
            ->with('symbol')
            ->andReturnNull();
        $this->request->shouldReceive('input')
            ->with('start_date')
            ->andReturnNull();
        $this->request->shouldReceive('input')
            ->with('end_date')
            ->andReturnNull();

        $this->service->shouldReceive('getPrices')
            ->andReturn([]);

        $this->assertEquals(
            [],
            $this->service->getPrices($this->request)
        );
    }

    public function test_success()
    {
        $this->request->shouldReceive('input')
            ->with('symbol')
            ->andReturn('GOOGL');
        $this->request->shouldReceive('input')
            ->with('start_date')
            ->andReturn('2022-09-14');
        $this->request->shouldReceive('input')
            ->with('end_date')
            ->andReturn('2022-09-16');

        $this->service->shouldReceive('getPrices')
            ->andReturn($this->array);

        $result = $this->service->getPrices($this->request);

        $this->assertEquals(
            $this->array,
            $result
        );
    }
}
