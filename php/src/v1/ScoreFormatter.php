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

    public function getAdvantageGameTexts(int $difference): string
    {
        if ($difference === 1) {
            $score = 'Advantage player1';
        } elseif ($difference === -1) {
            $score = 'Advantage player2';
        } elseif ($difference >= 2) {
            $score = 'Win for player1';
        } else {
            $score = 'Win for player2';
        }

        return $score;
    }

}
