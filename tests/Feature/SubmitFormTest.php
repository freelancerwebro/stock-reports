<?php

namespace Tests\Feature;

use Tests\TestCase;

class SubmitFormTest extends TestCase
{
    public function test_success_open_index_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Stock historical data');
        $response->assertSee('Submit');
    }
}
