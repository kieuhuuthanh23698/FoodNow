<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

 	public function index()
 	{
 		if($this->session->has_userdata('user'))
 			redirect(base_url('admin/homeAdmin'));
 		else
	 		$this->load->view('admin/login');
	}
	  
	public function HomeAdmin()
 	{
 		// if(!$this->session->has_userdata('user'))
 		// 	redirect(base_url('admin'));
 		// else
 		// {
			$giaodien['header'] = $this->load->view('admin/header', NULL, TRUE);
			$giaodien['body'] = $this->load->view('admin/body', NULL, TRUE);
			$giaodien['content'] = $this->load->view('admin/content', NULL,TRUE);
			$giaodien['footer'] = $this->load->view('admin/footer', NULL, TRUE);
			$this->load->view('page/masterAdmin', $giaodien);
		//}
 	}
}
