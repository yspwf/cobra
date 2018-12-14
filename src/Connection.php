<?php 
namespace app;

class Connection{

    private $connection = null;
    private static $instance = null;

    // public function __construct(){
    //     try {
    //         $this->connection = new \PDO('mysql:host=127.0.0.1;dbname=demo;port=3306', 'root', '123456',  array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8';",\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,\PDO::ATTR_PERSISTENT => true)); //初始化一个PDO对象
    //     //     $result = $this->connection->query('select 1+1');
    //     //    //你还可以进行一次搜索操作
    //     //    var_dump($result->FetchAll());
    //         // foreach ($result->FetchAll() as $row) {
    //         //     print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    //         // }
    //     } catch (PDOException $e) {
    //         die ("Error!: " . $e->getMessage() . "<br/>");
    //     }
    // }

    // public function getConnection(){
    //     $dsn = 'mysql:dbname=demo;host=localhost,port=3306';
    //     $user = 'root';
    //     $pwd = '123456';
    //     try{
    //         $conn = new \PDO($dsn, $user, $pwd);
    //     }catch(PDOException $e){
    //         var_dump($e->getMessage());
    //     }
    //     return $conn;
    // }

    public static function getInstance(){
        echo "24234234234";
        // if(!self::$instance instanceof self){
        //     self::$instance = new self();
        // }
        // return self::$instance;
    }

    public function getConnect(){
        try{
            $this->connection = new \PDO('mysql:host=127.0.0.1;dbname=demo;port=3306','root','123456');
            $this->connection->query('set name utf8');
        }catch(\PDOException $e){
            var_dump($e->getMessage());
        }
       
    }

    public function query(){
       return $this->connection->query('select 1+1');
    }

}




?>