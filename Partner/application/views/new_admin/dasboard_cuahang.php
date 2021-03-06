<style type="text/css">
  .td-note{
    overflow-wrap: break-word;
    width: 100px;
    margin-left: 10px;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tổng quan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tổng quan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- <div class="row">
          <div class="col-sm-4" >
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số chi nhánh</span>
                <span class="info-box-number">41,410</span>
              </div>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop-house"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số cửa hàng</span>
                <span class="info-box-number">41,410</span>
              </div>
            </div>
            
          </div>

          <div class="col-sm-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-laptop-house"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Tổng số cửa hàng đăng nhập hệ thống</span>
                <span class="info-box-number">41,410</span>
              </div>
            </div>
          </div>
        </div> -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Đơn hàng mới</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã đơn hàng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số lượng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tổng tiền(đ)</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thông tin</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                 
                </table>
              </div>
            </div>
           
                          </div>
              </div>
              <!-- /.card-body -->
            </div>


          </section>

  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
<!-- load data -->
<script type="text/javascript">
  
  var listOders = [];
  // xử lý sau khi load page
  $(document).ready( function () {
    requestPermissionNotification();
    loadOdersList();
  });


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

  function renderUI_OderList_item(item){
    var table = $('#example1').DataTable();
    // insert data into table 
    table.row.add( [
      '<a href="<?php echo base_url();?>Donhang/Danhsach_donhang_cuahang">' + item._id.substr(item._id.length - 5).toUpperCase() + '</a>',
      item.Chi_tiet_DH.length,
      '<span class="badge badge-success">' + (new Intl.NumberFormat().format(item.Total_cart)) + '</span>',
      '<div class="sparkbar" data-color="#00a65a" data-height="20"><button onclick="Chi_tiet_DH(' + item._id + ')" type="button" class="btn btn-outline-success">Chi tiết</button></div>'
    ] ).node().id = item._id;
    table.draw();
  };

  function Chi_tiet_DH(id){
    localStorage.setItem("Chi_tiet_DH", id);
    window.location="<?php echo base_url();?>Donhang/Danhsach_donhang_cuahang";
  }

  function renderUI_OderList(){
    for (i=0; i< listOders.length; i++){
      renderUI_OderList_item(listOders[i]);
    };
    //set id for each row and bind event for each row
    $('#example1 tbody tr').each(function(){
            $(this).bind({
            click : function(e) {
              localStorage.setItem("Chi_tiet_DH", $(this).attr('id'));
              window.location="<?php echo base_url();?>Donhang/Danhsach_donhang_cuahang";
            },
        });
    });
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
              console.log(res);
              if(res.length > 1){
                res.forEach(function(item){
                  listOders.push(item);
                  $("#numberOders").text(listOders.length);
                  renderUI_OderList_item(item);
                });
              } else if(res.length == 1){
                listOders.push(res[0]);
                $("#numberOders").text(listOders.length);
                renderUI_OderList_item(res[0]);
              }
             $('#example1 tbody tr').each(function(){
            $(this).bind({
            click : function(e) {
              localStorage.setItem("Chi_tiet_DH", $(this).attr('id'));
              window.location="<?php echo base_url();?>Donhang/Danhsach_donhang_cuahang";
            },
        });
    });

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
      // firebase.database().ref().child("/oders/<?php echo $id?>/" + data.key).remove();
      database.child("/" + data.key).remove();
    } else {
      toastr.success("Thông báo đơn hàng mới !");
      alert("Xin hãy cho phép trang hiển thị thông báo !")
    }
  });
  var database2 = firebase.database().ref().child("/remove_order/<?php echo $id?>");
  database2.on("child_added", function(data){
    console.log(data);
    $('#' + data.val().key).remove();
    if(Notification.permission == 'granted'){
      showNotification("Thông báo đơn hàng vừa hủy !", "ID đơn hàng : " + data.val().key, "<?php echo base_url()?>images/logo-ver40x40.png", data.val().key);
      toastr.warning("Vừa có đơn hàng bị hủy");
      database2.child("/" + data.key).remove();
    } else {
      toastr.warning("Vừa có đơn hàng bị hủy");
      alert("Xin hãy cho phép trang hiển thị thông báo !")
    }
  });
</script>