<?php 
namespace article;

class article{

    public function index(){

        $views = new \views();
        $views->show();
        echo "hello  article";
       

    }

    

}


?>