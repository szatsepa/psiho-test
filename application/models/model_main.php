<?php

class Model_Main extends Model
{
	
	public function get_data()
	{
            $data = array();
            


                if (isset($_SESSION["secret_number"]) and intval($_SESSION["secret_number"])<1000) {

                        mt_srand(time()+(double)microtime()*1000000);
                        
                        $_SESSION["secret_number"] = mt_rand(1000,9999);
                }

                $msg = '';
                
                

                if ($_SERVER["REQUEST_METHOD"]=="POST") {

                        $error=0;

                        if ($_POST["secretcode"]!=$_SESSION["secret_number"] || intval($_POST["secretcode"])==0){

                                $msg = '<p style="color:red"><b>Число з картинки введене невірно!</b></p>';

                        } else {

                                // виконуємо необхідні дії з даними


//                            $client->getData($_POST['nick'], $_POST['psw']);
//
//                            echo "{$_POST['nick']} - {$_POST['psw']}";			

                        }

                        // оновлюємо "таємне" число
                        mt_srand(time()+(double)microtime()*1000000);
                        $_SESSION["secret_number"] = mt_rand(1000,9999);

                }
            
            return $data;
	}
}
