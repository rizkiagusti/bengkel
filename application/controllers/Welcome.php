<?php
class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
  	 	$this->load->database();
  	 	$this->load->view('header');
  	 	
	}
	public function index()
	{
		
		$this->load->view('home');
		$this->load->view('footer');
	}

	
}
