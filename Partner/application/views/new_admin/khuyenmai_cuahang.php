
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>new_admin/dasboard_cuahang">Trang chủ</a></li>
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
                                                            <label class="control-label" for="datepicker-start">Start Date</label>
                                                            <input type="text" class="form-control" id="ngay_bd">
										</div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                                                <label class="control-label" for="datepicker-end">End Date</label>
                                                                <input type="text" class="form-control" id="ngay_kt">
										</div>
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

                                                                    </div>

									      </div>

									    </section>

                                                        </div>
								 
								<!-- </form> -->

                                                    <!-- <form> -->
                                                       <!--  <div class="form-group">
                                                            <img id="img_upload">
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02" />
                                                                    <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                                                                </div>
						            
						        </div> -->
                                                            <div class="input-group-append">
                                                                <button data-dismiss="modal" onclick="themSanPham()" class="btn btn-primary float-right toastrDefaultSuccess">Lưu</button>
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
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ngày BĐ</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày KT</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">% Giảm giá</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mô tả</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
                                                                <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th> -->
   
                                </thead>
                                                            <tbody id="tablelist">
                                                                <!-- <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 25% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K </span></td>
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
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit" ></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#">OR9853</a></td>
                                                                    <td>Giảm 20% cho đơn hàng đầu tiên</td>
                                                                    <td>26/05/2020</td>
                                                                    <td>26/07/2020</td>
                                                                    <td>14h</td>
                                                                    <td>16h</td>
                                                                    <td>20%</td>
                                                                    <td><span class="badge badge-success giatien">Giảm các món từ 50K</span></td>
                                                                    <td>
                                                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                                                            <a href="#"><i class="nav-icon fas fa-edit"></i></a>
                                                                            <a href="#"><i class="far fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr> -->
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
        $.ajax(
        {
            url: url + "KhuyenMaiCuaHang",
            dataType: 'json',
            data: {
                idCuahang: <?php echo "'".$id."'";?>,
            },
            type: 'post',
            success: function (res) {
             // console.log(res);
             // var test = "";
             for (i=0; i< res.length; i++){ 
                // alert(res[i].ThongTin_KMCH);
                // test=test+"<tr>"
                //             + "<td scope=\"row\">" + res[i].MaGiamGia + "</td>"
                //             + "<td>" + res[i].ThongTin_KMCH + "</td>"
                //             + "<td>" + res[i].NgayBD + "</td>"
                //             + "<td>" + res[i].NgayKT + "</td>"
                //             + "<td>" + "" + "</td>"
                //             + "<td>" + "" + "</td>"
                //             + "<td>" + res[i].PhanTram_GiamGia + " %" + "</td>"
                //             + "<td>" + res[i].MoTa  + "</td>"
                //             + "<td> <div class='sparkbar' data-color='#00a65a' data-height='20'>"
                // + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
                // + "<a href='#'><i class='far fa-trash-alt'></i></a>"
                // + "</div> </td></tr>"
                var table = $('#example1').DataTable();
                table.row.add( [
                res[i].MaGiamGia,
                res[i].ThongTin_KMCH,
                res[i].NgayBD,
                res[i].NgayKT,
                res[i].PhanTram_GiamGia + " %",
                res[i].MoTa,
                "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                // + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
                + '<button class="btn btn-danger" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                + "</div>"
                ] ).draw();


                $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].MaGiamGia)
                        $(this).attr('id', res[i]._id );
                });

            };
        
            // document.getElementById("tablelist").innerHTML=test;
            }
        });
    });



     function themSanPham(){



        $.ajax(
        {
            url: url + 'addKhuyenmaicuahang',
            dataType: 'json',
            data: {
                maGiamgia : $("#makm").val(),
                thongtinKhuyenmai : $("#ttkm").val(),
                ngayBatdau : $("#ngay_bd").val(),
                ngayKetthuc : $("#ngay_kt").val(),
                phanTramgiamgia :$("#PhanTram_GiamGia").val(),
                MoTa : $("#mota_km").val()
            },
            type: 'post',
            success: function (res) {
             if(res.return_code == "1")
             {
             var table = $('#example1').DataTable();
            table.row.add( [
            $("#makm").val(),
            $("#ttkm").val(),
            $("#ngay_bd").val(),
            $("#ngay_kt").val(),
            $("#PhanTram_GiamGia").val(),
            $("#mota_km").val(),
            // "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
            // + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
            // + "<a href='#'><i class='far fa-trash-alt'></i></a>"
            // + "</div>"
            "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
                + '<button class="btn" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                + "</div>"
            ] ).draw();
        }
        else if(res.return_code =="0"){
                alert("Thêm thất bại!");
            }
        }
        });
    }


    function xoa(id_khuyenmai)
    {
//         jQuery.alerts.okButton = 'Yes';
// jQuery.alerts.cancelButton = 'No';                  
// jConfirm('Are you sure??',  '', function(r) {
//     if (r == true) {                    
//         //Ok button pressed...
//           alert("xoa" + id_khuyenmai );
//     }  
// });
    //   dialog = $( "#dialog-form" ).dialog({
    //   autoOpen: false,
    //   height: 400,
    //   width: 350,
    //   modal: true,
    //   buttons: {
    //     "Create an account": addUser,
    //     Cancel: function() {
    //       dialog.dialog( "close" );
    //     }
    //   },
    //   close: function() {
    //     form[ 0 ].reset();
    //     allFields.removeClass( "ui-state-error" );
    //   }
    // });
    //    dialog.dialog( "open" );
        //debugger;
        alert("xoa" + id_khuyenmai );
        $("#" + id_sanpham).remove();
        $.ajax({
            type    : 'DELETE',
            url     : url + 'deleteKhuyenmaicuahang',
            data    : {
                idkhuyenMai : id_khuyenmai,
                idCuahang : localStorage.getItem('partnerID')
            },
            dataType: 'json'
        });
        
        var table = $('#example1').DataTable();
        table.row($('#' + id_khuyenmai)).remove().draw();
    }

</script>
<script type="text/javascript">
  $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>

