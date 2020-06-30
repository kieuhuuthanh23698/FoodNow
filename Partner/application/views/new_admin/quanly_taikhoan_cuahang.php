 <div class="content-wrapper">
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông tin này sẽ được hiển thị khi chọn vào dòng cửa hàng trong mục quản lý cửa hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                   <li class="nav-item"><a class="nav-link active" href="#ThongtinCH" data-toggle="tab" onclick="loadListCH_Thuoc_DM()">
                  <i class="far fas fa-store"></i>Thông tin cửa hàng</a></li>
                   <li class="nav-item"><a class="nav-link" href="#ThongtinTK" data-toggle="tab" onclick="loadListCH_Thuoc_DM()">
                  <i class="far fas fa-user-tie"></i>Thông tin tài khoản</a></li>
                   <li class="nav-item"><a class="nav-link" href="#DanhsachMA" data-toggle="tab" onclick="loadListCH_Thuoc_DM()">
                   <i class="far fas fa-utensils"></i>Danh sách món ăn</a></li>
                   <li class="nav-item"><a class="nav-link" href="#DanhsachKM" data-toggle="tab" onclick="loadListCH_Thuoc_DM()">
                   <i class="far fas fa-utensils"></i>Danh sách khuyến mãi</a></li>
                </ul>
              </div><!-- /.card-header -->

              
              <div class="card-body">
                <div class="tab-content">
                  <!-- Tab Thông tin cửa hàng -->
                  <div class="active tab-pane" id="ThongtinCH">

          <div class="col-md-12">
            <!-- About Me Box -->
            <!-- <div class="card card-primary"> -->
               <div class="card-body box-profile">
                <div class="card-header">
                  <img id="img" class="profile-user-img img-fluid img-circle" style="width: 200px; height: 200px;" alt="User profile picture">
                </div>

               </div>

              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Tên cửa hàng</strong>

                <p class="text-muted" id="tencuahang">
                  Bún Bò
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Địa chỉ cửa hàng</strong>

                <p class="text-muted" id="diachi_cuahang">Số 6, Phan Đình Giót, P.2, Q.Tân Bình</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Thời gian bắt đầu</strong>

                <p class="text-muted" id="thoigian_bd">14h</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Thời gian kết thúc</strong>

                <p class="text-muted" id="thoigian_kt">16h</p>
                <hr>

                </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          </div>

                  </div>
<!-- Tab Thông tin cửa hàng -->

<!-- Danh sách món ăn -->
  <div class="active tab-pane" id="DanhsachMA">

          <div class="col-md-12">
            <!-- About Me Box -->
            
            <div class="row">

                                <section class="col-lg-5 connectedSortable">
                                    <div class="container-fluid">
                                        <div class="card">
                                             <div class="card-header">
                                                    <h3 class="card-title">Danh sách loại món ăn</h3>

                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                  </div>

                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên loại món</th>
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Số lượng món</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Chi tiết</th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody>

                                                                </tbody>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    </section>

                                    <section class="col-lg-7 connectedSortable">
                                        <div class="container-fluid">
                                            <div class="card">
                                                 <div class="card-header">
                                                    <h3 class="card-title">Danh sách món ăn</h3>

                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                    </div>
                                                  </div>

                                                <div class="card-body">
                                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column ascending">Tên món</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending">Giá</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                   </tbody>

                            </table></div></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            <!-- </div> -->
            <!-- /.card -->
          </div>

                  </div>
<!-- Tab Thông tin cửa hàng -->


<!-- Thông tin danh sách khuyến mãi -->
                  <div class="tab-pane" id="DanhsachKM">
                     <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Danh sách khuyến mãi cửa hàng</h3>
                                    </div>
                                    <!-- /.card-header -->
        <div class="card-body">
                                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Thông tin khuyến mãi</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày BĐ</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày KT</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">% Giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mô tả</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
   
                                </thead>
                                                            <tbody id="tablelist">
                                                            </tbody>

                            </table>
                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
            </div>

                                    <!-- DIRECT CHAT -->

              <!-- /.card-footer-->
            </div>
                    
                  </div>
<!-- Thông tin danh sách khuyến mãi -->

<!-- Thông tin TK -->
                  <div class="tab-pane" id="ThongtinTK">
                     <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Tên tài khoản</strong>

                    <p class="text-muted" id="tendangnhap">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Mật khẩu</strong>
                    <p><input type="password" class="form-control" id="matkhau" placeholder=""></p>

                    <button type="submit" class="btn btn-success">Lưu</button>
                    </div>

                    
                  </div>
<!-- Thông tin TK -->
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

        </div>
      </div>
    </section>
  </div>

  <style type="text/css">
    .img-circle{
      width: 25%;
      height: auto;
    }
  </style>

  <script type="text/javascript">
    $(document).ready(function(){
        $.ajax(
        {
            url: url + "getTaikhoancuahang",
            dataType: 'json',
            data: {
                idcuahang: <?php echo "'".$id."'";?>,
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
                var infor = res.infor[0];
                $("#tencuahang").text(infor.Ten_Cua_Hang);
                $("#diachi_cuahang").text(infor.DiaChiCH[0].Dia_Chi);
                $("#thoigian_bd").text(infor.Thoi_Gian_Bat_Dau);
                $("#thoigian_kt").text(infor.Thoi_Gian_Ket_Thuc);
                $("#tendangnhap").text(infor.TenTaiKhoan[0].Ten_dang_nhap);
                $("#matkhau").text(infor.TenTaiKhoan[0].Mat_khau);
                $("#img").attr("src","<?php echo base_url();?>dist/img/" + infor.Hinh_Anh_Cua_Hang) 
              }
            }
        });
    });
</script>