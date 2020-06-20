const mongoose = require("mongoose");

const khuyenmaihethongSchema = new mongoose.Schema({
    MaGiamGia: String,
    GioBD: String,
    GioKT: String,
    Icon: String,
    PhanTram_GiamGia: String,
    DanhSach_CN: [{ type: mongoose.Types.ObjectId }]
});

module.exports = mongoose.model("KHUYENMAI_HETHONG", khuyenmaihethongSchema);

// const createExampleData = function () {
//     let listKHHT = [];

//     listKHHT.push({ gioBD: "14", gioKT: "18", icon: "bay.png", magg: "MCD30", phanTramGg: "30" });
//     listKHHT.push({ gioBD: "8", gioKT: "12", icon: "bay.png", magg: "COLENVN20", phanTramGg: "50" });
//     listKHHT.push({ gioBD: "12", gioKT: "16", icon: "bay.png", magg: "TIEPSUCVN", phanTramGg: "40" });
//     listKHHT.push({ gioBD: "8", gioKT: "12", icon: "bay.png", magg: "CONOWGIAO", phanTramGg: "40" });
//     listKHHT.push({ gioBD: "12", gioKT: "15", icon: "bay.png", magg: "NOWNEW", phanTramGg: "20" });
//     return listKHHT;
// }

// module.exports = { createExampleData }