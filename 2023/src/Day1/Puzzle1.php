<?php

namespace AdventOfCode2023\Day1;

use Exception;
use Illuminate\Support\Collection;

use function PHPSTORM_META\map;

class Puzzle1
{
    public function __invoke(string $fileName): string
    {
        $input = file_get_contents(__DIR__.'/'.$fileName) ?: throw new Exception('Failed to read input file.');
        
        return (new Collection(explode("\n", $input)))
            ->map(fn (string $row) => new Collection(filter_var($row,FILTER_SANITIZE_NUMBER_INT)))
            ->map(function ($row) {
                $firstNumber = $row[0];
                
                if (strlen($firstNumber) == 1) {
                    return $firstNumber . $firstNumber;
                } else {
                    return $row[0][0] . $row[0][strlen($row[0]) - 1];
                }
            })->map(fn ($value) => intval($value))->sum();
    }
}