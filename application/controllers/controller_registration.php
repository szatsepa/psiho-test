<?php

class Controller_Registration extends Controller
{

    function __construct()
	{
		$this->model = new Model_Registration();
		$this->view = new View();
	}
    function action_index()
	{
            $data = $this->model->get_data();
            
            $this->view->generate('registration_view.php', 'template_view.php',$data);
	}
        
    public function action_reg() {
        
            $data = $this->model->setClient($_POST['nick'],$_POST['psw2'],$_POST['email'],$_POST['phone'],$_POST["secretcode"]);
            
            $this->view->generate('postreg_view.php', 'template_view.php',$data);
        }
        
    public function action_activation($list) {
            
            $data = $this->model->activation($list);
            
            
            $this->view->generate('postactivation_view.php', 'template_view.php',$data);
            
        } 
           
}