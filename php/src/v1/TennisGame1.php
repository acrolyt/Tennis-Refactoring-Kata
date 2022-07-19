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



    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1 = new Player(1, $player1Name);
        $this->player2 = new Player(2, $player2Name);
        $this->players = [$this->player1, $this->player2];
    }

    public function wonPoint(string $playerName): void
    {
        // the test should work the same
        foreach ($this->players as $player) {
            if ($player->name() === $playerName) {
                $player->addPoint();
            }
        }
    }

    public function getScore(): string
    {
        $score = "";
        if ($this->player1->score() === $this->player2->score()) {
            switch ($this->player1->score()) {
                case 0:
                    $score = "Love-All";
                    break;
                case 1:
                    $score = "Fifteen-All";
                    break;
                case 2:
                    $score = "Thirty-All";
                    break;
                default:
                    $score = "Deuce";
                    break;
            }
        } elseif ($this->player1->score() >= 4 || $this->player2->score() >= 4) {
            $minusResult = $this->player1->score() - $this->player2->score();
            if ($minusResult == 1) {
                $score = "Advantage player1";
            } elseif ($minusResult == -1) {
                $score = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $score = "Win for player1";
            } else {
                $score = "Win for player2";
            }
        } else {
            for ($i = 1; $i < 3; $i++) {
                if ($i == 1) {
                    $tempScore = $this->player1->score();
                } else {
                    $score .= "-";
                    $tempScore = $this->player2->score();
                }
                switch ($tempScore) {
                    case 0:
                        $score .= "Love";
                        break;
                    case 1:
                        $score .= "Fifteen";
                        break;
                    case 2:
                        $score .= "Thirty";
                        break;
                    case 3:
                        $score .= "Forty";
                        break;
                }
            }
        }
        return $score;
    }
}
