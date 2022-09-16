<?php

declare(strict_types=1);

return [
    'base_uri' => env('RAPID_API_BASE_URI', 'https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data'),
    'header_host' => env('RAPID_API_HEADER_HOST', 'yh-finance.p.rapidapi.com'),
    'header_key' => env('RAPID_API_HEADER_KEY'),
];
