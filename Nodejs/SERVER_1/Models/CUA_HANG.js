const mongoose = require("mongoose");

const cuahangSchema = new mongoose.Schema({
    Ten_cua_hang : String,
    Dia_chi_cua_hang_chinh : String,
    So_dien_thoai_cua_hang : String,
    Mo_ta_cua_hang : String,
    Chi_Nhanh_id : [{type : mongoose.Types.ObjectId}],
    Thuc_Don_id : [{type : mongoose.Types.ObjectId}],
});

module.exports = mongoose.model("CUA_HANG", cuahangSchema);