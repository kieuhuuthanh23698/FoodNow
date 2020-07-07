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
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Thông tin chi tiết cửa hàng</h1>
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
              <span style="font-size: 1em; color: blue;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 step">
          <div class="position-relative step-content">
            <span>Thông tin chi tiết</span>
            <div class="form-check step-icon">
              <span style="font-size: 1em; color: Tomato;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="position-relative step-content">
            <span>Đăng ký</span>
          </div>
        </div>
      </div>
    </div>

  </div>
<!-- /.card-header -->
<div class="row">

  <section class="col-lg-12 connectedSortable">

    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Thông tin chi tiết cửa hàng</h3>
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
                      <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                        <input type="email" class="form-control" id="timeStart" placeholder="Nhập thời gian bắt đầu mở cửa">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1">Thời gian kết thúc</label>
                        <input type="text" class="form-control" id="timeEnd" placeholder="Nhập thời gian cửa hàng đóng cửa">
                      </div>
                    </div>
                    <div class="card card-outline card-info">
                      <div class="card-header">
                        <label for="inputEmail4">
                          Mô tả
                        </label>
                      </h3>

                      <div class="mb-3">
                        <textarea id="mota" placeholder="Place some text here"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
                  </div>
                  

                  
                </div>    

              </div>

              <div class="card-footer">
               
                <div class="justify-content-between">
                  <a href="#" onclick="saveTT_CuaHang()"><button type="button" class="btn btn-primary float-right">Lưu</button></a>
                </div>
                <div class="justify-content-between">
                 <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTNDD"><button type="button" class="btn btn-default float-right" style="margin-right: 20px">Quay lại</button></a>
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#timeStart").val(localStorage.getItem("timeStart"));
    $("#timeEnd").val(localStorage.getItem("timeEnd"));
    $("#mota").val(localStorage.getItem("mota"));
  });

  function checkTT_NguoiDaiDien(){
    var result = true;
    if(document.referrer == "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTNDD" || document.referrer == "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_Dangky"){
      result =  true;
    } else {
      result = false;
    }
    if($.trim(localStorage.getItem("hoten")) == ""){
      result = false;
    }
    if($.trim(localStorage.getItem("cmnd")) == ""){
      result =  false;
    }
    if($.trim(localStorage.getItem("email")) == ""){
      result =  false;
    }
    return result;
  }

  function checkTT_CuaHang(){
    var result = true;
    if($.trim($("#timeStart").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền thời gian bắt đầu hoạt động !");
    }
    if($.trim($("#timeEnd").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền thời gian cửa hàng đóng cửa !");
    }
    return result;
  }

  function saveTT_CuaHang(){
    if(checkTT_CuaHang()){
      localStorage.setItem("timeStart", $.trim($("#timeStart").val()));
      localStorage.setItem("timeEnd", $.trim($("#timeEnd").val()));
      localStorage.setItem("mota", $.trim($("#mota").val()));
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_Dangky";
    }
  }

  $(window).on( "load", function(){
    debugger;
    if(!checkTT_NguoiDaiDien()){
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTNDD";
    }
  })
</script>

            
