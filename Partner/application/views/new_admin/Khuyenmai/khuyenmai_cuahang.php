
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Khuyến mãi cửa hàng</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>new_admin/dasboard_cuahang">Home</a></li>
                        <li class="breadcrumb-item active">Khuyến mãi cửa hàng</li>
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

                <!-- <button type="button" class="btn btn-success toastrDefaultSuccess">
                    Launch Success Toast
                </button>
 -->

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">

                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <!-- <form> -->
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mã khuyến mãi</label>
                                            <input type="email" class="form-control" id="makm" aria-describedby="emailHelp" placeholder="KM001">
								  </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Thông tin khuyến mãi</label>
                                                <input type="text" class="form-control" id="ttkm">
								  </div>

                                                <div class="row">
                                                        <div class="col-sm-6">
                                                        <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                            <label class="control-label" for="datepicker-start">Hạn sử dụng khuyến mãi</label>
                                                            <input type="date" class="form-control" id="ngay_bd">
										                </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                              <label>Thời gian áp dụng giao hàng</label>

                                                              <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                  <span class="input-group-text">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                  </span>
                                                                </div>
                                                                <input type="text" class="form-control float-right" id="reservation">
                                                              </div>
                                                              <!-- /.input group -->
                                                            </div>
                                                            <!-- /.form group -->
                                                        </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        
                                                            <div class="form-group col-sm-6">
                                                                <label for="inputPassword4">Phần trăm giảm giá</label>
                                                                <input type="number" min="0" max="100" class="form-control" id="PhanTram_GiamGia">
								    </div>

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

                                                                    </div>

									      </div>

									    </section>

                                                        </div>

                                                            <div class="input-group-append">
                                                                <button data-dismiss="modal" onclick="save()" class="btn btn-primary float-right toastrDefaultSuccess">Lưu</button>
                                                            </div>
                                                        </div>
                                                    <!-- </form> -->

                                                </div>
                                            </div>
                                        </div>

                    </div>


                                </div>

                            </div>
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
                            <!-- /.card-header -->

			<div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Danh sách khuyến mãi cửa hàng</h3>
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
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Thông tin khuyến mãi</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Hạn sử dụng</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thời gian giao hàng</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">% Giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mô tả</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
   
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

<script type="text/javascript">
    $(document).ready(function(){
       loadKhuyenMaiCuaHang();
    });


function setIdDelete(idDelete) {
        $('#idDelete').val(idDelete);
    }


    function loadKhuyenMaiCuaHang(){
         $.ajax(
        {
            url: url + "KhuyenMaiCuaHang",
            dataType: 'json',
            data: {
                idCuahang: <?php echo "'".$id."'";?>,
            },
            type: 'post',
            success: function (res) {
                if(res == null) {
                    toastr.error("Lấy danh sách khuyến mãi cửa hàng thất bại !");
                    return;
                }
                if(res.return_code == '1'){
                    toastr.success("Lấy danh sách khuyến mãi cửa hàng thành công !");
                    var table = $('#example1').DataTable();
                    table.clear().draw();
                    debugger;
                    for (i=0; i< res.infor.length; i++){ 
                        var item = res.infor[i];
                        table.row.add( [
                        item.MaGiamGia,
                        item.ThongTin_KMCH,
                        item.HanSuDung,
                        item.ThoiGianGiaoHang,
                        item.PhanTram_GiamGia + " %",
                        item.MoTa,
                        "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                        + '<button class="btn btn-danger" onclick="setIdDelete(' + "'" + item._id + "'" + ')" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-trash-alt"></i></button>'
                        + "</div>"
                        ] ).node().id = item._id;
                        table.draw(false);

                    };
                } else if(res.return_code == '0'){
                    toastr.error("Lấy danh sách khuyến mãi cửa hàng thất bại !");
                }
            }
        });
    }



     function themSanPham(){
        $.ajax(
        {
            url: url + 'addKhuyenmaicuahang',
            dataType: 'json',
            data: {
                idcuahang : <?php echo "'".$id."'";?>,
                maGiamgia : $("#makm").val(),
                thongtinKhuyenmai : $("#ttkm").val(),
                hanSD : $("#ngay_bd").val(),
                thoiGianGH : $("#reservation").val(),
                phanTramgiamgia :$("#PhanTram_GiamGia").val(),
                MoTa : $("#mota_km").val()
            },
            type: 'post',
            success: function (res) {
             if(res.return_code == "1")
             {
                     var table = $('#example1').DataTable();
                     var item = res.infor;
                    table.row.add( [
                    item.MaGiamGia,
                    item.ThongTin_KMCH,
                    item.HanSuDung,
                    item.ThoiGianGiaoHang,
                    item.PhanTram_GiamGia,
                    item.MoTa,
                    "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                        + '<button class="btn  btn-danger" onclick="xoa(' + "'" + item._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                        + "</div>"
                    ] ).node().id = item._id;
                        table.draw(false);
                        toastr.success("Khuyến mãi đã thêm thành công!");
        }
        else if(res.return_code =="0"){
                alert("Thêm thất bại!");
            }
        }
        });
    }


    function xoa(id_khuyenmai)
    {
        var id_khuyenmai = $('#idDelete').val();
        // alert("xoa" + id_khuyenmai );
        $.ajax({
            type    : 'DELETE',
            url     : url + 'deleteKhuyenmaicuahang',
            data    : {
                idkhuyenMai : id_khuyenmai,
                idCuahang : <?php echo "'".$id."'";?>
            },
            dataType: 'json',
            success: function (res) {
                if(res.return_code == "1"){
        
        var table = $('#example1').DataTable();
        table.row($('#' + id_khuyenmai)).remove().draw();
    }
            }
        });
    }


    function checkTT_CoBan(){
    var result = true;
    if($.trim($("#makm").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền mã khuyến mãi !");
    }
    if($.trim($("#ttkm").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền thông tin khuyến mãi !");
    }
    if($.trim($("#ngay_bd").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền ngày bắt đầu !");
    }
    if($.trim($("#reservation").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền ngày kết thúc !");
    }
    if($.trim($("#PhanTram_GiamGia").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền phần trăm giảm giá !");
    }
    if($.trim($("#mota_km").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền mô tả khuyến mãi !");
    }
    return result;
  }

  function save(){
    if(checkTT_CoBan()){
      themSanPham();
    }

  }

</script>
<script type="text/javascript">
</script>

<script type="text/javascript">
    $('#reservation').daterangepicker();
</script>