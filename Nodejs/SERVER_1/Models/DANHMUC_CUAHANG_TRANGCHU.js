const mongoose = require("mongoose");

const danhmuccuahangtrangchuSchema = new mongoose.Schema({
   Chu_De_Chinh : String,
   DanhSach_CH : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("DANHMUC_CUAHANG_TRANGCHU", danhmuccuahangtrangchuSchema);