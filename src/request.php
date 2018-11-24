<?php 
namespace app;

class request{

    public function url($request, $response){
    	echo "数据库连接";
        $db = new db();
    }

    public function router($module='index', $controller='index', $action='index'){
    	$obj = new $module\$controller();
    	$obj->$action();
    }



}

?>