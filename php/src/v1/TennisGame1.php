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
            2 => $player2,
        ];
        $this->scoreFormatter = $scoreFormatter;
    }

    public function wonPoint(int $playerId): void
    {
        $this->players[$playerId]->addPoint();
    }

    public function getScore(): string
    {
        if ($this->isTied()) {
            return $this->scoreFormatter->getTiedGameTexts($this->player1->score());
        }

        if ($this->isInAdvantageMode()) {
            $pointDifference = $this->player1->score() - $this->player2->score();

            return $this->scoreFormatter->getAdvantageGameTexts($pointDifference);
        }

        return sprintf(
                '%s-%s',
                $this->scoreFormatter->format(
                    $this->player1->score()
                ),
                $this->scoreFormatter->format(
                    $this->player2->score()
                )
            );
    }

    protected function isTied(): bool
    {
        return $this->player1->score() === $this->player2->score();
    }

    protected function isInAdvantageMode(): bool
    {
        return $this->player1->score() >= 4 || $this->player2->score() >= 4;
    }
}
