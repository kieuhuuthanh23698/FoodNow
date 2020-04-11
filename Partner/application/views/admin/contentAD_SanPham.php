<div class="main-content">
	<div class="main-content-inner">
		<script type="text/javascript">
			$(document).ready( function () {
				$('#tbSanPham').DataTable();
			} );
		</script>

		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Trang chủ</a>
				</li>
				<!-- <li class="active"></li> -->
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>
		<!--  PAGE CONTENT-->
		<div class="page-content">
			<button class="btn btn-success" data-toggle="modal" data-target="#myModal">Thêm</button>
			<table id="tbSanPham" class="table" style="text-align: center;">
			<thead>
				<tr>
					<th>HÃNG</th>
					<th>TÊN SẢN PHẨM</th>
					<th>ẢNH</th>
					<th>GIÁ</th>
					<th>XÓA</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sanpham as $key) {?>
				<tr id = "<?php echo $key['id_sanpham']?>">
					<td><?php echo $key['tenHang']?></td>
					<td><?php echo $key['ten_sanpham']?></td>
					<td><img src="images/<?php echo $key['image']?>" width = "300px"></img></td>
					<td><?php echo $key['price']?> VNĐ</td>
					<td><button class="deletepr" onclick="xoa(<?php echo $key['id_sanpham']?>)">XÓA</button></td>
				</tr>
				<?php }?>
			</tbody>
			</table>
		</div>
		<!-- /.page-content -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<!-- <form action="<?php echo base_url();?>sanpham/insert" method="post" enctype="multipart/form-data"> -->
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Thêm Sản Phẩm</h4>
						</div>
						<div class="modal-body">
							<label> HÃNG </label>
							</br>
							<select id = "id_hang" name = 'id_hang' class="form-group">
								<?php foreach ($hang as $key) {?>
									<option value="<?php echo $key['id_hang'];?>"><?php echo $key['tenHang'];?></option>
								<?php }?>
							</select>
							</br>
							<label> Tên sản phẩm </label>
							</br>
							<input id = "ten_sanpham" type="text" name="ten_sanpham">
							</br>
							<label> Giá </label>
							</br>
							<input id = "price" type="text" name="price">
							</br>
							<label> Mô tả </label>
							<textarea name = 'mota' id="ckeditor"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button id = "addSanPham" class="btn btn-primary" data-dismiss="modal">Save changes</button>
						</div>
					<!-- </form> -->
				</div>
			</div>
		</div>
	</div>
</div><!-- /.main-content -->
<script type="text/javascript">
	$('#addSanPham').on('click', function (){
		$.ajax(
		{
            url: '<?php echo base_url()?>sanpham/insert',
            dataType: 'json',
            data: {
            	id_hang : $('#id_hang').val(),
            	ten_sanpham : $('#ten_sanpham').val(),
            	price : $('#price').val(),
            	mota : $('#ckeditor').val(),
            },
            type: 'post',
            success: function (data) {
 			var table = $('#tbSanPham').DataTable();
 			table.row.add( [
	            data[0].tenHang,
	            data[0].ten_sanpham,
	            "<img src='images/" + data[0].image +"' width = '400px'></img>",
	            data[0].price + "VNĐ",
	            "<button onclick='xoa(" + data[0].id_sanpham + ")'>XÓA</button>"
        	] ).draw( false );
        	}
	    });

	});

	function xoa(id_sanpham)
	{
		//debugger;
		//$("#" + id_sanpham).remove();
		$.ajax({
			type    : 'POST',
			url     : '<?php echo base_url();?>sanpham/xoa',
			data    : {
				id_sanpham : id_sanpham,
			}
		});
		
		var table = $('#tbSanPham').DataTable();
    	table.row($('#' + id_sanpham)).remove().draw();
	}
	
 
		
</script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdn.ckeditor.com/4.11.4/sckeditortandard/.js"></script>
<script type="text/javascript">
	CKEDITOR.replace('ckeditor',{
		        filebrowserBrowseUrl : '<?=base_url()?>ckfinder/ckfinder/ckfinder.html',
		        filebrowserImageBrowseUrl : '<?=base_url()?>ckfinder/ckfinder/ckfinder.html?type=Images',
		        filebrowserFlashBrowseUrl : '<?=base_url()?>ckfinder/ckfinder/ckfinder.html?type=Flash',
		        filebrowserUploadUrl : '<?=base_url()?>ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		        filebrowserImageUploadUrl : '<?=base_url()?>ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',	
		        filebrowserFlashUploadUrl : '<?=base_url()?>ckfinder/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
		        });
</script>