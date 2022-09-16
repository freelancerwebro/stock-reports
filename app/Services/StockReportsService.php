<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\StockArrayHelper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StockReportsService
{
    public function __construct(
        private StockArrayHelper $stockArrayHelper
    ) {
    }

    private function getRawData(string $symbol)
    {
        $client = new Client([
            'headers' => [
                'X-RapidAPI-Host' => config('rapidapi.header_host'),
                'X-RapidAPI-Key' => config('rapidapi.header_key'),
            ]
        ]);

        $res = $client->get(config('rapidapi.base_uri') . "?symbol=" . $symbol);
        $json = $res->getBody()->getContents();
        return json_decode($json, true);
    }

    public function getPrices(Request $request): array
    {
        $rawData = $this->getRawData($request->input('symbol'));

        return $this->stockArrayHelper->filterArrayByRange(
            $rawData['prices'] ?? [],
            (string)$request->input('start_date'),
            (string)$request->input('end_date')
        );
    }
}
