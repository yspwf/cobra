<?php 
namespace article;
use article\views;

class article{

    public function index(){

        $views = new views();
        $views->show();
        echo "hello  article";
       

    }

    

}


?>