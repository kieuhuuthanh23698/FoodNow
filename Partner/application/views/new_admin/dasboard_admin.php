<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Chi nhánh</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-sm-4" >
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số chi nhánh</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-sm-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop-house"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số cửa hàng</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-sm-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop-house"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số cửa hàng đăng nhập hệ thống</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách các cửa hàng</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <!-- <div class="row"><div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên cửa hàng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Địa chỉ</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hình ảnh</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thông tin</th>
                    <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9853</a></td>
                      <td>1</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    </tbody>
                 
                </table>
              </div>
            </div>
           
                          </div>
              </div>
              <!-- /.card-body -->
            </div>


          </section>
<section class="col-lg-5 connectedSortable ui-sortable">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

          <!-- <div class="col-md-12"> -->
            <!-- About Me Box -->
            <!-- <div class="card card-primary"> -->
               <div class="card-body box-profile">
                <div class="card-header">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url();?>dist/img/BunBoHue.jpg"
                       alt="User profile picture">

                  <h3 class="profile-username">Bún Bò</h3>

                  <p class="text-muted">Số 6, Phan Đình Giót </p>
                </div>

               
              </div>
                <div class="text-center">


              </div>

              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Tên cửa hàng</strong>

                <p class="text-muted">
                  Bún Bò
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Địa chỉ cửa hàng</strong>

                <p class="text-muted">Số 6, Phan Đình Giót, P.2, Q.Tân Bình</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Thời gian bắt đầu</strong>

                <p class="text-muted">14h</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Thời gian kết thúc</strong>

                <p class="text-muted">16h</p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Số điện thoại</strong>

                <p class="text-muted">0909557788</p>
              </div>
              <!-- /.card-body -->
            <!-- </div> -->
            <!-- /.card -->
          <!-- </div> -->

                  </div>


                  <div class="tab-pane" id="settings">
                     <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Tên tài khoản</strong>

                    <p class="text-muted">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Mật khẩu</strong>

                    <p class="text-muted">Malibu, California</p>
                </div>

                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->


          </section>


          </div>

           

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
  <style type="text/css">
    .img-circle{
      width: 25%;
      height: auto;
    }
  </style>