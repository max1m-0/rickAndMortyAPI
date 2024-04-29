<?php

namespace src;
require __DIR__ . '/vendor/autoload.php';

use src\utils\RandomUtil;
use src\utils\StaticVariablesUtil;
use src\objectInstances\Character;

$idStringList = explode(',', isset($_POST['idList']) ? $_POST['idList'] : []);
$numberOfCharactersToAdd = RandomUtil::getRandomNumber(StaticVariablesUtil::getMinNumberOfCharacters(),
    StaticVariablesUtil::getStartingNumberOfCharacters());
$apiClient = new api\ApiClient();
$apiClient->startSession();
if (count($idStringList) + $numberOfCharactersToAdd <= StaticVariablesUtil::getMaxNumberOfCharacters()) {
    Character::addCharacter($numberOfCharactersToAdd, $apiClient);
} else {
    echo "<pre><h1>   Exception!". "</h1></pre><pre>  max number of characters is " . StaticVariablesUtil::getMaxNumberOfCharacters() .
        " tried to add  " . $numberOfCharactersToAdd . " characters to " . count($idStringList) . " characters </pre>";
    $file = fopen('used_id_list.txt', 'w b');
    fclose($file);
    $apiClient->closeSession();
}
