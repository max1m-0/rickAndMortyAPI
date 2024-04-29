<?php
namespace src\utils;

class ArrayUtil
{
    public static function getUniqueValueForArray($needle, $haystack, $numberOfId)
    {
        if (in_array($needle, $haystack, true)) {
            return self::getUniqueValueForArray(RandomUtil::getRandomId($numberOfId), $haystack, $numberOfId);
        }
        return $needle;
    }

    public static function getAndSetIdList($id)
    {
        static $usedIdList = [];
        if ($id !== null) {
            $usedIdList [] = $id;
        }
        return $usedIdList;
    }
}