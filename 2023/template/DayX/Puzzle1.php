<?php

namespace AdventOfCode2023\Day1;

use Exception;

class Puzzle1
{
    public function __invoke(string $fileName)
    {
        $input = file_get_contents(__DIR__.'/'.$fileName)
            ?: throw new Exception('Failed to read input file.');
        // TODO: Solve puzzle 1.
    }
}