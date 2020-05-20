const mongoose = require("mongoose");

const danhmuccuahangtrangchuSchema = new mongoose.Schema({
   Chu_De_Chinh: String,
   DanhSach_CH: [{ type: mongoose.Types.ObjectId }]
});

module.exports = mongoose.model("DANHMUC_CUAHANG_TRANGCHU", danhmuccuahangtrangchuSchema);

// const createExampleData = function () {
//    let listDMCHTC = [];

//    listDMCHTC.push({ Chu_De_Chinh: "FoodNow đi chợ"});
//    listDMCHTC.push({ Chu_De_Chinh: "Ăn vặt ở nhà"});
//    listDMCHTC.push({ Chu_De_Chinh: "Giải khát ở nhà"});
//    listDMCHTC.push({ Chu_De_Chinh: "Ăn mì, bún, phở ở nhà"});
//    return listDMCHTC;
// }

// module.exports = { createExampleData }