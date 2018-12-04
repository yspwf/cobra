<?php 
namespace app;

class db extends Connection{

    public function query(){
        $result = $this->query();
        var_dump($result);
        //echo "mysql   Model";
    }

}


?>