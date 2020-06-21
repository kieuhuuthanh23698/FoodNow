
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
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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

            <div class="card-header">

                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                Thêm chi nhánh
                </button>

                <!-- Thêm loại món ăn -->
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


        </div>

        </div>
                            <!-- /.card-header -->
 <div class="row">

                                <section class="col-lg-5 connectedSortable">
                                            <div class="card">
                                                 <div class="card-header">
                                                    <h3 class="card-title">Danh sách chi nhánh</h3>

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
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column descending" aria-sort="ascending">Tên chi nhánh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Số lượng CH</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=">Hình ảnh: activate to sort column ascending">Hình ảnh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                   </tbody>

                            </table></div></div>

                                                            </div>
                                                        </div>
                                                    </div>
                                        
    </section>

                                    <section class="col-lg-7 connectedSortable">
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Danh sách các cửa hàng thuộc chi nhánh</h3>

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
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo base_url();?>dist/img/BunBoHue.jpg" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu
                        <span class="badge badge-danger float-right"><i class="fas fa-edit"></i></span>
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
                  </li>

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

 <script type="text/javascript">
    var listMonAn = [];
    var click = false;
    $(document).ready(function(){

        $.ajax(
        {

            url: url + "Danhsachmonan_cuahang",
            dataType: 'json',
            data: {
                idcuahang: <?php echo "'".$id."'";?>,
            },
            type: 'post',
            success: function (res) {
            if(res.return_code == "1"){
                listMonAn = res.infor;
                 for (i=0; i< listMonAn.length; i++){ 
                    var item = listMonAn[i];//1 loại món ăn
                    var table = $('#example1').DataTable();
                    table.row.add( [
                    item.DS_LoaiMA.Ten_loai_mon_an ,
                    item.DS_LoaiMA.Danh_sach_mon_an.length ,
                    '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + item.DS_LoaiMA._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                    + "</div>"
                    ] ).draw();

                    $('#example1 tbody tr').each(function(){
                        if($(this).find('td:nth-child(1)').text() == item.DS_LoaiMA.Ten_loai_mon_an)
                            $(this).attr('id', item.DS_LoaiMA._id );
                        $(this).bind({
                            click : function(e) { 
                                    if(!click)
                                        loadMonan_LoaiMonAn($(this).attr('id'));
                                 },
                            mouseleave : function(e) {
                                     click = false;
                                }
                            });
                    });
                }
            }
            }
        });

    });

    function loadMonan_LoaiMonAn(idLoaiMonAn){
        click = true;
         for (i=0; i< listMonAn.length; i++){
            var item = listMonAn[i];//1 loại món ăn
            if(item.DS_LoaiMA._id == idLoaiMonAn){
                var table = $('#example2').DataTable();
                table.clear().draw();
                for (var j = 0; j < item.DS_Monan.length; j++) {
                    var monan = item.DS_Monan[j];
                    table.row.add( [
                    '<img src="' + url + 'Public/Images/'+ monan.Hinh_anh_mon_an+'" alt="Product Image" class="img-size-50">',
                    monan.Ten_mon_an ,
                    "" + (new Intl.NumberFormat().format(monan.Don_gia_mon_an)),
                    '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + monan._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
                    + "</div>"
                    ] ).draw();
                }
            }
        }
    }
</script>

