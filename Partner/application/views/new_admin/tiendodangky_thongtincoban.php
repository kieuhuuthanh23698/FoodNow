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
    display: none;
  }

  #map #infowindow-content {
    display: inline;
  }
</style>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpfe5LCma0AfpfNrbJlqxSCOLvOQGQDTg&callback=initMap" async defer></script> -->
<script type="text/javascript">
  function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        // var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        // var types = document.getElementById('type-selector');
        // var strictBounds = document.getElementById('strict-bounds-selector');

        // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
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
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        // function setupClickListener(id, types) {
        //   var radioButton = document.getElementById(id);
        //   radioButton.addEventListener('click', function() {
        //     autocomplete.setTypes(types);
        //   });
        // }
        autocomplete.setTypes([]);
        // setupClickListener('changetype-all', []);
        // setupClickListener('changetype-address', ['address']);
        // setupClickListener('changetype-establishment', ['establishment']);
        // setupClickListener('changetype-geocode', ['geocode']);

        // document.getElementById('use-strict-bounds')
        //     .addEventListener('click', function() {
        //       console.log('Checkbox clicked! New state=' + this.checked);
        //       autocomplete.setOptions({strictBounds: this.checked});
        //     });
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

      <div class="row">
        <div class="form-group  col-sm-6">
          <label for="exampleInputPassword1">Khu vực</label>
          <select class="form-control">
            <option>TP.HCM</option>
            <option>Món 2</option>
            <option>Món 3</option>
            <option>Món 4</option>
            <option>Món 5</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="exampleInputEmail1">Tên cửa hàng</label>
          <input type="email" class="form-control" id="tenCH" aria-describedby="emailHelp" placeholder="Cơm Đùi Gà Chiên">
        </div>
        <div class="form-group col-sm-6">
          <label for="exampleInputPassword1">Số điện thoại</label>
          <input type="text" class="form-control" id="diachiCH">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Địa chỉ</label>
        <input type="text" class="form-control" id="pac-input">
      </div>
      <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
      <div id="map"></div>
      <div class="form-group">
        <button  type="button" class="btn  btn-success"><i class="fas fa-search-location"></i>Tìm trên bản đồ</button>
      </div>
    </div>    

  </div>

  <div class="card-footer">

    <div class="justify-content-between">
      <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang_TTNDD"><button type="button" class="btn btn-primary float-right">Lưu</button></a>
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
//replace the "Choose a file" label
//$(this).next('.custom-file-label').html(fileName);
var img = document.getElementById('img_upload');
img.src = URL.createObjectURL( e.target.files[0]);
img.height = "100";
document.getElementById("Chonfile").innerHTML=fileName;
})
</script>


