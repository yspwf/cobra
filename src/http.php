<?php 

class Http{

	public $server = null;

	public function __construct($port){
		$this->server = new swoole_http_server('0.0.0.0', $port);
		$this->server->on('start', [$this, 'onStart']);
		$this->server->on('request', [$this, 'onRequest']);
	}

	public function onStart($server){
		echo "server is tart \r\n";
	}

	public function onRequest($request, $response){
		$response->header('Content-type',"text/plain");
		$response->end("hello");
	}

	public function run(){
		$this->server->start();
	}

}




?>