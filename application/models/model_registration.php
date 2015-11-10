<?php

class Model_Registration extends Model
{
	
	public function get_data()
	{
            
	}
        
        public function setClient($login,$psw,$email,$phone,$code,$firstname,$surname) 
        {
                $data = array('data'=>array('login'=>$login,'psw'=>$psw,$email,$phone,'SC'=>$code,'sesSC'=>$_SESSION["secret_number"]),'CID'=>NULL,'query'=>  NULL);

                if (intval($_SESSION["secret_number"])<1000) {

                        mt_srand(time()+(double)microtime()*1000000);
                        $_SESSION["secret_number"] = mt_rand(1000,9999);
                }


                if ($_SERVER["REQUEST_METHOD"]==="POST") {

                        $error=0;

                        if (intval($code)!==$_SESSION["secret_number"] || intval($code)===0){

                                $data['msg'] = 'Число з картинки введене невірно!';

                        } else {
                            $salt = $this->getSalt();

                            $password = hash ('sha256', $psw.$salt );

                            $log = hash('sha256',$login);

                            $data['sha256'] = $log;

                            $query = "INSERT INTO `users`(`login`, `password`, `salt`, `firstname`, `surname`,  `email`, `phone`) VALUES ('{$log}','{$password}','{$salt}','{$firstname}','{$surname}','{$email}','{$phone}')";
                          
                            $data['query'] = $query;
                            
                            if(mysql_query($query)){
                                
                               $this->_mail($email, $login, $password);
                               
                               $cid = mysql_insert_id();
                               $_SESSION['CID'] = $cid;
                               $data["CID"] = $cid;
                           }

                            
                        }

                        // оновлюємо "таємне" число
                        mt_srand(time()+(double)microtime()*1000000);
                        
                        $_SESSION["secret_number"] = mt_rand(1000,9999);

                }
            return $data;
        }
        
        function getSalt() {
            
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
        
        function _mail($email,$login,$password) {
            

// Сообщение
            $message = "Здраавствуйте {$login}.\r\nВы зарегистрировались на сайте психологического тестирования.\r\nДля активации перейдите по ссылке - \r\nhttp://{$_SERVER ["HTTP_HOST"]}/registration/activation/{$password}";

            // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            // Отправляем
            mail($email, 'Код активации', $message, "Content-type: text/html; charset=UTF-8 \r\n"
                                                ."From:dlsi.izyum@gmail.com \r\n" 
                                                ."X-Mailer: PHP/" . phpversion());
        }
        
        function activation($code){
            
            $id = NULL;
            
            //session_register("CID");
            
            $query = "UPDATE `users` SET `enabled`=1 WHERE `password` = '{$code}'";
            
            mysql_query($query);
            
            if(mysql_affected_rows()){
                $query = "SELECT `id` FROM `users` WHERE `password` = '{$code}'";
                
                $result = mysql_query($query);
                
                $id = mysql_result($result, 0,0);
            }
            
            $_SESSION['CID'] = $id;
            
            return $id;
        }
        
}
