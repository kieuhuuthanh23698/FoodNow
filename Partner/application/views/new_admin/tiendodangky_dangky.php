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
    #map{
    background-color: blue;
    height: 300px;
    width: 100%;
    margin: 10px 0;
  }
  .hovering:hover {
    background-color: #f4f6f9;
;
  } 
</style>
<script type="text/javascript">
  
  function initMap() {
      var geocoder = new google.maps.Geocoder();
      lat = localStorage.getItem("lat");
      lat = (lat == null ? 10.908173 : lat);
      lng = localStorage.getItem("lng");
      lng = (lng == null ? 106.644207 : lng);
      var ad = localStorage.getItem("address");
      if(ad == null)
        ad = "";
      map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: parseFloat(lat), lng: parseFloat(lng)},
          zoom: 17
      });
      var input = document.getElementById('inputDiaChi');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);
      autocomplete.setFields( ['address_components', 'geometry', 'icon', 'name']);
      var infowindow = new google.maps.InfoWindow();
      var infowindowContent = document.getElementById('infowindow-content');
      infowindow.setContent(infowindowContent);
      var marker = new google.maps.Marker({
        map: map,
        label: localStorage.getItem("tenCH"),  
        position: {lat: parseFloat(lat), lng: parseFloat(lng)},
      });
  } 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuXN8L4pwflw9GZ1H5-vZhXSOAgHlJ25s&libraries=places&callback=initMap" async defer></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Đăng ký</h1>
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
          <div class="col-sm-3 step hovering">
            <div class="position-relative step-content">
              <span>Thông tin cơ bản cửa hàng</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: blue;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 step hovering">
            <div class="position-relative step-content">
              <span>Thông tin người đại diện</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: blue;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 step hovering">
            <div class="position-relative step-content">
              <span>Thông tin chi tiết</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: blue;"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3 step hovering">
            <div class="position-relative step-content">
              <span>Đăng ký</span>
              <div class="form-check step-icon">
                <span style="font-size: 1em; color: Tomato;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
              </div>
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
        <h3 class="card-title"> Vui lòng kiểm tra trước khi gửi yêu cầu đăng ký</h3>
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
                <div class="col-sm-12">
                  <div id="TTNDD"><h3>THÔNG TIN CỬA HÀNG</h3></div>
                  <strong><i class="fas fa-book mr-1"></i>CHI NHÁNH THUỘC CỬA HÀNG</strong>

                  <p class="text-muted" id="tenChiNhanhDK"></p>
                </div>

                <div class="col-sm-12">
                  <div id="TTNDD"><h3>THÔNG TIN NGƯỜI ĐẠI DIỆN</h3></div>
                  <strong><i class="fas fa-book mr-1"></i>Họ tên</strong>

                  <p class="text-muted" id="hoten"></p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i>Số ĐT</strong>

                  <p class="text-muted" id="soDT"></p>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i>CMND</strong>

                  <p class="text-muted" id="cmnd"></p>

                  <hr>

                  <strong><i class="far fa-file-alt mr-1"></i>Email</strong>

                  <p class="text-muted" id="email"></p>
                  <hr>
                </div>
                
                <div class="col-sm-12">
                  <div id="TTNDD"><h3>THÔNG TIN CƠ BẢN CỦA CHI NHÁNH</h3></div>
                  <strong><i class="fas fa-book mr-1"></i>Tên cửa hàng</strong>

                  <p class="text-muted" id="tenCH"></p>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i>Địa chỉ</strong>

                  <p class="text-muted" id="address"></p>

                  <div id="map"></div>

                  <hr>
                </div>

                <div class="col-sm-12">
                  <div id="TTNDD"><h3>THÔNG TIN CHI TIẾT CỦA CHI NHÁNH</h3></div>
                  <strong><i class="fas fa-book mr-1"></i>Thời gian mở cửa</strong>

                  <p class="text-muted" id="timeStart"></p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i>Thời gian đóng cửa</strong>

                  <p class="text-muted" id="timeEnd"></p>

                  <hr>

                  
                  <div class="form-group">
                    <label for="exampleInputEmail1" style="display: block;">Hình ảnh chi nhánh</label>
                    <img id="img_upload">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02" />
                      <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                    </div>
                    
                  </div>

                  <hr>

                  <strong><i class="fas fa-pencil-alt mr-1"></i>Mô tả</strong>

                  <p class="text-muted" id="mota"></p>

                  <hr>
                </div>

              </div>

              <div class="card-footer">
               
                <div class="justify-content-between">
                  <a href="#"><button type="button" onclick="saveTT_CuaHang()" class="btn btn-primary float-right">Lưu</button></a>
                </div>
                <div class="justify-content-between">
                 <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTCTCH"><button type="button" class="btn btn-default float-right" style="margin-right: 20px">Quay lại</button></a>
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

<script type="text/javascript">
$('#inputGroupFile02').on('change',function(e){
  debugger;
    var fileName = e.target.files[0].name;
    var img = document.getElementById('img_upload');
    img.src = URL.createObjectURL( e.target.files[0]);
    img.height = 100;
    document.getElementById("Chonfile").innerHTML = fileName;
})

$(document).ready(function(){
    //part 0
    $("#tenChiNhanhDK").text(localStorage.getItem("tenChiNhanhDK"));
    //part 1
    $("#tenCH").text(localStorage.getItem("tenCH"));
    $("#soDT").text(localStorage.getItem("soDT"));
    $("#address").text(localStorage.getItem("address"));

    //part2
    $("#hoten").text(localStorage.getItem("hoten"));
    $("#cmnd").text(localStorage.getItem("cmnd"));
    $("#email").text(localStorage.getItem("email"));

    //part 3
    $("#timeStart").text(localStorage.getItem("timeStart"));
    $("#timeEnd").text(localStorage.getItem("timeEnd"));
    $("#mota").text(localStorage.getItem("mota"));
  });

  function checkTT_CuaHang(){
    var result = true;
    if(document.referrer == "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTCTCH"){
      result =  true;
    } else {
      result = false;
    }
    if($.trim(localStorage.getItem("timeStart")) == ""){
      result = false;
    }
    if($.trim(localStorage.getItem("timeEnd")) == ""){
      result =  false;
    }
    if($.trim(localStorage.getItem("idChiNhanhDK")) == ""){
      result =  false;
    }
    if($.trim(localStorage.getItem("tenChiNhanhDK")) == ""){
      result =  false;
    }

    return result;
  }


  function createFormDataThongTinCuaHang(){
        debugger;
        var form = new FormData();
        var file_data = $("#inputGroupFile02").prop('files')[0];
        if(file_data){
            var type = file_data.type;
            var match = ["image/png", "image/jpg", "image/jpeg"];
            if (type == match[0] || type == match[1] || type == match[2]) {
                form.append("upload_file", file_data);
            }
        } else {
          toastr.error("Bạn chưa chọn hình ảnh đại diện cửa hàng !");
          return null;
        }
        var lat = localStorage.getItem("lat");
        lat = (lat == null ? 10.908173 : lat);
        var lng = localStorage.getItem("lng");
        lng = (lng == null ? 106.644207 : lng);
        form.append("idChiNhanhDK",localStorage.getItem("idChiNhanhDK"));
        form.append("Ten_cua_hang",localStorage.getItem("tenCH"));
        form.append("So_dien_thoai_cua_hang", localStorage.getItem("soDT"));
        form.append("Dia_Chi_Cua_Hang", localStorage.getItem("address"));
        form.append("lat", lat);
        form.append("lng", lng);

        form.append("Ho_Ten_Nguoi_Dai_Dien", localStorage.getItem("hoten"));
        form.append("CMND_Nguoi_Dai_Dien", localStorage.getItem("cmnd"));
        form.append("Email_Nguoi_Dai_Dien", localStorage.getItem("email"));

        form.append("Thoi_Gian_Bat_Dau", localStorage.getItem("timeStart"));
        form.append("Thoi_Gian_Ket_Thuc", localStorage.getItem("timeEnd"));
        form.append("Mo_ta_cua_hang", localStorage.getItem("mota"));
        return form;
    }

  function saveTT_CuaHang(){
        var form = createFormDataMonAn();
        if(form){
          toastr.error("Error create form data !");
          return;
        }
        $.ajax(
        {
            url: url + "",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form,
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
              } else if(res.return_code == "0"){
              }
            }
        });
  }

  $(window).on( "load", function(){
    if(!checkTT_CuaHang()){
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTCTCH";
    }
  })
</script>

            
