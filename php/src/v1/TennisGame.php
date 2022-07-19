<?php

namespace TennisGame\v1;

interface TennisGame
{
    public function wonPoint(int $playerId): void;

    public function getScore(): string;
}
