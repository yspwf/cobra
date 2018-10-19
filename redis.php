<?php 
/*
$redis = new Redis();
$redis->connect('127.0.0.1',6379);


$key = "test";
$lockKey = "lock:".$key;
$lockExpire = 10;

//获取缓存信息
$result = $redis->get($key);

if(empty($result)){
	$status = true;
	while($status){
		//设置锁值为当前的时间戳 + 有效期
		$lockValue = time()+$lockExpire;
		$lock = $redis->setnx($lockKey, $lockValue);
        
		if($lock || $redis->get($lockKey)<time() && $redis->getSet($lockKey, $lockValue) < time()){
			 //给锁设置生存时间
			//$redis->expire($lockValue, $lockExpire);
			sleep(3);
			echo "333333333333";
       
			if($redis->ttl($lockKey)){
				$redis->del($lockKey);
			}
			$status = false;
			
		}else{

			echo "4444444444444";
		}
	}
}
*/

$redis = new Redis();
$redis->connect('127.0.0.1',6379);


/*//note  商品销售量  和  商品信息
for ($i=0; $i < 10; $i++) {
    $redis->set("001|goods_sellhot:good_id_{$i}", mt_rand(0, 1000));
    $arr = range('a', 'z');
    shuffle($arr);
    $redis->set("001|goods_info:good_id_{$i}", json_encode(['name'=>join("", array_slice( $arr, 0, 4 )), 'image'=>'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png']) );
}*/

/*
//note  对应的商品id扔进对应的tag set里
for ($i=1; $i < 10; $i++) {
    $redis->sadd("001|tag:7day", mt_rand(1, 10));
    $redis->sadd("001|tag:pay", mt_rand(1, 10));
}
*/

/*
$redis->sinterstore("001|tag:7day_and_pay","001|tag:7day","001|tag:pay");

$sort = array(
	'BY' => '001|goods_sellhot:good_id_*',
	"SORT"=> 'DESC',
	//"limit"=> array(0,10),
	"get" => ["#", "001|goods_info:good_id_*"]
);

$result = $redis->sort("001|tag:7day_and_pay",$sort);
print_r($result);
*/


$redis = new redis();  
    $result = $redis->connect('127.0.0.1', 6379);  
     $mywatchkey = $redis->get("mywatchkey");  
     $rob_total = 100;   //抢购数量  
     if($mywatchkey<$rob_total){  
         $redis->watch("mywatchkey");  
         $redis->multi();  
        //设置延迟，方便测试效果。  
         //sleep(5);  
         //插入抢购数据  
         $redis->hSet("mywatchlist","user_id_".mt_rand(1, 9999),time());  
         $redis->set("mywatchkey",$mywatchkey+1);  
         $rob_result = $redis->exec();  
        if($rob_result){  
             $mywatchlist = $redis->hGetAll("mywatchlist");  
             echo "抢购成功！<br/>";  
             echo "剩余数量：".($rob_total-$mywatchkey-1)."<br/>";  
             echo "用户列表：<pre>";  
             var_dump($mywatchlist);  
         }else{  
             echo "手气不好，再抢购！";exit;  
         }  
     }  

?>