<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url', 'ViewWithRule']);
		$this->load->model('M_data');
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
	  
	public function HomeAdmin()
 	{
 		if(!$this->session->has_userdata('user'))
		{
			session_unset();
			redirect(base_url('admin/'));
		}
 		else
 		{
			$data['header'] = $this->load->view('new_admin/header', NULL, TRUE);
			$data['left_content'] = $this->load->view('new_admin/left_content', getViewWithRule(), TRUE);
			$id['id'] = null;
			
			switch (getGroup()) {
				case '1'://chi nhanh
					$id['id'] = $this->session->get_userdata('user')['user']['id'];
					$data['content'] = $this->load->view('new_admin/dasboard_chinhanh', $id,TRUE);
					break;
				case '2'://cua hang
					$id['id'] = $this->session->get_userdata('user')['user']['id'];
					$data['content'] = $this->load->view('new_admin/dasboard_cuahang', $id,TRUE);
					break;
				case '3'://admin
					$data['content'] = $this->load->view('new_admin/dasboard_admin', $id,TRUE);
					break;
				case '4'://supper admin
					$id['id'] = "";
					$data['content'] = "";
					break;
				default:
					session_unset();
					redirect(base_url('admin/'));
					break;
			}
			$data['footer'] = $this->load->view('new_admin/footer', NULL, TRUE);
			$this->load->view('page/page', $data);
		}
 	}

 	public function login()
	{
		session_unset();
		$username = $this->input->post('username');
 		$password = $this->input->post('password');
 		$url = api_url("Dangnhapadmin");
		$result = $this->M_data->getAPI($url, $username, $password);
		// var_dump($result);
		if($result != null && $result['return_code'] !=  null && $result['return_code'] != '0')
		{
			if($result['return_code'] == '1' || $result['return_code'] == '2')//chỉ có chi nhánh vs cửa hàng mới có id
            	$arr_user["id"] = $result["id"];
			if($result['return_code'] == '2')//chỉ có chi nhánh vs cửa hàng mới có id
            	$arr_user["Ten_Cua_Hang"] = $result["Ten_Cua_Hang"];
            $arr_user['group'] = $result['return_code'];
			$this->session->set_userdata("user", $arr_user);
 			redirect(base_url('admin/HomeAdmin'));
 		}
 		else
 		{
 			session_unset();
 			redirect(base_url('admin/'));
 		}
 	}

 	public function logout(){
		session_unset();
		redirect(base_url('admin/'));
 	}
}
