<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service\Rules;

class FizzBuzzRule implements Rule
{
    public function isValid(int $number): bool
    {
        return 0 === $number % 15;
    }

    public function value(): string
    {
        return 'FizzBuzz';
    }
}
