<?php

class Controller_Ajax extends Controller
{
        function __construct()
	{
		$this->model = new Model_Ajax();
	}
	
	function action_index()
	{
		echo 'PIZDETS';
	}
        public function action_checkL() {
            
            $data =  $this->model->checkLogin();
            
            echo "{$data}";
            
        } 

}