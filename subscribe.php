<?php 

$queueName = "order";
$exchangeName = "order";
$routeKey = "order";


//建立链接
$connection = new AMQPConnection(array('host'=>'127.0.0.1','port'=>'5672','vhost'=>'/','login'=>'guest','password'=>'guest'));
$connection->connect() or die('connection failed !!');

try{

    //建立通道
    $channel  = new AMQPChannel($connection);
    
    //建立交换机
    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_DIRECT);
    $exchange->setFlags(AMQP_DURABLE);
    $exchange->declareExchange();

    //建立队列
    $queue = new AMQPQueue($channel);
    $queue->setName($queueName);
    $queue->setFlags(AMQP_DURABLE);
    $queue->declareQueue();

    //队列绑定交换机和 routeKey
    $queue->bind($exchangeName, $routeKey);

}catch(AMQPConnectionException $e){
    var_dump($e);
    exit();
}


echo "message: \r\n";

while(true){
    $queue->consume('process');
}

$conn->disconnect();

/**
 * 回调函数
 */
function process($even, $q){
    $msg = $even->getBody();
    echo $msg."\r\n";
    $q->ack($even->getDeliveryTag());
}

?>