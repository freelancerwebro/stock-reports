<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubmitFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_success_open_index_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Stock historical data');
        $response->assertSee('Submit');
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
           ]
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
            ]
        ]);
        $this->assertEquals(
            'The selected symbol is invalid.',
            $response->getData()->errors->symbol[0],
        );
    }
}
