const mongoose = require("mongoose");

const khuvucSchema = new mongoose.Schema({
    Ten_khu_vuc : String,
    Mo_ta_khu_vuc : String,
    Chi_Nhanh_id : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("KHU_VUC", khuvucSchema);