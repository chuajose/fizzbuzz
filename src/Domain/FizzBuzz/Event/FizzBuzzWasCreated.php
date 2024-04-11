<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Event;

use App\Domain\FizzBuzz\Model\FizzBuzz;
use App\Domain\Shared\Event\Event;

class FizzBuzzWasCreated implements Event
{
    private FizzBuzz $fizzBuzz;

    public function __construct(FizzBuzz $fizzBuzz)
    {
        $this->fizzBuzz = $fizzBuzz;
    }

    #[\Override]
    public function eventName(): string
    {
        return __CLASS__;
    }

    /**
     * @return array<string, string>
     */
    #[\Override]
    public function payload(): array
    {
        // return $this->fizzBuzz->jsonSerialize()
        return [
            'id' => $this->fizzBuzz->id()->toRfc4122(),
        ];
    }
}
