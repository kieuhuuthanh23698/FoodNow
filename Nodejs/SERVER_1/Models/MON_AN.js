const mongoose = require("mongoose");

const monanSchema = new mongoose.Schema({
    Ten_mon_an : String,
    Mo_ta_thuc_don : String,
    Don_gia_mon_an : Number,
    Hinh_anh_mon_an : String,
    Don_vi_tinh:String,
});

module.exports = mongoose.model("MON_AN", thucdonSchema);