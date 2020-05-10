const mongoose = require("mongoose");

const khuyenmaihethongSchema = new mongoose.Schema({
    GioBD : String,
    GioKT : String,
    Icon : String,
    DanhSach_CH : [{type : mongoose.Types.ObjectId}],
    MaGiamGia : String,
    PhanTram_GiamGia : String,
});

module.exports = mongoose.model("KHUYENMAI_HETHONG", khuyenmaihethongSchema);