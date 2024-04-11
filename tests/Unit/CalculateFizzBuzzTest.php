<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Application\FizzBuzz\Dto\FizzBuzzParamsDto;
use App\Domain\FizzBuzz\Service\CalculateFizzBuzz;
use App\Domain\FizzBuzz\ValueObject\FizzBuzzSequence;
use PHPUnit\Framework\TestCase;

class CalculateFizzBuzzTest extends TestCase
{
    public function testGenerateFizzBuzzBetween30And67(): void
    {
        $params = FizzBuzzParamsDto::create(30, 67);

        $generateFizzBuzzSequence = new CalculateFizzBuzz(FizzBuzzSequence::fromValues($params->begin(), $params->last()));
        $resultGenerated = $generateFizzBuzzSequence->execute();
        $result = $resultGenerated->result();
        $expectedArray = [
            'FizzBuzz',
            '31',
            '32',
            'Fizz',
            '34',
            'Buzz',
            'Fizz',
            '37',
            '38',
            'Fizz',
            'Buzz',
            '41',
            'Fizz',
            '43',
            '44',
            'FizzBuzz',
            '46',
            '47',
            'Fizz',
            '49',
            'Buzz',
            'Fizz',
            '52',
            '53',
            'Fizz',
            'Buzz',
            '56',
            'Fizz',
            '58',
            '59',
            'FizzBuzz',
            '61',
            '62',
            'Fizz',
            '64',
            'Buzz',
            'Fizz',
            '67',
        ];
        $this->assertSame($expectedArray, $result);
        $this->assertCount($params->last() - $params->begin() + 1, $result);
        $this->assertTrue(true);
    }

    public function testGenerateFizzBuzzRandom(): void
    {
        $params = FizzBuzzParamsDto::create(1, 100);

        $generateFizzBuzzSequence = new CalculateFizzBuzz(FizzBuzzSequence::fromValues($params->begin(), $params->last()));
        $resultGenerated = $generateFizzBuzzSequence->execute();
        $result = $resultGenerated->result();
        $this->assertSame('FizzBuzz', $result[14]);
        $this->assertSame('Fizz', $result[2]);
        $this->assertSame('Buzz', $result[4]);
        $this->assertCount($params->last() - $params->begin() + 1, $result);
        $this->assertTrue(true);
    }
}
