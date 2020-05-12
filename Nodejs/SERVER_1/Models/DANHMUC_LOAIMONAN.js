const mongoose = require("mongoose");

const danhmucloaimonanSchema = new mongoose.Schema({
   Ten_Loai_Mon_An : String,
   Icon_Loai_Mon_An : String,
   DanhSach_CH : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("DANHMUC_LOAIMONAN", danhmucloaimonanSchema);