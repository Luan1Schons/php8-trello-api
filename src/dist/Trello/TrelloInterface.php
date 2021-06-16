<?php

namespace Src\Trello;

abstract class TrelloInterface
{
    protected $key;
    protected $token;
    protected $api_url;

    public function __construct() {
        $this->token = $_ENV['TRELLO_TOKEN'];
        $this->key = $_ENV['TRELLO_KEY'];
        $this->api_url = $_ENV['API_URL'];
    }

    public function getToken(){
        return $this->token;
    }

    public function getKey(){
        return $this->key;
    }
}