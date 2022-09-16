<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use App\Helpers\StockArrayHelper;
use App\Services\StockReportsService;
use Illuminate\Http\Request;
use Tests\TestCase;

class StockReportsServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->helper = new StockArrayHelper();
        $this->service = new StockReportsService($this->helper);
        $this->request = Mock(Request::class);
    }
}
