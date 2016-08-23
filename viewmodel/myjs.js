/**
 * Created by voson on 16/8/10.
 */
$(function () {
    var vue = new Vue({
        el: '#finishing',
        data: {
            id: "",               //每条发货记录在数据库中的Id
            row: "",              //用户输入的增加行数
            deliveries: {},       //从数据库中提取的发货记录
            new_deliveries: [],     //新增发货记录的数组
            delete_arr: []        //等待删除的发货记录数组
        },
        ready: function () {
            this.show();
        },
        methods: {

            //获取数据库中的发货记录
            show: function () {
                var _self = this;
                $.ajax({
                    type: 'GET',
                    url: '../controller/show.php',
                    success: function (data) {
                        _self.deliveries = JSON.parse(data);
                    }
                });
            },

            insert: function () {
                var _self = this;

                //new_deliveries是一个数组,其中的元素都是对象
                //这步是过滤用户输入的""
                this.new_deliveries = this.new_deliveries.filter(function (item) {
                    for (var obj in item) {
                        if (item[obj] == '') {
                            delete item[obj];
                        }
                    }
                    return item;
                });

                //这步是过滤空的行
                $.each(_self.new_deliveries, function (index, value) {
                    if (objLength(value) == 0) {
                        _self.new_deliveries.$remove(this);
                    }
                });

                if (_self.new_deliveries.length != 0) {
                    json = JSON.stringify(_self.new_deliveries);
                    $.ajax({
                        type: 'POST',
                        url: '../controller/insert.php',
                        data: {json: json},
                        success: function (msg) {
                            _self.moverow();
                            _self.show();
                        }
                    });
                }


            },

            Verify: function (arr) {
                if (arr.length == 0) {
                    return 0;
                } else {

                }
            },

            delete: function () {
                var _self = this;
                if (_self.id != "") {
                    $.ajax({
                        type: 'POST',
                        url: '../controller/delete.php',
                        data: {id: this.delete_arr},
                        success: function (msg) {
                            _self.show();
                        }
                    })
                }

            },


            //这个方法有两个作用:1.提取被点击行的id,从而被delete方法调用,删除行。2.切换被点击行的css样式
            getId: function (item) {
                this.id = item.id;    //获取被点击行的id

                var selector = "#i" + this.id;
                if ($(selector).hasClass("table_hover")) {      //判断该行,之前是否是已经加上了选中效果
                    $(selector).removeClass("table_hover getId");
                    this.delete_arr.remove(this.id);
                } else {
                    $(selector).addClass("table_hover getId");
                    this.delete_arr.push(this.id);
                }


            },

            showmodal: function () {
                if (this.new_deliveries.length != 0) {
                    this.insert();
                }
                $('#addrow_modal').modal('show');   //打开增加行数的模态框

            },

            //增加行
            addrow: function () {
                if (this.row != "") {        //判断输入的行数是否为空
                    for (var i = 0; i < parseInt(this.row); i++) {
                        this.new_deliveries.$set(i, {});
                    }
                }
                $('#addrow_modal').modal('hide');   //打开增加行数的模态框
            },

            moverow: function () {
                /* console.log(this.new_deliveries.length);*/
                var i = 0;
                while (i < this.new_deliveries.length) {
                    this.new_deliveries.$remove(this.new_deliveries[i]);
                }
            }
        }


    });
    /*Vue EDN*/


    //聚焦input框,没有效果
    $('#rowno').focus();

    //160818.4 给输入行数的input框，添加一个回车即等同按下按钮的事件
    $('#rowno').keydown(function (e) {
        if (e.keyCode == 13) {
            vue.addrow();
        }
    });


});