<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Listener;

use App\Domain\FizzBuzz\Event\FizzBuzzWasCreated;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class GenerateLogWhenFizzBuzzWasCreated
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(FizzBuzzWasCreated $event): void
    {
        $this->logger->info('FizzBuzz was created', ['id' => $event->payload(), 'event' => $event->eventName()]);
    }
}
