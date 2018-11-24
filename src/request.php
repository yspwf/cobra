<?php 
namespace app;

class request{

	public $req;
	public $res;

	public function __construct($request, $response){
		$this->req = $request;
		$this->res = $response;

	}

    public function url(){
    	echo "数据库连接";
        $db = new db();
    }

    public function router(){
    	
    	$uri = '';
		$uri = $this->req->server['path_info'];
		//var_dump($uri);
		$uri = explode("/", $uri);
		array_shift($uri);
		$module = empty($uri[0]) ? 'index' : $uri[0];
		$controller = empty($uri[1]) ? 'index' : $uri[1];
		$action = empty($uri[2]) ? 'index' : $uri[2];

		$class = "\\{$module}\\{$controller}";
    	$obj = new $class($this->req, $this->res);
    	$obj->$action();
    }



}

?>