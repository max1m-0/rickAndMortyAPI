<?php

namespace src\objectInstances;

class Location
{
    private $name;
    private $dimension;
    private $type;

    public function getName()
    {
        return $this->name;
    }

    public function getDimension()
    {
        return $this->dimension;
    }

    public function getType()
    {
        return $this->type;
    }

    public function __construct($name, $dimension, $type)
    {
        $this->name = $name;
        $this->dimension = $dimension;
        $this->type = $type;
    }
}