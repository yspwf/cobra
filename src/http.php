<?php 
namespace app;
class http{

	public $server = null;

	public function __construct($port){
		$this->server = new \swoole_http_server('0.0.0.0', $port);
		$this->server->on('start', [$this, 'onStart']);
		$this->server->on('WorkerStart', [$this, 'onWorkerStart']);
		$this->server->on('request', [$this, 'onRequest']);
	}

	public function onStart($server){
		echo "server is tart \r\n";
	}

	public function onWorkerStart($server){
		$filepath = __DIR__.DIRECTORY_SEPARATOR.'autoload.php';
		require $filepath;
		
		//spl_autoload_register([$this, 'autoloader']);
	}

	public function onRequest($request, $response){
		
		//list($module,$controller,$action) = $uri;
		$req = new request($request, $response);
		$req->router();

		//echo $module."----".$controller."-----".$action;

		//$url = new request();
		//$url->url($request, $response);
		//$obj = new \article\article();
		//$obj->index();
		// $response->header('Content-type',"text/plain");
		// $response->end("hello");
	}

	// public function autoloader($class){
	// 	//echo $class;
	// 	$filepath = __DIR__.DIRECTORY_SEPARATOR.'Article.php';
	// 	if(file_exists($filepath)){
	// 		require $filepath;
	// 	}
	// }

	public function run(){
		$this->server->start();
	}

}




?>
