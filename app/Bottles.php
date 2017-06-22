<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottles extends Model
{
    /**
     * @return string
     * */
    public function song()
    {
        return $this->verses(99, 0);
    }

    /**
     * @param int $current
     * @param int $last
     *
     * @return string
     * */
    public function verses($current, $until)
    {
        $verses = $this->verse($current);

        while ($current > $until) {
            $current--;
            $verses .= PHP_EOL.PHP_EOL . $this->verse($current);
        }

        return $verses;
    }

    /**
     * @param int $number
     *
     * @return string
     * */
    public function verse($number)
    {
        switch ($number):
            case 0:
                $next = $number - 1;
                return
                    ucfirst($this->quantity($number))." {$this->container($number)} of beer on the wall, {$this->quantity($number)} bottles of beer.".PHP_EOL.
                    "{$this->action($number)}, 99 bottles of beer on the wall.";
            default:
                $next = $number - 1;
                return
                    ucfirst($this->quantity($number))." {$this->container($number)} of beer on the wall, {$this->quantity($number)} {$this->container($number)} of beer.".PHP_EOL.
                    "{$this->action($number)}, {$this->quantity($next)} {$this->container($next)} of beer on the wall.";
        endswitch;
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
}
