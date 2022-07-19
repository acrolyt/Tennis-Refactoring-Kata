<?php

declare(strict_types=1);

namespace Tests;

use TennisGame\v1\Player;
use TennisGame\v1\ScoreFormatter;
use TennisGame\v1\TennisGame1;

/**
 * TennisGame1 test case.
 */
class TennisGame1Test extends TestMaster
{
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $scoreFormatter =  new ScoreFormatter();
        $player1 = new Player(1, 'player1');
        $player2 = new Player(2, 'player2');
        $this->game = new TennisGame1($player1, $player2, $scoreFormatter);
    }

    /**
     * @dataProvider data
     */
    public function testScores(int $score1, int $score2, string $expectedResult): void
    {
        $this->seedScores($score1, $score2);
        $this->assertSame($expectedResult, $this->game->getScore());
    }
}
