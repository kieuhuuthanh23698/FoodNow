
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
                        <li class="breadcrumb-item active">Loại món ăn</li>
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

                                </div>
                                <!-- modal hiển thị thêm cửa hàng vào trang chủ -->
                                   

                            </div>
                            <!-- /.card-header -->


<section class="content">
        <div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills" id="tableCuaHang">
<!--                   <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" onclick="loadListCH_Thuoc_DM()">
                  <img alt="BunBoHue" src="<?php echo base_url();?>dist/img/shopping-cart.png" class="img_chinhanh">Đi chợ</a></li> -->
                 <!--  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/sashimi.png" class="img_chinhanh">Món hàn</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/house.png" class="img_chinhanh">Chuỗi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/iced-tea.png" class="img_chinhanh">Trà sữa</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/sandwich.png" class="img_chinhanh">Ăn vặt</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/fried-chicken.png" class="img_chinhanh">Gà rán</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/rice_one.png" class="img_chinhanh">Cơm phần</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/ramen.png" class="img_chinhanh">Bún/Phở</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body" style="padding-left: 0px; padding-right: 0px">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- <section class="col-lg-6 connectedSortable"> -->
                    <div class="container-fluid">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Danh sách các cửa hàng</h3>
                          <label id="idDanhmucCHLMA" style="display: none;"></label>
                          <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button> -->
                              </div>
                      </div>
                  <div class="card-body" >
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Thông tin cửa hàng</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Chi tiết</th>
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
    <!-- </section> -->
          
                  </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

        </div>
    </section>
   
                    
    <aside class="control-sidebar control-sidebar-dark">
                        <!-- Control sidebar content goes here -->
  </aside>
                    <!-- /.control-sidebar -->

</div >

                <style type="text/css">

                    .btn_xoa{
                       padding: 4px 8px 4px 8px;
                    }

                    li .btn_xoa_bangCH{
                      padding: 6px 10px 6px 10px;
                    }

	.chitiet{
                        padding: 3px 12px 3px 12px;
	}

	#img_upload{
                        width: 100px;
	}

    .img_chinhanh {
        width: 1.5rem;
        height: 1.5rem;
    }

</style>

 <script>
     var hovering = false;
           $('#inputGroupFile02').on('change',function(e){
                 //get the file name
                 var fileName = e.target.files[0].name;
    //             //replace the "Choose a file" label
    //             //$(this).next('.custom-file-label').html(fileName);
                 var img = document.getElementById('img_upload');
                 img.src = URL.createObjectURL( e.target.files[0]);
                img.height = "100";
                 document.getElementById("Chonfile").innerHTML=fileName;
             })
</script>

<script type="text/javascript">
    var listDMLMA = [];
    var click = false;
    $(document).ready(function(){
      loadDMCHLMA();
    });


    function setIdDelete(idDelete) {
        $('#idDelete').val(idDelete);
    }

     function loadDMCHLMA(){
        $.ajax(
        {
            url:  url + "getDanhmucloaimonan",
            dataType: 'json',
            data: {
            },
            type: 'get',
            success: function (res) {
              if(res.return_code == "1" && res.items.length > 0){
             $('#tableCuaHang li').remove();
             for (i=0; i< res.items.length; i++){ 
                $("#tableCuaHang").append('<li class="nav-item"><a id="'+ res.items[i]._id+'" class="nav-link" href="#activity" data-toggle="tab" onclick="loadListCH_Thuoc_DM('+ "'" + res.items[i]._id+"'"+')"><img src="http://localhost:3000/Public/Images/'+res.items[i].Icon_Loai_Mon_An+'" alt="Product Image" class="img_chinhanh">' + res.items[i].Ten_Loai_Mon_An + '</a></li>'
                );
            };
            $("#" + res.items[0]._id).trigger( "click" );
            }
            }
        });
}
</script>

<script type="text/javascript">

  function loadListCH_Thuoc_DM(idDanhmucCHLMA){
    $.ajax({
            url: url + "getDanhSachCuaHang_LoaiMonAn",
            dataType: 'json',
            data: {
                idDanhMuc : idDanhmucCHLMA
            },
            type: 'post',
            success: function (res) {
              if(res.return_code == "1"){
              $("#idDanhmucCHLMA").text(idDanhmucCHLMA);
              var list = res.infor;
              var table = $('#example1').DataTable();
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
                  '<div class="icheck-primary d-inline"><input onclick="check(' + "'" + infor_ch._id + "','" + idDanhmucCHLMA + "'" + ')" type="checkbox" id="cb' + infor_ch._id + '"' + (check == "1" ? "checked" : "") + '><label for="cb' + infor_ch._id + '" id="label' + infor_ch._id + '">' + (check == "1" ? "checked" : "") + '</label></div>'
                ]).draw();
              };
            }
            }
    });
  }

  function themXoaCuaHang_DanhMuc_LoaiMonAn(idCuaHang, idDanhmuc,state){
    $.ajax({
            url: url + "themXoaCuaHang_DanhMuc_LoaiMonAn",
            dataType: 'json',
            data: {
                idDanhMuc : idDanhmuc,
                idCuaHang : idCuaHang,
                state : state
            },
            type: 'post',
            success: function (res) {
              if (res.return_code == "1"){
                if (state == "1") {
                  toastr.success("Thêm cửa hàng vào danh mục loại món ăn thành công.");
                  $("#label" + idCuaHang).text("checked");
                } else if (state == "0") {
                  toastr.success("Xóa cửa hàng khỏi danh mục loại món ăn thành công.");
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

  function check(idCuaHang, idDanhmuc){
    if ($("#cb" + idCuaHang).is(':checked')) {
      themXoaCuaHang_DanhMuc_LoaiMonAn(idCuaHang, idDanhmuc,"1");
    } else{
      themXoaCuaHang_DanhMuc_LoaiMonAn(idCuaHang, idDanhmuc,"0");
    }
  }
</script>