<?php

namespace TennisGame\v1;

class TennisGame1 implements TennisGame
{
    /**
     * @var array|Player[]
     */
    private array $players;

    private Player $player1;

    private Player $player2;

    private ScoreFormatter $scoreFormatter;

    public function __construct(Player $player1, Player $player2, ScoreFormatter $scoreFormatter)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->players = [
            1 => $player1,
            2 => $player2
        ];
        $this->scoreFormatter = $scoreFormatter;
    }

    public function wonPoint(int $playerId): void
    {
        $this->players[$playerId]->addPoint();
    }

    public function getScore(): string
    {
        $score = '';
        if ($this->isGameTied()) {
            return $this->scoreFormatter->getTiedGameTexts($this->player1->score());
        }

        if ($this->isInAdvantageMode()) {
            $minusResult = $this->player1->score() - $this->player2->score();

            return $this->scoreFormatter->getAdvantageGameTexts($minusResult);
        }

        for ($i = 1; $i < 3; $i++) {
            if ($i === 1) {
                $tempScore = $this->player1->score();
            } else {
                $score     .= '-';
                $tempScore = $this->player2->score();
            }
            switch ($tempScore) {
                case 0:
                    $score .= 'Love';
                    break;
                case 1:
                    $score .= 'Fifteen';
                    break;
                case 2:
                    $score .= 'Thirty';
                    break;
                case 3:
                    $score .= 'Forty';
                    break;
            }
        }

        return $score;
    }

    protected function isGameTied(): bool
    {
        return $this->player1->score() === $this->player2->score();
    }

    protected function isInAdvantageMode(): bool
    {
        return $this->player1->score() >= 4 || $this->player2->score() >= 4;
    }
}
