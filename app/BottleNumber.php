<?php

namespace App;

class BottleNumber
{
    /**
     * @param int $number
     * */
    function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * Factory.
     * 
     * @param int $number
     * 
     * @return mixed
     * */
    public static function for($number)
    {
        switch ($number) {
            case 0:
                $type = BottleNumber0::class;
                break;
            case 1:
                $type = BottleNumber1::class;
                break;
            default:
                $type = BottleNumber::class;
                break;
        }

        return new $type($number);
    }

    /**
     * @return string
     * */
    function __toString()
    {
        return "{$this->quantity()} {$this->container()}";
    }

    /**
     * @return string
     * */
    function quantity()
    {
        return (string) $this->number;
    }

    /**
     * @return string
     * */
    function container()
    {
        return 'bottles';
    }

    /**
     * @return string
     * */
    function action()
    {
        return "Take {$this->pronoun()} down and pass it around";
    }

    /**
     * @return string
     * */
    function pronoun()
    {
        return 'one';
    }

    /**
     * @return int
     * */
    function successor()
    {
        return $this->number - 1;
    }
}
