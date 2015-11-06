<?php

class Model_Welcome extends Model
{
	
	public function get_data($cid)
	{
            $data = array();
            
            $data = self::querySelect("SELECT `firstname`, `surname`, `email`, `phone`, `created` FROM `clients` WHERE `id`={$cid}");
            
            
            return $data;
	}
        
        public function forget($email,$phone) {
            
            $em = $email;
            
            $ph = $phone;
            
//            $data = array();
            
            $data = self::querySelect("SELECT `id`, `firstname`, `surname`, `email`,`phone`,`created` FROM `clients` WHERE `email` = '{$em}' AND `phone` = '{$ph}' AND `enabled` = 1");
            
            if($data){
                $_SESSION['CID'] = $data[0]['id'];
            }
            
            return $data;
            
        }
        
}
