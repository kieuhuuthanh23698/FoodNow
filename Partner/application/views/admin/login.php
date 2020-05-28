<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Login Admin - Camera Minh Long</title>
	<link rel="icon" href="<?php echo base_url();?>images/logo-ver40x40.png">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<script src="<?php echo base_url()?>js/jquery.js" ></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/mycss.css">
</head>
<body>
<!-- <form action="<?php echo base_url()?>admin/checkAccount" method = "post"> -->
<div class="outer ">
  <div class="middle " style= "background-image: url(<?php echo base_url()?>images/bgLogin.jpg)" >
    <div class="inner" style="background-color: white; padding: 40px;">
      <input type="text" name="username" id="username" class="form-control input-t" placeholder="Username">
      <input type="password" name="password" id="password" class="form-control input-t martop" placeholder="Password">
      <button type="submit" id="dangnhap" class="btn btn-sussces input-t form-control btngreen martop">LOGIN</button>
      <label class="textstyle">Bạn không có tài khoản? <a class="spantext" href="registration.html">Tạo tài khoản</a></label>
    </div>	
  </div>
</div>
<!-- </form> -->
	
<script type="text/javascript">
	$("#dangnhap").click(function(event) {
		localStorage.setItem("partnerID", $('#username').val());
		// $.ajax({
		// 	url: '<?php echo base_url()?>admin/checkAccount',
		// 	type: 'POST',
		// 	//dataType: 'html',
		// 	data: { username: $('#username').val() , password: $("#password").val()},
		// })
		// .done(function(data) {
		// 	if(data == 1)
		// 	{
				window.location = '<?php echo base_url()?>admin/homeAdmin';

		// 		// this.windown.location.href = 'google.com.vn';
		 		alert(localStorage.getItem('partnerID') + " đăng nhập thành công !");
		// 	}
		// 	else if(data == 0)
		// 	{
		// 		alert("Bạn đã đăng nhập thất bại !");
		// 	}
		// })
	});
</script>
</body>
</html>