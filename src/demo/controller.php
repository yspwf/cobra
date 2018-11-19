<?php 
namespace app;

class controller{

    

    public function get($param){
        $param = htmlspecialchars($_GET[$param]);
        return $param;
    }

    public function post($param){
        $param = htmlspecialchars($_POST[$param]);
        return $param;
    }

    public function getRedis(){
        return new redis();
    }
}


?>