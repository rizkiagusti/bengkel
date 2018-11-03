<?php
class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model(array('m_pelanggan'));
  	 	$this->load->database();
  	 	$this->load->view('header');
  	 	
	}
	public function index()
	{
		
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function rute()
	{
		$this->load->model('m_rute');
      	$rute['rute'] = $this->m_rute->selectAll();

		
		$this->load->view('rute', $rute);
		$this->load->view('footer');
	}
	
}
