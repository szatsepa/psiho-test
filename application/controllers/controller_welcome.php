<?php

class Controller_Welcome extends Controller
{
        function __construct()
	{
		$this->model = new Model_Welcome();
		$this->view = new View();
	}
        
	function action_index()
	{	
                $cid = NULL;
                if(@$_COOKIE['CID']){
                    $cid = @$_COOKIE['CID'];
                }else if(isset ($_SESSION['CID'])){
                    $cid = @$_SESSION['CID'];
                }
                
                $data = $this->model->get_data($cid);
                
		$this->view->generate('welcome_view.php', 'template_view.php',$data);
	
        }
        
        function action_forget() {
            
                $em = stripcslashes($_POST['em']);
                
                $ph = stripslashes($_POST['phone']);
            
                $data = $this->model->forget($em,$ph);
                
		$this->view->generate('forget_view.php', 'template_view.php',$data);
        }
        
        function action_change() {
            
                $data = $this->model->update($_POST['nick'],$_POST['psw']);
                
                if($data){
                    $this->view->generate('welcome_view.php', 'template_view.php',$data);
                }else{
//                    todo
                }
            
        }
}