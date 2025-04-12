<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\StockArrayHelper;
use GuzzleHttp\Client;
use Illuminate\Contracts\Cache\Repository as CacheContract;

class StockReportsService
{
    public const CACHE_KEY_RAW_DATA = 'stock_raw_data_%s';

    public const CACHE_KEY = 'stock_data_%s_%s_%s';

    public function __construct(
        private readonly CacheContract $cache,
        private readonly StockArrayHelper $stockArrayHelper,
        private readonly Client $client
    ) {}

    private function getRawData(string $symbol)
    {
        $cacheKey = sprintf(
            self::CACHE_KEY_RAW_DATA,
            $symbol
        );

        return $this->cache->remember($cacheKey, now()->addDay(), function () use ($symbol) {
            $client = new $this->client([
                'headers' => [
                    'X-RapidAPI-Host' => config('rapidapi.header_host'),
                    'X-RapidAPI-Key' => config('rapidapi.header_key'),
                ],
            ]);

            $res = $client->get(config('rapidapi.base_uri').'?symbol='.$symbol.'&interval=1d&diffandsplits=false');
            $json = $res->getBody()->getContents();

            return json_decode($json, true);
        });
    }

    public function getPrices(
        string $symbol,
        string $startDate,
        string $endDate
    ): array {
        $cacheKey = sprintf(
            self::CACHE_KEY,
            $symbol,
            $startDate,
            $endDate
        );

        return $this->cache->remember($cacheKey, now()->addDay(), function () use (
            $symbol,
            $startDate,
            $endDate
        ) {
            $rawData = $this->getRawData($symbol);

            return $this->stockArrayHelper->filterArrayByRange(
                $rawData['body'] ?? [],
                $startDate,
                $endDate
            );
        });
    }
}
