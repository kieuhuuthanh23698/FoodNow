const mongoose = require("mongoose");

const danhsachcuahanghomnaySchema = new mongoose.Schema({
    Thongtin_Chinh : String,
    Thongtin_Phu : String,
    HinhAnh_CH : String,
    DanhSach_CH : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("DANHSACH_CUAHANG_HOMNAY", danhsachcuahanghomnaySchema);

// const createExampleData = function(){
//     let listDSCHHN = [];

//             listDSCHHN.push({ Thongtin_Chinh:"Nhanh tay đặt món", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Lần đầu đặt món", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Nhậu cùng bạn bè", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Khai tiệc cùng đồng nghiệp", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Ăn món gì đón mưa đầu mùa", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Menu cho người hay phân vân", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Ăn ở nhà bị vỡ kế hoạch giảm cân", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//             listDSCHHN.push({ Thongtin_Chinh:"Sếp khoa thỏa nỗi nhớ", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
//     return listKHUVUC;
// }

// module.exports = {createExampleData}