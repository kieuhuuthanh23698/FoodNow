
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
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
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
<label id="idKhuyenmaihethong" style="display: none;"></label>
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
                                   
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    

                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-primary" data-dismiss="modal" >Lưu</button>
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
                            <div class="modal-header">
                              <h4 class="modal-title">Thêm khuyến mãi hệ thống</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
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

                                 
                                                        </div>
                                                    <!-- </form> -->
                                <div class="modal-footer justify-content-between">
                                  
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary float-right toastrDefaultSuccess" data-dismiss="modal" onclick="save()">Lưu</button>
                                                            </div>
                                </div>

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
            <h3 class="card-title"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm khuyến mãi</button></h3>
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
                                                            <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin chi nhánh</th>
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

var listKM = [];
var click = false;
var socket;
      
    $(document).ready(function(){
        loadKhuyenmaiHT();
 // socket = io("http://localhost:3000");
 //    socket.emit("partner-server", localStorage.getItem('partnerID'));
 //    socket.on('partner-server', function(data){
 //        //debugger;
 //        alert('Guest is ordering with data :');
 //    });
 //    $('#head').text($('#head').text() + ' - ' + localStorage.getItem('partnerID'));
});

    function loadKhuyenmaiHT(){

        $.ajax(
        {
            url: url + 'Danhsachkhuyenmaihethong',
            dataType: 'json',
            data: {
            },
            type: 'get',
            success: function (res) {
             var table = $('#example1').DataTable();
             table.clear().draw();
             for (i=0; i< res.length; i++){ 
                table.row.add( [
                res[i].MaGiamGia ,
                res[i].GioBD,
                res[i].GioKT,
                // res[i].Icon,
                res[i].PhanTram_GiamGia + " %",
                '<img src="' + url + 'Public/Images/'+res[i].Icon+'" alt="Product Image" class="img-size-50">',
                "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
                // + "<a href='#'><i class='nav-icon fas fa-edit'></i></a>"
                + '<button class="btn btn-info btn_xoa" data-toggle="modal" data-target="#modal-lg" onclick="loadListCN_Thuoc_KM('+ "'" + res[i]._id + "'" + ')""><i class="fas fa-plus"></i></button>'
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
    }


     function loadCuaHang(idKMHT){
         hovering = true;
        $.ajax({
            url: url + "Hienthichinhanh_thuockhuyenmai",
            dataType: 'json',
            data: {
                idKhuyenmaihethong : idKMHT
            },
            type: 'post',
            success: function (res) {
            if(res.return_code == "1"){
              // $("#idDanhmucCHTC").text(idDanhmucCHTC);
              listKM = res.infor;
              var table = $('#example3').DataTable();
              table.clear().draw();
                for (i=0; i< listKM.length; i++){ 
                    var item = listKM[i].Chinhanh_KMHT;//1 loại món ăn
                    if(item == null  || item.DanhSach_CH.length == 0)
                        continue;
                    table.row.add( [
                    '<ul class="products-list product-list-in-card pl-2 pr-2"><li style="background-color: transparent;" class="item"><div class="product-img"><img src="' + url + 'Public/Images/' + item.Hinh_Anh_Chi_Nhanh + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="#" class="product-title">' + item.Ten_Chi_Nhanh + '</a></div></li></ul>'
                    ] ).draw();
                  }//for
            }//if
            }//succcess
    });//ajax
}

    function createFormData(){
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
            url: url + 'addKhuyenmaihethong',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form,
            type: 'post',
            success: function (res) {
                if(res.return_code == "1"){
                    loadKhuyenmaiHT();      
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

<script type="text/javascript">

  function loadListCN_Thuoc_KM(idKhuyenmaihethong){
    $.ajax({
            url: url + "getDanhSachChiNhanhKMHT",
            dataType: 'json',
            data: {
                idKhuyenmaihethong : idKhuyenmaihethong
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
              $("#idKhuyenmaihethong").text(idKhuyenmaihethong);
              var list = res.infor;
              var table = $('#example2').DataTable();
              table.clear().draw();
              console.log(res);
              for (i=0; i< list.length; i++){
                var item = list[i];
                if(item == null || item.CN.DanhSach_CH.length == 0)
                  continue;
                var infor_ch = item.CN;
                var check = item.isInclude;
                table.row.add([
                  '<ul class="products-list product-list-in-card pl-2 pr-2"><li style="background-color: transparent;" class="item"><div class="product-img"><img src="' + url + 'Public/Images/' + infor_ch.Hinh_Anh_Chi_Nhanh + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="#" class="product-title">' + infor_ch.Ten_Chi_Nhanh + '</a></div></li></ul>',
                  '<div class="icheck-primary d-inline"><input onclick="check(' + "'" + infor_ch._id + "'" + ')" type="checkbox" id="cb' + infor_ch._id + '"' + (check == "1" ? "checked" : "") + '><label for="cb' + infor_ch._id + '" id="label' + infor_ch._id + '">' + (check == "1" ? "checked" : "") + '</label></div>'
                ]).draw();
              };
            }
            }
    });
  }
</script>

<!-- CHECK, UNCHECK CÁC CHI NHÁNH TRONG 1 DANH MỤC -->
<script type="text/javascript">
  $('input[type="checkbox"]').change(function() {
    if ($(this).is(':checked')) {
      toastr.success("Check " + $(this).attr('id'));
    }
  });

  function themXoaCuaHang_DanhMuc(idCuaHang, state){
    $.ajax({
            url: url + "themXoaChiNhanh_DanhMuc_KhuyenMaiHeThong",
            dataType: 'json',
            data: {
                idDanhMuc : $("#idKhuyenmaihethong").text(),
                idCuaHang : idCuaHang,
                state : state
            },
            type: 'post',
            success: function (res) {
              if (res.return_code == "1"){
                if (state == "1") {
                  toastr.success("Thêm chi nhánh vào danh mục khuyến mãi hệ thống thành công.");
                  $("#label" + idCuaHang).text("checked");
                } else if (state == "0") {
                  toastr.success("Xóa chi nhánh khỏi danh mục khuyến mãi hệ thống thành công.");
                  $("#label" + idCuaHang).text("");
                }
              } else if (res.return_code == "0"){
                toastr.error("Quá trình thực hiện thất bại !");
                if (state == 1) {
                  $("#cb" + idCuaHang).attr("checked", false);
                } else if (state == "0") {
                  $("#cb" + idCuaHang).attr("checked", true);
                }
              }
            }
    });
  }

  function check(idCuaHang){
    if ($("#cb" + idCuaHang).is(':checked')) {
      themXoaCuaHang_DanhMuc(idCuaHang, "1");
    } else{
      themXoaCuaHang_DanhMuc(idCuaHang, "0");
    }
  }


  function checkTT_CoBan(){
    var result = true;
    if($.trim($("#makm").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền mã khuyến mãi !");
    }
    if($.trim($("#gio_bd").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền giờ bắt đầu !");
    }
    if($.trim($("#gio_kt").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền giờ kết thúc !");
    }
    if($.trim($("#PhanTram_GiamGia").val()) == ""){
      result =  false;
      toastr.error("Bạn chưa điền phần trăm giảm giá !");
    }
    return result;
  }

  function save(){
    if(checkTT_CoBan()){
      themSanPham();
    }

  }
</script>

