<?php

namespace App;

class Game
{
    private $frames;

    public function __construct(array $frames)
    {
        $this->frames = $frames;
    }

    public function score() {
        $score = 0;
        for ($i=0; $i<=9; $i++) {
            if ($this->frames[$i] === '--'){
                $score += 0;
            } else if ($this->frames[$i] === 'x'){
                $score += 10 + $this->frameToScore($i+1) + $this->frameToScore($i+2);
            } else if (str_contains($this->frames[$i], '/')) {
                $score += 10 + $this->firstShootScore($i+1);
            } else {
                $score += $this->frameToScore($i);
            }
        }
        return $score;
    }

    public function frameToScore($i){
        if ($this->frames[$i] === 'x'){
            return 10;
        }
        if ($this->frames[$i] === '--') {
            return 0;
        }
        $results = str_split($this->frames[$i]);
        if ($results[1] === '/'){
            return 10;
        }
        if ($results[1]=== '-'){
            return $results[0];
        }
        return array_sum($results);
    }

    public function firstShootScore($i)
    {
        $results = str_split($this->frames[$i]);
        if ($results[0] === 'x') {
            return 10;
        }
        if ($results[0] === '-') {
            return 0;
        }
        return $results[0];
    }
}
