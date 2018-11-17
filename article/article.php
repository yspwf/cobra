<?php 
namespace article;
use app\redis;

class article{

    public function index(){
        $redis = new redis();

        //$redis->saddKey('hh',array('aa','bb','cc','dd'));
        //$redis->sremValues('hh', array('aa','bb'));
        //var_dump($redis->smembersValues('onther'));

        //echo $redis->saddKey("config",array('user1',"user2","user3","user4"));
        //echo $redis->saddKey('onther',array("user6"));
        //echo $redis->smoveValues("config","onther",array("user2"));
        // echo $redis->zaddValues('score', 50, "user:2");
        // echo $redis->zaddValues('score', 70, "user:1");
        // echo $redis->zaddValues('score', 80, "user:3");

        //var_dump($redis->zrevrangeValues('score', 0, -1));

       
        // $mywatchkey = $redis->getKey("mywatchkey");  
        // $rob_total = 100;   //抢购数量  
        // if($mywatchkey<$rob_total){  
        //     $redis->watch("mywatchkey");  
        //     $redis->multi();  
        //     //设置延迟，方便测试效果。  
        //     //sleep(5);  
        //     //插入抢购数据  
        //     $redis->hsetKey("mywatchlist","user_id_".mt_rand(1, 9999),time());  
        //     $redis->setKey("mywatchkey",$mywatchkey+1);  
        //     $rob_result = $redis->exec();  
        //     if($rob_result){  
        //         $mywatchlist = $redis->getAllValues("mywatchlist");  
        //         echo "抢购成功！<br/>";  
        //         echo "剩余数量：".($rob_total-$mywatchkey-1)."<br/>";  
        //         echo "用户列表：<pre>";  
        //         var_dump($mywatchlist);  
        //     }else{  
        //         echo "手气不好，再抢购！";exit;  
        //     }  
        // }  

        //$redis->publish('chat',"546456456");
        //echo "index";


        echo $redis->hset("product:213","collection","456");

    }

    // 回调函数,这里写处理逻辑
    function psCallback($redis, $pattern, $chan, $msg){
        echo "Pattern: $pattern\n";
        echo "Channel: $chan\n";
        echo "Payload: $msg\n\n";
    }

    public function callback($redis, $channel, $msg){
        var_dump($redis);
        echo $channel;
        echo $msg;
        return true;
    }

    

}


?>