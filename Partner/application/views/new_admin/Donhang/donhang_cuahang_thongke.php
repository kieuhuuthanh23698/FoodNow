 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ChartJS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ChartJS</li>
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
          

            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Báo cáo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">

          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col-md-6 -->

          <!-- Test -->
          <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;" width="487" height="250" class="chartjs-render-monitor"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- Test -->
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <div class="row">
                    <div class="card-title">
                     <h4>Thống kê đơn hàng đã xác nhận</h4>
                    </div>
                    <div class="col-sm-3">
                     <span class="badge badge-danger" style="font-size: 20px">100</span>
                    </div>
                  </div>
                <!-- <h3 class="card-title">Thống kê đơn hàng đã xác nhận</h3>
                <span class="badge badge-success" style="font-size: 20px">100</span> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <!-- <div class="row"><div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="example1_length">
                      <label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-sm-12">
                      <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mã đơn hàng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Số lượng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tổng tiền</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Thông tin</th>
                    <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9853</a></td>
                      <td>1</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                     <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>3</td>
                      <td><span class="badge badge-success">900.000</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                          <button type="button" class="btn btn-outline-success">Chi tiết</button>
                        </div>
                      </td>
                    </tr>
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
<!-- ChartJS -->
<script src="<?php echo base_url()?>plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url()?>dist/js/demo.js"></script>
<script src="<?php echo base_url()?>dist/js/pages/dashboard3.js"></script>
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 9, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    // var areaChartOptions = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    //   legend: {
    //     display: false
    //   },
    //   scales: {
    //     xAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }],
    //     yAxes: [{
    //       gridLines : {
    //         display : false,
    //       }
    //     }]
    //   }
    // }

    // // This will get the first returned node in the jQuery collection.
    // var areaChart       = new Chart(areaChartCanvas, { 
    //   type: 'line',
    //   data: areaChartData, 
    //   options: areaChartOptions
    // })

    //-------------
    //- LINE CHART -
    //--------------
    // var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    // var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    // var lineChartData = jQuery.extend(true, {}, areaChartData)
    // lineChartData.datasets[0].fill = false;
    // lineChartData.datasets[1].fill = false;
    // lineChartOptions.datasetFill = false

    // var lineChart = new Chart(lineChartCanvas, { 
    //   type: 'line',
    //   data: lineChartData, 
    //   options: lineChartOptions
    // })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    // var donutData        = {
    //   labels: [
    //       'Chrome', 
    //       'IE',
    //       'FireFox', 
    //       'Safari', 
    //       'Opera', 
    //       'Navigator', 
    //   ],
    //   datasets: [
    //     {
    //       data: [700,500,400,600,300,100],
    //       backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    //     }
    //   ]
    // }
    // var donutOptions     = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    // }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // var donutChart = new Chart(donutChartCanvas, {
    //   type: 'doughnut',
    //   data: donutData,
    //   options: donutOptions      
    // })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    // var pieData        = donutData;
    // var pieOptions     = {
    //   maintainAspectRatio : false,
    //   responsive : true,
    // }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // var pieChart = new Chart(pieChartCanvas, {
    //   type: 'pie',
    //   data: pieData,
    //   options: pieOptions      
    // })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    // var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    // var stackedBarChartOptions = {
    //   responsive              : true,
    //   maintainAspectRatio     : false,
    //   scales: {
    //     xAxes: [{
    //       stacked: true,
    //     }],
    //     yAxes: [{
    //       stacked: true
    //     }]
    //   }
    // }

    // var stackedBarChart = new Chart(stackedBarChartCanvas, {
    //   type: 'bar', 
    //   data: stackedBarChartData,
    //   options: stackedBarChartOptions
    // })
  })
</script>