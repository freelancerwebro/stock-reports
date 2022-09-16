<?php

declare(strict_types=1);

namespace Tests\Unit\Helpers;

use App\Helpers\StockArrayHelper;
use Tests\TestCase;

class StockArrayHelperTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

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
            ],
            [
                'date' => '1662940800', // 2022-09-12
                'open' => '103.06999969482',
                'high' => '104.12000274658',
            ],
            [
                'date' => '1661990400', // 2022-09-01
                'open' => '101.06999969482',
                'high' => '109.12000274658',
            ]
        ];
    }

    public function test_fail_with_empty_array()
    {
        $helper = new StockArrayHelper();
        $result = $helper->filterArrayByRange([], '', '');

        $this->assertEquals(
            [],
            $result
        );
    }

    public function test_fail_with_wrong_date_strings()
    {
        $helper = new StockArrayHelper();
        $result = $helper->filterArrayByRange($this->array, 'aaa', 'bbb');

        $this->assertEquals(
            [],
            $result
        );
    }

    public function test_fail_with_invalid_dates()
    {
        $helper = new StockArrayHelper();
        $result = $helper->filterArrayByRange($this->array, '2022-09-16', '2022-09-15');

        $this->assertEquals(
            [],
            $result
        );
    }

    public function test_success()
    {
        $helper = new StockArrayHelper();
        $result = $helper->filterArrayByRange($this->array, '2022-09-14', '2022-09-16');

        $this->assertEquals(
            [
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
            ],
            $result
        );
    }
}
