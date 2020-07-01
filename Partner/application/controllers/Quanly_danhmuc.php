<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quanly_danhmuc extends CI_Controller {

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
	  
	public function homeDanhmuc_chinhanh()
 	{
 		if(!$this->session->has_userdata('user') )
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content',getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/quanly_danhmuc_chinhanh', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_cuahang()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/quanly_danhmuc_cuahang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_monan()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/quanly_danhmuc_monan', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_dangkycuahang()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/tiendodangky_thongtincoban', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_dangkycuahang_TTNDD()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/tiendodangky_thongtinnguoidaidien', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_dangkycuahang_TTCTCH()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/tiendodangky_thongtinchitietCH', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function homeDanhmuc_dangkycuahang_Dangky()
 	{
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$data['content'] = $this->load->view('new_admin/tiendodangky_dangky', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 }
