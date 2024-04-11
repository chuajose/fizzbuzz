<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Domain\FizzBuzz\Service\FizzBuzzItem;
use App\Domain\FizzBuzz\Service\Rules\BuzzRule;
use App\Domain\FizzBuzz\Service\Rules\FizzBuzzRule;
use App\Domain\FizzBuzz\Service\Rules\FizzRule;
use PHPUnit\Framework\TestCase;

class FizzBuzzServiceTest extends TestCase
{
    public function testGenerateFizzBuzzByNumber(): void
    {
        $this->assertTrue((new FizzBuzzRule())->isValid(15));
        $this->assertTrue((new BuzzRule())->isValid(5));
        $this->assertTrue((new FizzRule())->isValid(3));
    }

    public function testServiceFizzBuzz(): void
    {
        $service = new FizzBuzzItem();
        $this->assertSame($service->value(15), 'FizzBuzz');
        $this->assertSame($service->value(5), 'Buzz');
        $this->assertSame($service->value(3), 'Fizz');
        $this->assertSame($service->value(1), '1');
    }
}
