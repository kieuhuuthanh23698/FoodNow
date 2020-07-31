const mongoose = require("mongoose");

const cuahangSchema = new mongoose.Schema({
    Ten_Cua_Hang: String,
    Dia_Chi_Cua_Hang: mongoose.Types.ObjectId,
    Mo_Ta_Cua_Hang: String,
    Thoi_Gian_Bat_Dau: String,
    Thoi_Gian_Ket_Thuc: String,
    Ho_Ten_Nguoi_Dai_Dien: String,
    So_Dien_Thoai: String,
    Email_Nguoi_Dai_Dien: String,
    CMND_Nguoi_Dai_Dien: String,
    // Danh_Gia: String,
    Hinh_Anh_Cua_Hang: String,
    Trang_Thai_Cua_Hang: String,
    Tai_Khoan: mongoose.Types.ObjectId ,
    Khuyen_Mai_CH: [{ type: mongoose.Types.ObjectId }],
    Thong_Tin_KH_Dat_Don: [{ type: mongoose.Types.ObjectId }],
    Loai_MonAn: [{ type: mongoose.Types.ObjectId }]
});

module.exports = mongoose.model("CUAHANG", cuahangSchema);

// const createExampleData = function () {
//     let listCUAHANG = [];

//     listCUAHANG.push({
//         Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu", Dia_Chi_Cua_Hang: "22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000001", Mat_Khau: "FOOD00000001", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Thị Nhỏ", Dia_Chi_Cua_Hang: "29 Nguyễn Thị Nhỏ, P.9, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000002", Mat_Khau: "FOOD00000002", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Âu Cơ", Dia_Chi_Cua_Hang: "609 Âu Cơ, Phú Trung, Tân Phú, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000003", Mat_Khau: "FOOD00000003", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Thượng Hiển", Dia_Chi_Cua_Hang: "316 Nguyễn Thượng Hiển, P.4, Quận 3, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000004", Mat_Khau: "FOOD00000004", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng - Kha Vạn Cận", Dia_Chi_Cua_Hang: "942/1 Kha Vạn Cận, P.Trường Thọ, Thủ Đức, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000005", Mat_Khau: "FOOD00000005", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng - Đường 17", Dia_Chi_Cua_Hang: "25/38 Đường 17, P.Linh Trung, Thủ Đức, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000006", Mat_Khau: "FOOD00000006", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Bánh Mì Hà Nội - Bánh Mì Thịt Nướng - Hòa Hưng", Dia_Chi_Cua_Hang: "246/55A Hòa Hưng, P.13, Quận 10, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000007", Mat_Khau: "FOOD00000007", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Bánh Mì Hà Nội - Bánh Mì Thịt Nướng - Nguyễn Sơn", Dia_Chi_Cua_Hang: "76/10/10 Nguyễn Sơn, P.Phú Thọ Hòa, Tân Phú, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000008", Mat_Khau: "FOOD00000008", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "GUTA CAFE - Nguyễn Phúc Chu", Dia_Chi_Cua_Hang: "53 Nguyễn Phúc Chu, P.15, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000010", Mat_Khau: "FOOD00000010", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "GUTA CAFE - Ấp Bắc", Dia_Chi_Cua_Hang: "40 Ấp Bắc, Phường 13, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000011", Mat_Khau: "FOOD00000011", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "GUTA CAFE - Bàu Cát 2", Dia_Chi_Cua_Hang: "102 Bàu Cát 2, P.12, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000012", Mat_Khau: "FOOD00000012", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Cơm Tâm Sườn Que - Trần Hưng Đạo", Dia_Chi_Cua_Hang: "714 Trần Hưng Đạo, P.2, Quận 5, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000013", Mat_Khau: "FOOD00000013", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     listCUAHANG.push({
//         Ten_Cua_Hang: "Cơm Tâm Sườn Que - Điện Biên Phủ", Dia_Chi_Cua_Hang: "371 Điện Biên Phủ, P25, Bình Thạnh, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
//         Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Ten_Tai_Khoan: "FOOD00000014", Mat_Khau: "FOOD00000014", Trang_Thai_Cua_Hang: "Đang mở cửa"
//     });
//     return listCUAHANG;
// }

// module.exports = { createExampleData }