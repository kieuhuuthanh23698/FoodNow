const mongoose = require("mongoose");

const khuyenmaicuahangSchema = new mongoose.Schema({
    ThongTin_KMCH: String,
    NgayBD: Date,
    NgayKT: Date,
    GioBD: String,
    GioKT: String,
    MaGiamGia: String,
    PhanTram_GiamGia: String,
    MoTa: String
});

module.exports = mongoose.model("KHUYENMAI_CUAHANG", khuyenmaicuahangSchema);


// const createExampleData = function () {
//     let listKMCH = [];

//     listKMCH.push({ ThongTin_KMCH: "Giảm 60%", NgayBD: "05/20/2020", NgayKT: "05/30/2020", GioBD: "8", GioKT: "12", MaGiamGia: "MANTRUA", PhanTram_GiamGia: "60", MoTa: "Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng" });
//     listKMCH.push({ ThongTin_KMCH: "Giảm 40%", NgayBD: "05/20/2020", NgayKT: "05/30/2020", GioBD: "8", GioKT: "12", MaGiamGia: "MANTRUA", PhanTram_GiamGia: "60", MoTa: "Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng" });
//     listKMCH.push({ ThongTin_KMCH: "Giảm 20%", NgayBD: "05/20/2020", NgayKT: "05/30/2020", GioBD: "8", GioKT: "12", MaGiamGia: "MANTRUA", PhanTram_GiamGia: "20", MoTa: "Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng" });
//     return listKMCH;
// }

// module.exports = { createExampleData }

