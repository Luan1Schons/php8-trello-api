<?php

require "../vendor/autoload.php";

use Src\Trello\Card;
use Src\Trello\Labels;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

$labels = new Labels();
// Criar Label 1
$labels->setboardId('60abc7a304d54f46d3b9de1a');
$labels->setName('[PEDIDO NOVO]');
$labels->setColor('blue');
$labelsIdOne = $labels->create();

// Criar Label 2
$labels->setName('[PEDIDO NOVO]');
$labels->setColor('green');
$labelsIdTwo = $labels->create();

// Criar Card
$card = new Card();
$card->setListId('60abc7a304d54f46d3b9de1b');
$card->setDue(date('Y-m-d H:i:s'));
$card->setName('Testando API Trello 1.0');
$card->setDesc('Tarefa a ser programada...');
$card->setIdLabels($labelsIdOne.','.$labelsIdTwo);

print_r($card->create());

