<?php

declare(strict_types=1);

namespace Tests\Unit\Requests;

trait FormTrait
{
    protected function validateField(string $field, $value): bool
    {
        return $this->validator->make(
            [$field => $value],
            [$field => $this->rules[$field]]
        )->passes();
    }
}
