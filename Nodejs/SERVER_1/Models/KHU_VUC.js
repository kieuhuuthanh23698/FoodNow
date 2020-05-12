const mongoose = require("mongoose");

const khuvucSchema = new mongoose.Schema({
    Ten_khu_vuc : String,
    Danhs_sach_cua_hang : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("KHU_VUC", khuvucSchema);