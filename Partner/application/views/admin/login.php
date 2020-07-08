<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Login Admin FoodNow</title>
	<link rel="icon" href="<?php echo base_url();?>images/logo-ver40x40.png">
	<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
	<script src="<?php echo base_url()?>js/jquery.js" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/mycss.css">
</head>
<body>
	 <?php echo isset($notification) ? $notification : '';?>
	<form action="<?php echo base_url()?>admin/login" method = "post">
		<div class="outer ">
			<div class="middle " style= "background-image: url(<?php echo base_url()?>images/bgLogin.jpg)" >
				<div class="inner" style="background-color: white; padding: 40px;">
					<input type="text" name="username" id="username" class="form-control input-t" placeholder="Username">
					<input type="password" name="password" id="password" class="form-control input-t martop" placeholder="Password">
					<button type="submit" id="dangnhap" class="btn btn-sussces input-t form-control btngreen martop">LOGIN</button>
				</div>	
			</div>
		</div>
	</form>
</body>
</html>