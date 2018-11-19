<?php 

class Http{

	public $server = null;

	public function __construct($port){
		$this->server = new swoole_http_server('0.0.0.0', $port);
		$this->server->on('start', [$this, 'onStart']);
		$this->server->on('WorkerStart', [$this, 'onWorkerStart']);
		$this->server->on('request', [$this, 'onRequest']);
	}

	public function onStart($server){
		echo "server is tart \r\n";
	}

	public function onWorkerStart($server){
		spl_autoload_register([$this, 'autoloader']);
	}

	public function onRequest($request, $response){
		$obj = new \Article();
		$obj->index($request, $response);
		// $response->header('Content-type',"text/plain");
		// $response->end("hello");
	}

	public function autoloader($class){
		//echo $class;
		$filepath = __DIR__.DIRECTORY_SEPARATOR.'Article.php';
		if(file_exists($filepath)){
			require $filepath;
		}
	}

	public function run(){
		$this->server->start();
	}

}




?>
