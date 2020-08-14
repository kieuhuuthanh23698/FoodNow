var express = require("express");
const mongoose = require('mongoose');
var app = new express();
const server = require('http').Server(app);
server.listen(3000);
// const connectString = 'mongodb://127.0.0.1:27017/?gssapiServiceName=mongodb';
const connectString = 'mongodb+srv://admin:tVn8kGPaRDD1Hq4j@cluster0-qozmr.mongodb.net/FoodNow?retryWrites=true&w=majority';

mongoose.connect(connectString,
    { useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
    function (err) {
        if (err)
            console.log("MongoDb connect error : " + err);
        else {
            console.log("MongoDb connect success !");
            NHOM_LOAI_MON_AN.aggregate(
                [
                    {
                        "$lookup": {
                            "from": "loai_monans",
                            "localField": "list",
                            "foreignField": "_id",
                            "as": "nhom_loai_mon_an"
                        }
                    }
                ],
                function (err, result) {
                    console.log(result);
                    console.log(result[0].nhom_loai_mon_an);
            });


            /*Cap nhat KhuVuc*/
            // KHU_VUC.findOneAndUpdate(
            //     { _id: "5db5b2db509fb91fbc18d260" },
            //     {
            //         $set : {Mo_ta_khu_vuc : "ABC III"}
            //     },
            //     function (err) {
            //         if (err)
            //             console.log("\nCập nhật mô tả khu vực gặp lỗi : " + err);
            //         else
            //             console.log("\nCập nhật mô tả khu vực thành công !");
            //     }
            // );

            /*Thêm khuyến mãi cửa hàng*/
            // let listKMCH = [];

            // listKMCH.push({ ThongTin_KMCH:"Giảm 60%",NgayBD:"05/20/2020", NgayKT:"05/30/2020", GioBD:"8", GioKT:"12", MaGiamGia:"MANTRUA", PhanTram_GiamGia:"60", MoTa:"Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng"});
            // listKMCH.push({ ThongTin_KMCH:"Giảm 40%",NgayBD:"05/20/2020", NgayKT:"05/30/2020", GioBD:"8", GioKT:"12", MaGiamGia:"MANTRUA", PhanTram_GiamGia:"60", MoTa:"Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng"});
            // listKMCH.push({ ThongTin_KMCH:"Giảm 20%",NgayBD:"05/20/2020", NgayKT:"05/30/2020", GioBD:"8", GioKT:"12", MaGiamGia:"MANTRUA", PhanTram_GiamGia:"20", MoTa:"Áp dụng cho khách có đơn hàng đầu tiên tại cửa hàng"});


            // KHUYENMAI_CUAHANG.db.dropCollection();
            // listKMCH.forEach(function insert(currentValue, index, array) {
            //     var newKhuyenMai_CH = new KHUYENMAI_CUAHANG({
            //         ThongTin_KMCH: currentValue.ThongTin_KMCH,
            //         NgayBD: currentValue.NgayBD,
            //         NgayKT: currentValue.NgayKT,
            //         GioBD: currentValue.GioBD,
            //         GioKT: currentValue.GioKT,
            //         MaGiamGia: currentValue.MaGiamGia,
            //         PhanTram_GiamGia: currentValue.PhanTram_GiamGia,
            //         MoTa: currentValue.MoTa
            //     });
            //     newKhuyenMai_CH.save(function (err) {
            //         if (err)
            //             console.log("\nThêm khuyến mãi cửa hàng mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm khuyến mãi cửa hàng mới thành công !");
            //     });
            // });


            // KHUYENMAI_CUAHANG.findByIdAndDelete(
            //     { _id: "5eb3c0b6bbc691395896730d" },
            //     function (err, res) {
            //         if (err) {
            //             console.log("\nXóa bị lỗi : " + err);
            //         } else {
            //             console.log("\nĐã xóa :" + res);                    
            //         }
            //     }
            // );

            /*Thêm khu vực*/
            // let listKHUVUC = [];

            // listKHUVUC.push({ Ten_khu_vuc: "TP.HCM" });

            // KHU_VUC.db.dropCollection();
            // listKHUVUC.forEach(function insert(currentValue, index, array) {
            //     var newKhuVuc = new KHU_VUC({
            //         Ten_khu_vuc: currentValue.Ten_khu_vuc,
            //         Danhs_sach_cua_hang: []
            //     });
            //     newKhuVuc.save(function (err) {
            //         if (err)
            //             console.log("\nThêm khu vực mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm khu vực mới thành công !");
            //     });
            // });

            //Thêm cửa hàng vào khu vực//
            // KHU_VUC.findOneAndUpdate(
            //     { _id: "5ebabaf620a57f04408eb121" },
            //     { $push: { DanhSach_CH: "5eba0ad05f15d311d4d6b682" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng vào khu vực mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng vào khu vực mới thành công !");
            //     }
            // );


            /*Thêm khuyến mãi hệ thống*/
            // let listKHHT = [];

            // listKHHT.push({ gioBD: "14", gioKT: "18", icon: "bay.png", magg : "MCD30", phanTramGg : "30"});
            // listKHHT.push({ gioBD: "8", gioKT: "12", icon: "bay.png", magg : "COLENVN20", phanTramGg : "50"});
            // listKHHT.push({ gioBD: "12", gioKT: "16", icon: "bay.png", magg : "TIEPSUCVN", phanTramGg : "40"});
            // listKHHT.push({ gioBD: "8", gioKT: "12", icon: "bay.png", magg : "CONOWGIAO", phanTramGg : "40"});
            // listKHHT.push({ gioBD: "12", gioKT: "15", icon: "bay.png", magg : "NOWNEW", phanTramGg : "20"});
            // listKHHT.push({ gioBD: "12", gioKT: "15", icon: "bay.png", magg : "BUATOI", phanTramGg : "20"});

            // KHUYENMAI_HETHONG.db.dropCollection();
            // listKHHT.forEach(function insert(currentValue, index, array) {
            //     var newKhuyenMai_HT = new KHUYENMAI_HETHONG({
            //         GioBD: currentValue.gioBD,
            //         GioKT: currentValue.gioKT,
            //         Icon: currentValue.icon,
            //         DanhSach_CH:[], 
            //         MaGiamGia: currentValue.magg,
            //         PhanTram_GiamGia: currentValue.phanTramGg
            //     });
            //     newKhuyenMai_HT.save(function (err) {
            //         if (err)
            //             console.log("\nThêm khuyến mãi hệ thống mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm khuyến mãi hệ thống mới thành công !");
            //     });
            // });

            /*Thêm cửa hàng vào danh sách khuyến mãi hệ thống*/
            // KHUYENMAI_HETHONG.findOneAndUpdate(
            //     { _id: "5eb81a357321d731646501eb" },
            //     { $push: { DanhSach_CH: "5eba0ad05f15d311d4d6b682" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng vào khuyến mãi hệ thống mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng vào khuyến mãi hệ thống mới thành công !");
            //     }
            // );



            /*Loại bỏ 1 cửa hàng ra khỏi danh sách khuyến mãi hệ thống*/
            // KHUYENMAI_HETHONG.findOneAndUpdate(
            //     { _id: "5eb3cb0ad413e8188cd86724" },
            //     { $pull: { DanhSach_CH: "5dc539b1fdf2d32c6006e056" } },
            //     function (err) {
            //         if (err)
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi khuyến mãi hệ thống mới bị lỗi : " + err);
            //         else
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi khuyến mãi hệ thống mới thành công !");
            //     }
            // );



            /*Thêm danh sách cửa hàng hôm nay ăn gì*/
            // let listDSCHHN = [];

            // listDSCHHN.push({ Thongtin_Chinh:"Nhanh tay đặt món", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Lần đầu đặt món", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Nhậu cùng bạn bè", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Khai tiệc cùng đồng nghiệp", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Ăn món gì đón mưa đầu mùa", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Menu cho người hay phân vân", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Ăn ở nhà bị vỡ kế hoạch giảm cân", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});
            // listDSCHHN.push({ Thongtin_Chinh:"Sếp khoa thỏa nỗi nhớ", Thongtin_Phu:"Giảm 45K cho đơn hàng đầu tiên", HinhAnh_CH:"TraSua.pngTraSua.png"});

            // DANHSACH_CUAHANG_HOMNAY.db.dropCollection();
            // listDSCHHN.forEach(function insert(currentValue, index, array) {
            //     var newDSCHHN = new DANHSACH_CUAHANG_HOMNAY({
            //         Thongtin_Chinh: currentValue.Thongtin_Chinh,
            //         Thongtin_Phu: currentValue.Thongtin_Phu,
            //         HinhAnh_CH: currentValue.HinhAnh_CH,
            //         DanhSach_CH: []
            //     });
            //     newDSCHHN.save(function (err) {
            //         if (err)
            //             console.log("\nThêm danh sách cửa hàng hôm nay mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm danh sách cửa hàng hôm nay mới thành công !");
            //     });
            // });

            /*Thêm cửa hàng vào danh sách hôm nay ăn gì*/
            // DANHSACH_CUAHANG_HOMNAY.findOneAndUpdate(
            //     { _id: "5ee08ed1f5b7a828b89e08fe" },
            //     { $push: { DanhSach_CH: "5eba0ad05f15d311d4d6b68a" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng trong danh sách hôm nay mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng trong danh sách hôm nay mới thành công !");
            //     }
            // );

            /*Loại bỏ 1 cửa hàng ra khỏi danh sách hôm nay ăn gì*/
            // DANHSACH_CUAHANG_HOMNAY.findOneAndUpdate(
            //     { _id: "5eb3cb0ad413e8188cd86724" },
            //     { $pull: { DanhSach_CH: "5dc539b1fdf2d32c6006e056" } },
            //     function (err) {
            //         if (err)
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi danh sách cửa hàng hôm nay bị lỗi : " + err);
            //         else
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi danh sách cửa hàng hôm nay thành công !");
            //     }
            // );


            /*Thêm danh mục cửa hàng trang chủ*/
            // let listDMCHTC = [];

            // listDMCHTC.push({ Chu_De_Chinh: "FoodNow đi chợ"});
            // listDMCHTC.push({ Chu_De_Chinh: "Ăn vặt ở nhà"});
            // listDMCHTC.push({ Chu_De_Chinh: "Giải khát ở nhà"});
            // listDMCHTC.push({ Chu_De_Chinh: "Ăn mì, bún, phở ở nhà"});
            // // DANHMUC_CUAHANG_TRANGCHU.db.dropCollection();
            // listDMCHTC.forEach(function insert(currentValue, index, array) {
                // var newDanhMuc_CHTC = new DANHMUC_CUAHANG_TRANGCHU({
                //     Chu_De_Chinh: currentValue.Chu_De_Chinh,
                //     DanhSach_CH:[] 
                // });
            //     newDanhMuc_CHTC .save(function (err) {
            //         if (err)
            //             console.log("\nThêm danh mục cửa hàng trang chủ mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm danh mục cửa hàng trang chủ mới thành công !");
            //     });
            // });

            /*Thêm cửa hàng trong danh mục cửa hàng trang chủ*/
            // DANHMUC_CUAHANG_TRANGCHU.findOneAndUpdate(
            //     { _id: "5edf78189f6ffd1524eb3557" },
            //     { $push: { DanhSach_CH: "5eba0ad05f15d311d4d6b682" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng trong danh mục cửa hàng trang chủ mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng trong danh mục cửa hàng trang chủ mới thành công !");
            //     }
            // );


            /*Thêm danh mục loại món ăn*/
            //  let listDMLOAIMA = [];

            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Đi chợ", Icon_Loai_Mon_An :"shopping-cart.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Chuỗi", Icon_Loai_Mon_An :"house.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Món Hàn", Icon_Loai_Mon_An :"sashimi.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Trà sữa", Icon_Loai_Mon_An :"iced-tea.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Cơm phần", Icon_Loai_Mon_An :"rice_one.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Gà rán", Icon_Loai_Mon_An :"fried-chicken.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Bún/Phở", Icon_Loai_Mon_An :"ramen.png"});
            //  listDMLOAIMA.push({  Ten_Loai_Mon_An: "Ăn vặt", Icon_Loai_Mon_An :"sandwich.png"});
            //DANHMUC_LOAIMONAN.db.dropCollection();
            //  listDMLOAIMA.forEach(function insert(currentValue, index, array) {
            //      var newDanhMuc_LoaiMA = new  DANHMUC_LOAIMONAN({
            //          Ten_Loai_Mon_An: currentValue.Ten_Loai_Mon_An,
            //          Icon_Loai_Mon_An: currentValue.Icon_Loai_Mon_An,
            //          DanhSach_CH:[] 
            //      });
            //      newDanhMuc_LoaiMA .save(function (err) {
            //          if (err)
            //              console.log("\nThêm danh mục loại món ăn mới bị lỗi : " + err);
            //          else
            //              console.log("\nThêm danh mục loại món ăn mới thành công !");
            //      });
            //  });


            /*Thêm cửa hàng trong danh mục loại món ăn*/
            // DANHMUC_LOAIMONAN.findOneAndUpdate(
            //     { _id: "5eba0fb0d1dd3f376cee4b5d" },//Loại Bún Phở//
            //     { $push: { DanhSach_CH: "5eba0ad05f15d311d4d6b683" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng trong danh mục loại món ăn mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng trong danh mục loại món ăn mới thành công !");
            //     }
            // );


            /*Thêm địa chỉ */
            // let listDIACHI = [];

            // listDIACHI.push({ Dia_Chi_Nha: "850 Cách Mạng Tháng 8, P.5, Tân Bình, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "18/27 Trần Quang Diệu, Quận 3, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "140 Trần Khắc Chân, P9, Q.Phú Nhuận, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "50 Hoa Cúc, P.7, Q.Phú Nhuận, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "23 Nguyễn Huy Tự, P. Da Kao, Quận 1, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "36 Nguyễn Thị Nghĩa, P.Da Kao, Quận 1, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "288 Lê Văn Thị, P11, Q.Gò Vấp, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "45 Gò Dầu, P.Tân Sơn Nhì, Tân Phú, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "315 Hai Bà Trưng, Quận 3, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // listDIACHI.push({ Dia_Chi_Nha: "116 Tôn Đảo, Quận 4, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
            // DIACHI.db.dropCollection();
            // listDIACHI.forEach(function insert(currentValue, index, array) {
            //     var newDiachi = new DIACHI({
            //         Dia_Chi_Nha: currentValue.Dia_Chi_Nha,
            //         Vi_do: currentValue.Vi_do,
            //         Kinh_do: currentValue.Kinh_do
            //     });
            //     newDiachi.save(function (err) {
            //         if (err)
            //             console.log("\nThêm địa chỉ mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm địa chỉ mới thành công !");
            //     });
            // });


            /*Thêm chi nhánh */
            let listCHINHANH = [];

            // listCHINHANH.push({ Ten_Chi_Nhanh: "Hủ Tiếu Nam Vang Thành Đạt", Hinh_Anh_Chi_Nhanh: "MiQuangNamSon.png" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Bà Nội - Bánh Mì Thịt Nướng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "GUTA CAFE", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Sườn Que", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Đậu Nành Mix", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Vita - Nước Ép & Sinh Tố", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Hủ Tiếu Nam Vang Tài Anh", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Súp Cua Mộc", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Nũng Nịu - Cơm Gà Xối Mỡ", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Juice Me - Nước Ép Trái Cây", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Que Đà Nẵng", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Say Coffee 24h", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Bánh Mì Má Hải", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Cây Me", Hinh_Anh_Chi_Nhanh: "TraSua_ChowTea.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Văn Phòng Libbi", Hinh_Anh_Chi_Nhanh: "Com_1(1).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Món Xào", Hinh_Anh_Chi_Nhanh: "Com_1(2).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Sườn Nướng", Hinh_Anh_Chi_Nhanh: "Com_1(3).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Gà", Hinh_Anh_Chi_Nhanh: "Com_1(4).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Thanh", Hinh_Anh_Chi_Nhanh: "Com_1(5).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Đêm Mũi Tàu", Hinh_Anh_Chi_Nhanh: "Com_1(6).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Tiến Nhật", Hinh_Anh_Chi_Nhanh: "Com_1(7).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Trưa Văn Phòng", Hinh_Anh_Chi_Nhanh: "Com_1(8).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Cơm Tấm Tiết Kiệm", Hinh_Anh_Chi_Nhanh: "Com_1(9).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Thế Giới Cơm Tấm", Hinh_Anh_Chi_Nhanh: "Com_1(10).jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Mì An Phở Bún Thịt Nướng", Hinh_Anh_Chi_Nhanh: "BunPho_1.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Quán Cơm A Trường", Hinh_Anh_Chi_Nhanh: "BunPho_2.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Tuyết Nhiệt Đới Milk Tea", Hinh_Anh_Chi_Nhanh: "TraSua_1.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Lục Cafe", Hinh_Anh_Chi_Nhanh: "TraSua_2.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Kai Coffee", Hinh_Anh_Chi_Nhanh: "TraSua_3.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Hooga Cafe", Hinh_Anh_Chi_Nhanh: "TraSua_4.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Phúc Long Coffee", Hinh_Anh_Chi_Nhanh: "TraSua_5.jpg" });
            // listCHINHANH.push({ Ten_Chi_Nhanh: "Gờ Cafe", Hinh_Anh_Chi_Nhanh: "TraSua_6.jpg" });

            // CHINHANH.db.dropCollection();
            // listCHINHANH.forEach(function insert(currentValue, index, array) {
            //     var newChiNhanh = new CHINHANH({
            //         Ten_Chi_Nhanh: currentValue.Ten_Chi_Nhanh,
            //         Hinh_Anh_Chi_Nhanh: currentValue.Hinh_Anh_Chi_Nhanh,
            //         Tai_Khoan: mongoose.Types.ObjectId(),
            //         DanhSach_CH: [],
            //         Loai_MonAn: []
            //     });
            //     newChiNhanh.save(function (err) {
            //         if (err)
            //             console.log("\nThêm chi nhánh mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm chi nhánh mới thành công !");
            //     });
            // });

            //Thêm cửa hàng vào chi nhánh//
            // CHINHANH.findOneAndUpdate(
            //     { _id: "5edd167d8ffa1d2e28e64c46" },
            //     { $push: { DanhSach_CH: "5edeee4854f9e63750153917" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm cửa hàng vào chi nhánh mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm cửa hàng vào chi nhánh mới thành công !");
            //     }
            // );

            //Thêm loại món ăn vào chi nhánh//
            // CHINHANH.findOneAndUpdate(
            //     { _id: "5edd167d8ffa1d2e28e64c30" },
            //     { $push: { Loai_MonAn: "5edf01e2955e171fec5e700f" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm loại món ăn vào chi nhánh mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm loại món ăn vào chi nhánh mới thành công !");
            //     }
            // );

            /*Thêm cửa hàng */
            let listCUAHANG = [];

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Hữu Cầu", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            //Dia_Chi_Cua_Hang: "22B Nguyễn Hữu Cầu, P.Tân Định, Quận 1, TP.HCM"
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Thị Nhỏ", Dia_Chi_Cua_Hang: "29 Nguyễn Thị Nhỏ, P.9, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Âu Cơ", Dia_Chi_Cua_Hang: "609 Âu Cơ, Phú Trung, Tân Phú, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Thành Đạt - Hủ Tiếu Nam Vang - Nguyễn Thượng Hiển", Dia_Chi_Cua_Hang: "316 Nguyễn Thượng Hiển, P.4, Quận 3, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng - Kha Vạn Cận", Dia_Chi_Cua_Hang: "942/1 Kha Vạn Cận, P.Trường Thọ, Thủ Đức, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Đại Đồng Delivery - Cơm Tấm & Bún Thịt Nướng - Đường 17", Dia_Chi_Cua_Hang: "25/38 Đường 17, P.Linh Trung, Thủ Đức, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Bánh Mì Hà Nội - Bánh Mì Thịt Nướng - Hòa Hưng", Dia_Chi_Cua_Hang: "246/55A Hòa Hưng, P.13, Quận 10, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Bánh Mì Hà Nội - Bánh Mì Thịt Nướng - Nguyễn Sơn", Dia_Chi_Cua_Hang: "76/10/10 Nguyễn Sơn, P.Phú Thọ Hòa, Tân Phú, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "GUTA CAFE - Nguyễn Phúc Chu", Dia_Chi_Cua_Hang: "53 Nguyễn Phúc Chu, P.15, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "GUTA CAFE - Ấp Bắc", Dia_Chi_Cua_Hang: "40 Ấp Bắc, Phường 13, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "GUTA CAFE - Bàu Cát 2", Dia_Chi_Cua_Hang: "102 Bàu Cát 2, P.12, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tâm Sườn Que - Trần Hưng Đạo", Dia_Chi_Cua_Hang: "714 Trần Hưng Đạo, P.2, Quận 5, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tâm Sườn Que - Điện Biên Phủ", Dia_Chi_Cua_Hang: "371 Điện Biên Phủ, P25, Bình Thạnh, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Đậu Nành Mix - Lê Văn Sỹ", Dia_Chi_Cua_Hang: "262 Lê Văn Sỹ, P1, Tân Bình, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Đậu Nành Mix - Cách Mạng Tháng 8", Dia_Chi_Cua_Hang: "517 Cách Mạng Tháng Tám, P.13, Q.10, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Nũng Nịu -Cơm Gà Xối Mỡ - Cây Trâm", Dia_Chi_Cua_Hang: "430 Cây Trâm, Gò Vấp, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Nũng Nịu -Cơm Gà Xối Mỡ - Lê Đức Thọ", Dia_Chi_Cua_Hang: "175 Lê Đức Thọ, P.17, Gò Vấp, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Nũng Nịu -Cơm Gà Xối Mỡ - Lê Đức Thọ", Dia_Chi_Cua_Hang: "175 Lê Đức Thọ, P.17, Gò Vấp, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg",  Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Đậu Nành Mix - Nguyễn Thái Học", Dia_Chi_Cua_Hang: "193 Nguyễn Thái Học, P.Phạm Ngũ Lão, Q.1, TP.HCM", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunBoHue.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            //  listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Văn Phòng Libbi Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(1).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            //   listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Món Xào Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(2).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Sườn Nướng Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(3).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Gà Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(4).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tấm Thanh Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(5).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tấm Đêm Mũi Tàu Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(7).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tấm Tiến Nhật Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(8).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Trưa Văn Phòng Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(9).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Cơm Tấm Tiết Kiệm Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(6).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Thế Giới Cơm Tấm Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "Com_1(10).jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Mì An Phở Bún Thịt Nướng Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunPho_1.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Quán Cơm A Trường Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "BunPho_2.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
            
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Tuyết Nhiệt Đới Milk Tea Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_1.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });
                       
            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Lục Cafe Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_2.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Kai Coffee Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_3.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Hooga Cafe Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_5.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Phúc Long Coffee Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_4.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // listCUAHANG.push({
            //     Ten_Cua_Hang: "Gờ Cafe Số 1", Mo_Ta_Cua_Hang: "", Thoi_Gian_Bat_Dau: "8", Thoi_Gian_Ket_Thuc: "19",
            //     Danh_Gia: "4", Hinh_Anh_Cua_Hang: "TraSua_6.jpg", Trang_Thai_Cua_Hang: "Đang mở cửa"
            // });

            // CUAHANG.db.dropCollection();
            // listCUAHANG.forEach(function insert(currentValue, index, array) {
            //     var newCH = new CUAHANG({
            //         Ten_Cua_Hang: currentValue.Ten_Cua_Hang,
            //         Dia_Chi_Cua_Hang: mongoose.Types.ObjectId() ,
            //         Mo_Ta_Cua_Hang: currentValue.Mo_Ta_Cua_Hang,
            //         Thoi_Gian_Bat_Dau: currentValue.Thoi_Gian_Bat_Dau,
            //         Thoi_Gian_Ket_Thuc: currentValue.Thoi_Gian_Ket_Thuc,
            //         Danh_Gia: currentValue.Danh_Gia,
            //         Hinh_Anh_Cua_Hang: currentValue.Hinh_Anh_Cua_Hang,
            //         Tai_Khoan: mongoose.Types.ObjectId(),
            //         Trang_Thai_Cua_Hang: currentValue.Trang_Thai_Cua_Hang,
            //         Khuyen_Mai_CH: [],
            //         Thong_Tin_KH_Dat_Don: [],
            //     });
            //     newCH.save(function (err) {
            //         if (err)
            //             console.log("\nThêm cửa hàng mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm cửa hàng mới thành công !");
            //     });
            // });

            //Thêm khuyến mãi cửa hàng vào cửa hàng//
            // CUAHANG.findOneAndUpdate(
            //     { _id: "5eba0ad05f15d311d4d6b67f" },
            //     { $push: { Khuyen_Mai_CH: "5ebac4a041540b1a08b7d978" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm khuyến mãi cửa hàng vào cửa hàng mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm khuyến mãi cửa hàng vào cửa hàng mới thành công !");
            //     }
            // );

            /*Thêm loại món ăn  */
            let listLOAIMA = [];

            // listLOAIMA.push({ Ten_loai_mon_an: "Món đặc trưng"});//Trà Sữa//
            // listLOAIMA.push({ Ten_loai_mon_an: "Sinh tố"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Sữa chua"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Nước ép"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Trà nóng"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Cafe"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Điểm tâm sáng"});//Cơm//
            // listLOAIMA.push({ Ten_loai_mon_an: "Cơm trưa"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Món đặc trưng"});

            // listLOAIMA.push({ Ten_loai_mon_an: "Món chính"});
            // listLOAIMA.push({ Ten_loai_mon_an: "Thức uống"});

            // listLOAIMA.push({ Ten_loai_mon_an: "Thực đơn"});
            // LOAI_MONAN.db.dropCollection();
            // listLOAIMA.forEach(function insert(currentValue, index, array) {
            //     var newLoaiMA = new LOAI_MONAN({
            //         Ten_loai_mon_an: currentValue.Ten_loai_mon_an,
            //         Danh_sach_mon_an: []
            //     });
            //     newLoaiMA.save(function (err) {
            //         if (err)
            //             console.log("\nThêm loại món ăn mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm loại món ăn mới thành công !");
            //     });
            // });


            //Thêm món ăn vào loại món ăn//
            // LOAI_MONAN.findOneAndUpdate(
            //     { _id: "5edf01e2955e171fec5e700f" },
            //     { $push: { Danh_sach_mon_an: "5edeffbd8538581b30172470" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm món ăn vào loại món ăn mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm món ăn vào loại món ăn mới thành công !");
            //     }
            // );

            /*Thêm món ăn  */
            // let listMA = [];

            // listMA.push({ Ten_mon_an: "Cánh Gà Chiên Nước Mắm", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Cơm//
            // listMA.push({ Ten_mon_an: "Cơm Chiên Hải Sản", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Tấm Sườn Bì Chả", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Đùi Gà Roti", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Gà Xối Mỡ", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà sữa đào", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Trà Sữa//
            // listMA.push({ Ten_mon_an: "Sữa Tươi Trân Châu Đường Đen", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Nước Ép Dứa Cà Rốt", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            //listMA.push({ Ten_mon_an: "Sinh Tố Cà Chua", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });

            // listMA.push({ Ten_mon_an: "Sinh Tố Dứa", Mo_ta_mon_an: "", Don_gia_mon_an: "22000", Hinh_anh_mon_an: "sinhtodua.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "34", So_luong_thich: "12" });
            // listMA.push({ Ten_mon_an: "Sinh Tố Cà Bơ", Mo_ta_mon_an: "", Don_gia_mon_an: "25000", Hinh_anh_mon_an: "tinhtobo.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            
            // listMA.push({ Ten_mon_an: "Nước Ép Táo", Mo_ta_mon_an: "", Don_gia_mon_an: "34000", Hinh_anh_mon_an: "nuoceptao.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "22", So_luong_thich: "10" });
            // listMA.push({ Ten_mon_an: "Nước Ép Bí Đao", Mo_ta_mon_an: "", Don_gia_mon_an: "26000", Hinh_anh_mon_an: "nuocepbidao.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "45", So_luong_thich: "24" });
            
            // listMA.push({ Ten_mon_an: "Trà Sữa Hoa Đậu Biết", Mo_ta_mon_an: "", Don_gia_mon_an: "47000", Hinh_anh_mon_an: "trasuahoadaubiet.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "79", So_luong_thich: "38" });
            // listMA.push({ Ten_mon_an: "Trà Sữa Phúc Bồn Tử", Mo_ta_mon_an: "", Don_gia_mon_an: "44000", Hinh_anh_mon_an: "trasuaphucbontu.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "40", So_luong_thich: "38" });
            
            // listMA.push({ Ten_mon_an: "Trà Chanh Mật Ong", Mo_ta_mon_an: "", Don_gia_mon_an: "49000", Hinh_anh_mon_an: "trachanhmatong.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "35", So_luong_thich: "29" });
            // listMA.push({ Ten_mon_an: "Trà Gừng", Mo_ta_mon_an: "", Don_gia_mon_an: "45000", Hinh_anh_mon_an: "tragung.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "120", So_luong_thich: "100" });
            // listMA.push({ Ten_mon_an: "Trà Xanh", Mo_ta_mon_an: "", Don_gia_mon_an: "39000", Hinh_anh_mon_an: "traxanh.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "84", So_luong_thich: "45" });
            // listMA.push({ Ten_mon_an: "Cánh Gà Chiên Nước Mắm", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Cơm//
            // listMA.push({ Ten_mon_an: "Cơm Chiên Hải Sản", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Tấm Sườn Bì Chả", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Đùi Gà Roti", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm Gà Xối Mỡ", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà sữa đào", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });//Trà Sữa//
            // listMA.push({ Ten_mon_an: "Sữa Tươi Trân Châu Đường Đen", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Nước Ép Dứa Cà Rốt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Sinh Tố Cà Chua", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "CanhGaChienNuocMam.jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            //Trà sữa//
            // listMA.push({ Ten_mon_an: "Hồng trà việt quất", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Dâu tằm kem phô mai", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà xanh kiwi chanh leo", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà dứa nhiệt đới", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà xanh xoài", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà sữa bánh pudding", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà nhật đậu đỏ", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hồng trà", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Trà sữa ô long", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });

            // listMA.push({ Ten_mon_an: "Cơm sườn non kho", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm ếch xào xả ớt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm mắm ruốc xào thịt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm măng xào thịt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm canh chua cá hú", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm thịt kho đậu hũ", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm gà kho xả ớt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm thịt kho trứng cút", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm sườn non kho trứng", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm thu nhật sốt cà", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm sườn ram", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm xíu mại", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm canh khổ qua dồn thịt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm gà kho gừng", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm gà luộc muối tiêu chanh", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm cá hú kho", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm đậu hũ dồn thịt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm thịt kho tiêu", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm ốc xào xả ớt", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm cá trê chiên mắm gừng", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm chả cá kho tiêu", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm cá lóc kho tiêu", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm sườn nướng", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm cá mó chiên", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cơm mướp xào lòng gà", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            //Phở bún - Bò kho//
            // listMA.push({ Ten_mon_an: "Bánh mì bò kho", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hủ tiếu bò kho", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hoành thánh tô lớn", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Bánh canh xương heo", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hủ tiếu giò heo", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hủ tiếu bò viên", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Mì giò heo", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Mì xương", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hủ tiếu gà", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Hủ tiếu tôm", Mo_ta_mon_an: "", Don_gia_mon_an: "25.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });

            //Thức uống thêm//
            // listMA.push({ Ten_mon_an: "Cà phê sữa đá", Mo_ta_mon_an: "", Don_gia_mon_an: "12.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Nước sâm", Mo_ta_mon_an: "", Don_gia_mon_an: "10.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Nước rong biển", Mo_ta_mon_an: "", Don_gia_mon_an: "10.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });
            // listMA.push({ Ten_mon_an: "Cà phê đen", Mo_ta_mon_an: "", Don_gia_mon_an: "10.000", Hinh_anh_mon_an: "Com_1(1).jpg", Trang_thai_mon_an: "Đang hoạt động", So_luong_mua: "125", So_luong_thich: "99" });


            // // MON_AN.db.dropCollection();

            // listMA.forEach(function insert(currentValue, index, array) {
            //     var newMA = new MON_AN({
            //         Ten_mon_an: currentValue.Ten_mon_an,
            //         Mo_ta_mon_an: currentValue.Mo_ta_mon_an,
            //         Don_gia_mon_an: currentValue.Don_gia_mon_an,
            //         Hinh_anh_mon_an: currentValue.Hinh_anh_mon_an,
            //         Trang_thai_mon_an: currentValue.Trang_thai_mon_an,
            //         So_luong_mua: currentValue.So_luong_mua,
            //         So_luong_thich: currentValue.So_luong_thich
            //     });
            //     newMA.save(function (err) {
            //         if (err)
            //             console.log("\nThêm món ăn mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm món ăn mới thành công !");
            //     });
            // });


            /*Thêm khách hàng */
            // let listKH = [];

            // listKH.push({Ten_khach_hang:"Kiều Hữu Thành", So_dien_thoai:"0908447355", Email:"kieuhuuthanh@gmail.com", Ngay_sinh:"06/24/1998", Gioi_tinh:"Nam", Hinh_anh_khach_hang:"unnamed.png", Dia_chi_nha:"140 Lê Trọng Tấn, P.Tây Thạnh, Q. Tân Phú", Dia_chi_cong_ty:"Số 6, Phan Đình Giót, P.2, Q.Tân Bình", Tai_khoan:"hatranganh@gmail.com", Mat_khau:"123"});//Cơm//
            // listKH.push({Ten_khach_hang:"Lê Thị Ngọc Hiền", So_dien_thoai:"0908447355", Email:"lethingochien@gmail.com",Ngay_sinh:"05/22/1998", Gioi_tinh:"Nữ",  Hinh_anh_khach_hang:"unnamed.png", Dia_chi_nha:"140 Lê Trọng Tấn, P.Tây Thạnh, Q. Tân Phú", Dia_chi_cong_ty:"Số 6, Phan Đình Giót, P.2, Q.Tân Bình", Tai_khoan:"dominhminh@gmail.com", Mat_khau:"123"});//Cơm//
            // KHACH_HANG.db.dropCollection();

            // listKH.forEach(function insert(currentValue, index, array) {
            //     var newKH = new KHACH_HANG({
            //         Ten_khach_hang: currentValue.Ten_khach_hang,
            //         So_dien_thoai: currentValue.So_dien_thoai,
            //         Email: currentValue.Email,
            //         Ngay_sinh: currentValue.Ngay_sinh,
            //         Gioi_tinh: currentValue.Gioi_tinh,
            //         Hinh_anh_khach_hang: currentValue.Hinh_anh_khach_hang,
            //         Dia_chi_khac: [],
            //         Tai_khoan: currentValue.Tai_khoan,
            //         Mat_khau: currentValue.Mat_khau,
            //         Don_hang_id: [],
            //         Cua_hang_yeu_thich: [],
            //         Ct_Gio_Hang_id: []
            //     });
            //     newKH.save(function (err) {
            //         if (err)
            //             console.log("\nThêm khách hàng mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm khách hàng mới thành công !");
            //     });
            // });

            /*Thêm món ăn gợi ý*/
            // let listMAGY = [];

            // listMAGY.push({Ten_mon_an_goi_y:"Cơm gà"});
            // listMAGY.push({Ten_mon_an_goi_y:"Bún đậu"});
            // listMAGY.push({Ten_mon_an_goi_y:"Hủ tíu"});
            // listMAGY.push({Ten_mon_an_goi_y:"Bún bò"});
            // listMAGY.push({Ten_mon_an_goi_y:"Cơm tấm"});
            // listMAGY.push({Ten_mon_an_goi_y:"Pizza"});
            // listMAGY.push({Ten_mon_an_goi_y:"Cháo"});
            // listMAGY.push({Ten_mon_an_goi_y:"Mì cay"});
            // listMAGY.push({Ten_mon_an_goi_y:"Sinh tố"});
            // listMAGY.push({Ten_mon_an_goi_y:"Gỏi cuốn"});
            // listMAGY.push({Ten_mon_an_goi_y:"Chè"});
            // listMAGY.push({Ten_mon_an_goi_y:"Trà sữa"});
            // MONAN_GOIY.db.dropCollection();

            // listMAGY.forEach(function insert(currentValue, index, array) {
            //     var newMAGY = new MONAN_GOIY({
            //        Ten_mon_an_goi_y: currentValue.Ten_mon_an_goi_y,
            //     });
            //     newMAGY.save(function (err) {
            //         if (err)
            //             console.log("\nThêm món ăn gợi ý mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm món ăn gợi ý mới thành công !");
            //     });
            // });

            //Tìm món ăn gợi ý//
            // MONAN_GOIY.find(function (err, items) {
            //     if (err)
            //         console.log("Lấy tên món ăn gợi ý gặp lỗi : " + err);
            //     else
            //         console.log(items);
            // });


            // app.get("/chinhanh", function (req, res) {
            // CHINHANH.find(function (err, items) {
            //     if (err)
            //         console.log("Lấy danh sách chi nhánh gặp lỗi : " + err);
            //     else
            //         console.log(items);
            // });

            // CUAHANG.find(function (err, items) {
            //     if (err)
            //         console.log("Lấy danh sách chi nhánh gặp lỗi : " + err);
            //     else
            //         console.log(items);
            // });

            //Hiển thị danh sách các cửa hàng nằm trong danh mục loại món ăn khi truyền id danh mục loại món ăn//
            // DANHMUC_LOAIMONAN.findById({ '_id': "5eba0fb0d1dd3f376cee4b63" }, function (err, res) {
            //     if (err) {
            //         console.log("Lấy danh sách cửa hàng trong danh mục loại món ăn : " + err);
            //     }
            //     else {
            //         CUAHANG.find({ '_id': { $in: res.DanhSach_CH } },
            //             function (err, items) {
            //                 if (err)
            //                     console.log("Lấy danh sách chi nhánh gặp lỗi : " + err);
            //                 else
            //                 console.log(items);
            //             }
            //         );
            //     }
            // });


            //Hiển thị danh sách các cửa hàng nằm trong khuyến mãi hệ thống//
            // KHUYENMAI_HETHONG.findById({ '_id': "5eb81a357321d731646501eb" }, function (err, res) {
            //     if (err) {
            //         console.log("Lấy danh sách cửa hàng trong khuyến mãi hệ thống : " + err);
            //     }
            //     else {
            //         CUAHANG.find({ '_id': { $in: res.DanhSach_CH } },
            //             function (err, items) {
            //                 if (err)
            //                     console.log("Lấy danh sách cửa hàng gặp lỗi : " + err);
            //                 else
            //                 console.log(items);
            //             }
            //         );
            //     }
            // });


            //Hiển thị danh sách các cửa hàng nằm trong danh sách cửa hàng hôm nay//
            // DANHSACH_CUAHANG_HOMNAY.findById({ '_id': "5ebabdafe4481445a896a794" }, function (err, res) {
            //     if (err) {
            //         console.log("Lấy danh sách cửa hàng trong danh sách cửa hàng hôm nay : " + err);
            //     }
            //     else {
            //         CUAHANG.find({ '_id': { $in: res.DanhSach_CH } },
            //             function (err, items) {
            //                 if (err)
            //                     console.log("Lấy danh sách cửa hàng gặp lỗi : " + err);
            //                 else
            //                 console.log(items);
            //             }
            //         );
            //     }
            // });

            // DANHMUC_LOAIMONAN.aggregate([
            //     { $lookup:
            //        {
            //          from: 'cuahangs',  
            //          localField: '_id',
            //          foreignField: '_id',
            //          as: 'detail'
            //        }
            //      }
            //     ]).toArray(function(err, res) {
            //     if (err) 
            //         throw err;
            //     console.log(JSON.stringify(res));
            // });


            //Cập nhật thông tin cá nhân 
            // KHACH_HANG.findOneAndUpdate(
            //     { _id: "5ebce3b56d098b0da418591e" },
            //     {
            //         $set : {Ten_khach_hang : "Ngọc Hiền" , So_dien_thoai: "09098889998", Email: "lengochien@gmail.com"}
            //     },
            //     function (err) {
            //         if (err)
            //             console.log("\nCập nhật thông tin cá nhân lỗi : " + err);
            //         else
            //             console.log("\nCập nhật  thông tin cá nhân thành công !");
            //     }
            // );

            //Hiển thị danh sách khuyến mãi hệ thống//
            // KHUYENMAI_HETHONG.find(
            //     function (err, items) {
            //         if (err)
            //             console.log("Lấy danh sách cửa hàng khuyến mãi hệ thống");
            //         else
            //             console.log(items);
            //     }
            // );

            // CUAHANG.aggregate(
            //     [{
            //         $lookup: {
            //             from: 'khuyenmai_cuahangs',
            //             localField: 'Khuyen_Mai_CH',
            //             foreignField: '_id',
            //             as: 'thongTinKM'
            //         }
            //     }],function(err,result){
            //         if(err)
            //         console.log(err);
            //         else
            //         console.log(result)
            //     });


            //Hiển thị danh sách cửa hàng khi tìm kiếm món ăn//

            // let response = {};
            // CHINHANH.aggregate(
            // [
            //     { $match: { _id: mongoose.Types.ObjectId("5eba197716ec7530ecb08d2c")}},
            //     {
            //         $lookup: {
            //             from: 'cuahangs',
            //             localField: 'DanhSach_CH',
            //             foreignField: '_id',
            //             as: 'ThongTinCuaHang'
            //         }
            //     }
            // ]
            // , function (err, result) {
            //     if (err)
            //         console.log(err);
            //     else
            //         console.log(result);
            // });
            // CHINHANH.find(
            // {  'DanhSach_CH': { $in:  [mongoose.Types.ObjectId("5eba197716ec7530ecb08d2c"), mongoose.Types.ObjectId("5eba197716ec7530ecb08d29")]} },
            //     function (err, danhSachChiNhanh) {
            //         if (err)
            //             console.log(err);
            //         else{
            //             LOAI_MONAN.aggregate(
            // 				[
            // 					{ $match: { _id: {$in :  ["5eba211b54974f0b54da7afb", "5eba211b54974f0b54da7b01"]}}},
            // 					{
            // 						$lookup: {
            // 							from: 'mon_ans',
            // 							localField: 'Danh_sach_mon_an',
            // 							foreignField: '_id',
            // 							as: 'monans'
            // 						}
            // 					},
            // 					{$project : {'DanhSach_CH': 1, 'monans' : 1}}
            // 				], function(err, monans){
            // 					if(err)
            // 						console.log(err);
            // 					else
            // 						{
            // 							// response.lstMonAn = monans;
            // 							console.log(monans);
            // 						}
            // 				}
            // 			);
            //         }
            // });


            //Hiển thị các cửa hàng thuộc danh sách cửa hàng hôm nay//
            // DANHSACH_CUAHANG_HOMNAY.find(
            //     function (err, items) {
            //         if (err)
            //             console.log("Lấy danh sách chi nhánh gặp lỗi : " + err);
            //         else
            //             console.log(items);
            //     }
            // );


            // //Kiểm tra đơn hàng của KH và cửa hàng có đơn nháp chưa? Nếu chưa -> thêm giỏ hàng mới//
            // DON_HANG.find({idKH : "", idCH : "", trangThai : "0"}, 
            //     function(err, item){

            //     }
            // );

            // DANHMUC_CUAHANG_TRANGCHU.aggregate([{
            //     $lookup : {
            //         from: 'cuahangs',
            //         localField: 'DanhSach_CH',
            //         foreignField: '_id',
            //         as: 'lstCH'
            //     }
            // }], function(err, data){
            //     if(err)
            //         console.log(err);
            //    else
            //        console.log(data);
            // });

            //hàm aggre gate có 2 parameter : 1 là điều kiện , 2 là callback xử lý kết quả
            //cũng tương tự hàm find, findById...
            // CUAHANG.aggregate(
            //     [{
            //         $lookup : {
            //             from: "khuyenmai_cuahangs",
            //             localField: "Khuyen_Mai_CH",
            //             foreignField:"_id",
            //             as: "lstKhuyenMai"
            //         }
            //     }], 
            //     function(err, ketQua){
            //         if(err)
            //         console.log(err);
            //         else
            //         console.log(ketQua);
            //     });



            //Hiển thị danh sách khuyến mãi của 1 cửa hàng//
            // CUAHANG.findById({ '_id': "5eba0ad05f15d311d4d6b67f" }, function (err, res) {
            //     if (err) {
            //         console.log("Lấy danh sách khuyến mãi cửa hàng : " + err);
            //     }
            //     else {
            //         KHUYENMAI_CUAHANG.find({ '_id': { $in: res.Khuyen_Mai_CH } },
            //             function (err, items) {
            //                 if (err)
            //                     console.log("Lấy danh sách khuyến mãi  gặp lỗi : " + err);
            //                 else
            //                     console.log(items);
            //             }
            //         );
            //     }
            // });

            //Hiển thị tìm kiếm gần giống khi tìm món ăn//
            // MON_AN.find( {"Ten_mon_an": /Cơm/}, function(err, res){
            //     if(err)
            //     console.log("Lấy tên món ăn bị lỗi : " + err);
            //     else
            //     console.log(res);
            // }).pretty();


            //Hiển thị danh sách các đơn hàng của một khách hàng//
            // KHACH_HANG.findById({ '_id': "5ebce3b56d098b0da418591d" }, function (err, res) {
            //     if (err) {
            //         console.log("Lấy thông tin khách hàng lỗi : " + err);
            //     }
            //     else {
            //         DON_HANG.find({ '_id': { $in: res.Thong_tin_khach_hang_dat_don} },
            //             function (err, items) {
            //                 if (err)
            //                     console.log("Lấy danh sách đơn hàng bị lỗi : " + err);
            //                 else
            //                     console.log(items);
            //             }
            //         );
            //     }
            // });


             //Login
            // CUAHANG.find()


            //Thêm cửa hàng vào cửa hàng yêu thích trong khách hàng
            // KHACH_HANG.find(
            //     {
            //         'Cua_hang_yeu_thich': { $in: [mongoose.Types.ObjectId("5eba0ad05f15d311d4d6b67f")] },
            //         '_id': mongoose.Types.ObjectId("5ebce3b56d098b0da418591d")
            //     },
            //     // {$match: {_id: mongoose.Types.ObjectId("5eba0ad05f15d311d4d6b682")}},

            //     function (err, result) {
            //         if (err)
            //             console.log("Thêm cửa hàng vào cửa hàng yêu thích mới bị lỗi : " + err);
            //         else
            //             if (result != null) {
            //                 KHACH_HANG.findOneAndUpdate(
            //                     { '_id': mongoose.Types.ObjectId("5ebce3b56d098b0da418591d") },
            //                     { $pull: { 'Cua_hang_yeu_thich': mongoose.Types.ObjectId("5eba0ad05f15d311d4d6b67f") } },
            //                     function (err,result) {
            //                         if (err)
            //                             console.log("Bỏ cửa hàng vào cửa hàng yêu thích mới bị lỗi : " + err);
            //                         else
            //                             console.log("Bỏ cửa hàng vào cửa hàng yêu thích mới thành công !" + result);
            //                     }

            //                 );
            //             }
            //             else {
            //                 KHACH_HANG.findOneAndUpdate(
            //                     { '_id': mongoose.Types.ObjectId("5ebce3b56d098b0da418591d") },
            //                     { $push: { 'Cua_hang_yeu_thich': mongoose.Types.ObjectId("5eba2fe316e456336430257f") } },
            //                     function (err, result) {
            //                         if (err)
            //                             console.log("Thêm cửa hàng vào cửa hàng yêu thích mới bị lỗi : " + err);
            //                         else
            //                             console.log("Thêm cửa hàng vào cửa hàng yêu thích mới thành công !" + result);
            //                     }

            //                 );
            //             }

            //     }
            // );


             /*Thêm quản lý người dùng*/
            // let listQLND = [];

            // listQLND.push({Ten_dang_nhap:"FOODCH000001", Mat_khau:"FOODCH000001", Trang_thai:"1"});//Cuahang//
            // listQLND.push({Ten_dang_nhap:"FOODCN000001", Mat_khau:"FOODCN000001", Trang_thai:"1"});//Chi nhanh//
            // listQLND.push({Ten_dang_nhap:"FOODAM000001", Mat_khau:"FOODAM000001", Trang_thai:"1"});//Admin//
            // listQLND.push({Ten_dang_nhap:"FOODSM000001", Mat_khau:"FOODSM000001", Trang_thai:"1"});//SuperAdmin//


            // QUANLY_NGUOIDUNG.db.dropCollection();
            // listQLND.forEach(function insert(currentValue, index, array) {
            //     var newQuanLy_NguoiDung = new QUANLY_NGUOIDUNG({
            //        Ten_dang_nhap: currentValue.Ten_dang_nhap,
            //        Mat_khau: currentValue.Mat_khau,
            //        Trang_thai: currentValue.Trang_thai
            //     });
            //     newQuanLy_NguoiDung.save(function (err) {
            //         if (err)
            //             console.log("\nThêm quản lý người dùng mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm quản lý người dùng mới thành công !");
            //     });
            // });

            //Thêm quản lý người dùng vào Cửa hàng//
            // CUAHANG.findOneAndUpdate(
            //     { _id: "5ed5dc8a925f5d5444e7e651" },
            //     { $set: { Tai_Khoan: "FOODCH000001" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm quản lý người dùng vào cửa hàng mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm quản lý người dùng vào cửa hàng mới thành công !");
            //     }
            // );

            //Thêm quản lý người dùng vào chi nhánh//
            // CHINHANH.findOneAndUpdate(
            //     { _id: "5eba197716ec7530ecb08d29" },
            //     { $set: { Tai_Khoan: "FOODCN000001" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm quản lý người dùng vào chi nhánh mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm quản lý người dùng vào chi nhánh mới thành công !");
            //     }
            // );


            /*Thêm quản lý nhóm người dùng*/
            // let listQLNND = [];

            // listQLNND.push({Ten_nhom:"Cửa hàng"});//Cuahang//
            // listQLNND.push({Ten_nhom:"Chi nhánh"});//Chinhanh//
            // listQLNND.push({Ten_nhom:"Admin"});//Admin//
            // listQLNND.push({Ten_nhom:"Supper Admin"});//SupperAdmin//

            // QL_NHOM_NGUOIDUNG.db.dropCollection();
            // listQLNND.forEach(function insert(currentValue, index, array) {
            //     var newQL_Nhom_NguoiDung = new QL_NHOM_NGUOIDUNG({
            //        Ten_nhom: currentValue.Ten_nhom,
            //        DanhSach_NguoiDung :[]
            //     });
            //     newQL_Nhom_NguoiDung.save(function (err) {
            //         if (err)
            //             console.log("\nThêm quản lý nhóm người dùng mới bị lỗi : " + err);
            //         else
            //             console.log("\nThêm quản lý nhóm người dùng mới thành công !");
            //     });
            // });

            // *Thêm quản lý người dùng vào danh sách người dùng*/
            // QL_NHOM_NGUOIDUNG.findOneAndUpdate(
            //     { _id: "5ed5eec8cfcd901dcccc799f"},
            //     { $push: { DanhSach_NguoiDung: mongoose.Types.ObjectId("5ed5f0f5715159572cf6b628") } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm người dùng vào danh sách người dùng mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm người dùng vào danh sách người dùng mới thành công !");
            //     }
            // );

            //Thêm khuyến mãi vào cửa hàng //
            // CUAHANG.findOneAndUpdate(
            //     { _id: "5ed5dc8a925f5d5444e7e651" },
            //     { $push: { Khuyen_Mai_CH: "5ed202b28154a02058331ba0" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm khuyến mãi cửa hàng vào cửa hàng mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm khuyến mãi cửa hàng vào cửa hàng mới thành công !");
            //     }
            // );
        }

    }
);
const KHU_VUC = require("./Models/KHU_VUC");
const CHINHANH = require("./Models/CHINHANH");
const CUAHANG = require("./Models/CUAHANG");
const MON_AN = require("./Models/MON_AN");
const KHACH_HANG = require("./Models/KHACH_HANG");
const DON_HANG = require("./Models/DON_HANG");
const CHI_TIET_DON_HANG = require("./Models/CHI_TIET_DON_HANG");
const CHI_TIET_GIO_HANG = require('./Models/CT_GIO_HANG');
const KHUYENMAI_CUAHANG = require('./Models/KHUYENMAI_CUAHANG');
const KHUYENMAI_HETHONG = require('./Models/KHUYENMAI_HETHONG');
const DANHSACH_CUAHANG_HOMNAY = require('./Models/DANHSACH_CUAHANG_HOMNAY');
const DANHMUC_CUAHANG_TRANGCHU = require('./Models/DANHMUC_CUAHANG_TRANGCHU');
const DANHMUC_LOAIMONAN = require('./Models/DANHMUC_LOAIMONAN');
const DIACHI = require('./Models/DIACHI');
const LOAI_MONAN = require('./Models/LOAI_MONAN');
const MONAN_GOIY = require('./Models/MONAN_GOIY');
const QUANLY_NGUOIDUNG = require('./Models/QUANLY_NGUOIDUNG');
const QL_NHOM_NGUOIDUNG = require('./Models/QL_NHOM_NGUOIDUNG');
const NHOM_LOAI_MON_AN = require('./Models/NHOM_LOAI_MON_AN');


//Một CHINHANH có nhiều CUAHANG
//CUAHANG riêng biệt sẽ có 1 CHINHANH riêng biệt
//CUAHANG sẽ lấy MONAN thông qua CHINHANH 

//KHUYENMAI_HETHONG áp vào mỗi CUAHANG vì để giảm hao tốn tài chính