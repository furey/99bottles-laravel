<?php

namespace App;

class Bottles
{
    /**
     * @return string
     * */
    public function song()
    {
        return $this->verses(99, 0);
    }

    /**
     * @param int $finish
     * @param int $start
     *
     * @return string
     * */
    public function verses($finish, $start)
    {
        return collect(range($finish, $start))->map(function ($number) {
            return $this->verse($number);
        })->implode(PHP_EOL.PHP_EOL);
    }

    /**
     * @param int $number
     *
     * @return string
     * */
    public function verse($number)
    {
        return
            ucfirst($this->quantity($number))." {$this->container($number)} of beer on the wall, ".
            "{$this->quantity($number)} {$this->container($number)} of beer.".PHP_EOL.
            "{$this->action($number)}, ".
            "{$this->quantity($this->successor($number))} {$this->container($this->successor($number))} of beer on the wall.";
    }

    /**
     * @param int $number
     * 
     * @return string
     * */
    protected function quantity($number)
    {
        if ($number === 0) {
            return 'no more';
        } else {
            return (string) $number;
        }
    }

    /**
     * @param int $number
     * 
     * @return string
     * */
    protected function container($number)
    {
        if ($number === 1) {
            return 'bottle';
        } else {
            return 'bottles';
        }
    }

    /**
     * @param int $number
     * 
     * @return string
     * */
    protected function action($number)
    {
        if ($number === 0) {
            return 'Go to the store and buy some more';
        } else {
            return "Take {$this->pronoun($number)} down and pass it around";
        }
    }

    /**
     * @param int $number
     * 
     * @return string
     * */
    protected function pronoun($number)
    {
        if ($number === 1) {
            return 'it';
        } else {
            return 'one';
        }
    }

    /**
     * @param int $number
     * 
     * @return int
     * */
    protected function successor($number)
    {
        if ($number === 0) {
            return 99;
        } else {
            return $number - 1;
        }
    }
}
