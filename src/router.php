<?php 
namespace app;
class router{

    private $params = [];
   
    /*
    public function __construct(){
        $module = isset($_GET['m']) ? $_GET['m'] : 'index';
        $controller = isset($_GET['c']) ? $_GET['c'] : 'index';
        $action = isset($_GET['a']) ? $_GET['a'] : 'index';
        //echo $module."--".$controller."--".$action;
        //require '/login.php';
        //$array = explode("&",$_SERVER['QUERY_STRING']);
        self::loader();
        $class = "\\{$module}\\{$controller}";
        $obj = new $class();
        $obj->$action();
    }
    */

    public static function loader(){
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
        });
    }
    

}


?>