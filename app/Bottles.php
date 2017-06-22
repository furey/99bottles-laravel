<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottles extends Model
{
    /**
     * @param int $number
     *
     * @return string
     * */
    public static function verse($number)
    {
        switch ($number):
            case 2:
                return
                    "2 bottles of beer on the wall, 2 bottles of beer.".PHP_EOL.
                    "Take one down and pass it around, 1 bottle of beer on the wall.";
            case 1:
                return 
                    "1 bottle of beer on the wall, 1 bottle of beer.".PHP_EOL.
                    "Take it down and pass it around, no more bottles of beer on the wall.";
            case 0:
                return
                    "No more bottles of beer on the wall, no more bottles of beer.".PHP_EOL.
                    "Go to the store and buy some more, 99 bottles of beer on the wall.";
            default:
                $next = $number - 1;
                return
                    "$number bottles of beer on the wall, $number bottles of beer.".PHP_EOL.
                    "Take one down and pass it around, $next bottles of beer on the wall.";
        endswitch;
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
     * @return string
     * */
    public function song()
    {
        return $this->verses(99, 0);
    }
}
