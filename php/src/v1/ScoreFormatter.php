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

        switch ($difference) {
            case 1:
                return 'Advantage player1';
            case -1:
                return 'Advantage player2';
            default:
                if ($difference >= 2) {
                    return 'Win for player1';
                } else {
                    return 'Win for player2';
                }
        }
    }
}
