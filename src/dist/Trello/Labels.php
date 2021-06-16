<?php

namespace Src\Trello;

use GuzzleHttp\Client;

class Labels extends TrelloInterface{

    protected $boardId;
    protected $color;
    protected $name;

    public function create()
    {

        $colors = ['blue', 'green', 'orange', 'purple', 'red', 'yellow'];

        if (!in_array($this->getColor(), $colors)) {
            throw new \InvalidArgumentException(sprintf(
                'The "color" parameter must be one of "%s".',
                implode(", ", $colors)
            ));
        }

        $HttpClient = new Client();

        $params = [
            'form_params' => [
                'key'    => $this->getKey(),
                'token'  => $this->getToken(),
                'color' => $this->getColor(),
                'name' => $this->getName(),
                'boardId' => $this->getboardId(),
            ],
        ];

        $res = $HttpClient->request('POST', $this->api_url.'1/boards/'.$this->getboardId().'/labels', $params, ['http_errors' => false]);

        $content = $res->getBody()->getContents();
        $arr = json_decode($content, true);
        return $arr['id'];
    }

    public function setboardId($boardId){
        $this->boardId = $boardId;
    }

    public function getboardId(){
        return $this->boardId;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }

}