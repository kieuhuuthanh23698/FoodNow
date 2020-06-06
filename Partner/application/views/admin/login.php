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
		$.ajax({
			url: 'http://localhost:3000/Danhnhapcuahhang',
			type: 'POST',
			dataType: 'json',
			data: { tenTaikhoan: $('#username').val() , matKhau: $("#password").val()},
		})
		.done(function(data) {
			debugger;
			if(data.return_code == "1")
			{

			localStorage.setItem("partnerID", data.id);
			// 		// this.windown.location.href = 'google.com.vn';
		 		alert(localStorage.getItem('partnerID') + " đăng nhập thành công !");
		 		// alert(localStorage.getItem('partnerID') + " đăng nhập thành công !");
				window.location = '<?php echo base_url()?>admin/homeAdmin';
			}
			else if(data.return_code == "0")
			{
				alert("Bạn đã đăng nhập thất bại !");
				alert("Error : " + data.error_infor);
			}
		})
	});
</script>
</body>
</html>