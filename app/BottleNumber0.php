<?php

namespace App;

class BottleNumber0 extends BottleNumber
{
    /**
     * @return string
     * */
    function quantity()
    {
        return 'no more';
    }

    /**
     * @return string
     * */
    function action()
    {
        return 'Go to the store and buy some more';
    }

    /**
     * @return BottleNumber
     * */
    function successor()
    {
        return BottleNumber::for(99);
    }
}
