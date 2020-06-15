<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  if(!function_exists('getViewWithRule')){
      function getViewWithRule()
      {
        $CI = &get_instance();
        //dựa vào nhóm của tài khoảng => phân quyền left content
        $group = $CI->session->get_userdata('user')['user']['group'];

        if($group == '2'){//cửa hàng
          $rule['dm_chi_nhanh'] = $CI->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);
          $rule['don_hang'] = $CI->load->view('new_admin/left_content/don_hang', NULL,TRUE);
          $rule['km_cua_hang'] = $CI->load->view('new_admin/left_content/khuyen_mai_cua_hang', NULL,TRUE);

        } else if($group == '1'){//chi nhánh
          $rule = null;
          $rule['chi_nhanh'] = $CI->load->view('new_admin/left_content/chi_nhanh', NULL,TRUE);
          $rule['bao_cao_chi_nhanh'] = $CI->load->view('new_admin/left_content/baocao_chinhanh', NULL,TRUE);
          $rule['tai_khoan_chi_nhanh'] = $CI->load->view('new_admin/left_content/taikhoan_chinhanh', NULL,TRUE);
          // $rule['dm_chi_nhanh'] = $CI->load->view('new_admin/left_content/danh_muc_mon_an', NULL,TRUE);

        } else if($group == '3'){//admin hệ thống
          $rule = null;
          $rule['km_he_thong'] = $CI->load->view('new_admin/left_content/khuyen_mai_he_thong', NULL,TRUE);
          $rule['dm_he_thong'] = $CI->load->view('new_admin/left_content/danh_muc_he_thong', NULL,TRUE);

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
?>