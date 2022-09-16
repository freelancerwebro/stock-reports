<?php

declare(strict_types=1);

namespace App\Helpers;

class StockArrayHelper
{
    public function filterArrayByRange(
        array $priceArray,
        string $startDate,
        string $endDate
    ): array {
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);
        return array_filter($priceArray, function($row) use ($startDate, $endDate) {
            $priceDate = (string)($row['date']);
            return $priceDate <= $endDate && $priceDate >= $startDate;
        });
    }
}
