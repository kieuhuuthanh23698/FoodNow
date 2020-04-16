var express = require("express");
var bodyParser = require("body-parser");
const mongoose = require('mongoose');
const jwt=require("jsonwebtoken");
// var io = socket_io('http://localhost:3000', {
// 	extraHeaders: {
// //		Authorization: "Bearer authorization_token_here"
// // 		'Access-Control-Allow-Origin': '*'
// 	}
// });
//var io = socket_io();

var urlEncodeParser = bodyParser.urlencoded({ extended: false });
var app = new express();
const server = require('http').Server(app);
const io = require('socket.io')(server);

app.set("view engine", "ejs");
app.use("/Public",express.static('Public'));
// app.get("/", function(req, res){
//   res.render("main");
// });
//app.use(express.static(__dirname + '/Public/'));
server.listen(3000);



//tVn8kGPaRDD1Hq4j
// mongoose.connect('mongodb://localhost:27017/FoodNow',
// 	{ useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
// 	function (err) {
// 		if (err)
// 			console.log("MongoDb connect error : " + err);
// 		else
// 			console.log("MongoDb connect success !");
// 	}
// );
mongoose.connect('mongodb+srv://admin:tVn8kGPaRDD1Hq4j@cluster0-qozmr.mongodb.net/FoodNow?retryWrites=true&w=majority',
	{ useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
	function (err) {
		if (err)
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
const CHI_TIET_GIO_HANG=require('./Models/CT_GIO_HANG');

///-------------------------------------------------------------------TEST SERVER SEND EVENT----------------------------------------------------------------

// let data_khu_vuc_change = `Time - ${Date.now()} : Data is normal !`;
// function getMessage(){
// 	changeStream.on('change', (change) => {
// 		//console.log('Data collection khu vuc have changed !')
// 		//console.log('id khu vuc thay doi :' + change.documentKey._id);
// 		data_khu_vuc_change = '{' + change.documentKey._id + '}';
// 		//data_khu_vuc_change = 'co su thay doi';
// 		io.emit('changeData', change);
// 	});
// 	return data_khu_vuc_change;
// }

// function sseDemo(req, res) {
// 	let messageId = 0;
	 

//     const intervalId = setInterval(() => {
// 		console.log(`Server sent event : ${messageId} - ${data_khu_vuc_change}`)
//     	res.write('hello');
// 		//res.write(`${getMessage()}`);
// 		data_khu_vuc_change = `Time - ${Date.now()} : Data is normal !`;
// 		//res.write(data_khu_vuc_change);
// 		//if(data_khu_vuc_change != '_'){
//         	//res.write(`\ndata : ${data_khu_vuc_change}\n`);
// 		//}
// 		messageId += 1;
//     }, 1000);
	
// 	data_khu_vuc_change = 'Data is normal !';

//     req.on('close', () => {
//         clearInterval(intervalId);
//     });
// }

// app.get('/event-stream-khuvuc', (req, res) => {
//     // SSE Setup
//     res.writeHead(200, {
// 		'Access-Control-Allow-Origin': '*',
//         'Content-Type': 'text/event-stream',
//         'Cache-Control': 'no-cache',
//         'Connection': 'keep-alive',
//     });
//     res.write('\n');

//     sseDemo(req, res);
// });

const changeStream = CHI_NHANH.watch();
let list = [];

function getSocketIdWithIdParner(partnerID){
	var result = list.find(item => item.partner_id === partnerID);
	return result.socket_id;
}



io.on("connection",function(socket){
	//list.push(socket.id);
	// console.log("Some one connected with id : " + socket.id);
	socket.on('partner-server', function(data){
		console.log("client id " + socket.id + " just emit : " + data);
		socket.join(data);
		var item = {socket_id : socket.id, partner_id : data};
		list.push(item);
		//console.log('123 : ' + list[0].socket_id);
		console.log('Connecting people are : ' + list.length);
	});


});

changeStream.on('change', (change) => {
	console.log(change);
	//console.log('Data collection khu vuc have changed !')
	//console.log('id khu vuc thay doi :' + change.documentKey._id);
//	var socket_id = getSocketIdWithIdParner('5dc53b64fdf2d32c6006e057');
	
//	var socket_id = '5dc53b64fdf2d32c6006e057';
	//var socket_id = change.documentKey._id;
	//io.to(socket_id).emit('data of partner 1');
	//io.sockets.in(socket_id).emit('partner-server', 'hello ');
	//console.log('vua emit to ' + socket_id);
	//io.to(getSocketIdWithIdParner('5dc53bc6fdf2d32c6006e058')).emit('data of partner 2');
	//io.to(getSocketIdWithIdParner('5dc56d8c6b2d0520e0658441')).emit('data of partner 3');
	//data_khu_vuc_change = '{' + change.documentKey._id + '}';
	//data_khu_vuc_change = 'co su thay doi';
	//io.emit('partner-server', 'hello');
}); 

//-------------------------------------------------------------------KHU VỰC----------------------------------------------------------------
//route thêm khu vực
//method POST
//params  : tenkhuvuc, motakhuvuc
app.post("/addKhuVuc", urlEncodeParser, function (req, res) {
	if (req.body.tenkhuvuc != "" && req.body.motakhuvuc != "" && req.body.tenkhuvuc != null && req.body.motakhuvuc != null) {
		var newKhuVuc = new KHU_VUC({
			Ten_khu_vuc: req.body.tenkhuvuc,
			Mo_ta_khu_vuc: req.body.motakhuvuc,
			Chi_Nhanh_id: []
		});
		newKhuVuc.save(function (err) {
			if (err)
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
app.get("/khuvuc", function (req, res) {
	KHU_VUC.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách khu vực gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route cập nhật mô tả 1 khu vực
//method PUT
//params : idKhuVuc, value
app.put("/updateMoTaKhuVuc", urlEncodeParser, function (req, res) {
	if (req.body.idkhuvuc != "" && req.body.idkhuvuc != null && req.body.value != "" && req.body.value != null) {
		var result = "";
		KHU_VUC.findOneAndUpdate(
			{ _id: req.body.idkhuvuc },
			{
				$set : {Mo_ta_khu_vuc : req.body.value}
			},
			function (err) {
				if (err)
					res.send("\nCập nhật mô tả khu vực gặp lỗi : " + err);
				else
					res.send("\nCập nhật mô tả khu vực thành công !");
			}
		);
	}
	else
		res.send("Params error !");
});

//-------------------------------------------------------------------CỬA HÀNG----------------------------------------------------------------
//route thêm cửa hàng
//method POST
//param : Ten_cua_hang, Dia_chi_cua_hang_chinh, So_dien_thoai_cua_hang, Mo_ta_cua_hang
app.post("/addCuaHang", urlEncodeParser, function (req, res) {
	if (req.body.Ten_cua_hang != null && req.body.Dia_chi_cua_hang_chinh != null
		&& req.body.So_dien_thoai_cua_hang != null && req.body.Mo_ta_cua_hang != null) {
		if (req.body.Ten_cua_hang != "" && req.body.Dia_chi_cua_hang_chinh != ""
			&& req.body.So_dien_thoai_cua_hang != "" && req.body.Mo_ta_cua_hang != "") {
			var newCuaHang = new CUA_HANG({
				Ten_cua_hang: req.body.Ten_cua_hang,
				Dia_chi_cua_hang_chinh: req.body.Dia_chi_cua_hang_chinh,
				So_dien_thoai_cua_hang: req.body.So_dien_thoai_cua_hang,
				Mo_ta_cua_hang: req.body.Mo_ta_cua_hang,
				Chi_Nhanh_id: []
			});
			newCuaHang.save(function (err) {
				if (err)
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
app.get("/cuahang", function (req, res) {
	CUA_HANG.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách cửa hàng gặp lỗi !");
		else
			res.send(items);
	});
});

//-------------------------------------------------------------------CHI NHÁNH----------------------------------------------------------------
//route thêm chi nhanh
//method POST
//params  : idkhuvuc, idcuahang, ten, diachi, sdt, mota
app.post("/addChiNhanh", urlEncodeParser, function (req, res) {
	if (req.body.idkhuvuc != null && req.body.idcuahang != null && req.body.ten != null
		&& req.body.diachi != null && req.body.sdt != null && req.body.mota != null) {
		if (req.body.idkhuvuc != "" && req.body.idcuahang != "" && req.body.ten != ""
			&& req.body.diachi != "" && req.body.sdt != "" && req.body.mota != "") {
			var newChiNhanh = new CHI_NHANH({
				Ten_chi_nhanh: req.body.ten,
				Dia_chi_chi_nhanh: req.body.diachi,
				So_dien_thoai_chi_nhanh: req.body.sdt,
				Mo_ta_chi_nhanh: req.body.mota,
				Mon_An_Tai_Chi_Nhanh_id: []
			});
			var result = "";
			newChiNhanh.save(function (err) {
				if (err)
					res.send("Thêm chi nhánh mới bị lỗi : " + err);
				else {
					result += "Thêm chi nhánh mới thành công !";
					KHU_VUC.findOneAndUpdate(
						{ _id: req.body.idkhuvuc },
						{ $push: { Chi_Nhanh_id: newChiNhanh._id } },
						function (err) {
							if (err)
								result += "\nThêm chi nhánh mới vào khu vực gặp lỗi : " + err;
							else
								result += "\nThêm chi nhánh mới vào khu vực thành công !";
						}
					);
					CUA_HANG.findOneAndUpdate(
						{ _id: req.body.idcuahang },
						{ $push: { Chi_Nhanh_id: newChiNhanh._id } },
						function (err) {
							if (err)
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
app.get("/chinhanh", function (req, res) {
	CHI_NHANH.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách chi nhánh gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route get chi nhánh của cửa hàng
//method POST
//params : idCuaHang
app.post("/ChiNhanhCuaCuaHang", urlEncodeParser,function (req, res) {
	if(req.body.idCuahang!=null)
	{
		if(req.body.idChiNhanh!="")
		{
			CUA_HANG.findOne({_id : req.body.idCuahang},function (err, result) {
				if (err)
					res.send("Lấy thông tin chi nhánh gặp lỗi !" + err);
				else
					res.send(result.Chi_Nhanh_id);
			});
		}
		else
		{
			res.send('Params error 2!')
		}
		
	}
	else
	{
		res.send('Params error 1!')
	}
	
});

//route get 1 chi nhánh
//method POST
//params : idChiNhanh
app.post("/OneChiNhanh", urlEncodeParser,function (req, res) {
	CHI_NHANH.findById({_id : req.body.idChiNhanh},function (err, result) {
		if (err)
			res.send("Lấy thông tin chi nhánh gặp lỗi !" + err);
		else
			res.send(result);
	});
});

//route xóa 1 chi nhánh
//method POST
//params idChiNhanh là chi nhánh cần xóa, xóa chi nhánh khỏi khu vực của chi nhánh đó
app.delete("/deleteChiNhanh", urlEncodeParser, function (req, res) {
	var result = "";
	CHI_NHANH.findByIdAndDelete(
		{ _id: req.body.idChiNhanh },
		function (err) {
			if (err) {
				result += "\nXóa bị lỗi : " + err;
				console.log("\nXóa bị lỗi : " + err);
			}
			else {
				result += "\nĐã xóa : " + req.body.idChiNhanh;
				console.log("\nĐã xóa : " + req.body.idChiNhanh);
				KHU_VUC.findOneAndUpdate(
					{ Chi_Nhanh_id: { $in: [req.body.idChiNhanh] } },
					{ $pull: { Chi_Nhanh_id: req.body.idChiNhanh } },
					function (err) {
						if (err)
							result += "\nXóa chi nhánh trong khu vực gặp lỗi : " + err;
						else
							result += "\nXóa chi nhánh trong khu vực thành công !";
					}
				);
				CUA_HANG.findOneAndUpdate(
					{ Chi_Nhanh_id: { $in: [req.body.idChiNhanh] } },
					{ $pull: { Chi_Nhanh_id: req.body.idChiNhanh } },
					function (err) {
						if (err)
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
app.post("/addMonAn", urlEncodeParser, function (req, res) {
	if (req.body.idChiNhanh != null && req.body.Ten_mon_an != null && req.body.Mo_ta_mon_an != null
		&& req.body.Don_gia_mon_an != null && req.body.Hinh_anh_mon_an != null && req.body.Don_vi_tinh != null) {
		if (req.body.idChiNhanh != "" && req.body.Ten_mon_an != "" && req.body.Mo_ta_mon_an != ""
			&& req.body.Don_gia_mon_an != "" && req.body.Hinh_anh_mon_an != "" && req.body.Don_vi_tinh != "") {
			var newMonAn = new MON_AN({
				Ten_mon_an: req.body.Ten_mon_an,
				Mo_ta_mon_an: req.body.Mo_ta_mon_an,
				Don_gia_mon_an: req.body.Don_gia_mon_an,
				Hinh_anh_mon_an: req.body.Hinh_anh_mon_an,
				Don_vi_tinh: req.body.Don_vi_tinh
			});
			newMonAn.save(function (err) {
				if (err)
					res.send("Thêm món ăn mới bị lỗi !");
				else {
					var kqCreate = "Thêm món ăn mới thành công !\n";
					CHI_NHANH.findOneAndUpdate(
						{ _id: req.body.idChiNhanh },
						{ $push: { Mon_An_Tai_Chi_Nhanh_id: newMonAn._id } },
						function (err) {
							if (err)
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
//method POST
//params : idChiNhanh
app.post("/monan", urlEncodeParser, function (req, res) {
	if (req.body.idChiNhanh != null) {
		if (req.body.idChiNhanh != "") {
			CHI_NHANH.findOne({ _id: req.body.idChiNhanh }, function (err, result) {
				if (err)
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
app.get("/allmonan", function (req, res) {
	MON_AN.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách món ăn gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route lấy thông tin của một món ăn
//method POST
//params : idMonAn
//----------------------------------------------------------Tài khoản------------------------------------------------------------
//route đăng ký tài khoản
//method POST
//params : Ten_khach_hang, Tai_khoan, Mat_khau
app.post("/addKhachHang",urlEncodeParser,function(req,res){
	if(req.body.TenKhachHang!=null&& req.body.TaiKhoan!=null&& req.body.MatKhau!=null)
	{
		if(req.body.TenKhachHang!=""&& req.body.TaiKhoan!=""&& req.body.MatKhau!="")
		{
			KHACH_HANG.findOne({Tai_khoan: req.body.TaiKhoan},function(error,result){
				if(error)
				{
					console.log("Tìm tài khoảng bị lỗi !");
					res.send("-1");
				}
				else
				{
					if(!result)
					{
						var newKhachHang=new KHACH_HANG({
							Ten_khach_hang: req.body.TenKhachHang,
							Tai_khoan: req.body.TaiKhoan,
							Mat_khau: req.body.MatKhau,
							Don_hang_id:[],
							Ct_Gio_Hang_id:[]
						});
						newKhachHang.save(function(err){
							if(err)
							{
								console.log("Thêm tài khoảng bị lỗi !");
								res.send("-1");
							}
							else
							{
								console.log("Đăng ký tài khoảng thành công !");
								res.send("1");
							}
						});
					}
					else
					{
						console.log("Tài khoảng đã tồn tại !");
						res.send("-1");
					}
				}
			})
			
		}
					
	}
});

//route đăng nhập
//method POST
//params : TaiKhoan, MatKhau
app.post("/DangNhap",urlEncodeParser,function(req,res){
	if(req.body.TaiKhoan!=null&&req.body.MatKhau!=null)
	{
		if(req.body.TaiKhoan!=""&&req.body.MatKhau!="")
		{
			KHACH_HANG.findOne({Tai_khoan:req.body.TaiKhoan},function(error,result){
				if(error)
				{
					console.log("Lỗi tìm kiếm!");
					res.send("-1");
				} 
				else 
				{
					if(result == null)
					{
						console.log("Tên đăng nhập không chính xác.");
						res.send("-1");
					}
					else if(result.Tai_khoan == req.body.TaiKhoan && result.Mat_khau == req.body.MatKhau)
					{
						console.log("Đăng nhập thành công !");
						res.send(
							[
								{
									"token" : jwt.sign({Tai_khoan:result.Tai_khoan, Mat_khau:result.Mat_khau},"secretkey",{expiresIn:'20m'}),
									"name" : result.Ten_khach_hang
								}
							]
						);
					}
					else
						{
							console.log("Mật khẩu không chính xác !");
							res.send("-1");
						}
				}
			})
		}
	}
});



//----------------------------------------------------------------------GIỎ HÀNG-----------------------------------------------------


//route Chi tiết giỏ hàng của 1 tài khoản
//method POST
//Params: IDKhachHang

app.post("/getGioHang",urlEncodeParser,function(req,res){
	if(req.body.idKhachHang!=null)
	{
		if(req.body.idKhachHang!="")
		{
			KHACH_HANG.findOne({_id:req.body.idKhachHang},function(error,result){
				if(error)
				{
					res.send("Lỗi tìm kiếm!");
				} 
				else 
				{
					res.send(result.Ct_Gio_Hang_id);
				}
			});
		}
		else
		{
			res.send('Params error 2!')
		}
	}
	else
	{
		res.send('Params error 1!');
	}
});

//route load chi tiết giở hàng
//method POST
//Params : idChiTietGioHang

app.post("/CTGioHang",urlEncodeParser,function(req,res){
	if(req.body.idGioHang!=null)
	{
		if(req.body.idGioHang!="")
		{
			CHI_TIET_GIO_HANG.findOne({_id:req.body.idGioHang},function(error,result){
				if(error)
				{
					res.send("Lỗi tìm kiếm!");
				} 
				else 
				{
					res.send(result);
				}
			});
		}
		else
		{
			res.send('Params error 2!')
		}
	}
	else
	{
		res.send('Params error 1!');
	}
});

//------------------------------------------------------------------------ĐƠN HÀNG------------------------------------------------------

//route Dơn hàng của khách hàng
//method POST
//Params: IdKhachHang

app.post("/getDonHang",urlEncodeParser,function(req,res){
	if(req.body.idKhachHang!=null)
	{
		if(req.body.idKhachHang!="")
		{
			KHACH_HANG.findOne({_id:req.body.idKhachHang},function(error,result){
				if(error)
				{
					res.send("Lỗi tìm kiếm!");
				} 
				else 
				{
					res.send(result.Don_hang_id);
				}
			});
		}
		else
		{
			res.send('Params error 2!')
		}
	}
	else
	{
		res.send('Params error 1!');
	}
});


//route Thông tin đơn hàng
//method POST
//Params: IdDonHang

app.post("/DonHang",urlEncodeParser,function(req,res){
	if(req.body.idDonHang!=null)
	{
		if(req.body.idDonHang!="")
		{
			DON_HANG.findOne({_id:req.body.idDonHang},function(error,result){
				if(error)
				{
					res.send("Lỗi tìm kiếm!");
				} 
				else 
				{
					res.send(result);
				}
			});
		}
		else
		{
			res.send('Params error 2!')
		}
	}
	else
	{
		res.send('Params error 1!');
	}
});

//route load chi tiếtđơn hàng
//method POST
//Params : idChiTietDonHang

app.post("/CTDonHang",urlEncodeParser,function(req,res){
	if(req.body.idCTDonHang!=null)
	{
		if(req.body.idCTDonHang!="")
		{
			CHI_TIET_DON_HANG.findOne({_id:req.body.idCTDonHang},function(error,result){
				if(error)
				{
					res.send("Lỗi tìm kiếm!");
				} 
				else 
				{
					res.send(result);
				}
			});
		}
		else
		{
			res.send('Params error 2!')
		}
	}
	else
	{
		res.send('Params error 1!');
	}
});