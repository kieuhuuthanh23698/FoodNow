const mongoose = require("mongoose");

const thucdonSchema = new mongoose.Schema({
    Ten_thuc_don : String,
    Mo_ta_thuc_don : String,
    Don_gia_thuc_don : String,
    Hinh_anh_thuc_don : String,
    Don_vi_tinh:String,
});

module.exports = mongoose.model("THUC_DON", thucdonSchema);