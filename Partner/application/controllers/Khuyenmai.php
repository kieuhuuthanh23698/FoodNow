<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Khuyenmai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'ViewWithRule']);
		$this->load->library('session');
	}

 	public function index()
 	{
 		if($this->session->has_userdata('user')){
 			redirect(base_url('Khuyenmai/homeKhuyenmai'));
 		}
 		else{
	 		$this->load->view('admin/login');
 		}
	}
	  
	public function homeKhuyenmai_cuahang()
 	{
 		if(!$this->session->has_userdata('user') || getGroup() != '2')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			if(getGroup() == '2')
				$id['id'] = $this->session->get_userdata('user')['user']['id'];
			$data['content'] = $this->load->view('new_admin/Khuyenmai/khuyenmai_cuahang', $id,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeKhuyenmai_cuahang_hethonghienthi()
 	{
 		if(!$this->session->has_userdata('user') || getGroup() != '2')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			if(getGroup() == '2' || getGroup() == '1')
				$id['id'] = $this->session->get_userdata('user')['user']['id'];
			$data['content'] = $this->load->view('new_admin/Khuyenmai/khuyenmai_cuahang_hethonghienthi', $id,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeKhuyenmai_cuahang_danhsachhienthi()
 	{
 		if(!$this->session->has_userdata('user') || getGroup() != '1')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			// if(getGroup() == '2' || getGroup() == '1')
			// 	$id['id'] = $this->session->get_userdata('user')['user']['id'];
			$data['content'] = $this->load->view('new_admin/Khuyenmai/khuyenmai_cuahang_danhsachhienthi', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeKhuyenmai_hethong()
 	{
 		if(!$this->session->has_userdata('user') || getGroup() != '3')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/Khuyenmai/khuyenmai_hethong', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeQuanly_khuyenmai_cuahang()
 	{
 		if(!$this->session->has_userdata('user') || getGroup() != '3')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/Khuyenmai/quanly_khuyenmai_cuahang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}


}
