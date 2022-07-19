<?php

declare(strict_types=1);

namespace TennisGame\v1;

class Player
{
    private string $name;
    private int $id;
    private int $score = 0;

    public function __construct(int $id, string $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function score(): int
    {
        return $this->score;
    }

    public function resetScore(): self
    {
        $this->score = 0;

        return $this;
    }

    public function addPoint(): self
    {
        $this->score++;

        return $this;
    }
}
