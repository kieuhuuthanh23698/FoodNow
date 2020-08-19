const mongoose = require("mongoose");

const monanSchema = new mongoose.Schema({
    Ten_mon_an: String,
    Mo_ta_mon_an: String,
    Don_gia_mon_an: Number,
    Hinh_anh_mon_an: String,
    Trang_thai_mon_an: String,
    Nhom: String,
    Size: String
    // So_luong_mua: Number,
    // So_luong_thich: Number
});

module.exports = mongoose.model("MON_AN", monanSchema);

// const createExampleData = function () {
//     let listMA = [];

//     listMA.push({ Ten_mon_an: "Cánh Gà Chiên Nước Mắm", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Cơm//
//     listMA.push({ Ten_mon_an: "Cơm Chiên Hải Sản", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Cơm Tấm Sườn Bì Chả", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Cơm Đùi Gà Roti", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Cơm Gà Xối Mỡ", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Trà sữa đào", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Trà Sữa//
//     listMA.push({ Ten_mon_an: "Sữa Tươi Trân Châu Đường Đen", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Nước Ép Dứa Cà Rốt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
//     listMA.push({ Ten_mon_an: "Sinh Tố Cà Chua", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });

//     return listMA;
// }

// module.exports = { createExampleData }