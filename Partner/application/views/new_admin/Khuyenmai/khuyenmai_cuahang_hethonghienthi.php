
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Khuyến mãi hệ thống</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>new_admin/dasboard_cuahang">Home</a></li>
                        <li class="breadcrumb-item active">Khuyến mãi hệ thống</li>
                    </ol>
                </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Danh sách khuyến mãi hệ thống áp dụng</h3>
                                    </div>
                                    <!-- /.card-header -->
                <div class="card-body">
                                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                        <thead>
                                                            <tr role="row">
                                                               <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hạn Sử Dụng</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thời gian áp dụng GH</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">% Giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hình ảnh</th>
                                                                </tr>
   
                                </thead>
                                                            <tbody id="tablelist">

                                                            </tbody>

                            </table>
                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
            </div>

                                    <!-- DIRECT CHAT -->

              <!-- /.card-footer-->
            </div>


                                <!-- /.card-footer -->
            </div>

           
    </section >
                        < !-- /.content -->

  </div >

                    < !--Control Sidebar-- >
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

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script type="text/javascript"> 
      
    $(document).ready(function(){
      loadDanhSachKhuyenMai();
    });

    function loadDanhSachKhuyenMai(){
            $.ajax({
            url: url + 'getKMHeThongCuaCuaHang',
            dataType: 'json',
            data: {
                idCuaHang : <?php echo "'".$id."'";?>
            },
            type: 'post',
            success: function (res) {
                if(res.return_code == "1"){
                var listKM = res.infor;
                var table = $('#example1').DataTable();
                for (i=0; i< listKM.length; i++){ 
                    table.row.add( [
                    listKM[i].MaGiamGia ,
                    listKM[i].HanSuDung,
                    listKM[i].ThoiGianGiaoHang,
                    listKM[i].PhanTram_GiamGia + " %",
                    '<img src="' + url + 'Public/Images/' + listKM[i].Icon + '" alt="Product Image" class="img-size-50">',
                    ] ).draw();
                    };
                    toastr.success('Load khuyến mãi hệ thống dành cho cửa hàng thành công .');
                }
            }
        });
    }


// <script type="text/javascript">
  // $('.toastrDefaultSuccess').click(function() {
      // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    // });
</script>

