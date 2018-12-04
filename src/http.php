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
		require __DIR__.DIRECTORY_SEPARATOR.'Connection.php';
		//spl_autoload_register([$this, 'autoloader']);
	}

	public function onRequest($request, $response){
		
		//list($module,$controller,$action) = $uri;
		$req = new request($request, $response);
		$req->router();
	}

	public function run(){
		$this->server->start();
	}

}




?>
