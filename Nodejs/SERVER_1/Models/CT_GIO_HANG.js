const mongoose = require("mongoose");

const ctgiohangSchema = new mongoose.Schema({
    Id_Mon_An : mongoose.Types.ObjectId,
    So_Luong : Number,
    
});

module.exports = mongoose.model("CT_GIO_HANG", ctgiohangSchema);