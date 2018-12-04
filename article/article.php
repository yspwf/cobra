<?php 
namespace article;
use app\controller;
use app\db;

class article extends controller{

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
        $this->renderJson();
        //echo "hello  article";
       

    }

    

}


?>