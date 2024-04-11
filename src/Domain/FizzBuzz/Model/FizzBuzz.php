<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz\Model;

use App\Domain\FizzBuzz\Event\FizzBuzzWasCreated;
use App\Domain\Shared\Aggregate\AggregateRoot;
use Symfony\Component\Uid\Uuid;

class FizzBuzz extends AggregateRoot implements \JsonSerializable
{
    private Uuid $id;
    private int $begin;
    private int $last;
    private \DateTimeImmutable $createdAt;
    /**
     * @var string[]
     */
    private array $result;

    /**
     * @param array<string> $result
     */
    private function __construct(Uuid $id, int $begin, int $last, \DateTimeImmutable $createdAt, array $result)
    {
        $this->id = $id;
        $this->begin = $begin;
        $this->last = $last;
        $this->createdAt = $createdAt;
        $this->result = $result;
    }

    /**
     * @param array<string> $result
     */
    public static function create(int $start, int $last, array $result): self
    {
        $fizzBuzz = new self(Uuid::v6(), $start, $last, new \DateTimeImmutable('now'), $result);
        $fizzBuzz->record(new FizzBuzzWasCreated($fizzBuzz));

        return $fizzBuzz;
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function begin(): int
    {
        return $this->begin;
    }

    public function last(): int
    {
        return $this->last;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return array<string>
     */
    public function result(): array
    {
        return $this->result;
    }

    /**
     * @return array<string, array<string>|\DateTimeImmutable|int|string>
     */
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id()->toRfc4122(),
            'begin' => $this->begin(),
            'last' => $this->last(),
            'createdAt' => $this->createdAt(),
            'result' => $this->result,
        ];
    }
}
