<?php

class Model_Welcome extends Model
{
	
	public function get_data()
	{
            $data = array();
            
            $msg = $this->captcha();
            
            $data['msg'] = $msg;
            
            return $data;
	}
        public function login($login,$password) {
            $data = array();
            
            $msg = $this->captcha();
            
            $data['msg'] = $msg;
            
            if($msg === ''){
                
               $data['msg'] = $this->getID($login, $password);
                
            }
            
            return $data;
        }
        
        private function captcha() {

                if (!isset($_SESSION["secret_number"])) {
                        $_SESSION["secret_number"] = NULL;
                    }
                    if(intval($_SESSION["secret_number"])<1000){
                        mt_srand(time()+(double)microtime()*1000000);
                        
                        $_SESSION["secret_number"] = mt_rand(1000,9999);
                    }

                        
                

                $msg = '';
                
                

                if ($_SERVER["REQUEST_METHOD"]=="POST") {

                        $error=0;

                        if ($_POST["secretcode"]!=$_SESSION["secret_number"] || intval($_POST["secretcode"])==0){

                                $msg = '<p style="color:red"><b>Число с картинки введено не верно!</b></p>';
//                                $_SESSION['MSG']=$msg;

                        } else {
                            $msg='';
                        }

                        // оновлюємо "таємне" число
                        mt_srand(time()+(double)microtime()*1000000);
                        $_SESSION["secret_number"] = mt_rand(1000,9999);

                }
                
                return $msg;
        }
        
        private function getID($login,$password) {
            
            $msg = '<p style="color:red"><b>Логин или пароль ведены не верно</b></p>';
            
            $log = hash('sha256',$login);
            
            $result = mysql_query("SELECT `salt` FROM `clients` WHERE `login` = '{$log}' AND `enabled` = 1");
            
            if($result){
                $salt = mysql_fetch_array($result);
            
                $psw = hash('sha256',$password.$salt[0]);

                $query = "SELECT `id` FROM `clients` WHERE `login`='{$log}' AND `password`='{$psw}'";

                $result_1 = mysql_query($query);

                if($result_1){
                    $cid = mysql_fetch_array($result_1);
                    
                    if($cid){
                        $_SESSION['CID'] = $cid[0];
                    
                        $msg = '<p style="color:green"><b>Вы успешно авторизовались</b></p>';
                    }

                    
                }
            
                
            }
            
            return $msg;
        }
}