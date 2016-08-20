/**
 * Created by voson on 16/8/10.
 */
$(function () {
    var vue = new Vue({
        el: '#finishing',
        data: {
            delivery: {},
            new_delivery: [],
            id: "",
            delete_arr:[],
            row: "",
            json: ''
        },
        ready: function () {
            this.show();
        },
        methods: {

            //获取数据库中的发货记录
            show:function () {
                var _self=this;
                $.ajax({
                    type: 'GET',
                    url: '../controller/show.php',
                    success: function (data) {
                        _self.delivery = JSON.parse(data);
                    }
                });
            },

            insert: function () {
                var _self = this;      //将this这个VM传给全局变量

                var status = 1;     //命名一个状态，用以标示条件是否为真，1为真，0为假

                if(this.new_delivery.length!=0){
                    /*
                     1.遍历对象数组,如果花型、条数、单价这三个必填项为空,则退出循环
                     2.删除对象中值为""的元素
                     */
                    $.each(_self.new_delivery, function (i, j) {   //i是索引,j是数组值  这里会是个对象
                        var x = i;
                        if ((j.price == "" || j.price == null) || (j.pieces == "" || j.pieces == null) || (j.pattern == "" || j.pattern == null)) {
                            status = 0;
                            return false;
                        } else {
                            $.each(j, function (key, value) {

                                if (value == "") {
                                    delete _self.new_delivery[x][key];
                                }
                            });
                        }
                    });

                    if (status == 0) {
                        alert("请填写花型、条数、单价!");
                    } else {
                        _self.json = JSON.stringify(_self.new_delivery);
                        $.ajax({
                            type: 'POST',
                            url: '../controller/insert.php',
                            data: {json: _self.json},
                            success: function (msg) {
                                _self.show();
                                _self.moverow();
                            }
                        });
                    }
                } else {
                    alert("请先增加记录！")
                }


            },

            delete: function () {
                var _self = this;
                if (_self.id == "") {
                    alert("请先选择要删除的行!")
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '../controller/delete.php',
                        data: {id:this.delete_arr},
                        success: function (msg) {
                            _self.show();
                        }
                    })
                }

            },


            //这个方法有两个作用:1.提取被点击行的id,从而被delete方法调用,删除行。2.切换被点击行的css样式
            getId: function (item) {
                this.id = item.id;    //获取被点击行的id

                var selector="#i" + this.id;
                if ($(selector).hasClass("table_hover")) {      //判断该行,之前是否是已经加上了选中效果
                    $(selector).removeClass("table_hover getId");
                    this.delete_arr.remove(this.id);
                } else {
                    $(selector).addClass("table_hover getId");
                    this.delete_arr.push(this.id);
                }


            },

            //增加行
            addrow: function () {

                $('#addrow_modal').modal('toggle');

                //聚焦input框,没有效果
                $('#rowno').focus();

                //160818.4 给输入行数的input框，添加一个回车即等同按下按钮的事件
                $('#rowno').keydown(function(e){
                    if(e.keyCode==13){
                        vue.addrow();
                    }
                });
                if (this.row != "") {
                    for (var i = 0; i < parseInt(this.row); i++) {
                        this.new_delivery.$set(i, {});
                    }
                }
            },

           moverow:function () {
               /* console.log(this.new_delivery.length);*/
               var i=0;
                while (i<this.new_delivery.length){
                    this.new_delivery.$remove(this.new_delivery[i]);
                }
           }
        }


    });


    //为数组创建一个方法,根据值返回数组下标
    Array.prototype.indexOf = function(val) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == val) return i;
        }
        return -1;
    };

    //为数组创建一个方法,根据返回值删除数组元素
    Array.prototype.remove = function(val) {
        var index = this.indexOf(val);
        if (index > -1) {
            this.splice(index, 1);
        }
    };

});