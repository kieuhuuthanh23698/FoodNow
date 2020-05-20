const mongoose = require("mongoose");

const danhmucloaimonanSchema = new mongoose.Schema({
   Ten_Loai_Mon_An : String,
   Icon_Loai_Mon_An : String,
   DanhSach_CH : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("DANHMUC_LOAIMONAN", danhmucloaimonanSchema);

// const createExampleData = function(){
//    let listDMLOAIMA = [];

//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Đi chợ", Icon_Loai_Mon_An :"shopping-cart.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Chuỗi", Icon_Loai_Mon_An :"house.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Món Hàn", Icon_Loai_Mon_An :"sashimi.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Trà sữa", Icon_Loai_Mon_An :"iced-tea.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Cơm phần", Icon_Loai_Mon_An :"rice_one.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Gà rán", Icon_Loai_Mon_An :"fried-chicken.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Bún/Phở", Icon_Loai_Mon_An :"ramen.png"});
//    listDMLOAIMA.push({  Ten_Loai_Mon_An: "Ăn vặt", Icon_Loai_Mon_An :"sandwich.png"});
//    return listDMLOAIMA;
// }

// module.exports = {createExampleData}