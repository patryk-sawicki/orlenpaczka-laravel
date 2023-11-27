<?php

namespace PatrykSawicki\OrlenPaczkaApi\app\Classes;

class OrlenPaczka
{
    public static function giveMeAllRUCHWithFilled(): GiveMeAllRUCHWithFilled
    {
        return new GiveMeAllRUCHWithFilled();
    }
}