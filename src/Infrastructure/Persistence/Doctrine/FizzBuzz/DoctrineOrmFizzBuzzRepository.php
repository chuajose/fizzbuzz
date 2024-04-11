<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\FizzBuzz;

use App\Domain\FizzBuzz\FizzBuzzRepository;
use App\Domain\FizzBuzz\Model\FizzBuzz;
use Doctrine\ORM\EntityManagerInterface;

readonly class DoctrineOrmFizzBuzzRepository implements FizzBuzzRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function create(FizzBuzz $fizzBuzz): void
    {
        $this->entityManager->persist($fizzBuzz);
        $this->entityManager->flush();
    }
}
