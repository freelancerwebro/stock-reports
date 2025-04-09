<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Jobs\FetchStockDataJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FormController extends Controller
{
    public function index(): View
    {
        return view('form');
    }

    public function submit(FormPostRequest $request): RedirectResponse
    {
        $jobId = (string) Str::uuid();

        FetchStockDataJob::dispatch(
            $request->input('symbol'),
            $request->input('start_date'),
            $request->input('end_date'),
            $request->input('email'),
            $jobId,
        );

        return redirect()->to("/listen/{$jobId}");
    }

    public function listen(string $jobId): View
    {
        return view('form', ['jobId' => $jobId]);
    }
}
