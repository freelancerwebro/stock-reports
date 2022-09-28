<?php

declare(strict_types=1);

namespace Tests\Unit\Requests;

use App\Http\Requests\FormPostRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormPostRequestTest extends TestCase
{
    use FormTrait, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rules = (new FormPostRequest())->rules();
        $this->validator = $this->app['validator'];
    }

    public function test_valid_email()
    {
        $this->assertTrue($this->validateField('email', 'test@test.com'));
        $this->assertFalse($this->validateField('email', 'test'));
        $this->assertFalse($this->validateField('email', ''));
    }

    public function test_valid_symbol()
    {
        $this->refreshDatabase();
        $this->seed();

        $this->assertTrue($this->validateField('symbol', 'GOOGL'));
        $this->assertTrue($this->validateField('symbol', 'AMZN'));
        $this->assertFalse($this->validateField('symbol', 'asdasdasdasd'));
        $this->assertFalse($this->validateField('symbol', 'test'));
        $this->assertFalse($this->validateField('symbol', ''));
    }

    public function test_valid_start_date()
    {
        $this->assertTrue($this->validateField('start_date', '2022-01-01'));
        $this->assertFalse($this->validateField('start_date', 'test'));
        $this->assertFalse($this->validateField('start_date', ''));
    }

    public function test_valid_end_date()
    {
        $this->assertTrue($this->validateField('end_date', '2022-01-01'));
        $this->assertFalse($this->validateField('end_date', 'test'));
        $this->assertFalse($this->validateField('end_date', ''));
    }
}
