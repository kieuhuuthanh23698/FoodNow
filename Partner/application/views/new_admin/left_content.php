<style type="text/css">
  .crop-center {
    object-fit: cover;
    object-position: center;
    border-radius: 25px;
  }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>dist/img/Icon_GioHang_03.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FOODNOW</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-scrollbar-vertical-hidden"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 756px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style=""><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <div class="mt-3 d-flex">
        <div class="image">
          <img src="<?php echo isset($Hinh_Anh_Cua_Hang) ? api_url("public/images/").$Hinh_Anh_Cua_Hang : base_url()."dist/img/admintratorIcon.png";?>" style="width: 50px; height: 50px;" class="crop-center" alt="User Image">
        </div>
        <div class="info" style="height: auto;float: right;width: 100%;margin-left: 10px;">
          <a href="<?php echo base_url();?>admin/HomeAdmin" class="d-block"><?php echo isset($Ten_Cua_Hang) ? $Ten_Cua_Hang : 'ADMINTRATOR';?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <!-- Tổng quan -->
           <!-- <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url();?>tongquan/home" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tổng quan
              </p>
            </a>
          </li> -->
          <!-- Quản lý danh mục -->
          <?php echo isset($quan_ly_danh_muc) ? $quan_ly_danh_muc : '';?>
          
          <!--  Tổng quan -->
          <!-- Tin tức -->
          <!-- <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tin tức
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
          <?php echo isset($don_hang_cua_hang) ? $don_hang_cua_hang : '';?>         
          <!-- Tin tức -->
          <!-- Đơn hàng -->
          <?php echo isset($don_hang) ? $don_hang : '';?>
          <!-- Đơn hàng -->
          <!-- Chi nhánh -->
          <?php echo isset($chi_nhanh_danh_sach_mon_an) ? $chi_nhanh_danh_sach_mon_an : '';?>
          <?php echo isset($chi_nhanh) ? $chi_nhanh : '';?>

          <?php echo isset($cuahang_monan) ? $cuahang_monan : '';?>
          <!-- Chi nhánh -->
          <!-- Khuyến mãi -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Khuyến mãi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php echo isset($quan_ly_khuyen_mai) ? $quan_ly_khuyen_mai : '';?>
              <?php echo isset($km_cua_hang) ? $km_cua_hang : '';?>
              <?php echo isset($km_cua_hang_he_thong_hien_thi) ? $km_cua_hang_he_thong_hien_thi : '';?>
              <?php echo isset($km_he_thong) ? $km_he_thong : '';?>
              <?php echo isset($km_cua_hang_danh_sach_hien_thi) ? $km_cua_hang_danh_sach_hien_thi : '';?> 
            </ul>
          </li>
          <!-- Khuyến mãi -->
          <!-- Danh mục -->
           <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Danh mục
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
              <?php echo isset($dm_chi_nhanh) ? $dm_chi_nhanh : '';?>
              <?php echo isset($dm_he_thong) ? $dm_he_thong : '';?>
            <!-- </ul>
          </li> -->
          
          <!-- Danh mục -->
         <!--  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Danh mục
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FoodNow</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Shipper</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>
            </ul>
          </li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Báo cáo
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <!-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hóa đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chi phí dịch vụ</p>
                </a>
              </li> -->
              <?php echo isset($don_hang_admin_thong_ke) ? $don_hang_admin_thong_ke : '';?>
              
              <?php echo isset($bao_cao_cua_hang) ? $bao_cao_cua_hang : '';?>
              <?php echo isset($bao_cao_chi_nhanh) ? $bao_cao_chi_nhanh : '';?>
            </ul>
          </li>
          <li class="nav-header">CÀI ĐẶT</li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Tài khoản
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"> -->
              <?php echo isset($quan_ly_tai_khoan) ? $quan_ly_tai_khoan : '';?>
              <?php echo isset($tai_khoan_cua_hang) ? $tai_khoan_cua_hang : '';?>
              <?php echo isset($tai_khoan_chi_nhanh) ? $tai_khoan_chi_nhanh : '';?>
             <!--  <li class="nav-item">
                <a href="<?php echo base_url();?>Taikhoan/homeTaikhoan_chinhanh" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chi nhánh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url();?>Taikhoan/homeTaikhoan_cuahang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cửa hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhân viên giao hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Khách hàng</p>
                </a>
              </li>     -->
            <!-- </ul> -->
          </li>
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Phân quyền
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nhóm quyền</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chi nhánh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cửa hàng</p>
                </a>
              </li>
            </ul>
          </li> -->

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>admin/logout" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden os-scrollbar-unusable"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
<script type="text/javascript">
  $("#imageUser").attr("src","<?php echo isset($Hinh_Anh_Cua_Hang) ? api_url("public/images/").$Hinh_Anh_Cua_Hang : base_url()."dist/img/admintratorIcon.png";?>");
</script>