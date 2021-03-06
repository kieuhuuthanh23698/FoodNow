<style type="text/css">
  .td-note{
    overflow-wrap: break-word;
    width: 100px;
    margin-left: 10px;
    float: right;
  }
  .table{
    text-align: center;
  }
  .table td{
    vertical-align: inherit;
  }
  .table button{
    margin: 2px;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách đơn hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh sách đơn hàng</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Đơn hàng mới</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="oderTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="oderTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="oderTable_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã đơn hàng</th>
                    <th class="sorting" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số lượng</th>
                    <th class="sorting" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tổng tiền(đ)</th>
                    <th class="sorting" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thông tin</th>
                    <th class="sorting" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày tạo</th>
                    <th class="sorting" tabindex="0" aria-controls="oderTable" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đặt</th>
                  </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
           
              </div>
              </div>
              <!-- /.card-body -->
            </div>
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section id="oder" class="col-lg-5 connectedSortable">
              <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> FoodNow
                    <small class="float-right" id="oder_date"></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">

                <div class="col-sm-6 invoice-col">
                  Khách hàng
                  <address>
                    <strong id="oder_name"></strong>
                    <br><span id="oder_address"></span>
                    <br>ĐT : <span id="oder_phone"></span>
                  </address>

                </div>

                <div class="col-sm-4 invoice-col">
                  <b>Mã đơn hàng : </b><br><span id="oder_id"></span>
                  <br><b>Tổng số lượng: </b><span id="oder_count"></span>
                </div>
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="table_oder_detail" class="table table-striped">
                    <thead>
                    <tr>
                      <th style="width: 200px">Tên món</th>
                      <th>SL</th>
                      <th style="max-width: 300px;width: auto; margin-left: 10px;">Ghi chú</th>
                      <th>Tổng tiền(đ)</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

               <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <p class="lead">Ghi chú đơn hàng: <span id="note_order"></span> </p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Phương thức thanh toán:</p>
                  <!-- <!-- <img src="<?php echo base_url();?>dist/img/credit/visa.png" alt="momo"> -->
                  <img src="<?php echo base_url();?>dist/img/credit/cash-pay.png" alt="Paypal">

                 <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Thanh toán qua ví điện tử dễ dàng.
                  </p> -->
                  <p id="cashPay" class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <!-- <span id="oder_id">Thanh toán bằng tiền mặt.</span> -->
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <!-- <p class="lead"><span id="oder_date_2"></span></p> -->
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                      <tr>
                        <th>Tổng tiền:</th>
                        <td id="oder_total_cart"></td>
                      </tr>
                      <tr>
                        <th>Phí ship :</th>
                        <td id="oder_ship"></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Tổng hóa đơn:</th>
                        <td id="oder_total"></td>
                      </tr>
                     </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="#" onclick="printOder()" class="btn btn-default"><i class="fas fa-print"></i> Xuất hóa đơn</a>
                </div>
              </div>
            </div>

           
    </section>
    <!-- /.content -->

  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
<!-- hỗ trợ print div -->
<script type="text/javascript" src="<?php echo base_url()?>js/printThis.js"></script>
<!-- hỗ trợ format date -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- load data -->
<script type="text/javascript">
  
  var listOders = [];
  // xử lý sau khi load page
  $(document).ready( function () {
    requestPermissionNotification();
    loadOdersList();
    $('#oderTable').DataTable({"order": []});
    $('#oderTable tbody').on('click', 'tr', function () {
      // debugger;
        var id =$(this).attr('id');
        renderUI_OderList_item_detail(id);
    } );
  });

  function printOder(){
    var idOder = document.getElementById('oder_id');
    if(idOder.innerText != "")
      $("#oder").printThis();
  }

  function requestPermissionNotification(){
    //quyền thông báo đơn hàng
    if(Notification.permission != 'granted'){
      Notification.requestPermission().then(function(result){
        if(result == "denied"){
          alert("Bạn đã tắt thông báo của page này !")
        }
        if(result == "granted"){
          alert("Bạn đã cho phép page hiển thị thông báo !")
        }
      });
    }
  }

  function loadOdersList(){
    // request get danh sách đơn hàng 
    $.ajax({
        url:  url + "danhSachDongHang",
        dataType: 'json',
        data: {
          idCuaHang : <?php echo "'".$id."'"?>,
          type : "1"
        },
        type: 'POST',
        success: function (res) {
          res.forEach(function(item){
            listOders.push(item);
          });
          if(listOders.length > 0){
            $("#numberOders").text(listOders.length);
            renderUI_OderList();
          }
        }
    });
  }

  function renderUI_OderList_item(item, i){
    var table = $('#oderTable').DataTable();
    // insert data into table 
    table.row.add( [
      '<a href="#">' + item._id.substr(item._id.length - 5).toUpperCase() + '</a>',
      item.Chi_tiet_DH.length,
      '<span class="badge badge-success">' + (new Intl.NumberFormat().format(item.Total_cart)) + '</span>',
      '<div class="sparkbar" data-color="#00a65a" data-height="20">' + '<button type="button" class="btn btn-outline-success btn-sm" onclick="xacNhanDonHang(' + "'" + item._id + "'"  + ',' + "'" + item.IdKhachHang + "'"  + ','+ "'2" + "' "  +')">Xác nhận</button><button type="button" class="btn btn-outline-danger btn-sm" onclick="xacNhanDonHang(' + "'" + item._id + "'"  + ',' + "'" + item.IdKhachHang + "'"  + ','+ "'3" + "' "  +')">Hủy</button></div>',
      moment(new Date(item.createdAt)).format('DD-MM_YYYY hh:mm'),
      moment(new Date(item.Ngay_nhan_don_hang)).format('DD-MM_YYYY hh:mm')
      ] ).node().id = item._id;
      table.draw();
      table.draw(false);
  };

  function renderUI_OderList_item_detail(id){
    for (i=0; i< listOders.length; i++){
      if(listOders[i]._id == id){
        var detail = listOders[i];
        $("#oder_name").text(detail.infor_kh.Ten_khach_hang);
        $("#oder_address").text(detail.infor_cd.Dia_Chi);
        $("#oder_phone").text(detail.infor_kh.So_dien_thoai);
        $("#oder_id").text(detail._id.substr(detail._id.length - 5).toUpperCase());
        $("#oder_count").text(detail.Chi_tiet_DH.length);
        $("#table_oder_detail tbody").text("");
        for (var j = 0; j < detail.Chi_tiet_DH.length; j++) {
          var item = detail.Chi_tiet_DH[j];
          $("#table_oder_detail tbody").append(
            '<tr><td>' + item.Ten_mon_an + '</td><td>2</td><td style="overflow-wrap: break-word; max-width: 300px; width: auto;">' + item.GhiChu + '</td><td>' + (new Intl.NumberFormat().format(item.Thanh_tien)) + '</td></tr>'
          );
        }
        $("#cashPay").text(detail.Hinh_thuc_thanh_toan == "0" ? "Thanh toán trực tuyến ví MoMo" : "Thanh toán bằng tiền mặt");
        $("#note_order").text(detail.Ghi_chu_NVGH);
        $("#oder_date").text("Ngày đặt :" + moment(new Date(detail.Ngay_nhan_don_hang)).format('DD-MM_YYYY hh:mm'));
        $("#oder_date_2").text(" " + moment(new Date(detail.Ngay_nhan_don_hang)).format('DD-MM_YYYY hh:mm'));
        $("#oder_total").text(" " + (new Intl.NumberFormat().format(detail.Total)));
        $("#oder_ship").text(" " + (new Intl.NumberFormat().format(detail.Phi_ship)));
        $("#oder_total_cart").text(" " + (new Intl.NumberFormat().format(detail.Total_cart)));
        return;
      }
      $("#oder_name").text("");
        $("#oder_address").text("");
        $("#oder_phone").text("");
        $("#oder_id").text("");
        $("#oder_count").text("");
        $("#cashPay").text("");
        $("#note_order").text("");
        $("#oder_date").text("");
        $("#oder_date_2").text("");
        $("#oder_total").text("");
        $("#oder_ship").text("");
        $("#oder_total_cart").text("");
    };
  }

  function renderUI_OderList(){
    for (i=0; i< listOders.length; i++){
      renderUI_OderList_item(listOders[i], i);
    };
    // end for
    var Chi_tiet_DH = localStorage.getItem("Chi_tiet_DH");
    if(Chi_tiet_DH != ''){
      $("#" + Chi_tiet_DH).trigger('click');
      localStorage.setItem("Chi_tiet_DH", "");
    }
  }

  function getNewOder(idOder){
    $.ajax({
            url:  url + "donHangMoi",
            dataType: 'json',
            data: {
              idDonHang : idOder
            },
            type: 'POST',
            success: function (res) {
              if(res.length > 1){
                res.forEach(function(item){
                  listOders.push(item);
                  renderUI_OderList_item(item);
                });
              } else if(res.length == 1){
                listOders.push(res[0]);
                renderUI_OderList_item(res[0]);
              }
              $("#numberOders").text(listOders.length);
              $('#oderTable tbody tr').each(function(){

        $(this).bind({
            click : function(e) {
              renderUI_OderList_item_detail($(this).attr('id'));
            }, 

            mouseleave : function(e) {
            }
        });
    });

            }
    });
  }

  function xacNhanDonHang(idDonHang, idUser, state) {
    // debugger;
    $.ajax({
            url:  url + "cuaHangCapNhatTrangThaiDonHang",
            dataType: 'json',
            data: {
              idDonHang : idDonHang,
              idUser : idUser,
              state : state
            },
            type: 'POST',
            success: function (res) {
              if(res == null) {
                toastr.error("Request gặp lỗi !");
                return;
              }
              if(res.return_code == "1") {
                if(state == "2"){
                  $("#" + idDonHang).find('td:eq(3)').html("Đã xác nhận");
                toastr.success("Xác nhận đơn hàng thành công !");
                } else if(state == "3"){
                toastr.success("Hủy đơn hàng thành công !");
                  $("#" + idDonHang).remove().draw();
                }
              } else if(res.return_code == "0"){
                toastr.error("Request gặp lỗi !");
              }
            }
    });
  }

</script>

<!-- handle push notification -->
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/3.1.0/firebase-database.js"></script>
<script>

  function showNotification(title, body, icon, tag){
    var notify = new Notification(
        title,
        { 
          body : body,
          icon : icon,
          tag : tag.substr(tag.length - 5).toUpperCase()
        }
      );
    
    notify.onclick = function(){
      this.close();
      renderUI_OderList_item_detail(this.tag);
    }
    notify.onshow = function(){
      var item = this;
      setTimeout( function(){ 
        item.close(); 
      }, 5000);
    }
  }

  var firebaseConfig = {
    apiKey: "AIzaSyBpfe5LCma0AfpfNrbJlqxSCOLvOQGQDTg",
    authDomain: "foodnow-276107.firebaseapp.com",
    databaseURL: "https://foodnow-276107.firebaseio.com/",
    projectId: "foodnow-276107",
    storageBucket: "",
    messagingSenderId: "377367084193",
    appId: "1:377367084193:web:d698436d221c25c57c44e0",
    measurementId: "G-KQYRL7G3R3"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  var database = firebase.database().ref().child("/oders/<?php echo $id?>");
  database.on("child_added", function(data){
    console.log(data);
    if(Notification.permission == 'granted'){
      showNotification("Thông báo đơn hàng mới !", "ID đơn hàng : " + data.val().key, "<?php echo base_url()?>images/logo-ver40x40.png", data.val().key);
      toastr.success("Thông báo đơn hàng mới !");
      getNewOder(data.val().key);
      firebase.database().ref().child("/oders/<?php echo $id?>/" + data.key).remove();
    } else {
      toastr.success("Thông báo đơn hàng mới !");
      alert("Xin hãy cho phép trang hiển thị thông báo !")
    }
  });
  var database2 = firebase.database().ref().child("/remove_order/<?php echo $id?>");
  database2.on("child_added", function(data){
    console.log(data);
    $('#oderTable').DataTable().row('#' + data.val().key).remove().draw(false);
    if(Notification.permission == 'granted'){
      showNotification("Thông báo đơn hàng vừa hủy !", "ID đơn hàng : " + data.val().key, "<?php echo base_url()?>images/logo-ver40x40.png", data.val().key);
      toastr.warning("Vừa có đơn hàng bị hủy");
      firebase.database().ref().child("/remove_order/<?php echo $id?>" + data.key).remove();
    } else {
      toastr.warning("Vừa có đơn hàng bị hủy");
      alert("Xin hãy cho phép trang hiển thị thông báo !")
    }
  });
</script>