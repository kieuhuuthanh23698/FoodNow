<div class="main-content">
	<div class="main-content-inner">

		<div class="breadcrumbs ace-save-state" id="breadcrumbs"><!-- breadcrumb -->
			<ul class="breadcrumb">
				<li class="active">
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">Trang chủ</a>
				</li>
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search"><!-- nav-search -->
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>
		<div class="page-content"><!--  PAGE CONTENT-->
		<button onclick="sendData()" class="btn btn-success" data-toggle="modal" data-target="#myModal">Thêm</button>
		<table id="tbBanner" class="table" style="text-align: center;">
			<thead>
			<tr>
				<th>Column 1</th>
				<th>Column 2</th>
				<th>Column 3</th>
				<th>Column 4</th>
				<th>Column 5</th>
			</tr>
			</thead>
			<tbody>
				<?php for($x = 0; $x <= 15; $x++){?>
				<tr>
					<td>Item <?php echo $x;?></td>
					<td>Item <?php echo $x;?></td>
					<td>Item <?php echo $x;?></td>
					<td>Item <?php echo $x;?></td>
					<td>Item <?php echo $x;?></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
<div class="modal fade" id="myModal_test" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Thêm Banner</h4>
						</div>
						<div class="modal-body">
							Form để thực hiện insert, update.
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button id ="upLoad" class="btn btn-primary" data-dismiss="modal">Save changes</button>
						</div>
				</div>
			</div>
		</div>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript">

$(document).ready( function () {	$('#tbBanner').DataTable();	} );
//const sseSource = new EventSource('http://localhost:3000/event-stream-khuvuc');

//demo event source
// sseSource.addEventListener('message', (e) => {
//     const messageData = e.data;
//     console.log(messageData);
// });

//demo socket io
//
var socket;
// socket.on("partner-server", function(data){
// 	alert('Guest is ordering with data :' + data);
// });
// socket.on('partner-server', function(msg){
// //      $('#messages').append($('<li>').text(msg));
// });

$(document).ready(function(){
	socket = io("http://localhost:3000");
	socket.emit("partner-server", localStorage.getItem('partnerID'));
	socket.on('partner-server', function(data){
		//debugger;
 		alert('Guest is ordering with data :');
	});
	$('#head').text($('#head').text() + ' - ' + localStorage.getItem('partnerID'));
//	socket.emit("partner-id", $("#nav-search-input").val);
});



function sendData(){
	//socket.emit("partner-id", $("#nav-search-input").val);
	//alert('Emit to server :' + $("#nav-search-input").val());
}

function getData($data){
	alert($data);
}
</script>