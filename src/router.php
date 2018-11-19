<?php 
namespace app;
class router{

    private $params = [];
   
   
    public function __construct(){
       
        // $module = isset($_GET['m']) ? $_GET['m'] : 'index';
        // $controller = isset($_GET['c']) ? $_GET['c'] : 'index';
        // $action = isset($_GET['a']) ? $_GET['a'] : 'index';
        // //echo $module."--".$controller."--".$action;
        // //require '/login.php';
        // //$array = explode("&",$_SERVER['QUERY_STRING']);
        // self::loader();
        // $class = "\\{$module}\\{$controller}";
        // $obj = new $class();
        // $obj->$action();
        spl_autoload_register('loader');
    }
   

    public static function loader($classname){

        $baseClasspath = \str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        // 如果文件存在, 引用文件
        $classpath = __DIR__ . DIRECTORY_SEPARATOR ."..". DIRECTORY_SEPARATOR . $baseClasspath;
        //echo $classpath."\r\n";
        if (\is_file($classpath)) {
            require "{$classpath}";
            return;
        }
    
            // $filename = ROOT."/".$classname.".php";
            // $filename = str_replace("\\","/",$filename);
            // echo $filename."\r\n";
            // if(!file_exists($filename)){
            //     //header("HTTP/1.1 404 Not Found");
            //     echo "404";
            //     exit();
            // }
            // require $filename;


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
     
    }
    

}


?>