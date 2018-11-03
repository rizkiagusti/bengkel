<?php
class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model(array('m_admin'));
  	 	$this->load->database();
  	 	$this->load->view('admin/header');
  	 	
	}
	public function index()
	{
		
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}

	public function rute()
	{
		$this->load->model('m_rute');
      	$rute['rute'] = $this->m_rute->selectAll();

		
		$this->load->view('admin/rute', $rute);
		$this->load->view('admin/footer');
	}
	
}
