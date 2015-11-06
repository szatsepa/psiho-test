<?php

class Model_Welcome extends Model
{
	
	public function get_data($cid)
	{
            $data = array();
            
            $data = self::querySelect("SELECT `firstname`, `surname`, `email`, `phone`, `created` FROM `clients` WHERE `id`={$cid}");
            
            
            return $data;
	}
        
        public function forget($param) {
            
        }
        
}
