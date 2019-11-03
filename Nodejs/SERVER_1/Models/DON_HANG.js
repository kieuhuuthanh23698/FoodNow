const mongoose = require("mongoose");

const donhangSchema = new mongoose.Schema({
    Ngay_lap_don_hang: Date,
    Tong_thanh_toan: String,
    Dia_chi_giao_hang: String,
    Hinh_thuc_thanh_toan: String,
    Chi_tiet_dh_id: [{type : mongoose.Types.ObjectId}],
    
});

module.exports = mongoose.model("DON_HANG", donhangSchema);