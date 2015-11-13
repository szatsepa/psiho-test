<?php

class Model_Welcome extends Model
{
	
	public function get_data($cid)
	{
            $data = array();
            
            $data = self::querySelect("SELECT `firstname`, `surname`, `email`, `phone`, `created` FROM `users` WHERE `id`={$cid}");
            
            
            return $data;
	}
        
//        public function forget($email,$phone) {
//            
//            $em = $email;
//            
//            $ph = $phone;
//            
////            $data = array();
//            
//            $data = self::querySelect("SELECT `id`, `firstname`, `surname`, `email`,`phone`,`created` FROM `users` WHERE `email` = '{$em}' AND `phone` = '{$ph}' AND `enabled` = 1");
//            
//            if($data){
//                $_SESSION['CID'] = $data[0]['id'];
//            }
//            
//            return $data;
//            
//        }
        
        public function cab() {
            
            $uid = $_COOKIE['CID'];
            
            return $data = self::querySelect("SELECT us.`firstname`, us.`surname`, us.`email`, us.`phone`, us.`created`, ud.`country`, ud.`region`, ud.`city`, ud.`street`, ud.`born`, ud.`foto`
                                                FROM `users` AS us
                                                LEFT JOIN `userdata` AS ud ON us.`id` = ud.`uid` WHERE us.`id` = {$uid}");
            
        }
        
//        public function update($login,$password) {
//            
//            $nick = hash('sha256',stripslashes($login));            
//            
//            $id = $_SESSION['CID'];
//            
//            $salt = $this->getSalt();
//            
//            $psw = hash('sha256',stripslashes($password).$salt);
//            
//            $data = self::actUpdate("UPDATE `users` SET `login`='{$nick}',`password`='{$psw}',`salt`='{$salt}' WHERE `id` = {$id}");
//            
//            return  $data;
//        }
        private function getSalt() {
            
            $simbols = array('A', 'E', 'I', 'O', 'U', 'Y', 'B', 'C', 'D', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Z');
            
            
            $string = '';
            
            for($i=0;$i<4;$i++){
                
                $sim = $simbols[rand(0,25)];                
                
                $reg = rand(1, 2);
                
                if($reg === 2){
                    $sim = strtolower($sim);
                }
                
                $string .= $sim;
                
            }
            
            return $string;
        }
}
