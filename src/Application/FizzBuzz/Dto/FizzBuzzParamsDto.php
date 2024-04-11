<?php

declare(strict_types=1);

namespace App\Application\FizzBuzz\Dto;

readonly class FizzBuzzParamsDto
{
    public function __construct(
        private int $begin,
        private int $last,
    ) {
    }

    public static function create(int $begin, int $last): self
    {
        return new self(
            $begin,
            $last
        );
    }

    /**
     * @param array<int> $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['begin'],
            $data['last']
        );
    }

    public function begin(): int
    {
        return $this->begin;
    }

    public function last(): int
    {
        return $this->last;
    }
}
