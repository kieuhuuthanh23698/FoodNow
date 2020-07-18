<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donhang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'ViewWithRule']);
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->has_userdata('user')){
			redirect(base_url('admin/homeAdmin'));
		}
		else{
			$this->load->view('admin/login');
		}
	}

	public function Danhsach_donhang()
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
			$data['content'] = $this->load->view('new_admin/Donhang/danhsach_donhang', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
	}

	public function Danhsach_donhang_cuahang()
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
			$id['id'] = $this->session->get_userdata('user')['user']['id'];
			$data['content'] = $this->load->view('new_admin/Donhang/donhang_cuahang', $id,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
	}

	public function Donhang_thongke_cuahang()
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
			$data['content'] = $this->load->view('new_admin/Donhang/donhang_cuahang_thongke', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
	}

	public function Donhang_admin_thonke()
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
			$data['content'] = $this->load->view('new_admin/Donhang/donhang_admin_thongke', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
	}

	public function Thongke_donhang()
	{
		if(!$this->session->has_userdata('user') || getGroup() != '3')
		{
			session_unset();
			redirect(base_url('admin/'));
		}
		else
		{
			$giaodien['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$giaodien['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$giaodien['content'] = $this->load->view('new_admin/Donhang/donhang_admin_thongke', NULL,TRUE);
			$giaodien['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $giaodien);
		}
	}
}