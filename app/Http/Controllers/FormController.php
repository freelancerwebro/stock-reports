<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\FormSubmitEvent;
use App\Http\Requests\FormPostRequest;
use App\Services\StockReportsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class FormController extends Controller
{
    public function __construct(
        private StockReportsService $stockReportsService
    ) {
    }

    public function index(): View
    {
        return view('form');
    }

    public function submit(FormPostRequest $request): RedirectResponse
    {
        try {
            $prices = $this->stockReportsService->getPrices(
                $request
            );

            if (!empty($prices)) {
                event(new FormSubmitEvent(
                    $request
                ));
            }

            return redirect('/')->with('status', 'OK')
                ->with('prices', $prices);
        } catch (\Throwable $exception) {
            Log::error($exception->getMessage());

            return redirect('/')->with('status', 'Internal server error!')
                ->with('prices', []);
        }
    }
}
