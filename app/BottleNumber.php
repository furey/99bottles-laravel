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
     * @return string
     * */
    function quantity()
    {
        if ($this->number === 0) {
            return 'no more';
        } else {
            return (string) $this->number;
        }
    }

    /**
     * @return string
     * */
    function container()
    {
        if ($this->number === 1) {
            return 'bottle';
        } else {
            return 'bottles';
        }
    }

    /**
     * @return string
     * */
    function action()
    {
        if ($this->number === 0) {
            return 'Go to the store and buy some more';
        } else {
            return "Take {$this->pronoun()} down and pass it around";
        }
    }

    /**
     * @return string
     * */
    function pronoun()
    {
        if ($this->number === 1) {
            return 'it';
        } else {
            return 'one';
        }
    }

    /**
     * @return int
     * */
    function successor()
    {
        if ($this->number === 0) {
            return 99;
        } else {
            return $this->number - 1;
        }
    }
}
