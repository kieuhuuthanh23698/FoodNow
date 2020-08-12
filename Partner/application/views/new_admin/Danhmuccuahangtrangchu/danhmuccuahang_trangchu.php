
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh mục</h1>
                </div><!-- /.col -->
          <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cửa hàng trang chủ</li>
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

<!-- Thêm cửa hàng vào trang chủ modal -->
 <div class="modal fade" id="modal-lg">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Danh sách cửa hàng cần hiển thị lên trang chủ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <label id="idDanhmucCHTC" style="display: none;"></label>
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
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
<!-- Thêm cửa hàng vào trang chủ modal -->

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

<!-- Thêm danh mục trang chủ -->
                                   
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="card-body">
                    <!-- <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"> -->
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tên danh mục</label>
                          <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Món ngon mỗi ngày" id="ten_danhmuc">
                        </div>
                        <div class="input-group-append">
                          <button class="btn btn-primary float-right toastrDefaultSuccess" data-dismiss="modal" onclick="save_ThemDMCHTC()">Lưu</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>    
                <!-- Thêm danh mục trang chủ -->       

        </div>
                            <!-- /.card-header -->
 <div class="row">
  <section class="col-lg-6 connectedSortable">
      <div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button type="button" class="btn btn-info" onclick="initModal_ThemDanhMucCH_TrangChu()" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm danh mục trang chủ</button>
</h3>
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
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên trang chủ</th>
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
      <h3 class="card-title">Danh sách cửa hàng</h3>

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
                  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin cửa hàng</th>
              </thead>
              <tbody></tbody>
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
    object-fit: cover;
    height: 80px !important;
    width: 80px !important;
    border-radius: 20%;
    margin-right: 10px;
}

</style>

 <script>
    var hovering = false;
    //         $('#inputGroupFile02').on('change',function(e){
    //             //get the file name
    //             var fileName = e.target.files[0].name;
    //             //replace the "Choose a file" label
    //             //$(this).next('.custom-file-label').html(fileName);
    //             var img = document.getElementById('img_upload');
    //             img.src = URL.createObjectURL( e.target.files[0]);
    //             img.height = "100";
    //             document.getElementById("Chonfile").innerHTML=fileName;
    //         })
</script>



<script type="text/javascript">
      
    var listDMTC = [];
    var click = false;
    $(document).ready(function(){
      loadDanhMucCuaHang_TrangChu();
    });

    function initModal_ThemDanhMucCH_TrangChu(){
      $("#ten_danhmuc").val("");
    }

    function setIdDelete(idDelete) {
        $('#idDelete').val(idDelete);
    }

    function loadDanhMucCuaHang_TrangChu(){
      $.ajax(
      {
          url: url + 'Hienthitendanhmuccuahangtrangchu',
          dataType: 'json',
          data: {
          },
          type: 'get',
          success: function (res) {
           var table = $('#example1').DataTable();
           table.clear().draw();
           for (i=0; i< res.length; i++){ 
              table.row.add( [
              res[i].Chu_De_Chinh ,
              '<button class="btn btn-info btn_xoa" data-toggle="modal" data-target="#modal-lg" onclick="loadListCH_Thuoc_DM('+ "'" + res[i]._id + "'" + ')"><i class="fas fa-plus"></i></button>'
              +'<button class="btn btn-danger btn_xoa" onclick="setIdDelete(' + "'" + res[i]._id + "'" + ')" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-trash-alt"></i></button>'
              + "</div>"
              ] ).draw();
              $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].Chu_De_Chinh)
                        $(this).attr('id', res[i]._id );
                });

                $('#example1 tbody tr').each(function(){
                    if($(this).find('td:nth-child(1)').text() == res[i].Chu_De_Chinh)
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
      
          // document.getElementById("tablelist").innerHTML=test;
          }
      });
    }



   function loadCuaHang(idDanhmucCHTC){
        hovering = true;
        $.ajax({
            url: url + "Hienthicuahangtrongdanhmuctrangchu",
            dataType: 'json',
            data: {
                idDanhmuccuahangtrangchu : idDanhmucCHTC
            },
            type: 'post',
            success: function (res) {
            if(res.return_code == "1"){
              // $("#idDanhmucCHTC").text(idDanhmucCHTC);
              listDMTC = res.result;
              var table = $('#example3').DataTable();
              table.clear().draw();
                for (i=0; i< listDMTC.length; i++){ 
                    var item = listDMTC[i].CuaHang_TrangChu;//1 loại món ăn
                    debugger;
                    var address = listDMTC[i].DiaChi_CH[0].Dia_Chi;
                    table.row.add( [
                    '<ul class="products-list product-list-in-card pl-2 pr-2"><li style="background-color: transparent;" class="item"><div class="product-img"><img src="' + url + 'Public/Images/' + item.Hinh_Anh_Cua_Hang + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="#" class="product-title">' + item.Ten_Cua_Hang + '</a><span class="product-description">' + address + '</span></div></li></ul>'
                    ] ).draw();
                  }//for
            }//if
            }//succcess
    });//ajax
  }//func


     // function loadDanhsachcaccuahang(){
     //    $.ajax(
     //    {
     //        url: url + 'Hientatdanhsachcaccuahang',
     //        dataType: 'json',
     //        data: {
     //        },
     //        type: 'get',
     //        success: function (res) {

     //         for (i=0; i< res.length; i++){ 

     //            var table = $('#example2').DataTable();
     //             for (i=0; i< res.length; i++){ 

     //            $("#tableCuaHang").append('<li id="'+ res[i]._id +'" class="item"><div class="product-img"><img src="http://localhost:3000/Public/Images/'+ res[i].Hinh_Anh_Cua_Hang +'" alt="Product Image" class="img-size-50"></div><div class="product-info"><a href="javascript:void(0)" class="product-title">'+ res[i].Ten_Cua_Hang+'<span class="badge badge-danger float-right"></span></a><span class="product-description">'+res[i].Dia_Chi+'</span></div></li>');
     //            console.log("add");

     //        };
        
     //        // document.getElementById("tablelist").innerHTML=test;


     //            $('#example2 tbody tr').each(function(){
     //                if($(this).find('td:nth-child(1)').text() == res[i].Chu_De_Chinh)
     //                    $(this).attr('id', res[i]._id );
     //            });

     //            $('#example2 tbody tr').each(function(){
     //                if($(this).find('td:nth-child(1)').text() == res[i].Chu_De_Chinh)
     //                    $(this).attr('id', res[i]._id );
     //                $(this).bind({
     //                    click : function(e) { 
     //                        if(hovering == false)
     //                            loadCuaHang($(this).attr('id'));
     //                         }, 
     //                    mouseleave : function(e) {//khi ko hover nữa
     //                            //xóa bảng CH
     //                            hovering = false;
     //                            // $('#tableCuaHang li').remove();
     //                        }
     //                    });
     //            });

     //        };
        
     //        // document.getElementById("tablelist").innerHTML=test;
     //      }


     //    });

     //  }



    function themSanPham(){
      if($("#ten_danhmuc").val() == ""){
        toastr.warning('Bạn chưa nhập tên danh mục !');
      } else {
        $.ajax(
        {
            url: url + 'addDanhmuccuahangtrangchu',
            dataType: 'json',
            data: {
                chuDechinh : $("#ten_danhmuc").val(),
            },
            type: 'post',
            success: function (res) {
            if(res.return_code == "1"){
              loadDanhMucCuaHang_TrangChu();
              toastr.success("Thêm danh mục thành công !");
            } else if(res.return_code =="0"){
                toastr.error("Thêm danh mục thất bại !");
            }
        }
        });
      }
    }


     function xoa()
    {
        var id_cuahangtrangchu = $('#idDelete').val();
        alert("xoa" + id_cuahangtrangchu );
        $.ajax({
            type    : 'delete',
            url     : url + 'deleteDanhmuccuahangtrangchu',
            data    : {
                idDanhmuccuahangtrangchu : id_cuahangtrangchu
            },
            dataType: 'json',
            success: function (res) {
            if(res.return_code == "1")
             {
                var table = $('#example1').DataTable();
                table.row($('#' + id_cuahangtrangchu)).remove().draw();
                toastr.success("Xóa danh mục cửa hàng thành công !");
            } else{
              toastr.error("Xóa danh mục cửa hàng thất bại !");
            }
            }
        });
        
    }

     function xoa_cuahangtrongdanhmuc(id_cuahang, idDanhmuccuahangtrangchu)
    {

        alert("xoa" + id_cuahang +idDanhmuccuahangtrangchu );
        $.ajax({
            type    : 'delete',
            url     : url + 'deleteCuahangtrongdanhmuctrangchu',
            data    : {
                idcuahang : id_cuahang,
                idDanhmuccuahangtrangchu : idDanhmuccuahangtrangchu
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
<!-- LOAD CÁC CỬA HÀNG THUỘC 1 DANH MỤC CỬA HÀNG TRANG CHỦ -->
<script type="text/javascript">

  function loadListCH_Thuoc_DM(idDanhmucCHTC){
    $.ajax({
            url: url + "getDanhSachCuaDanhMuc",
            dataType: 'json',
            data: {
                idDanhMuc : idDanhmucCHTC
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
              $("#idDanhmucCHTC").text(idDanhmucCHTC);
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
                  '<ul class="products-list product-list-in-card pl-2 pr-2"><li style="background-color: transparent;" class="item"><div class="product-img"><img src="' + url + 'Public/Images/' + infor_ch.Hinh_Anh_Cua_Hang + '" alt="Product Image" class="img_chinhanh"></div><div class="product-info"><a href="#" class="product-title">' + infor_ch.Ten_Cua_Hang + '</a><span class="product-description">' + address + '</span></div></li></ul>',
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
            url: url + "themXoaCuaHang_DanhMuc",
            dataType: 'json',
            data: {
                idDanhMuc : $("#idDanhmucCHTC").text(),
                idCuaHang : idCuaHang,
                state : state
            },
            type: 'post',
            success: function (res) {
              if (res.return_code == "1"){
                if (state == "1") {
                  toastr.success("Thêm cửa hàng vào danh mục cửa hàng trang chủ thành công.");
                  $("#label" + idCuaHang).text("checked");
                } else if (state == "0") {
                  toastr.success("Xóa cửa hàng khỏi danh mục cửa hàng trang chủ thành công.");
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

   function checkTT_CoBan_ThemDMCHTC(){
    var result = true;
    if($.trim($("#ten_danhmuc").val()) == ""){
      result = false;
      toastr.error("Bạn chưa điền tên danh mục trang chủ !");
    }
    return result;
  }

  function save_ThemDMCHTC(){
    if(checkTT_CoBan_ThemDMCHTC()){
      themSanPham();
    }
}

</script>