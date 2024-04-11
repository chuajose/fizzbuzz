<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Service\Rules;

interface Rule
{
    public function isValid(int $number): bool;

    public function value(): string;
}
