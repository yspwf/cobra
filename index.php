<?php 
 define('ROOT',__DIR__);
 require ROOT.'/vender/autoload.php';
//  $params = require "/config/config.php";

//  $router = new app\router();



require ROOT."/src/http.php";
$http = new \http(9502);








//$obj->setKey("name","ysp");
//echo $redis->getKey("name");
//$redis->mset(['tag1'=>'新闻','tag2'=>'科技','tag3'=>'头条']);


?>
