<?php 

class god{

    static $prj_name;
    static $author;

    static $version = "the god version is 1.0";

    static public function version(){
        return self::$version;
    }

    static public function getConfig(){
        //return getcwd();
       return file_put_contents(getcwd().'/god.json','{}').'of bytes is written'.PHP_EOL.'god.json is created!';
    }

    static function init(){
        // echo "input your project_name?".PHP_EOL;
        // self::$prj_name = fgetc(STDIN);
        // echo "input your author_name?".PHP_EOL;
        // self::$author=fgets(STDIN);
        // echo "your input:";
        // echo self::$prj_name.PHP_EOL;
        // echo self::$author.PHP_EOL;

        echo "input your project_name?".PHP_EOL;
       self::$prj_name=fgetc(STDIN);
       echo  "input your author_name?".PHP_EOL;
       self::$author=fgetc(STDIN);
       echo "your input:";
       echo self::$prj_name.PHP_EOL;
       echo self::$author.PHP_EOL;

    }

    static function __callStatic($name, $arguments){
        echo "the function you call is undefined!";
    }
}


?>