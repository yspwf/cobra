<?php 
namespace app;

class Container{

    public function getObject($className){
        echo $className;
        $classObj = $className::getInstance();
        $classObj->getConnect();
        return $classObj;
    }

}


?>