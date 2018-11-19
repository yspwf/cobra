<?php 
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
        //require ROOT."/src/router.php";
        //$this->router = new router();
        spl_autoload_register([$this, 'autoLoader']);
    }

    public function onRequest($request, $response){

        //var_dump($request);

        //var_dump($request->server['request_uri']);
        $urlArr = explode('/',$request->server['path_info']);
        //var_dump($urlArr);
        // array_shift($urlArr);
        $module = $urlArr['1'];
        $controller = $urlArr['2'];
        $action = $urlArr['3'];

        try{
           echo $module."----".$controller."-----".$action;
            // $className = "\\{$module}\\{$controller}";
            // $obj = new $className();
        }catch(Exception $e){
            var_dump($e);
        }

        // require '../article/article.php';

        // $article = new article();
        // $article->index();

        //echo $module."--".$controller."--".$action;
        //$router = new router();
       // $router::loader();
        //$class = "\\{$module}\\{$controller}";
        //$class = "\articel\articel";
        //$obj = new $class();
        //$obj->$action();

        //$app = $this->app;
        //$get = json_encode($request->get);
        //$response->end("app is ".$app.", get is ". $get);
        //$response->header('Content-Type','text/plain');
        //$response->end('hello swoole');
    }


    public function autoLoader($class){
        // 构建文件名, 将namespace中的 '\' 替换为文件系统的分隔符 '/'
        $baseClasspath = \str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        // 如果文件存在, 引用文件
        $classpath = __DIR__ . DIRECTORY_SEPARATOR ."..". DIRECTORY_SEPARATOR . $baseClasspath;
        //echo $classpath."\r\n";
        if (\is_file($classpath)) {
            require "{$classpath}";
            return;
        }
    }

}



?>