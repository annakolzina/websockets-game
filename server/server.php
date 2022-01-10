<?php
use Workerman\Worker;

require_once __DIR__ . '/../vendor/autoload.php';
$wsWorker = new Worker('websocket://www.dnd:2346/client');

$wsWorker->count = 4;

$wsWorker->onConnect = function ($connection){
    echo "open";
};

$wsWorker->onMessage = function ($connection, $data) use ($wsWorker){
    var_dump($data);
    foreach ($wsWorker->connections as $clientConnection){
        $clientConnection->send($data);
    }
};

$wsWorker->onClose = function ($connection){
    echo "close";
};

Worker::runAll();
