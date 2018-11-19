<?php 
namespace app;
class http{

    public $http;
    public $app;
    public $router;

    public function __construct($port){
        $this->http = new \swoole_http_server('0.0.0.0', $port);
        $this->http->on('start', [$this, 'onStart']);
        $this->http->on('workerStart', [$this, 'onWorkerStart']);
        $this->http->on('request', [$this, 'onRequest']);
        $this->http->start();
    }

    public function onStart($server){
        echo "this request is start\r\n";
    }

    public function onWorkerStart(){
        //$this->app = 1;
        require ROOT."/src/router.php";
        //$this->router = new router();
    }

    public function onRequest($request, $response){

        //var_dump($request);

        //var_dump($request->server['request_uri']);
        $urlArr = explode('/',$request->server['request_uri']);
        array_shift($urlArr);
        $module = $urlArr['0'];
        $controller = $urlArr['1'];
        $action = $urlArr['2'];
        //echo $module."--".$controller."--".$action;
        $router = new router();
        $router::loader();
        //$class = "\\{$module}\\{$controller}";
        $class = "\articel\articel";
        $obj = new $class();
        //$obj->$action();

        //$app = $this->app;
        //$get = json_encode($request->get);
        //$response->end("app is ".$app.", get is ". $get);
        //$response->header('Content-Type','text/plain');
        //$response->end('hello swoole');
    }

}



?>