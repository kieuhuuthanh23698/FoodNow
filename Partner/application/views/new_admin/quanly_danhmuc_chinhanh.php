
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
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column descending" aria-sort="ascending">Tên chi nhánh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Số lượng CH</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Hình ảnh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                                                        </tr>
                                </thead>
                                <tbody>

                                                                       <tr>
                                                <td><a href="#">OR9853</a></td>
                                                <td>1</td>
                                                <td>
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <img alt="BunBoHue" class="img_chinhanh"
                                                                src="<?php echo base_url();?>dist/img/mixaobo.jpg">
                                                        </li>
                                                    </ul>
                                                </td>

                                                <td>
                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                         <button  type="button" class="btn  btn-info" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i></button>
                                                         <button class="btn btn-danger btn_xoa"><i class="fas fa-trash-alt" data-toggle="modal"
                                                                data-target=".bd-example-modal-sm"></i></button>

                                                    </div>
</td></tr>

                                </tbody>

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
                                                    <h3 class="card-title">Danh sách loại món ăn</h3>

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
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên loại món</th>
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Số lượng món</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Chi tiết</th>
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

