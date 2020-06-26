
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

                            </div>
                            <!-- /.card-header -->


<section class="content">
        <div class="row">
<div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">
                  <img alt="BunBoHue" src="<?php echo base_url();?>dist/img/shopping-cart.png" class="img_chinhanh">Đi chợ</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/sashimi.png" class="img_chinhanh">Món hàn</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/house.png" class="img_chinhanh">Chuỗi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/iced-tea.png" class="img_chinhanh">Trà sữa</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/sandwich.png" class="img_chinhanh">Ăn vặt</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/fried-chicken.png" class="img_chinhanh">Gà rán</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/rice_one.png" class="img_chinhanh">Cơm phần</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"><img alt="BunBoHue" src="<?php echo base_url();?>dist/img/ramen.png" class="img_chinhanh">Bún/Phở</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body" style="padding-left: 0px; padding-right: 0px">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- <section class="col-lg-6 connectedSortable"> -->
                    <div class="container-fluid">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title"><button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#modal-lg">
                  Thêm cửa hàng vào danh mục loại món ăn trang chủ
                </button></h3>

                <!-- modal hiển thị thêm cửa hàng vào trang chủ -->
                <div class="modal fade" id="modal-lg">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Danh sách cửa hàng cần hiển thị lên trang chủ</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">

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
                                    <tr>
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
                                            <div class="icheck-success d-inline">
                                              <input type="checkbox" id="checkboxSuccess3">
                                              <label for="checkboxSuccess3">
                                                Success checkbox
                                              </label>
                                            </div>
                                      </td>
                                    </tr>

                                     <tr>
                                        <td>
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                             <li class="item">
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
                                           <div class="icheck-success d-inline">
                                              <input type="checkbox" id="checkboxSuccess1">
                                              <label for="checkboxSuccess1">
                                                Success checkbox
                                              </label>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    

                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
                         



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
                                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Hình ảnh cửa hàng</th>
                                                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên cửa hàng</th>
                                                 <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Địa chỉ</th>
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
    <!-- </section> -->
          
                  </div>


                  <div class="tab-pane" id="settings">
                     <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i>Tên tài khoản</strong>

                    <p class="text-muted" id="tendangnhap">
                      B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Mật khẩu</strong>
                    <p><input type="password" class="form-control" id="matkhau" placeholder=""></p>

                    <button type="submit" class="btn btn-success">Lưu</button>
                    </div>

                    
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
      
    var listMonAn = [];
    var click = false;
    $(document).ready(function(){
        loadListLoaiMonAn();
    });

    // function loadListLoaiMonAn(){
    //     $.ajax(
    //     {
    //         url: url + "getDanhmucloaimonan",
    //         dataType: 'json',
    //         data: {
    //         },
    //         type: 'get',
    //         success: function (res) {
    //         if(res.return_code == "1"){
    //             listMonAn = res.items;
    //             var table = $('#example1').DataTable();
    //             table.clear().draw();
    //              for (i=0; i< listMonAn.length; i++){ 
    //                 var item = listMonAn[i];//1 loại món ăn
    //                 table.row.add( [
    //                 '<img src="http://localhost:3000/Public/Images/'+item.Icon_Loai_Mon_An+'" alt="Product Image" class="img_chinhanh">',
    //                 item.Ten_Loai_Mon_An ,
    //                 '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + item._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
    //                 + "</div>"
    //                 ] ).draw();

    //                 $('#example1 tbody tr').each(function(){
    //                     if($(this).find('td:nth-child(1)').text() == item.Ten_Loai_Mon_An)
    //                         $(this).attr('id', item._id );
    //                     $(this).bind({
    //                         click : function(e) { 
    //                                 if(!click)
    //                                     loadCuaHang($(this).attr('id'));
    //                              },
    //                         mouseleave : function(e) {
    //                                  click = false;
    //                             }
    //                         });
    //                 });
    //             }
    //         }
    //         }
    //     });
    // }

    // $(document).ready(function(){
    //     $.ajax(
    //     {
    //         url: url + "getDanhmucloaimonan",
    //         dataType: 'json',
    //         data: {
    //         },
    //         type: 'get',
    //         success: function (res) {
    //           if (return_code==1) {
    //             for (i=0; i< res.length; i++){ 

    //             var table = $('#example1').DataTable();
    //             table.row.add( [
    //               res[i].Ten_Loai_Mon_An ,
    //             '<img src="http://localhost:3000/Public/Images/'+res[i].HinhAnh_CH+'" alt="Product Image" class="img_chinhanh">',

    //             "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
               
    //             + '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
    //             + "</div>"
    //             ] ).draw();

    //             $('#example1 tbody tr').each(function(){
    //                 if($(this).find('td:nth-child(1)').text() == res[i].Ten_Loai_Mon_An)
    //                     $(this).attr('id', res[i]._id );
    //             });

    //             $('#example1 tbody tr').each(function(){
    //                 if($(this).find('td:nth-child(1)').text() == res[i].Ten_Loai_Mon_An)
    //                     $(this).attr('id', res[i]._id );
    //                 $(this).bind({
    //                     click : function(e) { 
    //                         if(hovering == false)
    //                             loadCuaHang($(this).attr('id'));
    //                          }, 
    //                     mouseleave : function(e) {//khi ko hover nữa
    //                             //xóa bảng CH
    //                             hovering = false;
    //                             // $('#tableCuaHang li').remove();
    //                         }
    //                     });
    //             });

    //         };
    //       }

             
        
    //         // document.getElementById("tablelist").innerHTML=test;
    //         }
    //     });
    // });


    //  function loadCuaHang(idDanhmucloai_monan){
    //     hovering = true;
    //     $.ajax(
    //     {
    //         url: url + "Hienthicuahangtrongdanhmucloaimonan",
    //         dataType: 'json',
    //         data: {
    //             idDanhmucloaimonan : idDanhmucloai_monan
    //         },
    //         type: 'post',
    //         success: function (res) {
    //         $('#tableCuaHang li').remove();
    //          for (i=0; i< res.length; i++){ 

    //             $("#tableCuaHang").append('<li id="'+ res[i].CuaHang_LoaiMonAn._id +'" class="item"><div class="product-img"><img src="http://localhost:3000/Public/Images/'+ res[i].CuaHang_LoaiMonAn.Hinh_Anh_Cua_Hang +'" alt="Product Image" class="img-size-50"></div><div class="product-info"><a href="javascript:void(0)" class="product-title">'+ res[i].CuaHang_LoaiMonAn.Ten_Cua_Hang+'<span class="badge badge-danger float-right"><button class="btn btn-danger btn_xoa_bangCH" onclick="xoa_cuahangtrongdanhmuc(' + "'" + res[i].CuaHang_LoaiMonAn._id + "'"  + ',' + "'"  + idDanhmuccuahanghomnay + "'" + ')" ><i class="fas fa-trash-alt"></i></button></span></a><span class="product-description">'+res[i].DiaChi_CH[0].Dia_Chi+'</span></div></li>');
    //             console.log("add");

    //         };
        
    //         // document.getElementById("tablelist").innerHTML=test;
    //         }
    //     });

    // }


    // function themSanPham(){
    //     $.ajax(
    //     {
    //         url: url + "addDanhsachcuahanghomnay",
    //         dataType: 'json',
    //         data: {
    //             Thongtin_Chinh : $("#ten_danhmuc").val(),
    //             Thongtin_Phu : $("#ten_danhmuc_phu").val(),
    //             HinhAnh_CH :  $("#inputGroupFile02").val()
    //         },
    //         type: 'post',
    //         success: function (res) {
    //          if(res.return_code == "1")
    //          {
    //          var table = $('#example1').DataTable();
    //         table.row.add( [
    //         $("#ten_danhmuc").val(),
    //         $("#ten_danhmuc_phu").val(),
    //         $("#inputGroupFile02").val(),
    //         '<button class="btn" onclick="xoa(' + "'" + res[i]._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
    //         ] ).draw();
    //     }
    //     else if(res.return_code =="0"){
    //             alert("Thêm thất bại!");
    //         }
    //     }
    //     });
    // }


    //  function xoa(id_cuahangtrangchu)
    // {
    //     alert("xoa" + id_cuahangtrangchu );
    //     $.ajax({
    //         type    : 'delete',
    //         url     : 'http://localhost:3000/deleteDanhmuccuahangtrangchu',
    //         data    : {
    //             idDanhmuccuahangtrangchu : id_cuahangtrangchu
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //         if(res.return_code == "1")
    //          {
    //             var table = $('#example1').DataTable();
    //             table.row($('#' + id_cuahangtrangchu)).remove().draw();
    //         }
    //         }
    //     });
        
    // }

    //  function xoa_cuahangtrongdanhmuc(id_cuahang, idDanhmuccuahangtrangchu)
    // {
    //     alert("xoa" + id_cuahang +idDanhmuccuahangtrangchu );
    //     $.ajax({
    //         type    : 'delete',
    //         url     : 'http://localhost:3000/deleteCuahangtrongdanhmuctrangchu',
    //         data    : {
    //             idcuahang : id_cuahang,
    //             idDanhmuccuahangtrangchu : idDanhmuccuahangtrangchu
    //         },
    //         dataType: 'json',
    //         success: function (res) {
    //         if(res.return_code == "1")
    //          {
    //             $('#' + id_cuahang).remove();
    //         }
    //         }
    //     });
        
    // }
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