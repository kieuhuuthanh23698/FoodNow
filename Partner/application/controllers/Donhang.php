<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donhang extends CI_Controller {

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
	  
	public function Danhsach_donhang()
 	{
 		// if(!$this->session->has_userdata('user'))
 		// 	redirect(base_url('admin'));
 		// else
 		// {
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', NULL, TRUE);
			$data['content'] = $this->load->view('new_admin/danhsach_donhang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		//}
 	}

 	public function Thongke_donhang()
 	{
 		// if(!$this->session->has_userdata('user'))
 		// 	redirect(base_url('admin'));
 		// else
 		// {
			$giaodien['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$giaodien['body'] = $this->load->view('new_admin/left_content', NULL, TRUE);
			$giaodien['content'] = $this->load->view('new_admin/thongke_donhang', NULL,TRUE);
			$giaodien['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $giaodien);
		//}
 	}
}