<?php

class Controller_Cab extends Controller
{
        function __construct()
	{
		$this->model = new Model_Cab();
		$this->view = new View();
	}
        
	function action_index()
	{	
                                
                $data = $this->model->get_data();
                
		$this->view->generate('cab_view.php', 'template_view.php',$data);
	
        }
}