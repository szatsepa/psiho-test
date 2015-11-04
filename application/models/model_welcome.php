<?php

class Model_Welcome extends Model
{
	
	public function get_data()
	{
            $data = array();
            
            $data = self::querySelect("SELECT `firstname`, `surname`, `email`, `phone`, `created` FROM `clients` WHERE `id`={$_SESSION['CID']}");
            
            
            return $data;
	}
        
}
