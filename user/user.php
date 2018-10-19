<?php 
namespace user;
use \app\controller;
class user extends controller{

    public $params = [];

    public function login(){
        require ROOT."/user/view/login.php";
    }


    public function loginsave(){
        $this->params['username'] = $this->post('username');
        $this->params['password'] = $this->post('password');
        
        // $uid = $this->getRedis()->incrKey('id');
         
        // var_dump($this->params);
        $uid = $this->getRedis()->incrKey('uid');
        $result = $this->getRedis()->hmsetKey("user:".$uid,['name'=>$this->params['username'],'age'=>md5($this->params['password'])]);
        if((bool)$result){
            header('location:/index.php?m=user&c=user&a=list');
        }
    }

    public function lists(){
        $uidnum = $this->getRedis()->getKey('uid');
        for($i=1;$i<=$uidnum;$i++){
            $resarr[] = $this->getRedis()->getAllValues('user:'.$i);
        }
        //$this->getRedis()->getAllValues('uid');
        require ROOT."/user/view/list.php";
    }

}

?>