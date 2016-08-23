/**
 * Created by voson on 2016/8/23.
 */


//为数组创建一个函数,根据值返回数组下标
Array.prototype.indexOf = function (val) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == val) return i;
    }
    return -1;
};

//为数组创建一个函数,根据返回值删除数组元素
Array.prototype.remove = function (val) {
    var index = this.indexOf(val);
    if (index > -1) {
        this.splice(index, 1);
    }
};

//计算对象的长度
function objLength(obj){
    var count = 0;
    for (var i in obj) {
        count++;
    }
    return count;
}