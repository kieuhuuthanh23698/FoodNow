
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Món ăn</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Chi nhánh</a></li>
                        <li class="breadcrumb-item active">Món ăn</li>
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

                <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm loại món ăn</button>

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm món ăn</button>


                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                   
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã khuyến mãi</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="KM001" disabled="true">
                                  </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Thông tin khuyến mãi</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1">
                                  </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                            <label class="control-label" for="datepicker-start">Start Date</label>
                                                            <input type="text" class="form-control" id="datepicker-start">
                                        </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                <label class="control-label" for="datepicker-end">End Date</label>
                                                                <input type="text" class="form-control" id="datepicker-end">
                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-sm-6">
                                                            <label for="inputEmail4">Mã giảm giá</label>
                                                            <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputPassword4">Phần trăm giảm giá</label>
                                                                <input type="password" class="form-control" id="inputPassword4">
                                    </div>

                                                                <section class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="card card-outline card-info">
                                                                                <div class="card-header">
                                                                                    <label for="inputEmail4">
                                                                                        Ghi chú khuyến mãi
                                                </label>
                                                  </h3>
                                                                                <div class="card-tools">
                                                                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                                                                        title="Collapse">
                                                                                        <i class="fas fa-minus"></i></button>
                                                                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                                                                        title="Remove">
                                                                                        <i class="fas fa-times"></i></button>
                                                                                </div>

                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <textarea class="textarea" placeholder="Place some text here"
                                                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                          </div>

                                        </section>

                                                        </div>
                                 
                                </form>

                                                    <form>
                                                        <div class="form-group">
                                                            <img id="img_upload">
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02" />
                                                                    <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                                                                </div>
                                    
                                </div>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary float-right toastrDefaultSuccess">Lưu</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                    </div>
                                </div>

                            </div>
                            <!-- /.card-header -->
 <div class="row">

                                <section class="col-lg-5 connectedSortable">
                                    <div class="container-fluid">
                                        <div class="card">
                                             <div class="card-header">
                                                    <h3 class="card-title">Danh sách loại món ăn</h3>

                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                    </div>
                                                  </div>

                                            <div class="card-body">
                                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã loại món</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên loại món</th>
                                                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Chi tiết</th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><a href="#">OR9853</a></td>
                                                                        <td><span class="badge badge-success giatien">Hủ Tiếu Nam Vang Thành Đạt</span></td>
                                                                        <td>
                                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                                <a href="#" ><i class="nav-icon fas fa-edit" data-toggle="modal" data-target=".bd-example-modal-lg"></i></a>
                                                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                                        <div class="modal-content">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="#"><i class="far fa-trash-alt" data-toggle="modal" data-target=".bd-example-modal-sm"></i></a>
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
    </section>

                                    <section class="col-lg-7 connectedSortable">
                                        <div class="container-fluid">
                                            <div class="card">
                                                 <div class="card-header">
                                                    <h3 class="card-title">Danh sách món ăn</h3>

                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                    </div>
                                                  </div>

                                                <div class="card-body">
                                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column ascending">Tên món</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending">Giá</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>

                                                                        <tr role="row" class="odd">
                                                                            <td>
                                                                                <ul class="list-inline">
                                                                                    <li class="list-inline-item">
                                                                                        <img alt="BunBoHue" class="img_chinhanh" src="<?php echo base_url();?>dist/img/comchien.png">
                                              </li>
                                          </ul>
                                      </td>
                                                                                <td tabindex="0" class="sorting_1"><a href="#">Cơm chiên dương châu</a></td>
                                                                                <td><span class="badge badge-success giatien">20.000</span></td>

                                                                                <td>
                                                                                    <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                                        <a href="#"><i class="nav-icon fas fa-edit" data-toggle="modal" data-target=".bd-example-modal-lg"></i></a>
                                                                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                <div class="modal-content">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <a href="#"><i class="far fa-trash-alt" data-toggle="modal" data-target=".bd-example-modal-sm"></i></a>
                                                                                        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xóa?</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <span aria-hidden="true">×</span>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                        <button type="button" class="btn btn-primary toastrDefaultSuccess">OK</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </td>
                                   </tbody>

                            </table></div></div>

                                                            </div>
                                                        </div>
                                                    </div>
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