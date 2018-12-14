<?php 
namespace app;

class Container{

    public function getObject($className){
        switch($className){
            case 'mysql':
                $classObj = Connection::getInstance();
                $classObj->getConnect();
                break;
            case 'redis':
                $classObj = "redis";
                break;
            default:
                $classObj = "error";
                break;
        }
        return $classObj;
    }

}


?>