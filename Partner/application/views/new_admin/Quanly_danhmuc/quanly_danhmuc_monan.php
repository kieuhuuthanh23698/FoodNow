
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
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
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

            <div class="card-header" style="padding-bottom: 0px">

            <div class="row">
                    <div class="col-sm-6">
                     <div class="form-group">
                        <select class="form-control">
                          <option>Chọn chi nhánh này thì những cửa hàng thuộc CN sẽ hiển thị bên cạnh</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="form-group">
                        <select class="form-control">
                          <option>Chọn cửa hàng thì danh sách loại món ăn sẽ hiển thị</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                    </div>

            </div>
              

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



            <label>Cấp tài khoản cửa hàng</label>
            <div class="card">
                 <div class="card-body">
                    <div class="form-group">
                                
                    <div class="form-group">
                                            <label for="exampleInputEmail1">Tên đăng nhập</label>
                                            <input type="email" class="form-control" id="tenDN" aria-describedby="emailHelp">
                                            <label for="exampleInputEmail1">Mật khẩu</label>
                                            <input type="email" class="form-control" id="matkhau" aria-describedby="emailHelp">
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

        </div>
                            <!-- /.card-header -->
 <div class="row">

        <section class="col-lg-5 connectedSortable">
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
                                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
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

    <section class="col-lg-7 connectedSortable">
                                            <div class="card">
                                                 <div class="card-header">
                                                    <h3 class="card-title">Danh sách món ăn</h3>

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
                                                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column ascending">Tên món</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending">Giá</th>
                                                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                                                        </tr>

                                                                    </thead>
                                                                    <tbody>
                                   </tbody>

                            </table></div></div>

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

