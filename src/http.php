<?php 
class http{

    public $http;
    public $app;

    public function __construct($port){
        $this->http = new swoole_http_server('0.0.0.0', $port);
        $this->http->on('start', [$this, 'onStart']);
        $this->http->on('workStart', [$this. 'onWorkStart']);
        $this->http->on('request', [$this, 'onRequest']);
        $this->http->start();
    }

    public function onStart($server){
        echo "this request is start";
    }

    public function onWorkStart(){
        $this->app = 1;
    }

    public function onRequest($request, $response){
        $response->header('Content-Type','text/plain');
        $response->end('hello swoole');
    }

}



?>