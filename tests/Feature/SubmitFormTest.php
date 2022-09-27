<?php

namespace Tests\Feature;

use Tests\TestCase;

class SubmitFormTest extends TestCase
{

    public function test_fail_when_no_symbol_provided()
    {
        $this->post('/submit', ['symbol' => 'GOOGL', 'lives' => 9])
            ->assertStatus(302);
    }

}
