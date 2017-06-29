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
        $bottleNumber = BottleNumber::for($number);

        return
            ucfirst("{$bottleNumber} of beer on the wall, ").
            "{$bottleNumber} of beer.".PHP_EOL.
            "{$bottleNumber->action()}, ".
            "{$bottleNumber->successor()} of beer on the wall.";
    }
}
