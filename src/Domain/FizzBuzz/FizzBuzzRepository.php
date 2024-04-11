<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz;

use App\Domain\FizzBuzz\Model\FizzBuzz;

interface FizzBuzzRepository
{
    public function create(FizzBuzz $fizzBuzz): void;
}
