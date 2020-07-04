 <script type="text/javascript">
  $(function () {
        $("#dataTableLoaiMonAns").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
</script>

<script type="text/javascript">
  $(function () {
        $("#dataTableMonAns").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
</script>

<script type="text/javascript">
  $(function () {
        $("#dataTableKMCH").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
</script>

<script type="text/javascript">
  $(function () {
        $("#dataTableKMHT").DataTable({
          "responsive": true,
          "autoWidth": false,
          "search": {
            "search": ""
          }
        });
      });
</script>
<script type="text/javascript">
  function initData() {
    debugger;
    var table = $('#dataTableKMHT').DataTable();
    table.search('').draw();
  }
</script>
 <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 id="tencuahang">Thông tin này sẽ được hiển thị khi chọn vào dòng cửa hàng trong mục quản lý cửa hàng</h1>
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
               <li class="nav-item"><a class="nav-link active" href="#ThongtinCH" data-toggle="tab" >
                <i class="far fas fa-store"></i>Thông tin cửa hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="#ThongtinTK" data-toggle="tab">
                  <i class="far fas fa-user-tie"></i>Thông tin tài khoản</a></li>
                  <li class="nav-item"><a class="nav-link" href="#DanhsachMA" data-toggle="tab" >
                   <i class="far fas fa-utensils"></i>Danh sách món ăn</a></li>
                   <li class="nav-item"><a class="nav-link" href="#DanhsachKM" data-toggle="tab" >
                     <i class="far fas fa-utensils"></i>Danh sách khuyến mãi</a></li>
                     <li class="nav-item"><a class="nav-link" href="#DanhsachKMHT" onclick="initData()" data-toggle="tab" >
                       <i class="far fas fa-utensils"></i>Danh sách khuyến mãi hệ thống áp dụng</a></li>
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
                              <img id="img" class="profile-user-img img-fluid img-circle" src="<?php echo base_url();?>dist/img/grocery_store.png" style="width: 200px; height: 200px;" alt="User profile picture">
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
                      <div class="tab-pane" id="DanhsachMA">

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
                                  <div id="dataTableLoaiMonAns_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <table id="dataTableLoaiMonAns" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="dataTableLoaiMonAns_info">
                                          <thead>
                                            <tr role="row">
                                              <th class="sorting_asc" tabindex="0" aria-controls="dataTableLoaiMonAns" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên loại món</th>
                                              <th class="sorting_asc" tabindex="0" aria-controls="dataTableLoaiMonAns" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Số lượng món</th>
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
                                  <div id="dataTableMonAns_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <table id="dataTableMonAns" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="dataTableLoaiMonAns_info">
                                          <thead>
                                            <tr role="row">
                                              <th class="sorting_asc" tabindex="0" aria-controls="dataTableMonAns" rowspan="1" colspan="1" aria-label="Mã chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTableMonAns" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column ascending">Tên món</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTableMonAns" rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending">Giá</th>
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
                                <div id="dataTableKMCH_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <table id="dataTableKMCH" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="dataTableKMCH_info">
                                        <thead>
                                          <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã giảm giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Thông tin khuyến mãi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày BĐ</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày KT</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">% Giảm giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTableKMCH" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mô tả</th>

                                          </thead>
                                          <tbody>
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

                          <!-- Thông tin danh sách khuyến mãi hệ thống -->
                          <div class="tab-pane" id="DanhsachKMHT">
                           <div class="container-fluid">
                            <div class="card">
                              <div class="card-header">
                                <h3 class="card-title">Danh sách khuyến mãi hệ thống áp dụng</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <div id="dataTableKMHT_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <table id="dataTableKMHT" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="dataTableKMHT_info">
                                        <thead>
                                          <tr role="row">
                                           <th class="sorting_asc" tabindex="0" aria-controls="dataTableKMHT" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã giảm giá</th>
                                           <th class="sorting" tabindex="0" aria-controls="dataTableKMHT" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Giờ BĐ</th>
                                           <th class="sorting" tabindex="0" aria-controls="dataTableKMHT" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giờ KT</th>
                                           <th class="sorting" tabindex="0" aria-controls="dataTableKMHT" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">% Giảm giá</th>
                                           <th class="sorting" tabindex="0" aria-controls="dataTableKMHT" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hình ảnh</th>
                                         </tr>

                                       </thead>
                                       <tbody>

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
              idcuahang: localStorage.getItem("detailCH"),
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
                $("#img").attr("src",url + 'Public/Images/' + infor.Hinh_Anh_Cua_Hang) 
              }
            }
          });
        });
      </script>

      <script type="text/javascript">
        var listMonAn = [];
        var click = false;
        $(document).ready(function(){
          loadListLoaiMonAn();
        });

        function loadListLoaiMonAn(){
          $.ajax(
          {
            url: url + "Danhsachmonan_cuahang",
            dataType: 'json',
            data: {
              idcuahang: localStorage.getItem("detailCH"),
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
                listMonAn = res.infor;
                var table = $('#dataTableLoaiMonAns').DataTable();
                table.clear().draw();
                for (i=0; i< listMonAn.length; i++){ 
                    var item = listMonAn[i];//1 loại món ăn
                    table.row.add( [
                      item.DS_LoaiMA.Ten_loai_mon_an ,
                      item.DS_LoaiMA.Danh_sach_mon_an.length
                      ] ).draw();

                    $('#dataTableLoaiMonAns tbody tr').each(function(){
                      if($(this).find('td:nth-child(1)').text() == item.DS_LoaiMA.Ten_loai_mon_an)
                        $(this).attr('id', item.DS_LoaiMA._id );
                      $(this).bind({
                        click : function(e) { 
                          if(!click)
                            loadMonan_LoaiMonAn($(this).attr('id'));
                        },
                        mouseleave : function(e) {
                         click = false;
                       }
                     });
                    });
                  }
                }
              }
            });
        }


        function loadMonan_LoaiMonAn(idLoaiMonAn){
          click = true;
          for (i=0; i< listMonAn.length; i++){
            var item = listMonAn[i];//1 loại món ăn
            if(item.DS_LoaiMA._id == idLoaiMonAn){
              var table = $('#dataTableMonAns').DataTable();
              table.clear().draw();
              for (var j = 0; j < item.DS_Monan.length; j++) {
                var monan = item.DS_Monan[j];
                table.row.add( [
                  '<img src="' + url + 'Public/Images/'+ monan.Hinh_anh_mon_an+'" alt="Product Image" class="img-size-50">',
                  monan.Ten_mon_an ,
                  "" + (new Intl.NumberFormat().format(monan.Don_gia_mon_an))
                  ] ).draw();
              }
            }
          }
        }
      </script>


      <script type="text/javascript">
        $(document).ready(function(){
          $.ajax(
          {
            url: url + "KhuyenMaiCuaHang",
            dataType: 'json',
            data: {
              idCuahang: localStorage.getItem("detailCH"),
            },
            type: 'post',
            success: function (res) {
             for (i=0; i< res.length; i++){ 
              var table = $('#dataTableKMCH').DataTable();
              table.row.add( [
                res[i].MaGiamGia,
                res[i].ThongTin_KMCH,
                res[i].NgayBD,
                res[i].NgayKT,
                res[i].PhanTram_GiamGia + " %",
                res[i].MoTa
                ] ).draw();

              $('#dataTableLoaiMonAns tbody tr').each(function(){
                if($(this).find('td:nth-child(1)').text() == res[i].MaGiamGia)
                  $(this).attr('id', res[i]._id );
              });

            };
          }
        });
        });
      </script>

      <script type="text/javascript"> 

        $(document).ready(function(){
          $('#dataTableLoaiMonAns_wrapper input[type="search"]').css(
             {'width':'150px'}
          );
          loadDanhSachKhuyenMai();
        });

        function loadDanhSachKhuyenMai()
          $.ajax({
            url: url + 'getKMHeThongCuaCuaHang',
            dataType: 'json',
            data: {
              idCuaHang : localStorage.getItem("detailCH")
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
                var listKM = res.infor;
                var table = $('#dataTableKMHT').DataTable();
                table.search('').draw();
                for (i=0; i< listKM.length; i++){ 
                  table.row.add( [
                    listKM[i].MaGiamGia ,
                    listKM[i].GioBD,
                    listKM[i].GioKT,
                    listKM[i].PhanTram_GiamGia + " %",
                    '<img src="' + url + 'Public/Images/' + listKM[i].Icon + '" alt="Product Image" class="img-size-50">',
                    ] ).draw();
                };
                // toastr.success('Load khuyến mãi hệ thống dành cho cửa hàng thành công .');
              }
            }
          });
        }


// <script type="text/javascript">
  // $('.toastrDefaultSuccess').click(function() {
      // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    // });
  </script>