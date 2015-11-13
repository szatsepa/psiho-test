<?php

class Model_Ajax extends Model
{
	
	public function get_data()
	{
 
	}
        public function checkLogin() {
            
            $log = hash('sha256',$_POST['nick']);
            
            $query = "SELECT `id` FROM `users` WHERE `login` = '{$log}'"; 
            
            $result = mysql_query($query);
            
            $data = 0;
            
            if(mysql_num_rows($result)){
                $data = 1;
            }
            return $data;
        }
        public function cab_change() {
            
            $cid = intval($_POST['cid']);
            
            $field = stripslashes($_POST['field']);
            
            $data = stripslashes($_POST['data']);
            
            $query = "SELECT ud.`id` FROM `users` AS us LEFT JOIN `userdata` AS ud ON us.`id` = ud.`uid` WHERE us.`id` = {$cid}";
            
            $check = self::querySelect($query);
            
            if(!$check[0]['id']){
                $out = self::setInsert("INSERT INTO `userdata`( `uid`, `{$field}`) VALUES ({$cid}, '{$data}')");
            }else{
                $out = self::actUpdate("UPDATE `userdata` SET `{$field}`='{$data}' WHERE `uid`={$cid}");
            }
            
            return $out;
            
        }
}
