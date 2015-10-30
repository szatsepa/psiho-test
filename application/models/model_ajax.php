<?php

class Model_Ajax extends Model
{
	
	public function get_data()
	{
 
	}
        public function checkLogin() {
            
            $log = hash('sha256',$_POST['nick']);
            
            $query = "SELECT `id` FROM `clients` WHERE `login` = '{$log}'"; 
            
            $result = mysql_query($query);
            
            $data = 0;
            
            if(mysql_num_rows($result)){
                $data = 1;
            }
            return $data;
        }
}
