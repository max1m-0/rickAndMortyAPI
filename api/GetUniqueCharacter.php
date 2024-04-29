<?php

namespace src\api;

use src\utils\ArrayUtil;
use src\utils\RandomUtil;
use src\utils\StaticVariablesUtil;

class GetUniqueCharacter implements Method
{
    public function setup($url, $session)
    {
        $idList = ArrayUtil::getAndSetIdList(null);
        $usedIdList = [];
        if (file_exists('src\resources\used_id_list.txt')) {
            $usedIdList = file('src\resources\used_id_list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        }
        $filteredIdList = array_diff($idList, $usedIdList);
            file_put_contents('src\resources\used_id_list.txt', implode(PHP_EOL, $filteredIdList) . PHP_EOL, FILE_APPEND);
            $id = ArrayUtil::getUniqueValueForArray(RandomUtil::getRandomId(StaticVariablesUtil::getMaxId()),
                ArrayUtil::getAndSetIdList(null), StaticVariablesUtil::getMaxId());
            ArrayUtil::getAndSetIdList($id);
            $characterUrlById = $url . $id;
            curl_setopt_array($session, array(
                CURLOPT_URL => $characterUrlById,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
            ));
    }

    public function process($session)
    {
        return curl_exec($session);
    }
}