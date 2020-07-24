const mongoose = require("mongoose");

const khachhangSchema = new mongoose.Schema({
    id_user : String,
    Ten_khach_hang: String,
    So_dien_thoai: String,
    Email: String,
    Ngay_sinh: Date,
    Gioi_tinh: String,
    Hinh_anh_khach_hang: String,
    Dia_chi_nha: mongoose.Types.ObjectId,
    Dia_chi_cong_ty: mongoose.Types.ObjectId,
    Dia_chi_khac: [{ type: mongoose.Types.ObjectId }],
    Ten_dang_nhap: String,
    Mat_khau: String,
    Cua_hang_yeu_thich:[{ type: mongoose.Types.ObjectId }],
    Don_hang_id: [{ type: mongoose.Types.ObjectId }],
    Ct_Gio_Hang_id: [{ type: mongoose.Types.ObjectId }]
});

module.exports = mongoose.model("KHACH_HANG", khachhangSchema);

// const createExampleData = function () {
//     let listKH = [];

//     listKH.push({ Ten_khach_hang: "Kiều Hữu Thành", So_dien_thoai: "0908447355", Email: "kieuhuuthanh@gmail.com", Dia_chi_nha: "140 Lê Trọng Tấn, P.Tây Thạnh, Q. Tân Phú", Dia_chi_cong_ty: "Số 6, Phan Đình Giót, P.2, Q.Tân Bình", Tai_khoan: "hatranganh@gmail.com", Mat_khau: "123" });//Cơm//
//     listKH.push({ Ten_khach_hang: "Lê Thị Ngọc Hiền", So_dien_thoai: "0908447355", Email: "lethingochien@gmail.com", Dia_chi_nha: "140 Lê Trọng Tấn, P.Tây Thạnh, Q. Tân Phú", Dia_chi_cong_ty: "Số 6, Phan Đình Giót, P.2, Q.Tân Bình", Tai_khoan: "dominhminh@gmail.com", Mat_khau: "123" });//Cơm//
//     return listKH;
// }

// module.exports = { createExampleData }