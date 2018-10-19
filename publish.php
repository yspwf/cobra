<?php

$queueName = "order";
$exchangeName = "order";
$routeKey = "order";

$msg = json_encode(['order_id'=>'41523523452345154675ID','order_name'=>'商品一','price'=>'324','pro_id'=>'3245']);

//建立链接
$connection = new AMQPConnection(array('host'=>'127.0.0.1','port'=>'5672','vhost'=>'/','login'=>'guest','password'=>'guest'));
$connection->connect() or die('connect failed !!!');

try{
    //建立通道
    $channel = new AMQPChannel($connection);

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

    //队列绑定routeKey 和队列
    $queue->bind($exchangeName,$routeKey);

    //交换机通过routeKey 发布消息
    $exchange->publish($msg, $routeKey);

}catch(AMQPConnectionException $e){
        
    var_dump($e);
    exit();
}

//关键链接
$connection->disconnect()

?>