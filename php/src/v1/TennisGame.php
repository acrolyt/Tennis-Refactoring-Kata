<?php

namespace TennisGame\v1;

interface TennisGame
{
    public function wonPoint(string $playerName): void;

    public function getScore(): string;
}
