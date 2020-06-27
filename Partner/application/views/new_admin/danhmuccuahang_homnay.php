
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Cửa hàng hôm nay</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
                        <li class="breadcrumb-item active">Cửa hàng hôm nay</li>
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

<!-- Thêm danh mục hôm nay modal -->
 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                            <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Thông tin chính</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Món ngon mỗi ngày" id="thongtin_chinh">

                                            <label for="exampleInputEmail1">Thông tin phụ</label>
                                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Món ngon mỗi ngày" id="thongtin_phu">
                                  </div>

                                 
                                </form>

                                                    <form>
                                                      <label for="exampleInputEmail1">Hình ảnh</label>
                                                       <div class="form-group">

                                                            <img id="img_upload">
                                                                <div class="custom-file">

                                                                    <input type="file" class="custom-file-input" id="inputGroupFile02" />
                                                                    <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
                                                                </div>
                        
                    </div>
                                                    </form>
                                                    
                                              </div>
                                              <div class="modal-footer justify-content-between">
                      <button class="btn btn-primary float-right toastrDefaultSuccess" data-dismiss="modal" onclick="themSanPham()">Lưu</button>
                    </div>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                      <!-- Thêm danh mục hôm nay modal -->

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
                              <h4 class="modal-title">Danh sách cửa hàng cần hiển thị lên cửa hàng hôm nay</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <label id="idDanhmucCHHN" style="display: none;"></label>
                                <label>Chọn cửa hàng hiển thị</label>
                            <div class="card">
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                     <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Danh sách cửa hàng</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Lựa chọn</th>
                                    </tr>
   
                                </thead>
                                <tbody>
                                    <!-- <tr>
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
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="checkboxPrimary1" checked>
                                                <label for="checkboxPrimary1">
                                                </label>
                                            </div>
                                      </td>
                                    </tr> -->

                                </tbody>

                            </table>
                        </div>
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


<!-- Thêm cửa hàng vào danh mục trang chủ -->
            

        </div>
                            <!-- /.card-header -->
 <div class="row">
 <section class="col-lg-6 connectedSortable">
        <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button type="button" onclick="initModalDMCH()" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm danh mục cửa hàng hôm nay</button></h3>



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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin chính</th>
                                     <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin phụ</th>
                                      <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Hình ảnh</th>
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
                                                            <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
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

<script type="text/javascript">
    var listDMTC = [];
    var click = false;
    $(document).ready(function(){
      loadDMCHTC();
    });


    function setIdDelete(idDelete) {
        $('#idDelete').val(idDelete);
    }

     function loadDMCHTC(){
        $.ajax(
        {
            url:  url + "Danhsachcuahanghomnayhienthi",
            dataType: 'json',
            data: {
            },
            type: 'get',
            success: function (res) {
                 var table = $('#example1').DataTable();
                 table.clear().draw();
             for (i=0; i< res.length; i++){ 
                table.row.add( [
                res[i].Thongtin_Chinh ,
                res[i].Thongtin_Phu ,
                '<img src="' + url + 'Public/Images/'+ res[i].HinhAnh_CH+'" alt="Product Image" class="img_chinhanh">',
                "<div class='sparkbar' data-color='#00a65a' data-height='20'>" 
                + '<button class="btn btn-info btn_xoa" data-toggle="modal" data-target="#modal-lg" onclick="loadListCH_Thuoc_DM('+ "'" + res[i]._id + "'" + ')""><i class="fas fa-plus"></i></button>'
                + '<button class="btn btn-danger btn_xoa"  onclick="setIdDelete(' + "'" + res[i]._id + "'" + ')" data-toggle="modal" data-target=".bd-example-modal-sm" ><i class="fas fa-trash-alt"></i></button>'
                + "</div>"
                ] ).draw();
// onclick="xoa(' + "'" + res[i]._id + "'" + ')" 
                $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].Thongtin_Chinh)
                        $(this).attr('id', res[i]._id );
                });

                $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].Thongtin_Chinh)
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

            };            // document.getElementById("tablelist").innerHTML=test;
            }
    });
}


    function loadCuaHang(idDanhmuccuahanghomnay){
        hovering = true;
        $.ajax(
        {
            url: url + "Danhsachcuahanghomnay_hienthicuahang",
            dataType: 'json',
            data: {
                idDanhsachcuahanghomnay : idDanhmuccuahanghomnay
            },
            type: 'post',
            success: function (res) {
            $('#tableCuaHang li').remove();
             for (i=0; i< res.length; i++){ 

                $("#tableCuaHang").append('<li id="'+ res[i].CuaHang_HomNay._id +'" class="item"><div class="product-img"><img src="http://localhost:3000/Public/Images/'+ res[i].CuaHang_HomNay.Hinh_Anh_Cua_Hang +'" alt="Product Image" class="img-size-50"></div><div class="product-info"><a href="javascript:void(0)" class="product-title">'+ res[i].CuaHang_HomNay.Ten_Cua_Hang+'<span class="badge badge-danger float-right"><button class="btn btn-danger btn_xoa_bangCH" onclick="xoa_cuahangtrongdanhmuc(' + "'" + res[i].CuaHang_HomNay._id + "'"  + ',' + "'"  + idDanhmuccuahanghomnay + "'" + ')" ><i class="fas fa-trash-alt"></i></button></span></a><span class="product-description">'+res[i].DiaChi_CH[0].Dia_Chi+'</span></div></li>');
                console.log("add");

            };
        
            // document.getElementById("tablelist").innerHTML=test;
            }
        });

    }


     function initModalDMCH(){
        $('#thongtin_chinh').val("");
        $('#thongtin_phu').val("");
        var e = document.getElementById('inputGroupFile02');
        e.target = null;
        var img = document.getElementById('img_upload');
        img.height = "0";
        document.getElementById("Chonfile").innerHTML= "";
    }

    
    function themSanPham(){
        var form = createFormDataDMCHTC();
        $.ajax(
        {
            url: url + "addDanhsachcuahanghomnay",
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: 
              form
                // Thongtin_Chinh : $("#thongtin_chinh").val(),
                // Thongtin_Phu : $("#thongtin_phu").val(),
                // HinhAnh_CH :  $("#inputGroupFile02").val()
            ,
            type: 'post',
            success: function (res) {
             if(res.return_code == "1")
             {
            //  var table = $('#example1').DataTable();
            // table.row.add( [
            // $("#thongtin_chinh").val(),
            // $("#thongtin_chinh").val(),
            // $("#inputGroupFile02").val(),
            // '<button class="btn" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
            // ] ).draw();
            loadDMCHTC();
        }
        else if(res.return_code =="0"){
                alert("Thêm thất bại!");
            }
        }
        });
    }

    function createFormDataDMCHTC(){
        var form = new FormData();
        var file_data = $("#inputGroupFile02").prop('files')[0];
        if(file_data){
            var type = file_data.type;
            var match = ["image/png", "image/jpg", "image/jpeg"];
            if (type == match[0] || type == match[1] || type == match[2]) {
                form.append("upload_file", file_data);
            }
        }
        form.append("Thongtin_Chinh", $("#thongtin_chinh").val());
        form.append("Thongtin_Phu", $("#thongtin_phu").val());
        return form;
    }

    
     function xoa()
    {
        var id_cuahanghomnay = $('#idDelete').val();
        $.ajax({
            type    : 'delete',
            url     : url +'deleteDanhmuccuahanghomnay',
            data    : {
                idDanhmuccuahanghomnay : id_cuahanghomnay
            },
            dataType: 'json',
            success: function (res) {
            if(res.return_code == "1")
             {
                var table = $('#example1').DataTable();
                table.row($('#' + id_cuahanghomnay)).remove().draw();
              alert("Xóa thành công !");
            } else{
              alert("Xóa thât bại !");
            }
            }
        });
        
    }



    

    // function themSanPham(){
    //     var form = createFormDataDMCHTC();
    //     $.ajax(
    //     {
    //         url: url + "addDanhsachcuahanghomnay",
    //         dataType: 'json',
    //         cache: false,
    //         contentType: false,
    //         processData: false,
    //         data: form,
    //         type: 'post',
    //         success: function (res) {
    //         if(res.return_code == "1"){
    //             loadDMCHTC();
    //         } else if(res.return_code == "0"){
    //             alert("Thêm thất bại !");
    //         }
    //         }
    //     });
    // }


     function xoa_cuahangtrongdanhmuc(id_cuahang, idDanhmuccuahanghomnay)
    {
        alert("xoa" + id_cuahang + idDanhmuccuahanghomnay );
        $.ajax({
            type    : 'delete',
            url     :  url + "deleteCuahangtrongdanhmuchomnay",
            data    : {
                idcuahang : id_cuahang,
                idDanhmuccuahanghomnay : idDanhmuccuahanghomnay
            },
            dataType: 'json',
            success: function (res) {
            if(res.return_code == "1")
             {
                $('#' + id_cuahang).remove();
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

  function loadListCH_Thuoc_DM(idDanhmucCHHN){
    $.ajax({
            url: url + "getDanhSachCuaDanhMucHomNay",
            dataType: 'json',
            data: {
                idDanhMuc : idDanhmucCHHN
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
              $("#idDanhmucCHHN").text(idDanhmucCHHN);
              var list = res.infor;
              var table = $('#example2').DataTable();
              table.clear().draw();
              console.log(res);
              for (i=0; i< list.length; i++){
                var item = list[i];
                if(item == null)
                  continue;
                var infor_ch = item.CH;
                var check = item.isInclude;
                var address = item.DiaChi.Dia_Chi;
                table.row.add([
                  '<ul class="products-list product-list-in-card pl-2 pr-2"><li style="background-color: transparent;" class="item"><div class="product-img"><img src="<?php echo base_url();?>dist/img/' + infor_ch.Hinh_Anh_Cua_Hang + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="#" class="product-title">' + infor_ch.Ten_Cua_Hang + '</a><span class="product-description">' + address + '</span></div></li></ul>',
                  '<div class="icheck-primary d-inline"><input onclick="check(' + "'" + infor_ch._id + "'" + ')" type="checkbox" id="cb' + infor_ch._id + '"' + (check == "1" ? "checked" : "") + '><label for="cb' + infor_ch._id + '" id="label' + infor_ch._id + '">' + (check == "1" ? "checked" : "") + '</label></div>'
                ]).draw();
              };
            }
            }
    });
  }
</script>

<!-- CHECK, UNCHECK CÁC CỬA HÀNG TRONG 1 DANH MỤC -->
<script type="text/javascript">
  $('input[type="checkbox"]').change(function() {
    if ($(this).is(':checked')) {
      toastr.success("Check " + $(this).attr('id'));
    }
  });

  function themXoaCuaHang_DanhMuc(idCuaHang, state){
    $.ajax({
            url: url + "themXoaCuaHang_DanhMuc_Cuahanghomnay",
            dataType: 'json',
            data: {
                idDanhMuc : $("#idDanhmucCHHN").text(),
                idCuaHang : idCuaHang,
                state : state
            },
            type: 'post',
            success: function (res) {
              if (res.return_code == "1"){
                if (state == "1") {
                  toastr.success("Thêm cửa hàng vào danh mục cửa hàng hôm nay thành công.");
                  $("#label" + idCuaHang).text("checked");
                } else if (state == "0") {
                  toastr.success("Xóa cửa hàng khỏi danh mục cửa hàng hôm nay thành công.");
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
</script>