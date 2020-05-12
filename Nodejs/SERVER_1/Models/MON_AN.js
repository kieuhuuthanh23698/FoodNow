const mongoose = require("mongoose");

const monanSchema = new mongoose.Schema({
    Ten_mon_an : String,
    Mo_ta_mon_an : String,
    Don_gia_mon_an : Number,
    Hinh_anh_mon_an : String,
    Trang_thai_mon_an: String,
    So_luong_mua:Number,
    So_luong_thich:Number
});

module.exports = mongoose.model("MON_AN", monanSchema);