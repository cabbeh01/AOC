<?php

namespace AdventOfCode2023\Day2;

class Game
{

    private array $sets;
    private int $id;

    function __construct($id,$sets) {
        $this->id = $id;
        $this->sets = $sets;
    }

    public static function create(string $row){

        $data = explode(": ", $row);
        $id = strtr($data[0], array("Game " => "")) ;
        $rawSets = explode(";",$data[1]);

        $sets = [];

        foreach ($rawSets as $set){

            preg_match("/(\d+)\s*red/", $set, $redMatch);
            preg_match("/(\d+)\s*green/", $set, $greenMatch);
            preg_match("/(\d+)\s*blue/", $set, $blueMatch);

            $red = 0;
            $green = 0;
            $blue = 0;
            if (!empty($redMatch)) {
                $red = (int)$redMatch[1];
            }

            if (!empty($greenMatch)) {
                $green = (int)$greenMatch[1];
            }

            if (!empty($blueMatch)) {
                $blue = (int)$blueMatch[1];
            }

            $sets[] = new Set($red,$green,$blue);
        }

        return new self($id,$sets);
    }

    function isGamePossible(): bool
    {
        foreach ($this->sets as $set){
            /** @var Set $set */
            if(!$set->isPossible()){
                return false;
            }
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getPowerofGame():int{
        $red = 0;
        $green = 0;
        $blue = 0;

        foreach ($this->sets as $set){
            /** @var Set $set */
            $red = max($red,$set->getRed());
            $green = max($green,$set->getGreen());
            $blue = max($blue,$set->getBlue());
        }

        return $red*$green*$blue;
    }
}
