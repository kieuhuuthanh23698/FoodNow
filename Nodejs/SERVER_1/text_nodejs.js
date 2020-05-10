var express = require("express");
const mongoose = require('mongoose');
var app = new express();
const server = require('http').Server(app);
server.listen(3000);
mongoose.connect('mongodb+srv://admin:tVn8kGPaRDD1Hq4j@cluster0-qozmr.mongodb.net/FoodNow?retryWrites=true&w=majority',
    { useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
    function (err) {
        if (err)
            console.log("MongoDb connect error : " + err);
        else {

            console.log("MongoDb connect success !");
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

            /*Thêm khuyến mãi*/
            // var newKhuyenMai = new KHUYENMAI_CUAHANG({
            //     ThongTin_KMCH: "Test_TTKM",
            //     NgayBD: "07/05/2020",
            //     NgayKT: "07/05/2020",
            //     GioBD: "4",
            //     GioKT: "5",
            //     MaGiamGia: "Test_TTKM",
            //     PhanTram_GiamGia: "20",
            //     MoTa: "Test_TTKM"
            // });
            // newKhuyenMai.save(function (err) {
            //     if (err)
            //         console.log("Thêm khuyến mãi mới bị lỗi : " + err);
            //     else
            //         console.log("Thêm khuyến mãi mới thành công !");
            // });

            // CHI_NHANH.findByIdAndDelete(
            //     {},
            // );

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


            /*Thêm khuyến mãi hệ thống*/
            // var newKhuyenMai_HT = new KHUYENMAI_HETHONG({
            //     GioBD: "4",
            //     GioKT: "5",
            //     Icon: "Test_TTKM_HT",
            //     DanhSach_CH:[], 
            //     MaGiamGia: "Test_TTKM_HT",
            //     PhanTram_GiamGia: "20"
            // });
            // newKhuyenMai_HT.save(function (err) {
            //     if (err)
            //         console.log("Thêm khuyến mãi hệ thống mới bị lỗi : " + err);
            //     else
            //         console.log("Thêm khuyến mãi hệ thống mới thành công !");
            // });

            /*Thêm cửa hàng vào danh sách khuyến mãi hệ thống*/
            // KHUYENMAI_HETHONG.findOneAndUpdate(
            //     { _id: "5eb3cb0ad413e8188cd86724" },
            //     { $push: { DanhSach_CH: "5dc539b1fdf2d32c6006e056" } },
            //     function (err) {
            //         if (err)
            //             console.log("Thêm khuyến mãi hệ thống mới bị lỗi : " + err);
            //         else
            //             console.log("Thêm khuyến mãi hệ thống mới thành công !");
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
            // var newDanhsach_CH_HomNay = new DANHSACH_CUAHANG_HOMNAY({
            //     Thongtin_Chinh: "Đặt món hôm nay",
            //     Thongtin_Phu: "Nhanh tay chọn món ngon",
            //     HinhAnh_CH: "HinhAnh_CH",
            //     DanhSach_CH: []
            // });
            // newDanhsach_CH_HomNay.save(function (err) {
            //     if (err)
            //         console.log("Thêm Danh sách cửa hàng mới bị lỗi : " + err);
            //     else
            //         console.log("Thêm Danh sách cửa hàng mới thành công !");
            // });

            /*Thêm cửa hàng vào danh sách hôm nay ăn gì*/
            // DANHSACH_CUAHANG_HOMNAY.findOneAndUpdate(
            //     { _id: "5eb67d3f3214b6207043360f" },
            //     { $push: { DanhSach_CH: "5dc539b1fdf2d32c6006e056" } },
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
            //     { $push: { DanhSach_CH: "5dc539b1fdf2d32c6006e056" } },
            //     function (err) {
            //         if (err)
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi danh sách cửa hàng hôm nay bị lỗi : " + err);
            //         else
            //             console.log("Loại bỏ 1 cửa hàng ra khỏi danh sách cửa hàng hôm nay thành công !");
            //     }
            // );

        }

    }
);
const KHU_VUC = require("./Models/KHU_VUC");
const CHI_NHANH = require("./Models/CHI_NHANH");
const CUA_HANG = require("./Models/CUA_HANG");
const MON_AN = require("./Models/MON_AN");
const KHACH_HANG = require("./Models/KHACH_HANG");
const DON_HANG = require("./Models/DON_HANG");
const CHI_TIET_DON_HANG = require("./Models/CHI_TIET_DON_HANG");
const CHI_TIET_GIO_HANG = require('./Models/CT_GIO_HANG');
const KHUYENMAI_CUAHANG = require('./Models/KHUYENMAI_CUAHANG');
const KHUYENMAI_HETHONG = require('./Models/KHUYENMAI_HETHONG');
const DANHSACH_CUAHANG_HOMNAY = require('./Models/DANHSACH_CUAHANG_HOMNAY');
//Một CHINHANH có nhiều CUAHANG
//CUAHANG riêng biệt sẽ có 1 CHINHANH riêng biệt
//CUAHANG sẽ lấy MONAN thông qua CHINHANH 

//KHUYENMAI_HETHONG áp vào mỗi CUAHANG vì để giảm hao tốn tài chính