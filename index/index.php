<?php 
namespace index;
use app\controller;
use app\db;

class index extends controller{

    public function index(){

        $db = new db();
        $db->query();
        // $views = new views();
        // $views->show();
        //echo "\r\n";
        //$db = new \app\db();
    //     $result = $db->query();
    //    var_dump($result);
        //SSSecho "\r\n";
        $this->render();
        echo "hello  article";
       

    }

    

}


?>