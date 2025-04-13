<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controller;

use App\Jobs\FetchStockDataJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Str;
use Tests\TestCase;

class FormControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_form_view()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('form');
        $response->assertSee('Stock historical data');
        $response->assertSee('Submit');
    }

    public function test_submit_dispatches_job_and_redirects()
    {
        Queue::fake();

        $data = [
            'symbol' => 'AAPL',
            'start_date' => '2025-04-01',
            'end_date' => '2025-04-05',
            'email' => 'test@example.com',
        ];

        $response = $this->post('/submit', $data);

        $response->assertRedirect();
        $redirectUrl = $response->headers->get('Location');
        $this->assertStringContainsString('/listen/', $redirectUrl);
        $jobId = Str::afterLast($redirectUrl, '/');

        Queue::assertPushed(FetchStockDataJob::class, function ($job) use ($data, $jobId) {
            return $job->symbol === $data['symbol']
                && $job->startDate === $data['start_date']
                && $job->endDate === $data['end_date']
                && $job->email === $data['email']
                && $job->jobId === $jobId;
        });
    }

    public function test_listen_displays_job_id()
    {
        $jobId = (string) Str::uuid();

        $response = $this->get("/listen/{$jobId}");

        $response->assertStatus(200);
        $response->assertViewIs('form');
        $response->assertViewHas('jobId', $jobId);
    }

    public function test_fail_with_empty_params()
    {
        $response = $this->json('POST', '/submit', []);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'email',
                'end_date',
                'start_date',
                'symbol',
            ],
        ]);
    }

    public function test_fail_with_invalid_symbol()
    {
        $response = $this->json('POST', '/submit', [
            'symbol' => 'AAAA',
            'start_date' => '2022-09-01',
            'end_date' => '2022-09-25',
            'email' => 'test@test.com',
        ]);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'symbol',
            ],
        ]);
        $this->assertEquals(
            'The selected symbol is invalid.',
            $response->getData()->errors->symbol[0],
        );
    }
}
