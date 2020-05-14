const mongoose = require("mongoose");

const donhangSchema = new mongoose.Schema({
    Ngay_lap_don_hang: Date,
    Ngay_nhan_don_hang: Date,
    Tong_thanh_toan: String,
    Dia_chi_giao_hang: String,
    Hinh_thuc_thanh_toan: String,
    Ghi_chu_NVGH: String,
    Trang_thai_don_hang: String,
    Thong_tin_khach_hang_dat_don: [{type : mongoose.Types.ObjectId}],
    Chi_tiet_dh_id: [{type : mongoose.Types.ObjectId}]
    
});

module.exports = mongoose.model("DON_HANG", donhangSchema);