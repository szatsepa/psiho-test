<?php

class Model_Main extends Model
{
	
	public function get_data()
	{
            $data = array();
            
            if(!isset($_COOKIE['CID'])){
                
                $msg = $this->captcha();
            
                $data['msg'] = $msg;
            }else{
                $data = $this->autolog($_COOKIE['CID']);
            }
            
            
            
            return $data;
	}
        public function login($login,$password) {
            
            $data = array();
            
            $msg = $this->captcha();
            
            $data['msg'] = $msg;
            
            if($msg === ''){
                
               $data['msg'] = $this->getID(stripslashes($login), stripslashes($password));
                
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
        private function autolog($cid) {
            
            $query = "SELECT `id` FROM `users` WHERE `id`={$cid}";
            
            $data = self::querySelect($query);
            
            return $data;
        }
        
        private function getID($login,$password) {
            
            $msg = '<p style="color:red"><b>Логин или пароль ведены не верно</b></p>';
            
            $log = hash('sha256',$login);
            
            $result = mysql_query("SELECT `salt` FROM `users` WHERE `login` = '{$log}' AND `enabled` = 1");
            
            if($result){
                $salt = mysql_fetch_array($result);
            
                $psw = hash('sha256',$password.$salt[0]);

                $query = "SELECT `id` FROM `users` WHERE `login`='{$log}' AND `password`='{$psw}'";

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
        public function forget($email,$phone) {
            
            $em = $email;
            
            $ph = $phone;
            
            $data = array('em'=>$em,'phone'=>$ph);
            
            $query = "SELECT `id`, `firstname`, `surname`, `email`,`phone`,`created` FROM `users` WHERE `email` = '{$em}' AND `phone` = '{$ph}' AND `enabled` = 1";
            
            $result = mysql_query($query);
            
            while ($row = mysql_fetch_assoc($result)) {
                    $data['client'] =  $row;
                }
                
            if(!$data['client']){
                header( 'Location: /', true, 307);
            }else{
                $_SESSION['CID'] = $data['client']['id'];
            }
            
            return $data;
            
        }
        public function update($login,$password,$email) {
            
            $nick = hash('sha256',stripslashes($login));            
            
            $id = $_SESSION['CID'];
            
            $salt = $this->getSalt();
            
            $psw = hash('sha256',stripslashes($password).$salt);
            
            $data = self::actUpdate("UPDATE `users` SET `login`='{$nick}',`password`='{$psw}',`salt`='{$salt}' WHERE `id` = {$id}");
            
            if($data){
                $this->_mail(stripslashes($email),stripslashes($login), strip_tags($password));
            }
            
            return  $data;
        }
        
        private function _mail($email,$login,$password) {
            
            $name = $login;
            
            if($_POST['firstname'] or $_POST['surname']){
                $name = "{$_POST['firstname']} {$_POST['surname']}";
            }

// Сообщение
            $message = "Здраавствуйте {$name}.\r\nВы изменили логин на - {$login}.\r\nПароль на - {$password}";

            // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Отправляем
            mail($email, 'Код активации', $message, "Content-type: text/html; charset=UTF-8 \r\n"
                                                ."From:dlsi.izyum@gmail.com \r\n" 
                                                ."X-Mailer: PHP/" . phpversion());
        }
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
