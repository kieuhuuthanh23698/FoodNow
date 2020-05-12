const mongoose = require("mongoose");

const loaimonanSchema = new mongoose.Schema({
    Ten_loai_mon_an : String,
    Danh_sach_mon_an: [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("LOAI_MONAN", loaimonanSchema);