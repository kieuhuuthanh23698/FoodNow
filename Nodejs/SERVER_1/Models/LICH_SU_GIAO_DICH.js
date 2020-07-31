const mongoose = require("mongoose");

const lichsugiaodichSchema = new mongoose.Schema({
    Ma_Giao_Dich : String,
    Ma_Don_Hang : String,
    Id_Don_Hang : mongoose.Types.ObjectId,
    Id_Khach_Hang : mongoose.Types.ObjectId,
    Id_Cua_Hang : mongoose.Types.ObjectId,
    So_Tien : Number,
    So_Dien_Thoai : String,
},{timestamps: true});

module.exports = mongoose.model("LICH_SU_GIAO_DICH", lichsugiaodichSchema);