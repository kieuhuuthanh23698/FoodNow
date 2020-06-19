
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Khuyến mãi</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Khuyến mãi hệ thống</li>
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

            <div class="card-header">

                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm khuyến mãi</button>

                <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#modal-lg">
                  Áp dụng khuyến mãi
                </button>

                <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Áp dụng khuyến mãi hệ thống cho chi nhánh</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                <label>Tên khuyến mãi hệ thống</label>
                                <select class="form-control">
                                  <option>option 1</option>
                                  <option>option 2</option>
                                  <option>option 3</option>
                                  <option>option 4</option>
                                  <option>option 5</option>
                                </select>
                              </div>

<label>Chọn chi nhánh cần áp dụng</label>
<div class="card">
<div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Danh sách chi nhánh</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Lựa chọn</th>
                                    </tr>
   
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                             <li class="item">
                                <div class="product-img">
                                    <img src="<?php echo base_url();?>dist/img/comchien.png" alt="Product Image"
                                        class="img_chinhanh">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang -
                                        Nguyễn Hữu Cầu</a>
                                    <span class="product-description">
                                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                                    </span>
                                </div>
                            </li>
                        </ul>
                                    </td>

                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary1" checked>
                                                <label for="checkboxPrimary1">
                                                </label>
                                            </div>
                                      </td>
                                    </tr>

                                     <tr>
                                        <td>
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                             <li class="item">
                                <div class="product-img">
                                    <img src="<?php echo base_url();?>dist/img/comchien.png" alt="Product Image"
                                        class="img_chinhanh">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang -
                                        Nguyễn Hữu Cầu</a>
                                    <span class="product-description">
                                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                                    </span>
                                </div>
                            </li>
                        </ul>
                                    </td>

                                        <td>
                                           <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary1" checked>
                                                <label for="checkboxPrimary1">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    

                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                <!-- modal thêm khuyến mãi -->
                <div class="modal fade bd-example-modal-lg" id="modal-insert" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="card-body">
                                <!-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"> -->
                                    <!-- <form> -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã khuyến mãi</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="KM001" id="makm">
								  </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                            <label class="control-label" for="datepicker-start">Giờ BĐ</label>
                                                            <input type="text" class="form-control" id="gio_bd">
										</div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                <label class="control-label" for="datepicker-end">Giờ KT</label>
                                                                <input type="text" class="form-control" id="gio_kt">
										</div>
                                                            </div>
                                                        </div>
                                                    <!-- </div> -->

                                                    <div class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputPassword4">Phần trăm giảm giá</label>
                                                                <input type="number" class="form-control" id="PhanTram_GiamGia">
								    </div>

                                                        </div>
								 
								</form>

                                                    <!-- <form> -->
                                                        <div class="form-group">
                                                            <img id="img_upload">
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02" />
                                                                    <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                                                                </div>
						            
						        </div>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary float-right toastrDefaultSuccess"  onclick="themSanPham()">Lưu</button>
                                                            </div>
                                                        </div>
                                                    <!-- </form> -->

                                                </div>
                                            </div>
                                        </div>

                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
 <div class="row">

  <section class="col-lg-7 connectedSortable">
  		<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách Khuyến mãi hệ thống</h3>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã giảm giá</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Giờ BĐ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giờ KT</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">% Giảm giá</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hình ảnh</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
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
    </div>
    </section>

<section class="col-lg-5 connectedSortable">
	<div class="container-fluid">
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Danh sách các cửa hàng được áp dụng</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button> -->
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul id="tableCuaHang" class="products-list product-list-in-card pl-2 pr-2">
                 <!--  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url();?>dist/img/BunBoHue.jpg" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu
                        <span class="badge badge-danger float-right">
                        <i class="far fa-trash-alt" data-toggle="modal" data-target=".bd-example-modal-sm"></i>
                      </span></a>

                      <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xóa?</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-primary toastrDefaultSuccess">OK</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                      <span class="product-description">
                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                      </span>
                    </div>
                  </li> -->

                  <!-- <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url();?>dist/img/BunBoHue.jpg" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu
                        <span class="badge badge-danger float-right">
                        <i class="far fa-trash-alt"></i>
                      </span></a>
                      <span class="product-description">
                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                      </span>
                    </div>
                  </li> -->
                  <!-- /.item -->
                  <!-- <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url();?>dist/img/BunBoHue.jpg" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu
                        <span class="badge badge-danger float-right">
                        <i class="far fa-trash-alt"></i>
                      </span></a>
                      <span class="product-description">
                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                      </span>
                    </div>
                  </li> -->
                  <!-- /.item -->
                  <!-- <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url();?>dist/img/BunBoHue.jpg" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu
                        <span class="badge badge-danger float-right">
                        <i class="far fa-trash-alt"></i>
                      </span></a>
                      <span class="product-description">
                        22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM
                      </span>
                    </div>
                  </li> -->
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
              <!-- /.card-footer -->
            </div>
        </div>
</section> 
</div>
   
                    
    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Control sidebar content goes here -->
  </aside>
                    <!-- /.control-sidebar -->

</div >

                <style type="text/css">

                    .btn_xoa{
                       padding: 4px 8px 4px 8px;
                    }

	.chitiet{
                        padding: 3px 12px 3px 12px;
	}

	#img_upload{
                        width: 100px;
	}

    .img_chinhanh {
        width: 5.5rem;
        border-radius: 20%;
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



<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script type="text/javascript">

    
var socket;
      
    $(document).ready(function(){
 socket = io("http://localhost:3000");
    socket.emit("partner-server", localStorage.getItem('partnerID'));
    socket.on('partner-server', function(data){
        //debugger;
        alert('Guest is ordering with data :');
    });
    $('#head').text($('#head').text() + ' - ' + localStorage.getItem('partnerID'));




        $.ajax(
        {
            url: url + 'Danhsachkhuyenmaihethong',
            dataType: 'json',
            data: {
            },
            type: 'get',
            success: function (res) {

             for (i=0; i< res.length; i++){ 

                var table = $('#example1').DataTable();
                table.row.add( [
                res[i].MaGiamGia ,
                res[i].GioBD,
                res[i].GioKT,
                // res[i].Icon,
                res[i].PhanTram_GiamGia + " %",
                '<img src="http://localhost:3000/Public/Images/'+res[i].Icon+'" alt="Product Image" class="img-size-50">',
                "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                // + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
                + '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                + "</div>"
                ] ).draw();


                $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].MaGiamGia)
                        $(this).attr('id', res[i]._id );
                    $(this).bind({
                        click : function(e) { 
                            if(hovering == false)
                                loadCuaHang($(this).attr('id'));
                             }, 
                        mouseleave : function(e) {//khi ko hover nữa
                                //xóa bảng CH
                                hovering = false;
                                // $('#tableCuaHang li').remove();
                            }
                        });
                });

            };
            }
        });
    });


    function loadCuaHang(idKhuyenmaihethong){
                hovering = true;
        $.ajax(
        {
            url: url + 'Hienthicuahangduocapdungkhuyenmai',
            dataType: 'json',
            data: {
                idKhuyenmaihethong : idKhuyenmaihethong
            },
            type: 'post',
            success: function (res) {
            $('#tableCuaHang li').remove();
             for (i=0; i< res.length; i++){ 

                $("#tableCuaHang").append('<li class="item"><div class="product-img"><img src="<?php echo base_url()?>/Public/Images/'+ res[i].CuaHang_KMHT.Hinh_Anh_Cua_Hang +'" alt="Product Image" class="img-size-50"></div><div class="product-info"><a href="javascript:void(0)" class="product-title">'+ res[i].CuaHang_KMHT.Ten_Cua_Hang+'<span class="badge badge-danger float-right"><i class="far fa-trash-alt"></i></span></a><span class="product-description">'+res[i].DiaChi_CH[0].Dia_Chi_Nha+'</span></div></li>');
                console.log("add");
            };
            }
        });

    }

    function createFormData(){
        debugger;
        var form = new FormData();
        var file_data = $("#inputGroupFile02").prop('files')[0];
        if(file_data){
            var type = file_data.type;
            var match = ["image/png", "image/jpg", "image/jpeg"];
            if (type == match[0] || type == match[1] || type == match[2]) {
                form.append("upload_file", file_data);
            }
        }
        form.append("makm", $("#makm").val());
        form.append("gio_bd", $("#gio_bd").val());
        form.append("gio_kt", $("#gio_kt").val());
        form.append("PhanTram_GiamGia", $("#PhanTram_GiamGia").val());
        return form;
        
    }

    function themSanPham(){
        var form = createFormData();
        $.ajax({
            url: url + 'Khuyenmaihethong',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form,
            type: 'post',
            success: function (data) {
                if(res.return_code == "1"){
                    var table = $('#example1').DataTable();
                    table.row.add( [
                    res.MaGiamGia,
                    res.GioBD,
                    res.GioKT,
                    res.PhanTram_GiamGia + " %",
                    '<img src="<?php echo base_url()?>/Public/Images/'+ res.Icon + '" alt="Product Image" class="img-size-50">',
                    "<div class='sparkbar' data-color='#00a65a' data-height='20'>" + '<button class="btn" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>' + "</div>"
                    ] ).draw();
                } else if(res.return_code =="0"){
                    alert("Thêm thất bại !");
                }
            }
        });
    }


    function xoa(id_khuyenmai)
    {
        alert("xoa" + id_khuyenmai );
        $.ajax({
            type    : 'DELETE',
            url     : url + 'deleteKhuyenmaihethong',
            data    : {
                idkhuyenMai : id_khuyenmai
            },
            dataType: 'json',
            success: function (res) {
            if(res.return_code == "1")
             {
                var table = $('#example1').DataTable();
                table.row($('#' + id_khuyenmai)).remove().draw();
            }
            }
        });
        
    }
</script>
<script>
// $( "#example1 tr" ).hover(
//   function() {//khi hover vào
//     //lấy id của tr đang hover
//     // alert($(this).attr('id'));
//     alert($(this).attr('id'));
//     //từ id đó , lấy list CH, hiển thị vào table
//   }, 
//   function() {//khi ko hover nữa
//     //xóa bảng CH
//   }
// );
</script>