const mongoose = require("mongoose");

const donhangSchema = new mongoose.Schema({
    IdKhachHang: mongoose.Types.ObjectId,
    IdCuaHang: mongoose.Types.ObjectId,
    Ngay_nhan_don_hang: Date,
    Dia_chi_giao_hang: String,
    Do_dai_duong_di : Number,
    Phi_ship: Number,
    Total_cart : Number,
    Total : Number,
    Hinh_thuc_thanh_toan: String,
    Ghi_chu_NVGH: String,
    Trang_thai_don_hang: String,//đơn nháp : 0, 
    Chi_tiet_DH: [{
        IdMonAn : mongoose.Types.ObjectId,
        SoLuong : Number,
        GhiChu: String,
        Don_gia: Number,
        Thanh_tien: Number
    }]
},{timestamps: true});

module.exports = mongoose.model("DON_HANG", donhangSchema);