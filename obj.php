<?php 
require './god.php';
$result = "";
if($argc>=2){

    $p=$argv[1];
    if(substr($p,0,1)=='-'){
        $p = substr($argv[1],1);
        $result = god::$p();
    }else{
        $result = "you shuold add - to call the function!";
    }


    // '-v' == $argv[1] && $result = god::version(); //substr(PHP_VERSION,0,1); //'the version is 1.0'; 
    // '-init' == $argv[1] && $result = god::init(); //god::getConfig(); //file_put_contents(getcwd().'/god.json','{}').'of bytes is write'.PHP_EOL.'god.json is created!';


}
echo $result;

echo PHP_EOL;


?>