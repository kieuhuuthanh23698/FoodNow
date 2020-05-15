const mongoose = require("mongoose");

const monangoiySchema = new mongoose.Schema({
    Ten_mon_an_goi_y: String
});

module.exports = mongoose.model("MONAN_GOIY", monangoiySchema);