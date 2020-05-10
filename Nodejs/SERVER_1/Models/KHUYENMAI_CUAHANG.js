const mongoose = require("mongoose");

const khuyenmaicuahangSchema = new mongoose.Schema({
    ThongTin_KMCH : String,
    NgayBD : Date,
    NgayKT : Date,
    GioBD : String,
    GioKT : String,
    MaGiamGia : String,
    PhanTram_GiamGia : String,
    MoTa : String  
});

module.exports = mongoose.model("KHUYENMAI_CUAHANG", khuyenmaicuahangSchema);