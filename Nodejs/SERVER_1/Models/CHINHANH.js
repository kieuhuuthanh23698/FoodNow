const mongoose = require("mongoose");

const chinhanhSchema = new mongoose.Schema({
    Ten_Chi_Nhanh : String,
    Hinh_Anh_Chi_Nhanh : String,
    DanhSach_CH :[{type : mongoose.Types.ObjectId}],
    Loai_MonAn : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("CHINHANH", chinhanhSchema);