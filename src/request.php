<?php 
namespace app;

class request{

    public $conn;

    public function __construct(){
        $this->conn = new ConnectionPool();
    }

    public function url($request, $response){
        echo "请求处理";
    }

}

?>