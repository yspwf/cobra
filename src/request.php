<?php 
namespace app;

class request{

    public function url($request, $response){
    	echo "数据库连接";
        $db = new db();
    }

    public function router($request, $response){

    	$contro = new controller($request, $response);
    	
    	$uri = '';
		$uri = $request->server['path_info'];
		//var_dump($uri);
		$uri = explode("/", $uri);
		array_shift($uri);
		$module = empty($uri[0]) ? 'index' : $uri[0];
		$controller = empty($uri[1]) ? 'index' : $uri[1];
		$action = empty($uri[2]) ? 'index' : $uri[2];

		$class = "\\{$module}\\{$controller}";
    	$obj = new $class();
    	$obj->$action();
    }



}

?>