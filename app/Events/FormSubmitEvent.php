<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Company;
use Illuminate\Http\Request;

class FormSubmitEvent
{
    public function __construct(
        private Request $request
    ) {
    }

    public function getSymbol(): string
    {
        return $this->request->input('symbol');
    }

    public function getCompanyName(): string
    {
        $company = Company::where('symbol', $this->getSymbol())->first();
        return $company->name;
    }

    public function getEmail(): string
    {
        return $this->request->input('email');
    }

    public function getStartDate(): string
    {
        return $this->request->input('start_date');
    }

    public function getEndDate(): string
    {
        return $this->request->input('end_date');
    }
}
