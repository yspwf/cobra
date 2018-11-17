<?php 
class http{

    public $http;
    public $app;

    public function __construct($port){
        $this->http = new swoole_http_server('0.0.0.0', $port);
        $this->http->on('start', [$this, 'onStart']);
        $this->http->on('workerStart', [$this, 'onWorkerStart']);
        $this->http->on('request', [$this, 'onRequest']);
        $this->http->start();
    }

    public function onStart($server){
        echo "this request is start";
    }

    public function onWorkerStart(){
        $this->app = 1;
    }

    public function onRequest($request, $response){
        //var_dump($request);

        var_dump($request->server);

        //$app = $this->app;
        //$get = json_encode($request->get);
        //$response->end("app is ".$app.", get is ". $get);
        //$response->header('Content-Type','text/plain');
        //$response->end('hello swoole');
    }

}



?>