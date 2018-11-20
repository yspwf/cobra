<?php 
namespace app;

class db{

    public $connection = null;


    public function __construct(){
        $this->connection = $this->getConnection();
    }

    public function getConnection(){
        $dsn = 'mysql:dbname=demo;host=localhost,port=3306';
        $user = 'root';
        $pwd = '123456';
        try{
            return new \PDO($dsn, $user, $pwd);
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }
       
    }

    public function query(){
        var_dump($this->connection->query('select 1+1'));
    }

}




?>