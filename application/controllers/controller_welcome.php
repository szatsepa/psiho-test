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
                $data = $this->model->get_data();
		$this->view->generate('main_view.php', 'template_view.php',$data);
	
        }
}