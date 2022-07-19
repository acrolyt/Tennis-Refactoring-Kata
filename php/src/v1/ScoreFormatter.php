<?php

declare(strict_types=1);

namespace TennisGame\v1;

class ScoreFormatter
{
    public function getTiedGameTexts(int $score): string
    {
        return match ($score) {
            0 => 'Love-All',
            1 => 'Fifteen-All',
            2 => 'Thirty-All',
            default => 'Deuce',
        };
    }


}
