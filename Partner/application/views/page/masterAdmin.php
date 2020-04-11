<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8" />
	<META HTTP-EQUIV="Content-language" CONTENT="vi" />
	<link rel="shortcut icon" href="<?php echo base_url()?>images/logo-ver40x40.png" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url()?>images/logo-ver40x40.png">
	<title>Admin | Food Now - Partner</title>

	<meta name="description" content="Static &amp; Dynamic Tables" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link href="<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>css/all.css" rel="stylesheet"/>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
</head>
<body class="no-skin">
	<!-- 		header-->
	<?php echo isset($header) ? $header : '';?>

	<!-- 		body -->
	<?php echo isset($body) ? $body : '';?>

	<!-- 		content -->
	<?php echo isset($content) ? $content : '';?>

	<!--		footer-->
	<?php echo isset($footer) ? $footer : '';?>
	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
</div>
</body>
</html>