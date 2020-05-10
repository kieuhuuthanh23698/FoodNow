const mongoose = require("mongoose");

const danhsachcuahanghomnaySchema = new mongoose.Schema({
    Thongtin_Chinh : String,
    Thongtin_Phu : String,
    HinhAnh_CH : String,
    DanhSach_CH : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("DANHSACH_CUAHANG_HOMNAY", danhsachcuahanghomnaySchema);