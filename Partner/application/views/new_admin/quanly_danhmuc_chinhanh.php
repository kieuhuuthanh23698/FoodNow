<style type="text/css">
  .btn-sm{
    font-size: .500rem !important;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Chi nhánh</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Quản lý</a></li>
            <li class="breadcrumb-item active">Chi nhánh</li>
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

      <!-- Thêm chi nhánh modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Chi nhánh</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên chi nhánh</label>
                <input type="email" class="form-control" id="makm" aria-describedby="emailHelp" placeholder="Món đặc biệt">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Hình ảnh chi nhánh</label>
                <img id="img_upload">
                <div class="custom-file">

                  <input type="file" class="custom-file-input" id="inputGroupFile02" />
                  <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
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
      <!-- Thêm chi nhánh modal -->

      <!-- Có chắc muốn xóa -->
      <div class="modal fade bd-example-modal-sm" tabindex="-1"
      role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
            Bạn có chắc chắn muốn xóa?</h5>
            <button type="button" class="close"
            data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <input type="text" style="display: none;" value="sdfsdfsdf" id="idDelete">
          <button type="button" class="btn btn-secondary"
          data-dismiss="modal">Cancel</button>
          <button type="button" onclick="xoa()" data-dismiss="modal"
          class="btn btn-primary toastrDefaultSuccess">OK</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Có chắc chắn muốn xóa -->

  <!-- Thêm cửa hàng vào danh mục hôm nay -->
  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm cửa hàng</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="card">
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <!-- <form> -->
                  <label for="exampleInputEmail1">Khu vực</label>
                  <div class="form-group">
                    <select class="form-control">
                      <option>TP.HCM</option>
                      <option>option 2</option>
                      <option>option 3</option>
                      <option>option 4</option>
                      <option>option 5</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên cửa hàng</label>
                    <input type="email" class="form-control" id="tenCH" aria-describedby="emailHelp" placeholder="Cơm Đùi Gà Chiên">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachiCH">

                  </div>
                  <div class="form-group">
                    <button  type="button" class="btn  btn-success"><i class="fas fa-search-location"></i>Tìm trên bản đồ</button>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label class="control-label" for="datepicker-start">Thời gian mở cửa</label>
                        <input type="text" class="form-control" id="ngay_bd">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group pmd-textfield pmd-textfield-floating-label">
                        <label class="control-label" for="datepicker-end">Thời gian đóng cửa</label>
                        <input type="text" class="form-control" id="ngay_kt">
                      </div>
                    </div>
                  </div>
                </div>

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


<!-- Thêm cửa hàng vào danh mục trang chủ -->


</div>
<!-- /.card-header -->
<div class="row">
  <section class="col-lg-6 connectedSortable">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách chi nhánh</h3>



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
    <div class="row">
      <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
          <thead>
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column descending" aria-sort="ascending">ID</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Tên chi nhánh</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Số lượng CH</th>
              <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Chi tiết</th>
            </tr>
          </thead>
          <tbody></tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section class="col-lg-6 connectedSortable">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách cửa hàng vừa được thêm vào từ chi nhánh</h3>

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
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Hình ảnh</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên cửa hàng</th>
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Địa chỉ</th>
                  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Trạng thái</th>
                </tr>

              </thead>
              <tbody></tbody>

                  </table>
                </div>
              </div>
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
  .table td{
      vertical-align: inherit;
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
    width: 100px;
    height: 100px;
    border-radius: 20%;
    object-fit: cover;
  }

  .card-primary-chinhanh{
    background - color: #17a2b8;
    color: #FFFFFF;
  }
a
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
   loadListChiNhanh();
});

function loadListChiNhanh(){
 $.ajax(
 {
  url: url + 'chinhanh',
  dataType: 'json',
  data: {
  },
  type: 'get',
  success: function (res) {
    if(res.length > 0){
      var table = $('#example1').DataTable();
      for (i=0; i< res.length; i++){ 
        var item = res[i];
        table.row.add( [
          item._id.substr(item._id.length - 5).toUpperCase(),
          '<ul class="list-inline"><li class="list-inline-item"><img class="img_chinhanh" src="' + url + 'Public/Images/' + item.Hinh_Anh_Chi_Nhanh + '"></li></ul>',
          '<a href="#">' + item.Ten_Chi_Nhanh + '</a>',
          item.DanhSach_CH.length,
          '<button class="btn btn-primary btn_xoa" onclick="loadCuaHang(' + "'" + item._id + "'" + ')" ><i class="fa fa-info-circle" aria-hidden="true"></i></button>'
          ] ).draw();
      }
      if(res.length > 0)
        loadCuaHang(res[0]._id);
      // $('#example1 tbody tr').each(function(){
      //   if($(this).find('td:nth-child(1)').text() == (item._id.substr(item._id.length - 5))){
      //     $(this).attr('id', item._id );
      //     console.log(item._id);
      //   } else {
      //     toastr.success($(this).find('td:nth-child(1)').text() + " - " + (item._id.substr(item._id.length - 5)))
      //     console.log($(this).find('td:nth-child(1)').text() + " - " + (item._id.substr(item._id.length - 5)));
      //   }
      //   $(this).bind({
      //     click : function(e) { 
      //       if(hovering == false)
      //         loadCuaHang($(this).attr('id'));
      //     }, 
      //     mouseleave : function(e) {//khi ko hover nữa
      //             //xóa bảng CH
      //             hovering = false;
      //           }
      //     });
      // });
    } else{
      toastr.error("Không có chi nhánh để hiển thị !");
    }
  }
});
}

function loadCuaHang(idChiNhanh){
  $.ajax({
            url: url + 'cuahangs_chinhanh',
            dataType: 'json',
            data: {
              idChiNhanh : idChiNhanh
            },
            type: 'post',
            success: function (res) {
                var table = $('#example2').DataTable();
                table.clear().draw();
              if(res.return_code == "1" && res.infor.length > 0){
                var list = res.infor;
             for (i=0; i< list.length; i++){ 
              var item = list[i];
                table.row.add( [
                '<ul class="list-inline"><li class="list-inline-item"><img class="img_chinhanh" src="' + url + 'Public/Images/' + item.CH.Hinh_Anh_Cua_Hang + '"></li></ul>',
                '<a href="#">' + item.CH.Ten_Cua_Hang + '</a>',
                item.DiaChi.Dia_Chi,
                '<div class="btn-group btn-group-toggle" data-toggle="buttons"><label id="' + "act" + item.CH._id +'" class="btn btn-secondary btn-sm" ><input onclick="activeCH(' + "'" + item.CH._id + "',1" +')" type="radio" name="options" id="option1" autocomplete="off" checked> Active</label><label id="' + "noAct" + item.CH._id +'" class="btn btn-secondary btn-sm"><input type="radio" onclick="activeCH('+ "'" + item.CH._id + "',0" +')" name="options" id="option3" autocomplete="off">NoAcive</label></div>'
                ] ).node().id  = item.CH._id;
                table.draw();
                if(item.CH.Trang_Thai_Cua_Hang == "1")
                  $("#act" + item.CH._id).addClass("active");
            };
            $('#example2 tbody tr').each(function(){
              var tr = $(this);
              $(this).find('td:nth-child(1)').bind({
                click : function(e) { 
                      localStorage.setItem("detailCH", tr.attr('id'));
                      window.open("<?php echo base_url();?>Taikhoan/homeQuanly_taikhoan_cuahang");
                }});
            });
          } else{
                toastr.error("Chi nhánh không có cửa hàng để hiển thị !");
            }
          }
        });
  hovering = true;
}

function activeCH(idCuaHang, state){
    debugger;
    $.ajax({
            url: url + 'kichHoatCuaHang',
            dataType: 'json',
            data: {
              idCuaHang : idCuaHang,
              state : state
            },
            type: 'post',
            success: function (res) {
              if(res == null || res.return_code == "0"){
                toastr.error("Gửi yêu cầu thất bại !");
                return;
              }
              switch(true){
                case (res.return_code == "1" && state == "1"):
                  toastr.success("Bạn đã kích hoạt cửa hàng thành công !");
                  break;
                case (res.return_code == "1" && state == "0"):
                  toastr.success("Bạn đã hủy kích hoạt cửa hàng thành công !");
                  break;
              }
            }
    });
}

</script>