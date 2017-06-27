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
        $bottleNumber = new BottleNumber($number);
        $bottleNumberSuccessor = new BottleNumber($bottleNumber->successor());

        return
            ucfirst($bottleNumber->quantity())." {$bottleNumber->container()} of beer on the wall, ".
            "{$bottleNumber->quantity()} {$bottleNumber->container()} of beer.".PHP_EOL.
            "{$bottleNumber->action()}, ".
            "{$bottleNumberSuccessor->quantity()} {$bottleNumberSuccessor->container()} of beer on the wall.";
    }
}
