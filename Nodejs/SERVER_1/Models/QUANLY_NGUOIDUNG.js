const mongoose = require("mongoose");

const quanlynguoidungSchema = new mongoose.Schema({
    Ten_dang_nhap: String,
    Mat_khau: String,
    Trang_thai: String
});

module.exports = mongoose.model("QUANLY_NGUOIDUNG", quanlynguoidungSchema);