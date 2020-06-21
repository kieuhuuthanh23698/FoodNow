<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  if(!function_exists('getViewWithRule')){
      function getViewWithRule()
      {
        //dựa vào nhóm của tài khoảng => phân quyền left content
        $CI = &get_instance();
        $group = getGroup();

        if($group == '2'){//cửa hàng
          $dataLeftContent['Ten_Cua_Hang'] = $CI->session->get_userdata('user')['user']['Ten_Cua_Hang'];
          $rule['cuahang_monan'] = $CI->load->view('new_admin/left_content/cuahang_danhsachmonan', $dataLeftContent,TRUE);
          $rule['don_hang_cua_hang'] = $CI->load->view('new_admin/left_content/don_hang_cua_hang', $dataLeftContent,TRUE);
          $rule['km_cua_hang'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang', $dataLeftContent,TRUE);
          $rule['km_cua_hang_he_thong_hien_thi'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang_he_thong_hien_thi', $dataLeftContent,TRUE);
          $rule['bao_cao_cua_hang'] = $CI->load->view('new_admin/left_content/baocao_cuahang', $dataLeftContent,TRUE);
          $rule['tai_khoan_cua_hang'] = $CI->load->view('new_admin/left_content/taikhoan_cuahang', $dataLeftContent,TRUE);

        } else if($group == '1'){//chi nhánh
          $rule = null;
          $rule['chi_nhanh_danh_sach_mon_an'] = $CI->load->view('new_admin/left_content/chinhanh_danhsachmonan', NULL,TRUE);
          $rule['km_cua_hang_he_thong_hien_thi'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang_he_thong_hien_thi', NULL,TRUE);
          $rule['km_cua_hang_danh_sach_hien_thi'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang_danh_sach_hien_thi', NULL,TRUE);
          $rule['bao_cao_chi_nhanh'] = $CI->load->view('new_admin/left_content/baocao_chinhanh', NULL,TRUE);
          $rule['tai_khoan_chi_nhanh'] = $CI->load->view('new_admin/left_content/taikhoan_chinhanh', NULL,TRUE);
          // $rule['dm_chi_nhanh'] = $CI->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);

        } else if($group == '3'){//admin hệ thống
          $rule = null;
          $rule['quan_ly_khuyen_mai'] = $CI->load->view('new_admin/left_content/quanly_khuyenmai', NULL,TRUE);
          // $rule['dm_he_thong'] = $CI->load->view('new_admin/left_content/danh_muc_he_thong', NULL,TRUE);
          $rule['quan_ly_danh_muc'] = $CI->load->view('new_admin/left_content/quanly_danhmuc', NULL,TRUE);
          $rule['don_hang_admin_thong_ke'] = $CI->load->view('new_admin/left_content/don_hang_admin_thong_ke', NULL,TRUE);
          $rule['quan_ly_tai_khoan'] = $CI->load->view('new_admin/left_content/quanly_taikhoan', NULL,TRUE);

        } else if($group == '4'){//super admin with all view
          $rule = null;
          $rule['don_hang'] = $CI->load->view('new_admin/left_content/don_hang', NULL,TRUE);
          $rule['chi_nhanh'] = $CI->load->view('new_admin/left_content/chi_nhanh', NULL,TRUE);
          $rule['km_cua_hang'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang', NULL,TRUE);
          $rule['km_he_thong'] = $CI->load->view('new_admin/left_content/khuyen_mai_he_thong', NULL,TRUE);
          $rule['dm_chi_nhanh'] = $CI->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);
          $rule['dm_he_thong'] = $CI->load->view('new_admin/left_content/danh_muc_he_thong', NULL,TRUE);
        }
        return $rule;
      }
  }

  if(!function_exists('getGroup')){
    function getGroup(){
      $CI = &get_instance();
      $group = $CI->session->get_userdata('user')['user']['group'];
      return isset($group) ? $group : '0';
    }
  }

  if(!function_exists('api_url')){
    function api_url($route){
      return 'http://localhost:3000/'.$route;
    }
  }
?>