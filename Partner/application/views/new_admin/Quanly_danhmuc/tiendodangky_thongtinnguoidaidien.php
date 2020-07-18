<style type="text/css">
  .step{
    border-top-width: 5px;
    border-top-style: inset;
    border-top-color: aquamarine;
  }
  .step-content{
    text-align: center;
  }
  .step-icon{
    margin: 10px;
    padding: 0px;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Thông tin người dại diện</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
            <li class="breadcrumb-item active">Cửa hàng</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <!-- /.content-header -->

  <!-- Main content -->


  <div class="container-fluid" id="quickForm">
    <!-- Main row -->
    <div class="card">

      <div class="card-header" style="padding-bottom: 0px">

        <div class="row">
          <div class="col-sm-3 step">
            <div class="position-relative step-content">
              <span>Thông tin cơ bản cửa hàng</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: blue;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 step">
            <div class="position-relative step-content">
              <span>Thông tin người đại diện</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: Tomato;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="position-relative step-content">
              <span>Thông tin chi tiết</span>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="position-relative step-content">
              <span>Đăng ký</span>
            </div>
          </div>
        </div>


        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-body">

                <div class="card">
                  <div class="card-body">

                    <div class="row">
                      <section class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-outline card-info">
                              <div class="card-header">
                                <label for="inputEmail4">
                                  Mô tả
                                </label>
                              </h3>
<!--   <div class="card-tools">
<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
title="Collapse">
<i class="fas fa-minus"></i></button>
<button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
title="Remove">
<i class="fas fa-times"></i></button>
</div> -->

<!-- </div> -->

<div class="mb-3">
  <textarea id="mota_km" placeholder="Place some text here"
  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
</div>
</div>
</div>
<div class="form-group">
  <label for="exampleInputEmail1">Hình ảnh cửa hàng</label>
  <img id="img_upload">
  <div class="custom-file">

    <input type="file" class="custom-file-input" id="inputGroupFile02" />
    <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
  </div>

</div>

</div>

</div>

</section>

</div>


</div>
</div>



<label>Cấp tài khoản cửa hàng</label>
<div class="card">
  <div class="card-body">
    <div class="form-group">

      <div class="form-group">
        <label for="exampleInputEmail1">Tên đăng nhập</label>
        <input type="email" class="form-control" id="tenDN" aria-describedby="emailHelp" placeholder="Tên đăng nhập sẽ cho tự động mỗi lần click Thêm cửa hàng">
        <label for="exampleInputEmail1">Mật khẩu</label>
        <input type="email" class="form-control" id="matkhau" aria-describedby="emailHelp" placeholder="Mật khẩu cũng sẽ tự động theo Tên đăng nhập">
      </div>
    </div>
  </div> 
</div>


</div>
<div class="modal-footer justify-content-between">
  <button type="button" class="btn btn-primary float-right">Lưu</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</div>

</div>
<!-- /.card-header -->
<div class="row">

  <section class="col-lg-12 connectedSortable">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Thông tin người đại diện</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
<!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button> -->
</div>
</div>
<div class="card-body">
  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
    <!-- <form> -->
      <div class="row">
        <div class="form-group col-sm-12">
          <label for="exampleInputEmail1">Họ tên người đại diện</label>
          <input type="email" class="form-control" id="hoten" aria-describedby="emailHelp" placeholder="Nhập họ tên">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-12">
          <label for="exampleInputEmail1">CMND</label>
          <input type="email" class="form-control" id="cmnd" aria-describedby="emailHelp" placeholder="Nhập chứng minh nhân dân">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-12">
          <label for="exampleInputPassword1">Email</label>
          <input type="text" class="form-control" id="email" placeholder="Nhập email">
        </div>
      </div>
    </div>    

  </div>

  <div class="card-footer">

    <div class="justify-content-between">
      <a href="#"><button type="button" onclick="saveTT_NguoiDaiDien()" class="btn btn-primary float-right">Lưu</button></a>
    </div>
    <div class="justify-content-between">
      <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang"><button type="button" class="btn btn-default float-right" style="margin-right: 20px">Quay lại</button></a>
    </div>
  </div>
</div>
</section>     

</div>

</div>


<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div >

<style type="text/css">

  .giatien{
    font - size: 100%;
    vertical-align: center;
    background-color: #A5DF00;
  }

  .chitiet{
    padding: 3px 12px 3px 12px;
  }

  #img_upload{
    width: 100px;
  }

  .img_chinhanh{
    width: 5.5rem;
    border-radius: 20%;
  }

  .card-primary-chinhanh{
    background - color: #17a2b8;
    color: #FFFFFF;
  }

  .card-primary-cuahang{
    background - color: #e0a800;
    color: #FFFFFF;

  }
</style>

<script>
  var hovering = false;
  $('#inputGroupFile02').on('change',function(e){
//get the file name
var fileName = e.target.files[0].name;
//replace the "Choose a file" label
//$(this).next('.custom-file-label').html(fileName);
var img = document.getElementById('img_upload');
img.src = URL.createObjectURL( e.target.files[0]);
img.height = "100";
document.getElementById("Chonfile").innerHTML=fileName;
})
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#hoten").val(localStorage.getItem("hoten"));
    $("#cmnd").val(localStorage.getItem("cmnd"));
    $("#email").val(localStorage.getItem("email"));
  });

  function checkTT_NguoiDaiDien(){
    var result = true;
    if($.trim($("#hoten").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền họ tên người đại diện !");
    }
    if($.trim($("#cmnd").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền chứng mình nhân dân !");
    }
    if($.trim($("#email").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền email !");
    }
    return result;
  }

  function checkTT_CoBan(){
    var result = true;
    if(document.referrer == "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang" || document.referrer == "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTCTCH" ){
      result =  true;
    }
    if($.trim(localStorage.getItem("tenCH")) == ""){
      result = false;
    }
    if($.trim(localStorage.getItem("soDT")) == ""){
      result =  false;
    }
    if($.trim(localStorage.getItem("address")) == ""){
      result =  false;
    }
    lat = localStorage.getItem("lat");
    lng = localStorage.getItem("lng");
    if(lat == null || lng == null){
      result =  false;
    }
    return result;
  }

  function saveTT_NguoiDaiDien(){
    if(checkTT_NguoiDaiDien()){
      localStorage.setItem("hoten", $.trim($("#hoten").val()));
      localStorage.setItem("cmnd", $.trim($("#cmnd").val()));
      localStorage.setItem("email", $.trim($("#email").val()));
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTCTCH";
    }
  }

  $(window).on( "load", function(){
    debugger;
    if(!checkTT_CoBan()){
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang";
    }
  })
</script>


