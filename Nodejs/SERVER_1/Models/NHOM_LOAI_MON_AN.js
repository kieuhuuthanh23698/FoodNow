const mongoose = require("mongoose");

const nhom_loai_mon_anSchema = new mongoose.Schema({
    Ten_Nhom: String,
    list:[{ type: mongoose.Types.ObjectId }]
});

module.exports = mongoose.model("NHOM_LOAI_MON_AN", nhom_loai_mon_anSchema);