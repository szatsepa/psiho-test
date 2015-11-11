<?php

class Controller_Main extends Controller
{
        function __construct()
	{
		$this->model = new Model_Main();
		$this->view = new View();
	}
        
	function action_index()
	{	
                $data = $this->model->get_data();
                
		$this->view->generate('main_view.php', 'template_view.php',$data);
	}
        public function action_login() {
            
                $data = $this->model->login($_POST['nick'],$_POST['psw']);
                
                $this->view->generate('main_view.php', 'template_view.php',$data);
		
        }
        public function action_forget() {
            
                $em = stripcslashes($_POST['em']);
                
                $ph = stripslashes($_POST['phone']);
            
                $data = $this->model->forget($em,$ph);
                
//                todo if data = null go to main
                
		$this->view->generate('forget_view.php', 'template_view.php',$data);
        }
}