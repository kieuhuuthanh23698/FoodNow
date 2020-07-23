 <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
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
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Thông tin cửa hàng</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Đặt lại mật khẩu</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">

                  <div class="col-md-12">
                    <!-- About Me Box -->
                    <!-- <div class="card card-primary"> -->
                     <div class="card-body box-profile">
                      <div class="card-header">
                        <img id="img" src="<?php echo base_url();?>dist/img/grocery_store.png" class="profile-user-img img-fluid img-circle" style="width: 200px; height: 200px;" alt="User profile picture">
                      </div>

                    </div>
                    <div class="card-body">
                      <strong><i class="fas fa-book mr-1"></i> Tên cửa hàng</strong>

                      <p class="text-muted" id="tencuahang">Bún Bò</p>

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


                <div class="tab-pane" id="settings">
                 <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i>Tên tài khoản</strong>

                  <p class="text-muted" id="tendangnhap">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i>Mật khẩu</strong>
                  <p><input type="text" class="form-control" id="matkhau"></p>

                  <button type="submit" class="btn btn-success" onclick="save()">Lưu</button>
                </div>


              </div>
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
          $("#matkhau").val(infor.TenTaiKhoan[0].Mat_khau);
          $("#img").attr("src", url + "Public/Images/" + infor.Hinh_Anh_Cua_Hang) 
        }
      }
    });
  });

  function Capnhatmatkhau(){
          $.ajax(
          {
            url: url + "capnhatmatkhau_cuahang",
            dataType: 'json',
            data: {
              IdCuaHang: <?php echo "'".$id."'";?>,
              Matkhaucuahang :$("#matkhau").val()
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
                toastr.success("Cập nhật thành công")
              }
            }
          });
        }


        function checkTT_CoBan(){
          var result = true;
          if($.trim($("#matkhau").val()) == ""){
            result = false;
            toastr.error("Bạn chưa cập nhật mật khẩu !");
          }
          return result;
        }

        function save(){
          if(checkTT_CoBan()){
            Capnhatmatkhau();
          }
      }
</script>