<html style="height: auto;
    font-size: 1rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>FoodNow | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-mini layout-fixed" onload="loadSanPham()" style="height: auto;
    font-size: 1rem !important;
    font-weight: 400 !important;
    line-height: 1.5 !important;">
  <style type="text/css">
  </style>
<div class="wrapper">

  <!-- Navbar -->
  <?php echo isset($header) ? $header : '';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php echo isset($left_content) ? $left_content : '';?>

  <!-- Content Wrapper. Contains page content -->
  <?php echo isset($content) ? $content : '';?>

  <!-- footer -->
  <?php echo isset($footer) ? $footer : '';?>
  
<!-- ./wrapper -->

</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url()?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url()?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url()?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url()?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url()?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- <script src="<?php echo base_url()?>css/bootstrap.min.js"></script> -->
<!-- Summernote -->
<script src="<?php echo base_url()?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>dist/js/demo.js"></script>

<!-- Hiền import DataTables -->
<link rel="stylesheet" href="<?php echo base_url();?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="<?php echo base_url()?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
  $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
</script>

<!-- Check đúng khi save -->
<link rel="stylesheet" href="<?php echo base_url()?>plugins/toastr/toastr.min.css">
<script src="<?php echo base_url()?>plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
  $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
</script>

<!-- Ghi chú KMCH -->
<script src="<?php echo base_url()?>dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>


<!-- Input Image -->
 <script>
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

<!-- Chưa điền thông tin -->
<script type="text/javascript">
$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</script>
<!-- Ngày giờ bắt đầu - Ngày giờ kết thúc -->

<!-- Đồng hồ -->


<div class="jqvmap-label" style="display: none;"></div></body></html>


