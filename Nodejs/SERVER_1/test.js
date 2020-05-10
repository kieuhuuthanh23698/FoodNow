let list = [];

list.push({id : "1", col1 : "val1", col2 : "val2"});
list.push({id : "2", col1 : "val1", col2 : "val2"});
list.push({id : "3", col1 : "val1", col2 : "val2"});
list.push({id : "4", col1 : "val1", col2 : "val2"});
list.push({id : "5", col1 : "val1", col2 : "val2"});
KHU_VUC.db.dropCollection();
list.forEach(function insert(currentValue, index, array) {
    console.log(currentValue.id + "-" + currentValue.col1 + "-" + currentValue.col2);
});