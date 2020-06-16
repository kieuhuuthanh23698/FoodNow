
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
                        <li class="breadcrumb-item active">Hệ thống áp dụng</li>
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
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Giờ BĐ</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giờ KT</th>
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

    
var socket;
      
    $(document).ready(function(){
 socket = io("http://localhost:3000");
    socket.emit("partner-server", localStorage.getItem('partnerID'));
    socket.on('partner-server', function(data){
        //debugger;
        alert('Guest is ordering with data :');
    });
    $('#head').text($('#head').text() + ' - ' + localStorage.getItem('partnerID'));




        $.ajax(
        {
            url: url + 'Danhsachkhuyenmaihethong',
            dataType: 'json',
            data: {
            },
            type: 'get',
            success: function (res) {

             for (i=0; i< res.length; i++){ 

                var table = $('#example1').DataTable();
                table.row.add( [
                res[i].MaGiamGia ,
                res[i].GioBD,
                res[i].GioKT,
                // res[i].Icon,
                res[i].PhanTram_GiamGia + " %",
                '<img src="http://localhost:3000/Public/Images/'+res[i].Icon+'" alt="Product Image" class="img-size-50">',
                "<div class='sparkbar' data-color='#00a65a' data-height='20'>"
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
        
            // document.getElementById("tablelist").innerHTML=test;
            }
        });
    });
<script type="text/javascript">
  $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>

