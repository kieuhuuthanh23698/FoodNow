const mongoose = require("mongoose");

const monangoiySchema = new mongoose.Schema({
    Ten_mon_an_goi_y: String
});

module.exports = mongoose.model("MONAN_GOIY", monangoiySchema);

// const createExampleData = function () {
//     let listMAGY = [];

//     listMAGY.push({ Ten_mon_an_goi_y: "Cơm gà" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Bún đậu" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Hủ tíu" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Bún bò" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Cơm tấm" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Pizza" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Cháo" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Mì cay" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Sinh tố" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Gỏi cuốn" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Chè" });
//     listMAGY.push({ Ten_mon_an_goi_y: "Trà sữa" });
//     return listMAGY;
// }

// module.exports = { createExampleData }