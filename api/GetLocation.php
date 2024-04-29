<?php

namespace src\api;

class GetLocation implements Method
{
    public function setup($url, $session)
    {
        curl_setopt_array($session, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
        ));
    }

    public function process($session)
    {
        return curl_exec($session);
    }
}