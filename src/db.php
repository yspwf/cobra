<?php 
namespace app;

class db{

    public $connection = null;

    public function getConnection(){
        $dsn = 'mysql:dbname=demo;host=localhost,port=3306';
        $user = 'root';
        $pwd = '123456';
        try{
            $this->connection = new \PDO($dsn, $user, $pwd);
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
       
    }

    public function query(){
        var_dump($this->connection->query('select 1+1'));
    }

}




?>