const mongoose = require("mongoose");

const ctdonhangSchema = new mongoose.Schema({
    Thuc_don: mongoose.Types.ObjectId,
    Chi_nhanh: mongoose.Types.ObjectId,
    So_luong: String,
    Don_gia:String,
    Thanh_tien:String,
});

module.exports = mongoose.model("CT_DON_HANG", ctdonhangSchema);