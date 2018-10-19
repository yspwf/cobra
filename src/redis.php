<?php 
namespace app;
class redis{

    private $config;
    private $redis;

    public function __construct($config = []){
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', 6379);
        //echo "Connection to server sucessfully";
        //查看服务是否运行
        //echo "Server is running: " . $this->redis->ping();
    }
    
    /**
     * setKey 
     * 设置 key 对应的值为 string 类型的 value。
     */
    public function setKey($key='',$value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->set($key, $value);
    }
     
    /**
     * getKey
     * 获取 key 对应的值为 string 类型的 value。
     */
    public function getKey($key){
        if(empty($key)){
            return false;
        }
        return $this->redis->get($key);
    }

    /**
     * setnxKey
     * 设置 key 对应的值为 string 类型的 value，如果 key 已经存在，返回 0，nx 表示 not exist。
     */
    public function setnxKey($key='',$value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->setnx($key, $value);
    }

    /**
     * setexKey
     * 设置 key 对应的值为 string 类型的 value，并指定　　此键值 对应的有效期。
     */
    public function setexKey($key='', $expire=0, $value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->setex($key, $expire, $value);
    }

    /**
     * mset
     * 一次设置多个 key 值，成功返回 ok，表示所有的值都设置了，失败返回 0，表示没有任何值被设置。
     */
    public function mset($params = []){
        if(!is_array($params)){
            return false;
        }
        return $this->redis->mset($params);
    }

    /**
     * incrKey
     * 对 key 的值做 加加 操作，并返回新的值。
     */
    public function incrKey($key=''){
        if(empty($key)){
            return false;
        }
        return $this->redis->incr($key);
    }

    /**
     * decrKey
     * 对 key 的值做 减减操作
     */
    public function decrKey($key=''){
        if(empty($key)){
            return false;
        }
        return $this->redis->incr($key);
    }

    public function hsetKey($hash='',$key='', $value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->hset($hash, $key, $value);
    }

    /**
     * hmsetKey
     * 同时设置 hash 的多个 field
     */
    public function hmsetKey($hash='',$params=[]){
        if(empty($hash) && empty($params)){
            return false;
        }
        return $this->redis->hmset($hash, $params);
    }

    /**
     * hdelKey
     * 删除指定 hash 的 field。
     */
    public function hdelKey($hash=''){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hdel($hash);
    }

    /**
     * getValues
     * 返回 hash 的所有 value。
     */
    public function getValues($hash){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hvals($hash);
    }

    /**
     * getAllValues
     * 获取某个 hash 中全部的 field 及 value。
     */
    public function getAllValues($hash){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hgetall($hash);
    }


}



?>