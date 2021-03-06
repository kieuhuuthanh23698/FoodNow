const mongoose = require("mongoose");

const khuvucSchema = new mongoose.Schema({
    Ten_khu_vuc : String,
    Danhs_sach_cua_hang : [{type : mongoose.Types.ObjectId}]
});

module.exports = mongoose.model("KHU_VUC", khuvucSchema);

const createExampleData = function(){
        let listKHUVUC = [];
        listKHUVUC.push({ Ten_khu_vuc: "TP.HCM" });
        return listKHUVUC;
    }

module.exports = {createExampleData}