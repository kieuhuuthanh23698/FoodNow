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
  #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

  #infowindow-content .title {
    font-weight: bold;
  }

  #infowindow-content {
/*    height : 100px;
    width : 200px;*/
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }
</style>
<script type="text/javascript">
  var lat = 0.0, lng = 0.0;
  var map;
  $(document).ready(function(){
    $("#tenCH").val(localStorage.getItem("tenCH"));
    $("#soDT").val(localStorage.getItem("soDT"));
    $("#inputDiaChi").val(localStorage.getItem("address"));
  });

  function initMap() {
      var geocoder = new google.maps.Geocoder();
      debugger;
      lat = localStorage.getItem("lat");
      lat = (lat == null ? 10.908173 : lat);
      lng = localStorage.getItem("lng");
      lng = (lng == null ? 106.644207 : lng);
      var ad = localStorage.getItem("address");
      if(ad == null)
        ad = "";
      toastr.success("Khời tạo map tại location (" + lat + "," + lng + ")</br>" + ad);
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
          position: {lat: parseFloat(lat), lng: parseFloat(lng)},
        });

        map.addListener("center_changed", function() {
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {s
            toastr.error("Địa chỉ không hợp lệ !");
            return;
          }
          lat = place.geometry.location.lat();
          lng = place.geometry.location.lng();
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }
          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });
        autocomplete.setTypes([]);
  } 
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuXN8L4pwflw9GZ1H5-vZhXSOAgHlJ25s&libraries=places&callback=initMap" async defer></script>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Thông tin cơ bản cửa hàng</h1>
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
                <span style="font-size: 1em; color: Tomato;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="position-relative step-content">
              <span>Thông tin người đại diện</span>
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
        <h3 class="card-title"> Thông tin cơ bản</h3>
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

    <!--   <div class="row">
        <div class="form-group  col-sm-6">
          <label for="exampleInputPassword1">Khu vực</label>
          <select class="form-control" id="selectListCity">
            <option value="4">TP Hồ Chí Minh</option>
            <option value="3">Hà Nội</option>
            <option value="5">Cà Mau</option>
          </select>
        </div>
      </div> -->

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="exampleInputEmail1">Tên cửa hàng</label>
          <input type="email" class="form-control" id="tenCH" aria-describedby="emailHelp" placeholder="Tên cửa hàng...">
        </div>
        <div class="form-group col-sm-6">
          <label for="exampleInputPassword1">Số điện thoại</label>
          <input type="text" class="form-control" id="soDT">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Địa chỉ</label>
        <input type="text" class="form-control" id="inputDiaChi">
      </div>
      <div id="infowindow-content">
        <img src="" width="16" height="16" id="place-icon">
        <span id="place-address"></span>
        <div><button type="button" id="btnXacNhanDiaChi" class="btn btn-outline-primary btn-sm" style="font-size: 11px;height: 25px;width: 90%; margin: 5px;">Xác nhận địa chỉ</button></div>
    </div>
      <div id="map"></div>
      <!-- <div class="form-group">
        <button  type="button" class="btn  btn-success"><i class="fas fa-search-location"></i>Tìm trên bản đồ</button>
      </div> -->
    </div>    

  </div>

  <div class="card-footer">

    <div class="justify-content-between">
      <a href="#"><button type="button" class="btn btn-primary float-right" onclick="save()">Lưu</button></a>
    </div>
    <div class="justify-content-between">
      <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_cuahang"><button type="button" class="btn btn-default float-right" style="margin-right: 20px">Quay lại</button></a>
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
var img = document.getElementById('img_upload');
img.src = URL.createObjectURL( e.target.files[0]);
img.height = "100";
document.getElementById("Chonfile").innerHTML=fileName;
})
</script>
<script type="text/javascript">
  function loadListCity(){
    $.ajax({
            url: "https://thongtindoanhnghiep.co/api/city",
            dataType: 'json',
            data: {},
            type: 'get',
            success: function (res) {
              if(res != null){
                var list = res.LtsItem;
                for (var i = 0; i < list.length; i++) {
                  var item = list[i];
                  var o = new Option(item.Title, item.ID);
                  $(o).html("option text");
                  $("#selectListCity").append(o);
                }
              }
            }
    });
  }

  $("#btnXacNhanDiaChi").on('click',  function(){
    $(this).css('display', 'none');
    localStorage.setItem("lat", lat);
    localStorage.setItem("lng", lng);
    localStorage.setItem("address", $("#inputDiaChi").val());
    toastr.success("Đã xác nhận địa chỉ tại location (" + lat + ", " + lng + ")" + $("#inputDiaChi").val());
  })

  function checkTT_CoBan(){
    var result = true;
    if($.trim($("#tenCH").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền tên cửa hàng !");
    }
    if($.trim($("#soDT").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền số điện thoại !");
    }
    if($.trim($("#inputDiaChi").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền địa chỉ !");
    }
    lat = localStorage.getItem("lat");
    lng = localStorage.getItem("lng");
    if(lat == null || lng == null){
      result =  false;
      toastr.error("Bạn chưa xác nhận địa chỉ !");
    }
    return result;
  }

  function save(){
    if(checkTT_CoBan()){
      localStorage.setItem("tenCH", $.trim($("#tenCH").val()));
      localStorage.setItem("soDT", $.trim($("#soDT").val()));
      location.href = "<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTNDD";
    }
  }
</script>



