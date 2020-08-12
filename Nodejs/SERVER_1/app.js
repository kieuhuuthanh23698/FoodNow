var express = require("express");
var bodyParser = require("body-parser");
const mongoose = require('mongoose');
const jwt = require("jsonwebtoken");
const publicIp = require('public-ip');
const secret_key = "2001160343"
const expireTime = "7d";

(async () => {
    console.log(await publicIp.v4());
    // console.log(await publicIp.v6());
})();

var urlEncodeParser = bodyParser.urlencoded({ extended: false });
var app = new express();
var multer = require('multer')
var diskStorage = multer.diskStorage({
	destination: function (req, file, callback) {
		callback(null, './Public/Images/')
	},
	filename: function (req, file, callback) {
		var uniqueSuffix = Date.now() + '-' + Math.round(Math.random() * 1E9);
		var oriname = file.originalname;
		oriname = oriname.replace(/\s/g, '');
		callback(null, uniqueSuffix + '_' + oriname);
	}
})
var uploadFile = multer({ storage: diskStorage }).single("upload_file");
const server = require('http').Server(app);
const io = require('socket.io')(server);

app.set("view engine", "ejs");
const geolib = require('geolib');
app.use("/Public", express.static('Public'));
app.use(function (req, res, next) {
	res.setHeader('Access-Control-Allow-Origin', '*');
	res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
	res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
	res.setHeader('Access-Control-Allow-Credentials', true);
	next();
});
// app.use(express.static(__dirname + '/Public/'));
server.listen(3000);



//tVn8kGPaRDD1Hq4j
// const connectString = 'mongodb://127.0.0.1:27017/?gssapiServiceName=mongodb';
const connectString = 'mongodb+srv://admin:tVn8kGPaRDD1Hq4j@cluster0-qozmr.mongodb.net/FoodNow?retryWrites=true&w=majority';

mongoose.connect(connectString,
	{ useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
	function (err) {
		if (err)
			console.log("MongoDb connect error : " + err);
		else
			console.log("MongoDb connect success !");
	}
);

function makeUsername(length) {
	var result           = '';
	var characters       = 'ABCDEF0123456789GHIJK0123456789LMN0123456789OPQRS0123456789TUV0123456789WXYZa0123456789bcde0123456789fghijklmn0123456789opqrs0123456789tuvwxyz0123456789';
	var charactersLength = characters.length;
	for ( var i = 0; i < length; i++ ) {
	   result += characters.charAt(Math.floor(Math.random() * charactersLength)).toLowerCase();
	}
	return "foodnow_" + result;
 }

console.log(makeUsername(5));

//firebase
var admin = require("firebase-admin");

var serviceAccount = require("./foodnow-276107-firebase-adminsdk-obm8q-93b9e410b5.json");

admin.initializeApp({
	credential: admin.credential.cert(serviceAccount),
	databaseURL: "https://foodnow-276107.firebaseio.com"
});

const db = admin.database();


const KHU_VUC = require("./Models/KHU_VUC");
const CHINHANH = require("./Models/CHINHANH");
const CUAHANG = require("./Models/CUAHANG");
const MON_AN = require("./Models/MON_AN");
const KHACH_HANG = require("./Models/KHACH_HANG");
const DON_HANG = require("./Models/DON_HANG");
const CHI_TIET_DON_HANG = require("./Models/CHI_TIET_DON_HANG");
const CHI_TIET_GIO_HANG = require('./Models/CT_GIO_HANG');
const KHUYENMAI_CUAHANG = require('./Models/KHUYENMAI_CUAHANG');
const KHUYENMAI_HETHONG = require('./Models/KHUYENMAI_HETHONG');
const DANHSACH_CUAHANG_HOMNAY = require('./Models/DANHSACH_CUAHANG_HOMNAY');
const DANHMUC_CUAHANG_TRANGCHU = require('./Models/DANHMUC_CUAHANG_TRANGCHU');
const DANHMUC_LOAIMONAN = require('./Models/DANHMUC_LOAIMONAN');
const DIACHI = require('./Models/DIACHI');
const LOAI_MONAN = require('./Models/LOAI_MONAN');
const MONAN_GOIY = require('./Models/MONAN_GOIY');
const QUANLY_NGUOIDUNG = require('./Models/QUANLY_NGUOIDUNG');
const QL_NHOM_NGUOIDUNG = require('./Models/QL_NHOM_NGUOIDUNG');
const LICH_SU_GIAO_DICH = require('./Models/LICH_SU_GIAO_DICH');

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

// const changeStream = CHINHANH.watch();
let list = [];

function getSocketIdWithIdParner(partnerID) {
	var result = list.find(item => item.partner_id === partnerID);
	if (result != null)
		return result.partner_id;
	return null;
}

// io.on("connect", function (socket) {
// 	socket.on('status_food', function (data) {
// 		// if (getSocketIdWithIdParner(data) == null) {
// 		// 	socket.join(data);
// 		// 	console.log("client with socket id " + socket.id + " just emit id user " + data);
// 		// 	var item = { socket_id: socket.id, partner_id: data };
// 		// 	list.push(item);
// 		// 	socket.emit("hello");
// 		// 	console.log('Connecting people are : ' + list.length);
// 		// }
// 	});
// });

const deleteCuaHang = async(idCuaHang, idChiNhanh) => {
	return new Promise((resolve, reject) => {
		CUAHANG.findById({
			_id : idCuaHang
		}, function(err, res){
			if(res == null){
				console.log(idChiNhanh.Ten_Chi_Nhanh);
				CHINHANH.findByIdAndUpdate({_id : idChiNhanh._id},
					{$pull: { DanhSach_CH : idCuaHang} },
				function(err1, res2){
					console.log(res);
				});
			}
			resolve("");
		})
	})
}

const deleteChiNhanh = async(idChiNhanh) => {
	return new Promise((resolve, reject) => {
		CHINHANH.findById({
			_id : idChiNhanh._id
		}, function(err, res){
			Promise.all(res.DanhSach_CH.map(function (idCuaHang) {
				return deleteCuaHang(idCuaHang, idChiNhanh);
			})).then(function (data) {
				resolve(data);
			});
		})
	})
}

CHINHANH.find({}, function (req, res){
	Promise.all(res.map(function (chinhanh) {
		return deleteChiNhanh(chinhanh);
	})).then(function (data) {
		console.log(data);
	});
});


app.post("/capNhatTrangThaiMonAn", urlEncodeParser, function (req, res) {
	if(req.body.idCuaHang == null || req.body.idMonAn == null || req.body.status == null ||
		req.body.idCuaHang == "" || req.body.idMonAn == "" || req.body.status == ""){
			return res.send({return_code : "0"});
	}
	MON_AN.findByIdAndUpdate({_id : mongoose.Types.ObjectId(req.body.idMonAn)}, {}, function (err, result) {
		if(err || result == null) {
			return res.send({return_code: "0"});
		} else {
			io.sockets.emit("status_food_change" + req.body.idCuaHang, {idCuaHang : req.body.idCuaHang, idMonAn : req.body.idMonAn, status : req.body.status});
			res.send({return_code: "1", infor: result});
		}
	});
});


app.get("/userLogin",function (req, res) {
	const token = jwt.sign({ "value" : "Thanh" }, secret_key, {
		algorithm: "HS256",
		expiresIn: expireTime,
	})
	res.send(token);
})


function verifyUser(req, res){
	try {
		var payload = jwt.verify(req.body.token, secret_key);
	} catch (e) {
		res.send({ return_code: "0", infor : e});
		return false;
	}
	//lấy thông tin khách hàng từ token để thực hiện request
	req.body.idKhachHang = payload.value;
	console.log("Xác thực thông tin khách hàng " + payload);
	if(req.body.idKhachHang == undefined){
		res.send({ return_code: "0"});
		return false;
	}
	//tính thời gian hiệu lực của token
	const nowUnixSeconds = Math.round(Number(new Date()) / 1000);
	var time = payload.exp - nowUnixSeconds;
	if (payload.exp - nowUnixSeconds > 30) {
		req.body.state_token = `Still old token, left ${time} seconds !`;
		return true;
	}
	//cấp mới token cho user trong lần request này
	const newToken = jwt.sign({ username: payload.value }, secret_key, {
		algorithm: "HS256",
		expiresIn: expireTime,
	})
	req.body.state_token = "New token is generated !";
	req.body.token = newToken;
	return true;
}

app.post("/userRequest", urlEncodeParser, function (req, res){
	if(!verifyUser(req, res))
		return;
	//token hợp lệ, thực hiện xử lý
	res.send({token : req.body.token, state_token : req.body.state_token, result : "Thực hiện request thành công"});
})


//giả sử user đặt hàng với id cửa hàng là req.body.idCuaHang ==> thông báo cho cửa hàng có id == req.body.idCuaHang biết 
app.post("/testHuyDonHang", urlEncodeParser,function (req, res) {
	// // This registration token comes from the client FCM SDKs.
	// db.ref().child("oders/" + req.body.idCuaHang).push({ key: String(result._id + "") }).then(() => {
	// 	console.log("Notification đặt hàng thành công !");
	// 	console.log("Xác nhận đơn hàng thành công !");
	// 	res.send({ return_code: "1" });
	// });;
	db.ref().child("token_list/" + req.body.idUser).on("value", function (snapshot) {
		var registrationToken = snapshot.val().token_divice;
		console.log(snapshot.val());
		var payload = {
			notification: {
			  title: req.body.title,
			  body: req.body.body
			}
		  };
		var options = {
			priority: "high",
			timeToLive: 60 * 60 *24
		};
		admin.messaging().sendToDevice(registrationToken, payload, options)
		.then((response) => {
			console.log('Successfully sent message:', response);
		}).catch((error) => {
			console.log('Error sending message:', error);
		});
		res.send("Notification done");
	}, function(errGetData){
		if(errGetData){

		}
	});
	// io.emit("hello");
	// var socket_id = getSocketIdWithIdParner(req.body.idCuaHang);
	// io.to(socket_id).emit('Thông tin từ người dùng : ' + req.body.infor);
	// io.sockets.in(socket_id).emit('dat_hang', req.body.infor);
	// console.log("Thông báo tới user có id : " + socket_id + " thông tin sau " + req.body.infor);
	// db.ref().child("remove_order_user/").push({ key: "helllo" }).then(() => {
	// 	console.log("Notification đặt hàng thành công !");
		// res.send("Đã gửi thông tin thành công !");
	// });;
});

// changeStream.on('change', (change) => {
// console.log(change);
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
// });

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
				$set: { Mo_ta_khu_vuc: req.body.value }
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

//tạo username auto
const createAccountStoreAuto = async (index) => {
	console.time(index + "-");
	var username = "FOODCH00000" + index;
	return new Promise(function (resolve, reject) {
		QUANLY_NGUOIDUNG.find(
			{Ten_dang_nhap: username},
			function (err, result) {
				console.timeEnd(index + "-");
				if(result.length == 0){
					var newAcc = new QUANLY_NGUOIDUNG({
						Ten_dang_nhap: username,
						Mat_khau: username,
						Trang_thai: "1"
					});
					newAcc.save(function(err, resultAcc) {
						QL_NHOM_NGUOIDUNG.findOneAndUpdate(
							{Ten_nhom : "Cuahang"},
							{$push : { DanhSach_NguoiDung: newAcc._id }}, 
							function(err, result){
								resolve(resultAcc);
							});
					})
				} else {
					resolve(createAccountStoreAuto(index + 1));
				}
			}
		);
	});
}

//tạo địa chỉ cho cửa hàng
const createAddressStore = async (address, lat, lng) => {
	return new Promise(function (resolve, reject) {
		var newDiaChi = new DIACHI({
			Dia_Chi: address,
			Vi_do: lat,
			Kinh_do: lng,
		});
		newDiaChi.save(function(errDC, resDC){
			resolve(resDC);
		});
	});
}

//route thêm cửa hàng
//method POST
//param : Ten_cua_hang, Dia_chi_cua_hang_chinh, So_dien_thoai_cua_hang, Mo_ta_cua_hang
app.post("/addCuaHang", urlEncodeParser, function (req, res) {
	uploadFile(req, res, (error) => {
	if (req.body.Ten_cua_hang != null && req.body.Dia_Chi_Cua_Hang != null
		&& req.body.So_dien_thoai_cua_hang != null && req.file != null
		&& req.body.idChiNhanhDK != null && req.body.lat != null 
		&& req.body.lat != null  && req.body.lng != null && req.body.Ho_Ten_Nguoi_Dai_Dien != null 
		&& req.body.CMND_Nguoi_Dai_Dien != null  && req.body.Email_Nguoi_Dai_Dien != null 
		&& req.body.Thoi_Gian_Bat_Dau != null  && req.body.Thoi_Gian_Ket_Thuc != null 

		&& req.body.Ten_cua_hang != "" && req.body.Dia_Chi_Cua_Hang != ""
		&& req.body.So_dien_thoai_cua_hang != "" && req.file.filename != ""
		&& req.body.idChiNhanhDK != "" && req.body.lat != ""
		&& req.body.lat != "" && req.body.lng != "" && req.body.Ho_Ten_Nguoi_Dai_Dien != ""
		&& req.body.CMND_Nguoi_Dai_Dien != "" && req.body.Email_Nguoi_Dai_Dien != ""
		&& req.body.Thoi_Gian_Bat_Dau != "" && req.body.Thoi_Gian_Ket_Thuc != ""){
			Promise.all([
				createAccountStoreAuto(1),
				createAddressStore(req.body.Dia_Chi_Cua_Hang, req.body.lat, req.body.lng)
			]).then(function createAccountAuto(data) {
				console.log("tao tai khoan, dia chi", data);
				var newCuaHang = new CUAHANG({
					Ten_Cua_Hang: req.body.Ten_cua_hang,
					Dia_Chi_Cua_Hang: data[1]._id,
					So_Dien_Thoai:req.body.So_dien_thoai_cua_hang,
					Mo_Ta_Cua_Hang: req.body.Mo_Ta_Cua_Hang,
					Thoi_Gian_Bat_Dau: req.body.Thoi_Gian_Bat_Dau,
					Thoi_Gian_Ket_Thuc: req.body.Thoi_Gian_Ket_Thuc,
					Ho_Ten_Nguoi_Dai_Dien: req.body.Ho_Ten_Nguoi_Dai_Dien,
					Email_Nguoi_Dai_Dien: req.body.Email_Nguoi_Dai_Dien,
					CMND_Nguoi_Dai_Dien: req.body.CMND_Nguoi_Dai_Dien,
					Danh_Gia: "0",
					Hinh_Anh_Cua_Hang: req.file.filename,
					Trang_Thai_Cua_Hang: "0",
					Tai_Khoan: data[0]._id,
					Khuyen_Mai_CH: [],
					Thong_Tin_KH_Dat_Don: [],
					Loai_MonAn: []
				});
				newCuaHang.save(function (err, resultCH) {
					if (err){
						console.log("Thêm cửa hàng mới bị lỗi : " + err);
						res.send({return_code: "0"})
					}
					else{
						CHINHANH.findByIdAndUpdate({
							_id: mongoose.Types.ObjectId(req.body.idChiNhanhDK)
						},
						{$push: {DanhSach_CH : resultCH._id}},
						function(errCN, resultCN){
							if(errCN){
								console.log("Thêm cửa hàng vào chi nhánh gặp lỗi !");
								res.send({return_code: "0"});
							} else {	
								console.log("Thêm cửa hàng mới thành công !");
								res.send({return_code: "1", infor: resultCH});
							}
						})
					}
				});
			});
	}
	else{
		console.log("Params error 1");
		res.send({return_code: "0"});
	}
	});
});



//route get danh sách cửa hàng
app.get("/cuahang", function (req, res) {
	CUAHANG.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách cửa hàng gặp lỗi !");
		else
			res.send(items);
	});
});

//xác định xem cửa hàng này có nằm trong danh mục chưa
const getDiaChiCuaHang = async (iCUAHANG) => {
	console.log(iCUAHANG);
	return new Promise(function (resolve, reject) {
		DIACHI.findById({_id : mongoose.Types.ObjectId(iCUAHANG.Dia_Chi_Cua_Hang)},function(err, success){
			console.log(err, success);
			if(err || success == null){
				resolve(null);
			} else{
				resolve({CH : iCUAHANG, DiaChi : success});
			}
		})
	});
}

//route get danh sách cửa hàng của 1 chi nhánh
app.post("/cuahangs_chinhanh", urlEncodeParser ,function (req, res) {
	CHINHANH.aggregate(
		[
			{ 
				"$match" : { 
					"_id" : mongoose.Types.ObjectId(req.body.idChiNhanh)
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "cuahangs", 
					"localField" : "DanhSach_CH", 
					"foreignField" : "_id", 
					"as" : "listCH"
				}
			}
		],function (err, result){
			if(err || result.length == 0){
				res.send({return_code: "0"});
			} else{
				console.log(result);
				Promise.all(result[0].listCH.map(function (iCUAHANG) {
					return getDiaChiCuaHang(iCUAHANG);
				})).then(function (data) {
					console.log(data);
					res.send({return_code: "1", infor : data})
				});
			}
		}
	);
	
});

//-------------------------------------------------------------------CHI NHÁNH----------------------------------------------------------------
//route thêm chi nhanh
//method POST
//params  : idkhuvuc, idcuahang, ten, diachi, sdt, mota
app.post("/addChiNhanh", urlEncodeParser, function (req, res) {
	uploadFile(req, res, (error) => {
	if (req.body.Ten_chi_nhanh != null && req.file.filename != null && req.body.Ten_chi_nhanh != "" && req.file.filename != "") {
			var newChiNhanh = new CHINHANH({
				Ten_Chi_Nhanh: req.body.Ten_chi_nhanh,
				Hinh_Anh_Chi_Nhanh: req.file.filename,
				Tai_Khoan: null,
				DanhSach_CH: [],
			});
			newChiNhanh.save(function (err) {
				if (err){
					console.log("Thêm chi nhánh mới bị lỗi : " + err);
					res.send({ return_code: "0" });
				}
				else {
					console.log("Thêm chi nhánh mới thành công !");
					res.send({ return_code: "1" });
				}
			});
	}
	else{
		console.log("Params error!");
		res.send({return_code : "0"});
	}
	});
});

//route lấy tất cả các chi nhánh
//method GET
app.get("/chinhanh", function (req, res) {
	CHINHANH.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách chi nhánh gặp lỗi : " + err);
		else
			res.send(items);
	});
});

//route get chi nhánh của cửa hàng
//method POST
//params : idCuaHang
app.post("/ChiNhanhCuaCuaHang", urlEncodeParser, function (req, res) {
	if (req.body.idCuahang != null) {
		if (req.body.idChiNhanh != "") {
			CUAHANG.findOne({ _id: req.body.idCuahang }, function (err, result) {
				if (err)
					res.send("Lấy thông tin chi nhánh gặp lỗi !" + err);
				else
					res.send(result.Chi_Nhanh_id);
			});
		}
		else {
			res.send('Params error 2!')
		}

	}
	else {
		res.send('Params error 1!')
	}

});

//route get 1 chi nhánh
//method POST
//params : idChiNhanh
app.post("/OneChiNhanh", urlEncodeParser, function (req, res) {
	CHINHANH.findById({ _id: req.body.idChiNhanh }, function (err, result) {
		if (err)
			res.send("Lấy thông tin chi nhánh gặp lỗi !" + err);
		else
			res.send(result);
	});
});


//deactive hoạt động của cửa hàng
const xoaCuaHang = async (idCuaHang) => {
	const label = Date.now();
	return new Promise(function (resolve, reject) {
		CUAHANG.findByIdAndUpdate({
			_id: mongoose.Types.ObjectId(idCuaHang),
			Trang_Thai_Cua_Hang : "0",
		}, function (err, result) {
			resolve(result);
		});
	});
}


//xóa tài khoản
//pull tk khỏi nhóm

//route deactive các cửa hàng của 1 chi nhánh
//method POST
//params idChiNhanh
app.delete("/deleteChiNhanh", urlEncodeParser, function (req, res) {
	if(req.body.idChiNhanh == null && req.body.idChiNhanh == "")
	{
		console.log("Params error !");
		res.send({ return_code : "0"});
	}
	CHINHANH.findById(
		{ _id: mongoose.Types.ObjectId(req.body.idChiNhanh) },
		function (err, resultCN) {
			if (err || resultCN == null) {
				console.log("Xóa bị lỗi !");
				res.send({ return_code : "0"});
			}
			else {
				Promise.all(
					resultCN.DanhSach_CH.map(function (idCuaHang) {
						return xoaCuaHang(idCuaHang);
					}))
					.then(function (resolveXoaCH) {
						console.log("\nĐã xóa chi nhánh : " + resultCN.Ten_Chi_Nhanh);
						res.send({return_code: "1"});
					}
				);
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
					CHINHANH.findOneAndUpdate(
						{ _id: req.body.idChiNhanh },
						{ $push: { Mon_An_Tai_CHINHANH_id: newMonAn._id } },
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
			CHINHANH.findOne({ _id: req.body.idChiNhanh }, function (err, result) {
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
app.post("/addKhachHang", urlEncodeParser, function (req, res) {
	if (req.body.TenKhachHang != null && req.body.TaiKhoan != null && req.body.MatKhau != null) {
		if (req.body.TenKhachHang != "" && req.body.TaiKhoan != "" && req.body.MatKhau != "") {
			KHACH_HANG.findOne({ Tai_khoan: req.body.TaiKhoan }, function (error, result) {
				if (error) {
					console.log("Tìm tài khoảng bị lỗi !");
					res.send("-1");
				}
				else {
					if (!result) {
						var newKhachHang = new KHACH_HANG({
							Ten_khach_hang: req.body.TenKhachHang,
							Tai_khoan: req.body.TaiKhoan,
							Mat_khau: req.body.MatKhau,
							Don_hang_id: [],
							Ct_Gio_Hang_id: []
						});
						newKhachHang.save(function (err) {
							if (err) {
								console.log("Thêm tài khoảng bị lỗi !");
								res.send("-1");
							}
							else {
								console.log("Đăng ký tài khoảng thành công !");
								res.send("1");
							}
						});
					}
					else {
						console.log("Tài khoảng đã tồn tại !");
						res.send("-1");
					}
				}
			})

		}

	}
});


function getUserInfor(khachHang, res){
	KHACH_HANG.aggregate(
		[
			{
				"$match": {
					"_id": khachHang._id
				}
			},
			{
				"$lookup": {
					"from": "diachis",
					"localField": "Dia_chi_nha",
					"foreignField": "_id",
					"as": "Dia_chi_nha_ex"
				}
			},
			{
				"$lookup": {
					"from": "diachis",
					"localField": "Dia_chi_cong_ty",
					"foreignField": "_id",
					"as": "Dia_chi_cong_ty_ex"
				}
			},
			{
				"$lookup": {
					"from": "diachis",
					"localField": "Dia_chi_khac",
					"foreignField": "_id",
					"as": "Dia_chi_khac_ex"
				}
			}
		], function (err, result) {
			if (result != null && result.length > 0) {
				console.log("Đăng nhập thành công !");
				// console.log({
				// token: jwt.sign({ Tai_khoan: khachHang.id_user }, "secretkey", { expiresIn: '20m' }),
				// infor: khachHang,
				// Dia_chi_nha_ex: result[0].Dia_chi_nha_ex[0] == null ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_nha_ex[0] },
				// Dia_chi_cong_ty_ex: result[0].Dia_chi_cong_ty_ex[0] == null ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_cong_ty_ex[0] },
				// Dia_chi_khac_ex: result[0].Dia_chi_khac_ex.length == 0 ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_khac_ex }
				// });
				var tk = jwt.sign({ value: khachHang._id }, secret_key, { expiresIn: expireTime });
				console.log(tk);
				res.send(
					{
						return_code: "1",
						// token: jwt.sign({ idKhachHang: khachHang._id }, secret_key, { expiresIn: expireTime }),
						token: tk,
						infor: khachHang,
						Dia_chi_nha_ex: result[0].Dia_chi_nha_ex[0] == null ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_nha_ex[0] },
						Dia_chi_cong_ty_ex: result[0].Dia_chi_cong_ty_ex[0] == null ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_cong_ty_ex[0] },
						Dia_chi_khac_ex: result[0].Dia_chi_khac_ex.length == 0 ? { flag: "0" } : { flag: "1", data: result[0].Dia_chi_khac_ex }
					}
				);
			}
		}
	);
}

const createUsernameAuto = async (username) => {
	return new Promise(function (resolve, reject) {
		KHACH_HANG.find(
			{Ten_dang_nhap: username},
			function (err, result) {
				if(result.length == 0){
					resolve(username);
				} else {
					resolve(makeUsername(5));
				}
			}
		);
	});
}

const updateUsernameAuto = async (user) => {
	return new Promise((resolve, reject) => {
		Promise.all([
			createUsernameAuto(makeUsername(5)),
		]).then(function createAccountAuto(data) {
			user.Ten_dang_nhap = data[0];
			// var mk = String(user._id);
			// user.Mat_khau = "01010101";
			user.save(function(err, res){
				if(err){
					resolve(null);
				} else{
					resolve(user.Ten_khach_hang);
				}
			});
		});
	})	
}

// KHACH_HANG.find({}, async function(err, result){
// 	Promise.all(
// 		result.map(function (user) {
// 			return updateUsernameAuto(user);
// 		}))
// 		.then(function (resolveCH) {
// 			console.log(resolveCH);
// 		});
// }
// );


//route đăng nhập
//method POST
//params : id, name, email, img
app.post("/DangNhap", urlEncodeParser, function (req, res) {
	var response = { return_code: "0", error_infor: "Miss params." };
	if(req.body.type == null || req.body.type == ""){
		return res.send(response);
	}
	var condition = {};
	if(req.body.type == "0" || req.body.type == "1"){
		if (req.body.id != null && req.body.name != null && req.body.id != "" && req.body.name != "") {
			condition = { id_user: req.body.id };
		} else {
			return res.send(response);
		}
	} else if(req.body.type == "2"){
		if (req.body.Ten_dang_nhap != null && req.body.Mat_khau != null && req.body.Ten_dang_nhap != "" && req.body.Mat_khau != "") {
			condition = { Ten_dang_nhap: req.body.Ten_dang_nhap, Mat_khau :  req.body.Mat_khau};
		} else {
			return res.send(response);
		}
	} if(req.body.type == "3"){
		if (req.body.token != null && req.body.token != "") {
			if(verifyUser(req, res)){
				condition = { _id: mongoose.type.ObjectId(req.body.idKhachHang) };
			}
		} else {
			return res.send(response);
		}
	}
	KHACH_HANG.findOne(condition, function (error, khachHang) {
		if (error) {
			console.log("Xảy lỗi tìm kiếm khách hàng : " + error);
			response = { return_code: "0", error_infor: "Lỗi server khi query." };
			res.send(response);
		}
		else {
			if (khachHang == null && (req.body.type == "0" || req.body.type == "1")) {
				console.log("Đăng ký khách hàng mới !");
				Promise.all([
					createUsernameAuto(makeUsername(5)),
				]).then(function createAccountAuto(data) {
					var newKhachHang = new KHACH_HANG({
						id_user: req.body.id,
						Ten_khach_hang: req.body.name,
						So_dien_thoai: "",
						Email: req.body.email,
						Ngay_sinh: req.body.birthday,
						Gioi_tinh: req.body.gender,
						Hinh_anh_khach_hang: req.body.picture,
						Dia_chi_nha: null,
						Dia_chi_cong_ty: null,
						Dia_chi_khac: [],
						Ten_dang_nhap : data[0],
						Mat_khau : "01010101",
						Cua_hang_yeu_thich: [],
						Don_hang_id: [],
						Ct_Gio_Hang_id: []
					});
					newKhachHang.save(function (err, khachHang) {
						if (err) {
							console.log("Đăng ký khách hàng mới bị lỗi :" + err);
							response = { return_code: "0", error_infor: "Lỗi server khi đăng ký khách hàng." };
							res.send(response);
						}
						else {
							console.log("Đăng ký tài khoảng thành công :" + khachHang);
							getUserInfor(khachHang, res);	
						}
					});
				});
			} else if(khachHang == null && req.body.type == "2"){
				return res.send(response);
			}else if(khachHang != null){
				console.log("Đăng nhập tài khoảng thành công !");
				getUserInfor(khachHang, res);
			}
		}
	});
});



//----------------------------------------------------------------------GIỎ HÀNG-----------------------------------------------------


//route Chi tiết giỏ hàng của 1 tài khoản
//method POST
//Params: IDKhachHang

app.post("/getGioHang", urlEncodeParser, function (req, res) {
	if (req.body.idKhachHang != null) {
		if (req.body.idKhachHang != "") {
			KHACH_HANG.findOne({ _id: req.body.idKhachHang }, function (error, result) {
				if (error) {
					res.send("Lỗi tìm kiếm!");
				}
				else {
					res.send(result.Ct_Gio_Hang_id);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});

//route load chi tiết giở hàng
//method POST
//Params : idChiTietGioHang

app.post("/CTGioHang", urlEncodeParser, function (req, res) {
	if (req.body.idGioHang != null) {
		if (req.body.idGioHang != "") {
			CHI_TIET_GIO_HANG.findOne({ _id: req.body.idGioHang }, function (error, result) {
				if (error) {
					res.send("Lỗi tìm kiếm!");
				}
				else {
					res.send(result);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});

//------------------------------------------------------------------------ĐƠN HÀNG------------------------------------------------------

//route Dơn hàng của khách hàng
//method POST
//Params: IdKhachHang

app.post("/getDonHang", urlEncodeParser, function (req, res) {
	if (req.body.idKhachHang != null) {
		if (req.body.idKhachHang != "") {
			KHACH_HANG.findOne({ _id: req.body.idKhachHang }, function (error, result) {
				if (error) {
					res.send("Lỗi tìm kiếm!");
				}
				else {
					res.send(result.Don_hang_id);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});


//route Thông tin đơn hàng
//method POST
//Params: IdDonHang

app.post("/DonHang", urlEncodeParser, function (req, res) {
	if (req.body.idDonHang != null) {
		if (req.body.idDonHang != "") {
			DON_HANG.findOne({ _id: req.body.idDonHang }, function (error, result) {
				if (error) {
					res.send("Lỗi tìm kiếm!");
				}
				else {
					res.send(result);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});

//route load chi tiếtđơn hàng
//method POST
//Params : idChiTietDonHang

app.post("/CTDonHang", urlEncodeParser, function (req, res) {
	if (req.body.idCTDonHang != null) {
		if (req.body.idCTDonHang != "") {
			CHI_TIET_DON_HANG.findOne({ _id: req.body.idCTDonHang }, function (error, result) {
				if (error) {
					res.send("Lỗi tìm kiếm!");
				}
				else {
					res.send(result);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});


//route get danh mục loại món ăn
//method get
app.get("/getDanhmucloaimonan", function (req, res) {
	DANHMUC_LOAIMONAN.find(
		function (err, items) {
			if (err) {
				res.send({ err: "Lấy danh mục loại món ăn lỗi", return_code: "0" });

			}

			else {
				res.send({items, return_code: "1" });

			}

		}
	);
});

//route get CUAHANG trong DANHMUC_LOAIMONAN
//method post(truyền vào ID)
//Params: idDanhmucloaimonan

app.post("/Danhmucloaimonan", urlEncodeParser, function (req, res) {
	if (req.body.idDanhmucloaimonan != null) {
		if (req.body.idDanhmucloaimonan != "") {
			DANHMUC_LOAIMONAN.findById({ '_id': req.body.idDanhmucloaimonan }, function (err, danhMucLoaiMonAn) {
				if (err) {
					res.send("Lấy danh sách cửa hàng trong danh mục loại món ăn : " + err);
				}
				else {
					CUAHANG.find({ '_id': { $in: danhMucLoaiMonAn.DanhSach_CH } },
						function (err, listCuaHang) {
							if (err)
								res.send("Lấy danh sách chi nhánh gặp lỗi : " + err);
							else
								res.send(listCuaHang);
						}
					);
				}
			});
		}
		else {
			res.send('Params error 2!')
		}
	}
	else {
		res.send('Params error 1!');
	}
});

//route Hienthicuahangtrongdanhmuctrangchu
app.post("/Hienthicuahangtrongdanhmuctrangchu", urlEncodeParser, function (req, res) {
	DANHMUC_CUAHANG_TRANGCHU.aggregate(
		[
			{ 
				"$match" : { 
					"_id" :  mongoose.Types.ObjectId(req.body.idDanhmuccuahangtrangchu)
				}
			}, 
			{ 
				"$project" : { 
					"DanhSach_CH" : 1.0
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "cuahangs", 
					"localField" : "DanhSach_CH", 
					"foreignField" : "_id", 
					"as" : "CuaHang_TrangChu"
				}
			}, 
			{ 
				"$project" : { 
					"CuaHang_TrangChu" : 1.0, 
					"_id" : 0.0
				}
			}, 
			{ 
				"$unwind" : { 
					"path" : "$CuaHang_TrangChu"
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "diachis", 
					"localField" : "CuaHang_TrangChu.Dia_Chi_Cua_Hang", 
					"foreignField" : "_id", 
					"as" : "DiaChi_CH"
				}
			}
		], 
		function (err, result) {
			if (err) {
				console.log("Load lỗi");
				res.send({ return_code: "0" , infor:"Lỗi không load được cửa hàng"});
			}

			else {
				console.log("Load thành công!");
				res.send({ return_code: "1" , result});
			}

		}
	);
});


//route Hienthicuahangtrongdanhmucloaimonan
app.post("/Hienthicuahangtrongdanhmucloaimonan", urlEncodeParser, function (req, res) {
	DANHMUC_LOAIMONAN.aggregate(
		[
			{ 
				"$match" : { 
					"_id" :  mongoose.Types.ObjectId(req.body.idDanhmucloaimonan)
				}
			}, 
			{ 
				"$project" : { 
					"DanhSach_CH" : 1.0
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "cuahangs", 
					"localField" : "DanhSach_CH", 
					"foreignField" : "_id", 
					"as" : "CuaHang_LoaiMonAn"
				}
			}, 
			{ 
				"$project" : { 
					"CuaHang_LoaiMonAn" : 1.0, 
					"_id" : 0.0
				}
			}, 
			{ 
				"$unwind" : { 
					"path" : "$CuaHang_LoaiMonAn"
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "diachis", 
					"localField" : "CuaHang_LoaiMonAn.Dia_Chi_Cua_Hang", 
					"foreignField" : "_id", 
					"as" : "DiaChi_CH"
				}
			}
		], 
		function (err, result) {
			if (err) {
				console.log("Load lỗi");
				res.send({ return_code: "0" , infor:"Lỗi không load được cửa hàng"});
			}

			else {
				console.log("Load thành công!");
				res.send({ return_code: "1" , result});
			}

		}
	);
});


//route get CUAHANG trong DANHSACH_CUAHANG_HOMNAY
//method post(truyền vào ID)
//Params: idDanhsachcuahanghomnay

app.post("/Danhsachcuahanghomnay_hienthicuahang", urlEncodeParser, function (req, res) {
	DANHSACH_CUAHANG_HOMNAY.aggregate(
		[
			{
				"$match": {
					"_id": mongoose.Types.ObjectId(req.body.idDanhsachcuahanghomnay)
				}
			},
			{
				"$project": {
					"DanhSach_CH": 1.0
				}
			},
			{
				"$lookup": {
					"from": "cuahangs",
					"localField": "DanhSach_CH",
					"foreignField": "_id",
					"as": "CuaHang_HomNay"
				}
			},
			{
				"$project": {
					"CuaHang_HomNay": 1.0,
					"_id": 0.0
				}
			},
			{
				"$unwind": {
					"path": "$CuaHang_HomNay"
				}
			},
			{
				"$lookup": {
					"from": "diachis",
					"localField": "CuaHang_HomNay.Dia_Chi_Cua_Hang",
					"foreignField": "_id",
					"as": "DiaChi_CH"
				}
			}
		],
		function (err, result) {
			if (err) {
				res.send({return_code: "0"});
			}

			else {
				res.send({return_code: "1", infor : result});
			}

		}
	);
});

//route get CUAHANG trong KHUYENMAI_HETHONG
//method post(truyền vào ID)
//Params: idKhuyenmaihethong

// app.post("/Khuyenmaihethong", urlEncodeParser, function (req, res) {
// 	if (req.body.idKhuyenmaihethong != null || req.body.idKhuyenmaihethong != "") {
// 		KHUYENMAI_HETHONG.findById({ '_id': req.body.idKhuyenmaihethong }, function (err, KhuyenMaiHeThong) {
// 			if (err) {
// 				res.send("Lấy danh sách cửa hàng trong khuyến mãi hệ thống : " + err);
// 			}
// 			else {
// 				CUAHANG.find({ '_id': { $in: KhuyenMaiHeThong.DanhSach_CH } },
// 					function (err, listCuaHang) {
// 						if (err)
// 							res.send("Lấy danh sách cửa hàng gặp lỗi : " + err);
// 						else
// 							res.send(listCuaHang);
// 					}
// 				);
// 			}
// 		});
// 	} else{
// 		res.send('Params error 1!');
// 	}
// });




//route post KHUYENMAICUAHANG trong CUAHANG
//method post(truyền vào ID)
//Params: idCuahang
app.post("/KhuyenMaiCuaHang", urlEncodeParser, function (req, res) {
	CUAHANG.findById({ '_id': mongoose.Types.ObjectId(req.body.idCuahang) }, function (err, KhuyenMaiCuaHang) {
		if (err) {
			res.send("Lấy danh sách khuyến mãi cửa hàng : " + err);
		}
		else {
			if (KhuyenMaiCuaHang != null && KhuyenMaiCuaHang.Khuyen_Mai_CH != null) {
				KHUYENMAI_CUAHANG.find({ '_id': { $in: KhuyenMaiCuaHang.Khuyen_Mai_CH } },
					function (err, listKhuyenMai) {
						if (err || listKhuyenMai.length == 0){
							console.log("Lấy danh sách khuyến mãi  gặp lỗi : " + err);
							res.send({
								return_code: "0",
								error_infor: "Cửa hàng không có khuyến mãi !"
							});
						}
						else {
							res.send({
								return_code: "1",
								infor: listKhuyenMai
							});
						}
					}
				);
			} else {
				res.send({
					return_code: "0",
					error_infor: "Cửa hàng không có khuyến mãi !"
				});
			}
		}
	});

});



app.get("/DanhMucCuaHang", function (req, res) {
	DANHMUC_CUAHANG_TRANGCHU.aggregate([{
		$lookup: {
			from: 'cuahangs',
			localField: 'DanhSach_CH',
			foreignField: '_id',
			as: 'lstCH'
		}
	}], function (err, data) {
		if (err)
			res.send(err);
		else
			res.send(data);
	});
});

//Hiển thị thông tin cửa hàng và cả danh sách khuyến mãi nằm trong cửa hàng//

// app.get("/KhuyenMaiCuaHang", function(req,res){
// 	CUAHANG.aggregate(
// 		[{
// 			$lookup : {
// 				from: "khuyenmai_cuahangs",
// 				localField: "Khuyen_Mai_CH",
// 				foreignField:"_id",
// 				as: "lstKhuyenMai"
// 			}
// 		}], 
// 		function(err, ketQua){
// 			if(err)
// 			res.send(err);
// 			else
// 			res.send(ketQua);
// 		});

// });


// });


const getThongTinCuaHang = async (req, res, error_query) => {
	// const label = Date.now();
	// console.time("getThongTinCuaHang" + label);
	return new Promise(function (resolve, reject) {
		CUAHANG.aggregate(
			[
				{ $match: { _id: mongoose.Types.ObjectId(req.body.idCuahang) } },
				{
					$lookup: {
						from: 'khuyenmai_cuahangs',
						localField: 'Khuyen_Mai_CH',
						foreignField: '_id',
						as: 'thongTinKM'
					}
				},
				{
					$lookup: {
						from: 'diachis',
						localField: 'Dia_Chi_Cua_Hang',
						foreignField: '_id',
						as: 'diachiCH'
					}
				}
			]
			, function (err, result) {
				if (err) {
					console.log(err);
					// res.send(error_query);
					resolve(null);
				}
				else {
					if (result != null && result.length > 0 && result[0].diachiCH.length > 0){
						resolve(result[0]);
					}
					else {
						console.log("Không tìm thấy cửa hàng");
						// res.send(error_query);
						resolve(null);
					}
					// console.timeEnd("getThongTinCuaHang" + label);
				}
			});
	});
}
const getDanhSachMonAnCuaHang = async (req, res, error_query) => {
	// const label = Date.now();
	// console.time("getDanhSachMonAnCuaHang" + label);
	return new Promise(function (resolve, reject) {
		CUAHANG.findById(
			{ _id: mongoose.Types.ObjectId(req.body.idCuahang) },
			function (err, cuaHang) {
				if (err) {
					console.log(err);
					resolve(null);
				}
				else {
					if (cuaHang != null && cuaHang.Loai_MonAn.length > 0) {
						LOAI_MONAN.aggregate(
							[
								{ $match: { _id: { $in: cuaHang.Loai_MonAn } } },
								{
									$lookup: {
										from: 'mon_ans',
										localField: 'Danh_sach_mon_an',
										foreignField: '_id',
										as: 'monans'
									}
								},
								{ $project: { 'Ten_loai_mon_an': 1, 'monans': 1 } }
							], function (err, monans) {
								if (err) {
									console.log(err);
									resolve(null);
								}
								else {
									if (monans != null && monans.length > 0) {
										resolve(monans);
										// console.timeEnd("getDanhSachMonAnCuaHang" + label);
									} else {
										resolve(null);
									}
								}
							}
						);
					} else {
						resolve(null);
					}
				}
			}
		);
	});
}

const getDanhSachMonAnDonTam = async (req, res, error_query) => {
	// const label = Date.now();
	// console.time("getDanhSachMonAnDonTam" + label);
	return new Promise(function (resolve, reject) {
		if (req.body.idKhachHang != null && req.body.idKhachHang != "") {
			DON_HANG.find(
				{ "IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang), "IdCuaHang": mongoose.Types.ObjectId(req.body.idCuahang), "Trang_thai_don_hang": "0" },
				function (err, resultDH) {
					if (err) {
						console.log("Tìm đơn hàng gặp lỗi :" + err);
						resolve({ return_code: "0", error_infor: "Lấy đơn hàng tạm tại cửa hàng thất bại !" });
					} else {
						if (resultDH != null && resultDH.length >= 1) {
							console.log("Tìm thấy đơn hàng");
							resolve({ return_code: "1", infor: resultDH[0].Chi_tiet_DH });
						} else {
							resolve({ return_code: "0", error_infor: "Bạn bạn không có đơn tạm tại cửa hàng !" });
						}
					}
				}
			);
		} else {
			resolve({ return_code: "0", error_infor: "Bạn bạn không có đơn tạm tại cửa hàng !" });
		}
		// console.timeEnd("getDanhSachMonAnDonTam" + label);
	});
}

//route lấy thông tin cửa hàng : thông tin cơ bản của cửa hàng và danh sách các món ăn có trong đơn tạm của khách hàng (nếu có)
//params: idCuahang, idKhachHang
app.post("/thongTinCuaHang", urlEncodeParser, async function (req, res) {
	console.log(req.body);
	var error_query = { return_code: "0", error_infor: "Lỗi server khi query." };
	if(req.body.idCuahang == null || req.body.idCuahang == ""){
		console.log("Error params !");
		return res.send(error_query);
	}
	let response = {};
	const label = Date.now();
	console.time("thongTinCuaHang" + label);
	console.log("Tìm thông tin cửa hàng có id : " + req.body.idCuahang);
	await Promise.all([
		getThongTinCuaHang(req, res, error_query),
		getDanhSachMonAnCuaHang(req, res, error_query),
		getDanhSachMonAnDonTam(req, res, error_query),
		getKMHeThongCuaCuaHang(req.body.idCuahang),
	]).then(function (data) {
		console.timeEnd("thongTinCuaHang" + label);
		if(data[0] == null || data[1] == null){
			console.log("Lấy thông tin cửa hàng thất bại !");
			return res.send(error_query);
		}
		console.log("Lấy thông tin cửa hàng thành công !");
		response.return_code = "1";
		response.thongTinCuaHang = data[0];
		response.lstMonAn = data[1];
		response.DonHang = data[2];
		response.listKMHT = (data[3] == null ? [] : data[3]);
		res.send(response);
	});
});


//route get khuyến mãi hệ thống
//method get
app.get("/Danhsachkhuyenmaihethong", function (req, res) {
	KHUYENMAI_HETHONG.find(
		function (err, items) {
			if (err)
				res.send("Lấy danh sách khuyến mãi hệ thống" + err);
			else
				res.send(items);
		}
	);
});


//route get Danhsachcuahanghomnayhienthi
//method get
app.get("/Danhsachcuahanghomnayhienthi", function (req, res) {
	DANHSACH_CUAHANG_HOMNAY.find(
		function (err, result) {
			if (err) {
				res.send("Lấy danh sách gặp lỗi" + err);
				return_code: "0"
			}

			else {
				res.send(result);
				return_code: "1"
			}

		}
	);
});

//route addDanhsachcuahanghomnay
//method POST
//params  : chuDechinh
app.post("/addDanhsachcuahanghomnay", urlEncodeParser, function (req, response) {
	uploadFile(req, response, (error) => {
	console.log(JSON.stringify(req.body));
	if (req.body.Thongtin_Chinh != null && req.body.Thongtin_Chinh != "" && req.body.Thongtin_Phu != null && req.body.Thongtin_Phu != "" && req.file != null && req.file.filename != "") {
		var newDanhMuc_CHHN = new DANHSACH_CUAHANG_HOMNAY({
			Thongtin_Chinh: req.body.Thongtin_Chinh,
			Thongtin_Phu: req.body.Thongtin_Phu,
			HinhAnh_CH: req.file.filename,
			DanhSach_CH: []
		});
		var result = "";
		newDanhMuc_CHHN.save(function (err) {
			if (err) {
				console.log("\nThêm danh mục cửa hàng hôm nay mới bị lỗi : " + err);
				response.send({ return_code: "0" });
			}
			else {
				result += "Thêm danh mục cửa hàng hôm nay mới thành công !";
				console.log(result);
				response.send({ return_code: "1" });
			}
		});

	}
	else {
		// res.send(JSON.stringify(req.body));
		console.log("Params error !" + err);
		response.send({ return_code: "0" });
	}
	});
});

//Xóa 
//route deleteDanhmuccuahanghomnay 
//method delete
//params  : idDanhmuccuahanghomnay
app.delete("/deleteDanhmuccuahanghomnay", urlEncodeParser, function (req, res) {
	var result = "";
	DANHSACH_CUAHANG_HOMNAY.findByIdAndDelete(
		{ _id: mongoose.Types.ObjectId(req.body.idDanhmuccuahanghomnay) },
		function (err, dm) {
			if (err || dm == null) {
				result += "\nXóa bị lỗi : " + err;
				console.log(result);
				res.send({ return_code: "0" });
			}
			else {
				result += "\nĐã xóa : " + req.body.idDanhmuccuahanghomnay;
				console.log(dm);
				res.send({ return_code: "1" });
			}
		}
	);
});


//Xóa cửa hàng ra khỏi cửa hàng hôm nay
//route deleteCuahangtrongdanhmuchomnay 
//method delete
//params  : idcuahang, idDanhmuccuahanghomnay
app.delete("/deleteCuahangtrongdanhmuchomnay", urlEncodeParser, function (req, res) {
	var result = "";
	CUAHANG.findByIdAndDelete(
		{ _id: req.body.idcuahang },
		function (err) {
			if (err) {
				result += "\nXóa bị lỗi : " + err;
				res.send({ return_code: "0" });
			}
			else {
				result += "\nĐã xóa : " + req.body.idcuahang;
				DANHSACH_CUAHANG_HOMNAY.findOneAndUpdate(
					{ _id: mongoose.Types.ObjectId(req.body.idDanhmuccuahanghomnay) },
					{ $pull: { DanhSach_CH: req.body.idcuahang } },
					function (err) {
						if (err) {
							result += "\nXóa cửa hàng trong danh mục hôm nay gặp lỗi : " + err;
							res.send({ return_code: "0" });
						}
						else {
							result += "\nXóa cửa hàng trong danh mục hôm nay thành công !";
							res.send({ return_code: "1" });
						}

					}
				);
			}
		}
	);
});

//route get Hienthitendanhmuccuahangtrangchu
//method get
app.get("/Hienthitendanhmuccuahangtrangchu", function (req, res) {
	DANHMUC_CUAHANG_TRANGCHU.aggregate(
		[
			{
				"$project": {
					"Chu_De_Chinh": 1.0
				}
			}
		],
		function (err, result) {
			if (err) {
				res.send(err);
				return_code: "0"
			}

			else {
				res.send(result);
				return_code: "1"
			}

		}
	);

});

//route get Danhsachmonangoiy
//method get
app.get("/Danhsachmonangoiy", function (req, res) {
	MONAN_GOIY.find(
		function (err, items) {
			if (err)
				res.send("Lấy danh sách món ăn gợi ý" + err);
			else
				res.send(items);
		}
	);
});


//route get Danhsachmonantimkiemhienthi
//method post(truyền id món ăn tìm kiếm)
//Param idMonantimkiem

app.post("/Danhsachmonantimkiemhienthi", urlEncodeParser, function (req, res) {
	MON_AN.find({ "Ten_mon_an": req.body.Ten_mon_an }, function (err, items) {
		if (err)
			res.send("Lấy tên món ăn bị lỗi : " + err);
		else
			res.send(items);
	});
});


//route post HienThiCuaHang_KhachHangYeuThich
//method post(truyền idKhachHang)
//Param  idKhachHang
app.post("/HienThiCuaHang_KhachHangYeuThich", urlEncodeParser, function (req, res) {
	KHACH_HANG.aggregate(

		[

			{
				$match: {
					// "_id":ObjectId("5ebce3b56d098b0da418591d")
					_id: mongoose.Types.ObjectId(req.body.idKhachHang)
				}
			},

			{
				$project: {
					"Cua_hang_yeu_thich": 1.0

				}
			},

			{
				$unwind: {
					path: "$Cua_hang_yeu_thich",

				}
			},

			{
				$lookup:
				{
					from: "cuahangs",
					localField: "Cua_hang_yeu_thich",
					foreignField: "_id",
					as: "ThongTinCuaHang"
				}
			},

			{
				$lookup:
				{
					from: "diachis",
					localField: "ThongTinCuaHang.Dia_Chi_Cua_Hang",
					foreignField: "_id",
					as: "DiaChiCuaHang"
				}
			},

			{
				$project: {
					"ThongTinCuaHang._id": 1.0,
					"ThongTinCuaHang.Ten_Cua_Hang": 1.0,
					"ThongTinCuaHang.Hinh_Anh_Cua_Hang": 1.0,
					"ThongTinCuaHang.Danh_Gia": 1.0,
					"DiaChiCuaHang": 1.0
				}
			},

		],
		function (err, result) {
			if (err || result.length == 0) {
				console.log(err);
				res.send({return_code: "0"});
			}
			else{
				console.log(result);
				res.send({return_code: "1", infor : result});
			}
		}

	);

});


//route post Hienthithongtin_taikhoankhachhang
//method post(truyền idKhachHang)
//Param  idKhachHang
app.post("/Hienthithongtin_taikhoankhachhang", urlEncodeParser, function (req, res) {
	KHACH_HANG.aggregate(
		[
			{
				"$match": {
					"_id": mongoose.Types.ObjectId(req.body.idKhachHang)
				}
			},
			{
				"$project": {
					"Ten_khach_hang": 1.0,
					"Hinh_anh_khach_hang": 1.0
				}
			}
		],
		function (err, result) {
			if (err)
				res.send(err);
			else
				res.send(result);
		}
	);
});


//route post Themcuahangyeuthich_khachhang
//method post(truyền idKhachHang)
//Param  idKhachHang, idCuaHang
app.post("/Themcuahangyeuthich_khachhang", urlEncodeParser, function (req, res) {
	KHACH_HANG.findById(
		{
			_id : mongoose.Types.ObjectId(req.body.idKhachHang)
		},
		function (errKH, resultKH) {
			if (errKH || resultKH == null){
				console.log("Tìm khách hàng gặp lỗi : " + errKH);
				res.send({return_code: "0"});
			}
			else
			{
				console.log(resultKH);
				if(req.body.favorite == "0"){
					KHACH_HANG.findOneAndUpdate(
						{ _id : mongoose.Types.ObjectId(req.body.idKhachHang) },
						{ $pull: { 'Cua_hang_yeu_thich': req.body.idCuaHang } },
						function (errAddStore) {
							if (errAddStore){
								console.log("Bỏ cửa hàng vào cửa hàng yêu thích mới bị lỗi : " + errAddStore);
								res.send({return_code: "0"});
							}
							else{
								console.log("Bỏ cửa hàng vào cửa hàng yêu thích mới thành công !");
								res.send({return_code: "1", type : "0"});
							}
						}
					);
				} else if(req.body.favorite == "1"){
					KHACH_HANG.findOneAndUpdate(
						{ _id : mongoose.Types.ObjectId(req.body.idKhachHang) },
						{ $push: { 'Cua_hang_yeu_thich': req.body.idCuaHang } },
						function (errPullStore) {
							if (errPullStore){
								console.log("Thêm cửa hàng vào cửa hàng yêu thích mới bị lỗi : " + errPullStore);
								res.send({return_code: "0"});
							}
							else{
								console.log("Thêm cửa hàng vào cửa hàng yêu thích mới thành công !");
								res.send({return_code: "1", type : "1"});
							}
						}

					);
				}
			}
		}
	);
});

//Login-DangNhap//
//route Danhnhap_cuahhang
//method post(truyền idCuahang)
//Param  idCuahang

app.post("/Dangnhapadmin", urlEncodeParser, function (req, res) {
	console.log(JSON.stringify(req.body));
	QUANLY_NGUOIDUNG.aggregate(
		[
			{
				"$match": {
					"Ten_dang_nhap": req.body.tenTaikhoan,
					"Mat_khau": req.body.matKhau
				}
			},
			{
				"$project": {
					"_id": 1.0
				}
			}
		],
		function (err, result) {
			if (err) {
				res.send({
					return_code: "0",
					error_infor: "Tìm kiếm tài khoản người dùng gặp lỗi : " + err
				});
			}
			else {
				console.log("Đăng nhập hệ thống admin thành công !");
				console.log(result);
				if (result != null && result.length > 0) {
					QL_NHOM_NGUOIDUNG.find({ 'DanhSach_NguoiDung': { $in: [result[0]._id] } }, function (err, reskq_id) {
						if (err) {
							res.send({
								return_code: "0",
								error_infor: "Xác định nhóm người dùng gặp lỗi : " + err
							});
						}
						else {
							console.log(reskq_id);
							if (reskq_id != null && reskq_id.length > 0) {
								if (reskq_id[0].Ten_nhom == "Chinhanh") {
									console.log("Tài khoản này thuộc nhóm chi nhánh !");
									CHINHANH.find({ Tai_Khoan: result[0]._id }, function (err, kqchinhanh) {
										if (err) {
											console.log("Xác định danh tính chi nhánh gặp lỗi : " + err);
											res.send({
												return_code: "0",
												error_infor: "Xác định danh tính chi nhánh gặp lỗi : " + err
											});
										}
										else {
											console.log("kết quả xác định danh tính chi nhánh : ");
											console.log(kqchinhanh);
											if (kqchinhanh != null && kqchinhanh.length > 0) {
												console.log("Xác định danh tính chi nhánh thành công !");
												res.send({
													return_code: "1",
													id: kqchinhanh[0]._id
												});
												return;
											} else {
												console.log("Xác định danh tính chi nhánh thất bại !");
												res.send({
													return_code: "0",
													error_infor: "Xác định danh tính chi nhánh thất bại"
												});
												return;
											}
										}
									})
								}

								if (reskq_id[0].Ten_nhom == "Cuahang") {
									console.log("Tài khoản " + result[0]._id + " thuộc nhóm cửa hàng !");
									CUAHANG.find({ Tai_Khoan: result[0]._id, Trang_Thai_Cua_Hang : "1"}, function (err, kqcuahang) {
										if (err) {
											console.log("Xác định danh tính cửa hàng gặp lỗi : " + err);
											res.send({
												return_code: "0",
												error_infor: "Xác định danh tính cửa hàng gặp lỗi : " + err
											});
										}
										else {
											console.log("kết quả xác định danh tính cửa hàng : ");
											console.log(kqcuahang);
											if (kqcuahang != null && kqcuahang.length > 0) {
												console.log("Xác định danh tính cửa hàng thành công !");
												res.send({
													return_code: "2",
													id: kqcuahang[0]._id,
													Ten_Cua_Hang: kqcuahang[0].Ten_Cua_Hang,
													Hinh_Anh_Cua_Hang: kqcuahang[0].Hinh_Anh_Cua_Hang
												});
												return;
											} else {
												console.log("Xác định danh tính cửa hàng thất bại !");
												res.send({
													return_code: "0",
													error_infor: "Xác định danh tính cửa hàng thất bại"
												});
												return;
											}
										}
									})
								}

								if (reskq_id[0].Ten_nhom == "Admin") {
									console.log("Tài khoản này thuộc nhóm admin foodnow !");
									res.send({
										return_code: "3"
									});
									return;
								}

								if (reskq_id[0].Ten_nhom == "SuperAdmin") {
									console.log("Tài khoản này thuộc nhóm super admin !");
									res.send({
										return_code: "4"
									});
									return;
								}

							} else {
								console.log("Tài khoản này chưa có nhóm !");
								res.send({
									return_code: "0",
									error_infor: "Tài khoản này chưa có nhóm !"
								});
							}
						}
					});
				}
				else {
					console.log("Không tìm thấy tài khoản, có thể sai user hoặc password !");
					res.send({
						return_code: "0",
						error_infor: "Không tìm thấy tài khoản, có thể sai user hoặc password !"
					});
				}
			}
		}
	);

});

const getDanhSachGoiY = async (req, res, error_query) => {
	const label = Date.now();
	console.time("getDanhSachGoiY" + label);
	return new Promise(function (resolve, reject) {
		KHUYENMAI_HETHONG.find(
			function (err, lst_khuyen_mai_ht) {
				if (err) {
					console.log("Lấy danh sách khuyến mãi hệ thống gặp lỗi :" + err);
					res.send(error_query);
				} else {
					resolve(lst_khuyen_mai_ht);
					console.log("Lấy danh sách khuyến mãi hệ thống thành công 2!");
				}
				console.timeEnd("getDanhSachGoiY" + label);
			}
		);
	});
}

const getDanhSachKhuyenMaiHeThong = async (req, res, error_query) => {
	// console.time("getDanhSachKhuyenMaiHeThong");
	return new Promise(function (resolve, reject) {
		DANHSACH_CUAHANG_HOMNAY.find(
			function (err, lst_cua_hang_goi_y) {
				if (err) {
					console.log("Lấy danh sách gợi ý cửa hàng gặp lỗi :" + err);
					res.send(error_query)
				}
				else {
					console.log("Lấy danh sách gợi ý cửa hàng thành công 2!");
					resolve(lst_cua_hang_goi_y);
				}
				// console.timeEnd("getDanhSachKhuyenMaiHeThong");
			}
		);
	});
}

const getDanhSachDanhMucCuaHangHeThong = async (req, res, error_query) => {
	// console.time("getDanhSachDanhMucCuaHangHeThong");
	return new Promise(function (resolve, reject) {
		DANHMUC_CUAHANG_TRANGCHU.aggregate([{
			$lookup: {
				from: 'cuahangs',
				localField: 'DanhSach_CH',
				foreignField: '_id',
				as: 'lstCH'
			}
		},{ $limit : 5 }], function (err, lst_danh_muc) {
			if (err) {
				console.log("Lấy danh mục cửa hàng của hệ thống food now gặp lỗi :" + err);
				res.send(error_query)
			}
			else {
				console.log("Lấy danh mục cửa hàng của hệ thống food now thành công 2!");
				resolve(lst_danh_muc);
			}
			// console.timeEnd("getDanhSachDanhMucCuaHangHeThong")
		});
	});
}

const getDanhSachCuaHangGanDay = async (latitude, longitude, error_query) => {
	var label = Date.now();
	console.time(label + "getDanhSachCuaHangGanDay");
	return new Promise(function (resolve, reject) {
		CUAHANG.aggregate(
			[
				{
					"$lookup": {
						from: 'diachis',
						localField: 'Dia_Chi_Cua_Hang',
						foreignField: '_id',
						as: 'diachiCH'
					}
				}
			],
			function (err, result) {
				if (err || result.length == 0){
					console.log("Không tìm thấy cửa hàng !");
					resolve([]);
				}
				else{
					Promise.all(
						result.map(function (iCH) {
							return addDistance_CountOrder(iCH, latitude, longitude);
						}))
						.then(function (resolveCH) {
							var distanceRestul = [];
							if(latitude != 0.0 && longitude != 0.0){
								distanceRestul = resolveCH.sort((a, b) => (a.distance >= b.distance) ? 1 : -1).slice(0, 5);
							}	
							console.timeEnd(label + "getDanhSachCuaHangGanDay");
							resolve(distanceRestul);
						});
				}
			});
	});
}

//lấy data cho fragment home gồm các khối thông tin sau
// + thông tin về khuyến mãi của hệ thống
// + Gợi ý các cửa hàng - title "Hôm nay ăn gì ?"
// + Danh mục - detail danh mục cửa hàng của hệ thống foodnow
//method GET
app.post("/fragment_home", urlEncodeParser, function (req, res) {
	var label = Date.now();
	console.time(label);
	var error_query = { return_code: "0", error_infor: "Lỗi server khi query." };
	var response = {};
	var lat = 10.881654, lng = 106.648632;//10.881654 106.648632
	if(req.body.lat != null || req.body.lat != "") {
		lat = req.body.lat;
	} else {
		lat = 10.881654;
	}
	if(req.body.lng != null || req.body.lng != "") {
		lng =  req.body.lng;
	} else{
		lng = 106.648632;
	}
	Promise.all([
		getDanhSachKhuyenMaiHeThong(req, res, error_query),
		getDanhSachGoiY(req, res, error_query),
		getDanhSachDanhMucCuaHangHeThong(req, res, error_query),
		getDanhSachCuaHangGanDay(lat, lng, error_query)
	]).then(function (data) {
		console.timeEnd(label);
		response.return_code = "1";
		response.lst_cua_hang_goi_y = data[0];
		response.lst_khuyen_mai_ht = data[1];
		response.lst_danh_muc = data[2];
		response.lst_cua_hang_gan_day = data[3];
		res.send(response);
	});
});


//tìm thông tin của món ăn => thêm vào đơn hàng
const timThongTinMonAnChoDonHang = async (iMONAN) => {
	const label = Date.now();
	console.time(iMONAN.id + label);
	return new Promise(function (resolve, reject) {
		MON_AN.findById({
			_id: mongoose.Types.ObjectId(iMONAN.id)
		}, function (err, resultSearchMA) {
			if (err) {
				console.log("Lấy thông tin của món ăn gặp lỗi :" + err);
				reject(null);
			}
			else {
				console.log("Lấy thông tin của món ăn thành công !");
				console.timeEnd(iMONAN.id + label);
				resolve({
					IdMonAn: mongoose.Types.ObjectId(resultSearchMA._id),
					SoLuong: iMONAN.count,
					GhiChu: iMONAN.note,
					Don_gia: resultSearchMA.Don_gia_mon_an,
					Thanh_tien: resultSearchMA.Don_gia_mon_an * iMONAN.count
				});
			}
		});
	});
}

function capNhatDonHang(iCART, iDONHANG, error_query, req, res) {
	const label = Date.now();
	console.time("capNhatDonHang:" + label);
	if (iCART.length != null && iCART.length > 0) {//giỏ hàng có item
		Promise.all(
			iCART.map(function (iMONAN) {
				return timThongTinMonAnChoDonHang(iMONAN);
			}))
			.then(function (resolveThemMA) {
				console.log("Thông tin các món ăn trong đơn hàng :")
				// console.log(resolveThemMA);
				if (resolveThemMA.length != iCART.length) {
					console.log("Thêm món ăn vào đơn hàng gặp lỗi !");
					res.send(error_query);
				} else {
					iDONHANG.Chi_tiet_DH = [];
					resolveThemMA.forEach(element => {
						iDONHANG.Chi_tiet_DH.push(element);
					});
					iDONHANG.save(function (errCapNhatDH, resultCapNhatDH) {
						if (errCapNhatDH) {
							console.log("Cập nhật đơn hàng gặp lỗi :\n" + errCapNhatDH);
							res.send(error_query);
						} else {
							console.log("Kết quả thêm món ăn vào đơn hàng : ");
							console.log(resultCapNhatDH);
							console.timeEnd("capNhatDonHang:" + label);
							console.log("Kết thúc cập nhật đơn hàng !");
							res.send({ return_code: "1", token : req.body.token, state_token : req.body.state_token});
						}
					});
				}
			});
	} else {
		console.log("Giỏ hàng rỗng !");
		res.send({ return_code: "0", error_infor: "Giỏ hàng rỗng !" });
	}
}


//route cập nhật giỏ hàng
//method post
//params : idKhachHang, idCuaHang, idMonAn
app.post("/chonSanPham", urlEncodeParser, function (req, res) {
	var error_query = { return_code: "0", error_infor: "Lỗi server khi query." };
	console.log("--------------------------------------------------------------------------------------------");
	console.log("Thông tin cửa hàng :" + req.body.idCuaHang);
	console.log("Thông tin khách hàng : " + req.body.token);
	if(!verifyUser(req, res))
		return;
	console.log("Thông tin khách hàng : " + req.body.idKhachHang);
	if (req.body.cart != null && req.body.cart != '') {
		console.log("Cập nhật đơn hàng !\nBắt đầu tìm đơn hàng để cập nhật !");
		var cart = JSON.parse(req.body.cart);
		DON_HANG.find(
			{ "IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang), "IdCuaHang": mongoose.Types.ObjectId(req.body.idCuaHang), "Trang_thai_don_hang": "0" },
			function (err, resultDH) {
				if (err) {
					console.log("Tìm đơn hàng gặp lỗi :\n" + err);
					return res.send(error_query);
				} else {
					if (resultDH != null && resultDH.length == 1) {
						console.log("Tìm thấy đơn hàng\nBắt đầu cập nhật!");
						capNhatDonHang(cart, resultDH[0], error_query, req, res);
					} else {
						console.log("Không tìm thấy đơn hàng\nTạo đơn hàng mới");
						var newDonHang = new DON_HANG({
							IdKhachHang: mongoose.Types.ObjectId(req.body.idKhachHang),
							IdCuaHang: mongoose.Types.ObjectId(req.body.idCuaHang),
							Ngay_nhan_don_hang: null,
							Dia_chi_giao_hang: null,
							Hinh_thuc_thanh_toan: "",
							Ghi_chu_NVGH: "",
							Trang_thai_don_hang: "0",//đơn nháp : 0, 
							Chi_tiet_DH: []
						});
						capNhatDonHang(cart, newDonHang, error_query, req, res);
					}
				}
			}
		);
	} else {
		console.log("Xóa đơn hàng !\nBắt đầu tìm đơn hàng để xóa !");
		DON_HANG.findOneAndDelete(
			{ IdKhachHang: mongoose.Types.ObjectId(req.body.idKhachHang), IdCuaHang: mongoose.Types.ObjectId(req.body.idCuaHang), Trang_thai_don_hang: "0" },
			function (err, resultDH) {
				if (err) {
					console.log("Tìm đơn hàng gặp lỗi :\n" + err);
					return res.send(error_query);
				} else {
					console.log("Xóa đơn hàng thành công !");
					return res.send({ return_code: "1", token : req.body.token, state_token : req.body.state_token});
				}
			}
		);
	}
});

app.post("/datHang", urlEncodeParser, function (req, res) {
	var error_query = { return_code: "0", error_infor: "Lỗi server khi query." }
	console.log(req.body);
	DON_HANG.find(
		{ "IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang), "IdCuaHang": mongoose.Types.ObjectId(req.body.idCuaHang), "Trang_thai_don_hang": "0" },
		function (err, resultDH) {
			if (err) {
				console.log("Tìm đơn hàng gặp lỗi :\n",err);
				res.send(error_query);
			} else {
				console.log(resultDH);
				if (resultDH != null && resultDH.length >= 1) {
					console.log("Tìm thấy đơn hàng\nBắt đầu cập nhật!");
					resultDH[0].Ngay_nhan_don_hang = Date.now();
					resultDH[0].Dia_chi_giao_hang = mongoose.Types.ObjectId(req.body.idDiaChi);//ok,
					resultDH[0].Do_dai_duong_di = req.body.Do_dai_duong_di;
					resultDH[0].Phi_ship = req.body.Phi_ship;
					resultDH[0].Total_cart = req.body.Total_cart;
					resultDH[0].Total = req.body.Total;
					resultDH[0].Hinh_thuc_thanh_toan = req.body.Hinh_thuc_thanh_toan;//ok
					resultDH[0].Ghi_chu_NVGH = req.body.note;//ok
					resultDH[0].Trang_thai_don_hang = "1";//khách hàng đã xác nhận : 1
					resultDH[0].save(function (err, result) {
						if (err) {
							console.log(err);
							res.send(error_query);
						} else {
							CUAHANG.findByIdAndUpdate(
								{ _id: mongoose.Types.ObjectId(req.body.idCuaHang) },
								{ $push: { Thong_Tin_KH_Dat_Don: resultDH[0]._id } },
								function (err, success) {
									if (err) {
										console.log(err);
										res.send(error_query);
									} else {
										console.log(resultDH[0]._id);
										console.log(String(result._id));
										db.ref().child("oders/" + req.body.idCuaHang).push({ key: String(result._id + "") }).then(() => {
											console.log("Notification đặt hàng thành công !");
											console.log("Xác nhận đơn hàng thành công !");
											res.send({ return_code: "1" });
										});;
									}
								}
							);
						}
					});
				} else {
					console.log("Không tìm thấy đơn hàng !", resultDH);
					res.send(error_query);
				}
			}
		}
	);
});


const pushNotificationToUser = async (token, title, message) => {
	return new Promise((resolve, reject) => {
		if(token == null || token == "" || title == null || message == null || title == "" || message == ""){
			resolve(null);
		} else {
			var payload = {
				notification: {
				title: title,
				body: message
				}
			};
			var options = {
				priority: "high",
				timeToLive: 60 * 60 *24
			};
			admin.messaging().sendToDevice(token, payload, options)
			.then((response) => {
				console.log('Successfully sent message:', response);
				resolve("");
			})
			.catch((error) => {
				console.log('Error sending message:', error);
				resolve("");
			});
		}
	});
}


const getTokenFromUser = async (idUser) => {
	return new Promise((resolve, reject) => {
		db.ref().child("token_list/" + idUser).on("value", function (snapshot) {
			if(snapshot.val().token_divice == null){
				console.log('Không tìm thấy token của user có id : ' + idUser);
				resolve(null);
			} else{
				resolve(snapshot.val().token_divice);
			}
		}, function(errGetData){
			if(errGetData){
				resolve(null);
			}
		});
	})
}

const storePushNotificationKMCH = async (idCuaHang, title, message) => {
	return new Promise((resolve, reject) => {
		KHACH_HANG.find(
			{Cua_hang_yeu_thich : {$in : [mongoose.Types.ObjectId(idCuaHang)]}},
			async function(err,result){
				if(err || result.length == 0){
					console.log(err, result);
					resolve(null);
				} else {
					console.log("List user : ", result);
					Promise.all(
						result.map(function (iUSER) {
							return getTokenFromUser(iUSER._id);
						}))
						.then(function (resolveListToken) {
							console.log("List token", resolveListToken);
							Promise.all(
								resolveListToken.map(function (token) {
									return pushNotificationToUser(token, title, message);
							})).then(function(resultPushNotifications) {
								console.log("Hoàn tất thông báo tới khách hàng !");
								resolve(resultPushNotifications);
							});
						})
				}
			}
		);
	});
}



//route addKhuyenmaicuahang, thông báo khuyến mãi của cửa hàng đến những khách hàng đã yêu thích cửa hnag2
//method POST
//params  : idcuahang
app.post("/addKhuyenmaicuahang", urlEncodeParser, function (req, response) {
	if (req.body.maGiamgia != null && req.body.thongtinKhuyenmai != null && req.body.hanSD != null && req.body.thoiGianGH != null && req.body.phanTramgiamgia != null && req.body.MoTa != null
		&& req.body.maGiamgia != "" && req.body.thongtinKhuyenmai != "" && req.body.hanSD != "" && req.body.thoiGianGH != "" && req.body.phanTramgiamgia != "" && req.body.MoTa != "") {
		var newKhuyenMai_CH = new KHUYENMAI_CUAHANG({
			MaGiamGia: req.body.maGiamgia,
			ThongTin_KMCH: req.body.thongtinKhuyenmai,
			HanSuDung: req.body.hanSD,
			ThoiGianGiaoHang: req.body.thoiGianGH,
			PhanTram_GiamGia: req.body.phanTramgiamgia,
			MoTa: req.body.MoTa
		});
		var result = "";
		newKhuyenMai_CH.save(function (err, newKM) {
			if (err) {
				console.log("Tạo khuyến mãi cửa hàng mới bị lỗi : " + err);
				response.send({ return_code: "0" });
			}
			else {
				console.log("Tạo khuyến mãi cửa hàng mới thành công !");
				CUAHANG.findOneAndUpdate(
					{ _id: req.body.idcuahang },
					{ $push: { Khuyen_Mai_CH: newKhuyenMai_CH._id } },
					function (err, result) {
						if (err){
							console.log("Thêm khuyến mãi cửa hàng mới gặp lỗi : ");
							response.send({ return_code: "0" });
						}
						else {
							console.log("Thêm khuyến mãi cửa hàng mới thành công !");
							Promise.all([
								storePushNotificationKMCH(req.body.idcuahang, result.Ten_Cua_Hang,"Nhập mã " +  " ' " + newKM.MaGiamGia + "'" + " Giảm Giá " +  " ' " + newKM.PhanTram_GiamGia + " ' ")
							]).then(function(data){
								console.log("Kết quả thông báo đến khách hàng ", data);
								if(data[0] == null){
									console.log("Thêm khuyến mãi cửa hàng mới gặp lỗi : ");
									response.send({ return_code: "0" });
								} else {
									console.log("Cửa hàng thông báo tới khách hàng yêu thích thành công !");
									response.send({ return_code: "1", infor: newKM });
								}
							});
						}
					});
			}
		});
	}
	else {
		console.log("Params error !");
		response.send({ return_code: "0" });
	}
});


//Xóa 
//route deleteKhuyenmaicuahang 
//method delete
//params  : idcuahang, idkhuyenMai
app.delete("/deleteKhuyenmaicuahang", urlEncodeParser, function (req, res) {
	var result = "";
	KHUYENMAI_CUAHANG.findByIdAndDelete(
		{ _id: req.body.idkhuyenMai },
		function (err) {
			if (err) {
				result += "\nXóa bị lỗi : " + err;
				res.send({ return_code: "0" });
			}
			else {
				result += "\nĐã xóa : " + req.body.idkhuyenMai;
				CUAHANG.findOneAndUpdate(
					{ _id: mongoose.Types.ObjectId(req.body.idCuahang) },
					{ $pull: { Khuyen_Mai_CH: req.body.idkhuyenMai } },
					function (err) {
						if (err) {
							result += "\nXóa khuyến mãi gặp lỗi : " + err;
							res.send({ return_code: "0" });
						}
						else {
							result += "\nXóa khuyến mãi thành công !";
							res.send({ return_code: "1" });
						}

					}
				);
			}
		}
	);
});

//route addKhuyenmaihethong
//method POST
//params  : maGiamgia, gioBatdau, gioKetthuc, phanTramgiamgia, Icon
app.post("/addKhuyenmaihethong", urlEncodeParser, function (req, response) {
	uploadFile(req, response, (error) => {
		console.log(req.file, req.body);
		if (req.body.makm != null && req.body.hanSD != null && req.body.thoiGianGH != null && req.body.PhanTram_GiamGia != null
		 && req.body.makm != "" && req.body.hanSD != "" && req.body.thoiGianGH != "" && req.body.PhanTram_GiamGia != "") {
			var newKhuyenMai_HT = new KHUYENMAI_HETHONG({
				MaGiamGia: req.body.makm,
				HanSuDung: req.body.hanSD,
				ThoiGianGiaoHang: req.body.thoiGianGH,
				Icon: req.file.filename,
				PhanTram_GiamGia: req.body.PhanTram_GiamGia,
				MoTa:req.body.mota,
				DanhSach_CN: []
			});
			var result = "";
			newKhuyenMai_HT.save(function (err, success) {
				if (err) {
					console.log("\nThêm khuyến mãi hệ thống mới bị lỗi : " + err);
					response.send({ return_code: "0" });
				}
				else {
					result += "\nThêm khuyến mãi hệ thống mới thành công !";
					console.log(result);
					response.send({ return_code: "1", infor: success});
				}
			});
		}
		else {
			console.log("Params error !" + err);
			response.send({ return_code: "0" });
		}
	});
});


//Xóa 
//route deleteKhuyenmaihethong 
//method delete
//params  : idcuahang, idkhuyenMai
app.delete("/deleteKhuyenmaihethong", urlEncodeParser, function (req, res) {
	var result = "";
	KHUYENMAI_HETHONG.findByIdAndDelete(
		{ _id: req.body.idkhuyenMai },
		function (err) {
			if (err) {
				result += "\nXóa bị lỗi : " + err;
				res.send({ return_code: "0" });
			}
			else {
				result += "\nĐã xóa : " + req.body.idkhuyenMai;
				res.send({ return_code: "1" });
			}
		}
	);
});


//route Hienthicuahangduocapdungkhuyenmai 
//method post
//params  : idKhuyenmaihethong
app.post("/Hienthicuahangduocapdungkhuyenmai", urlEncodeParser, function (req, res) {
	KHUYENMAI_HETHONG.aggregate(
		[
			{
				"$match": {
					"_id": mongoose.Types.ObjectId(req.body.idKhuyenmaihethong)
				}
			},
			{
				"$project": {
					"DanhSach_CH": 1.0
				}
			},
			{
				"$lookup": {
					"from": "cuahangs",
					"localField": "DanhSach_CH",
					"foreignField": "_id",
					"as": "CuaHang_KMHT"
				}
			},
			{
				"$project": {
					"CuaHang_KMHT": 1.0,
					"_id": 0.0
				}
			},
			{
				"$unwind": {
					"path": "$CuaHang_KMHT"
				}
			},
			{
				"$lookup": {
					"from": "diachis",
					"localField": "CuaHang_KMHT.Dia_Chi_Cua_Hang",
					"foreignField": "_id",
					"as": "DiaChi_CH"
				}
			}
		],
		function (err, result) {
			if (err) {
				res.send(err);
				return_code: "0"
			}

			else {
				res.send(result);
				return_code: "1"
			}

		}
	);
});



//route addDanhmuccuahangtrangchu
//method POST
//params  : chuDechinh
app.post("/addDanhmuccuahangtrangchu", urlEncodeParser, function (req, response) {

	console.log(JSON.stringify(req.body));
	if (req.body.chuDechinh != null && req.body.chuDechinh != "") {
		var newDanhMuc_CHTC = new DANHMUC_CUAHANG_TRANGCHU({
			Chu_De_Chinh: req.body.chuDechinh,
			DanhSach_CH: []
		});
		var result = "";
		newDanhMuc_CHTC.save(function (err, success) {
			if (err) {
				console.log("\nThêm danh mục cửa hàng trang chủ mới bị lỗi : " + err);
				response.send({ return_code: "0" });
			}
			else {
				result += "Thêm danh mục cửa hàng trang chủ mới thành công !";
				console.log(result);
				response.send({ return_code: "1", infor :  success});
			}
		});

	}
	else {
		// res.send(JSON.stringify(req.body));
		console.log("Params error !" + err);
		response.send({ return_code: "0" });
	}

});


//Xóa 
//route deleteDanhmuccuahangtrangchu 
//method delete
//params  : idDanhmuccuahangtrangchu
app.delete("/deleteDanhmuccuahangtrangchu", urlEncodeParser, function (req, res) {
	var result = "";
	DANHMUC_CUAHANG_TRANGCHU.findByIdAndDelete(
		{ _id: req.body.idDanhmuccuahangtrangchu },
		function (err, dmtc) {
			if (err || dmtc == null) {
				result += "\nXóa bị lỗi : " + err;
				res.send({ return_code: "0" });
			}
			else {
				result += "\nĐã xóa : " + req.body.idDanhmuccuahangtrangchu;
				res.send({ return_code: "1" });
			}
		}
	);
});

app.post("/chitietDonHang", urlEncodeParser, function (req, res) {
	if (req.body.idKhachHang != null && req.body.idCuaHang != null && req.body.idKhachHang != "" && req.body.idCuaHang != "") {
		DON_HANG.aggregate(
			[
				{
					"$match": {
						"IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang),
						"IdCuaHang": mongoose.Types.ObjectId(req.body.idCuaHang)
					}
				},
				{
					"$project": {
						"Chi_tiet_DH": 1.0,
						"_id": 0.0
					}
				},
				{
					"$unwind": {
						"path": "$Chi_tiet_DH"
					}
				},
				{
					"$lookup": {
						"from": "mon_ans",
						"localField": "Chi_tiet_DH.IdMonAn",
						"foreignField": "_id",
						"as": "infor"
					}
				}
			],
			function (error, resultCTDonHang) {
				if (error) {
					console.log("Lấy thông tin chi tiết đơn hàng gặp lỗi : " + error);
					res.send({ return_code: "0", error_infor: "Lỗi server khi query." });
				} else {
					if (resultCTDonHang != null && resultCTDonHang.length > 0) {
						console.log("Lấy thông tin chi tiết đơn hàng thành công !");
						res.send({ return_code: "1", infor: resultCTDonHang });
					} else {
						console.log("Không tìm thấy thông tin chi tiết đơn hàng");
						res.send({ return_code: "0", error_infor: "Không tìm thấy thông tin chi tiết đơn hàng" });
					}
				}
			}
		);
	} else {
		console.log("Lỗi truyền params");
		res.send({ return_code: "0", error_infor: "Lỗi truyền params" });
	}
});


//tìm thông tin của món ăn => dùng cho chi tiết đơn hàng
const timThongTinMonAnChoDonHang_extend = async (iMONAN) => {
	const label = Date.now();
	console.time(iMONAN.IdMonAn + label);
	return new Promise(function (resolve, reject) {
		MON_AN.findById({
			_id: mongoose.Types.ObjectId(iMONAN.IdMonAn)
		}, function (err, resultSearchMA) {
			if (err) {
				console.log("Lấy thông tin của món ăn gặp lỗi :" + err);
				resolve(null);
			}
			else {
				console.log("Lấy thông tin của món ăn thành công !");
				console.timeEnd(iMONAN.IdMonAn + label);
				resolve({
					IdMonAn: mongoose.Types.ObjectId(resultSearchMA._id),
					SoLuong: iMONAN.SoLuong,
					GhiChu: iMONAN.GhiChu,
					Don_gia: resultSearchMA.Don_gia_mon_an,
					Thanh_tien: resultSearchMA.Don_gia_mon_an * iMONAN.SoLuong,
					Ten_mon_an: resultSearchMA.Ten_mon_an,
					Mo_ta_mon_an: resultSearchMA.Mo_ta_mon_an,
					Don_gia_mon_an: resultSearchMA.Don_gia_mon_an,
					Hinh_anh_mon_an: resultSearchMA.Hinh_anh_mon_an,
					Trang_thai_mon_an: resultSearchMA.Trang_thai_mon_an,
					So_luong_mua: resultSearchMA.So_luong_mua,
					So_luong_thich: resultSearchMA.So_luong_thich
				});
			}
		});
	});
}

//tìm thông tin của món ăn => dùng cho chi tiết đơn hàng
const timThongTinKhachHanghoDonHang_extend = async (iDONHANG) => {
	const label = Date.now();
	console.time(iDONHANG._id + label);
	return new Promise(function (resolve, reject) {
		KHACH_HANG.findById({
			_id: mongoose.Types.ObjectId(iDONHANG.IdKhachHang)
		}, function (err, resultSearchKH) {
			if (err) {
				console.log("Lấy thông tin của khách hàng gặp lỗi :" + err);
				resolve(null);
			}
			else {
				console.log("Lấy thông tin khách hàng của đơn hàng thành công !");
				console.timeEnd(iDONHANG._id + label);
				resolve(resultSearchKH);
			}
		});
	});
}

//tìm thông tin địa chỉ cho đơn hàng => dùng cho địa chỉ giao hàng
const timDiaChiDonHang_extend = async (iDONHANG) => {
	const label = Date.now();
	console.time(iDONHANG._id + label);
	return new Promise(function (resolve, reject) {
		DIACHI.findById({
			_id: mongoose.Types.ObjectId(iDONHANG.Dia_chi_giao_hang)
		}, function (err, resultSearchDC) {
			if (err) {
				console.log("Lấy thông tin của địa chỉ gặp lỗi :" + err);
				resolve(null);
			}
			else {
				console.log("Lấy thông tin địa chỉ của đơn hàng thành công !");
				console.timeEnd(iDONHANG._id + label);
				resolve(resultSearchDC);
			}
		});
	});
}

//sau khi tìm thông tin của tất cả các món món ăn, cập nhật đơn hàng
const capNhatDonHang_extend = async (iDONHANG) => {
	var error_query = { return_code: "0", error_infor: "Lỗi server khi query." };
	const label = Date.now();
	return new Promise(function (resolve, reject) {
		console.time(iDONHANG._id + label);
		Promise.all(
			iDONHANG.Chi_tiet_DH.map(function (iMONAN) {
				return timThongTinMonAnChoDonHang_extend(iMONAN);
			}))
			.then(function (resolveLstMonans) {
				if (resolveLstMonans.length != iDONHANG.Chi_tiet_DH.length) {
					console.log("Tìm thông tin món ăn vào đơn hàng gặp lỗi !");
					res.send(error_query);
				} else {
					console.log(resolveLstMonans);
					iDONHANG.Chi_tiet_DH = [];
					resolveLstMonans.forEach(element => {
						iDONHANG.Chi_tiet_DH.push(element);
					});
					Promise.all([
						timThongTinKhachHanghoDonHang_extend(iDONHANG),
						timDiaChiDonHang_extend(iDONHANG)
					])
						.then(function (resolveThongTinDonHang) {
							if (resolveThongTinDonHang != null && resolveThongTinDonHang.length != 2) {
								console.log("Tìm thông tin khách hàng của đơn hàng gặp lỗi !");
								res.send(error_query);
							} else {
								iDONHANG.infor_kh = resolveThongTinDonHang[0];
								iDONHANG.infor_cd = resolveThongTinDonHang[1];
								console.log("Cập nhật thông tin đôn hàng thành công !");
								console.timeEnd(iDONHANG._id + label);
								resolve(iDONHANG);
							}
						});
				}
			});
	});
}

//route lấy danh sách đơn hàng đươc khách hang đặt
app.post("/danhSachDongHang", urlEncodeParser, async function (req, res) {
	DON_HANG.aggregate(
		[
			{
				"$match": {
					"IdCuaHang": mongoose.Types.ObjectId(req.body.idCuaHang),//5ec39da122336e32d01a2401,
					"Trang_thai_don_hang" : req.body.type
				}
			}
			// { "$addFields" : {"date" : { "$sum": {
            //     "$divide": [
            //         { "$subtract": [ "$Ngay_nhan_don_hang", "$createdAt" ] },
            //         1000 * 60 * 60 * 24
            //     ]
            // }}}},
			// { "$sort" : {  "Ngay_nhan_don_hang" : 1, "createdAt" : -1} }
		],
		function (err, result) {//result là danh sách đơn hàng của cửa hàng A
			if (err) {
				console.log("Lấy danh sach đơn hàng của cửa hàng gặp lỗi : " + err);
				res.send({ return_code: "0", error_infor: "Lỗi server khi query." });
			} else {
				if (result != null && result.length > 0) {
					Promise.all(
						result.map(function (iDONHANG) {
							return capNhatDonHang_extend(iDONHANG);//tìm thông tin cho các món ăn trong đơn hàng
						}))
						.then(function (resolveDonHangs) {
							console.log(resolveDonHangs);
							resolveDonHangs.sort((a, b) => (a.Ngay_nhan_don_hang > b.Ngay_nhan_don_hang) ? 1 : ((a.createdAt > b.createdAt) ? 1 : -1));
							res.send(resolveDonHangs);
						});
				} else {
					console.log("Cửa hàng không có đơn hàng !");
					res.send({ return_code: "0", error_infor: "Cửa hàng không có đơn hàng !" });
				}
			}
		}
	);
});

app.post("/donHangMoi", urlEncodeParser, async function (req, res) {
	DON_HANG.aggregate(
		[
			{
				"$match": {
					"_id": mongoose.Types.ObjectId(req.body.idDonHang)
				}
			}
		],
		function (err, result) {//result là danh sách đơn hàng của cửa hàng A
			if (err) {
				console.log("Tìm đơn hàng gặp lỗi : " + err);
				res.send({ return_code: "0", error_infor: "Lỗi server khi query." });
			} else {
				if (result != null && result.length > 0) {
					Promise.all(
						result.map(function (iDONHANG) {
							return capNhatDonHang_extend(iDONHANG);//tìm thông tin cho các món ăn trong đơn hàng
						}))
						.then(function (resolveDonHangs) {
							console.log(resolveDonHangs);
							res.send(resolveDonHangs);
						});
				} else {
					console.log("Không có đơn hàng !");
					res.send({ return_code: "0", error_infor: "Đơn hàng không tồn tại !" });
				}
			}
		}
	);
});


//route getTaikhoancuahang
app.post("/getTaikhoancuahang", urlEncodeParser, async function (req, res) {
	var result = "";
	CUAHANG.aggregate(
		[{
			"$match": {
				"_id": mongoose.Types.ObjectId(req.body.idcuahang)
			}
		},
		{
			"$lookup": {
				"from": "diachis",
				"localField": "Dia_Chi_Cua_Hang",
				"foreignField": "_id",
				"as": "DiaChiCH"
			}
		},
		{ 
            "$lookup" : { 
                "from" : "quanly_nguoidungs", 
                "localField" : "Tai_Khoan", 
                "foreignField" : "_id", 
                "as" : "TenTaiKhoan"
            }
        }],
		function (err, result) {
			if (err) {
				console.log("\nKhông lấy được thông tin : " + err);
				res.send({ return_code: "0" });
			}
			else {
				console.log("\nLấy thông tin thành công : " + req.body.idcuahang);
				res.send({ return_code: "1", infor: result });
			}
		}

	);
});

//Cập nhật mật khẩu cửa hàng
//route post 
//method post(truyền )
//Param  
app.post("/capnhatmatkhau_cuahang", urlEncodeParser, function (req, res) {
	var result = "";
	if(req.body.IdCuaHang!=null && req.body.IdCuaHang=="" && req.body.Matkhaucuahang!=null && req.body.Matkhaucuahang=="")
	{
		res.send({ return_code: "0" });
		return;
	}
	CUAHANG.findById(
		{ _id: mongoose.Types.ObjectId(req.body.IdCuaHang)},
		function (err, resultCH) {
			if (err) {
				result += "\nKhông có id cửa hàng này : " + err;
				console.log(result);
				res.send({ return_code: "0" });
			} else {
				QUANLY_NGUOIDUNG.findByIdAndUpdate(
					{_id: resultCH.Tai_Khoan},
					{$set: { Mat_khau: req.body.Matkhaucuahang }},
					function(err){
					if(err){
						result += "\nCập nhật lỗi : " + err;
						console.log(result);
						res.send({ return_code: "0" });
					}
					else{
						result += "\nCập nhật thành công : " + req.body.IdCuaHang;
						console.log(result);
						res.send({ return_code: "1" });
					}
				});
			}
	});
});

//Xác nhận đơn hàng
app.post("/capNhatTrangThaiDonHang", urlEncodeParser, async function (req, res) {
	if(req.body.idDonHang == null || req.body.state == null || req.body.idDonHang == "" || req.body.state == ""){
		console.log("\nError parmas : " , req.body);
		res.send({ return_code: "0" });
	}
	DON_HANG.findOneAndUpdate(
		{ _id: req.body.idDonHang } ,
		{ $set: { Trang_thai_don_hang: req.body.state } },
		function (err, result) {
			if (err || result == null) {
				console.log("\nCập nhật trạng thái đơn hàng gặp lỗi : " + err);
				res.send({ return_code: "0" });
			}
			else {
				console.log("\nCập nhật trạng thái đơn hàng thành công !");
				if(req.body.state == "3"){
					db.ref().child("remove_order/" + String(result.IdCuaHang + "")).push({ key: String(result._id + "") }).then(() => {
						console.log("Notification hủy đơn hàng thành công !");
						res.send({ return_code: "1"});
					});
				}
			}
	});
});

//cửa hàng xác nhận hoặc hủy đơn
app.post("/cuaHangCapNhatTrangThaiDonHang", urlEncodeParser, async function (req, res) {
	if(req.body.idDonHang == null || req.body.state == null || req.body.idDonHang == "" || req.body.state == "" || req.body.idUser == null || req.body.idUser == ""){
		console.log("\nError parmas : " , req.body);
		res.send({ return_code: "0" });
	}
	DON_HANG.findOneAndUpdate(
		{ _id: req.body.idDonHang } ,
		{ $set: { Trang_thai_don_hang: req.body.state } },
		function (err, result) {
			if (err || result == null) {
				console.log("\nCập nhật trạng thái đơn hàng gặp lỗi : " + err);
				res.send({ return_code: "0" });
			}
			else {
				console.log("\nCập nhật trạng thái đơn hàng thành công !");
				if(req.body.state == "3"){			
					db.ref().child("token_list/" + req.body.idUser).on("value", function (snapshot) {
						var registrationToken = snapshot.val().token_divice;
						if(registrationToken == null){
							console.log('Không tìm thấy token 1');
							res.send({ return_code: "1" });
						}
						var payload = {
							notification: {
							title: "Cửa hàng thông báo",
							body: "Đơn hàng #" + req.body.idDonHang.substring(req.body.idDonHang.length - 5) + " của bạn đã bị hủy !"
							}
						};
						var options = {
							priority: "high",
							timeToLive: 60 * 60 *24
						};
						admin.messaging().sendToDevice(registrationToken, payload, options)
						.then((response) => {
							console.log('Successfully sent message:', response);
							res.send({ return_code: "1" });
						})
						.catch((error) => {
							console.log('Error sending message:', error);
							res.send({ return_code: "0" });
						});
					}, function(errGetData){
						if(errGetData){
							console.log('Error get token :', errGetData);
							res.send({ return_code: "0" });
						}
					});
				}
				if(req.body.state == "2"){
					db.ref().child("token_list/" + req.body.idUser).on("value", function (snapshot) {
						var registrationToken = snapshot.val().token_divice;
						if(registrationToken == null){
							console.log('Không tìm thấy token 1');
							res.send({ return_code: "1" });
						}
						var payload = {
							notification: {
							title: "Cửa hàng thông báo",
							body: "Cửa hàng đã xác nhận đơn #" + req.body.idDonHang.substring(req.body.idDonHang.length - 5) + " của bạn !"
							}
						};
						var options = {
							priority: "high",
							timeToLive: 60 * 60 *24
						};
						admin.messaging().sendToDevice(registrationToken, payload, options)
						.then((response) => {
							console.log('Successfully sent message:', response);
							res.send({ return_code: "1" });
						})
						.catch((error) => {
							console.log('Error sending message:', error);
							res.send({ return_code: "0" });
						});
					}, function(errGetData){
						if(errGetData){
							console.log('Error get token :', errGetData);
							res.send({ return_code: "0" });
						}
					});
				}
			}
	});
});

//CỬA HÀNG
//Hiển thị danh sách món ăn: Loại món ăn và món ăn
app.post("/Danhsachmonan_cuahang", urlEncodeParser, async function (req, res) {
	CUAHANG.aggregate(
		[
			{ 
				"$match" : { 
					"_id" : mongoose.Types.ObjectId(req.body.idcuahang)
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "loai_monans", 
					"localField" : "Loai_MonAn", 
					"foreignField" : "_id", 
					"as" : "DS_LoaiMA"
				}
			}, 
			{ 
				"$project" : { 
					"DS_LoaiMA" : 1.0
				}
			}, 
			{ 
				"$unwind" : { 
					"path" : "$DS_LoaiMA"
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "mon_ans", 
					"localField" : "DS_LoaiMA.Danh_sach_mon_an", 
					"foreignField" : "_id", 
					"as" : "DS_Monan"
				}
			}
		], 
		function (err, result) {
			if (err) {
				console.log("\nKhông lấy được danh sách món ăn : " + err);
				res.send({ return_code: "0" });
			}
			else {
				console.log("\nLấy danh sách món ăn thành công : " + req.body.idcuahang);
				res.send({ return_code: "1" , infor : result});
			}
		}
	);	
});


//Hiển thị danh sách món ăn khi click chọn loại món ăn
app.post("/Hienthimonan_chonloaimonan", urlEncodeParser, async function (req, res) {
	var result = "";
	LOAI_MONAN.aggregate(
		[
			{ 
				"$match" : { 
					"_id" : mongoose.Types.ObjectId(req.body.idloaimonan)
				}
			}, 
			{ 
				"$lookup" : { 
					"from" : "mon_ans", 
					"localField" : "Danh_sach_mon_an", 
					"foreignField" : "_id", 
					"as" : "DS_Monan"
				}
			}, 
			{ 
				"$project" : { 
					"DS_Monan" : 1.0
				}
			}, 
			{ 
				"$unwind" : { 
					"path" : "$DS_Monan"
				}
			}
		], 
		function (err, result) {
			if (err) {
				console.log("\nKhông lấy được danh sách món ăn : " + err);
				res.send({ return_code: "0" });
			}
			else {
				console.log("\nLấy danh sách món ăn thành công : " + req.body.idloaimonan);
				res.send({ return_code: "1" , infor : result});
			}
		}
	);
});


//Thêm loại món ăn cho cửa hàng
//params: idCuaHang, Ten_loai_mon_an
app.post("/them_loaimonan", urlEncodeParser, async function (req, res) {
	if(req.body.Ten_loai_mon_an != null && req.body.Ten_loai_mon_an != ""){
		var newLoaiMonAn = new LOAI_MONAN({
			Ten_loai_mon_an : req.body.Ten_loai_mon_an,
			Danh_sach_mon_an: []
		});
		newLoaiMonAn.save(function(err, result){
			if(err){
				console.log("Thêm loại món ăn thất bại, lỗi save !");
				res.send({return_code: "0"});
			} else {
					CUAHANG.findByIdAndUpdate({_id: mongoose.Types.ObjectId(req.body.idCuaHang)},
						{ $push: { Loai_MonAn: result._id } },
						function(errThemMA, resThemMA){
							if(err){
								console.log("Thêm loại món ăn thất bại, lỗi push loại món ăn vào cửa hàng !");
								res.send({return_code: "0"});
							} else {
				console.log("Thêm loại món ăn thành công !");
				res.send({return_code: "1", infor : result});
							}
						}
					);
			}
		});
	} else{
		console.log("Thêm loại món ăn thất bại, lỗi params !");
		res.send({return_code: "0"});
	}
});

//Thêm món ăn cho cửa hàng
//params: idLoaiMonAn, Ten_mon_an, Mo_ta_mon_an, Don_gia_mon_an
app.post("/them_monan", urlEncodeParser, async function (req, res) {
	uploadFile(req, res, (error) => {
		if(req.body.Ten_mon_an != null && req.body.Ten_mon_an != "" &&
		req.body.Don_gia_mon_an != null && req.body.Don_gia_mon_an != "" &&
		req.body.idLoaiMonAn != null && req.body.idLoaiMonAn != "" &&
		req.file != null && req.file.filename != ""){
			var newMonAn = new MON_AN({
				Ten_mon_an: req.body.Ten_mon_an,
				Mo_ta_mon_an: req.body.Mo_ta_mon_an,
				Don_gia_mon_an: req.body.Don_gia_mon_an,
				Hinh_anh_mon_an: req.file.filename,
				Trang_thai_mon_an: "1",
				So_luong_mua: 0,
				So_luong_thich: 0
			});
			newMonAn.save(function(err, result){
				if(err){
					console.log("Thêm món ăn thất bại, lỗi save !");
					res.send({return_code: "0"});
				} else {
					LOAI_MONAN.findByIdAndUpdate({_id: mongoose.Types.ObjectId(req.body.idLoaiMonAn)},
						{ $push: { Danh_sach_mon_an: result._id } },
						function(errThemMA, resThemMA){
							if(err){
								console.log("Thêm món ăn thất bại, lỗi push món ăn vào loại món ăn !");
								res.send({return_code: "0"});
							} else {
								console.log("Thêm món ăn thành công !");
								res.send({return_code: "1", infor : result});
							}
						}
					);
				}
			});
		} else{
			console.log("Thêm món ăn thất bại, lỗi params !");
			res.send({return_code: "0"});
		}
	});
});


//route Hientatdanhsachcaccuahang
app.get("/Hientatdanhsachcaccuahang", function (req, res) {
	CUAHANG.find(function (err, items) {
		if (err)
			res.send("Lấy danh sách cửa hàng gặp lỗi : " + err);
		else
			res.send(items);
	});
});

const getKMHeThongCuaCuaHang = async(idCuaHang) => {
	return new Promise(function(resolve, reject) {
		CHINHANH.find(
			{DanhSach_CH : {$in : [mongoose.Types.ObjectId(idCuaHang)]}},
			function(errCN, successResutltCN){
				if(errCN || successResutltCN == null || successResutltCN.length != 1){
					console.log("Tìm chi nhánh của cửa hàng :", errCN, successResutltCN);
					resolve(null);
				} else{
					console.log("Tìm thấy chi nhánh của cửa hàng !");
					var idChiNhanh = successResutltCN[0]._id;						
					KHUYENMAI_HETHONG.find(
						{DanhSach_CN : {$in : [mongoose.Types.ObjectId(idChiNhanh)]}},
						function(errKMHT, successResutlt){
							if(errKMHT || successResutlt.length == 0){
								console.log("Lấy danh sách khuyến mãi của cửa hàng : " + errKMHT);
								resolve(null);
							} else{
								console.log("Lấy danh sách khuyến mãi hệ thống dành cho cửa hàng thành công !");
								resolve(successResutlt);
							}
						}
					)
				}
		});
	});
}


//route get danh sách các khuyến mãi mà hệ thống áp dụng cho cửa hàng
//params : idCuaHang
app.post("/getKMHeThongCuaCuaHang", urlEncodeParser, async function (req, res) {
	if(req.body.idCuaHang != null && req.body.idCuaHang != ""){
		Promise.all([
				getKMHeThongCuaCuaHang(req.body.idCuaHang)
			]).then(function (resolve) {
				if(resolve[0] == null || resolve[0].length == 0) {
					res.send({return_code : "0"});
				} else {
					res.send({return_code : "1", infor : resolve[0]});
				}
			});
	} else{
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});


//xác định xem cửa hàng này có nằm trong danh mục chưa
const danhMucCuaHangChuaCuaHang = async (listIDCuaHang, iCUAHANG) => {
	return new Promise(function (resolve, reject) {
		DIACHI.findById({_id : mongoose.Types.ObjectId(iCUAHANG.Dia_Chi_Cua_Hang)},function(err, success){
			if(err|| success == null){
				resolve(null);
			} else{
				var idx = -1;
				listIDCuaHang.DanhSach_CH.forEach(function(item){
					if(String(item + "") ===  String(iCUAHANG._id + "")){
						 idx = 0;
					 }
				});
				console.log(listIDCuaHang.DanhSach_CH, iCUAHANG._id, idx);
						
				if(idx < 0){
					resolve({CH : iCUAHANG, isInclude : 0, DiaChi : success});
				} else {
					resolve({CH : iCUAHANG, isInclude : 1, DiaChi : success});
				}
			}
		})
	});
}

//route get danh sách cửa hàng thuộc danh mục cửa hàng trang chủ
//params : idDanhMuc
app.post("/getDanhSachCuaDanhMuc", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""){
		DANHMUC_CUAHANG_TRANGCHU.findById({_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
		function(errDM, successResutltDM){
			if(errDM || successResutltDM == null){
				console.log("Query lỗi : " + errDM);
				res.send({return_code : "0"});
			} else {
				// CUAHANG.find({ '_id': { $in: successResutltDM.DanhSach_CH }},
				CUAHANG.find({},
					function(err, successResutlt){
						if(err || successResutlt.length == 0){
							console.log("Query lỗi : " + err);
							res.send({return_code : "0"});
						} else {
							var time_label = Date.now();
							console.time(time_label + "_" + req.body.idDanhMuc);
							Promise.all(
								successResutlt.map(function (iCUAHANG) {
									return danhMucCuaHangChuaCuaHang(successResutltDM, iCUAHANG);
								}))
								.then(function (resolveCuaHangs) {
									console.timeEnd(time_label + "_" +req.body.idDanhMuc);
									res.send({return_code : "1", infor : resolveCuaHangs});
								});
						}
					});
			}
		})
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
})

app.post("/themXoaCuaHang_DanhMuc", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""
	&& req.body.idCuaHang != null && req.body.idCuaHang != ""
	&& req.body.state != null && req.body.state != ""){
		if(req.body.state == "1"){
			DANHMUC_CUAHANG_TRANGCHU.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$push : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Thêm cửa hàng vào danh mục trang chủ thành công !");
					res.send({return_code: "1"});
				}
			});
		} else{
			DANHMUC_CUAHANG_TRANGCHU.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$pull : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Xóa cửa hàng khỏi danh mục trang chủ thành công !");
					res.send({return_code: "1"});
				}
			});
		}
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});


//route get danh sách cửa hàng thuộc danh mục cửa hàng hôm nay
//params : idDanhMuc
app.post("/getDanhSachCuaDanhMucHomNay", urlEncodeParser, async function (req, res) {
	const label = Date.now();
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""){
		console.time(label + "_" +req.body.idDanhMuc);
		DANHSACH_CUAHANG_HOMNAY.findById({_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
		function(errDM, successResutltDM){
			if(errDM || successResutltDM == null){
				console.log("Query lỗi : " + errDM);
				res.send({return_code : "0"});
			} else {
				CUAHANG.find({},
					function(err, successResutlt){
						if(err || successResutlt.length == 0){
							console.log("Query lỗi : " + err);
							res.send({return_code : "0"});
						} else {
							Promise.all(
								successResutlt.map(function (iCUAHANG) {
									return danhMucCuaHangChuaCuaHang(successResutltDM, iCUAHANG);
								}))
								.then(function (resolveCuaHangs) {
									console.timeEnd(label + "_" +req.body.idDanhMuc);
									res.send({return_code : "1", infor : resolveCuaHangs});
								});
						}
					}
				);
			}
		})
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
})

//route thêm xóa cửa hàng trong danh mục cửa hàng hôm nay
app.post("/themXoaCuaHang_DanhMuc_Cuahanghomnay", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""
	&& req.body.idCuaHang != null && req.body.idCuaHang != ""
	&& req.body.state != null && req.body.state != ""){
		if(req.body.state == "1"){
			DANHSACH_CUAHANG_HOMNAY.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$push : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Thêm cửa hàng vào danh mục hôm nay thành công !");
					res.send({return_code: "1"});
				}
			});
		} else{
			DANHSACH_CUAHANG_HOMNAY.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$pull : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Xóa cửa hàng khỏi danh mục hôm nay thành công !");
					res.send({return_code: "1"});
				}
			});
		}
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});


//route thêm xóa chi nhánh khỏi danh mục khuyến mãi hệ thống
app.post("/themXoaChiNhanh_DanhMuc_KhuyenMaiHeThong", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""
	&& req.body.idCuaHang != null && req.body.idCuaHang != ""
	&& req.body.state != null && req.body.state != ""){
		if(req.body.state == "1"){
			KHUYENMAI_HETHONG.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$push : {DanhSach_CN : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Thêm chi nhánh vào danh mục khuyến mãi hệ thống thành công !");
					res.send({return_code: "1"});
				}
			});
		} else{
			KHUYENMAI_HETHONG.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$pull : {DanhSach_CN : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Xóa chi nhánh khỏi danh mục khuyến mãi hệ thống thành công !");
					res.send({return_code: "1"});
				}
			});
		}
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});


//route get danh sách cửa hàng thuộc danh mục loại món ăn
//params : idDanhMuc
app.post("/getDanhSachCuaHang_LoaiMonAn", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""){
		console.log(req.body);
		DANHMUC_LOAIMONAN.findById({_id : req.body.idDanhMuc},
		function(errDM, successResutltDM){
			if(errDM || successResutltDM == null){
				console.log(errDM, successResutltDM);
				res.send({return_code : "0"});
			} else {
				CUAHANG.find({},
					function(err, successResutlt){
						if(err || successResutlt.length == 0){
							console.log("Query lỗi : " + err);
							res.send({return_code : "0"});
						} else {
							var time_label = Date.now();
							console.time(time_label + "_" +req.body.idDanhMuc);
							Promise.all(
								successResutlt.map(function (iCUAHANG) {
									return danhMucCuaHangChuaCuaHang(successResutltDM, iCUAHANG);
								}))
								.then(function (resolveCuaHangs) {
									console.timeEnd(time_label + "_" +req.body.idDanhMuc);
									res.send({return_code : "1", infor : resolveCuaHangs});
								});
						}
					});
			}
		})
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
})


//route thêm xóa cửa hàng trong danh mục cửa hàng hôm nay
app.post("/themXoaCuaHang_DanhMuc_LoaiMonAn", urlEncodeParser, async function (req, res) {
	if(req.body.idDanhMuc != null && req.body.idDanhMuc != ""
	&& req.body.idCuaHang != null && req.body.idCuaHang != ""
	&& req.body.state != null && req.body.state != ""){
		if(req.body.state == "1"){
			DANHMUC_LOAIMONAN.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$push : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Thêm cửa hàng vào danh mục hôm nay thành công !");
					res.send({return_code: "1"});
				}
			});
		} else{
			DANHMUC_LOAIMONAN.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idDanhMuc)},
				{$pull : {DanhSach_CH : req.body.idCuaHang}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Xóa cửa hàng khỏi danh mục hôm nay thành công !");
					res.send({return_code: "1"});
				}
			});
		}
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});


//xác định xem chi nhánh này có được áp dụng khuyến mãi chưa
const chinhanh_thuoc_khuyenmai_hethong = async (successResutltKM, iCHINHANH) => {
	return new Promise(function (resolve, reject) {
		//kiểm tra xem id của chi nhánh có thuộc list id chi nhánh KM ko
		var idx = successResutltKM.DanhSach_CN.indexOf(iCHINHANH._id);
		if(idx < 0){
			resolve({CN : iCHINHANH, isInclude : 0});
		} else {
			resolve({CN : iCHINHANH, isInclude : 1});
		}
	});
}

//route get danh sách chi nhánh thuộc Khuyến mãi hệ thống, kiểm tra xem chi nhánh này có dc áp dụng khuyến mãi này chưa
//params : idKhuyenmaihethong
app.post("/getDanhSachChiNhanhKMHT", urlEncodeParser, async function (req, res) {
	if(req.body.idKhuyenmaihethong != null && req.body.idKhuyenmaihethong != ""){
		KHUYENMAI_HETHONG.findById({_id : mongoose.Types.ObjectId(req.body.idKhuyenmaihethong)},
		function(errDM, successResutltKM){
			if(errDM || successResutltKM == null){
				console.log("Query lỗi : " + errDM);
				res.send({return_code : "0"});
			} else {
				CHINHANH.find({},
					function(err, successResutltListCN){
						if(err || successResutltListCN.length == 0){
							console.log("Query lỗi : " + err);
							res.send({return_code : "0"});
						} else {
							var time_label = Date.now();
							console.time(time_label + "_" +req.body.idKhuyenmaihethong);
							Promise.all(
								successResutltListCN.map(function (iCHINHANH) {
									return chinhanh_thuoc_khuyenmai_hethong(successResutltKM, iCHINHANH);
								}))
								.then(function (resolveChiNhanhs) {
									console.timeEnd(time_label + "_" +req.body.idKhuyenmaihethong);
									res.send({return_code : "1", infor : resolveChiNhanhs});
								});
						}
					}
				);
			}
		})
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
})

//route thêm xóa chi nhánh trong khuyến mãi hệ thống
app.post("/themXoaChiNhanh_KMHT", urlEncodeParser, async function (req, res) {
	if(req.body.idKhuyenmaihethong != null && req.body.idKhuyenmaihethong != ""
	&& req.body.idChiNhanh != null && req.body.idChiNhanh != ""
	&& req.body.state != null && req.body.state != ""){
		if(req.body.state == "1"){
			KHUYENMAI_HETHONG.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idKhuyenmaihethong)},
				{$push : {DanhSach_CN : req.body.idChiNhanh}},
				function(err, success){	
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Thêm chi nhánh vào KMHT thành công !");
					res.send({return_code: "1"});
				}
			});
		} else{
			KHUYENMAI_HETHONG.findByIdAndUpdate(
				{_id : mongoose.Types.ObjectId(req.body.idKhuyenmaihethong)},
				{$pull : {DanhSach_CN: req.body.idChiNhanh}},
				function(err, success){
				if(err || success == null){
					console.log("Lỗi query !");
					res.send({return_code : "0"});
				} else {
					console.log("Xóa chi nhánh ra KMHT thành công !");
					res.send({return_code: "1"});
				}
			});
		}
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
});

//route thêm xóa chi nhánh trong khuyến mãi hệ thống
app.post("/kichHoatCuaHang", urlEncodeParser, async function (req, res) {
	console.log(req.body);
	if(req.body.idCuaHang != null && req.body.idCuaHang != ""
	&& req.body.state != null && req.body.state != ""){
		CUAHANG.findByIdAndUpdate(
			{_id : mongoose.Types.ObjectId(req.body.idCuaHang)},
			{Trang_Thai_Cua_Hang : req.body.state},
			function(err, result){
				if(err) {
					console.log("Lỗi params !");
					res.send({return_code : "0"});
				} else {
					console.log("Kích hoạt cửa hàng thành công !");
					res.send({return_code : "1"});
				}
			});
	} else {
		console.log("Lỗi params !");
		res.send({return_code : "0"});
	}
})


//route hiển thị các chi nhánh thuộc khyến mãi
app.post("/Hienthichinhanh_thuockhuyenmai", urlEncodeParser, function (req, res) {
	KHUYENMAI_HETHONG.aggregate(
		[
			{
				"$match": {
					"_id": mongoose.Types.ObjectId(req.body.idKhuyenmaihethong)
				}
			},
			{
				"$project": {
					"DanhSach_CN": 1.0
				}
			},
			{
				"$lookup": {
					"from": "chinhanhs",
					"localField": "DanhSach_CN",
					"foreignField": "_id",
					"as": "Chinhanh_KMHT"
				}
			},
			{
				"$project": {
					"Chinhanh_KMHT": 1.0,
					"_id": 0.0
				}
			},
			{
				"$unwind": {
					"path": "$Chinhanh_KMHT"
				}
			}
		],
		function (err, result) {
			if (err) {
				res.send({return_code: "0"});
			}

			else {
				res.send({return_code: "1", infor : result});
			}

		}
	);
});


//route lấy danh sách đơn hàng của khách hàng
//đơn hàng tạm - khách hàng chưa đặt : state = 0
//đơn hàng khách hàng đã đặt đang chờ cửa hàng xác nhận - state = 1
//đơn hàng cửa hàng đã xác nhận(state = 2)/hủy(state = 3) 
app.post("/danhSachDonHang_KhachHang", urlEncodeParser, function (req, res) {
	DON_HANG.aggregate(
		[
			{
				"$match": {
					"IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang),
					"Trang_thai_don_hang" : req.body.state
				}
			}
		],
		function (err, result) {//result là danh sách đơn hàng của khách hàng A
			if (err) {
				console.log("Lấy danh sach đơn hàng của khách hàng gặp lỗi : " + err);
				res.send({ return_code: "0", error_infor: "Lỗi server khi query." });
			} else {
				if (result != null && result.length > 0) {
					Promise.all(
						result.map(function (iDONHANG) {
							return capNhatDonHang_extend(iDONHANG);//tìm thông tin cho đơn hàng
						}))
						.then(function (resolveDonHangs) {
							res.send({return_code: "1", infor : resolveDonHangs});
						});
				} else {
					console.log("Khách hàng không có đơn !");
					res.send({ return_code: "0", error_infor: "Khách hàng không có đơn !" });
				}
			}
		}
	);
});

//route thêm địa chỉ cho khách hàng
app.post("/themDiaChi", urlEncodeParser, function (req, res) {
	var newAddress = new DIACHI({
		Dia_Chi: req.body.address,
		Vi_do: req.body.lat,
		Kinh_do: req.body.lng,
	});
	newAddress.save(function(err,result) {
		if(err){
			console.log(err);
			res.send({return_code: "0"});
			return;
		}
		console.log(result);
		KHACH_HANG.findById(
			{_id : mongoose.Types.ObjectId(req.body.idKhachHang)}
			,function(errKH, resultKH){
				if(errKH){
					console.log(errKH);
					res.send({return_code: "0"});
					return;
				}
				switch (req.body.type) {
					case "0"://địa chĩ khác
						resultKH.Dia_chi_khac.push(result._id);
						break;
					case "1"://địa chỉ nhà
						resultKH.Dia_chi_nha = result._id;
						break;
					case "2"://địa chỉ công ty
						resultKH.Dia_chi_cong_ty = result._id;
						break;
					default:
						console.log("Thêm địa chỉ cho khách hàng thất bại !");
						res.send({return_code: "0"});
						return;
						break;
				}
				resultKH.save(function(errSave, resultSave){
					if(errSave){
						console.log(errSave);
						res.send({return_code: "0"});
						return;
					} else{
						console.log("Thêm địa chỉ thành công !");
						res.send({return_code: "1", type : req.body.type, infor : result});
					}
				})
			}
		)
	})
});

//lấy danh sách id cửa hàng thuộc 1 chi nhánh
const getListCH_Id = async (idChiNhanh) => {
	var label = Date.now();
	console.time(idChiNhanh + "- getListCH_id - " + label);
	return new Promise(function (resolve, reject) {
		CHINHANH.aggregate(
			[
				{ 
					"$match" : { 
						"_id" : mongoose.Types.ObjectId(idChiNhanh)
					}
				},
				{ 
					"$project" : { 
						"DanhSach_CH" : 1.0
					}
				}, 
				// { 
				// 	"$lookup" : { 
				// 		"from" : "cuahangs", 
				// 		"localField" : "DanhSach_CH", 
				// 		"foreignField" : "_id", 
				// 		"as" : "listCH"
				// 	}
				// }
			],function (err, result){
				console.timeEnd(idChiNhanh + "- getListCH_id - " + label);
				if(result.length > 0)
					resolve(result[0].DanhSach_CH);
				else
					resolve([]);
			});
	});
}

//route lấy danh sách tất cả cửa hàng được khuyến mãi hệ thống áp dụng
app.post("/getDanhSachCuaHangKMHT", urlEncodeParser, function (req, res) {
	if(req.body.idDanhMuc == null || req.body.idDanhMuc == ""){
		console.log("Error paramms !");
		res.send({return_code : "0"});
		return;
	}
	const label = Date.now();
	console.time(label + "_getDanhSachCuaHangKMHT_" + req.body.idDanhMuc);
	KHUYENMAI_HETHONG.findById({_id: mongoose.Types.ObjectId(req.body.idDanhMuc)},
		function(errKMHT,resultKMHT){
			if(errKMHT){
				console.log("Lỗi tìm kiếm khyến mãi hệ thống !");
				res.send({return_code : "0"});
				return;
			}
			Promise.all(
				resultKMHT.DanhSach_CN.map(function (idChiNhanh) {
					return getListCH_Id(idChiNhanh);
			})).then(function (resolveIdCuaHnags) {
					var arrIdCuaHang = [];
					resolveIdCuaHnags.map(function (itemI) {
						itemI.map(function (itemJ) {
							arrIdCuaHang.push(itemJ);
						});
					});
					if(arrIdCuaHang.length == 0){
						console.log("Khuyến mãi không có cửa hàng được áp dụng !");
						res.send({return_code : "0"});
						return;
					}
					CUAHANG.find({ '_id': { $in: arrIdCuaHang }},
					function(errCH, successResutlt){
						if(errCH || successResutlt.length == 0){
							console.log("Lỗi tìm kiếm cửa hàng !");
							res.send({return_code : "0"});
						} else {
							Promise.all(
								successResutlt.map(function (iCUAHANG) {
									return danhMucCuaHangChuaCuaHang({DanhSach_CH : arrIdCuaHang}, iCUAHANG);
								}))
								.then(function (resolveCuaHangs) {
									console.timeEnd(label + "_getDanhSachCuaHangKMHT_" + req.body.idDanhMuc);
									res.send({return_code : "1", infor : resolveCuaHangs});
								});
						}
					});
				});
	});
});



//lấy thông tin cửa hàng cho đơn hàng
const addThongTinCuaHang_DonHang = async (iDONHANG) => {
	var label = Date.now();
	console.time(iDONHANG._id + "- addThongTinCuaHang_DonHang - " + label);
	return new Promise(function (resolve, reject) {
		CUAHANG.aggregate(
			[
				{ $match: { _id: mongoose.Types.ObjectId(iDONHANG.IdCuaHang) } },
				{
					$lookup: {
						from: 'diachis',
						localField: 'Dia_Chi_Cua_Hang',
						foreignField: '_id',
						as: 'diachiCH'
					}
				}
			]
			, function (err, result) {
				console.timeEnd(iDONHANG._id + "- addThongTinCuaHang_DonHang - " + label);
				resolve({DonHang : iDONHANG, CuaHang : result});
			});
	});
}


app.post("/getDanhSachDonHangKH", urlEncodeParser, function (req, res) {
	if(req.body.idKhachHang == null || req.body.idDanhMuc == null || req.body.idKhachHang == "" || req.body.idDanhMuc == ""){
		console.log("Error params !")
		res.send({return_code: "0"});
		return;
	}
	var condition_state;
	if(req.body.idDanhMuc == "0"){
		condition_state = {
			"IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang),
			"Trang_thai_don_hang" : "0"
		};
	} else if(req.body.idDanhMuc == "1") {
		condition_state = {
			"IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang),
			$or: [
				{ 'Trang_thai_don_hang': "1" },
				{ 'Trang_thai_don_hang': "2" }
			  ]
		};
	} else if(req.body.idDanhMuc == "2"){
		condition_state = {
			"IdKhachHang": mongoose.Types.ObjectId(req.body.idKhachHang),
			$or: [
				{ 'Trang_thai_don_hang': "3" },
				{ 'Trang_thai_don_hang': "4" }
			  ]
		};
	}
	DON_HANG.aggregate(
		[
			{
				"$match": condition_state
			}
		],
		function (err, result) {
			if (err || result.length == 0) {
				console.log("Lấy danh sach đơn hàng của khách hàng gặp lỗi : " + err);
				res.send({ return_code: "0", error_infor: "Lỗi server khi query." });
			} else {
				if (result != null && result.length > 0) {
					Promise.all(
						result.map(function (iDONHANG) {
							return addThongTinCuaHang_DonHang(iDONHANG);
						}))
						.then(function (resolveDonHangs) {
							console.log(resolveDonHangs);
							res.send({return_code: "1", infor : resolveDonHangs});
						});
				} else {
					console.log("Khách hàng không có đơn hàng !");
					res.send({ return_code: "0", error_infor: "Cửa hàng không có đơn hàng !" });
				}
			}
		}
	);
});

const addDistance_CountOrder = async (iCUAHANG, lat, lng) => {
	return new Promise(function (resolve, reject) {
		if(lat == 0.0 || lng == 0.0){
			lat = iCUAHANG.diachiCH[0].Vi_do;
			lng = iCUAHANG.diachiCH[0].Kinh_do;
		}
		resolve({
			inforCH : iCUAHANG, 
			distance : geolib.getDistance(
				{latitude: iCUAHANG.diachiCH[0].Vi_do, longitude: iCUAHANG.diachiCH[0].Kinh_do}, 
				{latitude: lat, longitude: lng}, 0.0001),
			countOrder : iCUAHANG.Thong_Tin_KH_Dat_Don.length
		});
	});
}

//route post Hienthiketqua_timkiemmonan
//method post(truyền valueSearch)
//Param  valueSearch
//Hiển thị kết quả tìm kiếm gồm danh sách cửa hàng và món ăn cửa hàng đó//
app.post("/Hienthiketqua_timkiemmonan", urlEncodeParser, function (req, res) {
	if(req.body.valueSearch == null || req.body.valueSearch == "") {
		console.log("Error params !");
		res.send({return_code : "0"});
		return;
	}
	var lat = 0.0, lng = 0.0;//10.881654 106.648632
	if(req.body.lat != null || req.body.lat != "") {
		lat = req.body.lat;
	}
	if(req.body.lng != null || req.body.lng != "") {
		lng = req.body.lng;
	}
	var time_label = Date.now();
	console.time(time_label + "search : " + req.body.valueSearch);
	CUAHANG.aggregate(
		[
			{
				"$lookup": {
					"from": "loai_monans",
					"localField": "Loai_MonAn",
					"foreignField": "_id",
					"as": "menus"
				}
			},
			{
				"$lookup": {
					"from": "mon_ans",
					"localField": "menus.Danh_sach_mon_an",
					"foreignField": "_id",
					"as": "thongTinMonAns"
				}
			},
			{
				"$lookup": {
					from: 'diachis',
					localField: 'Dia_Chi_Cua_Hang',
					foreignField: '_id',
					as: 'diachiCH'
				}
			},
			{
				"$project": {
					"Ten_Cua_Hang": 1.0,
					"Thong_Tin_KH_Dat_Don": 1.0,
					"Hinh_Anh_Cua_Hang": 1.0,
					"thongTinMonAns": 1.0,
					"diachiCH": 1.0
				}
			},
			{
				"$match": {
					"Ten_Cua_Hang": { $regex: req.body.valueSearch, $options: 'i' }
				}
			}
		],
		function (err, result) {
			if (err || result.length == 0){
				console.log("Không tìm thấy cửa hàng !");
				res.send({return_code: "0"});
			}
			else{
				Promise.all(
					result.map(function (iCH) {
						return addDistance_CountOrder(iCH, lat, lng);
					}))
					.then(function (resolveCH) {
						var distanceRestul = [];
						var orderResult = [];
						if(lat != 0.0 && lng != 0.0){
							distanceRestul = resolveCH.sort((a, b) => (a.distance >= b.distance) ? 1 : -1).slice(0, 10);
						}
						orderResult =  resolveCH.sort((a, b) => (a.countOrder <= b.countOrder) ? 1 : -1).slice(0, 10);
						// } else {
						// 	distanceRestul = resolveCH;
						// 	orderResult = resolveCH;
						// }
						console.log("Kết thúc tìm kiếm !");
						console.timeEnd(time_label + "search : " + req.body.valueSearch);
						res.send({
							return_code : "1",
							nearestResult : resolveCH.slice(0, 3),
							distanceRestul : distanceRestul,
							orderResult : orderResult
						});
					});
			}
		}
	);
});

function getStatistic(arrResult){
	// var resultStatistic = [];
	var arrLabel = [];
	var arrState_1 = [];
	var arrState_2 = [];
	var arrState_3 = [];
    arrResult.forEach(function(item){
		arrLabel.push(item._id.date.toISOString().substring(0, 10));
		// console.log(item._id.date.toString().substring(0, 10));
		// console.log(item._id.date.toString());
		// console.log(item._id.date);
		// console.log(item._id.date.toISOString());
		// console.log(item._id.date.toISOString().substring(0, 10));
        var objItem = {};
        objItem.date = item._id;
        var i1 = 0, i2 = 0, i3 = 0;
        item.arrState.forEach(function(stateOrder){
            // console.log(stateOrder);
            switch (stateOrder) {
                case "1":
                    i1 += 1;
                    break;
                case "2":
                    i2 += 1;
                    break;
                case "3":
                    i3 += 1;
                    break;
            }
		});
		arrState_1.push(i1);
		arrState_2.push(i2);
		arrState_3.push(i3);
        // objItem.state_1 = i1;
        // objItem.state_2 = i2;
        // objItem.state_3 = i3;
        // resultStatistic.push(objItem);
	})
	var barChart = {};
	barChart.labels = arrLabel;
	barChart.state_1 = arrState_1;
	barChart.state_2 = arrState_2;
	barChart.state_3 = arrState_3;
    return barChart;
}

//route lấy thông tin thống kê của cửa hàng
//method post
//Param  idCuaHang
//gửi về thông thống kê các đơn hàng của cửa hàng
app.post("/cuaHangThongKeDonHang", urlEncodeParser, function (req, res) {
	if(req.body.idCuaHang == null || req.body.idCuaHang == "" ||
		req.body.firstDay == null || req.body.firstDay == "" ||
		req.body.lastDay == null || req.body.lastDay == ""
	){
		return res.send({return_code: "0"});
	}
	console.log(req.body);
	var firstDay = new Date(req.body.firstDay);
	var lastDay = new Date(req.body.lastDay);
	var firstDay = new Date(req.body.firstDay);
	var lastDay = new Date(req.body.lastDay);
	console.log(firstDay, lastDay);
	console.log(firstDay.toISOString(), lastDay.toISOString());
	console.log(firstDay.toLocaleDateString(), lastDay.toLocaleDateString());
	CUAHANG.aggregate(
		[
			{
				'$match': {
				  '_id': mongoose.Types.ObjectId(req.body.idCuaHang)
				}
			  }, {
				'$lookup': {
				  'from': 'don_hangs', 
				  'localField': 'Thong_Tin_KH_Dat_Don', 
				  'foreignField': '_id', 
				  'as': 'orders'
				}
			  }, {
				'$project': {
				  'orders': 1, 
				  '_id': 0
				}
			  }, {
				'$unwind': {
				  'path': '$orders'
				}
			  },  
			  {
				$addFields : {
					"dateStatistic" : {
						$cond: { 
						  if: { $eq: ["$orders.Trang_thai_don_hang", "1"]},
						  then: "$orders.createdAt",
						  else: "$orders.updatedAt"
						  }
					  }
				  }
			   },
			  {
				'$match': {
					// '$orders.createdAt' : 
					// {$gte : firstDay},
					// '$orders.updatedAt' : 
					// {$lt : lastDay}
						// $or : [{
						'dateStatistic' : {
							$gte: firstDay,
							// $lt: lastDay
						//   },
						// },{
						// '$dateStatistic': {
							// $gte: firstDay,
							$lt: lastDay
						  }
						// }]
				}
			  }, 
			  {
				'$group': {
					'_id': {
						'date': {
							'$dateFromParts': {
							  'year': {
								'$year': '$dateStatistic'
							  }, 
							  'month': {
								'$month': '$dateStatistic'
							  }, 
							  'day': {
								'$dayOfMonth': '$dateStatistic'
							  }
							}
						  }
					  }, 
					  'arrState': {
						'$push': '$orders.Trang_thai_don_hang'
					  }
				}
			  }
		 ], function(err, result){
			 if(err || result.length == 0){
				// console.log("Không có kết quả thống kê");
				return res.send({return_code: "0"});
			 } else {
				result.sort((a, b) => (a._id.date >= b._id.date) ? 1 : -1);
				// console.log(result);
				return res.send({return_code: "1", data : getStatistic(result)});
			 }
	});
});



//route cập nhật số điện thoại của khách hàng
//method post
//Param  token, phonenumber
app.post("/capNhatSoDienThoaiKhachHang", urlEncodeParser, function (req, res) {
	if(req.body.token == null || req.body.token == "" || req.body.phonenumber == null || req.body.phonenumber == "")
		return res.send({return_code: "0"});
	if(!verifyUser(req, res))
		return;
	KHACH_HANG.findByIdAndUpdate(
		{_id : mongoose.Types.ObjectId(req.body.idKhachHang)},
		{
			$set: { So_dien_thoai: req.body.phonenumber }
		},
		function(err, result){
			if(err || result == null){
				return res.send({return_code: "0"});
			} else {
				return res.send({return_code: "1"});
			}
	});
});


// var newGiaoDich = new LICH_SU_GIAO_DICH({
// 	Ma_Giao_Dich : "2321466669",
//     Ma_Don_Hang : "merchantCode7a10f",
//     Id_Don_Hang : mongoose.Types.ObjectId("5f22842dc3eef253f8538010"),
// 	Id_Khach_Hang : mongoose.Types.ObjectId("5ecd32dcd3192238e8b35fd2"),
// 	Id_Cua_Hang : mongoose.Types.ObjectId("5ec39da122336e32d01a2401"),
//     So_Tien : 105000,
//     So_Dien_Thoai : "05663731898",
// });
// newGiaoDich.save(function(err, resultAcc) {
// 	console.log(err, resultAcc);
// })