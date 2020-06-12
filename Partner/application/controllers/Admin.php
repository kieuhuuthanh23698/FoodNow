<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_data');
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
 		if(!$this->session->has_userdata('user'))
 			redirect(base_url('admin/login'));
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			//dựa vào nhóm của tài khoảng => phân quyền left content
			$group = $this->session->get_userdata('user')['user']['group'];
			if($group == 1){//cửa hàng
				$rule['don_hang'] = $this->load->view('new_admin/left_content/don_hang', NULL,TRUE);
				$rule['km_cua_hang'] = $this->load->view('new_admin/left_content/khuyen_mai_cua_hang', NULL,TRUE);
			} else if($group == 2){//chi nhánh
				$rule['chi_nhanh'] = $this->load->view('new_admin/left_content/chi_nhanh', NULL,TRUE);
				$rule['dm_chi_nhanh'] = $this->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);
			} else if($group == 3){//admin hệ thống
				$rule['km_he_thong'] = $this->load->view('new_admin/left_content/khuyen_mai_he_thong', NULL,TRUE);
				$rule['dm_he_thong'] = $this->load->view('new_admin/left_content/danh_muc_he_thong', NULL,TRUE);
			} else {
 				// redirect(base_url('admin/login'));
 				$rule['don_hang'] = $this->load->view('new_admin/left_content/don_hang', NULL,TRUE);
				$rule['chi_nhanh'] = $this->load->view('new_admin/left_content/chi_nhanh', NULL,TRUE);
				$rule['km_cua_hang'] = $this->load->view('new_admin/left_content/khuyen_mai_cua_hang', NULL,TRUE);
				$rule['km_he_thong'] = $this->load->view('new_admin/left_content/khuyen_mai_he_thong', NULL,TRUE);
				$rule['dm_chi_nhanh'] = $this->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);
				$rule['dm_he_thong'] = $this->load->view('new_admin/left_content/danh_muc_he_thong', NULL,TRUE);
			}
			$data['left_content'] = $this->load->view('new_admin/left_content',$rule, TRUE);
			$data['content'] = $this->load->view('new_admin/content', NULL,TRUE);
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function login()
	{
		session_unset();
		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		$url = "http://localhost:3000/Dangnhapadmin";
		$result = $this->M_data->getAPI($url, $username, $password);
		if($result['return_code'] !=  null && $result['return_code'] != '0')
		{
			if($result['return_code'] == '1' || $result['return_code'] == '2')//chỉ có chi nhánh vs cửa hàng mới có id
            	$arr_user["user"] = $result["id"];
            $arr_user['group'] = $result['return_code'];
			$this->session->set_userdata("user", $arr_user);
 			redirect(base_url('admin/HomeAdmin'));
	 		// $this->load->view('admin/HomeAdmin');
 		}
 		else
 		{
 			session_unset();
 			// redirect(base_url('admin/login'));
	 		$this->load->view('admin/login');
 		}
 	}
}
