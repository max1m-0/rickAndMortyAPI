<?php
namespace src\utils;

class RandomUtil
{
    public static function getRandomNumber($min, $max)
    {
        return mt_rand($min, $max);
    }

    public static function getRandomId($maxId)
    {
        return self::getRandomNumber(1, $maxId);
    }
}