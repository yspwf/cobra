<?php 
namespace app;
class redis{

    private $config;
    private $redis;

    public function __construct($config = []){
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', 6379);
        //return $this->redis;
        //echo "Connection to server sucessfully";
        //查看服务是否运行
        //echo "Server is running: " . $this->redis->ping();
    }
    
    /**
     * setKey 
     * 设置 key 对应的值为 string 类型的 value。
     */
    public function set($key='',$value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->set($key, $value);
    }
     
    /**
     * getKey
     * 获取 key 对应的值为 string 类型的 value。
     */
    public function get($key){
        if(empty($key)){
            return false;
        }
        return $this->redis->get($key);
    }

    /**
     * setnxKey
     * 设置 key 对应的值为 string 类型的 value，如果 key 已经存在，返回 0，nx 表示 not exist。
     */
    public function setnx($key='',$value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->setnx($key, $value);
    }

    /**
     * setexKey
     * 设置 key 对应的值为 string 类型的 value，并指定　　此键值 对应的有效期。
     */
    public function setex($key='', $expire=0, $value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->setex($key, $expire, $value);
    }

    /**
     * 过期时间设置
     */
    public function expire($key='', $time=0){
        return $this->redis->expire($key, $time);
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
    public function incr($key=''){
        if(empty($key)){
            return false;
        }
        return $this->redis->incr($key);
    }

    /**
     * decrKey
     * 对 key 的值做 减减操作
     */
    public function decr($key=''){
        if(empty($key)){
            return false;
        }
        return $this->redis->incr($key);
    }
   
    /**
     * hsetKey
     * hash键值设置
     * $hash  hash名
     * $key   键
     * $value 值
     */
    public function hset($hash='',$key='', $value=''){
        if(empty($key) && empty($value)){
            return false;
        }
        return $this->redis->hset($hash, $key, $value);
    }

    /**
     * hmsetKey
     * 同时设置 hash 的多个 field
     */
    public function hmset($hash='',$params=[]){
        if(empty($hash) && empty($params)){
            return false;
        }
        return $this->redis->hmset($hash, $params);
    }

    /**
     * hdelKey
     * 删除指定 hash 的 field。
     */
    public function hdel($hash=''){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hdel($hash);
    }

    /**
     * getValues
     * 返回 hash 的所有 value。
     */
    public function hvals($hash){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hvals($hash);
    }

    /**
     * getAllValues
     * 获取某个 hash 中全部的 field 及 value。
     */
    public function hgetall($hash){
        if(empty($hash)){
            return false;
        }
        return $this->redis->hgetall($hash);
    }

    /**
     * 无序集合
     * sadd 设置键值
     */
    public function sadd($key, $values=array()){
        return $this->redis->sadd($key, ...$values);
    }

    /**
     * 读取无序集合键值
     * smembers
     */
    public function smembers($key){
        return $this->redis->smembers($key);
    }


    /**
     * 无序集合  移除一个或多个值
     * srem
     */
    public function srem($key, $values=array()){
        return $this->redis->srem($key, ...$values);
    }

    /**
     * 无序集合  返回集合数量
     * scard
     */
    public function scard($key){
        return $this->redis->scard($key);
    }

    /**
     *无序集合  将指定成员 member 元素从 source 集合移动到 destination 集合。
     *（1）SMOVE 是原子性操作。
     *（2）如果 source 集合不存在或不包含指定的 member 元素，则 SMOVE 命令不执行任何操作，仅返回 0 。否则， member 元素从 source 集合中被移除，并添加到 destination 集合中去。
     *（3）当 destination 集合已经包含 member 元素时， SMOVE 命令只是简单地将 source 集合中的 member 元素删除。
     *（4）当 source 或 destination 不是集合类型时，返回一个错误。
     * smove
     */
    public function smove($key, $ontherKey, $values=array()){
        return $this->redis->smove($key, $ontherKey, ...$values);
    }

    /**
     * 有序集合 
     * zadd 用于将一个或多个成员元素及其分数值加入到有序集当中（分数值可以是整数值或双精度浮点数。）
     * （1）如果某个成员已经是有序集的成员，那么更新这个成员的分数值，并通过重新插入这个成员元素，来保证该成员在正确的位置上。
     * （2）如果有序集合 key 不存在，则创建一个空的有序集并执行 ZADD 操作。
     * （3）当 key 存在但不是有序集类型时，返回一个错误。
     */
    public function zadd($key, $score, $value){
        return $this->redis->zadd($key, $score, $value);
    }


    /**
     * 返回有序集中，指定区间内的成员(其中成员的位置按分数值递增(从小到大)来排序。具有相同分数值的成员按字典序(lexicographical order )来排列。)
     * zrange
     */
    public function zrange($key, $start=0, $end=-1){
        return $this->redis->zrange($key, $start, $end, 'withScore');
    }

    /**
     * 返回有序集中，指定区间内的成员。
     * 其中成员的位置按分数值递减(从大到小)来排列。
     * 具有相同分数值的成员按字典序的逆序(reverse lexicographical order)排列。
     * 除了成员按分数值递减的次序排列这一点外， ZREVRANGE 命令的其他方面和 ZRANGE 命令一样。
     * zrevrange
     */
    public function zrevrange($key, $start=0, $end=-1){
        return $this->redis->zrevrange($key, $start, $end, 'withScore');
    }

    /**
     * 对有序集合中指定成员的分数加上增量 increment（分数值可以是整数值或双精度浮点数。）
     *（1）可以通过传递一个负数值 increment ，让分数减去相应的值，比如 ZINCRBY key -5 member ，就是让 member 的 score 值减去 5 。
     *（2）当 key 不存在，或分数不是 key 的成员时， ZINCRBY key increment member 等同于 ZADD key increment member 。
     *（3）当 key 不是有序集类型时，返回一个错误。
     */
    public function zincrby($key, $number, $value){
        return $this->redis->zincrby($key, $number, $value);
    }

    /**
     * 事物
     * Watch 命令用于监视一个(或多个) key ，如果在事务执行之前这个(或这些) key 被其他命令所改动，那么事务将被打断
     */
    public function watch($key){
        return $this->redis->watch($key);
    }

    public function multi(){
        return $this->redis->multi();
    }

    public function exec(){
        return $this->redis->exec();
    }


    /**
     * 队列
     * 在 key 对应 list 的头部 添加（压入）字符串元素。
     */
    public function lpush($key, $params=array()){
        return $this->redis->lpush($key, ...$params);
    }

    /**
     * 队列
     * 在 key 对应 list 的尾部 添加（压入）字符串元素。
     */
    public function rpush($key, $params=array()){
        return $this->redis->rpush($key, ...$params);
    }


    /**
     * 遍历队列
     * lrange list1 0 -1 代表从链表 list1 的头部第一个元素取到 尾部第一个元素（-1 代表尾部第一个元素）。
     */
    public function lrange($key, $start, $end){
        return $this->redis->lrange($key, $start, $end);
    }

    /**
     * 从 list 的头部 删除 元素，并返回删除的元素（类似 PHP 中的 array_pop() 方法：将数组的最后一个单元弹出（删除））。
     */
    public function lpop($key){
        return $this->redis->lpop($key);
    }

    /**
     * 从 list 的尾部 删除 元素，并返回删除的元素（类似 PHP 中的 array_shift() 方法：将数组的第一个单元弹出（删除））。
     */
    public function rpop($key){
        return $this->redis->rpop($key);
    }

    /**
     * lrem
     * 从 key 对应 list 中删除 n 个和 value 相同的元素。（n < 0 从尾删除，n = 0 全部删除）。返回删除的个数。
     */
    public function lrem($key, $number, $value){
        return $this->redis->lrem($key, $number, $value);
    }

    /**
     * redis 发布
     * publish
     */
    public function publish($key, $message=''){
        return $this->redis->publish($key, $message);
    }


    /**
     * redis 订阅
     * subscribe
     */
    public function subscribe($connectStr, $callback){
       $this->redis->subscribe([$connectStr], $callback);
    }

    /**
     * setOption
     */
    public function setOption(){
        $this->redis->setOption(Redis::OPT_READ_TIMEOUT, -1);
    }

    /**
     * 过期时间通知
     */
    public function psubscribe($patterns = array(), $callback){
        $this->redis->psubscribe($patterns, $callback);
    }




}



?>