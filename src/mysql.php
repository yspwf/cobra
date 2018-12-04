<?php 
namespace app;

class ConnectionPool{

    public $server;
    public $pdo;


    public function __construct(){
        $this->server = new \swoole_server('127.0.0.1',9502);
        $this->server->set([
            'worker_num' => 4,
            'task_worker_num' => 4
        ]);

        $this->server->on('start',[$this, 'onStart']);
        $this->server->on('connect', [$this, 'onConnect']);
        $this->server->on('receive', [$this, 'onReceive']);
        $this->server->on('close', [$this, 'onClose']);

        $this->server->on('WorkerStart', [$this, 'onWorkerStart']);
        $this->server->on('task', [$this, 'onTask']);
        $this->server->on('finish', [$this, 'onFinish']);

        $this->server->start();
    }

    public function onStart($server){
        echo "swoole ConnectionPool start \r\n";
    }

    public function onConnect($server, $fd, $from_id){
        echo "Client from ".$fd." connect \r\n";
    }

    public function onReceive($server, $fd, $from_id, $data){
        $this->server->send($fd, "swoole data");
        $this->server->close($fd);
        $this->server->task($data);
    }

    public function onClose($server, $fd){
        echo "connection close \r\n";
    }

    public function onWorkerStart($server, $worker_num){
        //echo "this is woker start \r\n";
        //workerstart 事件在 worker 进程/task进程启动时发生，这里创建的对象可以在进程的生命周期内使用
        if($worker_num >= $server->setting['worker_num']){
            try{
                $this->pdo = new \PDO(
                    "mysql:host=127.0.0.1;port=3306;dbname=demo",
                    "root",
                    "123456",
                    array(
                        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8';",
                        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO::ATTR_PERSISTENT => true
                    )
                );
            }catch(\PDOException $e){
                var_dump($e->getMessage());
            }
            
        }
    }


    public function onTask($server, $task_id, $from_id, $data){

        var_dump($data);

        $stmt = $this->pdo->query($data);
        $result = $stmt->fetchAll();
        var_dump($result);
        // echo "\r\n";
        // sleep(10);
         return json_encode($data);
        //try{}catch(){}
    }


     public function onFinish($server, $taskId, $data){
         var_dump(json_encode($data));
        // echo "taskid  ".$taskId."\r\n";
        // echo ' finish-data-succ'.$data."\r\n";
     }


}



?>