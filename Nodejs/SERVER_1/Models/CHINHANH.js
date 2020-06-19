const mongoose = require("mongoose");

const chinhanhSchema = new mongoose.Schema({
    Ten_Chi_Nhanh: String,
    Hinh_Anh_Chi_Nhanh: String,
    Tai_Khoan: mongoose.Types.ObjectId,
    DanhSach_CH: [{ type: mongoose.Types.ObjectId }],
});

module.exports = mongoose.model("CHINHANH", chinhanhSchema);

// const createExampleData = function () {
//     let listCHINHANH = [];

//     listCHINHANH.push({ Ten_Chi_Nhanh: "Hủ Tiếu Nam Vang Thành Đạt", Hinh_Anh_Chi_Nhanh: "MiQuangNamSon.png" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Bà Nội - Bánh Mì Thịt Nướng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "GUTA CAFE", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Sườn Que", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Đậu Nành Mix", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Vita - Nước Ép & Sinh Tố", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Hủ Tiếu Nam Vang Tài Anh", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Súp Cua Mộc", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Nũng Nịu - Cơm Gà Xối Mỡ", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Juice Me - Nước Ép Trái Cây", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Que Đà Nẵng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Say Coffee 24h", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Má Hải", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     listCHINHANH.push({ Ten_Chi_Nhanh: "Passio Cooffee", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
//     return listCHINHANH;
// }

// module.exports = { createExampleData }