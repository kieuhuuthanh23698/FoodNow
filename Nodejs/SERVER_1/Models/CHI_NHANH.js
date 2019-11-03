const mongoose = require("mongoose");

const chinhanhSchema = new mongoose.Schema({
    Ten_chi_nhanh : String,
    Dia_chi_chi_nhanh : String,
    So_dien_thoai_chi_nhanh : String,
    Mo_ta_chi_nhanh : String,
    Thuc_Don_Tai_Chi_Nhanh_id : [{type : mongoose.Types.ObjectId}],
});

module.exports = mongoose.model("CHI_NHANH", chinhanhSchema);