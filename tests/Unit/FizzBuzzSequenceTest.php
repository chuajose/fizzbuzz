<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Domain\FizzBuzz\Exception\FizzBuzzSequenceException;
use App\Domain\FizzBuzz\ValueObject\FizzBuzzSequence;
use PHPUnit\Framework\TestCase;

class FizzBuzzSequenceTest extends TestCase
{
    public function testFizzBuzzSequenceWithInvalidData(): void
    {
        $this->expectException(FizzBuzzSequenceException::class);
        $this->expectExceptionMessage('Start and end must be greater than 0');
        FizzBuzzSequence::fromValues(-1, 0);
    }

    /**
     * @throws FizzBuzzSequenceException
     */
    public function testFizzBuzzSequenceWithStarGreaterThanEnd(): void
    {
        $this->expectException(FizzBuzzSequenceException::class);
        $this->expectExceptionMessage('Start must be less than end');
        FizzBuzzSequence::fromValues(50, 0);
    }

    /**
     * @throws FizzBuzzSequenceException
     */
    public function testFizzBuzzSequenceWithValidData(): void
    {
        $fizzBuzzSequence = FizzBuzzSequence::fromValues(50, 80);

        $this->assertInstanceOf(FizzBuzzSequence::class, $fizzBuzzSequence);
    }
}
