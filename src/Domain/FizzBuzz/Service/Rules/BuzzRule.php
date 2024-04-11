<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service\Rules;

class BuzzRule implements Rule
{
    public function isValid(int $number): bool
    {
        return 0 === $number % 5;
    }

    public function value(): string
    {
        return 'Buzz';
    }
}
