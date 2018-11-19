<?php 
 define('ROOT',__DIR__);
//  require ROOT.'/vender/autoload.php';
//  $params = require "/config/config.php";

//  $router = new app\router();

function loader(){
    spl_autoload_register(function($classname){
        $filename = ROOT."/".$classname.".php";
        $filename = str_replace("\\","/",$filename);
        echo $filename."\r\n";
        if(!file_exists($filename)){
            //header("HTTP/1.1 404 Not Found");
            echo "404";
            exit();
        }
        require $filename;

        
        // $filename = ROOT."/".$classname.".php";
        //  // 构建文件名, 将namespace中的 '\' 替换为文件系统的分隔符 '/'
        // $baseClasspath = \str_replace('\\', DIRECTORY_SEPARATOR, $filename);
        // echo $baseClasspath."\r\n";
        // // 如果文件存在, 引用文件
        // $classpath = __DIR__ . DIRECTORY_SEPARATOR . $baseClasspath;
        // if (\is_file($classpath)) {
        //     require "{$classpath}";
        //     return;
        // }
    });
}

loader();

require ROOT."/src/http.php";
$http = new http(9502);








//$obj->setKey("name","ysp");
//echo $redis->getKey("name");
//$redis->mset(['tag1'=>'新闻','tag2'=>'科技','tag3'=>'头条']);


?>
