const mongoose = require("mongoose");

const diachiSchema = new mongoose.Schema({
    Dia_Chi_Nha: String,
    Vi_do: String,
    Kinh_do: String,
});

module.exports = mongoose.model("DIACHI", diachiSchema);