<?php 
namespace app;

class request{

    public function url($request, $response){
    	echo "数据库连接";
        $db = new db();
    }

    public function router($module='index', $controller='index', $action='index'){
    	$class = new "\\{$module}\\{$controller}";
    	$obj = new $class();
    	$obj->$action();
    }



}

?>