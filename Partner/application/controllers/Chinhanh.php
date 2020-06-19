<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chinhanh extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'ViewWithRule']);
		$this->load->library('session');
	}

 	public function index()
 	{
 		if($this->session->has_userdata('user'))
 			redirect(base_url('Chinhanh/homeChinhanh'));
 		else
	 		$this->load->view('admin/login');
	}
	  
	public function homeChinhanh_cuahang()
 	{
 		if(!$this->session->has_userdata('user') )
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content',getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/chinhanh_cuahang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeChinhanh_monan()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$id['id'] = $this->session->get_userdata('user')['user']['id'];
			$data['content'] = $this->load->view('new_admin/chinhanh_monan', $id,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeChinhanh_baocao_chinhanh()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/baocao_chinhanh_cuahang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}


}
