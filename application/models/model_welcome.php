<?php

class Model_Welcome extends Model
{
	
	public function get_data($cid)
	{
            $data = array();
            
            $data = self::querySelect("SELECT `firstname`, `surname`, `email`, `phone`, `created` FROM `users` WHERE `id`={$cid}");
            
            
            return $data;
	}
        
        public function cab() {
            
            $uid = $_COOKIE['CID'];
            
            return $data = self::querySelect("SELECT us.`firstname`, us.`surname`, us.`email`, us.`phone`, us.`created`, ud.`country`, ud.`region`, ud.`city`, ud.`street`, ud.`born`, ud.`foto`
                                                FROM `users` AS us
                                                LEFT JOIN `userdata` AS ud ON us.`id` = ud.`uid` WHERE us.`id` = {$uid}");
            
        }
}
