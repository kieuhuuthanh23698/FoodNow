const mongoose = require("mongoose");

const diachiSchema = new mongoose.Schema({
    Dia_Chi_Nha: String,
    Vi_do: String,
    Kinh_do: String,
});

module.exports = mongoose.model("DIACHI", diachiSchema);

// const createExampleData = function(){
//     let listDIACHI = [];

//     listDIACHI.push({ Dia_Chi_Nha: "850 Cách Mạng Tháng 8, P.5, Tân Bình, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "18/27 Trần Quang Diệu, Quận 3, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "140 Trần Khắc Chân, P9, Q.Phú Nhuận, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "50 Hoa Cúc, P.7, Q.Phú Nhuận, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "23 Nguyễn Huy Tự, P. Da Kao, Quận 1, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "36 Nguyễn Thị Nghĩa, P.Da Kao, Quận 1, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "288 Lê Văn Thị, P11, Q.Gò Vấp, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "45 Gò Dầu, P.Tân Sơn Nhì, Tân Phú, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "315 Hai Bà Trưng, Quận 3, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     listDIACHI.push({ Dia_Chi_Nha: "116 Tôn Đảo, Quận 4, TP.HCM", Vi_do: "10,8053", Kinh_do: "106,6238" });
//     return listDIACHI;
// }

// module.exports = {createExampleData}