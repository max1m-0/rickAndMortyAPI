<?php

namespace src\api;

interface Method
{
    public function setup($url, $session);

    public function process($session);
}