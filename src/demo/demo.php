<?php 

$server = new swoole_http_server('0.0.0.0', 9501);

$server->on('start', function($server){
    echo "this request is start\r\n";
});

$server->on('WorkerStart', function($server, $worker_id){
   
    // 注册自动加载函数
    //spl_autoload_register('autoLoader');
    
});


$server->on('request', function(swoole_http_request $request, swoole_http_response $response){
  

    $path_info = explode('/', $request->server['path_info']);
    if( empty($path_info) )
    {
        // 请求路径不合法, 设置为请求无效
        $response->status(400);
        $response->end("Invalid Path Info");
    }

    // 获取 模块, 控制器, 方法
    $model      = (isset($path_info[1]) && !empty($path_info[1])) ? $path_info[1] : 'Home';
    $controller = (isset($path_info[2]) && !empty($path_info[2])) ? $path_info[2] : 'Index';
    $method     = (isset($path_info[3]) && !empty($path_info[3])) ? $path_info[3] : 'index';

    try {
        $class_name = "\\{$model}\\{$controller}";

        $object = new $class_name();

        if( !method_exists($object, $method) )
        {
            // 请求方法不存在, 抛出异常
            throw new Exception("{$method} not found in {$controller}");
        }

        $result = $object->$method();

        // $response->status(200);
        // $response->end($result);
    } catch (Exception $e) {
        // 返回异常信息
        $response->status(503);
        $response->end(var_export($e, true));
    } catch (Error $e ) {
        // 在 PHP7 中,可以增加这一句, 捕获更全面的异常
        $response->status(503);
        $response->end(var_export($e, true));
    }
});

/**
 * 自动加载函数, 根据namespace自动在指定的路径下搜索文件
 * @param $class string 带完整namespace的类名
 */
function autoLoader($class)
{
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

$server->start();

?>