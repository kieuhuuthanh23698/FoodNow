const mongoose = require("mongoose");

const cuahangSchema = new mongoose.Schema({
    Ten_Cua_Hang : String,
    Dia_Chi_Cua_Hang : String,
    Mo_Ta_Cua_Hang: String,
    Thoi_Gian_Bat_Dau: String,
    Thoi_Gian_Ket_Thuc: String,
    Danh_Gia: String,
    Hinh_Anh_Cua_Hang: String,
    Ten_Tai_Khoan: String,
    Mat_Khau: String,
    Trang_Thai_Cua_Hang: String,
    Khuyen_Mai_CH: [{type : mongoose.Types.ObjectId}],
    Thong_Tin_KH_Dat_Don :[{type : mongoose.Types.ObjectId}],
});

module.exports = mongoose.model("CUAHANG", cuahangSchema);