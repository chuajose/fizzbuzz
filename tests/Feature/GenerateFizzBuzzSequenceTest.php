<?php

declare(strict_types=1);

namespace App\Tests\Feature;

use App\Application\FizzBuzz\Dto\FizzBuzzParamsDto;
use App\Application\FizzBuzz\GenerateFizzBuzzSequence;
use App\Domain\FizzBuzz\FizzBuzzRepository;
use App\Domain\FizzBuzz\Model\FizzBuzz;
use App\Domain\Shared\Messenger\MessengerBusInterface;

class GenerateFizzBuzzSequenceTest extends \PHPUnit\Framework\TestCase
{
    private FizzBuzzRepository $fizzBuzzRepository;
    private MessengerBusInterface $messengerBus;

    protected function setUp(): void
    {
        $this->fizzBuzzRepository = $this->createMock(FizzBuzzRepository::class);
        $this->messengerBus = $this->createMock(MessengerBusInterface::class);
    }

    public function testSaveOnRepositoryFizzBuzz(): void
    {
        $this->fizzBuzzRepository->expects($this->once())
            ->method('create');

        $generate = new GenerateFizzBuzzSequence($this->messengerBus, $this->fizzBuzzRepository);
        $generate->execute(FizzBuzzParamsDto::fromArray(['begin' => 1, 'last' => 100]));
    }

    public function testLaunchEventWhenGenerateFizzBuzz(): void
    {
        $this->messengerBus->expects($this->once())
            ->method('dispatch');
        $generate = new GenerateFizzBuzzSequence($this->messengerBus, $this->fizzBuzzRepository);
        $generate->execute(FizzBuzzParamsDto::fromArray(['begin' => 1, 'last' => 100]));
    }

    public function testReturnFizzBuzzEntityWhenGenerateFizzBuzz(): void
    {
        $generate = new GenerateFizzBuzzSequence($this->messengerBus, $this->fizzBuzzRepository);
        $fizzBuzz = $generate->execute(FizzBuzzParamsDto::fromArray(['begin' => 1, 'last' => 100]));
        $this->assertInstanceOf(FizzBuzz::class, $fizzBuzz);
    }
}
