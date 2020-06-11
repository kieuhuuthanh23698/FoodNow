const mongoose = require("mongoose");

const ctdonhangSchema = new mongoose.Schema({
    IdMonAn : mongoose.Types.ObjectId,
    SoLuong : Number,
    GhiChu: String,
    Don_gia: Number,
    Thanh_tien: Number,
});

module.exports = mongoose.model("CT_DON_HANG", ctdonhangSchema);