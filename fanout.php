<?php 

$exchangeName = "log";
$message = "log---";


//建立链接
$connection = new AMQPConnection(array('host'=>'127.0.0.1','port'=>'5672','vhost'=>'/','login'=>'guest','password'=>'guest'));
$connection->connect() or die('connect failed !!!');

try{
    //建立通道
    $channel = new AMQPChannel($connection);

    //建立交换机
    $exchange = new AMQPExchange($channel);
    $exchange->setName($exchangeName);
    $exchange->setType(AMQP_EX_TYPE_FANOUT);
    $exchange->setFlags(AMQP_DURABLE);
    $exchange->declareExchange();

    for($i=0;$i<100;$i++){
        $exchange->publish($message.$i, "");
        var_dump("[x] sent $message $i");
    }
}catch(AMQPConnectionExceprion $e){
    var_dump($e);
    exit();
}

$connection->disconnect();


?>