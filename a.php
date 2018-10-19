<?php

$exchangeName = "log";
//$queueName = "a";
$routeKey = '';


//建立链接
$connection = new AMQPConnection(array('host'=>'127.0.0.1','port'=>'5672','vhost'=>'/','login'=>'guest','password'=>'guest'));
$connection->connect() or die("connect failed !!!");

$channel = new AMQPChannel($connection);

$exchange = new AMQPExchange($channel);
$exchange->setName($exchangeName);
$exchange->setType(AMQP_EX_TYPE_FANOUT);
$exchange->setFlags(AMQP_DURABLE);
$exchange->declareExchange();

$queue = new AMQPQueue($channel);
//$queue->setName($queueName);
$queue->setFlags(AMQP_DURABLE);
$queue->declareQueue();


$queue->bind($exchangeName, $routeKey);

echo "message : \r\n";
while(true){
    $queue->consume('process');
}

$connection->disconnect();

function process($even, $q){
    $msg = $even->getBody();
    echo $msg."\r\n";
    $q->ack($even->getDeliveryTag());
}


?>