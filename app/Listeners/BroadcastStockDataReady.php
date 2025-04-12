<?php

namespace App\Listeners;

use App\Events\StockDataReady;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BroadcastStockDataReady implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(StockDataReady $event): void {}
}
