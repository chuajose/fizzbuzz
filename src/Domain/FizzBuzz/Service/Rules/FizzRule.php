<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service\Rules;

class FizzRule implements Rule
{
    public function isValid(int $number): bool
    {
        return 0 === $number % 3;
    }

    public function value(): string
    {
        return 'Fizz';
    }
}
