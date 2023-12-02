<?php

namespace AdventOfCode2023\Day2;

class Set
{
    private int $red;
    private int $green;
    private int $blue;

    function __construct($red,$green,$blue) {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    function isPossible(): bool
    {
        return $this->red <= 12 && $this->green <= 13 && $this->blue <= 14;
    }

    /**
     * @return int
     */
    public function getBlue(): int
    {
        return $this->blue;
    }

    /**
     * @return int
     */
    public function getGreen(): int
    {
        return $this->green;
    }

    /**
     * @return int
     */
    public function getRed(): int
    {
        return $this->red;
    }
}
