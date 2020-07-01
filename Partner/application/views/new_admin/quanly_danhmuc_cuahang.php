
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
                                <div class="form-group">
                                <label>Tên chi nhánh sẽ hiển thị theo cái chi nhánh ở bên ngoài chọn, nếu vào đây thay đổi thì bên ngoài cũng thay đổi theo</label>
                                <select class="form-control">
                                  <option>CN 1</option>
                                  <option>Món 2</option>
                                  <option>Món 3</option>
                                  <option>Món 4</option>
                                  <option>Món 5</option>
                                </select>
                              </div>

<label>Thêm cửa hàng</label>
<div class="card">
<div class="card-body">
           

                                                    <div class="row">
                                                               

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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin cửa hàng</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Lựa chọn</th>
                                    </tr>
   
                                </thead>
                                <tbody>
                                     <tr>
                                        <td>
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                             <li class="item" style="background-color: transparent;">
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
                                            <a href="<?php echo base_url();?>Quanly_danhmuc/homeDanhmuc_dangkycuahang"><button  type="button" class="btn  btn-info" onclick="">Tạo cửa hàng</button></a>
                                      </td>
                                    </tr>
                                </tbody>

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


