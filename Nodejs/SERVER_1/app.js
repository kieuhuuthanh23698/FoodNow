var express = require("express");
var bodyParser = require("body-parser");
const mongoose = require('mongoose');

var urlEncodeParser = bodyParser.urlencoded( { extended:false } );
var app = new express();
app.listen(3000);	
//tVn8kGPaRDD1Hq4j
mongoose.connect('mongodb+srv://admin:tVn8kGPaRDD1Hq4j@cluster0-qozmr.mongodb.net/FoodNow?retryWrites=true&w=majority',  
	{ useUnifiedTopology: true ,useNewUrlParser: true,useFindAndModify: false},
	function(err){	
		if(err) 
			console.log("MongoDb connect error : " + err); 
		else 
			console.log("MongoDb connect success !");	
	}
);

const KHU_VUC = require("./Models/KHU_VUC");
const CHI_NHANH = require("./Models/CHI_NHANH");
const CUA_HANG = require("./Models/CUA_HANG");
const MON_AN = require("./Models/MON_AN");
const KHACH_HANG = require("./Models/KHACH_HANG");
const DON_HANG = require("./Models/DON_HANG");
const CHI_TIET_DON_HANG = require("./Models/CHI_TIET_DON_HANG");

///-----------------------------------------------------------------------------------------------------------------------------------------

//-------------------------------------------------------------------KHU VỰC----------------------------------------------------------------
//route thêm khu vực
//method POST
//params  : tenkhuvuc, motakhuvuc
app.post("/addKhuVuc", urlEncodeParser, function(req,res){
	if(req.body.tenkhuvuc != "" && req.body.motakhuvuc != "" && req.body.tenkhuvuc != null && req.body.motakhuvuc != null){
		var newKhuVuc = new KHU_VUC({
				Ten_khu_vuc : req.body.tenkhuvuc,
				Mo_ta_khu_vuc : req.body.motakhuvuc,
				Chi_Nhanh_id : []
			});
			newKhuVuc.save(function(err){
				if(err)
					res.send("Thêm khu vực mới bị lỗi : " + err);
				else
					res.send("Thêm khu vực mới thành công !");
			});
	}
	else
		//res.send(JSON.stringify(req.body));
		res.send("Params error !" + req.body.tenkhuvuc);
});

//route lấy tất cả các khu vực
//method GET
app.get("/khuvuc", function(req, res){
	KHU_VUC.find(function(err, items){
		if(err)
			res.send("Lấy danh sách khu vực gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//-------------------------------------------------------------------CỬA HÀNG----------------------------------------------------------------
//route thêm cửa hàng
//method POST
//param : Ten_cua_hang, Dia_chi_cua_hang_chinh, So_dien_thoai_cua_hang, Mo_ta_cua_hang
app.post("/addCuaHang", urlEncodeParser, function(req,res){
	if(req.body.Ten_cua_hang != null && req.body.Dia_chi_cua_hang_chinh != null 
		&& req.body.So_dien_thoai_cua_hang != null && req.body.Mo_ta_cua_hang != null)
	{
		if(req.body.Ten_cua_hang != "" && req.body.Dia_chi_cua_hang_chinh != "" 
			&& req.body.So_dien_thoai_cua_hang != "" && req.body.Mo_ta_cua_hang != "")
		{
			var newCuaHang = new CUA_HANG({
				Ten_cua_hang : req.body.Ten_cua_hang,
				Dia_chi_cua_hang_chinh : req.body.Dia_chi_cua_hang_chinh,
				So_dien_thoai_cua_hang : req.body.So_dien_thoai_cua_hang,
				Mo_ta_cua_hang : req.body.Mo_ta_cua_hang,
				Chi_Nhanh_id : []
			});
			newCuaHang.save(function(err){
				if(err)
					res.send("Thêm cửa hàng mới bị lỗi : " + err);
				else
					res.send("Thêm cửa hàng mới thành công !");
			});
		}
		else
			res.send("Params error 2 !");
	}
	else
		res.send("Params error 1 !");
});

//route get danh sách cửa hàng
app.get("/cuahang", function(req, res){
	CUA_HANG.find(function(err, items){
		if(err)
			res.send("Lấy danh sách cửa hàng gặp lỗi !");
		else
			res.send(items);
	});
});

//-------------------------------------------------------------------CHI NHÁNH----------------------------------------------------------------
//route thêm chi nhanh
//method POST
//params  : idkhuvuc, idcuahang, ten, diachi, sdt, mota
app.post("/addChiNhanh", urlEncodeParser, function(req,res){
	if(req.body.idkhuvuc != null && req.body.idcuahang != null && req.body.ten != null
		&& req.body.diachi != null && req.body.sdt != null && req.body.mota != null)
	{
		if(req.body.idkhuvuc != "" && req.body.idcuahang != ""  && req.body.ten != ""
			&& req.body.diachi != "" && req.body.sdt != "" && req.body.mota != ""){
			var newChiNhanh = new CHI_NHANH({
					Ten_chi_nhanh : req.body.ten,
					Dia_chi_chi_nhanh : req.body.diachi,
					So_dien_thoai_chi_nhanh : req.body.sdt,
					Mo_ta_chi_nhanh : req.body.mota,
					Mon_An_Tai_Chi_Nhanh_id : []
				});
			var result = "";
			newChiNhanh.save(function(err){
				if(err)
					res.send("Thêm chi nhánh mới bị lỗi : " + err);
				else
				{
					result += "Thêm chi nhánh mới thành công !";
					KHU_VUC.findOneAndUpdate(
						{ _id : req.body.idkhuvuc },
						{ $push: {Chi_Nhanh_id : newChiNhanh._id}},
						function(err) {
							if(err)
								result += "\nThêm chi nhánh mới vào khu vực gặp lỗi : " + err;
							else
								result += "\nThêm chi nhánh mới vào khu vực thành công !";
						}
					);
					CUA_HANG.findOneAndUpdate(
						{ _id : req.body.idcuahang },
						{ $push: {Chi_Nhanh_id : newChiNhanh._id}},
						function(err) {
							if(err)
								result += "\nThêm chi nhánh mới vào cửa hàng gặp lỗi : " + err;
							else
								result += "\nThêm chi nhánh mới vào cửa hàng thành công !";
						}
					);
					res.send(result);
				}
			});
		}
		else
			res.send("Params error 2 !");
	}
	else
		res.send("Params error 1 !");
});

//route lấy tất cả các chi nhánh
//method GET
app.get("/chinhanh", function(req, res){
	CHI_NHANH.find(function(err, items){
		if(err)
			res.send("Lấy danh sách chi nhánh gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route xóa 1 chi nhánh
//method POST
//params idChiNhanh là chi nhánh cần xóa, xóa chi nhánh khỏi khu vực của chi nhánh đó
app.post("/deleteChiNhanh", urlEncodeParser, function(req,res){
	var result = "";
	CHI_NHANH.findByIdAndDelete(
		{_id: req.body.idChiNhanh},
		function(err) {
			if(err)
			{
				result += "\nXóa bị lỗi : " + err;
				console.log("\nXóa bị lỗi : " + err);
			}
			else{
				result += "\nĐã xóa : " + req.body.idChiNhanh;
				console.log("\nĐã xóa : " + req.body.idChiNhanh);
				KHU_VUC.findOneAndUpdate(
					{Chi_Nhanh_id: {$in: [req.body.idChiNhanh]}},
					{ $pull: {Chi_Nhanh_id : req.body.idChiNhanh}},
					function(err) {
						if(err)
							result += "\nXóa chi nhánh trong khu vực gặp lỗi : " + err;
						else
							result += "\nXóa chi nhánh trong khu vực thành công !";
					}
				);
				CUA_HANG.findOneAndUpdate(
					{Chi_Nhanh_id: {$in: [req.body.idChiNhanh]}},
					{ $pull: {Chi_Nhanh_id : req.body.idChiNhanh}},
					function(err) {
						if(err)
							result += "\nXóa chi nhánh trong cửa hàng gặp lỗi : " + err;
						else
							result += "\nXóa chi nhánh trong cửa hàng thành công !";
					}
				);
				res.send(result);
				console.log(result);
			}
		}
	);
});

//-------------------------------------------------------------------MÓN ĂN----------------------------------------------------------------
//route thêm món ăn vào 1 chi nhánh
//method POST
//params : idChiNhanh, Ten_MON_AN, Mo_ta_MON_AN, Don_gia_MON_AN, Hinh_anh_MON_AN, Don_vi_tinh
app.post("/addMonAn", urlEncodeParser, function(req,res){
	if(req.body.idChiNhanh != null && req.body.Ten_mon_an != null && req.body.Mo_ta_mon_an != null 
		&& req.body.Don_gia_mon_an != null && req.body.Hinh_anh_mon_an != null && req.body.Don_vi_tinh != null)
	{
		if(req.body.idChiNhanh != "" && req.body.Ten_mon_an != "" && req.body.Mo_ta_mon_an != "" 
			&& req.body.Don_gia_mon_an != "" && req.body.Hinh_anh_mon_an != "" && req.body.Don_vi_tinh != "")
		{
			var newMonAn = new MON_AN({
				Ten_mon_an : req.body.Ten_mon_an,
				Mo_ta_mon_an : req.body.Mo_ta_mon_an,
				Don_gia_mon_an : req.body.Don_gia_mon_an,
				Hinh_anh_mon_an : req.body.Hinh_anh_mon_an,
				Don_vi_tinh:req.body.Don_vi_tinh
			});
			newMonAn.save(function(err){
				if(err)
					res.send("Thêm món ăn mới bị lỗi !");
				else
				{
					var kqCreate = "Thêm món ăn mới thành công !\n";
					CHI_NHANH.findOneAndUpdate(
						{ _id : req.body.idCuaHang },
						{ $push: {Mon_An_Tai_Chi_Nhanh_id : newMonAn._id}},
						function(err) {
							if(err)
								res.send(kqCreate + "Thêm món ăn mới vào thực đơn của chi nhánh bị lỗi !");
							else
								res.send(kqCreate + "Thêm món ăn mới vào thực đơn của chi nhánh thành công !");
						}
					);
				}
			});
		}
		else
			res.send("Params error 2 !");
	}
	else
		res.send("Params error 1 !");
});


//route lấy tất cả các món ăn của 1 chi nhánh
//method GET
//params : idChiNhanh
app.post("/monan", urlEncodeParser, function(req, res){
	if(req.body.idChiNhanh != null)
	{
		if(req.body.idChiNhanh != "")
		{
			CHI_NHANH.findOne({_id : req.body.idChiNhanh}, function(err, result){
				if(err)
					res.send("Tìm chi nhánh gặp lỗi :" + err);
				else
					res.send(result.Mon_An_Tai_Chi_Nhanh_id);
			});
		}
		else
			res.send("Params error 2 !");
	}
	else
		res.send("Params error 1 !");
});

//route lấy tất cả các món ăn
//method GET
app.get("/allmonan", function(req, res){
	MON_AN.find(function(err, items){
		if(err)
			res.send("Lấy danh sách món ăn gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route lấy thông tin của một món ăn
//method POST
//params : idMonAn

//route đăng ký tài khoảng
//method POST
//params : Ten_khach_hang, Tai_khoan, Mat_khau


//route đăng nhập
//method POST
//params : Tai_khoan, Mat_khau


//route chọn hàng (thêm, xóa, update số lượng)
//method POST
//params idKhachHang, idMonAN

//route đặt hàng, chuyển những hàng được chọn vào đơn hàng mới và xóa giỏ hàng
//method POST
//parmams : idKhachHang