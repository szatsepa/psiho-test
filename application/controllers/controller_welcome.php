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
            
        }
}