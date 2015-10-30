<?php

class Controller_Autorisation extends Controller
{

    function __construct()
	{
		$this->model = new Model_Autorisation();
		$this->view = new View();
	}
    function action_index()
	{	
            $this->view->generate('cabinet_view.php', 'template_view.php');
	}
         
        
}