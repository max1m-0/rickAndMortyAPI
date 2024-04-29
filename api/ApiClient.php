<?php
namespace src\api;

class ApiClient
{
    protected $methods = [
        'getUniqueCharacter' => GetUniqueCharacter::class,
        'getLocation' => GetLocation::class,
    ];

    private $session;

    public function getSession()
    {
        return $this->session;
    }

    public function startSession()
    {
        $this->session = curl_init();
    }

    public function sendRequest($method, $url)
    {
        $this->setupProcess($method, $url, $this->getSession());
        return $this->processResult($method, $this->getSession());
    }

    public function closeSession()
    {
        curl_close($this->getSession());
    }

    protected function processResult($method, $session)
    {
        return (new $this->methods[$method]())->process($session);
    }

    protected function setupProcess($method, $url, $session)
    {
        return (new $this->methods[$method]())->setup($url, $session);
    }
}

