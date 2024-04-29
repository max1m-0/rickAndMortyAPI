<?php

namespace src\objectInstances;

use src\utils\StaticVariablesUtil;

class Character
{
    private $name;
    private $status;
    private $species;
    private $id;
    private $image;

    public function getName()
    {
        return $this->name;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function __construct($name, $status, $species,$id,$image)
    {
        $this->name = $name;
        $this->status = $status;
        $this->species = $species;
        $this->id = $id;
        $this->image = $image;
    }

    public static function addCharacter($numberOfCharactersToAdd, \src\api\ApiClient $apiClient)
    {
        for ($i = 0; $i < $numberOfCharactersToAdd; $i++) {
            $character = json_decode($apiClient->sendRequest('getUniqueCharacter', StaticVariablesUtil::getCharactersUrl()),
                true);
            $locationUrl = $character['location']['url'];
            $location = json_decode($apiClient->sendRequest('getLocation', $locationUrl), true);
            $character = new Character($character['name'],$character['status'],$character['species'],$character['id'],$character['image']);
            $location = new Location($location['name'],$location['dimension'],$location['type']);
            echo "<pre class = 'character'  id = " . $character->getId() . "> <img src = '" . $character->getImage() . "'/>" . "<ul><li>";
            echo $character->getName() . "</li><li>" . $character->getStatus() . "</li><li>" . $character->getSpecies()
                . "</li>Last known location:<li>Name - " . $location->getName(). "</li><li>Dimension - " . $location->getDimension() . "</li><li>Type - " .
               $location->getType()  . "</li>", PHP_EOL . "</ul> </pre>";
        }
    }
}