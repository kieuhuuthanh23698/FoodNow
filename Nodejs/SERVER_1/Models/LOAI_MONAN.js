const mongoose = require("mongoose");

const loaimonanSchema = new mongoose.Schema({
    Ten_loai_mon_an : String,
    Danh_sach_mon_an: [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("LOAI_MONAN", loaimonanSchema);

// const createExampleData = function(){
//     let listLOAIMA = [];

//     listLOAIMA.push({ Ten_loai_mon_an: "Món đặc trưng"});//Trà Sữa//
//     listLOAIMA.push({ Ten_loai_mon_an: "Sinh tố"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Sữa chua"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Nước ép"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Trà nóng"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Cafe"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Điểm tâm sáng"});//Cơm//
//     listLOAIMA.push({ Ten_loai_mon_an: "Cơm trưa"});
//     listLOAIMA.push({ Ten_loai_mon_an: "Món đặc trưng"});
//     return listLOAIMAC;
// }

// module.exports = {createExampleData}