<?php

namespace AdventOfCode2023\Day2;

use Exception;
use Illuminate\Support\Collection;

class Puzzle2
{
    public function __invoke(string $fileName)
    {
        $input = file_get_contents(__DIR__.'/'.$fileName)
            ?: throw new Exception('Failed to read input file.');
        return (new Collection(explode("\n", $input)))
            ->map(function ($row) {
                return Game::create($row);
            })
            ->map(function ($game) {
                /** @var Game $game*/
                return $game->getPowerofGame();
            })->map(fn ($value) => intval($value))->sum();
    }
}
