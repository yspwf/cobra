<?php 
namespace article;

use article\views;
use app\db;

class article{

    public function index(){

        // $views = new views();
        // $views->show();
        echo "\r\n";
        $db = new \app\db();
        $result = $db->query();
       var_dump($result);
        echo "\r\n";
        // echo "hello  article";
       

    }

    

}


?>