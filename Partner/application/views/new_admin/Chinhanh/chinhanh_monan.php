
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Món ăn</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Món ăn</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->


    <div class="container-fluid" id="quickForm">
        <!-- Main row -->
        <div class="card">

            <div class="card-header">

                <button type="button" onclick="initModalLoaiMonAn()" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                    Thêm loại món ăn
                </button>

                <button  type="button" onclick="initModalMonAn()" class="btn btn-warning" data-toggle="modal" data-target="#modal-lg">Thêm món ăn</button>

                <!-- Thêm loại món ăn -->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Loại món ăn</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loại món ăn</label>
                                    <input type="email" class="form-control" id="loaiMonAn" aria-describedby="emailHelp" placeholder="Tên loại món mới...">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick=" save()">Lưu</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->


                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Thêm món ăn</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Tên loại món ăn</label>
                                    <select id="selectLoaiMonAn" class="form-control">
                                        <option>Món 1</option>
                                        <option>Món 2</option>
                                        <option>Món 3</option>
                                        <option>Món 4</option>
                                        <option>Món 5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhóm</label>
                                    <select id="selectNhom" class="form-control" onchange="selectNhomChange()">
                                        <option value="0">Đồ ăn</option>
                                        <option value="1">Thức uống</option>
                                    </select>
                                    </br>
                                    <div class="card" id="groupSize" style="display: none">
                                        <div class="card-body">
                                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <label>Size</label>
                                                <select id="selectSize" class="form-control">
                                                    <option value="0">Small</option>
                                                    <option value="1">Medium</option>
                                                    <option value="2">Large</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label>Thêm món ăn</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <!-- <form> -->
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên món ăn</label>
                                                    <input type="email" class="form-control" id="Ten_mon_an" aria-describedby="emailHelp" placeholder="Tên món ăn...">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Đơn giá</label>
                                                    <input type="number" class="form-control" id="Don_gia_mon_an">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <section class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card card-outline card-info">
                                                                <div class="card-header">
                                                                    <label for="inputEmail4">
                                                                        Mô tả
                                                                    </label>
                                                                </h3>
<!--   <div class="card-tools">
<button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
title="Collapse">
<i class="fas fa-minus"></i></button>
<button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
title="Remove">
<i class="fas fa-times"></i></button>
</div> -->

<!-- </div> -->

<div class="mb-3">
    <textarea id="Mo_ta_mon_an" placeholder="Place some text here"
    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
</div>
</div>
</div>

<div class="form-group">
    <img id="img_upload">
    <div class="custom-file">

        <input type="file" class="custom-file-input" id="inputGroupFile02" />
        <label class="custom-file-label" for="inputGroupFile02" id="Chonfile">Chọn hình ảnh</label>
    </div>

</div>

</div>

</div>

</section>

</div>


</div>
</div>


</div>
<div class="modal-footer justify-content-between">
    <button type="button" onclick="save_ThemMonAn()" data-dismiss="modal" class="btn btn-primary">Lưu</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


</div>

</div>
<!-- /.card-header -->
<div class="row">

    <section class="col-lg-5 connectedSortable">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách loại món ăn</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>

            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tên loại món</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Số lượng món</th>
                                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Chi tiết</th>
                                    </tr>

                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-lg-7 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Danh sách món ăn</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Mã chi nhánh: activate to sort column descending" aria-sort="ascending">Hình ảnh</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Tên chi nhánh: activate to sort column ascending">Tên món</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Hình ảnh: activate to sort column ascending">Trạng thái</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Chi tiết: activate to sort column ascending" >Chi tiết</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    </tbody>

                                </table></div></div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div >

    <style type="text/css">

        .giatien{
            font - size: 100%;
            vertical-align: center;
            background-color: #A5DF00;
        }

        .chitiet{
            padding: 3px 12px 3px 12px;
        }

        #img_upload{
            width: 100px;
        }

        .img_chinhanh{
            width: 5.5rem;
            border-radius: 20%;
        }

        .card-primary-chinhanh{
            background - color: #17a2b8;
            color: #FFFFFF;
        }

        .card-primary-cuahang{
            background - color: #e0a800;
            color: #FFFFFF;

        }
    </style>

    <script>
        var hovering = false;
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

<script type="text/javascript">
    var listMonAn = [];
    var click = false;
    $(document).ready(function(){
        $('#example1_wrapper input[type="search"]').css(
            {'width':'150px'}
            );
        loadListLoaiMonAn();
    });

    function loadListLoaiMonAn(){
        $.ajax(
        {
            url: url + "Danhsachmonan_cuahang",
            dataType: 'json',
            data: {
                idcuahang: <?php echo "'".$id."'";?>,
            },
            type: 'post',
            success: function (res) {
                if(res.return_code == "1"){
                    listMonAn = res.infor;
                    var table = $('#example1').DataTable();
                    table.clear().draw();
                    for (i=0; i< listMonAn.length; i++){ 
var item = listMonAn[i];//1 loại món ăn
table.row.add( [
    item.DS_LoaiMA.Ten_loai_mon_an ,
    item.DS_LoaiMA.Danh_sach_mon_an.length ,
    '<button class="btn btn-danger btn_xoa" onclick="xoa(' + "'" + item.DS_LoaiMA._id + "'" + ')" ><i class="fas fa-trash-alt"></i></button>'
    + "</div>"
    ] ).draw();

$('#example1 tbody tr').each(function(){
    if($(this).find('td:nth-child(1)').text() == item.DS_LoaiMA.Ten_loai_mon_an)
        $(this).attr('id', item.DS_LoaiMA._id );
    $(this).bind({
        click : function(e) { 
            if(!click)
                loadMonan_LoaiMonAn($(this).attr('id'));
        },
        mouseleave : function(e) {
            click = false;
        }
    });
});
}
loadMonan_LoaiMonAn(listMonAn[0].DS_LoaiMA._id);
}
}
});
    }

    function loadMonan_LoaiMonAn(idLoaiMonAn){
        debugger;
        click = true;
        for (i=0; i< listMonAn.length; i++){
var item = listMonAn[i];//1 loại món ăn
if(item.DS_LoaiMA._id == idLoaiMonAn){
    var table = $('#example2').DataTable();
    table.clear().draw();
    for (var j = 0; j < item.DS_Monan.length; j++) {
        var monan = item.DS_Monan[j];
        table.row.add( [
            '<img src="' + url + 'Public/Images/'+ monan.Hinh_anh_mon_an+'" alt="Product Image" class="img-size-50">',
            monan.Ten_mon_an ,
            monan.Trang_thai_mon_an == "1" ? "Còn món" : "Quán hết món",    
            '<div class="icheck-primary d-inline"><input onclick="deactiveMonAn(' + "'" + monan._id + "'" + ')" type="checkbox" id="cb' + monan._id + '"' + (monan.Trang_thai_mon_an == "1" ? "checked" : "") + '><label for="cb' + monan._id + '" id="label' + monan._id + '">' + (monan.Trang_thai_mon_an == "1" ? "checked" : "") + '</label></div>'
            ] ).draw();
    }
}
}
}

function initModalLoaiMonAn(){
    $('#loaiMonAn').val("");
}

function initModalMonAn(){
    $("#selectLoaiMonAn").find('option').remove();
    for (var i = 0; i < listMonAn.length; i++) {
        var item = listMonAn[i];
        $("#selectLoaiMonAn").append('<option value="' + item.DS_LoaiMA._id + '">' + item.DS_LoaiMA.Ten_loai_mon_an + '</option>')
    }
    $('#Ten_mon_an').val("");
    $('#Don_gia_mon_an').val("");
    $('#Mo_ta_mon_an').val("");
    var e = document.getElementById('inputGroupFile02');
    e.target = null;
    var img = document.getElementById('img_upload');
    img.height = "0";
    document.getElementById("Chonfile").innerHTML= "";
}

function themLoaiMonAn(){
    $.ajax(
    {
        url: url + "them_loaimonan",
        dataType: 'json',
        data: {
            idCuaHang: <?php echo "'".$id."'";?>,
            Ten_loai_mon_an : $('#loaiMonAn').val()
        },
        type: 'post',
        success: function (res) {
            if(res.return_code == "1"){
                loadListLoaiMonAn();
            } else if(res.return_code == "0"){
                alert("Thêm loại món ăn thất bại !");
            }
        }
    });
}

function createFormDataMonAn(){
    debugger;
    var form = new FormData();
    var file_data = $("#inputGroupFile02").prop('files')[0];
    if(file_data){
        var type = file_data.type;
        var match = ["image/png", "image/jpg", "image/jpeg"];
        if (type == match[0] || type == match[1] || type == match[2]) {
            form.append("upload_file", file_data);
        }
    }
    form.append("idLoaiMonAn",$("#selectLoaiMonAn").val());
    form.append("Ten_mon_an", $("#Ten_mon_an").val());
    form.append("Mo_ta_mon_an", $("#Mo_ta_mon_an").val());
    form.append("Don_gia_mon_an", $("#Don_gia_mon_an").val());
    form.append("Nhom", $("#selectNhom").val());
    if($("#selectNhom").val() == "1")
        form.append("Size", $("#selectSize").val());
    return form;
}

function themMonAn(){
    var form = createFormDataMonAn();
    $.ajax(
    {
        url: url + "them_monan",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form,
        type: 'post',
        success: function (res) {
            if(res.return_code == "1"){
                loadListLoaiMonAn();
            } else if(res.return_code == "0"){
                alert("Thêm món ăn thất bại !");
            }
        }
    });
}

function deactiveMonAn(idMonAn){
    var state = '';
    if ($("#cb" + idMonAn).is(':checked')) {
        state = "1";
    } else{
        state = '0';
    }
    $.ajax(
    {
        url: url + "capNhatTrangThaiMonAn",
        dataType: 'json',
        data: {
            idCuaHang: <?php echo "'".$id."'";?>,
            idMonAn : idMonAn,
            status : state
        },
        type: 'post',
        success: function (res) {
            if (res.return_code == "1"){
                if (state == "1") {
                    $("#label" + idMonAn).text("checked");
                } else if (state == "0") {
                    $("#label" + idMonAn).text("");
                }
                updateMonAn(res.infor, state);
                toastr.success("Cập nhật trạng thái món ăn thành công.");
            } else if (res.return_code == "0"){
                toastr.error("Quá trình thực hiện thất bại !");
                if (state == "1") {
                    $("#cb" + idMonAn).attr("checked", false);
                } else if (state == "0") {
                    $("#cb" + idMonAn).attr("checked", true);
                }
            }
        }
    });   
}

function updateMonAn(monan, state){
    for (var i=0; i< listMonAn.length; i++){
var item = listMonAn[i];//1 loại món ăn
for(var j = 0; j < item.DS_Monan.length; j++){
    var itemMonAn = item.DS_Monan[j];
    if(itemMonAn._id == monan._id){
        debugger;
        listMonAn[i].DS_Monan[j].Trang_thai_mon_an = state;
        loadMonan_LoaiMonAn(item.DS_LoaiMA._id);
        return;
    }
}
}

}

function checkTT_CoBan(){
    var result = true;
    if($.trim($("#loaiMonAn").val()) == ""){
        result = false;
        toastr.error("Bạn chưa điền tên loại món !");
    }
    return result;
}

function save(){
    if(checkTT_CoBan()){
        themLoaiMonAn();
    }
}



function checkTT_CoBan_ThemMonAn(){
    var result = true;
    if($.trim($("#Ten_mon_an").val()) == ""){
        result = false;
        toastr.error("Bạn chưa điền tên món ăn !");
    }
    if($.trim($("#Don_gia_mon_an").val()) == ""){
        result = false;
        toastr.error("Bạn chưa điền đơn giá món ăn !");
    }
    if($.trim($("#inputGroupFile02").val()) == ""){
        result = false;
        toastr.error("Bạn chưa chọn hình ảnh !");
    }
    return result;
}

function save_ThemMonAn(){
    if(checkTT_CoBan_ThemMonAn()){
        themMonAn();
    }
}
$('#selectNhom').on('change', function() {
    if(this.value == "0"){
        $("#groupSize").hide();
    } else {
        $("#groupSize").show();
    }
});
</script>

