<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Login Admin FoodNow</title>
	<link rel="icon" href="<?php echo base_url();?>images/logo-ver40x40.png">
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
	<script src="<?php echo base_url()?>js/jquery.js" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/mycss.css">

	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Widgets</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body >
	 <?php echo isset($notification) ? $notification : '';?>
	<form action="<?php echo base_url()?>admin/login" method = "post">
		<div class="outer ">
			<div class="hold-transition login-page" style= "background-image: url(<?php echo base_url()?>images/section_bg03.png )" >
				<!-- <div class="inner" style="background-color: white; padding: 40px;">
					
					<input type="text" name="username" id="username" class="form-control input-t" placeholder="Username">
					<input type="password" name="password" id="password" class="form-control input-t martop" placeholder="Password">
					<button type="submit" id="dangnhap" class="btn btn-sussces input-t form-control btngreen martop">LOGIN</button>
				</div>	 -->
				 
				 <div class="login-box">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">FOODNOW</h3>
                <h5 class="widget-user-desc">ĐĂNG NHẬP HỆ THỐNG</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?php echo base_url()?>dist/img/Logo-Nowvn-Elip.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                 <div class="input-group mb-3">
		          <input type="text" name="username" id="username" class="form-control" placeholder="Email">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-user-alt"></span>
		            </div>
		          </div>
		        </div>
                 <div class="input-group mb-3">
		          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-lock"></span>
		            </div>
		          </div>
		        </div>
                </div>
                <!-- /.row -->
                
                <div class="row">

          <div class="col-4">
            <button type="submit" id="dangnhap" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
              </div>


            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
			</div>
		</div>
	</form>


         
       


</body>



<!-- jQuery -->
<script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery -->
<script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>dist/js/demo.js"></script>
</html>