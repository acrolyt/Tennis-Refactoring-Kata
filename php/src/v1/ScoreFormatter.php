<?php

declare(strict_types=1);

namespace TennisGame\v1;

class ScoreFormatter
{
    public function getTiedGameTexts(int $score): string
    {
        switch ($score) {
            case 0:
                return 'Love-All';
            case 1:
                return 'Fifteen-All';
            case 2:
                return 'Thirty-All';
            default:
                return 'Deuce';
        }
    }


}
