<?php

declare(strict_types=1);

return [
    'base_uri' => env('RAPID_API_BASE_URI', 'https://yahoo-finance15.p.rapidapi.com/api/v1/markets/stock/history'),
    'header_host' => env('RAPID_API_HEADER_HOST', 'yahoo-finance15.p.rapidapi.com'),
    'header_key' => env('RAPID_API_HEADER_KEY'),
];
