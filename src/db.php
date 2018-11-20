<?php 
namespace app;

class db{

    public $connection = null;


    public function __construct(){
        try {
            $this->connection = new \PDO('mysql:host=127.0.0.1;dbname=demo;port=3306', 'root', '123456'); //初始化一个PDO对象
            echo "连接成功<br/>";
            /*你还可以进行一次搜索操作
            foreach ($dbh->query('SELECT * from FOO') as $row) {
                print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
            }
            */
            $dbh = null;
        } catch (PDOException $e) {
            die ("Error!: " . $e->getMessage() . "<br/>");
        }
    }

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

    public function query(){
        var_dump($this->connection->query('select 1+1'));
    }

}




?>