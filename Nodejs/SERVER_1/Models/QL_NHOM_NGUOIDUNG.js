const mongoose = require("mongoose");

const quanlynhomnguoidungSchema = new mongoose.Schema({
    Ten_nhom: String,
    DanhSach_NguoiDung: [{ type: mongoose.Types.ObjectId }],
});

module.exports = mongoose.model("QL_NHOM_NGUOIDUNG", quanlynhomnguoidungSchema);