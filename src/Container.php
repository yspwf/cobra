<?php 
namespace app;

class Container{

    public function getObject($className){
        echo $className.PHP_EOL;
        $classObj = Connection::getInstance();
        $classObj->getConnect();
        return $classObj;
    }

}


?>