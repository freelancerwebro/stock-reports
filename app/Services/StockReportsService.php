<?php

declare(strict_types=1);

namespace App\Services;

use App\Helpers\StockArrayHelper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StockReportsService
{
    public function __construct(
        private readonly StockArrayHelper $stockArrayHelper,
        private readonly Client $client
    ) {
    }

    private function getRawData(string $symbol)
    {
        $client = new $this->client([
            'headers' => [
                'X-RapidAPI-Host' => config('rapidapi.header_host'),
                'X-RapidAPI-Key' => config('rapidapi.header_key'),
            ]
        ]);

        $res = $client->get(config('rapidapi.base_uri') . "?symbol=" . $symbol);
        $json = $res->getBody()->getContents();
        return json_decode($json, true);
    }

    public function getMock(): array
    {
        $json = '{
            "meta": {
                "processedTime": "2025-04-09T14:20:17.672032Z",
                "currency": "USD",
                "symbol": "AAPL",
                "exchangeName": "NMS",
                "fullExchangeName": "NasdaqGS",
                "instrumentType": "EQUITY",
                "firstTradeDate": 345479400,
                "regularMarketTime": 1744208417,
                "hasPrePostMarketData": true,
                "gmtoffset": -14400,
                "timezone": "EDT",
                "exchangeTimezoneName": "America/New_York",
                "regularMarketPrice": 178.13,
                "fiftyTwoWeekHigh": 260.1,
                "fiftyTwoWeekLow": 164.08,
                "regularMarketDayHigh": 179.42,
                "regularMarketDayLow": 171.89,
                "regularMarketVolume": 29833879,
                "longName": "Apple Inc.",
                "shortName": "Apple Inc.",
                "chartPreviousClose": 66.997,
                "priceHint": 2,
                "dataGranularity": "1d",
                "range": "",
                "version": "v1.0",
                "status": 200,
                "copywrite": "https://apicalls.io"
            },
            "body": {
                "1586439000": {
                    "date": "09-04-2020",
                    "date_utc": 1586439000,
                    "open": 67.18,
                    "high": 67.52,
                    "low": 66.18,
                    "close": 67,
                    "volume": 161834800,
                    "adjclose": 65.04
                },
                "1586784600": {
                    "date": "13-04-2020",
                    "date_utc": 1586784600,
                    "open": 67.08,
                    "high": 68.43,
                    "low": 66.46,
                    "close": 68.31,
                    "volume": 131022800,
                    "adjclose": 66.31
                },
                "1586871000": {
                    "date": "14-04-2020",
                    "date_utc": 1586871000,
                    "open": 70,
                    "high": 72.06,
                    "low": 69.51,
                    "close": 71.76,
                    "volume": 194994800,
                    "adjclose": 69.66
                },
                "1586957400": {
                    "date": "15-04-2020",
                    "date_utc": 1586957400,
                    "open": 70.6,
                    "high": 71.58,
                    "low": 70.16,
                    "close": 71.11,
                    "volume": 131154400,
                    "adjclose": 69.03
                },
                "1587043800": {
                    "date": "16-04-2020",
                    "date_utc": 1587043800,
                    "open": 71.85,
                    "high": 72.05,
                    "low": 70.59,
                    "close": 71.67,
                    "volume": 157125200,
                    "adjclose": 69.57
                },
                "1587130200": {
                    "date": "17-04-2020",
                    "date_utc": 1587130200,
                    "open": 71.17,
                    "high": 71.74,
                    "low": 69.21,
                    "close": 70.7,
                    "volume": 215250000,
                    "adjclose": 68.63
                },
                "1587389400": {
                    "date": "20-04-2020",
                    "date_utc": 1587389400,
                    "open": 69.49,
                    "high": 70.42,
                    "low": 69.21,
                    "close": 69.23,
                    "volume": 130015200,
                    "adjclose": 67.21
                },
                "1587475800": {
                    "date": "21-04-2020",
                    "date_utc": 1587475800,
                    "open": 69.07,
                    "high": 69.31,
                    "low": 66.36,
                    "close": 67.09,
                    "volume": 180991600,
                    "adjclose": 65.13
                },
                "1587562200": {
                    "date": "22-04-2020",
                    "date_utc": 1587562200,
                    "open": 68.4,
                    "high": 69.47,
                    "low": 68.05,
                    "close": 69.03,
                    "volume": 116862400,
                    "adjclose": 67
                },
                "1587648600": {
                    "date": "23-04-2020",
                    "date_utc": 1587648600,
                    "open": 68.97,
                    "high": 70.44,
                    "low": 68.72,
                    "close": 68.76,
                    "volume": 124814400,
                    "adjclose": 66.74
                },
                "1587735000": {
                    "date": "24-04-2020",
                    "date_utc": 1587735000,
                    "open": 69.3,
                    "high": 70.75,
                    "low": 69.25,
                    "close": 70.74,
                    "volume": 126161200,
                    "adjclose": 68.67
                },
                "1587994200": {
                    "date": "27-04-2020",
                    "date_utc": 1587994200,
                    "open": 70.45,
                    "high": 71.14,
                    "low": 69.99,
                    "close": 70.79,
                    "volume": 117087600,
                    "adjclose": 68.72
                },
                "1588080600": {
                    "date": "28-04-2020",
                    "date_utc": 1588080600,
                    "open": 71.27,
                    "high": 71.46,
                    "low": 69.55,
                    "close": 69.64,
                    "volume": 112004800,
                    "adjclose": 67.61
                },
                "1588167000": {
                    "date": "29-04-2020",
                    "date_utc": 1588167000,
                    "open": 71.18,
                    "high": 72.42,
                    "low": 70.97,
                    "close": 71.93,
                    "volume": 137280800,
                    "adjclose": 69.83
                },
                "1588253400": {
                    "date": "30-04-2020",
                    "date_utc": 1588253400,
                    "open": 72.49,
                    "high": 73.63,
                    "low": 72.09,
                    "close": 73.45,
                    "volume": 183064000,
                    "adjclose": 71.3
                },
                "1588339800": {
                    "date": "01-05-2020",
                    "date_utc": 1588339800,
                    "open": 71.56,
                    "high": 74.75,
                    "low": 71.46,
                    "close": 72.27,
                    "volume": 240616800,
                    "adjclose": 70.15
                },
                "1588599000": {
                    "date": "04-05-2020",
                    "date_utc": 1588599000,
                    "open": 72.29,
                    "high": 73.42,
                    "low": 71.58,
                    "close": 73.29,
                    "volume": 133568000,
                    "adjclose": 71.14
                },
                "1588685400": {
                    "date": "05-05-2020",
                    "date_utc": 1588685400,
                    "open": 73.76,
                    "high": 75.25,
                    "low": 73.61,
                    "close": 74.39,
                    "volume": 147751200,
                    "adjclose": 72.21
                },
                "1588771800": {
                    "date": "06-05-2020",
                    "date_utc": 1588771800,
                    "open": 75.11,
                    "high": 75.81,
                    "low": 74.72,
                    "close": 75.16,
                    "volume": 142333600,
                    "adjclose": 72.96
                },
                "1588858200": {
                    "date": "07-05-2020",
                    "date_utc": 1588858200,
                    "open": 75.81,
                    "high": 76.29,
                    "low": 75.49,
                    "close": 75.93,
                    "volume": 115215200,
                    "adjclose": 73.71
                },
                "1588944600": {
                    "date": "08-05-2020",
                    "date_utc": 1588944600,
                    "open": 76.41,
                    "high": 77.59,
                    "low": 76.07,
                    "close": 77.53,
                    "volume": 133838400,
                    "adjclose": 75.47
                },
                "1589203800": {
                    "date": "11-05-2020",
                    "date_utc": 1589203800,
                    "open": 77.03,
                    "high": 79.26,
                    "low": 76.81,
                    "close": 78.75,
                    "volume": 145946400,
                    "adjclose": 76.65
                },
                "1589290200": {
                    "date": "12-05-2020",
                    "date_utc": 1589290200,
                    "open": 79.46,
                    "high": 79.92,
                    "low": 77.73,
                    "close": 77.85,
                    "volume": 162301200,
                    "adjclose": 75.78
                },
                "1589376600": {
                    "date": "13-05-2020",
                    "date_utc": 1589376600,
                    "open": 78.04,
                    "high": 78.99,
                    "low": 75.8,
                    "close": 76.91,
                    "volume": 200622400,
                    "adjclose": 74.86
                },
                "1589463000": {
                    "date": "14-05-2020",
                    "date_utc": 1589463000,
                    "open": 76.13,
                    "high": 77.45,
                    "low": 75.38,
                    "close": 77.39,
                    "volume": 158929200,
                    "adjclose": 75.32
                },
                "1589549400": {
                    "date": "15-05-2020",
                    "date_utc": 1589549400,
                    "open": 75.09,
                    "high": 76.97,
                    "low": 75.05,
                    "close": 76.93,
                    "volume": 166348400,
                    "adjclose": 74.88
                },
                "1589808600": {
                    "date": "18-05-2020",
                    "date_utc": 1589808600,
                    "open": 78.29,
                    "high": 79.13,
                    "low": 77.58,
                    "close": 78.74,
                    "volume": 135178400,
                    "adjclose": 76.64
                },
                "1589895000": {
                    "date": "19-05-2020",
                    "date_utc": 1589895000,
                    "open": 78.76,
                    "high": 79.63,
                    "low": 78.25,
                    "close": 78.29,
                    "volume": 101729600,
                    "adjclose": 76.2
                },
                "1589981400": {
                    "date": "20-05-2020",
                    "date_utc": 1589981400,
                    "open": 79.17,
                    "high": 79.88,
                    "low": 79.13,
                    "close": 79.81,
                    "volume": 111504800,
                    "adjclose": 77.68
                },
                "1590067800": {
                    "date": "21-05-2020",
                    "date_utc": 1590067800,
                    "open": 79.67,
                    "high": 80.22,
                    "low": 78.97,
                    "close": 79.21,
                    "volume": 102688800,
                    "adjclose": 77.1
                },
                "1590154200": {
                    "date": "22-05-2020",
                    "date_utc": 1590154200,
                    "open": 78.94,
                    "high": 79.81,
                    "low": 78.84,
                    "close": 79.72,
                    "volume": 81803200,
                    "adjclose": 77.6
                },
                "1590499800": {
                    "date": "26-05-2020",
                    "date_utc": 1590499800,
                    "open": 80.88,
                    "high": 81.06,
                    "low": 79.13,
                    "close": 79.18,
                    "volume": 125522000,
                    "adjclose": 77.07
                },
                "1590586200": {
                    "date": "27-05-2020",
                    "date_utc": 1590586200,
                    "open": 79.04,
                    "high": 79.68,
                    "low": 78.27,
                    "close": 79.53,
                    "volume": 112945200,
                    "adjclose": 77.41
                },
                "1590672600": {
                    "date": "28-05-2020",
                    "date_utc": 1590672600,
                    "open": 79.19,
                    "high": 80.86,
                    "low": 78.91,
                    "close": 79.56,
                    "volume": 133560800,
                    "adjclose": 77.44
                },
                "1590759000": {
                    "date": "29-05-2020",
                    "date_utc": 1590759000,
                    "open": 79.81,
                    "high": 80.29,
                    "low": 79.12,
                    "close": 79.49,
                    "volume": 153532400,
                    "adjclose": 77.37
                },
                "1591018200": {
                    "date": "01-06-2020",
                    "date_utc": 1591018200,
                    "open": 79.44,
                    "high": 80.59,
                    "low": 79.3,
                    "close": 80.46,
                    "volume": 80791200,
                    "adjclose": 78.32
                },
                "1591104600": {
                    "date": "02-06-2020",
                    "date_utc": 1591104600,
                    "open": 80.19,
                    "high": 80.86,
                    "low": 79.73,
                    "close": 80.83,
                    "volume": 87642800,
                    "adjclose": 78.68
                },
                "1591191000": {
                    "date": "03-06-2020",
                    "date_utc": 1591191000,
                    "open": 81.17,
                    "high": 81.55,
                    "low": 80.57,
                    "close": 81.28,
                    "volume": 104491200,
                    "adjclose": 79.11
                },
                "1591277400": {
                    "date": "04-06-2020",
                    "date_utc": 1591277400,
                    "open": 81.1,
                    "high": 81.4,
                    "low": 80.19,
                    "close": 80.58,
                    "volume": 87560400,
                    "adjclose": 78.43
                },
                "1591363800": {
                    "date": "05-06-2020",
                    "date_utc": 1591363800,
                    "open": 80.84,
                    "high": 82.94,
                    "low": 80.81,
                    "close": 82.88,
                    "volume": 137250400,
                    "adjclose": 80.67
                },
                "1591623000": {
                    "date": "08-06-2020",
                    "date_utc": 1591623000,
                    "open": 82.56,
                    "high": 83.4,
                    "low": 81.83,
                    "close": 83.36,
                    "volume": 95654400,
                    "adjclose": 81.14
                },
                "1591709400": {
                    "date": "09-06-2020",
                    "date_utc": 1591709400,
                    "open": 83.04,
                    "high": 86.4,
                    "low": 83,
                    "close": 86,
                    "volume": 147712400,
                    "adjclose": 83.71
                },
                "1591795800": {
                    "date": "10-06-2020",
                    "date_utc": 1591795800,
                    "open": 86.97,
                    "high": 88.69,
                    "low": 86.52,
                    "close": 88.21,
                    "volume": 166651600,
                    "adjclose": 85.86
                },
                "1591882200": {
                    "date": "11-06-2020",
                    "date_utc": 1591882200,
                    "open": 87.33,
                    "high": 87.76,
                    "low": 83.87,
                    "close": 83.97,
                    "volume": 201662400,
                    "adjclose": 81.74
                },
                "1591968600": {
                    "date": "12-06-2020",
                    "date_utc": 1591968600,
                    "open": 86.18,
                    "high": 86.95,
                    "low": 83.56,
                    "close": 84.7,
                    "volume": 200146000,
                    "adjclose": 82.44
                },
                "1592227800": {
                    "date": "15-06-2020",
                    "date_utc": 1592227800,
                    "open": 83.31,
                    "high": 86.42,
                    "low": 83.14,
                    "close": 85.75,
                    "volume": 138808800,
                    "adjclose": 83.46
                },
                "1592314200": {
                    "date": "16-06-2020",
                    "date_utc": 1592314200,
                    "open": 87.86,
                    "high": 88.3,
                    "low": 86.18,
                    "close": 88.02,
                    "volume": 165428800,
                    "adjclose": 85.67
                },
                "1592400600": {
                    "date": "17-06-2020",
                    "date_utc": 1592400600,
                    "open": 88.79,
                    "high": 88.85,
                    "low": 87.77,
                    "close": 87.9,
                    "volume": 114406400,
                    "adjclose": 85.55
                },
                "1592487000": {
                    "date": "18-06-2020",
                    "date_utc": 1592487000,
                    "open": 87.85,
                    "high": 88.36,
                    "low": 87.31,
                    "close": 87.93,
                    "volume": 96820400,
                    "adjclose": 85.59
                },
                "1592573400": {
                    "date": "19-06-2020",
                    "date_utc": 1592573400,
                    "open": 88.66,
                    "high": 89.14,
                    "low": 86.29,
                    "close": 87.43,
                    "volume": 264476000,
                    "adjclose": 85.1
                },
                "1592832600": {
                    "date": "22-06-2020",
                    "date_utc": 1592832600,
                    "open": 87.83,
                    "high": 89.86,
                    "low": 87.79,
                    "close": 89.72,
                    "volume": 135445200,
                    "adjclose": 87.33
                },
                "1592919000": {
                    "date": "23-06-2020",
                    "date_utc": 1592919000,
                    "open": 91,
                    "high": 93.1,
                    "low": 90.57,
                    "close": 91.63,
                    "volume": 212155600,
                    "adjclose": 89.19
                },
                "1593005400": {
                    "date": "24-06-2020",
                    "date_utc": 1593005400,
                    "open": 91.25,
                    "high": 92.2,
                    "low": 89.63,
                    "close": 90.01,
                    "volume": 192623200,
                    "adjclose": 87.62
                },
                "1593091800": {
                    "date": "25-06-2020",
                    "date_utc": 1593091800,
                    "open": 90.18,
                    "high": 91.25,
                    "low": 89.39,
                    "close": 91.21,
                    "volume": 137522400,
                    "adjclose": 88.78
                },
                "1593178200": {
                    "date": "26-06-2020",
                    "date_utc": 1593178200,
                    "open": 91.1,
                    "high": 91.33,
                    "low": 88.25,
                    "close": 88.41,
                    "volume": 205256800,
                    "adjclose": 86.05
                },
                "1593437400": {
                    "date": "29-06-2020",
                    "date_utc": 1593437400,
                    "open": 88.31,
                    "high": 90.54,
                    "low": 87.82,
                    "close": 90.44,
                    "volume": 130646000,
                    "adjclose": 88.03
                },
                "1593523800": {
                    "date": "30-06-2020",
                    "date_utc": 1593523800,
                    "open": 90.02,
                    "high": 91.5,
                    "low": 90,
                    "close": 91.2,
                    "volume": 140223200,
                    "adjclose": 88.77
                },
                "1593610200": {
                    "date": "01-07-2020",
                    "date_utc": 1593610200,
                    "open": 91.28,
                    "high": 91.84,
                    "low": 90.98,
                    "close": 91.03,
                    "volume": 110737200,
                    "adjclose": 88.6
                },
                "1593696600": {
                    "date": "02-07-2020",
                    "date_utc": 1593696600,
                    "open": 91.96,
                    "high": 92.62,
                    "low": 90.91,
                    "close": 91.03,
                    "volume": 114041600,
                    "adjclose": 88.6
                },
                "1594042200": {
                    "date": "06-07-2020",
                    "date_utc": 1594042200,
                    "open": 92.5,
                    "high": 93.94,
                    "low": 92.47,
                    "close": 93.46,
                    "volume": 118655600,
                    "adjclose": 90.97
                },
                "1594128600": {
                    "date": "07-07-2020",
                    "date_utc": 1594128600,
                    "open": 93.85,
                    "high": 94.65,
                    "low": 93.06,
                    "close": 93.17,
                    "volume": 112424400,
                    "adjclose": 90.69
                },
                "1594215000": {
                    "date": "08-07-2020",
                    "date_utc": 1594215000,
                    "open": 94.18,
                    "high": 95.38,
                    "low": 94.09,
                    "close": 95.34,
                    "volume": 117092000,
                    "adjclose": 92.8
                },
                "1594301400": {
                    "date": "09-07-2020",
                    "date_utc": 1594301400,
                    "open": 96.26,
                    "high": 96.32,
                    "low": 94.67,
                    "close": 95.75,
                    "volume": 125642800,
                    "adjclose": 93.2
                },
                "1594387800": {
                    "date": "10-07-2020",
                    "date_utc": 1594387800,
                    "open": 95.33,
                    "high": 95.98,
                    "low": 94.71,
                    "close": 95.92,
                    "volume": 90257200,
                    "adjclose": 93.36
                },
                "1594647000": {
                    "date": "13-07-2020",
                    "date_utc": 1594647000,
                    "open": 97.26,
                    "high": 99.96,
                    "low": 95.26,
                    "close": 95.48,
                    "volume": 191649200,
                    "adjclose": 92.93
                },
                "1594733400": {
                    "date": "14-07-2020",
                    "date_utc": 1594733400,
                    "open": 94.84,
                    "high": 97.25,
                    "low": 93.88,
                    "close": 97.06,
                    "volume": 170989200,
                    "adjclose": 94.47
                },
                "1594819800": {
                    "date": "15-07-2020",
                    "date_utc": 1594819800,
                    "open": 98.99,
                    "high": 99.25,
                    "low": 96.49,
                    "close": 97.72,
                    "volume": 153198000,
                    "adjclose": 95.12
                },
                "1594906200": {
                    "date": "16-07-2020",
                    "date_utc": 1594906200,
                    "open": 96.56,
                    "high": 97.4,
                    "low": 95.9,
                    "close": 96.52,
                    "volume": 110577600,
                    "adjclose": 93.95
                },
                "1594992600": {
                    "date": "17-07-2020",
                    "date_utc": 1594992600,
                    "open": 96.99,
                    "high": 97.15,
                    "low": 95.84,
                    "close": 96.33,
                    "volume": 92186800,
                    "adjclose": 93.76
                },
                "1595251800": {
                    "date": "20-07-2020",
                    "date_utc": 1595251800,
                    "open": 96.42,
                    "high": 98.5,
                    "low": 96.06,
                    "close": 98.36,
                    "volume": 90318000,
                    "adjclose": 95.74
                },
                "1595338200": {
                    "date": "21-07-2020",
                    "date_utc": 1595338200,
                    "open": 99.17,
                    "high": 99.25,
                    "low": 96.74,
                    "close": 97,
                    "volume": 103433200,
                    "adjclose": 94.41
                },
                "1595424600": {
                    "date": "22-07-2020",
                    "date_utc": 1595424600,
                    "open": 96.69,
                    "high": 97.97,
                    "low": 96.6,
                    "close": 97.27,
                    "volume": 89001600,
                    "adjclose": 94.68
                },
                "1595511000": {
                    "date": "23-07-2020",
                    "date_utc": 1595511000,
                    "open": 97,
                    "high": 97.08,
                    "low": 92.01,
                    "close": 92.85,
                    "volume": 197004400,
                    "adjclose": 90.37
                },
                "1595597400": {
                    "date": "24-07-2020",
                    "date_utc": 1595597400,
                    "open": 90.99,
                    "high": 92.97,
                    "low": 89.14,
                    "close": 92.61,
                    "volume": 185438800,
                    "adjclose": 90.15
                },
                "1595856600": {
                    "date": "27-07-2020",
                    "date_utc": 1595856600,
                    "open": 93.71,
                    "high": 94.9,
                    "low": 93.48,
                    "close": 94.81,
                    "volume": 121214000,
                    "adjclose": 92.28
                },
                "1595943000": {
                    "date": "28-07-2020",
                    "date_utc": 1595943000,
                    "open": 94.37,
                    "high": 94.55,
                    "low": 93.25,
                    "close": 93.25,
                    "volume": 103625600,
                    "adjclose": 90.77
                },
                "1596029400": {
                    "date": "29-07-2020",
                    "date_utc": 1596029400,
                    "open": 93.75,
                    "high": 95.23,
                    "low": 93.71,
                    "close": 95.04,
                    "volume": 90329200,
                    "adjclose": 92.51
                },
                "1596115800": {
                    "date": "30-07-2020",
                    "date_utc": 1596115800,
                    "open": 94.19,
                    "high": 96.3,
                    "low": 93.77,
                    "close": 96.19,
                    "volume": 158130000,
                    "adjclose": 93.63
                },
                "1596202200": {
                    "date": "31-07-2020",
                    "date_utc": 1596202200,
                    "open": 102.89,
                    "high": 106.42,
                    "low": 100.82,
                    "close": 106.26,
                    "volume": 374336800,
                    "adjclose": 103.43
                },
                "1596461400": {
                    "date": "03-08-2020",
                    "date_utc": 1596461400,
                    "open": 108.2,
                    "high": 111.64,
                    "low": 107.89,
                    "close": 108.94,
                    "volume": 308151200,
                    "adjclose": 106.03
                },
                "1596547800": {
                    "date": "04-08-2020",
                    "date_utc": 1596547800,
                    "open": 109.13,
                    "high": 110.79,
                    "low": 108.39,
                    "close": 109.67,
                    "volume": 173071600,
                    "adjclose": 106.74
                },
                "1596634200": {
                    "date": "05-08-2020",
                    "date_utc": 1596634200,
                    "open": 109.38,
                    "high": 110.39,
                    "low": 108.9,
                    "close": 110.06,
                    "volume": 121776800,
                    "adjclose": 107.13
                },
                "1596720600": {
                    "date": "06-08-2020",
                    "date_utc": 1596720600,
                    "open": 110.4,
                    "high": 114.41,
                    "low": 109.8,
                    "close": 113.9,
                    "volume": 202428800,
                    "adjclose": 110.87
                },
                "1596807000": {
                    "date": "07-08-2020",
                    "date_utc": 1596807000,
                    "open": 113.21,
                    "high": 113.68,
                    "low": 110.29,
                    "close": 111.11,
                    "volume": 198045600,
                    "adjclose": 108.35
                },
                "1597066200": {
                    "date": "10-08-2020",
                    "date_utc": 1597066200,
                    "open": 112.6,
                    "high": 113.78,
                    "low": 110,
                    "close": 112.73,
                    "volume": 212403600,
                    "adjclose": 109.92
                },
                "1597152600": {
                    "date": "11-08-2020",
                    "date_utc": 1597152600,
                    "open": 111.97,
                    "high": 112.48,
                    "low": 109.11,
                    "close": 109.38,
                    "volume": 187902400,
                    "adjclose": 106.65
                },
                "1597239000": {
                    "date": "12-08-2020",
                    "date_utc": 1597239000,
                    "open": 110.5,
                    "high": 113.28,
                    "low": 110.3,
                    "close": 113.01,
                    "volume": 165598000,
                    "adjclose": 110.2
                },
                "1597325400": {
                    "date": "13-08-2020",
                    "date_utc": 1597325400,
                    "open": 114.43,
                    "high": 116.04,
                    "low": 113.93,
                    "close": 115.01,
                    "volume": 210082000,
                    "adjclose": 112.15
                },
                "1597411800": {
                    "date": "14-08-2020",
                    "date_utc": 1597411800,
                    "open": 114.83,
                    "high": 115,
                    "low": 113.04,
                    "close": 114.91,
                    "volume": 165565200,
                    "adjclose": 112.05
                },
                "1597671000": {
                    "date": "17-08-2020",
                    "date_utc": 1597671000,
                    "open": 116.06,
                    "high": 116.09,
                    "low": 113.96,
                    "close": 114.61,
                    "volume": 119561600,
                    "adjclose": 111.75
                },
                "1597757400": {
                    "date": "18-08-2020",
                    "date_utc": 1597757400,
                    "open": 114.35,
                    "high": 116,
                    "low": 114.01,
                    "close": 115.56,
                    "volume": 105633600,
                    "adjclose": 112.68
                },
                "1597843800": {
                    "date": "19-08-2020",
                    "date_utc": 1597843800,
                    "open": 115.98,
                    "high": 117.16,
                    "low": 115.61,
                    "close": 115.71,
                    "volume": 145538000,
                    "adjclose": 112.83
                },
                "1597930200": {
                    "date": "20-08-2020",
                    "date_utc": 1597930200,
                    "open": 115.75,
                    "high": 118.39,
                    "low": 115.73,
                    "close": 118.28,
                    "volume": 126907200,
                    "adjclose": 115.33
                },
                "1598016600": {
                    "date": "21-08-2020",
                    "date_utc": 1598016600,
                    "open": 119.26,
                    "high": 124.87,
                    "low": 119.25,
                    "close": 124.37,
                    "volume": 338054800,
                    "adjclose": 121.27
                },
                "1598275800": {
                    "date": "24-08-2020",
                    "date_utc": 1598275800,
                    "open": 128.7,
                    "high": 128.79,
                    "low": 123.94,
                    "close": 125.86,
                    "volume": 345937600,
                    "adjclose": 122.72
                },
                "1598362200": {
                    "date": "25-08-2020",
                    "date_utc": 1598362200,
                    "open": 124.7,
                    "high": 125.18,
                    "low": 123.05,
                    "close": 124.82,
                    "volume": 211495600,
                    "adjclose": 121.72
                },
                "1598448600": {
                    "date": "26-08-2020",
                    "date_utc": 1598448600,
                    "open": 126.18,
                    "high": 126.99,
                    "low": 125.08,
                    "close": 126.52,
                    "volume": 163022400,
                    "adjclose": 123.37
                },
                "1598535000": {
                    "date": "27-08-2020",
                    "date_utc": 1598535000,
                    "open": 127.14,
                    "high": 127.49,
                    "low": 123.83,
                    "close": 125.01,
                    "volume": 155552400,
                    "adjclose": 121.9
                },
                "1598621400": {
                    "date": "28-08-2020",
                    "date_utc": 1598621400,
                    "open": 126.01,
                    "high": 126.44,
                    "low": 124.58,
                    "close": 124.81,
                    "volume": 187630000,
                    "adjclose": 121.7
                },
                "1598880600": {
                    "date": "31-08-2020",
                    "date_utc": 1598880600,
                    "open": 127.58,
                    "high": 131,
                    "low": 126,
                    "close": 129.04,
                    "volume": 225702700,
                    "adjclose": 125.83
                },
                "1598967000": {
                    "date": "01-09-2020",
                    "date_utc": 1598967000,
                    "open": 132.76,
                    "high": 134.8,
                    "low": 130.53,
                    "close": 134.18,
                    "volume": 151948100,
                    "adjclose": 130.84
                },
                "1599053400": {
                    "date": "02-09-2020",
                    "date_utc": 1599053400,
                    "open": 137.59,
                    "high": 137.98,
                    "low": 127,
                    "close": 131.4,
                    "volume": 200119000,
                    "adjclose": 128.13
                },
                "1599139800": {
                    "date": "03-09-2020",
                    "date_utc": 1599139800,
                    "open": 126.91,
                    "high": 128.84,
                    "low": 120.5,
                    "close": 120.88,
                    "volume": 257599600,
                    "adjclose": 117.87
                },
                "1599226200": {
                    "date": "04-09-2020",
                    "date_utc": 1599226200,
                    "open": 120.07,
                    "high": 123.7,
                    "low": 110.89,
                    "close": 120.96,
                    "volume": 332607200,
                    "adjclose": 117.95
                },
                "1599571800": {
                    "date": "08-09-2020",
                    "date_utc": 1599571800,
                    "open": 113.95,
                    "high": 118.99,
                    "low": 112.68,
                    "close": 112.82,
                    "volume": 231366600,
                    "adjclose": 110.01
                },
                "1599658200": {
                    "date": "09-09-2020",
                    "date_utc": 1599658200,
                    "open": 117.26,
                    "high": 119.14,
                    "low": 115.26,
                    "close": 117.32,
                    "volume": 176940500,
                    "adjclose": 114.4
                },
                "1599744600": {
                    "date": "10-09-2020",
                    "date_utc": 1599744600,
                    "open": 120.36,
                    "high": 120.5,
                    "low": 112.5,
                    "close": 113.49,
                    "volume": 182274400,
                    "adjclose": 110.66
                },
                "1599831000": {
                    "date": "11-09-2020",
                    "date_utc": 1599831000,
                    "open": 114.57,
                    "high": 115.23,
                    "low": 110,
                    "close": 112,
                    "volume": 180860300,
                    "adjclose": 109.21
                },
                "1600090200": {
                    "date": "14-09-2020",
                    "date_utc": 1600090200,
                    "open": 114.72,
                    "high": 115.93,
                    "low": 112.8,
                    "close": 115.36,
                    "volume": 140150100,
                    "adjclose": 112.49
                },
                "1600176600": {
                    "date": "15-09-2020",
                    "date_utc": 1600176600,
                    "open": 118.33,
                    "high": 118.83,
                    "low": 113.61,
                    "close": 115.54,
                    "volume": 184642000,
                    "adjclose": 112.66
                },
                "1600263000": {
                    "date": "16-09-2020",
                    "date_utc": 1600263000,
                    "open": 115.23,
                    "high": 116,
                    "low": 112.04,
                    "close": 112.13,
                    "volume": 154679000,
                    "adjclose": 109.34
                },
                "1600349400": {
                    "date": "17-09-2020",
                    "date_utc": 1600349400,
                    "open": 109.72,
                    "high": 112.2,
                    "low": 108.71,
                    "close": 110.34,
                    "volume": 178011000,
                    "adjclose": 107.59
                },
                "1600435800": {
                    "date": "18-09-2020",
                    "date_utc": 1600435800,
                    "open": 110.4,
                    "high": 110.88,
                    "low": 106.09,
                    "close": 106.84,
                    "volume": 287104900,
                    "adjclose": 104.18
                },
                "1600695000": {
                    "date": "21-09-2020",
                    "date_utc": 1600695000,
                    "open": 104.54,
                    "high": 110.19,
                    "low": 103.1,
                    "close": 110.08,
                    "volume": 195713800,
                    "adjclose": 107.34
                },
                "1600781400": {
                    "date": "22-09-2020",
                    "date_utc": 1600781400,
                    "open": 112.68,
                    "high": 112.86,
                    "low": 109.16,
                    "close": 111.81,
                    "volume": 183055400,
                    "adjclose": 109.03
                },
                "1600867800": {
                    "date": "23-09-2020",
                    "date_utc": 1600867800,
                    "open": 111.62,
                    "high": 112.11,
                    "low": 106.77,
                    "close": 107.12,
                    "volume": 150718700,
                    "adjclose": 104.45
                },
                "1600954200": {
                    "date": "24-09-2020",
                    "date_utc": 1600954200,
                    "open": 105.17,
                    "high": 110.25,
                    "low": 105,
                    "close": 108.22,
                    "volume": 167743300,
                    "adjclose": 105.53
                },
                "1601040600": {
                    "date": "25-09-2020",
                    "date_utc": 1601040600,
                    "open": 108.43,
                    "high": 112.44,
                    "low": 107.67,
                    "close": 112.28,
                    "volume": 149981400,
                    "adjclose": 109.48
                },
                "1601299800": {
                    "date": "28-09-2020",
                    "date_utc": 1601299800,
                    "open": 115.01,
                    "high": 115.32,
                    "low": 112.78,
                    "close": 114.96,
                    "volume": 137672400,
                    "adjclose": 112.1
                },
                "1601386200": {
                    "date": "29-09-2020",
                    "date_utc": 1601386200,
                    "open": 114.55,
                    "high": 115.31,
                    "low": 113.57,
                    "close": 114.09,
                    "volume": 99382200,
                    "adjclose": 111.25
                },
                "1601472600": {
                    "date": "30-09-2020",
                    "date_utc": 1601472600,
                    "open": 113.79,
                    "high": 117.26,
                    "low": 113.62,
                    "close": 115.81,
                    "volume": 142675200,
                    "adjclose": 112.93
                },
                "1601559000": {
                    "date": "01-10-2020",
                    "date_utc": 1601559000,
                    "open": 117.64,
                    "high": 117.72,
                    "low": 115.83,
                    "close": 116.79,
                    "volume": 116120400,
                    "adjclose": 113.88
                },
                "1601645400": {
                    "date": "02-10-2020",
                    "date_utc": 1601645400,
                    "open": 112.89,
                    "high": 115.37,
                    "low": 112.22,
                    "close": 113.02,
                    "volume": 144712000,
                    "adjclose": 110.21
                },
                "1601904600": {
                    "date": "05-10-2020",
                    "date_utc": 1601904600,
                    "open": 113.91,
                    "high": 116.65,
                    "low": 113.55,
                    "close": 116.5,
                    "volume": 106243800,
                    "adjclose": 113.6
                },
                "1601991000": {
                    "date": "06-10-2020",
                    "date_utc": 1601991000,
                    "open": 115.7,
                    "high": 116.12,
                    "low": 112.25,
                    "close": 113.16,
                    "volume": 161498200,
                    "adjclose": 110.34
                },
                "1602077400": {
                    "date": "07-10-2020",
                    "date_utc": 1602077400,
                    "open": 114.62,
                    "high": 115.55,
                    "low": 114.13,
                    "close": 115.08,
                    "volume": 96849000,
                    "adjclose": 112.21
                },
                "1602163800": {
                    "date": "08-10-2020",
                    "date_utc": 1602163800,
                    "open": 116.25,
                    "high": 116.4,
                    "low": 114.59,
                    "close": 114.97,
                    "volume": 83477200,
                    "adjclose": 112.11
                },
                "1602250200": {
                    "date": "09-10-2020",
                    "date_utc": 1602250200,
                    "open": 115.28,
                    "high": 117,
                    "low": 114.92,
                    "close": 116.97,
                    "volume": 100506900,
                    "adjclose": 114.06
                },
                "1602509400": {
                    "date": "12-10-2020",
                    "date_utc": 1602509400,
                    "open": 120.06,
                    "high": 125.18,
                    "low": 119.28,
                    "close": 124.4,
                    "volume": 240226800,
                    "adjclose": 121.3
                },
                "1602595800": {
                    "date": "13-10-2020",
                    "date_utc": 1602595800,
                    "open": 125.27,
                    "high": 125.39,
                    "low": 119.65,
                    "close": 121.1,
                    "volume": 262330500,
                    "adjclose": 118.08
                },
                "1602682200": {
                    "date": "14-10-2020",
                    "date_utc": 1602682200,
                    "open": 121,
                    "high": 123.03,
                    "low": 119.62,
                    "close": 121.19,
                    "volume": 150712000,
                    "adjclose": 118.17
                },
                "1602768600": {
                    "date": "15-10-2020",
                    "date_utc": 1602768600,
                    "open": 118.72,
                    "high": 121.2,
                    "low": 118.15,
                    "close": 120.71,
                    "volume": 112559200,
                    "adjclose": 117.7
                },
                "1602855000": {
                    "date": "16-10-2020",
                    "date_utc": 1602855000,
                    "open": 121.28,
                    "high": 121.55,
                    "low": 118.81,
                    "close": 119.02,
                    "volume": 115393800,
                    "adjclose": 116.06
                },
                "1603114200": {
                    "date": "19-10-2020",
                    "date_utc": 1603114200,
                    "open": 119.96,
                    "high": 120.42,
                    "low": 115.66,
                    "close": 115.98,
                    "volume": 120639300,
                    "adjclose": 113.09
                },
                "1603200600": {
                    "date": "20-10-2020",
                    "date_utc": 1603200600,
                    "open": 116.2,
                    "high": 118.98,
                    "low": 115.63,
                    "close": 117.51,
                    "volume": 124423700,
                    "adjclose": 114.58
                },
                "1603287000": {
                    "date": "21-10-2020",
                    "date_utc": 1603287000,
                    "open": 116.67,
                    "high": 118.71,
                    "low": 116.45,
                    "close": 116.87,
                    "volume": 89946000,
                    "adjclose": 113.96
                },
                "1603373400": {
                    "date": "22-10-2020",
                    "date_utc": 1603373400,
                    "open": 117.45,
                    "high": 118.04,
                    "low": 114.59,
                    "close": 115.75,
                    "volume": 101988000,
                    "adjclose": 112.87
                },
                "1603459800": {
                    "date": "23-10-2020",
                    "date_utc": 1603459800,
                    "open": 116.39,
                    "high": 116.55,
                    "low": 114.28,
                    "close": 115.04,
                    "volume": 82572600,
                    "adjclose": 112.18
                },
                "1603719000": {
                    "date": "26-10-2020",
                    "date_utc": 1603719000,
                    "open": 114.01,
                    "high": 116.55,
                    "low": 112.88,
                    "close": 115.05,
                    "volume": 111850700,
                    "adjclose": 112.19
                },
                "1603805400": {
                    "date": "27-10-2020",
                    "date_utc": 1603805400,
                    "open": 115.49,
                    "high": 117.28,
                    "low": 114.54,
                    "close": 116.6,
                    "volume": 92276800,
                    "adjclose": 113.7
                },
                "1603891800": {
                    "date": "28-10-2020",
                    "date_utc": 1603891800,
                    "open": 115.05,
                    "high": 115.43,
                    "low": 111.1,
                    "close": 111.2,
                    "volume": 143937800,
                    "adjclose": 108.43
                },
                "1603978200": {
                    "date": "29-10-2020",
                    "date_utc": 1603978200,
                    "open": 112.37,
                    "high": 116.93,
                    "low": 112.2,
                    "close": 115.32,
                    "volume": 146129200,
                    "adjclose": 112.45
                },
                "1604064600": {
                    "date": "30-10-2020",
                    "date_utc": 1604064600,
                    "open": 111.06,
                    "high": 111.99,
                    "low": 107.72,
                    "close": 108.86,
                    "volume": 190272600,
                    "adjclose": 106.15
                },
                "1604327400": {
                    "date": "02-11-2020",
                    "date_utc": 1604327400,
                    "open": 109.11,
                    "high": 110.68,
                    "low": 107.32,
                    "close": 108.77,
                    "volume": 122866900,
                    "adjclose": 106.06
                },
                "1604413800": {
                    "date": "03-11-2020",
                    "date_utc": 1604413800,
                    "open": 109.66,
                    "high": 111.49,
                    "low": 108.73,
                    "close": 110.44,
                    "volume": 107624400,
                    "adjclose": 107.69
                },
                "1604500200": {
                    "date": "04-11-2020",
                    "date_utc": 1604500200,
                    "open": 114.14,
                    "high": 115.59,
                    "low": 112.35,
                    "close": 114.95,
                    "volume": 138235500,
                    "adjclose": 112.09
                },
                "1604586600": {
                    "date": "05-11-2020",
                    "date_utc": 1604586600,
                    "open": 117.95,
                    "high": 119.62,
                    "low": 116.87,
                    "close": 119.03,
                    "volume": 126387100,
                    "adjclose": 116.07
                },
                "1604673000": {
                    "date": "06-11-2020",
                    "date_utc": 1604673000,
                    "open": 118.32,
                    "high": 119.2,
                    "low": 116.13,
                    "close": 118.69,
                    "volume": 114457900,
                    "adjclose": 115.93
                },
                "1604932200": {
                    "date": "09-11-2020",
                    "date_utc": 1604932200,
                    "open": 120.5,
                    "high": 121.99,
                    "low": 116.05,
                    "close": 116.32,
                    "volume": 154515300,
                    "adjclose": 113.62
                },
                "1605018600": {
                    "date": "10-11-2020",
                    "date_utc": 1605018600,
                    "open": 115.55,
                    "high": 117.59,
                    "low": 114.13,
                    "close": 115.97,
                    "volume": 138023400,
                    "adjclose": 113.28
                },
                "1605105000": {
                    "date": "11-11-2020",
                    "date_utc": 1605105000,
                    "open": 117.19,
                    "high": 119.63,
                    "low": 116.44,
                    "close": 119.49,
                    "volume": 112295000,
                    "adjclose": 116.72
                },
                "1605191400": {
                    "date": "12-11-2020",
                    "date_utc": 1605191400,
                    "open": 119.62,
                    "high": 120.53,
                    "low": 118.57,
                    "close": 119.21,
                    "volume": 103162300,
                    "adjclose": 116.44
                },
                "1605277800": {
                    "date": "13-11-2020",
                    "date_utc": 1605277800,
                    "open": 119.44,
                    "high": 119.67,
                    "low": 117.87,
                    "close": 119.26,
                    "volume": 81581900,
                    "adjclose": 116.49
                },
                "1605537000": {
                    "date": "16-11-2020",
                    "date_utc": 1605537000,
                    "open": 118.92,
                    "high": 120.99,
                    "low": 118.15,
                    "close": 120.3,
                    "volume": 91183000,
                    "adjclose": 117.51
                },
                "1605623400": {
                    "date": "17-11-2020",
                    "date_utc": 1605623400,
                    "open": 119.55,
                    "high": 120.67,
                    "low": 118.96,
                    "close": 119.39,
                    "volume": 74271000,
                    "adjclose": 116.62
                },
                "1605709800": {
                    "date": "18-11-2020",
                    "date_utc": 1605709800,
                    "open": 118.61,
                    "high": 119.82,
                    "low": 118,
                    "close": 118.03,
                    "volume": 76322100,
                    "adjclose": 115.29
                },
                "1605796200": {
                    "date": "19-11-2020",
                    "date_utc": 1605796200,
                    "open": 117.59,
                    "high": 119.06,
                    "low": 116.81,
                    "close": 118.64,
                    "volume": 74113000,
                    "adjclose": 115.89
                },
                "1605882600": {
                    "date": "20-11-2020",
                    "date_utc": 1605882600,
                    "open": 118.64,
                    "high": 118.77,
                    "low": 117.29,
                    "close": 117.34,
                    "volume": 73604300,
                    "adjclose": 114.62
                },
                "1606141800": {
                    "date": "23-11-2020",
                    "date_utc": 1606141800,
                    "open": 117.18,
                    "high": 117.62,
                    "low": 113.75,
                    "close": 113.85,
                    "volume": 127959300,
                    "adjclose": 111.21
                },
                "1606228200": {
                    "date": "24-11-2020",
                    "date_utc": 1606228200,
                    "open": 113.91,
                    "high": 115.85,
                    "low": 112.59,
                    "close": 115.17,
                    "volume": 113874200,
                    "adjclose": 112.5
                },
                "1606314600": {
                    "date": "25-11-2020",
                    "date_utc": 1606314600,
                    "open": 115.55,
                    "high": 116.75,
                    "low": 115.17,
                    "close": 116.03,
                    "volume": 76499200,
                    "adjclose": 113.34
                },
                "1606487400": {
                    "date": "27-11-2020",
                    "date_utc": 1606487400,
                    "open": 116.57,
                    "high": 117.49,
                    "low": 116.22,
                    "close": 116.59,
                    "volume": 46691300,
                    "adjclose": 113.88
                },
                "1606746600": {
                    "date": "30-11-2020",
                    "date_utc": 1606746600,
                    "open": 116.97,
                    "high": 120.97,
                    "low": 116.81,
                    "close": 119.05,
                    "volume": 169410200,
                    "adjclose": 116.29
                },
                "1606833000": {
                    "date": "01-12-2020",
                    "date_utc": 1606833000,
                    "open": 121.01,
                    "high": 123.47,
                    "low": 120.01,
                    "close": 122.72,
                    "volume": 127728200,
                    "adjclose": 119.87
                },
                "1606919400": {
                    "date": "02-12-2020",
                    "date_utc": 1606919400,
                    "open": 122.02,
                    "high": 123.37,
                    "low": 120.89,
                    "close": 123.08,
                    "volume": 89004200,
                    "adjclose": 120.22
                },
                "1607005800": {
                    "date": "03-12-2020",
                    "date_utc": 1607005800,
                    "open": 123.52,
                    "high": 123.78,
                    "low": 122.21,
                    "close": 122.94,
                    "volume": 78967600,
                    "adjclose": 120.09
                },
                "1607092200": {
                    "date": "04-12-2020",
                    "date_utc": 1607092200,
                    "open": 122.6,
                    "high": 122.86,
                    "low": 121.52,
                    "close": 122.25,
                    "volume": 78260400,
                    "adjclose": 119.41
                },
                "1607351400": {
                    "date": "07-12-2020",
                    "date_utc": 1607351400,
                    "open": 122.31,
                    "high": 124.57,
                    "low": 122.25,
                    "close": 123.75,
                    "volume": 86712000,
                    "adjclose": 120.88
                },
                "1607437800": {
                    "date": "08-12-2020",
                    "date_utc": 1607437800,
                    "open": 124.37,
                    "high": 124.98,
                    "low": 123.09,
                    "close": 124.38,
                    "volume": 82225500,
                    "adjclose": 121.49
                },
                "1607524200": {
                    "date": "09-12-2020",
                    "date_utc": 1607524200,
                    "open": 124.53,
                    "high": 125.95,
                    "low": 121,
                    "close": 121.78,
                    "volume": 115089200,
                    "adjclose": 118.95
                },
                "1607610600": {
                    "date": "10-12-2020",
                    "date_utc": 1607610600,
                    "open": 120.5,
                    "high": 123.87,
                    "low": 120.15,
                    "close": 123.24,
                    "volume": 81312200,
                    "adjclose": 120.38
                },
                "1607697000": {
                    "date": "11-12-2020",
                    "date_utc": 1607697000,
                    "open": 122.43,
                    "high": 122.76,
                    "low": 120.55,
                    "close": 122.41,
                    "volume": 86939800,
                    "adjclose": 119.57
                },
                "1607956200": {
                    "date": "14-12-2020",
                    "date_utc": 1607956200,
                    "open": 122.6,
                    "high": 123.35,
                    "low": 121.54,
                    "close": 121.78,
                    "volume": 79184500,
                    "adjclose": 118.95
                },
                "1608042600": {
                    "date": "15-12-2020",
                    "date_utc": 1608042600,
                    "open": 124.34,
                    "high": 127.9,
                    "low": 124.13,
                    "close": 127.88,
                    "volume": 157243700,
                    "adjclose": 124.91
                },
                "1608129000": {
                    "date": "16-12-2020",
                    "date_utc": 1608129000,
                    "open": 127.41,
                    "high": 128.37,
                    "low": 126.56,
                    "close": 127.81,
                    "volume": 98208600,
                    "adjclose": 124.84
                },
                "1608215400": {
                    "date": "17-12-2020",
                    "date_utc": 1608215400,
                    "open": 128.9,
                    "high": 129.58,
                    "low": 128.04,
                    "close": 128.7,
                    "volume": 94359800,
                    "adjclose": 125.71
                },
                "1608301800": {
                    "date": "18-12-2020",
                    "date_utc": 1608301800,
                    "open": 128.96,
                    "high": 129.1,
                    "low": 126.12,
                    "close": 126.66,
                    "volume": 192541500,
                    "adjclose": 123.72
                },
                "1608561000": {
                    "date": "21-12-2020",
                    "date_utc": 1608561000,
                    "open": 125.02,
                    "high": 128.31,
                    "low": 123.45,
                    "close": 128.23,
                    "volume": 121251600,
                    "adjclose": 125.25
                },
                "1608647400": {
                    "date": "22-12-2020",
                    "date_utc": 1608647400,
                    "open": 131.61,
                    "high": 134.41,
                    "low": 129.65,
                    "close": 131.88,
                    "volume": 168904800,
                    "adjclose": 128.82
                },
                "1608733800": {
                    "date": "23-12-2020",
                    "date_utc": 1608733800,
                    "open": 132.16,
                    "high": 132.43,
                    "low": 130.78,
                    "close": 130.96,
                    "volume": 88223700,
                    "adjclose": 127.92
                },
                "1608820200": {
                    "date": "24-12-2020",
                    "date_utc": 1608820200,
                    "open": 131.32,
                    "high": 133.46,
                    "low": 131.1,
                    "close": 131.97,
                    "volume": 54930100,
                    "adjclose": 128.91
                },
                "1609165800": {
                    "date": "28-12-2020",
                    "date_utc": 1609165800,
                    "open": 133.99,
                    "high": 137.34,
                    "low": 133.51,
                    "close": 136.69,
                    "volume": 124486200,
                    "adjclose": 133.52
                },
                "1609252200": {
                    "date": "29-12-2020",
                    "date_utc": 1609252200,
                    "open": 138.05,
                    "high": 138.79,
                    "low": 134.34,
                    "close": 134.87,
                    "volume": 121047300,
                    "adjclose": 131.74
                },
                "1609338600": {
                    "date": "30-12-2020",
                    "date_utc": 1609338600,
                    "open": 135.58,
                    "high": 135.99,
                    "low": 133.4,
                    "close": 133.72,
                    "volume": 96452100,
                    "adjclose": 130.62
                },
                "1609425000": {
                    "date": "31-12-2020",
                    "date_utc": 1609425000,
                    "open": 134.08,
                    "high": 134.74,
                    "low": 131.72,
                    "close": 132.69,
                    "volume": 99116600,
                    "adjclose": 129.61
                },
                "1609770600": {
                    "date": "04-01-2021",
                    "date_utc": 1609770600,
                    "open": 133.52,
                    "high": 133.61,
                    "low": 126.76,
                    "close": 129.41,
                    "volume": 143301900,
                    "adjclose": 126.41
                },
                "1609857000": {
                    "date": "05-01-2021",
                    "date_utc": 1609857000,
                    "open": 128.89,
                    "high": 131.74,
                    "low": 128.43,
                    "close": 131.01,
                    "volume": 97664900,
                    "adjclose": 127.97
                },
                "1609943400": {
                    "date": "06-01-2021",
                    "date_utc": 1609943400,
                    "open": 127.72,
                    "high": 131.05,
                    "low": 126.38,
                    "close": 126.6,
                    "volume": 155088000,
                    "adjclose": 123.66
                },
                "1610029800": {
                    "date": "07-01-2021",
                    "date_utc": 1610029800,
                    "open": 128.36,
                    "high": 131.63,
                    "low": 127.86,
                    "close": 130.92,
                    "volume": 109578200,
                    "adjclose": 127.88
                },
                "1610116200": {
                    "date": "08-01-2021",
                    "date_utc": 1610116200,
                    "open": 132.43,
                    "high": 132.63,
                    "low": 130.23,
                    "close": 132.05,
                    "volume": 105158200,
                    "adjclose": 128.98
                },
                "1610375400": {
                    "date": "11-01-2021",
                    "date_utc": 1610375400,
                    "open": 129.19,
                    "high": 130.17,
                    "low": 128.5,
                    "close": 128.98,
                    "volume": 100384500,
                    "adjclose": 125.99
                },
                "1610461800": {
                    "date": "12-01-2021",
                    "date_utc": 1610461800,
                    "open": 128.5,
                    "high": 129.69,
                    "low": 126.86,
                    "close": 128.8,
                    "volume": 91951100,
                    "adjclose": 125.81
                },
                "1610548200": {
                    "date": "13-01-2021",
                    "date_utc": 1610548200,
                    "open": 128.76,
                    "high": 131.45,
                    "low": 128.49,
                    "close": 130.89,
                    "volume": 88636800,
                    "adjclose": 127.85
                },
                "1610634600": {
                    "date": "14-01-2021",
                    "date_utc": 1610634600,
                    "open": 130.8,
                    "high": 131,
                    "low": 128.76,
                    "close": 128.91,
                    "volume": 90221800,
                    "adjclose": 125.92
                },
                "1610721000": {
                    "date": "15-01-2021",
                    "date_utc": 1610721000,
                    "open": 128.78,
                    "high": 130.22,
                    "low": 127,
                    "close": 127.14,
                    "volume": 111598500,
                    "adjclose": 124.19
                },
                "1611066600": {
                    "date": "19-01-2021",
                    "date_utc": 1611066600,
                    "open": 127.78,
                    "high": 128.71,
                    "low": 126.94,
                    "close": 127.83,
                    "volume": 90757300,
                    "adjclose": 124.86
                },
                "1611153000": {
                    "date": "20-01-2021",
                    "date_utc": 1611153000,
                    "open": 128.66,
                    "high": 132.49,
                    "low": 128.55,
                    "close": 132.03,
                    "volume": 104319500,
                    "adjclose": 128.96
                },
                "1611239400": {
                    "date": "21-01-2021",
                    "date_utc": 1611239400,
                    "open": 133.8,
                    "high": 139.67,
                    "low": 133.59,
                    "close": 136.87,
                    "volume": 120150900,
                    "adjclose": 133.69
                },
                "1611325800": {
                    "date": "22-01-2021",
                    "date_utc": 1611325800,
                    "open": 136.28,
                    "high": 139.85,
                    "low": 135.02,
                    "close": 139.07,
                    "volume": 114459400,
                    "adjclose": 135.84
                },
                "1611585000": {
                    "date": "25-01-2021",
                    "date_utc": 1611585000,
                    "open": 143.07,
                    "high": 145.09,
                    "low": 136.54,
                    "close": 142.92,
                    "volume": 157611700,
                    "adjclose": 139.6
                },
                "1611671400": {
                    "date": "26-01-2021",
                    "date_utc": 1611671400,
                    "open": 143.6,
                    "high": 144.3,
                    "low": 141.37,
                    "close": 143.16,
                    "volume": 98390600,
                    "adjclose": 139.84
                },
                "1611757800": {
                    "date": "27-01-2021",
                    "date_utc": 1611757800,
                    "open": 143.43,
                    "high": 144.3,
                    "low": 140.41,
                    "close": 142.06,
                    "volume": 140843800,
                    "adjclose": 138.76
                },
                "1611844200": {
                    "date": "28-01-2021",
                    "date_utc": 1611844200,
                    "open": 139.52,
                    "high": 141.99,
                    "low": 136.7,
                    "close": 137.09,
                    "volume": 142621100,
                    "adjclose": 133.91
                },
                "1611930600": {
                    "date": "29-01-2021",
                    "date_utc": 1611930600,
                    "open": 135.83,
                    "high": 136.74,
                    "low": 130.21,
                    "close": 131.96,
                    "volume": 177523800,
                    "adjclose": 128.9
                },
                "1612189800": {
                    "date": "01-02-2021",
                    "date_utc": 1612189800,
                    "open": 133.75,
                    "high": 135.38,
                    "low": 130.93,
                    "close": 134.14,
                    "volume": 106239800,
                    "adjclose": 131.03
                },
                "1612276200": {
                    "date": "02-02-2021",
                    "date_utc": 1612276200,
                    "open": 135.73,
                    "high": 136.31,
                    "low": 134.61,
                    "close": 134.99,
                    "volume": 83305400,
                    "adjclose": 131.86
                },
                "1612362600": {
                    "date": "03-02-2021",
                    "date_utc": 1612362600,
                    "open": 135.76,
                    "high": 135.77,
                    "low": 133.61,
                    "close": 133.94,
                    "volume": 89880900,
                    "adjclose": 130.83
                },
                "1612449000": {
                    "date": "04-02-2021",
                    "date_utc": 1612449000,
                    "open": 136.3,
                    "high": 137.4,
                    "low": 134.59,
                    "close": 137.39,
                    "volume": 84183100,
                    "adjclose": 134.2
                },
                "1612535400": {
                    "date": "05-02-2021",
                    "date_utc": 1612535400,
                    "open": 137.35,
                    "high": 137.42,
                    "low": 135.86,
                    "close": 136.76,
                    "volume": 75693800,
                    "adjclose": 133.78
                },
                "1612794600": {
                    "date": "08-02-2021",
                    "date_utc": 1612794600,
                    "open": 136.03,
                    "high": 136.96,
                    "low": 134.92,
                    "close": 136.91,
                    "volume": 71297200,
                    "adjclose": 133.93
                },
                "1612881000": {
                    "date": "09-02-2021",
                    "date_utc": 1612881000,
                    "open": 136.62,
                    "high": 137.88,
                    "low": 135.85,
                    "close": 136.01,
                    "volume": 76774200,
                    "adjclose": 133.05
                },
                "1612967400": {
                    "date": "10-02-2021",
                    "date_utc": 1612967400,
                    "open": 136.48,
                    "high": 136.99,
                    "low": 134.4,
                    "close": 135.39,
                    "volume": 73046600,
                    "adjclose": 132.44
                },
                "1613053800": {
                    "date": "11-02-2021",
                    "date_utc": 1613053800,
                    "open": 135.9,
                    "high": 136.39,
                    "low": 133.77,
                    "close": 135.13,
                    "volume": 64280000,
                    "adjclose": 132.19
                },
                "1613140200": {
                    "date": "12-02-2021",
                    "date_utc": 1613140200,
                    "open": 134.35,
                    "high": 135.53,
                    "low": 133.69,
                    "close": 135.37,
                    "volume": 60145100,
                    "adjclose": 132.42
                },
                "1613485800": {
                    "date": "16-02-2021",
                    "date_utc": 1613485800,
                    "open": 135.49,
                    "high": 136.01,
                    "low": 132.79,
                    "close": 133.19,
                    "volume": 80576300,
                    "adjclose": 130.29
                },
                "1613572200": {
                    "date": "17-02-2021",
                    "date_utc": 1613572200,
                    "open": 131.25,
                    "high": 132.22,
                    "low": 129.47,
                    "close": 130.84,
                    "volume": 97918500,
                    "adjclose": 127.99
                },
                "1613658600": {
                    "date": "18-02-2021",
                    "date_utc": 1613658600,
                    "open": 129.2,
                    "high": 130,
                    "low": 127.41,
                    "close": 129.71,
                    "volume": 96856700,
                    "adjclose": 126.89
                },
                "1613745000": {
                    "date": "19-02-2021",
                    "date_utc": 1613745000,
                    "open": 130.24,
                    "high": 130.71,
                    "low": 128.8,
                    "close": 129.87,
                    "volume": 87668800,
                    "adjclose": 127.04
                },
                "1614004200": {
                    "date": "22-02-2021",
                    "date_utc": 1614004200,
                    "open": 128.01,
                    "high": 129.72,
                    "low": 125.6,
                    "close": 126,
                    "volume": 103916400,
                    "adjclose": 123.26
                },
                "1614090600": {
                    "date": "23-02-2021",
                    "date_utc": 1614090600,
                    "open": 123.76,
                    "high": 126.71,
                    "low": 118.39,
                    "close": 125.86,
                    "volume": 158273000,
                    "adjclose": 123.12
                },
                "1614177000": {
                    "date": "24-02-2021",
                    "date_utc": 1614177000,
                    "open": 124.94,
                    "high": 125.56,
                    "low": 122.23,
                    "close": 125.35,
                    "volume": 111039900,
                    "adjclose": 122.62
                },
                "1614263400": {
                    "date": "25-02-2021",
                    "date_utc": 1614263400,
                    "open": 124.68,
                    "high": 126.46,
                    "low": 120.54,
                    "close": 120.99,
                    "volume": 148199500,
                    "adjclose": 118.36
                },
                "1614349800": {
                    "date": "26-02-2021",
                    "date_utc": 1614349800,
                    "open": 122.59,
                    "high": 124.85,
                    "low": 121.2,
                    "close": 121.26,
                    "volume": 164560400,
                    "adjclose": 118.62
                },
                "1614609000": {
                    "date": "01-03-2021",
                    "date_utc": 1614609000,
                    "open": 123.75,
                    "high": 127.93,
                    "low": 122.79,
                    "close": 127.79,
                    "volume": 116307900,
                    "adjclose": 125.01
                },
                "1614695400": {
                    "date": "02-03-2021",
                    "date_utc": 1614695400,
                    "open": 128.41,
                    "high": 128.72,
                    "low": 125.01,
                    "close": 125.12,
                    "volume": 102260900,
                    "adjclose": 122.4
                },
                "1614781800": {
                    "date": "03-03-2021",
                    "date_utc": 1614781800,
                    "open": 124.81,
                    "high": 125.71,
                    "low": 121.84,
                    "close": 122.06,
                    "volume": 112966300,
                    "adjclose": 119.4
                },
                "1614868200": {
                    "date": "04-03-2021",
                    "date_utc": 1614868200,
                    "open": 121.75,
                    "high": 123.6,
                    "low": 118.62,
                    "close": 120.13,
                    "volume": 178155000,
                    "adjclose": 117.52
                },
                "1614954600": {
                    "date": "05-03-2021",
                    "date_utc": 1614954600,
                    "open": 120.98,
                    "high": 121.94,
                    "low": 117.57,
                    "close": 121.42,
                    "volume": 153766600,
                    "adjclose": 118.78
                },
                "1615213800": {
                    "date": "08-03-2021",
                    "date_utc": 1615213800,
                    "open": 120.93,
                    "high": 121,
                    "low": 116.21,
                    "close": 116.36,
                    "volume": 154376600,
                    "adjclose": 113.83
                },
                "1615300200": {
                    "date": "09-03-2021",
                    "date_utc": 1615300200,
                    "open": 119.03,
                    "high": 122.06,
                    "low": 118.79,
                    "close": 121.09,
                    "volume": 129525800,
                    "adjclose": 118.46
                },
                "1615386600": {
                    "date": "10-03-2021",
                    "date_utc": 1615386600,
                    "open": 121.69,
                    "high": 122.17,
                    "low": 119.45,
                    "close": 119.98,
                    "volume": 111943300,
                    "adjclose": 117.37
                },
                "1615473000": {
                    "date": "11-03-2021",
                    "date_utc": 1615473000,
                    "open": 122.54,
                    "high": 123.21,
                    "low": 121.26,
                    "close": 121.96,
                    "volume": 103026500,
                    "adjclose": 119.31
                },
                "1615559400": {
                    "date": "12-03-2021",
                    "date_utc": 1615559400,
                    "open": 120.4,
                    "high": 121.17,
                    "low": 119.16,
                    "close": 121.03,
                    "volume": 88105100,
                    "adjclose": 118.4
                },
                "1615815000": {
                    "date": "15-03-2021",
                    "date_utc": 1615815000,
                    "open": 121.41,
                    "high": 124,
                    "low": 120.42,
                    "close": 123.99,
                    "volume": 92403800,
                    "adjclose": 121.29
                },
                "1615901400": {
                    "date": "16-03-2021",
                    "date_utc": 1615901400,
                    "open": 125.7,
                    "high": 127.22,
                    "low": 124.72,
                    "close": 125.57,
                    "volume": 115227900,
                    "adjclose": 122.84
                },
                "1615987800": {
                    "date": "17-03-2021",
                    "date_utc": 1615987800,
                    "open": 124.05,
                    "high": 125.86,
                    "low": 122.34,
                    "close": 124.76,
                    "volume": 111932600,
                    "adjclose": 122.05
                },
                "1616074200": {
                    "date": "18-03-2021",
                    "date_utc": 1616074200,
                    "open": 122.88,
                    "high": 123.18,
                    "low": 120.32,
                    "close": 120.53,
                    "volume": 121229700,
                    "adjclose": 117.91
                },
                "1616160600": {
                    "date": "19-03-2021",
                    "date_utc": 1616160600,
                    "open": 119.9,
                    "high": 121.43,
                    "low": 119.68,
                    "close": 119.99,
                    "volume": 185549500,
                    "adjclose": 117.38
                },
                "1616419800": {
                    "date": "22-03-2021",
                    "date_utc": 1616419800,
                    "open": 120.33,
                    "high": 123.87,
                    "low": 120.26,
                    "close": 123.39,
                    "volume": 111912300,
                    "adjclose": 120.71
                },
                "1616506200": {
                    "date": "23-03-2021",
                    "date_utc": 1616506200,
                    "open": 123.33,
                    "high": 124.24,
                    "low": 122.14,
                    "close": 122.54,
                    "volume": 95467100,
                    "adjclose": 119.87
                },
                "1616592600": {
                    "date": "24-03-2021",
                    "date_utc": 1616592600,
                    "open": 122.82,
                    "high": 122.9,
                    "low": 120.07,
                    "close": 120.09,
                    "volume": 88530500,
                    "adjclose": 117.48
                },
                "1616679000": {
                    "date": "25-03-2021",
                    "date_utc": 1616679000,
                    "open": 119.54,
                    "high": 121.66,
                    "low": 119,
                    "close": 120.59,
                    "volume": 98844700,
                    "adjclose": 117.97
                },
                "1616765400": {
                    "date": "26-03-2021",
                    "date_utc": 1616765400,
                    "open": 120.35,
                    "high": 121.48,
                    "low": 118.92,
                    "close": 121.21,
                    "volume": 94071200,
                    "adjclose": 118.57
                },
                "1617024600": {
                    "date": "29-03-2021",
                    "date_utc": 1617024600,
                    "open": 121.65,
                    "high": 122.58,
                    "low": 120.73,
                    "close": 121.39,
                    "volume": 80819200,
                    "adjclose": 118.75
                },
                "1617111000": {
                    "date": "30-03-2021",
                    "date_utc": 1617111000,
                    "open": 120.11,
                    "high": 120.4,
                    "low": 118.86,
                    "close": 119.9,
                    "volume": 85671900,
                    "adjclose": 117.29
                },
                "1617197400": {
                    "date": "31-03-2021",
                    "date_utc": 1617197400,
                    "open": 121.65,
                    "high": 123.52,
                    "low": 121.15,
                    "close": 122.15,
                    "volume": 118323800,
                    "adjclose": 119.49
                },
                "1617283800": {
                    "date": "01-04-2021",
                    "date_utc": 1617283800,
                    "open": 123.66,
                    "high": 124.18,
                    "low": 122.49,
                    "close": 123,
                    "volume": 75089100,
                    "adjclose": 120.32
                },
                "1617629400": {
                    "date": "05-04-2021",
                    "date_utc": 1617629400,
                    "open": 123.87,
                    "high": 126.16,
                    "low": 123.07,
                    "close": 125.9,
                    "volume": 88651200,
                    "adjclose": 123.16
                },
                "1617715800": {
                    "date": "06-04-2021",
                    "date_utc": 1617715800,
                    "open": 126.5,
                    "high": 127.13,
                    "low": 125.65,
                    "close": 126.21,
                    "volume": 80171300,
                    "adjclose": 123.46
                },
                "1617802200": {
                    "date": "07-04-2021",
                    "date_utc": 1617802200,
                    "open": 125.83,
                    "high": 127.92,
                    "low": 125.14,
                    "close": 127.9,
                    "volume": 83466700,
                    "adjclose": 125.12
                },
                "1617888600": {
                    "date": "08-04-2021",
                    "date_utc": 1617888600,
                    "open": 128.95,
                    "high": 130.39,
                    "low": 128.52,
                    "close": 130.36,
                    "volume": 88844600,
                    "adjclose": 127.52
                },
                "1617975000": {
                    "date": "09-04-2021",
                    "date_utc": 1617975000,
                    "open": 129.8,
                    "high": 133.04,
                    "low": 129.47,
                    "close": 133,
                    "volume": 106686700,
                    "adjclose": 130.11
                },
                "1618234200": {
                    "date": "12-04-2021",
                    "date_utc": 1618234200,
                    "open": 132.52,
                    "high": 132.85,
                    "low": 130.63,
                    "close": 131.24,
                    "volume": 91420000,
                    "adjclose": 128.38
                },
                "1618320600": {
                    "date": "13-04-2021",
                    "date_utc": 1618320600,
                    "open": 132.44,
                    "high": 134.66,
                    "low": 131.93,
                    "close": 134.43,
                    "volume": 91266500,
                    "adjclose": 131.5
                },
                "1618407000": {
                    "date": "14-04-2021",
                    "date_utc": 1618407000,
                    "open": 134.94,
                    "high": 135,
                    "low": 131.66,
                    "close": 132.03,
                    "volume": 87222800,
                    "adjclose": 129.16
                },
                "1618493400": {
                    "date": "15-04-2021",
                    "date_utc": 1618493400,
                    "open": 133.82,
                    "high": 135,
                    "low": 133.64,
                    "close": 134.5,
                    "volume": 89347100,
                    "adjclose": 131.57
                },
                "1618579800": {
                    "date": "16-04-2021",
                    "date_utc": 1618579800,
                    "open": 134.3,
                    "high": 134.67,
                    "low": 133.28,
                    "close": 134.16,
                    "volume": 84922400,
                    "adjclose": 131.24
                },
                "1618839000": {
                    "date": "19-04-2021",
                    "date_utc": 1618839000,
                    "open": 133.51,
                    "high": 135.47,
                    "low": 133.34,
                    "close": 134.84,
                    "volume": 94264200,
                    "adjclose": 131.91
                },
                "1618925400": {
                    "date": "20-04-2021",
                    "date_utc": 1618925400,
                    "open": 135.02,
                    "high": 135.53,
                    "low": 131.81,
                    "close": 133.11,
                    "volume": 94812300,
                    "adjclose": 130.21
                },
                "1619011800": {
                    "date": "21-04-2021",
                    "date_utc": 1619011800,
                    "open": 132.36,
                    "high": 133.75,
                    "low": 131.3,
                    "close": 133.5,
                    "volume": 68847100,
                    "adjclose": 130.6
                },
                "1619098200": {
                    "date": "22-04-2021",
                    "date_utc": 1619098200,
                    "open": 133.04,
                    "high": 134.15,
                    "low": 131.41,
                    "close": 131.94,
                    "volume": 84566500,
                    "adjclose": 129.07
                },
                "1619184600": {
                    "date": "23-04-2021",
                    "date_utc": 1619184600,
                    "open": 132.16,
                    "high": 135.12,
                    "low": 132.16,
                    "close": 134.32,
                    "volume": 78657500,
                    "adjclose": 131.4
                },
                "1619443800": {
                    "date": "26-04-2021",
                    "date_utc": 1619443800,
                    "open": 134.83,
                    "high": 135.06,
                    "low": 133.56,
                    "close": 134.72,
                    "volume": 66905100,
                    "adjclose": 131.79
                },
                "1619530200": {
                    "date": "27-04-2021",
                    "date_utc": 1619530200,
                    "open": 135.01,
                    "high": 135.41,
                    "low": 134.11,
                    "close": 134.39,
                    "volume": 66015800,
                    "adjclose": 131.47
                },
                "1619616600": {
                    "date": "28-04-2021",
                    "date_utc": 1619616600,
                    "open": 134.31,
                    "high": 135.02,
                    "low": 133.08,
                    "close": 133.58,
                    "volume": 107760100,
                    "adjclose": 130.67
                },
                "1619703000": {
                    "date": "29-04-2021",
                    "date_utc": 1619703000,
                    "open": 136.47,
                    "high": 137.07,
                    "low": 132.45,
                    "close": 133.48,
                    "volume": 151101000,
                    "adjclose": 130.58
                },
                "1619789400": {
                    "date": "30-04-2021",
                    "date_utc": 1619789400,
                    "open": 131.78,
                    "high": 133.56,
                    "low": 131.07,
                    "close": 131.46,
                    "volume": 109839500,
                    "adjclose": 128.6
                },
                "1620048600": {
                    "date": "03-05-2021",
                    "date_utc": 1620048600,
                    "open": 132.04,
                    "high": 134.07,
                    "low": 131.83,
                    "close": 132.54,
                    "volume": 75135100,
                    "adjclose": 129.66
                },
                "1620135000": {
                    "date": "04-05-2021",
                    "date_utc": 1620135000,
                    "open": 131.19,
                    "high": 131.49,
                    "low": 126.7,
                    "close": 127.85,
                    "volume": 137564700,
                    "adjclose": 125.07
                },
                "1620221400": {
                    "date": "05-05-2021",
                    "date_utc": 1620221400,
                    "open": 129.2,
                    "high": 130.45,
                    "low": 127.97,
                    "close": 128.1,
                    "volume": 84000900,
                    "adjclose": 125.31
                },
                "1620307800": {
                    "date": "06-05-2021",
                    "date_utc": 1620307800,
                    "open": 127.89,
                    "high": 129.75,
                    "low": 127.13,
                    "close": 129.74,
                    "volume": 78128300,
                    "adjclose": 126.92
                },
                "1620394200": {
                    "date": "07-05-2021",
                    "date_utc": 1620394200,
                    "open": 130.85,
                    "high": 131.26,
                    "low": 129.48,
                    "close": 130.21,
                    "volume": 78973300,
                    "adjclose": 127.59
                },
                "1620653400": {
                    "date": "10-05-2021",
                    "date_utc": 1620653400,
                    "open": 129.41,
                    "high": 129.54,
                    "low": 126.81,
                    "close": 126.85,
                    "volume": 88071200,
                    "adjclose": 124.3
                },
                "1620739800": {
                    "date": "11-05-2021",
                    "date_utc": 1620739800,
                    "open": 123.5,
                    "high": 126.27,
                    "low": 122.77,
                    "close": 125.91,
                    "volume": 126142800,
                    "adjclose": 123.38
                },
                "1620826200": {
                    "date": "12-05-2021",
                    "date_utc": 1620826200,
                    "open": 123.4,
                    "high": 124.64,
                    "low": 122.25,
                    "close": 122.77,
                    "volume": 112172300,
                    "adjclose": 120.3
                },
                "1620912600": {
                    "date": "13-05-2021",
                    "date_utc": 1620912600,
                    "open": 124.58,
                    "high": 126.15,
                    "low": 124.26,
                    "close": 124.97,
                    "volume": 105861300,
                    "adjclose": 122.46
                },
                "1620999000": {
                    "date": "14-05-2021",
                    "date_utc": 1620999000,
                    "open": 126.25,
                    "high": 127.89,
                    "low": 125.85,
                    "close": 127.45,
                    "volume": 81918000,
                    "adjclose": 124.89
                },
                "1621258200": {
                    "date": "17-05-2021",
                    "date_utc": 1621258200,
                    "open": 126.82,
                    "high": 126.93,
                    "low": 125.17,
                    "close": 126.27,
                    "volume": 74244600,
                    "adjclose": 123.73
                },
                "1621344600": {
                    "date": "18-05-2021",
                    "date_utc": 1621344600,
                    "open": 126.56,
                    "high": 126.99,
                    "low": 124.78,
                    "close": 124.85,
                    "volume": 63342900,
                    "adjclose": 122.34
                },
                "1621431000": {
                    "date": "19-05-2021",
                    "date_utc": 1621431000,
                    "open": 123.16,
                    "high": 124.92,
                    "low": 122.86,
                    "close": 124.69,
                    "volume": 92612000,
                    "adjclose": 122.18
                },
                "1621517400": {
                    "date": "20-05-2021",
                    "date_utc": 1621517400,
                    "open": 125.23,
                    "high": 127.72,
                    "low": 125.1,
                    "close": 127.31,
                    "volume": 76857100,
                    "adjclose": 124.75
                },
                "1621603800": {
                    "date": "21-05-2021",
                    "date_utc": 1621603800,
                    "open": 127.82,
                    "high": 128,
                    "low": 125.21,
                    "close": 125.43,
                    "volume": 79295400,
                    "adjclose": 122.91
                },
                "1621863000": {
                    "date": "24-05-2021",
                    "date_utc": 1621863000,
                    "open": 126.01,
                    "high": 127.94,
                    "low": 125.94,
                    "close": 127.1,
                    "volume": 63092900,
                    "adjclose": 124.55
                },
                "1621949400": {
                    "date": "25-05-2021",
                    "date_utc": 1621949400,
                    "open": 127.82,
                    "high": 128.32,
                    "low": 126.32,
                    "close": 126.9,
                    "volume": 72009500,
                    "adjclose": 124.35
                },
                "1622035800": {
                    "date": "26-05-2021",
                    "date_utc": 1622035800,
                    "open": 126.96,
                    "high": 127.39,
                    "low": 126.42,
                    "close": 126.85,
                    "volume": 56575900,
                    "adjclose": 124.3
                },
                "1622122200": {
                    "date": "27-05-2021",
                    "date_utc": 1622122200,
                    "open": 126.44,
                    "high": 127.64,
                    "low": 125.08,
                    "close": 125.28,
                    "volume": 94625600,
                    "adjclose": 122.76
                },
                "1622208600": {
                    "date": "28-05-2021",
                    "date_utc": 1622208600,
                    "open": 125.57,
                    "high": 125.8,
                    "low": 124.55,
                    "close": 124.61,
                    "volume": 71311100,
                    "adjclose": 122.11
                },
                "1622554200": {
                    "date": "01-06-2021",
                    "date_utc": 1622554200,
                    "open": 125.08,
                    "high": 125.35,
                    "low": 123.94,
                    "close": 124.28,
                    "volume": 67637100,
                    "adjclose": 121.78
                },
                "1622640600": {
                    "date": "02-06-2021",
                    "date_utc": 1622640600,
                    "open": 124.28,
                    "high": 125.24,
                    "low": 124.05,
                    "close": 125.06,
                    "volume": 59278900,
                    "adjclose": 122.55
                },
                "1622727000": {
                    "date": "03-06-2021",
                    "date_utc": 1622727000,
                    "open": 124.68,
                    "high": 124.85,
                    "low": 123.13,
                    "close": 123.54,
                    "volume": 76229200,
                    "adjclose": 121.06
                },
                "1622813400": {
                    "date": "04-06-2021",
                    "date_utc": 1622813400,
                    "open": 124.07,
                    "high": 126.16,
                    "low": 123.85,
                    "close": 125.89,
                    "volume": 75169300,
                    "adjclose": 123.36
                },
                "1623072600": {
                    "date": "07-06-2021",
                    "date_utc": 1623072600,
                    "open": 126.17,
                    "high": 126.32,
                    "low": 124.83,
                    "close": 125.9,
                    "volume": 71057600,
                    "adjclose": 123.37
                },
                "1623159000": {
                    "date": "08-06-2021",
                    "date_utc": 1623159000,
                    "open": 126.6,
                    "high": 128.46,
                    "low": 126.21,
                    "close": 126.74,
                    "volume": 74403800,
                    "adjclose": 124.19
                },
                "1623245400": {
                    "date": "09-06-2021",
                    "date_utc": 1623245400,
                    "open": 127.21,
                    "high": 127.75,
                    "low": 126.52,
                    "close": 127.13,
                    "volume": 56877900,
                    "adjclose": 124.57
                },
                "1623331800": {
                    "date": "10-06-2021",
                    "date_utc": 1623331800,
                    "open": 127.02,
                    "high": 128.19,
                    "low": 125.94,
                    "close": 126.11,
                    "volume": 71186400,
                    "adjclose": 123.58
                },
                "1623418200": {
                    "date": "11-06-2021",
                    "date_utc": 1623418200,
                    "open": 126.53,
                    "high": 127.44,
                    "low": 126.1,
                    "close": 127.35,
                    "volume": 53522400,
                    "adjclose": 124.79
                },
                "1623677400": {
                    "date": "14-06-2021",
                    "date_utc": 1623677400,
                    "open": 127.82,
                    "high": 130.54,
                    "low": 127.07,
                    "close": 130.48,
                    "volume": 96906500,
                    "adjclose": 127.86
                },
                "1623763800": {
                    "date": "15-06-2021",
                    "date_utc": 1623763800,
                    "open": 129.94,
                    "high": 130.6,
                    "low": 129.39,
                    "close": 129.64,
                    "volume": 62746300,
                    "adjclose": 127.03
                },
                "1623850200": {
                    "date": "16-06-2021",
                    "date_utc": 1623850200,
                    "open": 130.37,
                    "high": 130.89,
                    "low": 128.46,
                    "close": 130.15,
                    "volume": 91815000,
                    "adjclose": 127.53
                },
                "1623936600": {
                    "date": "17-06-2021",
                    "date_utc": 1623936600,
                    "open": 129.8,
                    "high": 132.55,
                    "low": 129.65,
                    "close": 131.79,
                    "volume": 96721700,
                    "adjclose": 129.14
                },
                "1624023000": {
                    "date": "18-06-2021",
                    "date_utc": 1624023000,
                    "open": 130.71,
                    "high": 131.51,
                    "low": 130.24,
                    "close": 130.46,
                    "volume": 108953300,
                    "adjclose": 127.84
                },
                "1624282200": {
                    "date": "21-06-2021",
                    "date_utc": 1624282200,
                    "open": 130.3,
                    "high": 132.41,
                    "low": 129.21,
                    "close": 132.3,
                    "volume": 79663300,
                    "adjclose": 129.64
                },
                "1624368600": {
                    "date": "22-06-2021",
                    "date_utc": 1624368600,
                    "open": 132.13,
                    "high": 134.08,
                    "low": 131.62,
                    "close": 133.98,
                    "volume": 74783600,
                    "adjclose": 131.29
                },
                "1624455000": {
                    "date": "23-06-2021",
                    "date_utc": 1624455000,
                    "open": 133.77,
                    "high": 134.32,
                    "low": 133.23,
                    "close": 133.7,
                    "volume": 60214200,
                    "adjclose": 131.01
                },
                "1624541400": {
                    "date": "24-06-2021",
                    "date_utc": 1624541400,
                    "open": 134.45,
                    "high": 134.64,
                    "low": 132.93,
                    "close": 133.41,
                    "volume": 68711000,
                    "adjclose": 130.73
                },
                "1624627800": {
                    "date": "25-06-2021",
                    "date_utc": 1624627800,
                    "open": 133.46,
                    "high": 133.89,
                    "low": 132.81,
                    "close": 133.11,
                    "volume": 70783700,
                    "adjclose": 130.43
                },
                "1624887000": {
                    "date": "28-06-2021",
                    "date_utc": 1624887000,
                    "open": 133.41,
                    "high": 135.25,
                    "low": 133.35,
                    "close": 134.78,
                    "volume": 62111300,
                    "adjclose": 132.07
                },
                "1624973400": {
                    "date": "29-06-2021",
                    "date_utc": 1624973400,
                    "open": 134.8,
                    "high": 136.49,
                    "low": 134.35,
                    "close": 136.33,
                    "volume": 64556100,
                    "adjclose": 133.59
                },
                "1625059800": {
                    "date": "30-06-2021",
                    "date_utc": 1625059800,
                    "open": 136.17,
                    "high": 137.41,
                    "low": 135.87,
                    "close": 136.96,
                    "volume": 63261400,
                    "adjclose": 134.21
                },
                "1625146200": {
                    "date": "01-07-2021",
                    "date_utc": 1625146200,
                    "open": 136.6,
                    "high": 137.33,
                    "low": 135.76,
                    "close": 137.27,
                    "volume": 52485800,
                    "adjclose": 134.51
                },
                "1625232600": {
                    "date": "02-07-2021",
                    "date_utc": 1625232600,
                    "open": 137.9,
                    "high": 140,
                    "low": 137.75,
                    "close": 139.96,
                    "volume": 78852600,
                    "adjclose": 137.15
                },
                "1625578200": {
                    "date": "06-07-2021",
                    "date_utc": 1625578200,
                    "open": 140.07,
                    "high": 143.15,
                    "low": 140.07,
                    "close": 142.02,
                    "volume": 108181800,
                    "adjclose": 139.17
                },
                "1625664600": {
                    "date": "07-07-2021",
                    "date_utc": 1625664600,
                    "open": 143.54,
                    "high": 144.89,
                    "low": 142.66,
                    "close": 144.57,
                    "volume": 104911600,
                    "adjclose": 141.66
                },
                "1625751000": {
                    "date": "08-07-2021",
                    "date_utc": 1625751000,
                    "open": 141.58,
                    "high": 144.06,
                    "low": 140.67,
                    "close": 143.24,
                    "volume": 105575500,
                    "adjclose": 140.36
                },
                "1625837400": {
                    "date": "09-07-2021",
                    "date_utc": 1625837400,
                    "open": 142.75,
                    "high": 145.65,
                    "low": 142.65,
                    "close": 145.11,
                    "volume": 99890800,
                    "adjclose": 142.19
                },
                "1626096600": {
                    "date": "12-07-2021",
                    "date_utc": 1626096600,
                    "open": 146.21,
                    "high": 146.32,
                    "low": 144,
                    "close": 144.5,
                    "volume": 76299700,
                    "adjclose": 141.6
                },
                "1626183000": {
                    "date": "13-07-2021",
                    "date_utc": 1626183000,
                    "open": 144.03,
                    "high": 147.46,
                    "low": 143.63,
                    "close": 145.64,
                    "volume": 100827100,
                    "adjclose": 142.71
                },
                "1626269400": {
                    "date": "14-07-2021",
                    "date_utc": 1626269400,
                    "open": 148.1,
                    "high": 149.57,
                    "low": 147.68,
                    "close": 149.15,
                    "volume": 127050800,
                    "adjclose": 146.15
                },
                "1626355800": {
                    "date": "15-07-2021",
                    "date_utc": 1626355800,
                    "open": 149.24,
                    "high": 150,
                    "low": 147.09,
                    "close": 148.48,
                    "volume": 106820300,
                    "adjclose": 145.5
                },
                "1626442200": {
                    "date": "16-07-2021",
                    "date_utc": 1626442200,
                    "open": 148.46,
                    "high": 149.76,
                    "low": 145.88,
                    "close": 146.39,
                    "volume": 93251400,
                    "adjclose": 143.45
                },
                "1626701400": {
                    "date": "19-07-2021",
                    "date_utc": 1626701400,
                    "open": 143.75,
                    "high": 144.07,
                    "low": 141.67,
                    "close": 142.45,
                    "volume": 121434600,
                    "adjclose": 139.59
                },
                "1626787800": {
                    "date": "20-07-2021",
                    "date_utc": 1626787800,
                    "open": 143.46,
                    "high": 147.1,
                    "low": 142.96,
                    "close": 146.15,
                    "volume": 96350000,
                    "adjclose": 143.21
                },
                "1626874200": {
                    "date": "21-07-2021",
                    "date_utc": 1626874200,
                    "open": 145.53,
                    "high": 146.13,
                    "low": 144.63,
                    "close": 145.4,
                    "volume": 74993500,
                    "adjclose": 142.48
                },
                "1626960600": {
                    "date": "22-07-2021",
                    "date_utc": 1626960600,
                    "open": 145.94,
                    "high": 148.2,
                    "low": 145.81,
                    "close": 146.8,
                    "volume": 77338200,
                    "adjclose": 143.85
                },
                "1627047000": {
                    "date": "23-07-2021",
                    "date_utc": 1627047000,
                    "open": 147.55,
                    "high": 148.72,
                    "low": 146.92,
                    "close": 148.56,
                    "volume": 71447400,
                    "adjclose": 145.57
                },
                "1627306200": {
                    "date": "26-07-2021",
                    "date_utc": 1627306200,
                    "open": 148.27,
                    "high": 149.83,
                    "low": 147.7,
                    "close": 148.99,
                    "volume": 72434100,
                    "adjclose": 146
                },
                "1627392600": {
                    "date": "27-07-2021",
                    "date_utc": 1627392600,
                    "open": 149.12,
                    "high": 149.21,
                    "low": 145.55,
                    "close": 146.77,
                    "volume": 104818600,
                    "adjclose": 143.82
                },
                "1627479000": {
                    "date": "28-07-2021",
                    "date_utc": 1627479000,
                    "open": 144.81,
                    "high": 146.97,
                    "low": 142.54,
                    "close": 144.98,
                    "volume": 118931200,
                    "adjclose": 142.07
                },
                "1627565400": {
                    "date": "29-07-2021",
                    "date_utc": 1627565400,
                    "open": 144.69,
                    "high": 146.55,
                    "low": 144.58,
                    "close": 145.64,
                    "volume": 56699500,
                    "adjclose": 142.71
                },
                "1627651800": {
                    "date": "30-07-2021",
                    "date_utc": 1627651800,
                    "open": 144.38,
                    "high": 146.33,
                    "low": 144.11,
                    "close": 145.86,
                    "volume": 70440600,
                    "adjclose": 142.93
                },
                "1627911000": {
                    "date": "02-08-2021",
                    "date_utc": 1627911000,
                    "open": 146.36,
                    "high": 146.95,
                    "low": 145.25,
                    "close": 145.52,
                    "volume": 62880000,
                    "adjclose": 142.6
                },
                "1627997400": {
                    "date": "03-08-2021",
                    "date_utc": 1627997400,
                    "open": 145.81,
                    "high": 148.04,
                    "low": 145.18,
                    "close": 147.36,
                    "volume": 64786600,
                    "adjclose": 144.4
                },
                "1628083800": {
                    "date": "04-08-2021",
                    "date_utc": 1628083800,
                    "open": 147.27,
                    "high": 147.79,
                    "low": 146.28,
                    "close": 146.95,
                    "volume": 56368300,
                    "adjclose": 144
                },
                "1628170200": {
                    "date": "05-08-2021",
                    "date_utc": 1628170200,
                    "open": 146.98,
                    "high": 147.84,
                    "low": 146.17,
                    "close": 147.06,
                    "volume": 46397700,
                    "adjclose": 144.1
                },
                "1628256600": {
                    "date": "06-08-2021",
                    "date_utc": 1628256600,
                    "open": 146.35,
                    "high": 147.11,
                    "low": 145.63,
                    "close": 146.14,
                    "volume": 54126800,
                    "adjclose": 143.42
                },
                "1628515800": {
                    "date": "09-08-2021",
                    "date_utc": 1628515800,
                    "open": 146.2,
                    "high": 146.7,
                    "low": 145.52,
                    "close": 146.09,
                    "volume": 48908700,
                    "adjclose": 143.37
                },
                "1628602200": {
                    "date": "10-08-2021",
                    "date_utc": 1628602200,
                    "open": 146.44,
                    "high": 147.71,
                    "low": 145.3,
                    "close": 145.6,
                    "volume": 69023100,
                    "adjclose": 142.89
                },
                "1628688600": {
                    "date": "11-08-2021",
                    "date_utc": 1628688600,
                    "open": 146.05,
                    "high": 146.72,
                    "low": 145.53,
                    "close": 145.86,
                    "volume": 48493500,
                    "adjclose": 143.14
                },
                "1628775000": {
                    "date": "12-08-2021",
                    "date_utc": 1628775000,
                    "open": 146.19,
                    "high": 149.05,
                    "low": 145.84,
                    "close": 148.89,
                    "volume": 72282600,
                    "adjclose": 146.12
                },
                "1628861400": {
                    "date": "13-08-2021",
                    "date_utc": 1628861400,
                    "open": 148.97,
                    "high": 149.44,
                    "low": 148.27,
                    "close": 149.1,
                    "volume": 59375000,
                    "adjclose": 146.32
                },
                "1629120600": {
                    "date": "16-08-2021",
                    "date_utc": 1629120600,
                    "open": 148.54,
                    "high": 151.19,
                    "low": 146.47,
                    "close": 151.12,
                    "volume": 103296000,
                    "adjclose": 148.3
                },
                "1629207000": {
                    "date": "17-08-2021",
                    "date_utc": 1629207000,
                    "open": 150.23,
                    "high": 151.68,
                    "low": 149.09,
                    "close": 150.19,
                    "volume": 92229700,
                    "adjclose": 147.39
                },
                "1629293400": {
                    "date": "18-08-2021",
                    "date_utc": 1629293400,
                    "open": 149.8,
                    "high": 150.72,
                    "low": 146.15,
                    "close": 146.36,
                    "volume": 86326000,
                    "adjclose": 143.63
                },
                "1629379800": {
                    "date": "19-08-2021",
                    "date_utc": 1629379800,
                    "open": 145.03,
                    "high": 148,
                    "low": 144.5,
                    "close": 146.7,
                    "volume": 86960300,
                    "adjclose": 143.97
                },
                "1629466200": {
                    "date": "20-08-2021",
                    "date_utc": 1629466200,
                    "open": 147.44,
                    "high": 148.5,
                    "low": 146.78,
                    "close": 148.19,
                    "volume": 60549600,
                    "adjclose": 145.43
                },
                "1629725400": {
                    "date": "23-08-2021",
                    "date_utc": 1629725400,
                    "open": 148.31,
                    "high": 150.19,
                    "low": 147.89,
                    "close": 149.71,
                    "volume": 60131800,
                    "adjclose": 146.92
                },
                "1629811800": {
                    "date": "24-08-2021",
                    "date_utc": 1629811800,
                    "open": 149.45,
                    "high": 150.86,
                    "low": 149.15,
                    "close": 149.62,
                    "volume": 48606400,
                    "adjclose": 146.83
                },
                "1629898200": {
                    "date": "25-08-2021",
                    "date_utc": 1629898200,
                    "open": 149.81,
                    "high": 150.32,
                    "low": 147.8,
                    "close": 148.36,
                    "volume": 58991300,
                    "adjclose": 145.6
                },
                "1629984600": {
                    "date": "26-08-2021",
                    "date_utc": 1629984600,
                    "open": 148.35,
                    "high": 149.12,
                    "low": 147.51,
                    "close": 147.54,
                    "volume": 48597200,
                    "adjclose": 144.79
                },
                "1630071000": {
                    "date": "27-08-2021",
                    "date_utc": 1630071000,
                    "open": 147.48,
                    "high": 148.75,
                    "low": 146.83,
                    "close": 148.6,
                    "volume": 55802400,
                    "adjclose": 145.83
                },
                "1630330200": {
                    "date": "30-08-2021",
                    "date_utc": 1630330200,
                    "open": 149,
                    "high": 153.49,
                    "low": 148.61,
                    "close": 153.12,
                    "volume": 90956700,
                    "adjclose": 150.27
                },
                "1630416600": {
                    "date": "31-08-2021",
                    "date_utc": 1630416600,
                    "open": 152.66,
                    "high": 152.8,
                    "low": 151.29,
                    "close": 151.83,
                    "volume": 86453100,
                    "adjclose": 149
                },
                "1630503000": {
                    "date": "01-09-2021",
                    "date_utc": 1630503000,
                    "open": 152.83,
                    "high": 154.98,
                    "low": 152.34,
                    "close": 152.51,
                    "volume": 80313700,
                    "adjclose": 149.67
                },
                "1630589400": {
                    "date": "02-09-2021",
                    "date_utc": 1630589400,
                    "open": 153.87,
                    "high": 154.72,
                    "low": 152.4,
                    "close": 153.65,
                    "volume": 71115500,
                    "adjclose": 150.79
                },
                "1630675800": {
                    "date": "03-09-2021",
                    "date_utc": 1630675800,
                    "open": 153.76,
                    "high": 154.63,
                    "low": 153.09,
                    "close": 154.3,
                    "volume": 57808700,
                    "adjclose": 151.43
                },
                "1631021400": {
                    "date": "07-09-2021",
                    "date_utc": 1631021400,
                    "open": 154.97,
                    "high": 157.26,
                    "low": 154.39,
                    "close": 156.69,
                    "volume": 82278300,
                    "adjclose": 153.77
                },
                "1631107800": {
                    "date": "08-09-2021",
                    "date_utc": 1631107800,
                    "open": 156.98,
                    "high": 157.04,
                    "low": 153.98,
                    "close": 155.11,
                    "volume": 74420200,
                    "adjclose": 152.22
                },
                "1631194200": {
                    "date": "09-09-2021",
                    "date_utc": 1631194200,
                    "open": 155.49,
                    "high": 156.11,
                    "low": 153.95,
                    "close": 154.07,
                    "volume": 57305700,
                    "adjclose": 151.2
                },
                "1631280600": {
                    "date": "10-09-2021",
                    "date_utc": 1631280600,
                    "open": 155,
                    "high": 155.48,
                    "low": 148.7,
                    "close": 148.97,
                    "volume": 140893200,
                    "adjclose": 146.19
                },
                "1631539800": {
                    "date": "13-09-2021",
                    "date_utc": 1631539800,
                    "open": 150.63,
                    "high": 151.42,
                    "low": 148.75,
                    "close": 149.55,
                    "volume": 102404300,
                    "adjclose": 146.76
                },
                "1631626200": {
                    "date": "14-09-2021",
                    "date_utc": 1631626200,
                    "open": 150.35,
                    "high": 151.07,
                    "low": 146.91,
                    "close": 148.12,
                    "volume": 109296300,
                    "adjclose": 145.36
                },
                "1631712600": {
                    "date": "15-09-2021",
                    "date_utc": 1631712600,
                    "open": 148.56,
                    "high": 149.44,
                    "low": 146.37,
                    "close": 149.03,
                    "volume": 83281300,
                    "adjclose": 146.25
                },
                "1631799000": {
                    "date": "16-09-2021",
                    "date_utc": 1631799000,
                    "open": 148.44,
                    "high": 148.97,
                    "low": 147.22,
                    "close": 148.79,
                    "volume": 68034100,
                    "adjclose": 146.02
                },
                "1631885400": {
                    "date": "17-09-2021",
                    "date_utc": 1631885400,
                    "open": 148.82,
                    "high": 148.82,
                    "low": 145.76,
                    "close": 146.06,
                    "volume": 129868800,
                    "adjclose": 143.34
                },
                "1632144600": {
                    "date": "20-09-2021",
                    "date_utc": 1632144600,
                    "open": 143.8,
                    "high": 144.84,
                    "low": 141.27,
                    "close": 142.94,
                    "volume": 123478900,
                    "adjclose": 140.28
                },
                "1632231000": {
                    "date": "21-09-2021",
                    "date_utc": 1632231000,
                    "open": 143.93,
                    "high": 144.6,
                    "low": 142.78,
                    "close": 143.43,
                    "volume": 75834000,
                    "adjclose": 140.76
                },
                "1632317400": {
                    "date": "22-09-2021",
                    "date_utc": 1632317400,
                    "open": 144.45,
                    "high": 146.43,
                    "low": 143.7,
                    "close": 145.85,
                    "volume": 76404300,
                    "adjclose": 143.13
                },
                "1632403800": {
                    "date": "23-09-2021",
                    "date_utc": 1632403800,
                    "open": 146.65,
                    "high": 147.08,
                    "low": 145.64,
                    "close": 146.83,
                    "volume": 64838200,
                    "adjclose": 144.09
                },
                "1632490200": {
                    "date": "24-09-2021",
                    "date_utc": 1632490200,
                    "open": 145.66,
                    "high": 147.47,
                    "low": 145.56,
                    "close": 146.92,
                    "volume": 53477900,
                    "adjclose": 144.18
                },
                "1632749400": {
                    "date": "27-09-2021",
                    "date_utc": 1632749400,
                    "open": 145.47,
                    "high": 145.96,
                    "low": 143.82,
                    "close": 145.37,
                    "volume": 74150700,
                    "adjclose": 142.66
                },
                "1632835800": {
                    "date": "28-09-2021",
                    "date_utc": 1632835800,
                    "open": 143.25,
                    "high": 144.75,
                    "low": 141.69,
                    "close": 141.91,
                    "volume": 108972300,
                    "adjclose": 139.27
                },
                "1632922200": {
                    "date": "29-09-2021",
                    "date_utc": 1632922200,
                    "open": 142.47,
                    "high": 144.45,
                    "low": 142.03,
                    "close": 142.83,
                    "volume": 74602000,
                    "adjclose": 140.17
                },
                "1633008600": {
                    "date": "30-09-2021",
                    "date_utc": 1633008600,
                    "open": 143.66,
                    "high": 144.38,
                    "low": 141.28,
                    "close": 141.5,
                    "volume": 89056700,
                    "adjclose": 138.86
                },
                "1633095000": {
                    "date": "01-10-2021",
                    "date_utc": 1633095000,
                    "open": 141.9,
                    "high": 142.92,
                    "low": 139.11,
                    "close": 142.65,
                    "volume": 94639600,
                    "adjclose": 139.99
                },
                "1633354200": {
                    "date": "04-10-2021",
                    "date_utc": 1633354200,
                    "open": 141.76,
                    "high": 142.21,
                    "low": 138.27,
                    "close": 139.14,
                    "volume": 98322000,
                    "adjclose": 136.55
                },
                "1633440600": {
                    "date": "05-10-2021",
                    "date_utc": 1633440600,
                    "open": 139.49,
                    "high": 142.24,
                    "low": 139.36,
                    "close": 141.11,
                    "volume": 80861100,
                    "adjclose": 138.48
                },
                "1633527000": {
                    "date": "06-10-2021",
                    "date_utc": 1633527000,
                    "open": 139.47,
                    "high": 142.15,
                    "low": 138.37,
                    "close": 142,
                    "volume": 83221100,
                    "adjclose": 139.35
                },
                "1633613400": {
                    "date": "07-10-2021",
                    "date_utc": 1633613400,
                    "open": 143.06,
                    "high": 144.22,
                    "low": 142.72,
                    "close": 143.29,
                    "volume": 61732700,
                    "adjclose": 140.62
                },
                "1633699800": {
                    "date": "08-10-2021",
                    "date_utc": 1633699800,
                    "open": 144.03,
                    "high": 144.18,
                    "low": 142.56,
                    "close": 142.9,
                    "volume": 58773200,
                    "adjclose": 140.24
                },
                "1633959000": {
                    "date": "11-10-2021",
                    "date_utc": 1633959000,
                    "open": 142.27,
                    "high": 144.81,
                    "low": 141.81,
                    "close": 142.81,
                    "volume": 64452200,
                    "adjclose": 140.15
                },
                "1634045400": {
                    "date": "12-10-2021",
                    "date_utc": 1634045400,
                    "open": 143.23,
                    "high": 143.25,
                    "low": 141.04,
                    "close": 141.51,
                    "volume": 73035900,
                    "adjclose": 138.87
                },
                "1634131800": {
                    "date": "13-10-2021",
                    "date_utc": 1634131800,
                    "open": 141.24,
                    "high": 141.4,
                    "low": 139.2,
                    "close": 140.91,
                    "volume": 78762700,
                    "adjclose": 138.28
                },
                "1634218200": {
                    "date": "14-10-2021",
                    "date_utc": 1634218200,
                    "open": 142.11,
                    "high": 143.88,
                    "low": 141.51,
                    "close": 143.76,
                    "volume": 69907100,
                    "adjclose": 141.08
                },
                "1634304600": {
                    "date": "15-10-2021",
                    "date_utc": 1634304600,
                    "open": 143.77,
                    "high": 144.9,
                    "low": 143.51,
                    "close": 144.84,
                    "volume": 67940300,
                    "adjclose": 142.14
                },
                "1634563800": {
                    "date": "18-10-2021",
                    "date_utc": 1634563800,
                    "open": 143.45,
                    "high": 146.84,
                    "low": 143.16,
                    "close": 146.55,
                    "volume": 85589200,
                    "adjclose": 143.82
                },
                "1634650200": {
                    "date": "19-10-2021",
                    "date_utc": 1634650200,
                    "open": 147.01,
                    "high": 149.17,
                    "low": 146.55,
                    "close": 148.76,
                    "volume": 76378900,
                    "adjclose": 145.99
                },
                "1634736600": {
                    "date": "20-10-2021",
                    "date_utc": 1634736600,
                    "open": 148.7,
                    "high": 149.75,
                    "low": 148.12,
                    "close": 149.26,
                    "volume": 58418800,
                    "adjclose": 146.48
                },
                "1634823000": {
                    "date": "21-10-2021",
                    "date_utc": 1634823000,
                    "open": 148.81,
                    "high": 149.64,
                    "low": 147.87,
                    "close": 149.48,
                    "volume": 61421000,
                    "adjclose": 146.7
                },
                "1634909400": {
                    "date": "22-10-2021",
                    "date_utc": 1634909400,
                    "open": 149.69,
                    "high": 150.18,
                    "low": 148.64,
                    "close": 148.69,
                    "volume": 58883400,
                    "adjclose": 145.92
                },
                "1635168600": {
                    "date": "25-10-2021",
                    "date_utc": 1635168600,
                    "open": 148.68,
                    "high": 149.37,
                    "low": 147.62,
                    "close": 148.64,
                    "volume": 50720600,
                    "adjclose": 145.87
                },
                "1635255000": {
                    "date": "26-10-2021",
                    "date_utc": 1635255000,
                    "open": 149.33,
                    "high": 150.84,
                    "low": 149.01,
                    "close": 149.32,
                    "volume": 60893400,
                    "adjclose": 146.54
                },
                "1635341400": {
                    "date": "27-10-2021",
                    "date_utc": 1635341400,
                    "open": 149.36,
                    "high": 149.73,
                    "low": 148.49,
                    "close": 148.85,
                    "volume": 56094900,
                    "adjclose": 146.08
                },
                "1635427800": {
                    "date": "28-10-2021",
                    "date_utc": 1635427800,
                    "open": 149.82,
                    "high": 153.17,
                    "low": 149.72,
                    "close": 152.57,
                    "volume": 100077900,
                    "adjclose": 149.73
                },
                "1635514200": {
                    "date": "29-10-2021",
                    "date_utc": 1635514200,
                    "open": 147.22,
                    "high": 149.94,
                    "low": 146.41,
                    "close": 149.8,
                    "volume": 124953200,
                    "adjclose": 147.01
                },
                "1635773400": {
                    "date": "01-11-2021",
                    "date_utc": 1635773400,
                    "open": 148.99,
                    "high": 149.7,
                    "low": 147.8,
                    "close": 148.96,
                    "volume": 74588300,
                    "adjclose": 146.18
                },
                "1635859800": {
                    "date": "02-11-2021",
                    "date_utc": 1635859800,
                    "open": 148.66,
                    "high": 151.57,
                    "low": 148.65,
                    "close": 150.02,
                    "volume": 69122000,
                    "adjclose": 147.23
                },
                "1635946200": {
                    "date": "03-11-2021",
                    "date_utc": 1635946200,
                    "open": 150.39,
                    "high": 151.97,
                    "low": 149.82,
                    "close": 151.49,
                    "volume": 54511500,
                    "adjclose": 148.67
                },
                "1636032600": {
                    "date": "04-11-2021",
                    "date_utc": 1636032600,
                    "open": 151.58,
                    "high": 152.43,
                    "low": 150.64,
                    "close": 150.96,
                    "volume": 60394600,
                    "adjclose": 148.15
                },
                "1636119000": {
                    "date": "05-11-2021",
                    "date_utc": 1636119000,
                    "open": 151.89,
                    "high": 152.2,
                    "low": 150.06,
                    "close": 151.28,
                    "volume": 65463900,
                    "adjclose": 148.68
                },
                "1636381800": {
                    "date": "08-11-2021",
                    "date_utc": 1636381800,
                    "open": 151.41,
                    "high": 151.57,
                    "low": 150.16,
                    "close": 150.44,
                    "volume": 55020900,
                    "adjclose": 147.85
                },
                "1636468200": {
                    "date": "09-11-2021",
                    "date_utc": 1636468200,
                    "open": 150.2,
                    "high": 151.43,
                    "low": 150.06,
                    "close": 150.81,
                    "volume": 56787900,
                    "adjclose": 148.22
                },
                "1636554600": {
                    "date": "10-11-2021",
                    "date_utc": 1636554600,
                    "open": 150.02,
                    "high": 150.13,
                    "low": 147.85,
                    "close": 147.92,
                    "volume": 65187100,
                    "adjclose": 145.38
                },
                "1636641000": {
                    "date": "11-11-2021",
                    "date_utc": 1636641000,
                    "open": 148.96,
                    "high": 149.43,
                    "low": 147.68,
                    "close": 147.87,
                    "volume": 41000000,
                    "adjclose": 145.33
                },
                "1636727400": {
                    "date": "12-11-2021",
                    "date_utc": 1636727400,
                    "open": 148.43,
                    "high": 150.4,
                    "low": 147.48,
                    "close": 149.99,
                    "volume": 63804000,
                    "adjclose": 147.41
                },
                "1636986600": {
                    "date": "15-11-2021",
                    "date_utc": 1636986600,
                    "open": 150.37,
                    "high": 151.88,
                    "low": 149.43,
                    "close": 150,
                    "volume": 59222800,
                    "adjclose": 147.42
                },
                "1637073000": {
                    "date": "16-11-2021",
                    "date_utc": 1637073000,
                    "open": 149.94,
                    "high": 151.49,
                    "low": 149.34,
                    "close": 151,
                    "volume": 59256200,
                    "adjclose": 148.4
                },
                "1637159400": {
                    "date": "17-11-2021",
                    "date_utc": 1637159400,
                    "open": 151,
                    "high": 155,
                    "low": 150.99,
                    "close": 153.49,
                    "volume": 88807000,
                    "adjclose": 150.85
                },
                "1637245800": {
                    "date": "18-11-2021",
                    "date_utc": 1637245800,
                    "open": 153.71,
                    "high": 158.67,
                    "low": 153.05,
                    "close": 157.87,
                    "volume": 137827700,
                    "adjclose": 155.16
                },
                "1637332200": {
                    "date": "19-11-2021",
                    "date_utc": 1637332200,
                    "open": 157.65,
                    "high": 161.02,
                    "low": 156.53,
                    "close": 160.55,
                    "volume": 117305600,
                    "adjclose": 157.79
                },
                "1637591400": {
                    "date": "22-11-2021",
                    "date_utc": 1637591400,
                    "open": 161.68,
                    "high": 165.7,
                    "low": 161,
                    "close": 161.02,
                    "volume": 117467900,
                    "adjclose": 158.25
                },
                "1637677800": {
                    "date": "23-11-2021",
                    "date_utc": 1637677800,
                    "open": 161.12,
                    "high": 161.8,
                    "low": 159.06,
                    "close": 161.41,
                    "volume": 96041900,
                    "adjclose": 158.63
                },
                "1637764200": {
                    "date": "24-11-2021",
                    "date_utc": 1637764200,
                    "open": 160.75,
                    "high": 162.14,
                    "low": 159.64,
                    "close": 161.94,
                    "volume": 69463600,
                    "adjclose": 159.16
                },
                "1637937000": {
                    "date": "26-11-2021",
                    "date_utc": 1637937000,
                    "open": 159.57,
                    "high": 160.45,
                    "low": 156.36,
                    "close": 156.81,
                    "volume": 76959800,
                    "adjclose": 154.11
                },
                "1638196200": {
                    "date": "29-11-2021",
                    "date_utc": 1638196200,
                    "open": 159.37,
                    "high": 161.19,
                    "low": 158.79,
                    "close": 160.24,
                    "volume": 88748200,
                    "adjclose": 157.48
                },
                "1638282600": {
                    "date": "30-11-2021",
                    "date_utc": 1638282600,
                    "open": 159.99,
                    "high": 165.52,
                    "low": 159.92,
                    "close": 165.3,
                    "volume": 174048100,
                    "adjclose": 162.46
                },
                "1638369000": {
                    "date": "01-12-2021",
                    "date_utc": 1638369000,
                    "open": 167.48,
                    "high": 170.3,
                    "low": 164.53,
                    "close": 164.77,
                    "volume": 152052500,
                    "adjclose": 161.94
                },
                "1638455400": {
                    "date": "02-12-2021",
                    "date_utc": 1638455400,
                    "open": 158.74,
                    "high": 164.2,
                    "low": 157.8,
                    "close": 163.76,
                    "volume": 136739200,
                    "adjclose": 160.94
                },
                "1638541800": {
                    "date": "03-12-2021",
                    "date_utc": 1638541800,
                    "open": 164.02,
                    "high": 164.96,
                    "low": 159.72,
                    "close": 161.84,
                    "volume": 118023100,
                    "adjclose": 159.06
                },
                "1638801000": {
                    "date": "06-12-2021",
                    "date_utc": 1638801000,
                    "open": 164.29,
                    "high": 167.88,
                    "low": 164.28,
                    "close": 165.32,
                    "volume": 107497000,
                    "adjclose": 162.48
                },
                "1638887400": {
                    "date": "07-12-2021",
                    "date_utc": 1638887400,
                    "open": 169.08,
                    "high": 171.58,
                    "low": 168.34,
                    "close": 171.18,
                    "volume": 120405400,
                    "adjclose": 168.24
                },
                "1638973800": {
                    "date": "08-12-2021",
                    "date_utc": 1638973800,
                    "open": 172.13,
                    "high": 175.96,
                    "low": 170.7,
                    "close": 175.08,
                    "volume": 116998900,
                    "adjclose": 172.07
                },
                "1639060200": {
                    "date": "09-12-2021",
                    "date_utc": 1639060200,
                    "open": 174.91,
                    "high": 176.75,
                    "low": 173.92,
                    "close": 174.56,
                    "volume": 108923700,
                    "adjclose": 171.56
                },
                "1639146600": {
                    "date": "10-12-2021",
                    "date_utc": 1639146600,
                    "open": 175.21,
                    "high": 179.63,
                    "low": 174.69,
                    "close": 179.45,
                    "volume": 115402700,
                    "adjclose": 176.36
                },
                "1639405800": {
                    "date": "13-12-2021",
                    "date_utc": 1639405800,
                    "open": 181.12,
                    "high": 182.13,
                    "low": 175.53,
                    "close": 175.74,
                    "volume": 153237000,
                    "adjclose": 172.72
                },
                "1639492200": {
                    "date": "14-12-2021",
                    "date_utc": 1639492200,
                    "open": 175.25,
                    "high": 177.74,
                    "low": 172.21,
                    "close": 174.33,
                    "volume": 139380400,
                    "adjclose": 171.33
                },
                "1639578600": {
                    "date": "15-12-2021",
                    "date_utc": 1639578600,
                    "open": 175.11,
                    "high": 179.5,
                    "low": 172.31,
                    "close": 179.3,
                    "volume": 131063300,
                    "adjclose": 176.22
                },
                "1639665000": {
                    "date": "16-12-2021",
                    "date_utc": 1639665000,
                    "open": 179.28,
                    "high": 181.14,
                    "low": 170.75,
                    "close": 172.26,
                    "volume": 150185800,
                    "adjclose": 169.3
                },
                "1639751400": {
                    "date": "17-12-2021",
                    "date_utc": 1639751400,
                    "open": 169.93,
                    "high": 173.47,
                    "low": 169.69,
                    "close": 171.14,
                    "volume": 195432700,
                    "adjclose": 168.2
                },
                "1640010600": {
                    "date": "20-12-2021",
                    "date_utc": 1640010600,
                    "open": 168.28,
                    "high": 170.58,
                    "low": 167.46,
                    "close": 169.75,
                    "volume": 107499100,
                    "adjclose": 166.83
                },
                "1640097000": {
                    "date": "21-12-2021",
                    "date_utc": 1640097000,
                    "open": 171.56,
                    "high": 173.2,
                    "low": 169.12,
                    "close": 172.99,
                    "volume": 91185900,
                    "adjclose": 170.02
                },
                "1640183400": {
                    "date": "22-12-2021",
                    "date_utc": 1640183400,
                    "open": 173.04,
                    "high": 175.86,
                    "low": 172.15,
                    "close": 175.64,
                    "volume": 92135300,
                    "adjclose": 172.62
                },
                "1640269800": {
                    "date": "23-12-2021",
                    "date_utc": 1640269800,
                    "open": 175.85,
                    "high": 176.85,
                    "low": 175.27,
                    "close": 176.28,
                    "volume": 68356600,
                    "adjclose": 173.25
                },
                "1640615400": {
                    "date": "27-12-2021",
                    "date_utc": 1640615400,
                    "open": 177.09,
                    "high": 180.42,
                    "low": 177.07,
                    "close": 180.33,
                    "volume": 74919600,
                    "adjclose": 177.23
                },
                "1640701800": {
                    "date": "28-12-2021",
                    "date_utc": 1640701800,
                    "open": 180.16,
                    "high": 181.33,
                    "low": 178.53,
                    "close": 179.29,
                    "volume": 79144300,
                    "adjclose": 176.21
                },
                "1640788200": {
                    "date": "29-12-2021",
                    "date_utc": 1640788200,
                    "open": 179.33,
                    "high": 180.63,
                    "low": 178.14,
                    "close": 179.38,
                    "volume": 62348900,
                    "adjclose": 176.3
                },
                "1640874600": {
                    "date": "30-12-2021",
                    "date_utc": 1640874600,
                    "open": 179.47,
                    "high": 180.57,
                    "low": 178.09,
                    "close": 178.2,
                    "volume": 59773000,
                    "adjclose": 175.14
                },
                "1640961000": {
                    "date": "31-12-2021",
                    "date_utc": 1640961000,
                    "open": 178.09,
                    "high": 179.23,
                    "low": 177.26,
                    "close": 177.57,
                    "volume": 64062300,
                    "adjclose": 174.52
                },
                "1641220200": {
                    "date": "03-01-2022",
                    "date_utc": 1641220200,
                    "open": 177.83,
                    "high": 182.88,
                    "low": 177.71,
                    "close": 182.01,
                    "volume": 104487900,
                    "adjclose": 178.88
                },
                "1641306600": {
                    "date": "04-01-2022",
                    "date_utc": 1641306600,
                    "open": 182.63,
                    "high": 182.94,
                    "low": 179.12,
                    "close": 179.7,
                    "volume": 99310400,
                    "adjclose": 176.61
                },
                "1641393000": {
                    "date": "05-01-2022",
                    "date_utc": 1641393000,
                    "open": 179.61,
                    "high": 180.17,
                    "low": 174.64,
                    "close": 174.92,
                    "volume": 94537600,
                    "adjclose": 171.91
                },
                "1641479400": {
                    "date": "06-01-2022",
                    "date_utc": 1641479400,
                    "open": 172.7,
                    "high": 175.3,
                    "low": 171.64,
                    "close": 172,
                    "volume": 96904000,
                    "adjclose": 169.04
                },
                "1641565800": {
                    "date": "07-01-2022",
                    "date_utc": 1641565800,
                    "open": 172.89,
                    "high": 174.14,
                    "low": 171.03,
                    "close": 172.17,
                    "volume": 86709100,
                    "adjclose": 169.21
                },
                "1641825000": {
                    "date": "10-01-2022",
                    "date_utc": 1641825000,
                    "open": 169.08,
                    "high": 172.5,
                    "low": 168.17,
                    "close": 172.19,
                    "volume": 106765600,
                    "adjclose": 169.23
                },
                "1641911400": {
                    "date": "11-01-2022",
                    "date_utc": 1641911400,
                    "open": 172.32,
                    "high": 175.18,
                    "low": 170.82,
                    "close": 175.08,
                    "volume": 76138300,
                    "adjclose": 172.07
                },
                "1641997800": {
                    "date": "12-01-2022",
                    "date_utc": 1641997800,
                    "open": 176.12,
                    "high": 177.18,
                    "low": 174.82,
                    "close": 175.53,
                    "volume": 74805200,
                    "adjclose": 172.51
                },
                "1642084200": {
                    "date": "13-01-2022",
                    "date_utc": 1642084200,
                    "open": 175.78,
                    "high": 176.62,
                    "low": 171.79,
                    "close": 172.19,
                    "volume": 84505800,
                    "adjclose": 169.23
                },
                "1642170600": {
                    "date": "14-01-2022",
                    "date_utc": 1642170600,
                    "open": 171.34,
                    "high": 173.78,
                    "low": 171.09,
                    "close": 173.07,
                    "volume": 80440800,
                    "adjclose": 170.09
                },
                "1642516200": {
                    "date": "18-01-2022",
                    "date_utc": 1642516200,
                    "open": 171.51,
                    "high": 172.54,
                    "low": 169.41,
                    "close": 169.8,
                    "volume": 90956700,
                    "adjclose": 166.88
                },
                "1642602600": {
                    "date": "19-01-2022",
                    "date_utc": 1642602600,
                    "open": 170,
                    "high": 171.08,
                    "low": 165.94,
                    "close": 166.23,
                    "volume": 94815000,
                    "adjclose": 163.37
                },
                "1642689000": {
                    "date": "20-01-2022",
                    "date_utc": 1642689000,
                    "open": 166.98,
                    "high": 169.68,
                    "low": 164.18,
                    "close": 164.51,
                    "volume": 91420500,
                    "adjclose": 161.68
                },
                "1642775400": {
                    "date": "21-01-2022",
                    "date_utc": 1642775400,
                    "open": 164.42,
                    "high": 166.33,
                    "low": 162.3,
                    "close": 162.41,
                    "volume": 122848900,
                    "adjclose": 159.62
                },
                "1643034600": {
                    "date": "24-01-2022",
                    "date_utc": 1643034600,
                    "open": 160.02,
                    "high": 162.3,
                    "low": 154.7,
                    "close": 161.62,
                    "volume": 162294600,
                    "adjclose": 158.84
                },
                "1643121000": {
                    "date": "25-01-2022",
                    "date_utc": 1643121000,
                    "open": 158.98,
                    "high": 162.76,
                    "low": 157.02,
                    "close": 159.78,
                    "volume": 115798400,
                    "adjclose": 157.03
                },
                "1643207400": {
                    "date": "26-01-2022",
                    "date_utc": 1643207400,
                    "open": 163.5,
                    "high": 164.39,
                    "low": 157.82,
                    "close": 159.69,
                    "volume": 108275300,
                    "adjclose": 156.94
                },
                "1643293800": {
                    "date": "27-01-2022",
                    "date_utc": 1643293800,
                    "open": 162.45,
                    "high": 163.84,
                    "low": 158.28,
                    "close": 159.22,
                    "volume": 121954600,
                    "adjclose": 156.48
                },
                "1643380200": {
                    "date": "28-01-2022",
                    "date_utc": 1643380200,
                    "open": 165.71,
                    "high": 170.35,
                    "low": 162.8,
                    "close": 170.33,
                    "volume": 179935700,
                    "adjclose": 167.4
                },
                "1643639400": {
                    "date": "31-01-2022",
                    "date_utc": 1643639400,
                    "open": 170.16,
                    "high": 175,
                    "low": 169.51,
                    "close": 174.78,
                    "volume": 115541600,
                    "adjclose": 171.77
                },
                "1643725800": {
                    "date": "01-02-2022",
                    "date_utc": 1643725800,
                    "open": 174.01,
                    "high": 174.84,
                    "low": 172.31,
                    "close": 174.61,
                    "volume": 86213900,
                    "adjclose": 171.61
                },
                "1643812200": {
                    "date": "02-02-2022",
                    "date_utc": 1643812200,
                    "open": 174.75,
                    "high": 175.88,
                    "low": 173.33,
                    "close": 175.84,
                    "volume": 84914300,
                    "adjclose": 172.82
                },
                "1643898600": {
                    "date": "03-02-2022",
                    "date_utc": 1643898600,
                    "open": 174.48,
                    "high": 176.24,
                    "low": 172.12,
                    "close": 172.9,
                    "volume": 89418100,
                    "adjclose": 169.93
                },
                "1643985000": {
                    "date": "04-02-2022",
                    "date_utc": 1643985000,
                    "open": 171.68,
                    "high": 174.1,
                    "low": 170.68,
                    "close": 172.39,
                    "volume": 82465400,
                    "adjclose": 169.64
                },
                "1644244200": {
                    "date": "07-02-2022",
                    "date_utc": 1644244200,
                    "open": 172.86,
                    "high": 173.95,
                    "low": 170.95,
                    "close": 171.66,
                    "volume": 77251200,
                    "adjclose": 168.92
                },
                "1644330600": {
                    "date": "08-02-2022",
                    "date_utc": 1644330600,
                    "open": 171.73,
                    "high": 175.35,
                    "low": 171.43,
                    "close": 174.83,
                    "volume": 74829200,
                    "adjclose": 172.04
                },
                "1644417000": {
                    "date": "09-02-2022",
                    "date_utc": 1644417000,
                    "open": 176.05,
                    "high": 176.65,
                    "low": 174.9,
                    "close": 176.28,
                    "volume": 71285000,
                    "adjclose": 173.47
                },
                "1644503400": {
                    "date": "10-02-2022",
                    "date_utc": 1644503400,
                    "open": 174.14,
                    "high": 175.48,
                    "low": 171.55,
                    "close": 172.12,
                    "volume": 90865900,
                    "adjclose": 169.38
                },
                "1644589800": {
                    "date": "11-02-2022",
                    "date_utc": 1644589800,
                    "open": 172.33,
                    "high": 173.08,
                    "low": 168.04,
                    "close": 168.64,
                    "volume": 98670700,
                    "adjclose": 165.95
                },
                "1644849000": {
                    "date": "14-02-2022",
                    "date_utc": 1644849000,
                    "open": 167.37,
                    "high": 169.58,
                    "low": 166.56,
                    "close": 168.88,
                    "volume": 86185500,
                    "adjclose": 166.19
                },
                "1644935400": {
                    "date": "15-02-2022",
                    "date_utc": 1644935400,
                    "open": 170.97,
                    "high": 172.95,
                    "low": 170.25,
                    "close": 172.79,
                    "volume": 62527400,
                    "adjclose": 170.03
                },
                "1645021800": {
                    "date": "16-02-2022",
                    "date_utc": 1645021800,
                    "open": 171.85,
                    "high": 173.34,
                    "low": 170.05,
                    "close": 172.55,
                    "volume": 61177400,
                    "adjclose": 169.8
                },
                "1645108200": {
                    "date": "17-02-2022",
                    "date_utc": 1645108200,
                    "open": 171.03,
                    "high": 171.91,
                    "low": 168.47,
                    "close": 168.88,
                    "volume": 69589300,
                    "adjclose": 166.19
                },
                "1645194600": {
                    "date": "18-02-2022",
                    "date_utc": 1645194600,
                    "open": 169.82,
                    "high": 170.54,
                    "low": 166.19,
                    "close": 167.3,
                    "volume": 82772700,
                    "adjclose": 164.63
                },
                "1645540200": {
                    "date": "22-02-2022",
                    "date_utc": 1645540200,
                    "open": 164.98,
                    "high": 166.69,
                    "low": 162.15,
                    "close": 164.32,
                    "volume": 91162800,
                    "adjclose": 161.7
                },
                "1645626600": {
                    "date": "23-02-2022",
                    "date_utc": 1645626600,
                    "open": 165.54,
                    "high": 166.15,
                    "low": 159.75,
                    "close": 160.07,
                    "volume": 90009200,
                    "adjclose": 157.52
                },
                "1645713000": {
                    "date": "24-02-2022",
                    "date_utc": 1645713000,
                    "open": 152.58,
                    "high": 162.85,
                    "low": 152,
                    "close": 162.74,
                    "volume": 141147500,
                    "adjclose": 160.15
                },
                "1645799400": {
                    "date": "25-02-2022",
                    "date_utc": 1645799400,
                    "open": 163.84,
                    "high": 165.12,
                    "low": 160.87,
                    "close": 164.85,
                    "volume": 91974200,
                    "adjclose": 162.22
                },
                "1646058600": {
                    "date": "28-02-2022",
                    "date_utc": 1646058600,
                    "open": 163.06,
                    "high": 165.42,
                    "low": 162.43,
                    "close": 165.12,
                    "volume": 95056600,
                    "adjclose": 162.49
                },
                "1646145000": {
                    "date": "01-03-2022",
                    "date_utc": 1646145000,
                    "open": 164.7,
                    "high": 166.6,
                    "low": 161.97,
                    "close": 163.2,
                    "volume": 83474400,
                    "adjclose": 160.6
                },
                "1646231400": {
                    "date": "02-03-2022",
                    "date_utc": 1646231400,
                    "open": 164.39,
                    "high": 167.36,
                    "low": 162.95,
                    "close": 166.56,
                    "volume": 79724800,
                    "adjclose": 163.9
                },
                "1646317800": {
                    "date": "03-03-2022",
                    "date_utc": 1646317800,
                    "open": 168.47,
                    "high": 168.91,
                    "low": 165.55,
                    "close": 166.23,
                    "volume": 76678400,
                    "adjclose": 163.58
                },
                "1646404200": {
                    "date": "04-03-2022",
                    "date_utc": 1646404200,
                    "open": 164.49,
                    "high": 165.55,
                    "low": 162.1,
                    "close": 163.17,
                    "volume": 83737200,
                    "adjclose": 160.57
                },
                "1646663400": {
                    "date": "07-03-2022",
                    "date_utc": 1646663400,
                    "open": 163.36,
                    "high": 165.02,
                    "low": 159.04,
                    "close": 159.3,
                    "volume": 96418800,
                    "adjclose": 156.76
                },
                "1646749800": {
                    "date": "08-03-2022",
                    "date_utc": 1646749800,
                    "open": 158.82,
                    "high": 162.88,
                    "low": 155.8,
                    "close": 157.44,
                    "volume": 131148300,
                    "adjclose": 154.93
                },
                "1646836200": {
                    "date": "09-03-2022",
                    "date_utc": 1646836200,
                    "open": 161.48,
                    "high": 163.41,
                    "low": 159.41,
                    "close": 162.95,
                    "volume": 91454900,
                    "adjclose": 160.35
                },
                "1646922600": {
                    "date": "10-03-2022",
                    "date_utc": 1646922600,
                    "open": 160.2,
                    "high": 160.39,
                    "low": 155.98,
                    "close": 158.52,
                    "volume": 105342000,
                    "adjclose": 155.99
                },
                "1647009000": {
                    "date": "11-03-2022",
                    "date_utc": 1647009000,
                    "open": 158.93,
                    "high": 159.28,
                    "low": 154.5,
                    "close": 154.73,
                    "volume": 96970100,
                    "adjclose": 152.26
                },
                "1647264600": {
                    "date": "14-03-2022",
                    "date_utc": 1647264600,
                    "open": 151.45,
                    "high": 154.12,
                    "low": 150.1,
                    "close": 150.62,
                    "volume": 108732100,
                    "adjclose": 148.22
                },
                "1647351000": {
                    "date": "15-03-2022",
                    "date_utc": 1647351000,
                    "open": 150.9,
                    "high": 155.57,
                    "low": 150.38,
                    "close": 155.09,
                    "volume": 92964300,
                    "adjclose": 152.62
                },
                "1647437400": {
                    "date": "16-03-2022",
                    "date_utc": 1647437400,
                    "open": 157.05,
                    "high": 160,
                    "low": 154.46,
                    "close": 159.59,
                    "volume": 102300200,
                    "adjclose": 157.05
                },
                "1647523800": {
                    "date": "17-03-2022",
                    "date_utc": 1647523800,
                    "open": 158.61,
                    "high": 161,
                    "low": 157.63,
                    "close": 160.62,
                    "volume": 75615400,
                    "adjclose": 158.06
                },
                "1647610200": {
                    "date": "18-03-2022",
                    "date_utc": 1647610200,
                    "open": 160.51,
                    "high": 164.48,
                    "low": 159.76,
                    "close": 163.98,
                    "volume": 123511700,
                    "adjclose": 161.37
                },
                "1647869400": {
                    "date": "21-03-2022",
                    "date_utc": 1647869400,
                    "open": 163.51,
                    "high": 166.35,
                    "low": 163.01,
                    "close": 165.38,
                    "volume": 95811400,
                    "adjclose": 162.74
                },
                "1647955800": {
                    "date": "22-03-2022",
                    "date_utc": 1647955800,
                    "open": 165.51,
                    "high": 169.42,
                    "low": 164.91,
                    "close": 168.82,
                    "volume": 81532000,
                    "adjclose": 166.13
                },
                "1648042200": {
                    "date": "23-03-2022",
                    "date_utc": 1648042200,
                    "open": 167.99,
                    "high": 172.64,
                    "low": 167.65,
                    "close": 170.21,
                    "volume": 98062700,
                    "adjclose": 167.5
                },
                "1648128600": {
                    "date": "24-03-2022",
                    "date_utc": 1648128600,
                    "open": 171.06,
                    "high": 174.14,
                    "low": 170.21,
                    "close": 174.07,
                    "volume": 90131400,
                    "adjclose": 171.29
                },
                "1648215000": {
                    "date": "25-03-2022",
                    "date_utc": 1648215000,
                    "open": 173.88,
                    "high": 175.28,
                    "low": 172.75,
                    "close": 174.72,
                    "volume": 80546200,
                    "adjclose": 171.93
                },
                "1648474200": {
                    "date": "28-03-2022",
                    "date_utc": 1648474200,
                    "open": 172.17,
                    "high": 175.73,
                    "low": 172,
                    "close": 175.6,
                    "volume": 90371900,
                    "adjclose": 172.8
                },
                "1648560600": {
                    "date": "29-03-2022",
                    "date_utc": 1648560600,
                    "open": 176.69,
                    "high": 179.01,
                    "low": 176.34,
                    "close": 178.96,
                    "volume": 100589400,
                    "adjclose": 176.11
                },
                "1648647000": {
                    "date": "30-03-2022",
                    "date_utc": 1648647000,
                    "open": 178.55,
                    "high": 179.61,
                    "low": 176.7,
                    "close": 177.77,
                    "volume": 92633200,
                    "adjclose": 174.94
                },
                "1648733400": {
                    "date": "31-03-2022",
                    "date_utc": 1648733400,
                    "open": 177.84,
                    "high": 178.03,
                    "low": 174.4,
                    "close": 174.61,
                    "volume": 103049300,
                    "adjclose": 171.83
                },
                "1648819800": {
                    "date": "01-04-2022",
                    "date_utc": 1648819800,
                    "open": 174.03,
                    "high": 174.88,
                    "low": 171.94,
                    "close": 174.31,
                    "volume": 78751300,
                    "adjclose": 171.53
                },
                "1649079000": {
                    "date": "04-04-2022",
                    "date_utc": 1649079000,
                    "open": 174.57,
                    "high": 178.49,
                    "low": 174.44,
                    "close": 178.44,
                    "volume": 76468400,
                    "adjclose": 175.59
                },
                "1649165400": {
                    "date": "05-04-2022",
                    "date_utc": 1649165400,
                    "open": 177.5,
                    "high": 178.3,
                    "low": 174.42,
                    "close": 175.06,
                    "volume": 73401800,
                    "adjclose": 172.27
                },
                "1649251800": {
                    "date": "06-04-2022",
                    "date_utc": 1649251800,
                    "open": 172.36,
                    "high": 173.63,
                    "low": 170.13,
                    "close": 171.83,
                    "volume": 89058800,
                    "adjclose": 169.09
                },
                "1649338200": {
                    "date": "07-04-2022",
                    "date_utc": 1649338200,
                    "open": 171.16,
                    "high": 173.36,
                    "low": 169.85,
                    "close": 172.14,
                    "volume": 77594700,
                    "adjclose": 169.4
                },
                "1649424600": {
                    "date": "08-04-2022",
                    "date_utc": 1649424600,
                    "open": 171.78,
                    "high": 171.78,
                    "low": 169.2,
                    "close": 170.09,
                    "volume": 76575500,
                    "adjclose": 167.38
                },
                "1649683800": {
                    "date": "11-04-2022",
                    "date_utc": 1649683800,
                    "open": 168.71,
                    "high": 169.03,
                    "low": 165.5,
                    "close": 165.75,
                    "volume": 72246700,
                    "adjclose": 163.11
                },
                "1649770200": {
                    "date": "12-04-2022",
                    "date_utc": 1649770200,
                    "open": 168.02,
                    "high": 169.87,
                    "low": 166.64,
                    "close": 167.66,
                    "volume": 79265200,
                    "adjclose": 164.99
                },
                "1649856600": {
                    "date": "13-04-2022",
                    "date_utc": 1649856600,
                    "open": 167.39,
                    "high": 171.04,
                    "low": 166.77,
                    "close": 170.4,
                    "volume": 70618900,
                    "adjclose": 167.68
                },
                "1649943000": {
                    "date": "14-04-2022",
                    "date_utc": 1649943000,
                    "open": 170.62,
                    "high": 171.27,
                    "low": 165.04,
                    "close": 165.29,
                    "volume": 75329400,
                    "adjclose": 162.65
                },
                "1650288600": {
                    "date": "18-04-2022",
                    "date_utc": 1650288600,
                    "open": 163.92,
                    "high": 166.6,
                    "low": 163.57,
                    "close": 165.07,
                    "volume": 69023900,
                    "adjclose": 162.44
                },
                "1650375000": {
                    "date": "19-04-2022",
                    "date_utc": 1650375000,
                    "open": 165.02,
                    "high": 167.82,
                    "low": 163.91,
                    "close": 167.4,
                    "volume": 67723800,
                    "adjclose": 164.73
                },
                "1650461400": {
                    "date": "20-04-2022",
                    "date_utc": 1650461400,
                    "open": 168.76,
                    "high": 168.88,
                    "low": 166.1,
                    "close": 167.23,
                    "volume": 67929800,
                    "adjclose": 164.56
                },
                "1650547800": {
                    "date": "21-04-2022",
                    "date_utc": 1650547800,
                    "open": 168.91,
                    "high": 171.53,
                    "low": 165.91,
                    "close": 166.42,
                    "volume": 87227800,
                    "adjclose": 163.77
                },
                "1650634200": {
                    "date": "22-04-2022",
                    "date_utc": 1650634200,
                    "open": 166.46,
                    "high": 167.87,
                    "low": 161.5,
                    "close": 161.79,
                    "volume": 84882400,
                    "adjclose": 159.21
                },
                "1650893400": {
                    "date": "25-04-2022",
                    "date_utc": 1650893400,
                    "open": 161.12,
                    "high": 163.17,
                    "low": 158.46,
                    "close": 162.88,
                    "volume": 96046400,
                    "adjclose": 160.28
                },
                "1650979800": {
                    "date": "26-04-2022",
                    "date_utc": 1650979800,
                    "open": 162.25,
                    "high": 162.34,
                    "low": 156.72,
                    "close": 156.8,
                    "volume": 95623200,
                    "adjclose": 154.3
                },
                "1651066200": {
                    "date": "27-04-2022",
                    "date_utc": 1651066200,
                    "open": 155.91,
                    "high": 159.79,
                    "low": 155.38,
                    "close": 156.57,
                    "volume": 88063200,
                    "adjclose": 154.07
                },
                "1651152600": {
                    "date": "28-04-2022",
                    "date_utc": 1651152600,
                    "open": 159.25,
                    "high": 164.52,
                    "low": 158.93,
                    "close": 163.64,
                    "volume": 130216800,
                    "adjclose": 161.03
                },
                "1651239000": {
                    "date": "29-04-2022",
                    "date_utc": 1651239000,
                    "open": 161.84,
                    "high": 166.2,
                    "low": 157.25,
                    "close": 157.65,
                    "volume": 131747600,
                    "adjclose": 155.14
                },
                "1651498200": {
                    "date": "02-05-2022",
                    "date_utc": 1651498200,
                    "open": 156.71,
                    "high": 158.23,
                    "low": 153.27,
                    "close": 157.96,
                    "volume": 123055300,
                    "adjclose": 155.44
                },
                "1651584600": {
                    "date": "03-05-2022",
                    "date_utc": 1651584600,
                    "open": 158.15,
                    "high": 160.71,
                    "low": 156.32,
                    "close": 159.48,
                    "volume": 88966500,
                    "adjclose": 156.94
                },
                "1651671000": {
                    "date": "04-05-2022",
                    "date_utc": 1651671000,
                    "open": 159.67,
                    "high": 166.48,
                    "low": 159.26,
                    "close": 166.02,
                    "volume": 108256500,
                    "adjclose": 163.37
                },
                "1651757400": {
                    "date": "05-05-2022",
                    "date_utc": 1651757400,
                    "open": 163.85,
                    "high": 164.08,
                    "low": 154.95,
                    "close": 156.77,
                    "volume": 130525300,
                    "adjclose": 154.27
                },
                "1651843800": {
                    "date": "06-05-2022",
                    "date_utc": 1651843800,
                    "open": 156.01,
                    "high": 159.44,
                    "low": 154.18,
                    "close": 157.28,
                    "volume": 116124600,
                    "adjclose": 155
                },
                "1652103000": {
                    "date": "09-05-2022",
                    "date_utc": 1652103000,
                    "open": 154.93,
                    "high": 155.83,
                    "low": 151.49,
                    "close": 152.06,
                    "volume": 131577900,
                    "adjclose": 149.86
                },
                "1652189400": {
                    "date": "10-05-2022",
                    "date_utc": 1652189400,
                    "open": 155.52,
                    "high": 156.74,
                    "low": 152.93,
                    "close": 154.51,
                    "volume": 115366700,
                    "adjclose": 152.27
                },
                "1652275800": {
                    "date": "11-05-2022",
                    "date_utc": 1652275800,
                    "open": 153.5,
                    "high": 155.45,
                    "low": 145.81,
                    "close": 146.5,
                    "volume": 142689800,
                    "adjclose": 144.38
                },
                "1652362200": {
                    "date": "12-05-2022",
                    "date_utc": 1652362200,
                    "open": 142.77,
                    "high": 146.2,
                    "low": 138.8,
                    "close": 142.56,
                    "volume": 182602000,
                    "adjclose": 140.49
                },
                "1652448600": {
                    "date": "13-05-2022",
                    "date_utc": 1652448600,
                    "open": 144.59,
                    "high": 148.1,
                    "low": 143.11,
                    "close": 147.11,
                    "volume": 113990900,
                    "adjclose": 144.98
                },
                "1652707800": {
                    "date": "16-05-2022",
                    "date_utc": 1652707800,
                    "open": 145.55,
                    "high": 147.52,
                    "low": 144.18,
                    "close": 145.54,
                    "volume": 86643800,
                    "adjclose": 143.43
                },
                "1652794200": {
                    "date": "17-05-2022",
                    "date_utc": 1652794200,
                    "open": 148.86,
                    "high": 149.77,
                    "low": 146.68,
                    "close": 149.24,
                    "volume": 78336300,
                    "adjclose": 147.08
                },
                "1652880600": {
                    "date": "18-05-2022",
                    "date_utc": 1652880600,
                    "open": 146.85,
                    "high": 147.36,
                    "low": 139.9,
                    "close": 140.82,
                    "volume": 109742900,
                    "adjclose": 138.78
                },
                "1652967000": {
                    "date": "19-05-2022",
                    "date_utc": 1652967000,
                    "open": 139.88,
                    "high": 141.66,
                    "low": 136.6,
                    "close": 137.35,
                    "volume": 136095600,
                    "adjclose": 135.36
                },
                "1653053400": {
                    "date": "20-05-2022",
                    "date_utc": 1653053400,
                    "open": 139.09,
                    "high": 140.7,
                    "low": 132.61,
                    "close": 137.59,
                    "volume": 137426100,
                    "adjclose": 135.6
                },
                "1653312600": {
                    "date": "23-05-2022",
                    "date_utc": 1653312600,
                    "open": 137.79,
                    "high": 143.26,
                    "low": 137.65,
                    "close": 143.11,
                    "volume": 117726300,
                    "adjclose": 141.03
                },
                "1653399000": {
                    "date": "24-05-2022",
                    "date_utc": 1653399000,
                    "open": 140.81,
                    "high": 141.97,
                    "low": 137.33,
                    "close": 140.36,
                    "volume": 104132700,
                    "adjclose": 138.32
                },
                "1653485400": {
                    "date": "25-05-2022",
                    "date_utc": 1653485400,
                    "open": 138.43,
                    "high": 141.79,
                    "low": 138.34,
                    "close": 140.52,
                    "volume": 92482700,
                    "adjclose": 138.48
                },
                "1653571800": {
                    "date": "26-05-2022",
                    "date_utc": 1653571800,
                    "open": 137.39,
                    "high": 144.34,
                    "low": 137.14,
                    "close": 143.78,
                    "volume": 90601500,
                    "adjclose": 141.7
                },
                "1653658200": {
                    "date": "27-05-2022",
                    "date_utc": 1653658200,
                    "open": 145.39,
                    "high": 149.68,
                    "low": 145.26,
                    "close": 149.64,
                    "volume": 90978500,
                    "adjclose": 147.47
                },
                "1654003800": {
                    "date": "31-05-2022",
                    "date_utc": 1654003800,
                    "open": 149.07,
                    "high": 150.66,
                    "low": 146.84,
                    "close": 148.84,
                    "volume": 103718400,
                    "adjclose": 146.68
                },
                "1654090200": {
                    "date": "01-06-2022",
                    "date_utc": 1654090200,
                    "open": 149.9,
                    "high": 151.74,
                    "low": 147.68,
                    "close": 148.71,
                    "volume": 74286600,
                    "adjclose": 146.55
                },
                "1654176600": {
                    "date": "02-06-2022",
                    "date_utc": 1654176600,
                    "open": 147.83,
                    "high": 151.27,
                    "low": 146.86,
                    "close": 151.21,
                    "volume": 72348100,
                    "adjclose": 149.02
                },
                "1654263000": {
                    "date": "03-06-2022",
                    "date_utc": 1654263000,
                    "open": 146.9,
                    "high": 147.97,
                    "low": 144.46,
                    "close": 145.38,
                    "volume": 88570300,
                    "adjclose": 143.27
                },
                "1654522200": {
                    "date": "06-06-2022",
                    "date_utc": 1654522200,
                    "open": 147.03,
                    "high": 148.57,
                    "low": 144.9,
                    "close": 146.14,
                    "volume": 71598400,
                    "adjclose": 144.02
                },
                "1654608600": {
                    "date": "07-06-2022",
                    "date_utc": 1654608600,
                    "open": 144.35,
                    "high": 149,
                    "low": 144.1,
                    "close": 148.71,
                    "volume": 67808200,
                    "adjclose": 146.55
                },
                "1654695000": {
                    "date": "08-06-2022",
                    "date_utc": 1654695000,
                    "open": 148.58,
                    "high": 149.87,
                    "low": 147.46,
                    "close": 147.96,
                    "volume": 53950200,
                    "adjclose": 145.81
                },
                "1654781400": {
                    "date": "09-06-2022",
                    "date_utc": 1654781400,
                    "open": 147.08,
                    "high": 147.95,
                    "low": 142.53,
                    "close": 142.64,
                    "volume": 69473000,
                    "adjclose": 140.57
                },
                "1654867800": {
                    "date": "10-06-2022",
                    "date_utc": 1654867800,
                    "open": 140.28,
                    "high": 140.76,
                    "low": 137.06,
                    "close": 137.13,
                    "volume": 91437900,
                    "adjclose": 135.14
                },
                "1655127000": {
                    "date": "13-06-2022",
                    "date_utc": 1655127000,
                    "open": 132.87,
                    "high": 135.2,
                    "low": 131.44,
                    "close": 131.88,
                    "volume": 122207100,
                    "adjclose": 129.97
                },
                "1655213400": {
                    "date": "14-06-2022",
                    "date_utc": 1655213400,
                    "open": 133.13,
                    "high": 133.89,
                    "low": 131.48,
                    "close": 132.76,
                    "volume": 84784300,
                    "adjclose": 130.84
                },
                "1655299800": {
                    "date": "15-06-2022",
                    "date_utc": 1655299800,
                    "open": 134.29,
                    "high": 137.34,
                    "low": 132.16,
                    "close": 135.43,
                    "volume": 91533000,
                    "adjclose": 133.47
                },
                "1655386200": {
                    "date": "16-06-2022",
                    "date_utc": 1655386200,
                    "open": 132.08,
                    "high": 132.39,
                    "low": 129.04,
                    "close": 130.06,
                    "volume": 108123900,
                    "adjclose": 128.17
                },
                "1655472600": {
                    "date": "17-06-2022",
                    "date_utc": 1655472600,
                    "open": 130.07,
                    "high": 133.08,
                    "low": 129.81,
                    "close": 131.56,
                    "volume": 134520300,
                    "adjclose": 129.65
                },
                "1655818200": {
                    "date": "21-06-2022",
                    "date_utc": 1655818200,
                    "open": 133.42,
                    "high": 137.06,
                    "low": 133.32,
                    "close": 135.87,
                    "volume": 81000500,
                    "adjclose": 133.9
                },
                "1655904600": {
                    "date": "22-06-2022",
                    "date_utc": 1655904600,
                    "open": 134.79,
                    "high": 137.76,
                    "low": 133.91,
                    "close": 135.35,
                    "volume": 73409200,
                    "adjclose": 133.39
                },
                "1655991000": {
                    "date": "23-06-2022",
                    "date_utc": 1655991000,
                    "open": 136.82,
                    "high": 138.59,
                    "low": 135.63,
                    "close": 138.27,
                    "volume": 72433800,
                    "adjclose": 136.27
                },
                "1656077400": {
                    "date": "24-06-2022",
                    "date_utc": 1656077400,
                    "open": 139.9,
                    "high": 141.91,
                    "low": 139.77,
                    "close": 141.66,
                    "volume": 89116800,
                    "adjclose": 139.61
                },
                "1656336600": {
                    "date": "27-06-2022",
                    "date_utc": 1656336600,
                    "open": 142.7,
                    "high": 143.49,
                    "low": 140.97,
                    "close": 141.66,
                    "volume": 70207900,
                    "adjclose": 139.61
                },
                "1656423000": {
                    "date": "28-06-2022",
                    "date_utc": 1656423000,
                    "open": 142.13,
                    "high": 143.42,
                    "low": 137.32,
                    "close": 137.44,
                    "volume": 67083400,
                    "adjclose": 135.45
                },
                "1656509400": {
                    "date": "29-06-2022",
                    "date_utc": 1656509400,
                    "open": 137.46,
                    "high": 140.67,
                    "low": 136.67,
                    "close": 139.23,
                    "volume": 66242400,
                    "adjclose": 137.21
                },
                "1656595800": {
                    "date": "30-06-2022",
                    "date_utc": 1656595800,
                    "open": 137.25,
                    "high": 138.37,
                    "low": 133.77,
                    "close": 136.72,
                    "volume": 98964500,
                    "adjclose": 134.74
                },
                "1656682200": {
                    "date": "01-07-2022",
                    "date_utc": 1656682200,
                    "open": 136.04,
                    "high": 139.04,
                    "low": 135.66,
                    "close": 138.93,
                    "volume": 71051600,
                    "adjclose": 136.92
                },
                "1657027800": {
                    "date": "05-07-2022",
                    "date_utc": 1657027800,
                    "open": 137.77,
                    "high": 141.61,
                    "low": 136.93,
                    "close": 141.56,
                    "volume": 73353800,
                    "adjclose": 139.51
                },
                "1657114200": {
                    "date": "06-07-2022",
                    "date_utc": 1657114200,
                    "open": 141.35,
                    "high": 144.12,
                    "low": 141.08,
                    "close": 142.92,
                    "volume": 74064300,
                    "adjclose": 140.85
                },
                "1657200600": {
                    "date": "07-07-2022",
                    "date_utc": 1657200600,
                    "open": 143.29,
                    "high": 146.55,
                    "low": 143.28,
                    "close": 146.35,
                    "volume": 66253700,
                    "adjclose": 144.23
                },
                "1657287000": {
                    "date": "08-07-2022",
                    "date_utc": 1657287000,
                    "open": 145.26,
                    "high": 147.55,
                    "low": 145,
                    "close": 147.04,
                    "volume": 64547800,
                    "adjclose": 144.91
                },
                "1657546200": {
                    "date": "11-07-2022",
                    "date_utc": 1657546200,
                    "open": 145.67,
                    "high": 146.64,
                    "low": 143.78,
                    "close": 144.87,
                    "volume": 63141600,
                    "adjclose": 142.77
                },
                "1657632600": {
                    "date": "12-07-2022",
                    "date_utc": 1657632600,
                    "open": 145.76,
                    "high": 148.45,
                    "low": 145.05,
                    "close": 145.86,
                    "volume": 77588800,
                    "adjclose": 143.75
                },
                "1657719000": {
                    "date": "13-07-2022",
                    "date_utc": 1657719000,
                    "open": 142.99,
                    "high": 146.45,
                    "low": 142.12,
                    "close": 145.49,
                    "volume": 71185600,
                    "adjclose": 143.38
                },
                "1657805400": {
                    "date": "14-07-2022",
                    "date_utc": 1657805400,
                    "open": 144.08,
                    "high": 148.95,
                    "low": 143.25,
                    "close": 148.47,
                    "volume": 78140700,
                    "adjclose": 146.32
                },
                "1657891800": {
                    "date": "15-07-2022",
                    "date_utc": 1657891800,
                    "open": 149.78,
                    "high": 150.86,
                    "low": 148.2,
                    "close": 150.17,
                    "volume": 76259900,
                    "adjclose": 147.99
                },
                "1658151000": {
                    "date": "18-07-2022",
                    "date_utc": 1658151000,
                    "open": 150.74,
                    "high": 151.57,
                    "low": 146.7,
                    "close": 147.07,
                    "volume": 81420900,
                    "adjclose": 144.94
                },
                "1658237400": {
                    "date": "19-07-2022",
                    "date_utc": 1658237400,
                    "open": 147.92,
                    "high": 151.23,
                    "low": 146.91,
                    "close": 151,
                    "volume": 82982400,
                    "adjclose": 148.81
                },
                "1658323800": {
                    "date": "20-07-2022",
                    "date_utc": 1658323800,
                    "open": 151.12,
                    "high": 153.72,
                    "low": 150.37,
                    "close": 153.04,
                    "volume": 64823400,
                    "adjclose": 150.82
                },
                "1658410200": {
                    "date": "21-07-2022",
                    "date_utc": 1658410200,
                    "open": 154.5,
                    "high": 155.57,
                    "low": 151.94,
                    "close": 155.35,
                    "volume": 65086600,
                    "adjclose": 153.1
                },
                "1658496600": {
                    "date": "22-07-2022",
                    "date_utc": 1658496600,
                    "open": 155.39,
                    "high": 156.28,
                    "low": 153.41,
                    "close": 154.09,
                    "volume": 66675400,
                    "adjclose": 151.86
                },
                "1658755800": {
                    "date": "25-07-2022",
                    "date_utc": 1658755800,
                    "open": 154.01,
                    "high": 155.04,
                    "low": 152.28,
                    "close": 152.95,
                    "volume": 53623900,
                    "adjclose": 150.73
                },
                "1658842200": {
                    "date": "26-07-2022",
                    "date_utc": 1658842200,
                    "open": 152.26,
                    "high": 153.09,
                    "low": 150.8,
                    "close": 151.6,
                    "volume": 55138700,
                    "adjclose": 149.4
                },
                "1658928600": {
                    "date": "27-07-2022",
                    "date_utc": 1658928600,
                    "open": 152.58,
                    "high": 157.33,
                    "low": 152.16,
                    "close": 156.79,
                    "volume": 78620700,
                    "adjclose": 154.52
                },
                "1659015000": {
                    "date": "28-07-2022",
                    "date_utc": 1659015000,
                    "open": 156.98,
                    "high": 157.64,
                    "low": 154.41,
                    "close": 157.35,
                    "volume": 81378700,
                    "adjclose": 155.07
                },
                "1659101400": {
                    "date": "29-07-2022",
                    "date_utc": 1659101400,
                    "open": 161.24,
                    "high": 163.63,
                    "low": 159.5,
                    "close": 162.51,
                    "volume": 101786900,
                    "adjclose": 160.15
                },
                "1659360600": {
                    "date": "01-08-2022",
                    "date_utc": 1659360600,
                    "open": 161.01,
                    "high": 163.59,
                    "low": 160.89,
                    "close": 161.51,
                    "volume": 67829400,
                    "adjclose": 159.17
                },
                "1659447000": {
                    "date": "02-08-2022",
                    "date_utc": 1659447000,
                    "open": 160.1,
                    "high": 162.41,
                    "low": 159.63,
                    "close": 160.01,
                    "volume": 59907000,
                    "adjclose": 157.69
                },
                "1659533400": {
                    "date": "03-08-2022",
                    "date_utc": 1659533400,
                    "open": 160.84,
                    "high": 166.59,
                    "low": 160.75,
                    "close": 166.13,
                    "volume": 82507500,
                    "adjclose": 163.72
                },
                "1659619800": {
                    "date": "04-08-2022",
                    "date_utc": 1659619800,
                    "open": 166.01,
                    "high": 167.19,
                    "low": 164.43,
                    "close": 165.81,
                    "volume": 55474100,
                    "adjclose": 163.41
                },
                "1659706200": {
                    "date": "05-08-2022",
                    "date_utc": 1659706200,
                    "open": 163.21,
                    "high": 165.85,
                    "low": 163,
                    "close": 165.35,
                    "volume": 56697000,
                    "adjclose": 163.18
                },
                "1659965400": {
                    "date": "08-08-2022",
                    "date_utc": 1659965400,
                    "open": 166.37,
                    "high": 167.81,
                    "low": 164.2,
                    "close": 164.87,
                    "volume": 60276900,
                    "adjclose": 162.71
                },
                "1660051800": {
                    "date": "09-08-2022",
                    "date_utc": 1660051800,
                    "open": 164.02,
                    "high": 165.82,
                    "low": 163.25,
                    "close": 164.92,
                    "volume": 63135500,
                    "adjclose": 162.75
                },
                "1660138200": {
                    "date": "10-08-2022",
                    "date_utc": 1660138200,
                    "open": 167.68,
                    "high": 169.34,
                    "low": 166.9,
                    "close": 169.24,
                    "volume": 70170500,
                    "adjclose": 167.02
                },
                "1660224600": {
                    "date": "11-08-2022",
                    "date_utc": 1660224600,
                    "open": 170.06,
                    "high": 170.99,
                    "low": 168.19,
                    "close": 168.49,
                    "volume": 57149200,
                    "adjclose": 166.28
                },
                "1660311000": {
                    "date": "12-08-2022",
                    "date_utc": 1660311000,
                    "open": 169.82,
                    "high": 172.17,
                    "low": 169.4,
                    "close": 172.1,
                    "volume": 68039400,
                    "adjclose": 169.84
                },
                "1660570200": {
                    "date": "15-08-2022",
                    "date_utc": 1660570200,
                    "open": 171.52,
                    "high": 173.39,
                    "low": 171.35,
                    "close": 173.19,
                    "volume": 54091700,
                    "adjclose": 170.92
                },
                "1660656600": {
                    "date": "16-08-2022",
                    "date_utc": 1660656600,
                    "open": 172.78,
                    "high": 173.71,
                    "low": 171.66,
                    "close": 173.03,
                    "volume": 56377100,
                    "adjclose": 170.76
                },
                "1660743000": {
                    "date": "17-08-2022",
                    "date_utc": 1660743000,
                    "open": 172.77,
                    "high": 176.15,
                    "low": 172.57,
                    "close": 174.55,
                    "volume": 79542000,
                    "adjclose": 172.26
                },
                "1660829400": {
                    "date": "18-08-2022",
                    "date_utc": 1660829400,
                    "open": 173.75,
                    "high": 174.9,
                    "low": 173.12,
                    "close": 174.15,
                    "volume": 62290100,
                    "adjclose": 171.86
                },
                "1660915800": {
                    "date": "19-08-2022",
                    "date_utc": 1660915800,
                    "open": 173.03,
                    "high": 173.74,
                    "low": 171.31,
                    "close": 171.52,
                    "volume": 70346300,
                    "adjclose": 169.27
                },
                "1661175000": {
                    "date": "22-08-2022",
                    "date_utc": 1661175000,
                    "open": 169.69,
                    "high": 169.86,
                    "low": 167.14,
                    "close": 167.57,
                    "volume": 69026800,
                    "adjclose": 165.37
                },
                "1661261400": {
                    "date": "23-08-2022",
                    "date_utc": 1661261400,
                    "open": 167.08,
                    "high": 168.71,
                    "low": 166.65,
                    "close": 167.23,
                    "volume": 54147100,
                    "adjclose": 165.03
                },
                "1661347800": {
                    "date": "24-08-2022",
                    "date_utc": 1661347800,
                    "open": 167.32,
                    "high": 168.11,
                    "low": 166.25,
                    "close": 167.53,
                    "volume": 53841500,
                    "adjclose": 165.33
                },
                "1661434200": {
                    "date": "25-08-2022",
                    "date_utc": 1661434200,
                    "open": 168.78,
                    "high": 170.14,
                    "low": 168.35,
                    "close": 170.03,
                    "volume": 51218200,
                    "adjclose": 167.8
                },
                "1661520600": {
                    "date": "26-08-2022",
                    "date_utc": 1661520600,
                    "open": 170.57,
                    "high": 171.05,
                    "low": 163.56,
                    "close": 163.62,
                    "volume": 78961000,
                    "adjclose": 161.47
                },
                "1661779800": {
                    "date": "29-08-2022",
                    "date_utc": 1661779800,
                    "open": 161.15,
                    "high": 162.9,
                    "low": 159.82,
                    "close": 161.38,
                    "volume": 73314000,
                    "adjclose": 159.26
                },
                "1661866200": {
                    "date": "30-08-2022",
                    "date_utc": 1661866200,
                    "open": 162.13,
                    "high": 162.56,
                    "low": 157.72,
                    "close": 158.91,
                    "volume": 77906200,
                    "adjclose": 156.82
                },
                "1661952600": {
                    "date": "31-08-2022",
                    "date_utc": 1661952600,
                    "open": 160.31,
                    "high": 160.58,
                    "low": 157.14,
                    "close": 157.22,
                    "volume": 87991100,
                    "adjclose": 155.16
                },
                "1662039000": {
                    "date": "01-09-2022",
                    "date_utc": 1662039000,
                    "open": 156.64,
                    "high": 158.42,
                    "low": 154.67,
                    "close": 157.96,
                    "volume": 74229900,
                    "adjclose": 155.89
                },
                "1662125400": {
                    "date": "02-09-2022",
                    "date_utc": 1662125400,
                    "open": 159.75,
                    "high": 160.36,
                    "low": 154.97,
                    "close": 155.81,
                    "volume": 76957800,
                    "adjclose": 153.76
                },
                "1662471000": {
                    "date": "06-09-2022",
                    "date_utc": 1662471000,
                    "open": 156.47,
                    "high": 157.09,
                    "low": 153.69,
                    "close": 154.53,
                    "volume": 73714800,
                    "adjclose": 152.5
                },
                "1662557400": {
                    "date": "07-09-2022",
                    "date_utc": 1662557400,
                    "open": 154.82,
                    "high": 156.67,
                    "low": 153.61,
                    "close": 155.96,
                    "volume": 87449600,
                    "adjclose": 153.91
                },
                "1662643800": {
                    "date": "08-09-2022",
                    "date_utc": 1662643800,
                    "open": 154.64,
                    "high": 156.36,
                    "low": 152.68,
                    "close": 154.46,
                    "volume": 84923800,
                    "adjclose": 152.43
                },
                "1662730200": {
                    "date": "09-09-2022",
                    "date_utc": 1662730200,
                    "open": 155.47,
                    "high": 157.82,
                    "low": 154.75,
                    "close": 157.37,
                    "volume": 68028800,
                    "adjclose": 155.3
                },
                "1662989400": {
                    "date": "12-09-2022",
                    "date_utc": 1662989400,
                    "open": 159.59,
                    "high": 164.26,
                    "low": 159.3,
                    "close": 163.43,
                    "volume": 104956000,
                    "adjclose": 161.28
                },
                "1663075800": {
                    "date": "13-09-2022",
                    "date_utc": 1663075800,
                    "open": 159.9,
                    "high": 160.54,
                    "low": 153.37,
                    "close": 153.84,
                    "volume": 122656600,
                    "adjclose": 151.82
                },
                "1663162200": {
                    "date": "14-09-2022",
                    "date_utc": 1663162200,
                    "open": 154.79,
                    "high": 157.1,
                    "low": 153.61,
                    "close": 155.31,
                    "volume": 87965400,
                    "adjclose": 153.27
                },
                "1663248600": {
                    "date": "15-09-2022",
                    "date_utc": 1663248600,
                    "open": 154.65,
                    "high": 155.24,
                    "low": 151.38,
                    "close": 152.37,
                    "volume": 90481100,
                    "adjclose": 150.37
                },
                "1663335000": {
                    "date": "16-09-2022",
                    "date_utc": 1663335000,
                    "open": 151.21,
                    "high": 151.35,
                    "low": 148.37,
                    "close": 150.7,
                    "volume": 162278800,
                    "adjclose": 148.72
                },
                "1663594200": {
                    "date": "19-09-2022",
                    "date_utc": 1663594200,
                    "open": 149.31,
                    "high": 154.56,
                    "low": 149.1,
                    "close": 154.48,
                    "volume": 81474200,
                    "adjclose": 152.45
                },
                "1663680600": {
                    "date": "20-09-2022",
                    "date_utc": 1663680600,
                    "open": 153.4,
                    "high": 158.08,
                    "low": 153.08,
                    "close": 156.9,
                    "volume": 107689800,
                    "adjclose": 154.84
                },
                "1663767000": {
                    "date": "21-09-2022",
                    "date_utc": 1663767000,
                    "open": 157.34,
                    "high": 158.74,
                    "low": 153.6,
                    "close": 153.72,
                    "volume": 101696800,
                    "adjclose": 151.7
                },
                "1663853400": {
                    "date": "22-09-2022",
                    "date_utc": 1663853400,
                    "open": 152.38,
                    "high": 154.47,
                    "low": 150.91,
                    "close": 152.74,
                    "volume": 86652500,
                    "adjclose": 150.73
                },
                "1663939800": {
                    "date": "23-09-2022",
                    "date_utc": 1663939800,
                    "open": 151.19,
                    "high": 151.47,
                    "low": 148.56,
                    "close": 150.43,
                    "volume": 96029900,
                    "adjclose": 148.45
                },
                "1664199000": {
                    "date": "26-09-2022",
                    "date_utc": 1664199000,
                    "open": 149.66,
                    "high": 153.77,
                    "low": 149.64,
                    "close": 150.77,
                    "volume": 93339400,
                    "adjclose": 148.79
                },
                "1664285400": {
                    "date": "27-09-2022",
                    "date_utc": 1664285400,
                    "open": 152.74,
                    "high": 154.72,
                    "low": 149.95,
                    "close": 151.76,
                    "volume": 84442700,
                    "adjclose": 149.77
                },
                "1664371800": {
                    "date": "28-09-2022",
                    "date_utc": 1664371800,
                    "open": 147.64,
                    "high": 150.64,
                    "low": 144.84,
                    "close": 149.84,
                    "volume": 146691400,
                    "adjclose": 147.87
                },
                "1664458200": {
                    "date": "29-09-2022",
                    "date_utc": 1664458200,
                    "open": 146.1,
                    "high": 146.72,
                    "low": 140.68,
                    "close": 142.48,
                    "volume": 128138200,
                    "adjclose": 140.61
                },
                "1664544600": {
                    "date": "30-09-2022",
                    "date_utc": 1664544600,
                    "open": 141.28,
                    "high": 143.1,
                    "low": 138,
                    "close": 138.2,
                    "volume": 124925300,
                    "adjclose": 136.39
                },
                "1664803800": {
                    "date": "03-10-2022",
                    "date_utc": 1664803800,
                    "open": 138.21,
                    "high": 143.07,
                    "low": 137.69,
                    "close": 142.45,
                    "volume": 114311700,
                    "adjclose": 140.58
                },
                "1664890200": {
                    "date": "04-10-2022",
                    "date_utc": 1664890200,
                    "open": 145.03,
                    "high": 146.22,
                    "low": 144.26,
                    "close": 146.1,
                    "volume": 87830100,
                    "adjclose": 144.18
                },
                "1664976600": {
                    "date": "05-10-2022",
                    "date_utc": 1664976600,
                    "open": 144.07,
                    "high": 147.38,
                    "low": 143.01,
                    "close": 146.4,
                    "volume": 79471000,
                    "adjclose": 144.48
                },
                "1665063000": {
                    "date": "06-10-2022",
                    "date_utc": 1665063000,
                    "open": 145.81,
                    "high": 147.54,
                    "low": 145.22,
                    "close": 145.43,
                    "volume": 68402200,
                    "adjclose": 143.52
                },
                "1665149400": {
                    "date": "07-10-2022",
                    "date_utc": 1665149400,
                    "open": 142.54,
                    "high": 143.1,
                    "low": 139.45,
                    "close": 140.09,
                    "volume": 85925600,
                    "adjclose": 138.25
                },
                "1665408600": {
                    "date": "10-10-2022",
                    "date_utc": 1665408600,
                    "open": 140.42,
                    "high": 141.89,
                    "low": 138.57,
                    "close": 140.42,
                    "volume": 74899000,
                    "adjclose": 138.58
                },
                "1665495000": {
                    "date": "11-10-2022",
                    "date_utc": 1665495000,
                    "open": 139.9,
                    "high": 141.35,
                    "low": 138.22,
                    "close": 138.98,
                    "volume": 77033700,
                    "adjclose": 137.16
                },
                "1665581400": {
                    "date": "12-10-2022",
                    "date_utc": 1665581400,
                    "open": 139.13,
                    "high": 140.36,
                    "low": 138.16,
                    "close": 138.34,
                    "volume": 70433700,
                    "adjclose": 136.52
                },
                "1665667800": {
                    "date": "13-10-2022",
                    "date_utc": 1665667800,
                    "open": 134.99,
                    "high": 143.59,
                    "low": 134.37,
                    "close": 142.99,
                    "volume": 113224000,
                    "adjclose": 141.11
                },
                "1665754200": {
                    "date": "14-10-2022",
                    "date_utc": 1665754200,
                    "open": 144.31,
                    "high": 144.52,
                    "low": 138.19,
                    "close": 138.38,
                    "volume": 88598000,
                    "adjclose": 136.56
                },
                "1666013400": {
                    "date": "17-10-2022",
                    "date_utc": 1666013400,
                    "open": 141.07,
                    "high": 142.9,
                    "low": 140.27,
                    "close": 142.41,
                    "volume": 85250900,
                    "adjclose": 140.54
                },
                "1666099800": {
                    "date": "18-10-2022",
                    "date_utc": 1666099800,
                    "open": 145.49,
                    "high": 146.7,
                    "low": 140.61,
                    "close": 143.75,
                    "volume": 99136600,
                    "adjclose": 141.86
                },
                "1666186200": {
                    "date": "19-10-2022",
                    "date_utc": 1666186200,
                    "open": 141.69,
                    "high": 144.95,
                    "low": 141.5,
                    "close": 143.86,
                    "volume": 61758300,
                    "adjclose": 141.97
                },
                "1666272600": {
                    "date": "20-10-2022",
                    "date_utc": 1666272600,
                    "open": 143.02,
                    "high": 145.89,
                    "low": 142.65,
                    "close": 143.39,
                    "volume": 64522000,
                    "adjclose": 141.51
                },
                "1666359000": {
                    "date": "21-10-2022",
                    "date_utc": 1666359000,
                    "open": 142.87,
                    "high": 147.85,
                    "low": 142.65,
                    "close": 147.27,
                    "volume": 86548600,
                    "adjclose": 145.34
                },
                "1666618200": {
                    "date": "24-10-2022",
                    "date_utc": 1666618200,
                    "open": 147.19,
                    "high": 150.23,
                    "low": 146,
                    "close": 149.45,
                    "volume": 75981900,
                    "adjclose": 147.49
                },
                "1666704600": {
                    "date": "25-10-2022",
                    "date_utc": 1666704600,
                    "open": 150.09,
                    "high": 152.49,
                    "low": 149.36,
                    "close": 152.34,
                    "volume": 74732300,
                    "adjclose": 150.34
                },
                "1666791000": {
                    "date": "26-10-2022",
                    "date_utc": 1666791000,
                    "open": 150.96,
                    "high": 151.99,
                    "low": 148.04,
                    "close": 149.35,
                    "volume": 88194300,
                    "adjclose": 147.39
                },
                "1666877400": {
                    "date": "27-10-2022",
                    "date_utc": 1666877400,
                    "open": 148.07,
                    "high": 149.05,
                    "low": 144.13,
                    "close": 144.8,
                    "volume": 109180200,
                    "adjclose": 142.9
                },
                "1666963800": {
                    "date": "28-10-2022",
                    "date_utc": 1666963800,
                    "open": 148.2,
                    "high": 157.5,
                    "low": 147.82,
                    "close": 155.74,
                    "volume": 164762400,
                    "adjclose": 153.7
                },
                "1667223000": {
                    "date": "31-10-2022",
                    "date_utc": 1667223000,
                    "open": 153.16,
                    "high": 154.24,
                    "low": 151.92,
                    "close": 153.34,
                    "volume": 97943200,
                    "adjclose": 151.33
                },
                "1667309400": {
                    "date": "01-11-2022",
                    "date_utc": 1667309400,
                    "open": 155.08,
                    "high": 155.45,
                    "low": 149.13,
                    "close": 150.65,
                    "volume": 80379300,
                    "adjclose": 148.67
                },
                "1667395800": {
                    "date": "02-11-2022",
                    "date_utc": 1667395800,
                    "open": 148.95,
                    "high": 152.17,
                    "low": 145,
                    "close": 145.03,
                    "volume": 93604600,
                    "adjclose": 143.13
                },
                "1667482200": {
                    "date": "03-11-2022",
                    "date_utc": 1667482200,
                    "open": 142.06,
                    "high": 142.8,
                    "low": 138.75,
                    "close": 138.88,
                    "volume": 97918500,
                    "adjclose": 137.06
                },
                "1667568600": {
                    "date": "04-11-2022",
                    "date_utc": 1667568600,
                    "open": 142.09,
                    "high": 142.67,
                    "low": 134.38,
                    "close": 138.38,
                    "volume": 140814800,
                    "adjclose": 136.79
                },
                "1667831400": {
                    "date": "07-11-2022",
                    "date_utc": 1667831400,
                    "open": 137.11,
                    "high": 139.15,
                    "low": 135.67,
                    "close": 138.92,
                    "volume": 83374600,
                    "adjclose": 137.32
                },
                "1667917800": {
                    "date": "08-11-2022",
                    "date_utc": 1667917800,
                    "open": 140.41,
                    "high": 141.43,
                    "low": 137.49,
                    "close": 139.5,
                    "volume": 89908500,
                    "adjclose": 137.9
                },
                "1668004200": {
                    "date": "09-11-2022",
                    "date_utc": 1668004200,
                    "open": 138.5,
                    "high": 138.55,
                    "low": 134.59,
                    "close": 134.87,
                    "volume": 74917800,
                    "adjclose": 133.32
                },
                "1668090600": {
                    "date": "10-11-2022",
                    "date_utc": 1668090600,
                    "open": 141.24,
                    "high": 146.87,
                    "low": 139.5,
                    "close": 146.87,
                    "volume": 118854000,
                    "adjclose": 145.18
                },
                "1668177000": {
                    "date": "11-11-2022",
                    "date_utc": 1668177000,
                    "open": 145.82,
                    "high": 150.01,
                    "low": 144.37,
                    "close": 149.7,
                    "volume": 93979700,
                    "adjclose": 147.98
                },
                "1668436200": {
                    "date": "14-11-2022",
                    "date_utc": 1668436200,
                    "open": 148.97,
                    "high": 150.28,
                    "low": 147.43,
                    "close": 148.28,
                    "volume": 73374100,
                    "adjclose": 146.58
                },
                "1668522600": {
                    "date": "15-11-2022",
                    "date_utc": 1668522600,
                    "open": 152.22,
                    "high": 153.59,
                    "low": 148.56,
                    "close": 150.04,
                    "volume": 89868300,
                    "adjclose": 148.32
                },
                "1668609000": {
                    "date": "16-11-2022",
                    "date_utc": 1668609000,
                    "open": 149.13,
                    "high": 149.87,
                    "low": 147.29,
                    "close": 148.79,
                    "volume": 64218300,
                    "adjclose": 147.08
                },
                "1668695400": {
                    "date": "17-11-2022",
                    "date_utc": 1668695400,
                    "open": 146.43,
                    "high": 151.48,
                    "low": 146.15,
                    "close": 150.72,
                    "volume": 80389400,
                    "adjclose": 148.99
                },
                "1668781800": {
                    "date": "18-11-2022",
                    "date_utc": 1668781800,
                    "open": 152.31,
                    "high": 152.7,
                    "low": 149.97,
                    "close": 151.29,
                    "volume": 74829600,
                    "adjclose": 149.55
                },
                "1669041000": {
                    "date": "21-11-2022",
                    "date_utc": 1669041000,
                    "open": 150.16,
                    "high": 150.37,
                    "low": 147.72,
                    "close": 148.01,
                    "volume": 58724100,
                    "adjclose": 146.31
                },
                "1669127400": {
                    "date": "22-11-2022",
                    "date_utc": 1669127400,
                    "open": 148.13,
                    "high": 150.42,
                    "low": 146.93,
                    "close": 150.18,
                    "volume": 51804100,
                    "adjclose": 148.45
                },
                "1669213800": {
                    "date": "23-11-2022",
                    "date_utc": 1669213800,
                    "open": 149.45,
                    "high": 151.83,
                    "low": 149.34,
                    "close": 151.07,
                    "volume": 58301400,
                    "adjclose": 149.33
                },
                "1669386600": {
                    "date": "25-11-2022",
                    "date_utc": 1669386600,
                    "open": 148.31,
                    "high": 148.88,
                    "low": 147.12,
                    "close": 148.11,
                    "volume": 35195900,
                    "adjclose": 146.41
                },
                "1669645800": {
                    "date": "28-11-2022",
                    "date_utc": 1669645800,
                    "open": 145.14,
                    "high": 146.64,
                    "low": 143.38,
                    "close": 144.22,
                    "volume": 69246000,
                    "adjclose": 142.56
                },
                "1669732200": {
                    "date": "29-11-2022",
                    "date_utc": 1669732200,
                    "open": 144.29,
                    "high": 144.81,
                    "low": 140.35,
                    "close": 141.17,
                    "volume": 83763800,
                    "adjclose": 139.55
                },
                "1669818600": {
                    "date": "30-11-2022",
                    "date_utc": 1669818600,
                    "open": 141.4,
                    "high": 148.72,
                    "low": 140.55,
                    "close": 148.03,
                    "volume": 111380900,
                    "adjclose": 146.33
                },
                "1669905000": {
                    "date": "01-12-2022",
                    "date_utc": 1669905000,
                    "open": 148.21,
                    "high": 149.13,
                    "low": 146.61,
                    "close": 148.31,
                    "volume": 71250400,
                    "adjclose": 146.61
                },
                "1669991400": {
                    "date": "02-12-2022",
                    "date_utc": 1669991400,
                    "open": 145.96,
                    "high": 148,
                    "low": 145.65,
                    "close": 147.81,
                    "volume": 65447400,
                    "adjclose": 146.11
                },
                "1670250600": {
                    "date": "05-12-2022",
                    "date_utc": 1670250600,
                    "open": 147.77,
                    "high": 150.92,
                    "low": 145.77,
                    "close": 146.63,
                    "volume": 68826400,
                    "adjclose": 144.94
                },
                "1670337000": {
                    "date": "06-12-2022",
                    "date_utc": 1670337000,
                    "open": 147.07,
                    "high": 147.3,
                    "low": 141.92,
                    "close": 142.91,
                    "volume": 64727200,
                    "adjclose": 141.27
                },
                "1670423400": {
                    "date": "07-12-2022",
                    "date_utc": 1670423400,
                    "open": 142.19,
                    "high": 143.37,
                    "low": 140,
                    "close": 140.94,
                    "volume": 69721100,
                    "adjclose": 139.32
                },
                "1670509800": {
                    "date": "08-12-2022",
                    "date_utc": 1670509800,
                    "open": 142.36,
                    "high": 143.52,
                    "low": 141.1,
                    "close": 142.65,
                    "volume": 62128300,
                    "adjclose": 141.01
                },
                "1670596200": {
                    "date": "09-12-2022",
                    "date_utc": 1670596200,
                    "open": 142.34,
                    "high": 145.57,
                    "low": 140.9,
                    "close": 142.16,
                    "volume": 76097000,
                    "adjclose": 140.53
                },
                "1670855400": {
                    "date": "12-12-2022",
                    "date_utc": 1670855400,
                    "open": 142.7,
                    "high": 144.5,
                    "low": 141.06,
                    "close": 144.49,
                    "volume": 70462700,
                    "adjclose": 142.83
                },
                "1670941800": {
                    "date": "13-12-2022",
                    "date_utc": 1670941800,
                    "open": 149.5,
                    "high": 149.97,
                    "low": 144.24,
                    "close": 145.47,
                    "volume": 93886200,
                    "adjclose": 143.8
                },
                "1671028200": {
                    "date": "14-12-2022",
                    "date_utc": 1671028200,
                    "open": 145.35,
                    "high": 146.66,
                    "low": 141.16,
                    "close": 143.21,
                    "volume": 82291200,
                    "adjclose": 141.56
                },
                "1671114600": {
                    "date": "15-12-2022",
                    "date_utc": 1671114600,
                    "open": 141.11,
                    "high": 141.8,
                    "low": 136.03,
                    "close": 136.5,
                    "volume": 98931900,
                    "adjclose": 134.93
                },
                "1671201000": {
                    "date": "16-12-2022",
                    "date_utc": 1671201000,
                    "open": 136.69,
                    "high": 137.65,
                    "low": 133.73,
                    "close": 134.51,
                    "volume": 160156900,
                    "adjclose": 132.96
                },
                "1671460200": {
                    "date": "19-12-2022",
                    "date_utc": 1671460200,
                    "open": 135.11,
                    "high": 135.2,
                    "low": 131.32,
                    "close": 132.37,
                    "volume": 79592600,
                    "adjclose": 130.85
                },
                "1671546600": {
                    "date": "20-12-2022",
                    "date_utc": 1671546600,
                    "open": 131.39,
                    "high": 133.25,
                    "low": 129.89,
                    "close": 132.3,
                    "volume": 77432800,
                    "adjclose": 130.78
                },
                "1671633000": {
                    "date": "21-12-2022",
                    "date_utc": 1671633000,
                    "open": 132.98,
                    "high": 136.81,
                    "low": 132.75,
                    "close": 135.45,
                    "volume": 85928000,
                    "adjclose": 133.89
                },
                "1671719400": {
                    "date": "22-12-2022",
                    "date_utc": 1671719400,
                    "open": 134.35,
                    "high": 134.56,
                    "low": 130.3,
                    "close": 132.23,
                    "volume": 77852100,
                    "adjclose": 130.71
                },
                "1671805800": {
                    "date": "23-12-2022",
                    "date_utc": 1671805800,
                    "open": 130.92,
                    "high": 132.42,
                    "low": 129.64,
                    "close": 131.86,
                    "volume": 63814900,
                    "adjclose": 130.34
                },
                "1672151400": {
                    "date": "27-12-2022",
                    "date_utc": 1672151400,
                    "open": 131.38,
                    "high": 131.41,
                    "low": 128.72,
                    "close": 130.03,
                    "volume": 69007800,
                    "adjclose": 128.54
                },
                "1672237800": {
                    "date": "28-12-2022",
                    "date_utc": 1672237800,
                    "open": 129.67,
                    "high": 131.03,
                    "low": 125.87,
                    "close": 126.04,
                    "volume": 85438400,
                    "adjclose": 124.59
                },
                "1672324200": {
                    "date": "29-12-2022",
                    "date_utc": 1672324200,
                    "open": 127.99,
                    "high": 130.48,
                    "low": 127.73,
                    "close": 129.61,
                    "volume": 75703700,
                    "adjclose": 128.12
                },
                "1672410600": {
                    "date": "30-12-2022",
                    "date_utc": 1672410600,
                    "open": 128.41,
                    "high": 129.95,
                    "low": 127.43,
                    "close": 129.93,
                    "volume": 77034200,
                    "adjclose": 128.44
                },
                "1672756200": {
                    "date": "03-01-2023",
                    "date_utc": 1672756200,
                    "open": 130.28,
                    "high": 130.9,
                    "low": 124.17,
                    "close": 125.07,
                    "volume": 112117500,
                    "adjclose": 123.63
                },
                "1672842600": {
                    "date": "04-01-2023",
                    "date_utc": 1672842600,
                    "open": 126.89,
                    "high": 128.66,
                    "low": 125.08,
                    "close": 126.36,
                    "volume": 89113600,
                    "adjclose": 124.91
                },
                "1672929000": {
                    "date": "05-01-2023",
                    "date_utc": 1672929000,
                    "open": 127.13,
                    "high": 127.77,
                    "low": 124.76,
                    "close": 125.02,
                    "volume": 80962700,
                    "adjclose": 123.58
                },
                "1673015400": {
                    "date": "06-01-2023",
                    "date_utc": 1673015400,
                    "open": 126.01,
                    "high": 130.29,
                    "low": 124.89,
                    "close": 129.62,
                    "volume": 87754700,
                    "adjclose": 128.13
                },
                "1673274600": {
                    "date": "09-01-2023",
                    "date_utc": 1673274600,
                    "open": 130.47,
                    "high": 133.41,
                    "low": 129.89,
                    "close": 130.15,
                    "volume": 70790800,
                    "adjclose": 128.65
                },
                "1673361000": {
                    "date": "10-01-2023",
                    "date_utc": 1673361000,
                    "open": 130.26,
                    "high": 131.26,
                    "low": 128.12,
                    "close": 130.73,
                    "volume": 63896200,
                    "adjclose": 129.23
                },
                "1673447400": {
                    "date": "11-01-2023",
                    "date_utc": 1673447400,
                    "open": 131.25,
                    "high": 133.51,
                    "low": 130.46,
                    "close": 133.49,
                    "volume": 69458900,
                    "adjclose": 131.96
                },
                "1673533800": {
                    "date": "12-01-2023",
                    "date_utc": 1673533800,
                    "open": 133.88,
                    "high": 134.26,
                    "low": 131.44,
                    "close": 133.41,
                    "volume": 71379600,
                    "adjclose": 131.88
                },
                "1673620200": {
                    "date": "13-01-2023",
                    "date_utc": 1673620200,
                    "open": 132.03,
                    "high": 134.92,
                    "low": 131.66,
                    "close": 134.76,
                    "volume": 57809700,
                    "adjclose": 133.21
                },
                "1673965800": {
                    "date": "17-01-2023",
                    "date_utc": 1673965800,
                    "open": 134.83,
                    "high": 137.29,
                    "low": 134.13,
                    "close": 135.94,
                    "volume": 63646600,
                    "adjclose": 134.38
                },
                "1674052200": {
                    "date": "18-01-2023",
                    "date_utc": 1674052200,
                    "open": 136.82,
                    "high": 138.61,
                    "low": 135.03,
                    "close": 135.21,
                    "volume": 69672800,
                    "adjclose": 133.66
                },
                "1674138600": {
                    "date": "19-01-2023",
                    "date_utc": 1674138600,
                    "open": 134.08,
                    "high": 136.25,
                    "low": 133.77,
                    "close": 135.27,
                    "volume": 58280400,
                    "adjclose": 133.72
                },
                "1674225000": {
                    "date": "20-01-2023",
                    "date_utc": 1674225000,
                    "open": 135.28,
                    "high": 138.02,
                    "low": 134.22,
                    "close": 137.87,
                    "volume": 80223600,
                    "adjclose": 136.29
                },
                "1674484200": {
                    "date": "23-01-2023",
                    "date_utc": 1674484200,
                    "open": 138.12,
                    "high": 143.32,
                    "low": 137.9,
                    "close": 141.11,
                    "volume": 81760300,
                    "adjclose": 139.49
                },
                "1674570600": {
                    "date": "24-01-2023",
                    "date_utc": 1674570600,
                    "open": 140.31,
                    "high": 143.16,
                    "low": 140.3,
                    "close": 142.53,
                    "volume": 66435100,
                    "adjclose": 140.89
                },
                "1674657000": {
                    "date": "25-01-2023",
                    "date_utc": 1674657000,
                    "open": 140.89,
                    "high": 142.43,
                    "low": 138.81,
                    "close": 141.86,
                    "volume": 65799300,
                    "adjclose": 140.23
                },
                "1674743400": {
                    "date": "26-01-2023",
                    "date_utc": 1674743400,
                    "open": 143.17,
                    "high": 144.25,
                    "low": 141.9,
                    "close": 143.96,
                    "volume": 54105100,
                    "adjclose": 142.31
                },
                "1674829800": {
                    "date": "27-01-2023",
                    "date_utc": 1674829800,
                    "open": 143.16,
                    "high": 147.23,
                    "low": 143.08,
                    "close": 145.93,
                    "volume": 70555800,
                    "adjclose": 144.25
                },
                "1675089000": {
                    "date": "30-01-2023",
                    "date_utc": 1675089000,
                    "open": 144.96,
                    "high": 145.55,
                    "low": 142.85,
                    "close": 143,
                    "volume": 64015300,
                    "adjclose": 141.36
                },
                "1675175400": {
                    "date": "31-01-2023",
                    "date_utc": 1675175400,
                    "open": 142.7,
                    "high": 144.34,
                    "low": 142.28,
                    "close": 144.29,
                    "volume": 65874500,
                    "adjclose": 142.63
                },
                "1675261800": {
                    "date": "01-02-2023",
                    "date_utc": 1675261800,
                    "open": 143.97,
                    "high": 146.61,
                    "low": 141.32,
                    "close": 145.43,
                    "volume": 77663600,
                    "adjclose": 143.76
                },
                "1675348200": {
                    "date": "02-02-2023",
                    "date_utc": 1675348200,
                    "open": 148.9,
                    "high": 151.18,
                    "low": 148.17,
                    "close": 150.82,
                    "volume": 118339000,
                    "adjclose": 149.09
                },
                "1675434600": {
                    "date": "03-02-2023",
                    "date_utc": 1675434600,
                    "open": 148.03,
                    "high": 157.38,
                    "low": 147.83,
                    "close": 154.5,
                    "volume": 154357300,
                    "adjclose": 152.72
                },
                "1675693800": {
                    "date": "06-02-2023",
                    "date_utc": 1675693800,
                    "open": 152.57,
                    "high": 153.1,
                    "low": 150.78,
                    "close": 151.73,
                    "volume": 69858300,
                    "adjclose": 149.99
                },
                "1675780200": {
                    "date": "07-02-2023",
                    "date_utc": 1675780200,
                    "open": 150.64,
                    "high": 155.23,
                    "low": 150.64,
                    "close": 154.65,
                    "volume": 83322600,
                    "adjclose": 152.87
                },
                "1675866600": {
                    "date": "08-02-2023",
                    "date_utc": 1675866600,
                    "open": 153.88,
                    "high": 154.58,
                    "low": 151.17,
                    "close": 151.92,
                    "volume": 64120100,
                    "adjclose": 150.17
                },
                "1675953000": {
                    "date": "09-02-2023",
                    "date_utc": 1675953000,
                    "open": 153.78,
                    "high": 154.33,
                    "low": 150.42,
                    "close": 150.87,
                    "volume": 56007100,
                    "adjclose": 149.14
                },
                "1676039400": {
                    "date": "10-02-2023",
                    "date_utc": 1676039400,
                    "open": 149.46,
                    "high": 151.34,
                    "low": 149.22,
                    "close": 151.01,
                    "volume": 57450700,
                    "adjclose": 149.5
                },
                "1676298600": {
                    "date": "13-02-2023",
                    "date_utc": 1676298600,
                    "open": 150.95,
                    "high": 154.26,
                    "low": 150.92,
                    "close": 153.85,
                    "volume": 62199000,
                    "adjclose": 152.31
                },
                "1676385000": {
                    "date": "14-02-2023",
                    "date_utc": 1676385000,
                    "open": 152.12,
                    "high": 153.77,
                    "low": 150.86,
                    "close": 153.2,
                    "volume": 61707600,
                    "adjclose": 151.67
                },
                "1676471400": {
                    "date": "15-02-2023",
                    "date_utc": 1676471400,
                    "open": 153.11,
                    "high": 155.5,
                    "low": 152.88,
                    "close": 155.33,
                    "volume": 65573800,
                    "adjclose": 153.78
                },
                "1676557800": {
                    "date": "16-02-2023",
                    "date_utc": 1676557800,
                    "open": 153.51,
                    "high": 156.33,
                    "low": 153.35,
                    "close": 153.71,
                    "volume": 68167900,
                    "adjclose": 152.18
                },
                "1676644200": {
                    "date": "17-02-2023",
                    "date_utc": 1676644200,
                    "open": 152.35,
                    "high": 153,
                    "low": 150.85,
                    "close": 152.55,
                    "volume": 59144100,
                    "adjclose": 151.03
                },
                "1676989800": {
                    "date": "21-02-2023",
                    "date_utc": 1676989800,
                    "open": 150.2,
                    "high": 151.3,
                    "low": 148.41,
                    "close": 148.48,
                    "volume": 58867200,
                    "adjclose": 147
                },
                "1677076200": {
                    "date": "22-02-2023",
                    "date_utc": 1677076200,
                    "open": 148.87,
                    "high": 149.95,
                    "low": 147.16,
                    "close": 148.91,
                    "volume": 51011300,
                    "adjclose": 147.42
                },
                "1677162600": {
                    "date": "23-02-2023",
                    "date_utc": 1677162600,
                    "open": 150.09,
                    "high": 150.34,
                    "low": 147.24,
                    "close": 149.4,
                    "volume": 48394200,
                    "adjclose": 147.91
                },
                "1677249000": {
                    "date": "24-02-2023",
                    "date_utc": 1677249000,
                    "open": 147.11,
                    "high": 147.19,
                    "low": 145.72,
                    "close": 146.71,
                    "volume": 55469600,
                    "adjclose": 145.25
                },
                "1677508200": {
                    "date": "27-02-2023",
                    "date_utc": 1677508200,
                    "open": 147.71,
                    "high": 149.17,
                    "low": 147.45,
                    "close": 147.92,
                    "volume": 44998500,
                    "adjclose": 146.44
                },
                "1677594600": {
                    "date": "28-02-2023",
                    "date_utc": 1677594600,
                    "open": 147.05,
                    "high": 149.08,
                    "low": 146.83,
                    "close": 147.41,
                    "volume": 50547000,
                    "adjclose": 145.94
                },
                "1677681000": {
                    "date": "01-03-2023",
                    "date_utc": 1677681000,
                    "open": 146.83,
                    "high": 147.23,
                    "low": 145.01,
                    "close": 145.31,
                    "volume": 55479000,
                    "adjclose": 143.86
                },
                "1677767400": {
                    "date": "02-03-2023",
                    "date_utc": 1677767400,
                    "open": 144.38,
                    "high": 146.71,
                    "low": 143.9,
                    "close": 145.91,
                    "volume": 52238100,
                    "adjclose": 144.45
                },
                "1677853800": {
                    "date": "03-03-2023",
                    "date_utc": 1677853800,
                    "open": 148.04,
                    "high": 151.11,
                    "low": 147.33,
                    "close": 151.03,
                    "volume": 70732300,
                    "adjclose": 149.52
                },
                "1678113000": {
                    "date": "06-03-2023",
                    "date_utc": 1678113000,
                    "open": 153.79,
                    "high": 156.3,
                    "low": 153.46,
                    "close": 153.83,
                    "volume": 87558000,
                    "adjclose": 152.29
                },
                "1678199400": {
                    "date": "07-03-2023",
                    "date_utc": 1678199400,
                    "open": 153.7,
                    "high": 154.03,
                    "low": 151.13,
                    "close": 151.6,
                    "volume": 56182000,
                    "adjclose": 150.09
                },
                "1678285800": {
                    "date": "08-03-2023",
                    "date_utc": 1678285800,
                    "open": 152.81,
                    "high": 153.47,
                    "low": 151.83,
                    "close": 152.87,
                    "volume": 47204800,
                    "adjclose": 151.34
                },
                "1678372200": {
                    "date": "09-03-2023",
                    "date_utc": 1678372200,
                    "open": 153.56,
                    "high": 154.54,
                    "low": 150.23,
                    "close": 150.59,
                    "volume": 53833600,
                    "adjclose": 149.09
                },
                "1678458600": {
                    "date": "10-03-2023",
                    "date_utc": 1678458600,
                    "open": 150.21,
                    "high": 150.94,
                    "low": 147.61,
                    "close": 148.5,
                    "volume": 68572400,
                    "adjclose": 147.02
                },
                "1678714200": {
                    "date": "13-03-2023",
                    "date_utc": 1678714200,
                    "open": 147.81,
                    "high": 153.14,
                    "low": 147.7,
                    "close": 150.47,
                    "volume": 84457100,
                    "adjclose": 148.97
                },
                "1678800600": {
                    "date": "14-03-2023",
                    "date_utc": 1678800600,
                    "open": 151.28,
                    "high": 153.4,
                    "low": 150.1,
                    "close": 152.59,
                    "volume": 73695900,
                    "adjclose": 151.07
                },
                "1678887000": {
                    "date": "15-03-2023",
                    "date_utc": 1678887000,
                    "open": 151.19,
                    "high": 153.25,
                    "low": 149.92,
                    "close": 152.99,
                    "volume": 77167900,
                    "adjclose": 151.46
                },
                "1678973400": {
                    "date": "16-03-2023",
                    "date_utc": 1678973400,
                    "open": 152.16,
                    "high": 156.46,
                    "low": 151.64,
                    "close": 155.85,
                    "volume": 76161100,
                    "adjclose": 154.29
                },
                "1679059800": {
                    "date": "17-03-2023",
                    "date_utc": 1679059800,
                    "open": 156.08,
                    "high": 156.74,
                    "low": 154.28,
                    "close": 155,
                    "volume": 98944600,
                    "adjclose": 153.45
                },
                "1679319000": {
                    "date": "20-03-2023",
                    "date_utc": 1679319000,
                    "open": 155.07,
                    "high": 157.82,
                    "low": 154.15,
                    "close": 157.4,
                    "volume": 73641400,
                    "adjclose": 155.83
                },
                "1679405400": {
                    "date": "21-03-2023",
                    "date_utc": 1679405400,
                    "open": 157.32,
                    "high": 159.4,
                    "low": 156.54,
                    "close": 159.28,
                    "volume": 73938300,
                    "adjclose": 157.69
                },
                "1679491800": {
                    "date": "22-03-2023",
                    "date_utc": 1679491800,
                    "open": 159.3,
                    "high": 162.14,
                    "low": 157.81,
                    "close": 157.83,
                    "volume": 75701800,
                    "adjclose": 156.25
                },
                "1679578200": {
                    "date": "23-03-2023",
                    "date_utc": 1679578200,
                    "open": 158.83,
                    "high": 161.55,
                    "low": 157.68,
                    "close": 158.93,
                    "volume": 67622100,
                    "adjclose": 157.34
                },
                "1679664600": {
                    "date": "24-03-2023",
                    "date_utc": 1679664600,
                    "open": 158.86,
                    "high": 160.34,
                    "low": 157.85,
                    "close": 160.25,
                    "volume": 59196500,
                    "adjclose": 158.65
                },
                "1679923800": {
                    "date": "27-03-2023",
                    "date_utc": 1679923800,
                    "open": 159.94,
                    "high": 160.77,
                    "low": 157.87,
                    "close": 158.28,
                    "volume": 52390300,
                    "adjclose": 156.7
                },
                "1680010200": {
                    "date": "28-03-2023",
                    "date_utc": 1680010200,
                    "open": 157.97,
                    "high": 158.49,
                    "low": 155.98,
                    "close": 157.65,
                    "volume": 45992200,
                    "adjclose": 156.08
                },
                "1680096600": {
                    "date": "29-03-2023",
                    "date_utc": 1680096600,
                    "open": 159.37,
                    "high": 161.05,
                    "low": 159.35,
                    "close": 160.77,
                    "volume": 51305700,
                    "adjclose": 159.16
                },
                "1680183000": {
                    "date": "30-03-2023",
                    "date_utc": 1680183000,
                    "open": 161.53,
                    "high": 162.47,
                    "low": 161.27,
                    "close": 162.36,
                    "volume": 49501700,
                    "adjclose": 160.74
                },
                "1680269400": {
                    "date": "31-03-2023",
                    "date_utc": 1680269400,
                    "open": 162.44,
                    "high": 165,
                    "low": 161.91,
                    "close": 164.9,
                    "volume": 68749800,
                    "adjclose": 163.25
                },
                "1680528600": {
                    "date": "03-04-2023",
                    "date_utc": 1680528600,
                    "open": 164.27,
                    "high": 166.29,
                    "low": 164.22,
                    "close": 166.17,
                    "volume": 56976200,
                    "adjclose": 164.51
                },
                "1680615000": {
                    "date": "04-04-2023",
                    "date_utc": 1680615000,
                    "open": 166.6,
                    "high": 166.84,
                    "low": 165.11,
                    "close": 165.63,
                    "volume": 46278300,
                    "adjclose": 163.98
                },
                "1680701400": {
                    "date": "05-04-2023",
                    "date_utc": 1680701400,
                    "open": 164.74,
                    "high": 165.05,
                    "low": 161.8,
                    "close": 163.76,
                    "volume": 51511700,
                    "adjclose": 162.13
                },
                "1680787800": {
                    "date": "06-04-2023",
                    "date_utc": 1680787800,
                    "open": 162.43,
                    "high": 164.96,
                    "low": 162,
                    "close": 164.66,
                    "volume": 45390100,
                    "adjclose": 163.02
                },
                "1681133400": {
                    "date": "10-04-2023",
                    "date_utc": 1681133400,
                    "open": 161.42,
                    "high": 162.03,
                    "low": 160.08,
                    "close": 162.03,
                    "volume": 47716900,
                    "adjclose": 160.41
                },
                "1681219800": {
                    "date": "11-04-2023",
                    "date_utc": 1681219800,
                    "open": 162.35,
                    "high": 162.36,
                    "low": 160.51,
                    "close": 160.8,
                    "volume": 47644200,
                    "adjclose": 159.19
                },
                "1681306200": {
                    "date": "12-04-2023",
                    "date_utc": 1681306200,
                    "open": 161.22,
                    "high": 162.06,
                    "low": 159.78,
                    "close": 160.1,
                    "volume": 50133100,
                    "adjclose": 158.5
                },
                "1681392600": {
                    "date": "13-04-2023",
                    "date_utc": 1681392600,
                    "open": 161.63,
                    "high": 165.8,
                    "low": 161.42,
                    "close": 165.56,
                    "volume": 68445600,
                    "adjclose": 163.91
                },
                "1681479000": {
                    "date": "14-04-2023",
                    "date_utc": 1681479000,
                    "open": 164.59,
                    "high": 166.32,
                    "low": 163.82,
                    "close": 165.21,
                    "volume": 49386500,
                    "adjclose": 163.56
                },
                "1681738200": {
                    "date": "17-04-2023",
                    "date_utc": 1681738200,
                    "open": 165.09,
                    "high": 165.39,
                    "low": 164.03,
                    "close": 165.23,
                    "volume": 41516200,
                    "adjclose": 163.58
                },
                "1681824600": {
                    "date": "18-04-2023",
                    "date_utc": 1681824600,
                    "open": 166.1,
                    "high": 167.41,
                    "low": 165.65,
                    "close": 166.47,
                    "volume": 49923000,
                    "adjclose": 164.81
                },
                "1681911000": {
                    "date": "19-04-2023",
                    "date_utc": 1681911000,
                    "open": 165.8,
                    "high": 168.16,
                    "low": 165.54,
                    "close": 167.63,
                    "volume": 47720200,
                    "adjclose": 165.96
                },
                "1681997400": {
                    "date": "20-04-2023",
                    "date_utc": 1681997400,
                    "open": 166.09,
                    "high": 167.87,
                    "low": 165.56,
                    "close": 166.65,
                    "volume": 52456400,
                    "adjclose": 164.99
                },
                "1682083800": {
                    "date": "21-04-2023",
                    "date_utc": 1682083800,
                    "open": 165.05,
                    "high": 166.45,
                    "low": 164.49,
                    "close": 165.02,
                    "volume": 58337300,
                    "adjclose": 163.37
                },
                "1682343000": {
                    "date": "24-04-2023",
                    "date_utc": 1682343000,
                    "open": 165,
                    "high": 165.6,
                    "low": 163.89,
                    "close": 165.33,
                    "volume": 41949600,
                    "adjclose": 163.68
                },
                "1682429400": {
                    "date": "25-04-2023",
                    "date_utc": 1682429400,
                    "open": 165.19,
                    "high": 166.31,
                    "low": 163.73,
                    "close": 163.77,
                    "volume": 48714100,
                    "adjclose": 162.13
                },
                "1682515800": {
                    "date": "26-04-2023",
                    "date_utc": 1682515800,
                    "open": 163.06,
                    "high": 165.28,
                    "low": 162.8,
                    "close": 163.76,
                    "volume": 45498800,
                    "adjclose": 162.13
                },
                "1682602200": {
                    "date": "27-04-2023",
                    "date_utc": 1682602200,
                    "open": 165.19,
                    "high": 168.56,
                    "low": 165.19,
                    "close": 168.41,
                    "volume": 64902300,
                    "adjclose": 166.73
                },
                "1682688600": {
                    "date": "28-04-2023",
                    "date_utc": 1682688600,
                    "open": 168.49,
                    "high": 169.85,
                    "low": 167.88,
                    "close": 169.68,
                    "volume": 55209200,
                    "adjclose": 167.99
                },
                "1682947800": {
                    "date": "01-05-2023",
                    "date_utc": 1682947800,
                    "open": 169.28,
                    "high": 170.45,
                    "low": 168.64,
                    "close": 169.59,
                    "volume": 52472900,
                    "adjclose": 167.9
                },
                "1683034200": {
                    "date": "02-05-2023",
                    "date_utc": 1683034200,
                    "open": 170.09,
                    "high": 170.35,
                    "low": 167.54,
                    "close": 168.54,
                    "volume": 48425700,
                    "adjclose": 166.86
                },
                "1683120600": {
                    "date": "03-05-2023",
                    "date_utc": 1683120600,
                    "open": 169.5,
                    "high": 170.92,
                    "low": 167.16,
                    "close": 167.45,
                    "volume": 65136000,
                    "adjclose": 165.78
                },
                "1683207000": {
                    "date": "04-05-2023",
                    "date_utc": 1683207000,
                    "open": 164.89,
                    "high": 167.04,
                    "low": 164.31,
                    "close": 165.79,
                    "volume": 81235400,
                    "adjclose": 164.13
                },
                "1683293400": {
                    "date": "05-05-2023",
                    "date_utc": 1683293400,
                    "open": 170.98,
                    "high": 174.3,
                    "low": 170.76,
                    "close": 173.57,
                    "volume": 113316400,
                    "adjclose": 171.84
                },
                "1683552600": {
                    "date": "08-05-2023",
                    "date_utc": 1683552600,
                    "open": 172.48,
                    "high": 173.85,
                    "low": 172.11,
                    "close": 173.5,
                    "volume": 55962800,
                    "adjclose": 171.77
                },
                "1683639000": {
                    "date": "09-05-2023",
                    "date_utc": 1683639000,
                    "open": 173.05,
                    "high": 173.54,
                    "low": 171.6,
                    "close": 171.77,
                    "volume": 45326900,
                    "adjclose": 170.06
                },
                "1683725400": {
                    "date": "10-05-2023",
                    "date_utc": 1683725400,
                    "open": 173.02,
                    "high": 174.03,
                    "low": 171.9,
                    "close": 173.56,
                    "volume": 53724500,
                    "adjclose": 171.83
                },
                "1683811800": {
                    "date": "11-05-2023",
                    "date_utc": 1683811800,
                    "open": 173.85,
                    "high": 174.59,
                    "low": 172.17,
                    "close": 173.75,
                    "volume": 49514700,
                    "adjclose": 172.02
                },
                "1683898200": {
                    "date": "12-05-2023",
                    "date_utc": 1683898200,
                    "open": 173.62,
                    "high": 174.06,
                    "low": 171,
                    "close": 172.57,
                    "volume": 45497800,
                    "adjclose": 171.08
                },
                "1684157400": {
                    "date": "15-05-2023",
                    "date_utc": 1684157400,
                    "open": 173.16,
                    "high": 173.21,
                    "low": 171.47,
                    "close": 172.07,
                    "volume": 37266700,
                    "adjclose": 170.59
                },
                "1684243800": {
                    "date": "16-05-2023",
                    "date_utc": 1684243800,
                    "open": 171.99,
                    "high": 173.14,
                    "low": 171.8,
                    "close": 172.07,
                    "volume": 42110300,
                    "adjclose": 170.59
                },
                "1684330200": {
                    "date": "17-05-2023",
                    "date_utc": 1684330200,
                    "open": 171.71,
                    "high": 172.93,
                    "low": 170.42,
                    "close": 172.69,
                    "volume": 57951600,
                    "adjclose": 171.2
                },
                "1684416600": {
                    "date": "18-05-2023",
                    "date_utc": 1684416600,
                    "open": 173,
                    "high": 175.24,
                    "low": 172.58,
                    "close": 175.05,
                    "volume": 65496700,
                    "adjclose": 173.54
                },
                "1684503000": {
                    "date": "19-05-2023",
                    "date_utc": 1684503000,
                    "open": 176.39,
                    "high": 176.39,
                    "low": 174.94,
                    "close": 175.16,
                    "volume": 55772400,
                    "adjclose": 173.65
                },
                "1684762200": {
                    "date": "22-05-2023",
                    "date_utc": 1684762200,
                    "open": 173.98,
                    "high": 174.71,
                    "low": 173.45,
                    "close": 174.2,
                    "volume": 43570900,
                    "adjclose": 172.7
                },
                "1684848600": {
                    "date": "23-05-2023",
                    "date_utc": 1684848600,
                    "open": 173.13,
                    "high": 173.38,
                    "low": 171.28,
                    "close": 171.56,
                    "volume": 50747300,
                    "adjclose": 170.08
                },
                "1684935000": {
                    "date": "24-05-2023",
                    "date_utc": 1684935000,
                    "open": 171.09,
                    "high": 172.42,
                    "low": 170.52,
                    "close": 171.84,
                    "volume": 45143500,
                    "adjclose": 170.36
                },
                "1685021400": {
                    "date": "25-05-2023",
                    "date_utc": 1685021400,
                    "open": 172.41,
                    "high": 173.9,
                    "low": 171.69,
                    "close": 172.99,
                    "volume": 56058300,
                    "adjclose": 171.5
                },
                "1685107800": {
                    "date": "26-05-2023",
                    "date_utc": 1685107800,
                    "open": 173.32,
                    "high": 175.77,
                    "low": 173.11,
                    "close": 175.43,
                    "volume": 54835000,
                    "adjclose": 173.92
                },
                "1685453400": {
                    "date": "30-05-2023",
                    "date_utc": 1685453400,
                    "open": 176.96,
                    "high": 178.99,
                    "low": 176.57,
                    "close": 177.3,
                    "volume": 55964400,
                    "adjclose": 175.77
                },
                "1685539800": {
                    "date": "31-05-2023",
                    "date_utc": 1685539800,
                    "open": 177.33,
                    "high": 179.35,
                    "low": 176.76,
                    "close": 177.25,
                    "volume": 99625300,
                    "adjclose": 175.72
                },
                "1685626200": {
                    "date": "01-06-2023",
                    "date_utc": 1685626200,
                    "open": 177.7,
                    "high": 180.12,
                    "low": 176.93,
                    "close": 180.09,
                    "volume": 68901800,
                    "adjclose": 178.54
                },
                "1685712600": {
                    "date": "02-06-2023",
                    "date_utc": 1685712600,
                    "open": 181.03,
                    "high": 181.78,
                    "low": 179.26,
                    "close": 180.95,
                    "volume": 61945900,
                    "adjclose": 179.39
                },
                "1685971800": {
                    "date": "05-06-2023",
                    "date_utc": 1685971800,
                    "open": 182.63,
                    "high": 184.95,
                    "low": 178.04,
                    "close": 179.58,
                    "volume": 121946500,
                    "adjclose": 178.03
                },
                "1686058200": {
                    "date": "06-06-2023",
                    "date_utc": 1686058200,
                    "open": 179.97,
                    "high": 180.12,
                    "low": 177.43,
                    "close": 179.21,
                    "volume": 64848400,
                    "adjclose": 177.67
                },
                "1686144600": {
                    "date": "07-06-2023",
                    "date_utc": 1686144600,
                    "open": 178.44,
                    "high": 181.21,
                    "low": 177.32,
                    "close": 177.82,
                    "volume": 61944600,
                    "adjclose": 176.29
                },
                "1686231000": {
                    "date": "08-06-2023",
                    "date_utc": 1686231000,
                    "open": 177.9,
                    "high": 180.84,
                    "low": 177.46,
                    "close": 180.57,
                    "volume": 50214900,
                    "adjclose": 179.01
                },
                "1686317400": {
                    "date": "09-06-2023",
                    "date_utc": 1686317400,
                    "open": 181.5,
                    "high": 182.23,
                    "low": 180.63,
                    "close": 180.96,
                    "volume": 48870700,
                    "adjclose": 179.4
                },
                "1686576600": {
                    "date": "12-06-2023",
                    "date_utc": 1686576600,
                    "open": 181.27,
                    "high": 183.89,
                    "low": 180.97,
                    "close": 183.79,
                    "volume": 54274900,
                    "adjclose": 182.21
                },
                "1686663000": {
                    "date": "13-06-2023",
                    "date_utc": 1686663000,
                    "open": 182.8,
                    "high": 184.15,
                    "low": 182.44,
                    "close": 183.31,
                    "volume": 54929100,
                    "adjclose": 181.73
                },
                "1686749400": {
                    "date": "14-06-2023",
                    "date_utc": 1686749400,
                    "open": 183.37,
                    "high": 184.39,
                    "low": 182.02,
                    "close": 183.95,
                    "volume": 57462900,
                    "adjclose": 182.37
                },
                "1686835800": {
                    "date": "15-06-2023",
                    "date_utc": 1686835800,
                    "open": 183.96,
                    "high": 186.52,
                    "low": 183.78,
                    "close": 186.01,
                    "volume": 65433200,
                    "adjclose": 184.41
                },
                "1686922200": {
                    "date": "16-06-2023",
                    "date_utc": 1686922200,
                    "open": 186.73,
                    "high": 186.99,
                    "low": 184.27,
                    "close": 184.92,
                    "volume": 101235600,
                    "adjclose": 183.33
                },
                "1687267800": {
                    "date": "20-06-2023",
                    "date_utc": 1687267800,
                    "open": 184.41,
                    "high": 186.1,
                    "low": 184.41,
                    "close": 185.01,
                    "volume": 49799100,
                    "adjclose": 183.42
                },
                "1687354200": {
                    "date": "21-06-2023",
                    "date_utc": 1687354200,
                    "open": 184.9,
                    "high": 185.41,
                    "low": 182.59,
                    "close": 183.96,
                    "volume": 49515700,
                    "adjclose": 182.38
                },
                "1687440600": {
                    "date": "22-06-2023",
                    "date_utc": 1687440600,
                    "open": 183.74,
                    "high": 187.05,
                    "low": 183.67,
                    "close": 187,
                    "volume": 51245300,
                    "adjclose": 185.39
                },
                "1687527000": {
                    "date": "23-06-2023",
                    "date_utc": 1687527000,
                    "open": 185.55,
                    "high": 187.56,
                    "low": 185.01,
                    "close": 186.68,
                    "volume": 53079300,
                    "adjclose": 185.07
                },
                "1687786200": {
                    "date": "26-06-2023",
                    "date_utc": 1687786200,
                    "open": 186.83,
                    "high": 188.05,
                    "low": 185.23,
                    "close": 185.27,
                    "volume": 48088700,
                    "adjclose": 183.67
                },
                "1687872600": {
                    "date": "27-06-2023",
                    "date_utc": 1687872600,
                    "open": 185.89,
                    "high": 188.39,
                    "low": 185.67,
                    "close": 188.06,
                    "volume": 50730800,
                    "adjclose": 186.44
                },
                "1687959000": {
                    "date": "28-06-2023",
                    "date_utc": 1687959000,
                    "open": 187.93,
                    "high": 189.9,
                    "low": 187.6,
                    "close": 189.25,
                    "volume": 51216800,
                    "adjclose": 187.62
                },
                "1688045400": {
                    "date": "29-06-2023",
                    "date_utc": 1688045400,
                    "open": 189.08,
                    "high": 190.07,
                    "low": 188.94,
                    "close": 189.59,
                    "volume": 46347300,
                    "adjclose": 187.96
                },
                "1688131800": {
                    "date": "30-06-2023",
                    "date_utc": 1688131800,
                    "open": 191.63,
                    "high": 194.48,
                    "low": 191.26,
                    "close": 193.97,
                    "volume": 85069600,
                    "adjclose": 192.3
                },
                "1688391000": {
                    "date": "03-07-2023",
                    "date_utc": 1688391000,
                    "open": 193.78,
                    "high": 193.88,
                    "low": 191.76,
                    "close": 192.46,
                    "volume": 31458200,
                    "adjclose": 190.8
                },
                "1688563800": {
                    "date": "05-07-2023",
                    "date_utc": 1688563800,
                    "open": 191.57,
                    "high": 192.98,
                    "low": 190.62,
                    "close": 191.33,
                    "volume": 46920300,
                    "adjclose": 189.68
                },
                "1688650200": {
                    "date": "06-07-2023",
                    "date_utc": 1688650200,
                    "open": 189.84,
                    "high": 192.02,
                    "low": 189.2,
                    "close": 191.81,
                    "volume": 45094300,
                    "adjclose": 190.16
                },
                "1688736600": {
                    "date": "07-07-2023",
                    "date_utc": 1688736600,
                    "open": 191.41,
                    "high": 192.67,
                    "low": 190.24,
                    "close": 190.68,
                    "volume": 46778000,
                    "adjclose": 189.04
                },
                "1688995800": {
                    "date": "10-07-2023",
                    "date_utc": 1688995800,
                    "open": 189.26,
                    "high": 189.99,
                    "low": 187.04,
                    "close": 188.61,
                    "volume": 59922200,
                    "adjclose": 186.99
                },
                "1689082200": {
                    "date": "11-07-2023",
                    "date_utc": 1689082200,
                    "open": 189.16,
                    "high": 189.3,
                    "low": 186.6,
                    "close": 188.08,
                    "volume": 46638100,
                    "adjclose": 186.46
                },
                "1689168600": {
                    "date": "12-07-2023",
                    "date_utc": 1689168600,
                    "open": 189.68,
                    "high": 191.7,
                    "low": 188.47,
                    "close": 189.77,
                    "volume": 60750200,
                    "adjclose": 188.14
                },
                "1689255000": {
                    "date": "13-07-2023",
                    "date_utc": 1689255000,
                    "open": 190.5,
                    "high": 191.19,
                    "low": 189.78,
                    "close": 190.54,
                    "volume": 41342300,
                    "adjclose": 188.9
                },
                "1689341400": {
                    "date": "14-07-2023",
                    "date_utc": 1689341400,
                    "open": 190.23,
                    "high": 191.18,
                    "low": 189.63,
                    "close": 190.69,
                    "volume": 41573900,
                    "adjclose": 189.05
                },
                "1689600600": {
                    "date": "17-07-2023",
                    "date_utc": 1689600600,
                    "open": 191.9,
                    "high": 194.32,
                    "low": 191.81,
                    "close": 193.99,
                    "volume": 50520200,
                    "adjclose": 192.32
                },
                "1689687000": {
                    "date": "18-07-2023",
                    "date_utc": 1689687000,
                    "open": 193.35,
                    "high": 194.33,
                    "low": 192.42,
                    "close": 193.73,
                    "volume": 48353800,
                    "adjclose": 192.06
                },
                "1689773400": {
                    "date": "19-07-2023",
                    "date_utc": 1689773400,
                    "open": 193.1,
                    "high": 198.23,
                    "low": 192.65,
                    "close": 195.1,
                    "volume": 80507300,
                    "adjclose": 193.42
                },
                "1689859800": {
                    "date": "20-07-2023",
                    "date_utc": 1689859800,
                    "open": 195.09,
                    "high": 196.47,
                    "low": 192.5,
                    "close": 193.13,
                    "volume": 59581200,
                    "adjclose": 191.47
                },
                "1689946200": {
                    "date": "21-07-2023",
                    "date_utc": 1689946200,
                    "open": 194.1,
                    "high": 194.97,
                    "low": 191.23,
                    "close": 191.94,
                    "volume": 71917800,
                    "adjclose": 190.29
                },
                "1690205400": {
                    "date": "24-07-2023",
                    "date_utc": 1690205400,
                    "open": 193.41,
                    "high": 194.91,
                    "low": 192.25,
                    "close": 192.75,
                    "volume": 45377800,
                    "adjclose": 191.09
                },
                "1690291800": {
                    "date": "25-07-2023",
                    "date_utc": 1690291800,
                    "open": 193.33,
                    "high": 194.44,
                    "low": 192.92,
                    "close": 193.62,
                    "volume": 37283200,
                    "adjclose": 191.95
                },
                "1690378200": {
                    "date": "26-07-2023",
                    "date_utc": 1690378200,
                    "open": 193.67,
                    "high": 195.64,
                    "low": 193.32,
                    "close": 194.5,
                    "volume": 47471900,
                    "adjclose": 192.82
                },
                "1690464600": {
                    "date": "27-07-2023",
                    "date_utc": 1690464600,
                    "open": 196.02,
                    "high": 197.2,
                    "low": 192.55,
                    "close": 193.22,
                    "volume": 47460200,
                    "adjclose": 191.56
                },
                "1690551000": {
                    "date": "28-07-2023",
                    "date_utc": 1690551000,
                    "open": 194.67,
                    "high": 196.63,
                    "low": 194.14,
                    "close": 195.83,
                    "volume": 48291400,
                    "adjclose": 194.14
                },
                "1690810200": {
                    "date": "31-07-2023",
                    "date_utc": 1690810200,
                    "open": 196.06,
                    "high": 196.49,
                    "low": 195.26,
                    "close": 196.45,
                    "volume": 38824100,
                    "adjclose": 194.76
                },
                "1690896600": {
                    "date": "01-08-2023",
                    "date_utc": 1690896600,
                    "open": 196.24,
                    "high": 196.73,
                    "low": 195.28,
                    "close": 195.61,
                    "volume": 35175100,
                    "adjclose": 193.92
                },
                "1690983000": {
                    "date": "02-08-2023",
                    "date_utc": 1690983000,
                    "open": 195.04,
                    "high": 195.18,
                    "low": 191.85,
                    "close": 192.58,
                    "volume": 50389300,
                    "adjclose": 190.92
                },
                "1691069400": {
                    "date": "03-08-2023",
                    "date_utc": 1691069400,
                    "open": 191.57,
                    "high": 192.37,
                    "low": 190.69,
                    "close": 191.17,
                    "volume": 61235200,
                    "adjclose": 189.52
                },
                "1691155800": {
                    "date": "04-08-2023",
                    "date_utc": 1691155800,
                    "open": 185.52,
                    "high": 187.38,
                    "low": 181.92,
                    "close": 181.99,
                    "volume": 115799700,
                    "adjclose": 180.42
                },
                "1691415000": {
                    "date": "07-08-2023",
                    "date_utc": 1691415000,
                    "open": 182.13,
                    "high": 183.13,
                    "low": 177.35,
                    "close": 178.85,
                    "volume": 97576100,
                    "adjclose": 177.31
                },
                "1691501400": {
                    "date": "08-08-2023",
                    "date_utc": 1691501400,
                    "open": 179.69,
                    "high": 180.27,
                    "low": 177.58,
                    "close": 179.8,
                    "volume": 67823000,
                    "adjclose": 178.25
                },
                "1691587800": {
                    "date": "09-08-2023",
                    "date_utc": 1691587800,
                    "open": 180.87,
                    "high": 180.93,
                    "low": 177.01,
                    "close": 178.19,
                    "volume": 60378500,
                    "adjclose": 176.65
                },
                "1691674200": {
                    "date": "10-08-2023",
                    "date_utc": 1691674200,
                    "open": 179.48,
                    "high": 180.75,
                    "low": 177.6,
                    "close": 177.97,
                    "volume": 54686900,
                    "adjclose": 176.44
                },
                "1691760600": {
                    "date": "11-08-2023",
                    "date_utc": 1691760600,
                    "open": 177.32,
                    "high": 178.62,
                    "low": 176.55,
                    "close": 177.79,
                    "volume": 51988100,
                    "adjclose": 176.5
                },
                "1692019800": {
                    "date": "14-08-2023",
                    "date_utc": 1692019800,
                    "open": 177.97,
                    "high": 179.69,
                    "low": 177.31,
                    "close": 179.46,
                    "volume": 43675600,
                    "adjclose": 178.15
                },
                "1692106200": {
                    "date": "15-08-2023",
                    "date_utc": 1692106200,
                    "open": 178.88,
                    "high": 179.48,
                    "low": 177.05,
                    "close": 177.45,
                    "volume": 43622600,
                    "adjclose": 176.16
                },
                "1692192600": {
                    "date": "16-08-2023",
                    "date_utc": 1692192600,
                    "open": 177.13,
                    "high": 178.54,
                    "low": 176.5,
                    "close": 176.57,
                    "volume": 46964900,
                    "adjclose": 175.29
                },
                "1692279000": {
                    "date": "17-08-2023",
                    "date_utc": 1692279000,
                    "open": 177.14,
                    "high": 177.51,
                    "low": 173.48,
                    "close": 174,
                    "volume": 66062900,
                    "adjclose": 172.73
                },
                "1692365400": {
                    "date": "18-08-2023",
                    "date_utc": 1692365400,
                    "open": 172.3,
                    "high": 175.1,
                    "low": 171.96,
                    "close": 174.49,
                    "volume": 61114200,
                    "adjclose": 173.22
                },
                "1692624600": {
                    "date": "21-08-2023",
                    "date_utc": 1692624600,
                    "open": 175.07,
                    "high": 176.13,
                    "low": 173.74,
                    "close": 175.84,
                    "volume": 46311900,
                    "adjclose": 174.56
                },
                "1692711000": {
                    "date": "22-08-2023",
                    "date_utc": 1692711000,
                    "open": 177.06,
                    "high": 177.68,
                    "low": 176.25,
                    "close": 177.23,
                    "volume": 42084200,
                    "adjclose": 175.94
                },
                "1692797400": {
                    "date": "23-08-2023",
                    "date_utc": 1692797400,
                    "open": 178.52,
                    "high": 181.55,
                    "low": 178.33,
                    "close": 181.12,
                    "volume": 52722800,
                    "adjclose": 179.8
                },
                "1692883800": {
                    "date": "24-08-2023",
                    "date_utc": 1692883800,
                    "open": 180.67,
                    "high": 181.1,
                    "low": 176.01,
                    "close": 176.38,
                    "volume": 54945800,
                    "adjclose": 175.1
                },
                "1692970200": {
                    "date": "25-08-2023",
                    "date_utc": 1692970200,
                    "open": 177.38,
                    "high": 179.15,
                    "low": 175.82,
                    "close": 178.61,
                    "volume": 51449600,
                    "adjclose": 177.31
                },
                "1693229400": {
                    "date": "28-08-2023",
                    "date_utc": 1693229400,
                    "open": 180.09,
                    "high": 180.59,
                    "low": 178.55,
                    "close": 180.19,
                    "volume": 43820700,
                    "adjclose": 178.88
                },
                "1693315800": {
                    "date": "29-08-2023",
                    "date_utc": 1693315800,
                    "open": 179.7,
                    "high": 184.9,
                    "low": 179.5,
                    "close": 184.12,
                    "volume": 53003900,
                    "adjclose": 182.78
                },
                "1693402200": {
                    "date": "30-08-2023",
                    "date_utc": 1693402200,
                    "open": 184.94,
                    "high": 187.85,
                    "low": 184.74,
                    "close": 187.65,
                    "volume": 60813900,
                    "adjclose": 186.28
                },
                "1693488600": {
                    "date": "31-08-2023",
                    "date_utc": 1693488600,
                    "open": 187.84,
                    "high": 189.12,
                    "low": 187.48,
                    "close": 187.87,
                    "volume": 60794500,
                    "adjclose": 186.5
                },
                "1693575000": {
                    "date": "01-09-2023",
                    "date_utc": 1693575000,
                    "open": 189.49,
                    "high": 189.92,
                    "low": 188.28,
                    "close": 189.46,
                    "volume": 45732600,
                    "adjclose": 188.08
                },
                "1693920600": {
                    "date": "05-09-2023",
                    "date_utc": 1693920600,
                    "open": 188.28,
                    "high": 189.98,
                    "low": 187.61,
                    "close": 189.7,
                    "volume": 45280000,
                    "adjclose": 188.32
                },
                "1694007000": {
                    "date": "06-09-2023",
                    "date_utc": 1694007000,
                    "open": 188.4,
                    "high": 188.85,
                    "low": 181.47,
                    "close": 182.91,
                    "volume": 81755800,
                    "adjclose": 181.58
                },
                "1694093400": {
                    "date": "07-09-2023",
                    "date_utc": 1694093400,
                    "open": 175.18,
                    "high": 178.21,
                    "low": 173.54,
                    "close": 177.56,
                    "volume": 112488800,
                    "adjclose": 176.27
                },
                "1694179800": {
                    "date": "08-09-2023",
                    "date_utc": 1694179800,
                    "open": 178.35,
                    "high": 180.24,
                    "low": 177.79,
                    "close": 178.18,
                    "volume": 65551300,
                    "adjclose": 176.88
                },
                "1694439000": {
                    "date": "11-09-2023",
                    "date_utc": 1694439000,
                    "open": 180.07,
                    "high": 180.3,
                    "low": 177.34,
                    "close": 179.36,
                    "volume": 58953100,
                    "adjclose": 178.05
                },
                "1694525400": {
                    "date": "12-09-2023",
                    "date_utc": 1694525400,
                    "open": 179.49,
                    "high": 180.13,
                    "low": 174.82,
                    "close": 176.3,
                    "volume": 90370200,
                    "adjclose": 175.02
                },
                "1694611800": {
                    "date": "13-09-2023",
                    "date_utc": 1694611800,
                    "open": 176.51,
                    "high": 177.3,
                    "low": 173.98,
                    "close": 174.21,
                    "volume": 84267900,
                    "adjclose": 172.94
                },
                "1694698200": {
                    "date": "14-09-2023",
                    "date_utc": 1694698200,
                    "open": 174,
                    "high": 176.1,
                    "low": 173.58,
                    "close": 175.74,
                    "volume": 60895800,
                    "adjclose": 174.46
                },
                "1694784600": {
                    "date": "15-09-2023",
                    "date_utc": 1694784600,
                    "open": 176.48,
                    "high": 176.5,
                    "low": 173.82,
                    "close": 175.01,
                    "volume": 109205100,
                    "adjclose": 173.74
                },
                "1695043800": {
                    "date": "18-09-2023",
                    "date_utc": 1695043800,
                    "open": 176.48,
                    "high": 179.38,
                    "low": 176.17,
                    "close": 177.97,
                    "volume": 67257600,
                    "adjclose": 176.68
                },
                "1695130200": {
                    "date": "19-09-2023",
                    "date_utc": 1695130200,
                    "open": 177.52,
                    "high": 179.63,
                    "low": 177.13,
                    "close": 179.07,
                    "volume": 51826900,
                    "adjclose": 177.77
                },
                "1695216600": {
                    "date": "20-09-2023",
                    "date_utc": 1695216600,
                    "open": 179.26,
                    "high": 179.7,
                    "low": 175.4,
                    "close": 175.49,
                    "volume": 58436200,
                    "adjclose": 174.21
                },
                "1695303000": {
                    "date": "21-09-2023",
                    "date_utc": 1695303000,
                    "open": 174.55,
                    "high": 176.3,
                    "low": 173.86,
                    "close": 173.93,
                    "volume": 63047900,
                    "adjclose": 172.66
                },
                "1695389400": {
                    "date": "22-09-2023",
                    "date_utc": 1695389400,
                    "open": 174.67,
                    "high": 177.08,
                    "low": 174.05,
                    "close": 174.79,
                    "volume": 56725400,
                    "adjclose": 173.52
                },
                "1695648600": {
                    "date": "25-09-2023",
                    "date_utc": 1695648600,
                    "open": 174.2,
                    "high": 176.97,
                    "low": 174.15,
                    "close": 176.08,
                    "volume": 46172700,
                    "adjclose": 174.8
                },
                "1695735000": {
                    "date": "26-09-2023",
                    "date_utc": 1695735000,
                    "open": 174.82,
                    "high": 175.2,
                    "low": 171.66,
                    "close": 171.96,
                    "volume": 64588900,
                    "adjclose": 170.71
                },
                "1695821400": {
                    "date": "27-09-2023",
                    "date_utc": 1695821400,
                    "open": 172.62,
                    "high": 173.04,
                    "low": 169.05,
                    "close": 170.43,
                    "volume": 66921800,
                    "adjclose": 169.19
                },
                "1695907800": {
                    "date": "28-09-2023",
                    "date_utc": 1695907800,
                    "open": 169.34,
                    "high": 172.03,
                    "low": 167.62,
                    "close": 170.69,
                    "volume": 56294400,
                    "adjclose": 169.45
                },
                "1695994200": {
                    "date": "29-09-2023",
                    "date_utc": 1695994200,
                    "open": 172.02,
                    "high": 173.07,
                    "low": 170.34,
                    "close": 171.21,
                    "volume": 51814200,
                    "adjclose": 169.96
                },
                "1696253400": {
                    "date": "02-10-2023",
                    "date_utc": 1696253400,
                    "open": 171.22,
                    "high": 174.3,
                    "low": 170.93,
                    "close": 173.75,
                    "volume": 52164500,
                    "adjclose": 172.49
                },
                "1696339800": {
                    "date": "03-10-2023",
                    "date_utc": 1696339800,
                    "open": 172.26,
                    "high": 173.63,
                    "low": 170.82,
                    "close": 172.4,
                    "volume": 49594600,
                    "adjclose": 171.15
                },
                "1696426200": {
                    "date": "04-10-2023",
                    "date_utc": 1696426200,
                    "open": 171.09,
                    "high": 174.21,
                    "low": 170.97,
                    "close": 173.66,
                    "volume": 53020300,
                    "adjclose": 172.4
                },
                "1696512600": {
                    "date": "05-10-2023",
                    "date_utc": 1696512600,
                    "open": 173.79,
                    "high": 175.45,
                    "low": 172.68,
                    "close": 174.91,
                    "volume": 48527900,
                    "adjclose": 173.64
                },
                "1696599000": {
                    "date": "06-10-2023",
                    "date_utc": 1696599000,
                    "open": 173.8,
                    "high": 177.99,
                    "low": 173.18,
                    "close": 177.49,
                    "volume": 57224100,
                    "adjclose": 176.2
                },
                "1696858200": {
                    "date": "09-10-2023",
                    "date_utc": 1696858200,
                    "open": 176.81,
                    "high": 179.05,
                    "low": 175.8,
                    "close": 178.99,
                    "volume": 42390800,
                    "adjclose": 177.69
                },
                "1696944600": {
                    "date": "10-10-2023",
                    "date_utc": 1696944600,
                    "open": 178.1,
                    "high": 179.72,
                    "low": 177.95,
                    "close": 178.39,
                    "volume": 43698000,
                    "adjclose": 177.09
                },
                "1697031000": {
                    "date": "11-10-2023",
                    "date_utc": 1697031000,
                    "open": 178.2,
                    "high": 179.85,
                    "low": 177.6,
                    "close": 179.8,
                    "volume": 47551100,
                    "adjclose": 178.49
                },
                "1697117400": {
                    "date": "12-10-2023",
                    "date_utc": 1697117400,
                    "open": 180.07,
                    "high": 182.34,
                    "low": 179.04,
                    "close": 180.71,
                    "volume": 56743100,
                    "adjclose": 179.4
                },
                "1697203800": {
                    "date": "13-10-2023",
                    "date_utc": 1697203800,
                    "open": 181.42,
                    "high": 181.93,
                    "low": 178.14,
                    "close": 178.85,
                    "volume": 51427100,
                    "adjclose": 177.55
                },
                "1697463000": {
                    "date": "16-10-2023",
                    "date_utc": 1697463000,
                    "open": 176.75,
                    "high": 179.08,
                    "low": 176.51,
                    "close": 178.72,
                    "volume": 52517000,
                    "adjclose": 177.42
                },
                "1697549400": {
                    "date": "17-10-2023",
                    "date_utc": 1697549400,
                    "open": 176.65,
                    "high": 178.42,
                    "low": 174.8,
                    "close": 177.15,
                    "volume": 57549400,
                    "adjclose": 175.86
                },
                "1697635800": {
                    "date": "18-10-2023",
                    "date_utc": 1697635800,
                    "open": 175.58,
                    "high": 177.58,
                    "low": 175.11,
                    "close": 175.84,
                    "volume": 54764400,
                    "adjclose": 174.56
                },
                "1697722200": {
                    "date": "19-10-2023",
                    "date_utc": 1697722200,
                    "open": 176.04,
                    "high": 177.84,
                    "low": 175.19,
                    "close": 175.46,
                    "volume": 59302900,
                    "adjclose": 174.18
                },
                "1697808600": {
                    "date": "20-10-2023",
                    "date_utc": 1697808600,
                    "open": 175.31,
                    "high": 175.42,
                    "low": 172.64,
                    "close": 172.88,
                    "volume": 64189300,
                    "adjclose": 171.62
                },
                "1698067800": {
                    "date": "23-10-2023",
                    "date_utc": 1698067800,
                    "open": 170.91,
                    "high": 174.01,
                    "low": 169.93,
                    "close": 173,
                    "volume": 55980100,
                    "adjclose": 171.74
                },
                "1698154200": {
                    "date": "24-10-2023",
                    "date_utc": 1698154200,
                    "open": 173.05,
                    "high": 173.67,
                    "low": 171.45,
                    "close": 173.44,
                    "volume": 43816600,
                    "adjclose": 172.18
                },
                "1698240600": {
                    "date": "25-10-2023",
                    "date_utc": 1698240600,
                    "open": 171.88,
                    "high": 173.06,
                    "low": 170.65,
                    "close": 171.1,
                    "volume": 57157000,
                    "adjclose": 169.86
                },
                "1698327000": {
                    "date": "26-10-2023",
                    "date_utc": 1698327000,
                    "open": 170.37,
                    "high": 171.38,
                    "low": 165.67,
                    "close": 166.89,
                    "volume": 70625300,
                    "adjclose": 165.68
                },
                "1698413400": {
                    "date": "27-10-2023",
                    "date_utc": 1698413400,
                    "open": 166.91,
                    "high": 168.96,
                    "low": 166.83,
                    "close": 168.22,
                    "volume": 58499100,
                    "adjclose": 167
                },
                "1698672600": {
                    "date": "30-10-2023",
                    "date_utc": 1698672600,
                    "open": 169.02,
                    "high": 171.17,
                    "low": 168.87,
                    "close": 170.29,
                    "volume": 51131000,
                    "adjclose": 169.05
                },
                "1698759000": {
                    "date": "31-10-2023",
                    "date_utc": 1698759000,
                    "open": 169.35,
                    "high": 170.9,
                    "low": 167.9,
                    "close": 170.77,
                    "volume": 44846000,
                    "adjclose": 169.53
                },
                "1698845400": {
                    "date": "01-11-2023",
                    "date_utc": 1698845400,
                    "open": 171,
                    "high": 174.23,
                    "low": 170.12,
                    "close": 173.97,
                    "volume": 56934900,
                    "adjclose": 172.7
                },
                "1698931800": {
                    "date": "02-11-2023",
                    "date_utc": 1698931800,
                    "open": 175.52,
                    "high": 177.78,
                    "low": 175.46,
                    "close": 177.57,
                    "volume": 77334800,
                    "adjclose": 176.28
                },
                "1699018200": {
                    "date": "03-11-2023",
                    "date_utc": 1699018200,
                    "open": 174.24,
                    "high": 176.82,
                    "low": 173.35,
                    "close": 176.65,
                    "volume": 79763700,
                    "adjclose": 175.36
                },
                "1699281000": {
                    "date": "06-11-2023",
                    "date_utc": 1699281000,
                    "open": 176.38,
                    "high": 179.43,
                    "low": 176.21,
                    "close": 179.23,
                    "volume": 63841300,
                    "adjclose": 177.93
                },
                "1699367400": {
                    "date": "07-11-2023",
                    "date_utc": 1699367400,
                    "open": 179.18,
                    "high": 182.44,
                    "low": 178.97,
                    "close": 181.82,
                    "volume": 70530000,
                    "adjclose": 180.5
                },
                "1699453800": {
                    "date": "08-11-2023",
                    "date_utc": 1699453800,
                    "open": 182.35,
                    "high": 183.45,
                    "low": 181.59,
                    "close": 182.89,
                    "volume": 49340300,
                    "adjclose": 181.56
                },
                "1699540200": {
                    "date": "09-11-2023",
                    "date_utc": 1699540200,
                    "open": 182.96,
                    "high": 184.12,
                    "low": 181.81,
                    "close": 182.41,
                    "volume": 53763500,
                    "adjclose": 181.08
                },
                "1699626600": {
                    "date": "10-11-2023",
                    "date_utc": 1699626600,
                    "open": 183.97,
                    "high": 186.57,
                    "low": 183.53,
                    "close": 186.4,
                    "volume": 66133400,
                    "adjclose": 185.29
                },
                "1699885800": {
                    "date": "13-11-2023",
                    "date_utc": 1699885800,
                    "open": 185.82,
                    "high": 186.03,
                    "low": 184.21,
                    "close": 184.8,
                    "volume": 43627500,
                    "adjclose": 183.7
                },
                "1699972200": {
                    "date": "14-11-2023",
                    "date_utc": 1699972200,
                    "open": 187.7,
                    "high": 188.11,
                    "low": 186.3,
                    "close": 187.44,
                    "volume": 60108400,
                    "adjclose": 186.32
                },
                "1700058600": {
                    "date": "15-11-2023",
                    "date_utc": 1700058600,
                    "open": 187.85,
                    "high": 189.5,
                    "low": 187.78,
                    "close": 188.01,
                    "volume": 53790500,
                    "adjclose": 186.89
                },
                "1700145000": {
                    "date": "16-11-2023",
                    "date_utc": 1700145000,
                    "open": 189.57,
                    "high": 190.96,
                    "low": 188.65,
                    "close": 189.71,
                    "volume": 54412900,
                    "adjclose": 188.58
                },
                "1700231400": {
                    "date": "17-11-2023",
                    "date_utc": 1700231400,
                    "open": 190.25,
                    "high": 190.38,
                    "low": 188.57,
                    "close": 189.69,
                    "volume": 50922700,
                    "adjclose": 188.56
                },
                "1700490600": {
                    "date": "20-11-2023",
                    "date_utc": 1700490600,
                    "open": 189.89,
                    "high": 191.91,
                    "low": 189.88,
                    "close": 191.45,
                    "volume": 46505100,
                    "adjclose": 190.31
                },
                "1700577000": {
                    "date": "21-11-2023",
                    "date_utc": 1700577000,
                    "open": 191.41,
                    "high": 191.52,
                    "low": 189.74,
                    "close": 190.64,
                    "volume": 38134500,
                    "adjclose": 189.5
                },
                "1700663400": {
                    "date": "22-11-2023",
                    "date_utc": 1700663400,
                    "open": 191.49,
                    "high": 192.93,
                    "low": 190.83,
                    "close": 191.31,
                    "volume": 39617700,
                    "adjclose": 190.17
                },
                "1700836200": {
                    "date": "24-11-2023",
                    "date_utc": 1700836200,
                    "open": 190.87,
                    "high": 190.9,
                    "low": 189.25,
                    "close": 189.97,
                    "volume": 24048300,
                    "adjclose": 188.84
                },
                "1701095400": {
                    "date": "27-11-2023",
                    "date_utc": 1701095400,
                    "open": 189.92,
                    "high": 190.67,
                    "low": 188.9,
                    "close": 189.79,
                    "volume": 40552600,
                    "adjclose": 188.66
                },
                "1701181800": {
                    "date": "28-11-2023",
                    "date_utc": 1701181800,
                    "open": 189.78,
                    "high": 191.08,
                    "low": 189.4,
                    "close": 190.4,
                    "volume": 38415400,
                    "adjclose": 189.26
                },
                "1701268200": {
                    "date": "29-11-2023",
                    "date_utc": 1701268200,
                    "open": 190.9,
                    "high": 192.09,
                    "low": 188.97,
                    "close": 189.37,
                    "volume": 43014200,
                    "adjclose": 188.24
                },
                "1701354600": {
                    "date": "30-11-2023",
                    "date_utc": 1701354600,
                    "open": 189.84,
                    "high": 190.32,
                    "low": 188.19,
                    "close": 189.95,
                    "volume": 48794400,
                    "adjclose": 188.82
                },
                "1701441000": {
                    "date": "01-12-2023",
                    "date_utc": 1701441000,
                    "open": 190.33,
                    "high": 191.56,
                    "low": 189.23,
                    "close": 191.24,
                    "volume": 45679300,
                    "adjclose": 190.1
                },
                "1701700200": {
                    "date": "04-12-2023",
                    "date_utc": 1701700200,
                    "open": 189.98,
                    "high": 190.05,
                    "low": 187.45,
                    "close": 189.43,
                    "volume": 43389500,
                    "adjclose": 188.3
                },
                "1701786600": {
                    "date": "05-12-2023",
                    "date_utc": 1701786600,
                    "open": 190.21,
                    "high": 194.4,
                    "low": 190.18,
                    "close": 193.42,
                    "volume": 66628400,
                    "adjclose": 192.27
                },
                "1701873000": {
                    "date": "06-12-2023",
                    "date_utc": 1701873000,
                    "open": 194.45,
                    "high": 194.76,
                    "low": 192.11,
                    "close": 192.32,
                    "volume": 41089700,
                    "adjclose": 191.17
                },
                "1701959400": {
                    "date": "07-12-2023",
                    "date_utc": 1701959400,
                    "open": 193.63,
                    "high": 195,
                    "low": 193.59,
                    "close": 194.27,
                    "volume": 47477700,
                    "adjclose": 193.11
                },
                "1702045800": {
                    "date": "08-12-2023",
                    "date_utc": 1702045800,
                    "open": 194.2,
                    "high": 195.99,
                    "low": 193.67,
                    "close": 195.71,
                    "volume": 53377300,
                    "adjclose": 194.54
                },
                "1702305000": {
                    "date": "11-12-2023",
                    "date_utc": 1702305000,
                    "open": 193.11,
                    "high": 193.49,
                    "low": 191.42,
                    "close": 193.18,
                    "volume": 60943700,
                    "adjclose": 192.03
                },
                "1702391400": {
                    "date": "12-12-2023",
                    "date_utc": 1702391400,
                    "open": 193.08,
                    "high": 194.72,
                    "low": 191.72,
                    "close": 194.71,
                    "volume": 52696900,
                    "adjclose": 193.55
                },
                "1702477800": {
                    "date": "13-12-2023",
                    "date_utc": 1702477800,
                    "open": 195.09,
                    "high": 198,
                    "low": 194.85,
                    "close": 197.96,
                    "volume": 70404200,
                    "adjclose": 196.78
                },
                "1702564200": {
                    "date": "14-12-2023",
                    "date_utc": 1702564200,
                    "open": 198.02,
                    "high": 199.62,
                    "low": 196.16,
                    "close": 198.11,
                    "volume": 66831600,
                    "adjclose": 196.93
                },
                "1702650600": {
                    "date": "15-12-2023",
                    "date_utc": 1702650600,
                    "open": 197.53,
                    "high": 198.4,
                    "low": 197,
                    "close": 197.57,
                    "volume": 128256700,
                    "adjclose": 196.39
                },
                "1702909800": {
                    "date": "18-12-2023",
                    "date_utc": 1702909800,
                    "open": 196.09,
                    "high": 196.63,
                    "low": 194.39,
                    "close": 195.89,
                    "volume": 55751900,
                    "adjclose": 194.72
                },
                "1702996200": {
                    "date": "19-12-2023",
                    "date_utc": 1702996200,
                    "open": 196.16,
                    "high": 196.95,
                    "low": 195.89,
                    "close": 196.94,
                    "volume": 40714100,
                    "adjclose": 195.76
                },
                "1703082600": {
                    "date": "20-12-2023",
                    "date_utc": 1703082600,
                    "open": 196.9,
                    "high": 197.68,
                    "low": 194.83,
                    "close": 194.83,
                    "volume": 52242800,
                    "adjclose": 193.67
                },
                "1703169000": {
                    "date": "21-12-2023",
                    "date_utc": 1703169000,
                    "open": 196.1,
                    "high": 197.08,
                    "low": 193.5,
                    "close": 194.68,
                    "volume": 46482500,
                    "adjclose": 193.52
                },
                "1703255400": {
                    "date": "22-12-2023",
                    "date_utc": 1703255400,
                    "open": 195.18,
                    "high": 195.41,
                    "low": 192.97,
                    "close": 193.6,
                    "volume": 37122800,
                    "adjclose": 192.44
                },
                "1703601000": {
                    "date": "26-12-2023",
                    "date_utc": 1703601000,
                    "open": 193.61,
                    "high": 193.89,
                    "low": 192.83,
                    "close": 193.05,
                    "volume": 28919300,
                    "adjclose": 191.9
                },
                "1703687400": {
                    "date": "27-12-2023",
                    "date_utc": 1703687400,
                    "open": 192.49,
                    "high": 193.5,
                    "low": 191.09,
                    "close": 193.15,
                    "volume": 48087700,
                    "adjclose": 192
                },
                "1703773800": {
                    "date": "28-12-2023",
                    "date_utc": 1703773800,
                    "open": 194.14,
                    "high": 194.66,
                    "low": 193.17,
                    "close": 193.58,
                    "volume": 34049900,
                    "adjclose": 192.42
                },
                "1703860200": {
                    "date": "29-12-2023",
                    "date_utc": 1703860200,
                    "open": 193.9,
                    "high": 194.4,
                    "low": 191.73,
                    "close": 192.53,
                    "volume": 42628800,
                    "adjclose": 191.38
                },
                "1704205800": {
                    "date": "02-01-2024",
                    "date_utc": 1704205800,
                    "open": 187.15,
                    "high": 188.44,
                    "low": 183.89,
                    "close": 185.64,
                    "volume": 82488700,
                    "adjclose": 184.53
                },
                "1704292200": {
                    "date": "03-01-2024",
                    "date_utc": 1704292200,
                    "open": 184.22,
                    "high": 185.88,
                    "low": 183.43,
                    "close": 184.25,
                    "volume": 58414500,
                    "adjclose": 183.15
                },
                "1704378600": {
                    "date": "04-01-2024",
                    "date_utc": 1704378600,
                    "open": 182.15,
                    "high": 183.09,
                    "low": 180.88,
                    "close": 181.91,
                    "volume": 71983600,
                    "adjclose": 180.82
                },
                "1704465000": {
                    "date": "05-01-2024",
                    "date_utc": 1704465000,
                    "open": 181.99,
                    "high": 182.76,
                    "low": 180.17,
                    "close": 181.18,
                    "volume": 62303300,
                    "adjclose": 180.1
                },
                "1704724200": {
                    "date": "08-01-2024",
                    "date_utc": 1704724200,
                    "open": 182.09,
                    "high": 185.6,
                    "low": 181.5,
                    "close": 185.56,
                    "volume": 59144500,
                    "adjclose": 184.45
                },
                "1704810600": {
                    "date": "09-01-2024",
                    "date_utc": 1704810600,
                    "open": 183.92,
                    "high": 185.15,
                    "low": 182.73,
                    "close": 185.14,
                    "volume": 42841800,
                    "adjclose": 184.04
                },
                "1704897000": {
                    "date": "10-01-2024",
                    "date_utc": 1704897000,
                    "open": 184.35,
                    "high": 186.4,
                    "low": 183.92,
                    "close": 186.19,
                    "volume": 46792900,
                    "adjclose": 185.08
                },
                "1704983400": {
                    "date": "11-01-2024",
                    "date_utc": 1704983400,
                    "open": 186.54,
                    "high": 187.05,
                    "low": 183.62,
                    "close": 185.59,
                    "volume": 49128400,
                    "adjclose": 184.48
                },
                "1705069800": {
                    "date": "12-01-2024",
                    "date_utc": 1705069800,
                    "open": 186.06,
                    "high": 186.74,
                    "low": 185.19,
                    "close": 185.92,
                    "volume": 40444700,
                    "adjclose": 184.81
                },
                "1705415400": {
                    "date": "16-01-2024",
                    "date_utc": 1705415400,
                    "open": 182.16,
                    "high": 184.26,
                    "low": 180.93,
                    "close": 183.63,
                    "volume": 65603000,
                    "adjclose": 182.53
                },
                "1705501800": {
                    "date": "17-01-2024",
                    "date_utc": 1705501800,
                    "open": 181.27,
                    "high": 182.93,
                    "low": 180.3,
                    "close": 182.68,
                    "volume": 47317400,
                    "adjclose": 181.59
                },
                "1705588200": {
                    "date": "18-01-2024",
                    "date_utc": 1705588200,
                    "open": 186.09,
                    "high": 189.14,
                    "low": 185.83,
                    "close": 188.63,
                    "volume": 78005800,
                    "adjclose": 187.5
                },
                "1705674600": {
                    "date": "19-01-2024",
                    "date_utc": 1705674600,
                    "open": 189.33,
                    "high": 191.95,
                    "low": 188.82,
                    "close": 191.56,
                    "volume": 68741000,
                    "adjclose": 190.42
                },
                "1705933800": {
                    "date": "22-01-2024",
                    "date_utc": 1705933800,
                    "open": 192.3,
                    "high": 195.33,
                    "low": 192.26,
                    "close": 193.89,
                    "volume": 60133900,
                    "adjclose": 192.73
                },
                "1706020200": {
                    "date": "23-01-2024",
                    "date_utc": 1706020200,
                    "open": 195.02,
                    "high": 195.75,
                    "low": 193.83,
                    "close": 195.18,
                    "volume": 42355600,
                    "adjclose": 194.02
                },
                "1706106600": {
                    "date": "24-01-2024",
                    "date_utc": 1706106600,
                    "open": 195.42,
                    "high": 196.38,
                    "low": 194.34,
                    "close": 194.5,
                    "volume": 53631300,
                    "adjclose": 193.34
                },
                "1706193000": {
                    "date": "25-01-2024",
                    "date_utc": 1706193000,
                    "open": 195.22,
                    "high": 196.27,
                    "low": 193.11,
                    "close": 194.17,
                    "volume": 54822100,
                    "adjclose": 193.01
                },
                "1706279400": {
                    "date": "26-01-2024",
                    "date_utc": 1706279400,
                    "open": 194.27,
                    "high": 194.76,
                    "low": 191.94,
                    "close": 192.42,
                    "volume": 44594000,
                    "adjclose": 191.27
                },
                "1706538600": {
                    "date": "29-01-2024",
                    "date_utc": 1706538600,
                    "open": 192.01,
                    "high": 192.2,
                    "low": 189.58,
                    "close": 191.73,
                    "volume": 47145600,
                    "adjclose": 190.59
                },
                "1706625000": {
                    "date": "30-01-2024",
                    "date_utc": 1706625000,
                    "open": 190.94,
                    "high": 191.8,
                    "low": 187.47,
                    "close": 188.04,
                    "volume": 55859400,
                    "adjclose": 186.92
                },
                "1706711400": {
                    "date": "31-01-2024",
                    "date_utc": 1706711400,
                    "open": 187.04,
                    "high": 187.1,
                    "low": 184.35,
                    "close": 184.4,
                    "volume": 55467800,
                    "adjclose": 183.3
                },
                "1706797800": {
                    "date": "01-02-2024",
                    "date_utc": 1706797800,
                    "open": 183.99,
                    "high": 186.95,
                    "low": 183.82,
                    "close": 186.86,
                    "volume": 64885400,
                    "adjclose": 185.74
                },
                "1706884200": {
                    "date": "02-02-2024",
                    "date_utc": 1706884200,
                    "open": 179.86,
                    "high": 187.33,
                    "low": 179.25,
                    "close": 185.85,
                    "volume": 102518000,
                    "adjclose": 184.74
                },
                "1707143400": {
                    "date": "05-02-2024",
                    "date_utc": 1707143400,
                    "open": 188.15,
                    "high": 189.25,
                    "low": 185.84,
                    "close": 187.68,
                    "volume": 69668800,
                    "adjclose": 186.56
                },
                "1707229800": {
                    "date": "06-02-2024",
                    "date_utc": 1707229800,
                    "open": 186.86,
                    "high": 189.31,
                    "low": 186.77,
                    "close": 189.3,
                    "volume": 43490800,
                    "adjclose": 188.17
                },
                "1707316200": {
                    "date": "07-02-2024",
                    "date_utc": 1707316200,
                    "open": 190.64,
                    "high": 191.05,
                    "low": 188.61,
                    "close": 189.41,
                    "volume": 53439000,
                    "adjclose": 188.28
                },
                "1707402600": {
                    "date": "08-02-2024",
                    "date_utc": 1707402600,
                    "open": 189.39,
                    "high": 189.54,
                    "low": 187.35,
                    "close": 188.32,
                    "volume": 40962000,
                    "adjclose": 187.2
                },
                "1707489000": {
                    "date": "09-02-2024",
                    "date_utc": 1707489000,
                    "open": 188.65,
                    "high": 189.99,
                    "low": 188,
                    "close": 188.85,
                    "volume": 45155200,
                    "adjclose": 187.96
                },
                "1707748200": {
                    "date": "12-02-2024",
                    "date_utc": 1707748200,
                    "open": 188.42,
                    "high": 188.67,
                    "low": 186.79,
                    "close": 187.15,
                    "volume": 41781900,
                    "adjclose": 186.27
                },
                "1707834600": {
                    "date": "13-02-2024",
                    "date_utc": 1707834600,
                    "open": 185.77,
                    "high": 186.21,
                    "low": 183.51,
                    "close": 185.04,
                    "volume": 56529500,
                    "adjclose": 184.17
                },
                "1707921000": {
                    "date": "14-02-2024",
                    "date_utc": 1707921000,
                    "open": 185.32,
                    "high": 185.53,
                    "low": 182.44,
                    "close": 184.15,
                    "volume": 54630500,
                    "adjclose": 183.28
                },
                "1708007400": {
                    "date": "15-02-2024",
                    "date_utc": 1708007400,
                    "open": 183.55,
                    "high": 184.49,
                    "low": 181.35,
                    "close": 183.86,
                    "volume": 65434500,
                    "adjclose": 183
                },
                "1708093800": {
                    "date": "16-02-2024",
                    "date_utc": 1708093800,
                    "open": 183.42,
                    "high": 184.85,
                    "low": 181.67,
                    "close": 182.31,
                    "volume": 49701400,
                    "adjclose": 181.45
                },
                "1708439400": {
                    "date": "20-02-2024",
                    "date_utc": 1708439400,
                    "open": 181.79,
                    "high": 182.43,
                    "low": 180,
                    "close": 181.56,
                    "volume": 53665600,
                    "adjclose": 180.71
                },
                "1708525800": {
                    "date": "21-02-2024",
                    "date_utc": 1708525800,
                    "open": 181.94,
                    "high": 182.89,
                    "low": 180.66,
                    "close": 182.32,
                    "volume": 41529700,
                    "adjclose": 181.46
                },
                "1708612200": {
                    "date": "22-02-2024",
                    "date_utc": 1708612200,
                    "open": 183.48,
                    "high": 184.96,
                    "low": 182.46,
                    "close": 184.37,
                    "volume": 52292200,
                    "adjclose": 183.5
                },
                "1708698600": {
                    "date": "23-02-2024",
                    "date_utc": 1708698600,
                    "open": 185.01,
                    "high": 185.04,
                    "low": 182.23,
                    "close": 182.52,
                    "volume": 45119700,
                    "adjclose": 181.66
                },
                "1708957800": {
                    "date": "26-02-2024",
                    "date_utc": 1708957800,
                    "open": 182.24,
                    "high": 182.76,
                    "low": 180.65,
                    "close": 181.16,
                    "volume": 40867400,
                    "adjclose": 180.31
                },
                "1709044200": {
                    "date": "27-02-2024",
                    "date_utc": 1709044200,
                    "open": 181.1,
                    "high": 183.92,
                    "low": 179.56,
                    "close": 182.63,
                    "volume": 54318900,
                    "adjclose": 181.77
                },
                "1709130600": {
                    "date": "28-02-2024",
                    "date_utc": 1709130600,
                    "open": 182.51,
                    "high": 183.12,
                    "low": 180.13,
                    "close": 181.42,
                    "volume": 48953900,
                    "adjclose": 180.57
                },
                "1709217000": {
                    "date": "29-02-2024",
                    "date_utc": 1709217000,
                    "open": 181.27,
                    "high": 182.57,
                    "low": 179.53,
                    "close": 180.75,
                    "volume": 136682600,
                    "adjclose": 179.9
                },
                "1709303400": {
                    "date": "01-03-2024",
                    "date_utc": 1709303400,
                    "open": 179.55,
                    "high": 180.53,
                    "low": 177.38,
                    "close": 179.66,
                    "volume": 73488000,
                    "adjclose": 178.82
                },
                "1709562600": {
                    "date": "04-03-2024",
                    "date_utc": 1709562600,
                    "open": 176.15,
                    "high": 176.9,
                    "low": 173.79,
                    "close": 175.1,
                    "volume": 81510100,
                    "adjclose": 174.28
                },
                "1709649000": {
                    "date": "05-03-2024",
                    "date_utc": 1709649000,
                    "open": 170.76,
                    "high": 172.04,
                    "low": 169.62,
                    "close": 170.12,
                    "volume": 95132400,
                    "adjclose": 169.32
                },
                "1709735400": {
                    "date": "06-03-2024",
                    "date_utc": 1709735400,
                    "open": 171.06,
                    "high": 171.24,
                    "low": 168.68,
                    "close": 169.12,
                    "volume": 68587700,
                    "adjclose": 168.33
                },
                "1709821800": {
                    "date": "07-03-2024",
                    "date_utc": 1709821800,
                    "open": 169.15,
                    "high": 170.73,
                    "low": 168.49,
                    "close": 169,
                    "volume": 71765100,
                    "adjclose": 168.21
                },
                "1709908200": {
                    "date": "08-03-2024",
                    "date_utc": 1709908200,
                    "open": 169,
                    "high": 173.7,
                    "low": 168.94,
                    "close": 170.73,
                    "volume": 76114600,
                    "adjclose": 169.93
                },
                "1710163800": {
                    "date": "11-03-2024",
                    "date_utc": 1710163800,
                    "open": 172.94,
                    "high": 174.38,
                    "low": 172.05,
                    "close": 172.75,
                    "volume": 60139500,
                    "adjclose": 171.94
                },
                "1710250200": {
                    "date": "12-03-2024",
                    "date_utc": 1710250200,
                    "open": 173.15,
                    "high": 174.03,
                    "low": 171.01,
                    "close": 173.23,
                    "volume": 59825400,
                    "adjclose": 172.42
                },
                "1710336600": {
                    "date": "13-03-2024",
                    "date_utc": 1710336600,
                    "open": 172.77,
                    "high": 173.19,
                    "low": 170.76,
                    "close": 171.13,
                    "volume": 52488700,
                    "adjclose": 170.33
                },
                "1710423000": {
                    "date": "14-03-2024",
                    "date_utc": 1710423000,
                    "open": 172.91,
                    "high": 174.31,
                    "low": 172.05,
                    "close": 173,
                    "volume": 72913500,
                    "adjclose": 172.19
                },
                "1710509400": {
                    "date": "15-03-2024",
                    "date_utc": 1710509400,
                    "open": 171.17,
                    "high": 172.62,
                    "low": 170.29,
                    "close": 172.62,
                    "volume": 121664700,
                    "adjclose": 171.81
                },
                "1710768600": {
                    "date": "18-03-2024",
                    "date_utc": 1710768600,
                    "open": 175.57,
                    "high": 177.71,
                    "low": 173.52,
                    "close": 173.72,
                    "volume": 75604200,
                    "adjclose": 172.9
                },
                "1710855000": {
                    "date": "19-03-2024",
                    "date_utc": 1710855000,
                    "open": 174.34,
                    "high": 176.61,
                    "low": 173.03,
                    "close": 176.08,
                    "volume": 55215200,
                    "adjclose": 175.25
                },
                "1710941400": {
                    "date": "20-03-2024",
                    "date_utc": 1710941400,
                    "open": 175.72,
                    "high": 178.67,
                    "low": 175.09,
                    "close": 178.67,
                    "volume": 53423100,
                    "adjclose": 177.83
                },
                "1711027800": {
                    "date": "21-03-2024",
                    "date_utc": 1711027800,
                    "open": 177.05,
                    "high": 177.49,
                    "low": 170.84,
                    "close": 171.37,
                    "volume": 106181300,
                    "adjclose": 170.56
                },
                "1711114200": {
                    "date": "22-03-2024",
                    "date_utc": 1711114200,
                    "open": 171.76,
                    "high": 173.05,
                    "low": 170.06,
                    "close": 172.28,
                    "volume": 71106600,
                    "adjclose": 171.47
                },
                "1711373400": {
                    "date": "25-03-2024",
                    "date_utc": 1711373400,
                    "open": 170.57,
                    "high": 171.94,
                    "low": 169.45,
                    "close": 170.85,
                    "volume": 54288300,
                    "adjclose": 170.05
                },
                "1711459800": {
                    "date": "26-03-2024",
                    "date_utc": 1711459800,
                    "open": 170,
                    "high": 171.42,
                    "low": 169.58,
                    "close": 169.71,
                    "volume": 57388400,
                    "adjclose": 168.91
                },
                "1711546200": {
                    "date": "27-03-2024",
                    "date_utc": 1711546200,
                    "open": 170.41,
                    "high": 173.6,
                    "low": 170.11,
                    "close": 173.31,
                    "volume": 60273300,
                    "adjclose": 172.5
                },
                "1711632600": {
                    "date": "28-03-2024",
                    "date_utc": 1711632600,
                    "open": 171.75,
                    "high": 172.23,
                    "low": 170.51,
                    "close": 171.48,
                    "volume": 65672700,
                    "adjclose": 170.67
                },
                "1711978200": {
                    "date": "01-04-2024",
                    "date_utc": 1711978200,
                    "open": 171.19,
                    "high": 171.25,
                    "low": 169.48,
                    "close": 170.03,
                    "volume": 46240500,
                    "adjclose": 169.23
                },
                "1712064600": {
                    "date": "02-04-2024",
                    "date_utc": 1712064600,
                    "open": 169.08,
                    "high": 169.34,
                    "low": 168.23,
                    "close": 168.84,
                    "volume": 49329500,
                    "adjclose": 168.05
                },
                "1712151000": {
                    "date": "03-04-2024",
                    "date_utc": 1712151000,
                    "open": 168.79,
                    "high": 170.68,
                    "low": 168.58,
                    "close": 169.65,
                    "volume": 47691700,
                    "adjclose": 168.85
                },
                "1712237400": {
                    "date": "04-04-2024",
                    "date_utc": 1712237400,
                    "open": 170.29,
                    "high": 171.92,
                    "low": 168.82,
                    "close": 168.82,
                    "volume": 53704400,
                    "adjclose": 168.03
                },
                "1712323800": {
                    "date": "05-04-2024",
                    "date_utc": 1712323800,
                    "open": 169.59,
                    "high": 170.39,
                    "low": 168.95,
                    "close": 169.58,
                    "volume": 42055200,
                    "adjclose": 168.78
                },
                "1712583000": {
                    "date": "08-04-2024",
                    "date_utc": 1712583000,
                    "open": 169.03,
                    "high": 169.2,
                    "low": 168.24,
                    "close": 168.45,
                    "volume": 37425500,
                    "adjclose": 167.66
                },
                "1712669400": {
                    "date": "09-04-2024",
                    "date_utc": 1712669400,
                    "open": 168.7,
                    "high": 170.08,
                    "low": 168.35,
                    "close": 169.67,
                    "volume": 42451200,
                    "adjclose": 168.87
                },
                "1712755800": {
                    "date": "10-04-2024",
                    "date_utc": 1712755800,
                    "open": 168.8,
                    "high": 169.09,
                    "low": 167.11,
                    "close": 167.78,
                    "volume": 49709300,
                    "adjclose": 166.99
                },
                "1712842200": {
                    "date": "11-04-2024",
                    "date_utc": 1712842200,
                    "open": 168.34,
                    "high": 175.46,
                    "low": 168.16,
                    "close": 175.04,
                    "volume": 91070300,
                    "adjclose": 174.22
                },
                "1712928600": {
                    "date": "12-04-2024",
                    "date_utc": 1712928600,
                    "open": 174.26,
                    "high": 178.36,
                    "low": 174.21,
                    "close": 176.55,
                    "volume": 101593300,
                    "adjclose": 175.72
                },
                "1713187800": {
                    "date": "15-04-2024",
                    "date_utc": 1713187800,
                    "open": 175.36,
                    "high": 176.63,
                    "low": 172.5,
                    "close": 172.69,
                    "volume": 73531800,
                    "adjclose": 171.88
                },
                "1713274200": {
                    "date": "16-04-2024",
                    "date_utc": 1713274200,
                    "open": 171.75,
                    "high": 173.76,
                    "low": 168.27,
                    "close": 169.38,
                    "volume": 73711200,
                    "adjclose": 168.58
                },
                "1713360600": {
                    "date": "17-04-2024",
                    "date_utc": 1713360600,
                    "open": 169.61,
                    "high": 170.65,
                    "low": 168,
                    "close": 168,
                    "volume": 50901200,
                    "adjclose": 167.21
                },
                "1713447000": {
                    "date": "18-04-2024",
                    "date_utc": 1713447000,
                    "open": 168.03,
                    "high": 168.64,
                    "low": 166.55,
                    "close": 167.04,
                    "volume": 43122900,
                    "adjclose": 166.25
                },
                "1713533400": {
                    "date": "19-04-2024",
                    "date_utc": 1713533400,
                    "open": 166.21,
                    "high": 166.4,
                    "low": 164.08,
                    "close": 165,
                    "volume": 67772100,
                    "adjclose": 164.22
                },
                "1713792600": {
                    "date": "22-04-2024",
                    "date_utc": 1713792600,
                    "open": 165.52,
                    "high": 167.26,
                    "low": 164.77,
                    "close": 165.84,
                    "volume": 48116400,
                    "adjclose": 165.06
                },
                "1713879000": {
                    "date": "23-04-2024",
                    "date_utc": 1713879000,
                    "open": 165.35,
                    "high": 167.05,
                    "low": 164.92,
                    "close": 166.9,
                    "volume": 49537800,
                    "adjclose": 166.12
                },
                "1713965400": {
                    "date": "24-04-2024",
                    "date_utc": 1713965400,
                    "open": 166.54,
                    "high": 169.3,
                    "low": 166.21,
                    "close": 169.02,
                    "volume": 48251800,
                    "adjclose": 168.23
                },
                "1714051800": {
                    "date": "25-04-2024",
                    "date_utc": 1714051800,
                    "open": 169.53,
                    "high": 170.61,
                    "low": 168.15,
                    "close": 169.89,
                    "volume": 50558300,
                    "adjclose": 169.09
                },
                "1714138200": {
                    "date": "26-04-2024",
                    "date_utc": 1714138200,
                    "open": 169.88,
                    "high": 171.34,
                    "low": 169.18,
                    "close": 169.3,
                    "volume": 44838400,
                    "adjclose": 168.5
                },
                "1714397400": {
                    "date": "29-04-2024",
                    "date_utc": 1714397400,
                    "open": 173.37,
                    "high": 176.03,
                    "low": 173.1,
                    "close": 173.5,
                    "volume": 68169400,
                    "adjclose": 172.68
                },
                "1714483800": {
                    "date": "30-04-2024",
                    "date_utc": 1714483800,
                    "open": 173.33,
                    "high": 174.99,
                    "low": 170,
                    "close": 170.33,
                    "volume": 65934800,
                    "adjclose": 169.53
                },
                "1714570200": {
                    "date": "01-05-2024",
                    "date_utc": 1714570200,
                    "open": 169.58,
                    "high": 172.71,
                    "low": 169.11,
                    "close": 169.3,
                    "volume": 50383100,
                    "adjclose": 168.5
                },
                "1714656600": {
                    "date": "02-05-2024",
                    "date_utc": 1714656600,
                    "open": 172.51,
                    "high": 173.42,
                    "low": 170.89,
                    "close": 173.03,
                    "volume": 94214900,
                    "adjclose": 172.22
                },
                "1714743000": {
                    "date": "03-05-2024",
                    "date_utc": 1714743000,
                    "open": 186.65,
                    "high": 187,
                    "low": 182.66,
                    "close": 183.38,
                    "volume": 163224100,
                    "adjclose": 182.52
                },
                "1715002200": {
                    "date": "06-05-2024",
                    "date_utc": 1715002200,
                    "open": 182.35,
                    "high": 184.2,
                    "low": 180.42,
                    "close": 181.71,
                    "volume": 78569700,
                    "adjclose": 180.86
                },
                "1715088600": {
                    "date": "07-05-2024",
                    "date_utc": 1715088600,
                    "open": 183.45,
                    "high": 184.9,
                    "low": 181.32,
                    "close": 182.4,
                    "volume": 77305800,
                    "adjclose": 181.54
                },
                "1715175000": {
                    "date": "08-05-2024",
                    "date_utc": 1715175000,
                    "open": 182.85,
                    "high": 183.07,
                    "low": 181.45,
                    "close": 182.74,
                    "volume": 45057100,
                    "adjclose": 181.88
                },
                "1715261400": {
                    "date": "09-05-2024",
                    "date_utc": 1715261400,
                    "open": 182.56,
                    "high": 184.66,
                    "low": 182.11,
                    "close": 184.57,
                    "volume": 48983000,
                    "adjclose": 183.7
                },
                "1715347800": {
                    "date": "10-05-2024",
                    "date_utc": 1715347800,
                    "open": 184.9,
                    "high": 185.09,
                    "low": 182.13,
                    "close": 183.05,
                    "volume": 50759500,
                    "adjclose": 182.44
                },
                "1715607000": {
                    "date": "13-05-2024",
                    "date_utc": 1715607000,
                    "open": 185.44,
                    "high": 187.1,
                    "low": 184.62,
                    "close": 186.28,
                    "volume": 72044800,
                    "adjclose": 185.66
                },
                "1715693400": {
                    "date": "14-05-2024",
                    "date_utc": 1715693400,
                    "open": 187.51,
                    "high": 188.3,
                    "low": 186.29,
                    "close": 187.43,
                    "volume": 52393600,
                    "adjclose": 186.8
                },
                "1715779800": {
                    "date": "15-05-2024",
                    "date_utc": 1715779800,
                    "open": 187.91,
                    "high": 190.65,
                    "low": 187.37,
                    "close": 189.72,
                    "volume": 70400000,
                    "adjclose": 189.08
                },
                "1715866200": {
                    "date": "16-05-2024",
                    "date_utc": 1715866200,
                    "open": 190.47,
                    "high": 191.1,
                    "low": 189.66,
                    "close": 189.84,
                    "volume": 52845200,
                    "adjclose": 189.2
                },
                "1715952600": {
                    "date": "17-05-2024",
                    "date_utc": 1715952600,
                    "open": 189.51,
                    "high": 190.81,
                    "low": 189.18,
                    "close": 189.87,
                    "volume": 41282900,
                    "adjclose": 189.23
                },
                "1716211800": {
                    "date": "20-05-2024",
                    "date_utc": 1716211800,
                    "open": 189.33,
                    "high": 191.92,
                    "low": 189.01,
                    "close": 191.04,
                    "volume": 44361300,
                    "adjclose": 190.4
                },
                "1716298200": {
                    "date": "21-05-2024",
                    "date_utc": 1716298200,
                    "open": 191.09,
                    "high": 192.73,
                    "low": 190.92,
                    "close": 192.35,
                    "volume": 42309400,
                    "adjclose": 191.71
                },
                "1716384600": {
                    "date": "22-05-2024",
                    "date_utc": 1716384600,
                    "open": 192.27,
                    "high": 192.82,
                    "low": 190.27,
                    "close": 190.9,
                    "volume": 34648500,
                    "adjclose": 190.26
                },
                "1716471000": {
                    "date": "23-05-2024",
                    "date_utc": 1716471000,
                    "open": 190.98,
                    "high": 191,
                    "low": 186.63,
                    "close": 186.88,
                    "volume": 51005900,
                    "adjclose": 186.25
                },
                "1716557400": {
                    "date": "24-05-2024",
                    "date_utc": 1716557400,
                    "open": 188.82,
                    "high": 190.58,
                    "low": 188.04,
                    "close": 189.98,
                    "volume": 36294600,
                    "adjclose": 189.34
                },
                "1716903000": {
                    "date": "28-05-2024",
                    "date_utc": 1716903000,
                    "open": 191.51,
                    "high": 193,
                    "low": 189.1,
                    "close": 189.99,
                    "volume": 52280100,
                    "adjclose": 189.35
                },
                "1716989400": {
                    "date": "29-05-2024",
                    "date_utc": 1716989400,
                    "open": 189.61,
                    "high": 192.25,
                    "low": 189.51,
                    "close": 190.29,
                    "volume": 53068000,
                    "adjclose": 189.65
                },
                "1717075800": {
                    "date": "30-05-2024",
                    "date_utc": 1717075800,
                    "open": 190.76,
                    "high": 192.18,
                    "low": 190.63,
                    "close": 191.29,
                    "volume": 49947900,
                    "adjclose": 190.65
                },
                "1717162200": {
                    "date": "31-05-2024",
                    "date_utc": 1717162200,
                    "open": 191.44,
                    "high": 192.57,
                    "low": 189.91,
                    "close": 192.25,
                    "volume": 75158300,
                    "adjclose": 191.61
                },
                "1717421400": {
                    "date": "03-06-2024",
                    "date_utc": 1717421400,
                    "open": 192.9,
                    "high": 194.99,
                    "low": 192.52,
                    "close": 194.03,
                    "volume": 50080500,
                    "adjclose": 193.38
                },
                "1717507800": {
                    "date": "04-06-2024",
                    "date_utc": 1717507800,
                    "open": 194.64,
                    "high": 195.32,
                    "low": 193.03,
                    "close": 194.35,
                    "volume": 47471400,
                    "adjclose": 193.7
                },
                "1717594200": {
                    "date": "05-06-2024",
                    "date_utc": 1717594200,
                    "open": 195.4,
                    "high": 196.9,
                    "low": 194.87,
                    "close": 195.87,
                    "volume": 54156800,
                    "adjclose": 195.21
                },
                "1717680600": {
                    "date": "06-06-2024",
                    "date_utc": 1717680600,
                    "open": 195.69,
                    "high": 196.5,
                    "low": 194.17,
                    "close": 194.48,
                    "volume": 41181800,
                    "adjclose": 193.83
                },
                "1717767000": {
                    "date": "07-06-2024",
                    "date_utc": 1717767000,
                    "open": 194.65,
                    "high": 196.94,
                    "low": 194.14,
                    "close": 196.89,
                    "volume": 53103900,
                    "adjclose": 196.23
                },
                "1718026200": {
                    "date": "10-06-2024",
                    "date_utc": 1718026200,
                    "open": 196.9,
                    "high": 197.3,
                    "low": 192.15,
                    "close": 193.12,
                    "volume": 97262100,
                    "adjclose": 192.47
                },
                "1718112600": {
                    "date": "11-06-2024",
                    "date_utc": 1718112600,
                    "open": 193.65,
                    "high": 207.16,
                    "low": 193.63,
                    "close": 207.15,
                    "volume": 172373300,
                    "adjclose": 206.46
                },
                "1718199000": {
                    "date": "12-06-2024",
                    "date_utc": 1718199000,
                    "open": 207.37,
                    "high": 220.2,
                    "low": 206.9,
                    "close": 213.07,
                    "volume": 198134300,
                    "adjclose": 212.36
                },
                "1718285400": {
                    "date": "13-06-2024",
                    "date_utc": 1718285400,
                    "open": 214.74,
                    "high": 216.75,
                    "low": 211.6,
                    "close": 214.24,
                    "volume": 97862700,
                    "adjclose": 213.52
                },
                "1718371800": {
                    "date": "14-06-2024",
                    "date_utc": 1718371800,
                    "open": 213.85,
                    "high": 215.17,
                    "low": 211.3,
                    "close": 212.49,
                    "volume": 70122700,
                    "adjclose": 211.78
                },
                "1718631000": {
                    "date": "17-06-2024",
                    "date_utc": 1718631000,
                    "open": 213.37,
                    "high": 218.95,
                    "low": 212.72,
                    "close": 216.67,
                    "volume": 93728300,
                    "adjclose": 215.94
                },
                "1718717400": {
                    "date": "18-06-2024",
                    "date_utc": 1718717400,
                    "open": 217.59,
                    "high": 218.63,
                    "low": 213,
                    "close": 214.29,
                    "volume": 79943300,
                    "adjclose": 213.57
                },
                "1718890200": {
                    "date": "20-06-2024",
                    "date_utc": 1718890200,
                    "open": 213.93,
                    "high": 214.24,
                    "low": 208.85,
                    "close": 209.68,
                    "volume": 86172500,
                    "adjclose": 208.98
                },
                "1718976600": {
                    "date": "21-06-2024",
                    "date_utc": 1718976600,
                    "open": 210.39,
                    "high": 211.89,
                    "low": 207.11,
                    "close": 207.49,
                    "volume": 246421400,
                    "adjclose": 206.79
                },
                "1719235800": {
                    "date": "24-06-2024",
                    "date_utc": 1719235800,
                    "open": 207.72,
                    "high": 212.7,
                    "low": 206.59,
                    "close": 208.14,
                    "volume": 80727000,
                    "adjclose": 207.44
                },
                "1719322200": {
                    "date": "25-06-2024",
                    "date_utc": 1719322200,
                    "open": 209.15,
                    "high": 211.38,
                    "low": 208.61,
                    "close": 209.07,
                    "volume": 56713900,
                    "adjclose": 208.37
                },
                "1719408600": {
                    "date": "26-06-2024",
                    "date_utc": 1719408600,
                    "open": 211.5,
                    "high": 214.86,
                    "low": 210.64,
                    "close": 213.25,
                    "volume": 66213200,
                    "adjclose": 212.54
                },
                "1719495000": {
                    "date": "27-06-2024",
                    "date_utc": 1719495000,
                    "open": 214.69,
                    "high": 215.74,
                    "low": 212.35,
                    "close": 214.1,
                    "volume": 49772700,
                    "adjclose": 213.38
                },
                "1719581400": {
                    "date": "28-06-2024",
                    "date_utc": 1719581400,
                    "open": 215.77,
                    "high": 216.07,
                    "low": 210.3,
                    "close": 210.62,
                    "volume": 82542700,
                    "adjclose": 209.91
                },
                "1719840600": {
                    "date": "01-07-2024",
                    "date_utc": 1719840600,
                    "open": 212.09,
                    "high": 217.51,
                    "low": 211.92,
                    "close": 216.75,
                    "volume": 60402900,
                    "adjclose": 216.02
                },
                "1719927000": {
                    "date": "02-07-2024",
                    "date_utc": 1719927000,
                    "open": 216.15,
                    "high": 220.38,
                    "low": 215.1,
                    "close": 220.27,
                    "volume": 58046200,
                    "adjclose": 219.53
                },
                "1720013400": {
                    "date": "03-07-2024",
                    "date_utc": 1720013400,
                    "open": 220,
                    "high": 221.55,
                    "low": 219.03,
                    "close": 221.55,
                    "volume": 37369800,
                    "adjclose": 220.81
                },
                "1720186200": {
                    "date": "05-07-2024",
                    "date_utc": 1720186200,
                    "open": 221.65,
                    "high": 226.45,
                    "low": 221.65,
                    "close": 226.34,
                    "volume": 60412400,
                    "adjclose": 225.58
                },
                "1720445400": {
                    "date": "08-07-2024",
                    "date_utc": 1720445400,
                    "open": 227.09,
                    "high": 227.85,
                    "low": 223.25,
                    "close": 227.82,
                    "volume": 59085900,
                    "adjclose": 227.06
                },
                "1720531800": {
                    "date": "09-07-2024",
                    "date_utc": 1720531800,
                    "open": 227.93,
                    "high": 229.4,
                    "low": 226.37,
                    "close": 228.68,
                    "volume": 48076100,
                    "adjclose": 227.91
                },
                "1720618200": {
                    "date": "10-07-2024",
                    "date_utc": 1720618200,
                    "open": 229.3,
                    "high": 233.08,
                    "low": 229.25,
                    "close": 232.98,
                    "volume": 62627700,
                    "adjclose": 232.2
                },
                "1720704600": {
                    "date": "11-07-2024",
                    "date_utc": 1720704600,
                    "open": 231.39,
                    "high": 232.39,
                    "low": 225.77,
                    "close": 227.57,
                    "volume": 64710600,
                    "adjclose": 226.81
                },
                "1720791000": {
                    "date": "12-07-2024",
                    "date_utc": 1720791000,
                    "open": 228.92,
                    "high": 232.64,
                    "low": 228.68,
                    "close": 230.54,
                    "volume": 53046500,
                    "adjclose": 229.77
                },
                "1721050200": {
                    "date": "15-07-2024",
                    "date_utc": 1721050200,
                    "open": 236.48,
                    "high": 237.23,
                    "low": 233.09,
                    "close": 234.4,
                    "volume": 62631300,
                    "adjclose": 233.61
                },
                "1721136600": {
                    "date": "16-07-2024",
                    "date_utc": 1721136600,
                    "open": 235,
                    "high": 236.27,
                    "low": 232.33,
                    "close": 234.82,
                    "volume": 43234300,
                    "adjclose": 234.03
                },
                "1721223000": {
                    "date": "17-07-2024",
                    "date_utc": 1721223000,
                    "open": 229.45,
                    "high": 231.46,
                    "low": 226.64,
                    "close": 228.88,
                    "volume": 57345900,
                    "adjclose": 228.11
                },
                "1721309400": {
                    "date": "18-07-2024",
                    "date_utc": 1721309400,
                    "open": 230.28,
                    "high": 230.44,
                    "low": 222.27,
                    "close": 224.18,
                    "volume": 66034600,
                    "adjclose": 223.43
                },
                "1721395800": {
                    "date": "19-07-2024",
                    "date_utc": 1721395800,
                    "open": 224.82,
                    "high": 226.8,
                    "low": 223.28,
                    "close": 224.31,
                    "volume": 49151500,
                    "adjclose": 223.56
                },
                "1721655000": {
                    "date": "22-07-2024",
                    "date_utc": 1721655000,
                    "open": 227.01,
                    "high": 227.78,
                    "low": 223.09,
                    "close": 223.96,
                    "volume": 48201800,
                    "adjclose": 223.21
                },
                "1721741400": {
                    "date": "23-07-2024",
                    "date_utc": 1721741400,
                    "open": 224.37,
                    "high": 226.94,
                    "low": 222.68,
                    "close": 225.01,
                    "volume": 39960300,
                    "adjclose": 224.26
                },
                "1721827800": {
                    "date": "24-07-2024",
                    "date_utc": 1721827800,
                    "open": 224,
                    "high": 224.8,
                    "low": 217.13,
                    "close": 218.54,
                    "volume": 61777600,
                    "adjclose": 217.81
                },
                "1721914200": {
                    "date": "25-07-2024",
                    "date_utc": 1721914200,
                    "open": 218.93,
                    "high": 220.85,
                    "low": 214.62,
                    "close": 217.49,
                    "volume": 51391200,
                    "adjclose": 216.76
                },
                "1722000600": {
                    "date": "26-07-2024",
                    "date_utc": 1722000600,
                    "open": 218.7,
                    "high": 219.49,
                    "low": 216.01,
                    "close": 217.96,
                    "volume": 41601300,
                    "adjclose": 217.23
                },
                "1722259800": {
                    "date": "29-07-2024",
                    "date_utc": 1722259800,
                    "open": 216.96,
                    "high": 219.3,
                    "low": 215.75,
                    "close": 218.24,
                    "volume": 36311800,
                    "adjclose": 217.51
                },
                "1722346200": {
                    "date": "30-07-2024",
                    "date_utc": 1722346200,
                    "open": 219.19,
                    "high": 220.33,
                    "low": 216.12,
                    "close": 218.8,
                    "volume": 41643800,
                    "adjclose": 218.07
                },
                "1722432600": {
                    "date": "31-07-2024",
                    "date_utc": 1722432600,
                    "open": 221.44,
                    "high": 223.82,
                    "low": 220.63,
                    "close": 222.08,
                    "volume": 50036300,
                    "adjclose": 221.34
                },
                "1722519000": {
                    "date": "01-08-2024",
                    "date_utc": 1722519000,
                    "open": 224.37,
                    "high": 224.48,
                    "low": 217.02,
                    "close": 218.36,
                    "volume": 62501000,
                    "adjclose": 217.63
                },
                "1722605400": {
                    "date": "02-08-2024",
                    "date_utc": 1722605400,
                    "open": 219.15,
                    "high": 225.6,
                    "low": 217.71,
                    "close": 219.86,
                    "volume": 105568600,
                    "adjclose": 219.12
                },
                "1722864600": {
                    "date": "05-08-2024",
                    "date_utc": 1722864600,
                    "open": 199.09,
                    "high": 213.5,
                    "low": 196,
                    "close": 209.27,
                    "volume": 119548600,
                    "adjclose": 208.57
                },
                "1722951000": {
                    "date": "06-08-2024",
                    "date_utc": 1722951000,
                    "open": 205.3,
                    "high": 209.99,
                    "low": 201.07,
                    "close": 207.23,
                    "volume": 69660500,
                    "adjclose": 206.54
                },
                "1723037400": {
                    "date": "07-08-2024",
                    "date_utc": 1723037400,
                    "open": 206.9,
                    "high": 213.64,
                    "low": 206.39,
                    "close": 209.82,
                    "volume": 63516400,
                    "adjclose": 209.12
                },
                "1723123800": {
                    "date": "08-08-2024",
                    "date_utc": 1723123800,
                    "open": 213.11,
                    "high": 214.2,
                    "low": 208.83,
                    "close": 213.31,
                    "volume": 47161100,
                    "adjclose": 212.6
                },
                "1723210200": {
                    "date": "09-08-2024",
                    "date_utc": 1723210200,
                    "open": 212.1,
                    "high": 216.78,
                    "low": 211.97,
                    "close": 216.24,
                    "volume": 42201600,
                    "adjclose": 215.52
                },
                "1723469400": {
                    "date": "12-08-2024",
                    "date_utc": 1723469400,
                    "open": 216.07,
                    "high": 219.51,
                    "low": 215.6,
                    "close": 217.53,
                    "volume": 38028100,
                    "adjclose": 217.05
                },
                "1723555800": {
                    "date": "13-08-2024",
                    "date_utc": 1723555800,
                    "open": 219.01,
                    "high": 221.89,
                    "low": 219.01,
                    "close": 221.27,
                    "volume": 44155300,
                    "adjclose": 220.78
                },
                "1723642200": {
                    "date": "14-08-2024",
                    "date_utc": 1723642200,
                    "open": 220.57,
                    "high": 223.03,
                    "low": 219.7,
                    "close": 221.72,
                    "volume": 41960600,
                    "adjclose": 221.23
                },
                "1723728600": {
                    "date": "15-08-2024",
                    "date_utc": 1723728600,
                    "open": 224.6,
                    "high": 225.35,
                    "low": 222.76,
                    "close": 224.72,
                    "volume": 46414000,
                    "adjclose": 224.23
                },
                "1723815000": {
                    "date": "16-08-2024",
                    "date_utc": 1723815000,
                    "open": 223.92,
                    "high": 226.83,
                    "low": 223.65,
                    "close": 226.05,
                    "volume": 44340200,
                    "adjclose": 225.55
                },
                "1724074200": {
                    "date": "19-08-2024",
                    "date_utc": 1724074200,
                    "open": 225.72,
                    "high": 225.99,
                    "low": 223.04,
                    "close": 225.89,
                    "volume": 40687800,
                    "adjclose": 225.39
                },
                "1724160600": {
                    "date": "20-08-2024",
                    "date_utc": 1724160600,
                    "open": 225.77,
                    "high": 227.17,
                    "low": 225.45,
                    "close": 226.51,
                    "volume": 30299000,
                    "adjclose": 226.01
                },
                "1724247000": {
                    "date": "21-08-2024",
                    "date_utc": 1724247000,
                    "open": 226.52,
                    "high": 227.98,
                    "low": 225.05,
                    "close": 226.4,
                    "volume": 34765500,
                    "adjclose": 225.9
                },
                "1724333400": {
                    "date": "22-08-2024",
                    "date_utc": 1724333400,
                    "open": 227.79,
                    "high": 228.34,
                    "low": 223.9,
                    "close": 224.53,
                    "volume": 43695300,
                    "adjclose": 224.04
                },
                "1724419800": {
                    "date": "23-08-2024",
                    "date_utc": 1724419800,
                    "open": 225.66,
                    "high": 228.22,
                    "low": 224.33,
                    "close": 226.84,
                    "volume": 38677300,
                    "adjclose": 226.34
                },
                "1724679000": {
                    "date": "26-08-2024",
                    "date_utc": 1724679000,
                    "open": 226.76,
                    "high": 227.28,
                    "low": 223.89,
                    "close": 227.18,
                    "volume": 30602200,
                    "adjclose": 226.68
                },
                "1724765400": {
                    "date": "27-08-2024",
                    "date_utc": 1724765400,
                    "open": 226,
                    "high": 228.85,
                    "low": 224.89,
                    "close": 228.03,
                    "volume": 35934600,
                    "adjclose": 227.53
                },
                "1724851800": {
                    "date": "28-08-2024",
                    "date_utc": 1724851800,
                    "open": 227.92,
                    "high": 229.86,
                    "low": 225.68,
                    "close": 226.49,
                    "volume": 38052200,
                    "adjclose": 225.99
                },
                "1724938200": {
                    "date": "29-08-2024",
                    "date_utc": 1724938200,
                    "open": 230.1,
                    "high": 232.92,
                    "low": 228.88,
                    "close": 229.79,
                    "volume": 51906300,
                    "adjclose": 229.29
                },
                "1725024600": {
                    "date": "30-08-2024",
                    "date_utc": 1725024600,
                    "open": 230.19,
                    "high": 230.4,
                    "low": 227.48,
                    "close": 229,
                    "volume": 52990800,
                    "adjclose": 228.5
                },
                "1725370200": {
                    "date": "03-09-2024",
                    "date_utc": 1725370200,
                    "open": 228.55,
                    "high": 229,
                    "low": 221.17,
                    "close": 222.77,
                    "volume": 50190600,
                    "adjclose": 222.28
                },
                "1725456600": {
                    "date": "04-09-2024",
                    "date_utc": 1725456600,
                    "open": 221.66,
                    "high": 221.78,
                    "low": 217.48,
                    "close": 220.85,
                    "volume": 43840200,
                    "adjclose": 220.37
                },
                "1725543000": {
                    "date": "05-09-2024",
                    "date_utc": 1725543000,
                    "open": 221.63,
                    "high": 225.48,
                    "low": 221.52,
                    "close": 222.38,
                    "volume": 36615400,
                    "adjclose": 221.89
                },
                "1725629400": {
                    "date": "06-09-2024",
                    "date_utc": 1725629400,
                    "open": 223.95,
                    "high": 225.24,
                    "low": 219.77,
                    "close": 220.82,
                    "volume": 48423000,
                    "adjclose": 220.34
                },
                "1725888600": {
                    "date": "09-09-2024",
                    "date_utc": 1725888600,
                    "open": 220.82,
                    "high": 221.27,
                    "low": 216.71,
                    "close": 220.91,
                    "volume": 67180000,
                    "adjclose": 220.42
                },
                "1725975000": {
                    "date": "10-09-2024",
                    "date_utc": 1725975000,
                    "open": 218.92,
                    "high": 221.48,
                    "low": 216.73,
                    "close": 220.11,
                    "volume": 51591000,
                    "adjclose": 219.63
                },
                "1726061400": {
                    "date": "11-09-2024",
                    "date_utc": 1726061400,
                    "open": 221.46,
                    "high": 223.09,
                    "low": 217.89,
                    "close": 222.66,
                    "volume": 44587100,
                    "adjclose": 222.17
                },
                "1726147800": {
                    "date": "12-09-2024",
                    "date_utc": 1726147800,
                    "open": 222.5,
                    "high": 223.55,
                    "low": 219.82,
                    "close": 222.77,
                    "volume": 37498200,
                    "adjclose": 222.28
                },
                "1726234200": {
                    "date": "13-09-2024",
                    "date_utc": 1726234200,
                    "open": 223.58,
                    "high": 224.04,
                    "low": 221.91,
                    "close": 222.5,
                    "volume": 36766600,
                    "adjclose": 222.01
                },
                "1726493400": {
                    "date": "16-09-2024",
                    "date_utc": 1726493400,
                    "open": 216.54,
                    "high": 217.22,
                    "low": 213.92,
                    "close": 216.32,
                    "volume": 59357400,
                    "adjclose": 215.84
                },
                "1726579800": {
                    "date": "17-09-2024",
                    "date_utc": 1726579800,
                    "open": 215.75,
                    "high": 216.9,
                    "low": 214.5,
                    "close": 216.79,
                    "volume": 45519300,
                    "adjclose": 216.31
                },
                "1726666200": {
                    "date": "18-09-2024",
                    "date_utc": 1726666200,
                    "open": 217.55,
                    "high": 222.71,
                    "low": 217.54,
                    "close": 220.69,
                    "volume": 59894900,
                    "adjclose": 220.21
                },
                "1726752600": {
                    "date": "19-09-2024",
                    "date_utc": 1726752600,
                    "open": 224.99,
                    "high": 229.82,
                    "low": 224.63,
                    "close": 228.87,
                    "volume": 66781300,
                    "adjclose": 228.37
                },
                "1726839000": {
                    "date": "20-09-2024",
                    "date_utc": 1726839000,
                    "open": 229.97,
                    "high": 233.09,
                    "low": 227.62,
                    "close": 228.2,
                    "volume": 318679900,
                    "adjclose": 227.7
                },
                "1727098200": {
                    "date": "23-09-2024",
                    "date_utc": 1727098200,
                    "open": 227.34,
                    "high": 229.45,
                    "low": 225.81,
                    "close": 226.47,
                    "volume": 54146000,
                    "adjclose": 225.97
                },
                "1727184600": {
                    "date": "24-09-2024",
                    "date_utc": 1727184600,
                    "open": 228.65,
                    "high": 229.35,
                    "low": 225.73,
                    "close": 227.37,
                    "volume": 43556100,
                    "adjclose": 226.87
                },
                "1727271000": {
                    "date": "25-09-2024",
                    "date_utc": 1727271000,
                    "open": 224.93,
                    "high": 227.29,
                    "low": 224.02,
                    "close": 226.37,
                    "volume": 42308700,
                    "adjclose": 225.87
                },
                "1727357400": {
                    "date": "26-09-2024",
                    "date_utc": 1727357400,
                    "open": 227.3,
                    "high": 228.5,
                    "low": 225.41,
                    "close": 227.52,
                    "volume": 36636700,
                    "adjclose": 227.02
                },
                "1727443800": {
                    "date": "27-09-2024",
                    "date_utc": 1727443800,
                    "open": 228.46,
                    "high": 229.52,
                    "low": 227.3,
                    "close": 227.79,
                    "volume": 34026000,
                    "adjclose": 227.29
                },
                "1727703000": {
                    "date": "30-09-2024",
                    "date_utc": 1727703000,
                    "open": 230.04,
                    "high": 233,
                    "low": 229.65,
                    "close": 233,
                    "volume": 54541900,
                    "adjclose": 232.49
                },
                "1727789400": {
                    "date": "01-10-2024",
                    "date_utc": 1727789400,
                    "open": 229.52,
                    "high": 229.65,
                    "low": 223.74,
                    "close": 226.21,
                    "volume": 63285000,
                    "adjclose": 225.71
                },
                "1727875800": {
                    "date": "02-10-2024",
                    "date_utc": 1727875800,
                    "open": 225.89,
                    "high": 227.37,
                    "low": 223.02,
                    "close": 226.78,
                    "volume": 32880600,
                    "adjclose": 226.28
                },
                "1727962200": {
                    "date": "03-10-2024",
                    "date_utc": 1727962200,
                    "open": 225.14,
                    "high": 226.81,
                    "low": 223.32,
                    "close": 225.67,
                    "volume": 34044200,
                    "adjclose": 225.17
                },
                "1728048600": {
                    "date": "04-10-2024",
                    "date_utc": 1728048600,
                    "open": 227.9,
                    "high": 228,
                    "low": 224.13,
                    "close": 226.8,
                    "volume": 37245100,
                    "adjclose": 226.3
                },
                "1728307800": {
                    "date": "07-10-2024",
                    "date_utc": 1728307800,
                    "open": 224.5,
                    "high": 225.69,
                    "low": 221.33,
                    "close": 221.69,
                    "volume": 39505400,
                    "adjclose": 221.2
                },
                "1728394200": {
                    "date": "08-10-2024",
                    "date_utc": 1728394200,
                    "open": 224.3,
                    "high": 225.98,
                    "low": 223.25,
                    "close": 225.77,
                    "volume": 31855700,
                    "adjclose": 225.27
                },
                "1728480600": {
                    "date": "09-10-2024",
                    "date_utc": 1728480600,
                    "open": 225.23,
                    "high": 229.75,
                    "low": 224.83,
                    "close": 229.54,
                    "volume": 33591100,
                    "adjclose": 229.04
                },
                "1728567000": {
                    "date": "10-10-2024",
                    "date_utc": 1728567000,
                    "open": 227.78,
                    "high": 229.5,
                    "low": 227.17,
                    "close": 229.04,
                    "volume": 28183500,
                    "adjclose": 228.54
                },
                "1728653400": {
                    "date": "11-10-2024",
                    "date_utc": 1728653400,
                    "open": 229.3,
                    "high": 229.41,
                    "low": 227.34,
                    "close": 227.55,
                    "volume": 31759200,
                    "adjclose": 227.05
                },
                "1728912600": {
                    "date": "14-10-2024",
                    "date_utc": 1728912600,
                    "open": 228.7,
                    "high": 231.73,
                    "low": 228.6,
                    "close": 231.3,
                    "volume": 39882100,
                    "adjclose": 230.79
                },
                "1728999000": {
                    "date": "15-10-2024",
                    "date_utc": 1728999000,
                    "open": 233.61,
                    "high": 237.49,
                    "low": 232.37,
                    "close": 233.85,
                    "volume": 64751400,
                    "adjclose": 233.34
                },
                "1729085400": {
                    "date": "16-10-2024",
                    "date_utc": 1729085400,
                    "open": 231.6,
                    "high": 232.12,
                    "low": 229.84,
                    "close": 231.78,
                    "volume": 34082200,
                    "adjclose": 231.27
                },
                "1729171800": {
                    "date": "17-10-2024",
                    "date_utc": 1729171800,
                    "open": 233.43,
                    "high": 233.85,
                    "low": 230.52,
                    "close": 232.15,
                    "volume": 32993800,
                    "adjclose": 231.64
                },
                "1729258200": {
                    "date": "18-10-2024",
                    "date_utc": 1729258200,
                    "open": 236.18,
                    "high": 236.18,
                    "low": 234.01,
                    "close": 235,
                    "volume": 46431500,
                    "adjclose": 234.48
                },
                "1729517400": {
                    "date": "21-10-2024",
                    "date_utc": 1729517400,
                    "open": 234.45,
                    "high": 236.85,
                    "low": 234.45,
                    "close": 236.48,
                    "volume": 36254500,
                    "adjclose": 235.96
                },
                "1729603800": {
                    "date": "22-10-2024",
                    "date_utc": 1729603800,
                    "open": 233.89,
                    "high": 236.22,
                    "low": 232.6,
                    "close": 235.86,
                    "volume": 38846600,
                    "adjclose": 235.34
                },
                "1729690200": {
                    "date": "23-10-2024",
                    "date_utc": 1729690200,
                    "open": 234.08,
                    "high": 235.14,
                    "low": 227.76,
                    "close": 230.76,
                    "volume": 52287000,
                    "adjclose": 230.25
                },
                "1729776600": {
                    "date": "24-10-2024",
                    "date_utc": 1729776600,
                    "open": 229.98,
                    "high": 230.82,
                    "low": 228.41,
                    "close": 230.57,
                    "volume": 31109500,
                    "adjclose": 230.06
                },
                "1729863000": {
                    "date": "25-10-2024",
                    "date_utc": 1729863000,
                    "open": 229.74,
                    "high": 233.22,
                    "low": 229.57,
                    "close": 231.41,
                    "volume": 38802300,
                    "adjclose": 230.9
                },
                "1730122200": {
                    "date": "28-10-2024",
                    "date_utc": 1730122200,
                    "open": 233.32,
                    "high": 234.73,
                    "low": 232.55,
                    "close": 233.4,
                    "volume": 36087100,
                    "adjclose": 232.89
                },
                "1730208600": {
                    "date": "29-10-2024",
                    "date_utc": 1730208600,
                    "open": 233.1,
                    "high": 234.33,
                    "low": 232.32,
                    "close": 233.67,
                    "volume": 35417200,
                    "adjclose": 233.16
                },
                "1730295000": {
                    "date": "30-10-2024",
                    "date_utc": 1730295000,
                    "open": 232.61,
                    "high": 233.47,
                    "low": 229.55,
                    "close": 230.1,
                    "volume": 47070900,
                    "adjclose": 229.59
                },
                "1730381400": {
                    "date": "31-10-2024",
                    "date_utc": 1730381400,
                    "open": 229.34,
                    "high": 229.83,
                    "low": 225.37,
                    "close": 225.91,
                    "volume": 64370100,
                    "adjclose": 225.41
                },
                "1730467800": {
                    "date": "01-11-2024",
                    "date_utc": 1730467800,
                    "open": 220.97,
                    "high": 225.35,
                    "low": 220.27,
                    "close": 222.91,
                    "volume": 65276700,
                    "adjclose": 222.42
                },
                "1730730600": {
                    "date": "04-11-2024",
                    "date_utc": 1730730600,
                    "open": 220.99,
                    "high": 222.79,
                    "low": 219.71,
                    "close": 222.01,
                    "volume": 44944500,
                    "adjclose": 221.52
                },
                "1730817000": {
                    "date": "05-11-2024",
                    "date_utc": 1730817000,
                    "open": 221.8,
                    "high": 223.95,
                    "low": 221.14,
                    "close": 223.45,
                    "volume": 28111300,
                    "adjclose": 222.96
                },
                "1730903400": {
                    "date": "06-11-2024",
                    "date_utc": 1730903400,
                    "open": 222.61,
                    "high": 226.07,
                    "low": 221.19,
                    "close": 222.72,
                    "volume": 54561100,
                    "adjclose": 222.23
                },
                "1730989800": {
                    "date": "07-11-2024",
                    "date_utc": 1730989800,
                    "open": 224.63,
                    "high": 227.88,
                    "low": 224.57,
                    "close": 227.48,
                    "volume": 42137700,
                    "adjclose": 226.98
                },
                "1731076200": {
                    "date": "08-11-2024",
                    "date_utc": 1731076200,
                    "open": 227.17,
                    "high": 228.66,
                    "low": 226.41,
                    "close": 226.96,
                    "volume": 38328800,
                    "adjclose": 226.71
                },
                "1731335400": {
                    "date": "11-11-2024",
                    "date_utc": 1731335400,
                    "open": 225,
                    "high": 225.7,
                    "low": 221.5,
                    "close": 224.23,
                    "volume": 42005600,
                    "adjclose": 223.98
                },
                "1731421800": {
                    "date": "12-11-2024",
                    "date_utc": 1731421800,
                    "open": 224.55,
                    "high": 225.59,
                    "low": 223.36,
                    "close": 224.23,
                    "volume": 40398300,
                    "adjclose": 223.98
                },
                "1731508200": {
                    "date": "13-11-2024",
                    "date_utc": 1731508200,
                    "open": 224.01,
                    "high": 226.65,
                    "low": 222.76,
                    "close": 225.12,
                    "volume": 48566200,
                    "adjclose": 224.87
                },
                "1731594600": {
                    "date": "14-11-2024",
                    "date_utc": 1731594600,
                    "open": 225.02,
                    "high": 228.87,
                    "low": 225,
                    "close": 228.22,
                    "volume": 44923900,
                    "adjclose": 227.97
                },
                "1731681000": {
                    "date": "15-11-2024",
                    "date_utc": 1731681000,
                    "open": 226.4,
                    "high": 226.92,
                    "low": 224.27,
                    "close": 225,
                    "volume": 47923700,
                    "adjclose": 224.75
                },
                "1731940200": {
                    "date": "18-11-2024",
                    "date_utc": 1731940200,
                    "open": 225.25,
                    "high": 229.74,
                    "low": 225.17,
                    "close": 228.02,
                    "volume": 44686000,
                    "adjclose": 227.77
                },
                "1732026600": {
                    "date": "19-11-2024",
                    "date_utc": 1732026600,
                    "open": 226.98,
                    "high": 230.16,
                    "low": 226.66,
                    "close": 228.28,
                    "volume": 36211800,
                    "adjclose": 228.03
                },
                "1732113000": {
                    "date": "20-11-2024",
                    "date_utc": 1732113000,
                    "open": 228.06,
                    "high": 229.93,
                    "low": 225.89,
                    "close": 229,
                    "volume": 35169600,
                    "adjclose": 228.75
                },
                "1732199400": {
                    "date": "21-11-2024",
                    "date_utc": 1732199400,
                    "open": 228.88,
                    "high": 230.16,
                    "low": 225.71,
                    "close": 228.52,
                    "volume": 42108300,
                    "adjclose": 228.27
                },
                "1732285800": {
                    "date": "22-11-2024",
                    "date_utc": 1732285800,
                    "open": 228.06,
                    "high": 230.72,
                    "low": 228.06,
                    "close": 229.87,
                    "volume": 38168300,
                    "adjclose": 229.62
                },
                "1732545000": {
                    "date": "25-11-2024",
                    "date_utc": 1732545000,
                    "open": 231.46,
                    "high": 233.25,
                    "low": 229.74,
                    "close": 232.87,
                    "volume": 90152800,
                    "adjclose": 232.61
                },
                "1732631400": {
                    "date": "26-11-2024",
                    "date_utc": 1732631400,
                    "open": 233.33,
                    "high": 235.57,
                    "low": 233.33,
                    "close": 235.06,
                    "volume": 45986200,
                    "adjclose": 234.8
                },
                "1732717800": {
                    "date": "27-11-2024",
                    "date_utc": 1732717800,
                    "open": 234.47,
                    "high": 235.69,
                    "low": 233.81,
                    "close": 234.93,
                    "volume": 33498400,
                    "adjclose": 234.67
                },
                "1732890600": {
                    "date": "29-11-2024",
                    "date_utc": 1732890600,
                    "open": 234.81,
                    "high": 237.81,
                    "low": 233.97,
                    "close": 237.33,
                    "volume": 28481400,
                    "adjclose": 237.07
                },
                "1733149800": {
                    "date": "02-12-2024",
                    "date_utc": 1733149800,
                    "open": 237.27,
                    "high": 240.79,
                    "low": 237.16,
                    "close": 239.59,
                    "volume": 48137100,
                    "adjclose": 239.33
                },
                "1733236200": {
                    "date": "03-12-2024",
                    "date_utc": 1733236200,
                    "open": 239.81,
                    "high": 242.76,
                    "low": 238.9,
                    "close": 242.65,
                    "volume": 38861000,
                    "adjclose": 242.38
                },
                "1733322600": {
                    "date": "04-12-2024",
                    "date_utc": 1733322600,
                    "open": 242.87,
                    "high": 244.11,
                    "low": 241.25,
                    "close": 243.01,
                    "volume": 44383900,
                    "adjclose": 242.74
                },
                "1733409000": {
                    "date": "05-12-2024",
                    "date_utc": 1733409000,
                    "open": 243.99,
                    "high": 244.54,
                    "low": 242.13,
                    "close": 243.04,
                    "volume": 40033900,
                    "adjclose": 242.77
                },
                "1733495400": {
                    "date": "06-12-2024",
                    "date_utc": 1733495400,
                    "open": 242.91,
                    "high": 244.63,
                    "low": 242.08,
                    "close": 242.84,
                    "volume": 36870600,
                    "adjclose": 242.57
                },
                "1733754600": {
                    "date": "09-12-2024",
                    "date_utc": 1733754600,
                    "open": 241.83,
                    "high": 247.24,
                    "low": 241.75,
                    "close": 246.75,
                    "volume": 44649200,
                    "adjclose": 246.48
                },
                "1733841000": {
                    "date": "10-12-2024",
                    "date_utc": 1733841000,
                    "open": 246.89,
                    "high": 248.21,
                    "low": 245.34,
                    "close": 247.77,
                    "volume": 36914800,
                    "adjclose": 247.5
                },
                "1733927400": {
                    "date": "11-12-2024",
                    "date_utc": 1733927400,
                    "open": 247.96,
                    "high": 250.8,
                    "low": 246.26,
                    "close": 246.49,
                    "volume": 45205800,
                    "adjclose": 246.22
                },
                "1734013800": {
                    "date": "12-12-2024",
                    "date_utc": 1734013800,
                    "open": 246.89,
                    "high": 248.74,
                    "low": 245.68,
                    "close": 247.96,
                    "volume": 32777500,
                    "adjclose": 247.69
                },
                "1734100200": {
                    "date": "13-12-2024",
                    "date_utc": 1734100200,
                    "open": 247.82,
                    "high": 249.29,
                    "low": 246.24,
                    "close": 248.13,
                    "volume": 33155300,
                    "adjclose": 247.86
                },
                "1734359400": {
                    "date": "16-12-2024",
                    "date_utc": 1734359400,
                    "open": 247.99,
                    "high": 251.38,
                    "low": 247.65,
                    "close": 251.04,
                    "volume": 51694800,
                    "adjclose": 250.76
                },
                "1734445800": {
                    "date": "17-12-2024",
                    "date_utc": 1734445800,
                    "open": 250.08,
                    "high": 253.83,
                    "low": 249.78,
                    "close": 253.48,
                    "volume": 51356400,
                    "adjclose": 253.2
                },
                "1734532200": {
                    "date": "18-12-2024",
                    "date_utc": 1734532200,
                    "open": 252.16,
                    "high": 254.28,
                    "low": 247.74,
                    "close": 248.05,
                    "volume": 56774100,
                    "adjclose": 247.78
                },
                "1734618600": {
                    "date": "19-12-2024",
                    "date_utc": 1734618600,
                    "open": 247.5,
                    "high": 252,
                    "low": 247.09,
                    "close": 249.79,
                    "volume": 60882300,
                    "adjclose": 249.52
                },
                "1734705000": {
                    "date": "20-12-2024",
                    "date_utc": 1734705000,
                    "open": 248.04,
                    "high": 255,
                    "low": 245.69,
                    "close": 254.49,
                    "volume": 147495300,
                    "adjclose": 254.21
                },
                "1734964200": {
                    "date": "23-12-2024",
                    "date_utc": 1734964200,
                    "open": 254.77,
                    "high": 255.65,
                    "low": 253.45,
                    "close": 255.27,
                    "volume": 40858800,
                    "adjclose": 254.99
                },
                "1735050600": {
                    "date": "24-12-2024",
                    "date_utc": 1735050600,
                    "open": 255.49,
                    "high": 258.21,
                    "low": 255.29,
                    "close": 258.2,
                    "volume": 23234700,
                    "adjclose": 257.92
                },
                "1735223400": {
                    "date": "26-12-2024",
                    "date_utc": 1735223400,
                    "open": 258.19,
                    "high": 260.1,
                    "low": 257.63,
                    "close": 259.02,
                    "volume": 27237100,
                    "adjclose": 258.74
                },
                "1735309800": {
                    "date": "27-12-2024",
                    "date_utc": 1735309800,
                    "open": 257.83,
                    "high": 258.7,
                    "low": 253.06,
                    "close": 255.59,
                    "volume": 42355300,
                    "adjclose": 255.31
                },
                "1735569000": {
                    "date": "30-12-2024",
                    "date_utc": 1735569000,
                    "open": 252.23,
                    "high": 253.5,
                    "low": 250.75,
                    "close": 252.2,
                    "volume": 35557500,
                    "adjclose": 251.92
                },
                "1735655400": {
                    "date": "31-12-2024",
                    "date_utc": 1735655400,
                    "open": 252.44,
                    "high": 253.28,
                    "low": 249.43,
                    "close": 250.42,
                    "volume": 39480700,
                    "adjclose": 250.14
                },
                "1735828200": {
                    "date": "02-01-2025",
                    "date_utc": 1735828200,
                    "open": 248.93,
                    "high": 249.1,
                    "low": 241.82,
                    "close": 243.85,
                    "volume": 55740700,
                    "adjclose": 243.58
                },
                "1735914600": {
                    "date": "03-01-2025",
                    "date_utc": 1735914600,
                    "open": 243.36,
                    "high": 244.18,
                    "low": 241.89,
                    "close": 243.36,
                    "volume": 40244100,
                    "adjclose": 243.09
                },
                "1736173800": {
                    "date": "06-01-2025",
                    "date_utc": 1736173800,
                    "open": 244.31,
                    "high": 247.33,
                    "low": 243.2,
                    "close": 245,
                    "volume": 45045600,
                    "adjclose": 244.73
                },
                "1736260200": {
                    "date": "07-01-2025",
                    "date_utc": 1736260200,
                    "open": 242.98,
                    "high": 245.55,
                    "low": 241.35,
                    "close": 242.21,
                    "volume": 40856000,
                    "adjclose": 241.94
                },
                "1736346600": {
                    "date": "08-01-2025",
                    "date_utc": 1736346600,
                    "open": 241.92,
                    "high": 243.71,
                    "low": 240.05,
                    "close": 242.7,
                    "volume": 37628900,
                    "adjclose": 242.43
                },
                "1736519400": {
                    "date": "10-01-2025",
                    "date_utc": 1736519400,
                    "open": 240.01,
                    "high": 240.16,
                    "low": 233,
                    "close": 236.85,
                    "volume": 61710900,
                    "adjclose": 236.59
                },
                "1736778600": {
                    "date": "13-01-2025",
                    "date_utc": 1736778600,
                    "open": 233.53,
                    "high": 234.67,
                    "low": 229.72,
                    "close": 234.4,
                    "volume": 49630700,
                    "adjclose": 234.14
                },
                "1736865000": {
                    "date": "14-01-2025",
                    "date_utc": 1736865000,
                    "open": 234.75,
                    "high": 236.12,
                    "low": 232.47,
                    "close": 233.28,
                    "volume": 39435300,
                    "adjclose": 233.02
                },
                "1736951400": {
                    "date": "15-01-2025",
                    "date_utc": 1736951400,
                    "open": 234.64,
                    "high": 238.96,
                    "low": 234.43,
                    "close": 237.87,
                    "volume": 39832000,
                    "adjclose": 237.61
                },
                "1737037800": {
                    "date": "16-01-2025",
                    "date_utc": 1737037800,
                    "open": 237.35,
                    "high": 238.01,
                    "low": 228.03,
                    "close": 228.26,
                    "volume": 71759100,
                    "adjclose": 228.01
                },
                "1737124200": {
                    "date": "17-01-2025",
                    "date_utc": 1737124200,
                    "open": 232.12,
                    "high": 232.29,
                    "low": 228.48,
                    "close": 229.98,
                    "volume": 68488300,
                    "adjclose": 229.73
                },
                "1737469800": {
                    "date": "21-01-2025",
                    "date_utc": 1737469800,
                    "open": 224,
                    "high": 224.42,
                    "low": 219.38,
                    "close": 222.64,
                    "volume": 98070400,
                    "adjclose": 222.4
                },
                "1737556200": {
                    "date": "22-01-2025",
                    "date_utc": 1737556200,
                    "open": 219.79,
                    "high": 224.12,
                    "low": 219.79,
                    "close": 223.83,
                    "volume": 64126500,
                    "adjclose": 223.58
                },
                "1737642600": {
                    "date": "23-01-2025",
                    "date_utc": 1737642600,
                    "open": 224.74,
                    "high": 227.03,
                    "low": 222.3,
                    "close": 223.66,
                    "volume": 60234800,
                    "adjclose": 223.41
                },
                "1737729000": {
                    "date": "24-01-2025",
                    "date_utc": 1737729000,
                    "open": 224.78,
                    "high": 225.63,
                    "low": 221.41,
                    "close": 222.78,
                    "volume": 54697900,
                    "adjclose": 222.54
                },
                "1737988200": {
                    "date": "27-01-2025",
                    "date_utc": 1737988200,
                    "open": 224.02,
                    "high": 232.15,
                    "low": 223.98,
                    "close": 229.86,
                    "volume": 94863400,
                    "adjclose": 229.61
                },
                "1738074600": {
                    "date": "28-01-2025",
                    "date_utc": 1738074600,
                    "open": 230.85,
                    "high": 240.19,
                    "low": 230.81,
                    "close": 238.26,
                    "volume": 75707600,
                    "adjclose": 238
                },
                "1738161000": {
                    "date": "29-01-2025",
                    "date_utc": 1738161000,
                    "open": 234.12,
                    "high": 239.86,
                    "low": 234.01,
                    "close": 239.36,
                    "volume": 45486100,
                    "adjclose": 239.1
                },
                "1738247400": {
                    "date": "30-01-2025",
                    "date_utc": 1738247400,
                    "open": 238.67,
                    "high": 240.79,
                    "low": 237.21,
                    "close": 237.59,
                    "volume": 55658300,
                    "adjclose": 237.33
                },
                "1738333800": {
                    "date": "31-01-2025",
                    "date_utc": 1738333800,
                    "open": 247.19,
                    "high": 247.19,
                    "low": 233.44,
                    "close": 236,
                    "volume": 101075100,
                    "adjclose": 235.74
                },
                "1738593000": {
                    "date": "03-02-2025",
                    "date_utc": 1738593000,
                    "open": 229.99,
                    "high": 231.83,
                    "low": 225.7,
                    "close": 228.01,
                    "volume": 73063300,
                    "adjclose": 227.76
                },
                "1738679400": {
                    "date": "04-02-2025",
                    "date_utc": 1738679400,
                    "open": 227.25,
                    "high": 233.13,
                    "low": 226.65,
                    "close": 232.8,
                    "volume": 45067300,
                    "adjclose": 232.54
                },
                "1738765800": {
                    "date": "05-02-2025",
                    "date_utc": 1738765800,
                    "open": 228.53,
                    "high": 232.67,
                    "low": 228.27,
                    "close": 232.47,
                    "volume": 39620300,
                    "adjclose": 232.21
                },
                "1738852200": {
                    "date": "06-02-2025",
                    "date_utc": 1738852200,
                    "open": 231.29,
                    "high": 233.8,
                    "low": 230.43,
                    "close": 233.22,
                    "volume": 29925300,
                    "adjclose": 232.96
                },
                "1738938600": {
                    "date": "07-02-2025",
                    "date_utc": 1738938600,
                    "open": 232.6,
                    "high": 234,
                    "low": 227.26,
                    "close": 227.63,
                    "volume": 39707200,
                    "adjclose": 227.38
                },
                "1739197800": {
                    "date": "10-02-2025",
                    "date_utc": 1739197800,
                    "open": 229.57,
                    "high": 230.59,
                    "low": 227.2,
                    "close": 227.65,
                    "volume": 33115600,
                    "adjclose": 227.65
                },
                "1739284200": {
                    "date": "11-02-2025",
                    "date_utc": 1739284200,
                    "open": 228.2,
                    "high": 235.23,
                    "low": 228.13,
                    "close": 232.62,
                    "volume": 53718400,
                    "adjclose": 232.62
                },
                "1739370600": {
                    "date": "12-02-2025",
                    "date_utc": 1739370600,
                    "open": 231.2,
                    "high": 236.96,
                    "low": 230.68,
                    "close": 236.87,
                    "volume": 45243300,
                    "adjclose": 236.87
                },
                "1739457000": {
                    "date": "13-02-2025",
                    "date_utc": 1739457000,
                    "open": 236.91,
                    "high": 242.34,
                    "low": 235.57,
                    "close": 241.53,
                    "volume": 53614100,
                    "adjclose": 241.53
                },
                "1739543400": {
                    "date": "14-02-2025",
                    "date_utc": 1739543400,
                    "open": 241.25,
                    "high": 245.55,
                    "low": 240.99,
                    "close": 244.6,
                    "volume": 40896200,
                    "adjclose": 244.6
                },
                "1739889000": {
                    "date": "18-02-2025",
                    "date_utc": 1739889000,
                    "open": 244.15,
                    "high": 245.18,
                    "low": 241.84,
                    "close": 244.47,
                    "volume": 48822500,
                    "adjclose": 244.47
                },
                "1739975400": {
                    "date": "19-02-2025",
                    "date_utc": 1739975400,
                    "open": 244.66,
                    "high": 246.01,
                    "low": 243.16,
                    "close": 244.87,
                    "volume": 32204200,
                    "adjclose": 244.87
                },
                "1740061800": {
                    "date": "20-02-2025",
                    "date_utc": 1740061800,
                    "open": 244.94,
                    "high": 246.78,
                    "low": 244.29,
                    "close": 245.83,
                    "volume": 32316900,
                    "adjclose": 245.83
                },
                "1740148200": {
                    "date": "21-02-2025",
                    "date_utc": 1740148200,
                    "open": 245.95,
                    "high": 248.69,
                    "low": 245.22,
                    "close": 245.55,
                    "volume": 53197400,
                    "adjclose": 245.55
                },
                "1740407400": {
                    "date": "24-02-2025",
                    "date_utc": 1740407400,
                    "open": 244.93,
                    "high": 248.86,
                    "low": 244.42,
                    "close": 247.1,
                    "volume": 51326400,
                    "adjclose": 247.1
                },
                "1740493800": {
                    "date": "25-02-2025",
                    "date_utc": 1740493800,
                    "open": 248,
                    "high": 250,
                    "low": 244.91,
                    "close": 247.04,
                    "volume": 48013300,
                    "adjclose": 247.04
                },
                "1740580200": {
                    "date": "26-02-2025",
                    "date_utc": 1740580200,
                    "open": 244.33,
                    "high": 244.98,
                    "low": 239.13,
                    "close": 240.36,
                    "volume": 44433600,
                    "adjclose": 240.36
                },
                "1740666600": {
                    "date": "27-02-2025",
                    "date_utc": 1740666600,
                    "open": 239.41,
                    "high": 242.46,
                    "low": 237.06,
                    "close": 237.3,
                    "volume": 41153600,
                    "adjclose": 237.3
                },
                "1740753000": {
                    "date": "28-02-2025",
                    "date_utc": 1740753000,
                    "open": 236.95,
                    "high": 242.09,
                    "low": 230.2,
                    "close": 241.84,
                    "volume": 56833400,
                    "adjclose": 241.84
                },
                "1741012200": {
                    "date": "03-03-2025",
                    "date_utc": 1741012200,
                    "open": 241.79,
                    "high": 244.03,
                    "low": 236.11,
                    "close": 238.03,
                    "volume": 47184000,
                    "adjclose": 238.03
                },
                "1741098600": {
                    "date": "04-03-2025",
                    "date_utc": 1741098600,
                    "open": 237.71,
                    "high": 240.07,
                    "low": 234.68,
                    "close": 235.93,
                    "volume": 53798100,
                    "adjclose": 235.93
                },
                "1741185000": {
                    "date": "05-03-2025",
                    "date_utc": 1741185000,
                    "open": 235.42,
                    "high": 236.55,
                    "low": 229.23,
                    "close": 235.74,
                    "volume": 47227600,
                    "adjclose": 235.74
                },
                "1741271400": {
                    "date": "06-03-2025",
                    "date_utc": 1741271400,
                    "open": 234.44,
                    "high": 237.86,
                    "low": 233.16,
                    "close": 235.33,
                    "volume": 45170400,
                    "adjclose": 235.33
                },
                "1741357800": {
                    "date": "07-03-2025",
                    "date_utc": 1741357800,
                    "open": 235.11,
                    "high": 241.37,
                    "low": 234.76,
                    "close": 239.07,
                    "volume": 46273600,
                    "adjclose": 239.07
                },
                "1741613400": {
                    "date": "10-03-2025",
                    "date_utc": 1741613400,
                    "open": 235.54,
                    "high": 236.16,
                    "low": 224.22,
                    "close": 227.48,
                    "volume": 72071200,
                    "adjclose": 227.48
                },
                "1741699800": {
                    "date": "11-03-2025",
                    "date_utc": 1741699800,
                    "open": 223.81,
                    "high": 225.84,
                    "low": 217.45,
                    "close": 220.84,
                    "volume": 76137400,
                    "adjclose": 220.84
                },
                "1741786200": {
                    "date": "12-03-2025",
                    "date_utc": 1741786200,
                    "open": 220.14,
                    "high": 221.75,
                    "low": 214.91,
                    "close": 216.98,
                    "volume": 62547500,
                    "adjclose": 216.98
                },
                "1741872600": {
                    "date": "13-03-2025",
                    "date_utc": 1741872600,
                    "open": 215.95,
                    "high": 216.84,
                    "low": 208.42,
                    "close": 209.68,
                    "volume": 61368300,
                    "adjclose": 209.68
                },
                "1741959000": {
                    "date": "14-03-2025",
                    "date_utc": 1741959000,
                    "open": 211.25,
                    "high": 213.95,
                    "low": 209.58,
                    "close": 213.49,
                    "volume": 60107600,
                    "adjclose": 213.49
                },
                "1742218200": {
                    "date": "17-03-2025",
                    "date_utc": 1742218200,
                    "open": 213.31,
                    "high": 215.22,
                    "low": 209.97,
                    "close": 214,
                    "volume": 48073400,
                    "adjclose": 214
                },
                "1742304600": {
                    "date": "18-03-2025",
                    "date_utc": 1742304600,
                    "open": 214.16,
                    "high": 215.15,
                    "low": 211.49,
                    "close": 212.69,
                    "volume": 42432400,
                    "adjclose": 212.69
                },
                "1742391000": {
                    "date": "19-03-2025",
                    "date_utc": 1742391000,
                    "open": 214.22,
                    "high": 218.76,
                    "low": 213.75,
                    "close": 215.24,
                    "volume": 54385400,
                    "adjclose": 215.24
                },
                "1742477400": {
                    "date": "20-03-2025",
                    "date_utc": 1742477400,
                    "open": 213.99,
                    "high": 217.49,
                    "low": 212.22,
                    "close": 214.1,
                    "volume": 48862900,
                    "adjclose": 214.1
                },
                "1742563800": {
                    "date": "21-03-2025",
                    "date_utc": 1742563800,
                    "open": 211.56,
                    "high": 218.84,
                    "low": 211.28,
                    "close": 218.27,
                    "volume": 94127800,
                    "adjclose": 218.27
                },
                "1742823000": {
                    "date": "24-03-2025",
                    "date_utc": 1742823000,
                    "open": 221,
                    "high": 221.48,
                    "low": 218.58,
                    "close": 220.73,
                    "volume": 44299500,
                    "adjclose": 220.73
                },
                "1742909400": {
                    "date": "25-03-2025",
                    "date_utc": 1742909400,
                    "open": 220.77,
                    "high": 224.1,
                    "low": 220.08,
                    "close": 223.75,
                    "volume": 34493600,
                    "adjclose": 223.75
                },
                "1742995800": {
                    "date": "26-03-2025",
                    "date_utc": 1742995800,
                    "open": 223.51,
                    "high": 225.02,
                    "low": 220.47,
                    "close": 221.53,
                    "volume": 34466100,
                    "adjclose": 221.53
                },
                "1743082200": {
                    "date": "27-03-2025",
                    "date_utc": 1743082200,
                    "open": 221.39,
                    "high": 224.99,
                    "low": 220.56,
                    "close": 223.85,
                    "volume": 37094800,
                    "adjclose": 223.85
                },
                "1743168600": {
                    "date": "28-03-2025",
                    "date_utc": 1743168600,
                    "open": 221.67,
                    "high": 223.81,
                    "low": 217.68,
                    "close": 217.9,
                    "volume": 39818600,
                    "adjclose": 217.9
                },
                "1743427800": {
                    "date": "31-03-2025",
                    "date_utc": 1743427800,
                    "open": 217.01,
                    "high": 225.62,
                    "low": 216.23,
                    "close": 222.13,
                    "volume": 65299300,
                    "adjclose": 222.13
                },
                "1743514200": {
                    "date": "01-04-2025",
                    "date_utc": 1743514200,
                    "open": 219.81,
                    "high": 223.68,
                    "low": 218.9,
                    "close": 223.19,
                    "volume": 36412700,
                    "adjclose": 223.19
                },
                "1743600600": {
                    "date": "02-04-2025",
                    "date_utc": 1743600600,
                    "open": 221.32,
                    "high": 225.19,
                    "low": 221.02,
                    "close": 223.89,
                    "volume": 35905900,
                    "adjclose": 223.89
                },
                "1743687000": {
                    "date": "03-04-2025",
                    "date_utc": 1743687000,
                    "open": 205.54,
                    "high": 207.49,
                    "low": 201.25,
                    "close": 203.19,
                    "volume": 103419000,
                    "adjclose": 203.19
                },
                "1743773400": {
                    "date": "04-04-2025",
                    "date_utc": 1743773400,
                    "open": 193.89,
                    "high": 199.88,
                    "low": 187.34,
                    "close": 188.38,
                    "volume": 125910900,
                    "adjclose": 188.38
                },
                "1744032600": {
                    "date": "07-04-2025",
                    "date_utc": 1744032600,
                    "open": 177.2,
                    "high": 194.15,
                    "low": 174.62,
                    "close": 181.46,
                    "volume": 160466300,
                    "adjclose": 181.46
                },
                "1744119000": {
                    "date": "08-04-2025",
                    "date_utc": 1744119000,
                    "open": 186.7,
                    "high": 190.34,
                    "low": 169.21,
                    "close": 172.42,
                    "volume": 120363400,
                    "adjclose": 172.42
                },
                "1744208417": {
                    "date": "09-04-2025",
                    "date_utc": 1744208417,
                    "open": 172.18,
                    "high": 179.42,
                    "low": 171.89,
                    "close": 178.13,
                    "volume": 29833879,
                    "adjclose": 178.13
                }
            }
        }';

        return json_decode($json, true);
    }

    public function getPrices(Request $request): array
    {
        //$rawData = $this->getRawData($request->input('symbol'));
        $rawData = $this->getMock();

        return $this->stockArrayHelper->filterArrayByRange(
            $rawData['body'] ?? [],
            (string)$request->input('start_date'),
            (string)$request->input('end_date')
        );
    }
}
