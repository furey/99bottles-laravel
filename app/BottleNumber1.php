<?php

namespace App;

class BottleNumber1 extends BottleNumber
{
    /**
     * @return string
     * */
    function container()
    {
        return 'bottle';
    }

    /**
     * @return string
     * */
    function pronoun()
    {
        return 'it';
    }
}
