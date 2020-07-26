 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thống kê đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thống kê đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col (LEFT) -->
          <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="col-sm-6">
                <div class="form-group">
                  <label>Lựa chọn thời gian thống kê</label>
                  <div class="input-group" style="width: 300px;">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control float-right" id="reservation">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 500px; max-height: 500px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->
<script type="text/javascript">
    // $('#reservation').daterangepicker();
    $(function() {
      var date = new Date(), y = date.getFullYear(), m = date.getMonth();
      var firstDay = new Date(y, m, 1);
      var lastDay = new Date(y, m + 1, 0);
    $('#reservation').daterangepicker({
      opens: 'left',
      startDate: firstDay,
      endDate: lastDay,
    }, function(start, end, label) {
      // alert("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      loadDataThongKe(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
    });
  });
</script>
<script type="text/javascript" src="<?php echo base_url()?>plugins/date.js/date.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url()?>dist/js/demo.js"></script>
<script src="<?php echo base_url()?>dist/js/pages/dashboard3.js"></script>
<script>
  var areaChartData;
  var barChart;
  var data = {};
  data.labels = [];
  data.state_1 = [];
  data.state_2 = [];
  data.state_3 = [];
  $(document).ready(function(){
    // var date = new Date(), y = date.getFullYear(), m = date.getMonth();
    // var firstDay = new Date(y, m, 1).toISOString();
    // var lastDay = new Date(y, m + 1, 0).toISOString();
    var fd = Date.today().clearTime().moveToFirstDayOfMonth();
    var firstDay = fd.toString("yyyy/MM/dd");
    var ld = Date.today().clearTime().moveToLastDayOfMonth();
    var lastDay = ld.toString("yyyy/MM/dd");

    // var date = new Date(), y = date.getFullYear(), m = date.getMonth();
    // var firstDay = new Date(y, m, 1);
    // var lastDay = new Date(y, m + 1, 0);

    loadDataThongKe(firstDay, lastDay);
  })

  function loadDataThongKe(firstDay, lastDay){
    // alert(firstDay + " - " + lastDay);
      $.ajax({
              url: url + "cuaHangThongKeDonHang",
              dataType: 'json',
              data: {
                  idCuaHang : <?php echo "'".$id."'"?>,
                  firstDay : firstDay,
                  lastDay : lastDay
              },
              type: 'post',
              success: function (res) {
                if(res.return_code == "1"){
                  toastr.success("Lấy dữ liệu thống kê thành công !")
                  // console.log(res.data);
                  // debugger;
                  createChart(res.data);
              } else {
                createChart(data);
                toastr.error("Lấy dữ liệu thống kê không thành công !")
              }
            }
      });
    }
  function createChart(data) {
    debugger;
    areaChartData = {
      labels  : data.labels,
      datasets: [
        {
          label               : 'Đã đặt',
          backgroundColor     : 'rgba(118, 231, 80, 1)',
          borderColor         : 'rgba(118, 231, 80, 1)',
          pointRadius          : false,
          pointColor          : '#76e750',
          pointStrokeColor    : 'rgba(118, 231, 80, 1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(118, 231, 80, 1)',
          data                : data.state_1
        },
        {
          label               : 'Đã xác nhận',
          backgroundColor     : 'rgba(80, 221, 231, 1)',
          borderColor         : 'rgba(80, 221, 231, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(80, 221, 231, 1)',
          pointStrokeColor    : '#50dde7',
          pointHighlightFill  : '#ffff',
          pointHighlightStroke: 'rgba(80, 221, 231, 1)',
          data                : data.state_2
        },
        {
          label               : 'Đã hủy',
          backgroundColor     : 'rgba(231, 120, 80, 1)',
          borderColor         : 'rgba(231, 120, 80, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(231, 120, 80, 1)',
          pointStrokeColor    : '#e77850',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(231, 120, 80, 1)',
          data                : data.state_3
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    var temp2 = areaChartData.datasets[2]
    barChartData.datasets[0] = temp0
    barChartData.datasets[1] = temp1
    barChartData.datasets[2] = temp2

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
  }
</script>