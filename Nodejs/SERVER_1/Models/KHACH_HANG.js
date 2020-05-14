const mongoose = require("mongoose");

const khachhangSchema = new mongoose.Schema({
    Ten_khach_hang: String,
    So_dien_thoai: Number,
    Email: String,
    Dia_chi_nha: mongoose.Types.ObjectId,
    Dia_chi_cong_ty: mongoose.Types.ObjectId,
    Dia_chi_khac: [{type:mongoose.Types.ObjectId}],
    Tai_khoan: String,
    Mat_khau: String,
    Don_hang_id: [{type:mongoose.Types.ObjectId}],
    Ct_Gio_Hang_id: [{type:mongoose.Types.ObjectId}],
    
});

module.exports = mongoose.model("KHACH_HANG", khachhangSchema);