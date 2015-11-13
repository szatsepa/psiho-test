<?php

class Controller_Ajax extends Controller
{
        function __construct()
	{
		$this->model = new Model_Ajax();
	}
	
	function action_index()
	{
		
	}
        public function action_checkL() {
            
            $data =  $this->model->checkLogin();
            
            echo "{$data}";
            
        } 
        public function action_cab() {
            
            $data = $this->model->cab_change();
            
            echo "{$data}";
            
        }

}
