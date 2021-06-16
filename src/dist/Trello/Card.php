<?php

namespace Src\Trello;

use GuzzleHttp\Client;
class Card extends TrelloInterface{

    protected $boardId;
    protected $listId;
    protected $color;
    protected $date;
    protected $desc;
    protected $idLabels;


    public function create()
    {
        $params = [ 
            'form_params' => [
                'key'    => $this->getKey(),
                'token'  => $this->getToken(),
                'idList' => $this->getListId(),
                'idLabels' => $this->getIdLabels(),
                'due'    => $this->getDue(),
                'name'   => $this->getName(),
                'desc'   => $this->getDesc(),
            ]
        ];

        $HttpClient = new Client();

        $res = $HttpClient->request('POST', $this->api_url.'1/cards', $params, ['http_errors' => false]);

        return $res->getbody()->getContents();
    }

    public function setboardId($boardId){
        $this->boardId = $boardId;
    }

    public function getboardId($boardId){
        $this->boardId = $boardId;
    }

    public function setListId($listId){
        $this->listId = $listId;
    }

    public function getListId(){
        return $this->listId;
    }

    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this->color;
    }

    public function setDue($date)
    {
        $date = date("Y-m-d\TH:i:s.000\Z", strtotime($date));
        $this->date = $date ;
    }

    public function getDue()
    {
        return $this->date;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    public function getDesc(){
        return $this->desc;
    }

    public function getIdLabels()
    {
        return $this->idLabels;
    }

    public function setIdLabels($idLabels)
    {
        $this->idLabels = $idLabels;

        return $this;
    }
}