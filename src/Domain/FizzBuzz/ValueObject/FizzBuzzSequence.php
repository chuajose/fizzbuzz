<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\ValueObject;

use App\Domain\FizzBuzz\Exception\FizzBuzzSequenceException;

class FizzBuzzSequence
{
    private int $begin;
    private int $last;

    /**
     * @throws FizzBuzzSequenceException
     */
    private function __construct(int $begin, int $end)
    {
        $this->begin = $begin;
        $this->last = $end;
        $this->validate();
    }

    /**
     * @throws FizzBuzzSequenceException
     */
    private function validate(): void
    {
        /*
         * Defino alguna reglas básicas para que se pueda considerar una secuencia válida de cara a que el servicio de FizzBuzz pueda calcular el FizzBuzz.
         */
        if ($this->begin < 0 || $this->last < 0) {
            throw new FizzBuzzSequenceException('Start and end must be greater than 0');
        }

        if ($this->begin > $this->last) {
            throw new FizzBuzzSequenceException('Start must be less than end');
        }
    }

    public function begin(): int
    {
        return $this->begin;
    }

    public function last(): int
    {
        return $this->last;
    }

    /**
     * @throws FizzBuzzSequenceException
     */
    public static function fromValues(int $begin, int $last): FizzBuzzSequence
    {
        return new self($begin, $last);
    }
}
