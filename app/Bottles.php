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
        $next = $number - 1;

        if ($next > 1) {
            return
                "$number bottles of beer on the wall, $number bottles of beer.".PHP_EOL.
                "Take one down and pass it around, {$next} bottles of beer on the wall.";
        }

        if ($next === 1) {
            return
                "2 bottles of beer on the wall, 2 bottles of beer.".PHP_EOL.
                "Take one down and pass it around, 1 bottle of beer on the wall.";
        }

        if ($next === 0) {
            return
                "1 bottle of beer on the wall, 1 bottle of beer.".PHP_EOL.
                "Take it down and pass it around, no more bottles of beer on the wall.";
        }

        return
            "No more bottles of beer on the wall, no more bottles of beer.".PHP_EOL.
            "Go to the store and buy some more, 99 bottles of beer on the wall.";
    }

    /**
     * @param int $current
     * @param int $last
     *
     * @return string
     * */
    public static function verses($current, $until)
    {
        $verses = static::verse($current);

        while ($current > $until) {
            $current--;
            $verses .= PHP_EOL.PHP_EOL.static::verse($current);
        }

        return $verses;
    }

    /**
     * @return string
     * */
    public static function song()
    {
        return static::verses(99, 0);
    }
}
