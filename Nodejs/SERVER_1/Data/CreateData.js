
const mongoose = require('mongoose');
const connectString = 'mongodb://localhost:27017/FoodNow';
mongoose.connect( connectString, { useUnifiedTopology: true, useNewUrlParser: true, useFindAndModify: false },
    function (err) {
        if (err)
            console.log("MongoDb connect error : " + err);
        else {
            console.log("MongoDb connect success !");
        }
    }
);

const KHU_VUC = require("../Models/KHU_VUC");
const CHINHANH = require("../Models/CHINHANH");
const CUAHANG = require("../Models/CUAHANG");
const MON_AN = require("../Models/MON_AN");
const KHACH_HANG = require("../Models/KHACH_HANG");
const DON_HANG = require("../Models/DON_HANG");
const CHI_TIET_DON_HANG = require("../Models/CHI_TIET_DON_HANG");
const CHI_TIET_GIO_HANG = require('../Models/CT_GIO_HANG');
const KHUYENMAI_CUAHANG = require('../Models/KHUYENMAI_CUAHANG');
const KHUYENMAI_HETHONG = require('../Models/KHUYENMAI_HETHONG');
const DANHSACH_CUAHANG_HOMNAY = require('../Models/DANHSACH_CUAHANG_HOMNAY');
const DANHMUC_CUAHANG_TRANGCHU = require('../Models/DANHMUC_CUAHANG_TRANGCHU');
const DANHMUC_LOAIMONAN = require('../Models/DANHMUC_LOAIMONAN');
const DIACHI = require('../Models/DIACHI');
const LOAI_MONAN = require('../Models/LOAI_MONAN');
const MONAN_GOIY = require('../Models/MONAN_GOIY');


function insertData_KHU_VUC(){
    let listKHUVUC = [];
    listKHUVUC = KHU_VUC.createExampleData();
    listKHUVUC.forEach(function insert(currentValue, index, array) {
        var newKhuVuc = new KHU_VUC({
            Ten_khu_vuc: currentValue.Ten_khu_vuc,
            Danhs_sach_cua_hang: []
        });
        newKhuVuc.save(function (err) {
            if (err)
                console.log("\nThêm khu vực mới bị lỗi : " + err);
            else
                console.log("\nThêm khu vực mới thành công !");
        });
    });
}

module.exports = {insertData_KHU_VUC}

insertData_KHU_VUC();