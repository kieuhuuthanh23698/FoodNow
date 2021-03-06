<style type="text/css">
  .table td{
    vertical-align: inherit;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Cửa hàng</h1>
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
                <input type="email" class="form-control" id="tenChiNhanh" aria-describedby="emailHelp" placeholder="Nhập tên chi nhánh">
              </div>
              <div class="form-group">
                <label style="display: block;">Hình ảnh chi nhánh</label>
                <img id="img_upload">
                <div class="custom-file">

                  <input type="file" class="custom-file-input" id="inputGroupFile02" />
                  <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                </div>

              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary float-right" onclick="themChiNhanh()">Lưu</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <!-- Thêm chi nhánh modal -->
  </div>
  <!-- /.card-header -->
  <div class="row">

    <section class="col-lg-12 connectedSortable">

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
            Thêm chi nhánh
          </button></h3>
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
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin chi nhánh</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Số lượng cửa hàng</th>
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Lựa chọn</th>
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
        table.clear().draw();
        for (i=0; i< res.length; i++){ 
          var item = res[i];
          table.row.add( [
            '<ul class="products-list product-list-in-card pl-2 pr-2"><li class="item" style="background-color: transparent;"><div class="product-img"><img src="' + url + 'Public/Images/' + item.Hinh_Anh_Chi_Nhanh + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="javascript:void(0)" class="product-title">' + item.Ten_Chi_Nhanh + '</div></li></ul>',
            item.DanhSach_CH.length,
            ' <a href="#"><button onclick="themCuaHang('+ "'" + item._id + "'," + "'" + item.Ten_Chi_Nhanh + "'" + ')"  type="button" class="btn  btn-info" onclick="">Thêm cửa hàng</button>   <button onclick="xoaCuaHang('+ "'" + item._id + "'" + ')"  type="button" class="btn  btn-secondary" onclick="">Deactive</button></a>'
            ] ).draw();
        }
      } else{
        toastr.error("Không có chi nhánh để hiển thị !");
      }
    }
  });
 }
</script>
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

    function themCuaHang(idChiNhanh, tenChiNhanh){
      localStorage.setItem("idChiNhanhDK", idChiNhanh);
      localStorage.setItem("tenChiNhanhDK", tenChiNhanh);
      window.open("<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang");
    }

    function  themChiNhanh(){
      const tenChiNhanh = $("#tenChiNhanh").val();
      if(tenChiNhanh.length == 0){
        toastr.warning("Bạn chưa nhập tên chi nhánh !");
        return;
      }
      var form = new FormData();
      const file_data = $("#inputGroupFile02").prop('files')[0];
      if(file_data){
          var type = file_data.type;
          var match = ["image/png", "image/jpg", "image/jpeg"];
          if (type == match[0] || type == match[1] || type == match[2]) {
              form.append("upload_file", file_data);
          } else{
            toastr.warning("Định dạng hình ảnh không phù hợp !");
            return;
          }
      } else{
        toastr.warning("Bạn chưa chọn hình ảnh !");
        return;
      }
      form.append("Ten_chi_nhanh", tenChiNhanh);
        $.ajax({
              url: url + 'addChiNhanh',
              dataType: 'json',
              cache: false,
              contentType: false,
              processData: false,
              data: form,
              type: 'post',
              success: function (res) {
                if(res || (req != null && res.return_code == "0")){
                  toastr.error("Thêm chi nhánh thất bại")
                } else if(res.return_code == "1"){
                  loadListChiNhanh();
                }
              }
        });
    }

    function xoaCuaHang(idChiNhanh){
      $.ajax({
        url: url + 'deleteChiNhanh',
        dataType: 'json',
        data: {
          idChiNhanh: idChiNhanh
        },
        type: 'post',
        success: function (res) {
          if(res.return_code == "1"){
            toastr.success("Deactive chi nhánh thành công !")
          } else {
            toastr.error("Deactivate chi nhánh thất bại !")
          }
        }
     })
    }
</script>
