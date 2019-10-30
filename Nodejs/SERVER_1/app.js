//khai báo thư viện phục vụ cho tạo web
var express = require("express");

//tạo 1 web từ thư viện
var app = new express();

//trang web này lắng nghe port 3000
app.listen(3000);	

//tVn8kGPaRDD1Hq4j
const mongoose = require('mongoose');
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

///-----------------------------------------------------------------------------------------------------------------------------------------

// với port 3000 trên route /test với phương thức GEt 
// app.get("/test/:id",function(req, res){
// 	var id = req.params.id;
// 	res.send("Dữ liệu truyền lên với GET method là : " + id);
// });
// với port 3000 trên route /test với phương thức POST, params truyền vào  không xuất hiện trên địa chỉ
//phải sử dụng body-parser để lấy dữ liệu đưa lên
var bodyParser = require("body-parser");
var urlEncodeParser = bodyParser.urlencoded( { extended:false } );

// app.post("/test", urlEncodeParser, function(req, res){
// 	res.send("Dữ liệu truyền lên với POST method là : " + req.body.id);
// });

//route thêm khu vực mới vào database FoodNow
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

//route thêm chi nhanh mới vào database FoodNow
//method POST
//params  : idkhuvuc, ten, diachi, sdt, mota
app.post("/addChiNhanh", urlEncodeParser, function(req,res){
	if(req.body.idkhuvuc != "" && req.body.ten != ""
		&& req.body.diachi != "" && req.body.sdt != "" && req.body.mota

		&& req.body.idkhuvuc != null && req.body.ten != null
		&& req.body.diachi != null && req.body.sdt != null && req.body.mota != null){
			
		var newChiNhanh = new CHI_NHANH({
				Ten_chi_nhanh : req.body.ten,
				Dia_chi_chi_nhanh : req.body.diachi,
				So_dien_thoai_chi_nhanh : req.body.sdt,
				Mo_ta_chi_nhanh : req.body.mota,
				Thuc_Don_Tai_Chi_Nhanh_id : [],
				Hoa_Don_id : []		
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
						res.send(result);
					}
				);
			}
		});
	}
	else
		res.send("Params error !");
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
						res.send(result);
						console.log(result);
					}
				);
			}
		}
	);
});