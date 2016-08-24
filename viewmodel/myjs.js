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
            delete_arr: [],           //等待删除的发货记录数组
            k: []
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
                        if(JSON.parse(data)){
                            _self.deliveries = JSON.parse(data);
                        }
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
                            _self.new_deliveries=[];
                        }
                    });
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
                            _self.delete_arr=[];
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
                    this.id = "";
                } else {
                    $(selector).addClass("table_hover getId");
                    this.delete_arr.push(this.id);
                }


            },

            showmodal: function () {
                $('#addrow_modal').modal('show');   //打开增加行数的模态框
                this.delete_arr=[];
            },

            //增加行
            addrow: function () {

                var _self = this;
                var N = this.new_deliveries;

                if (objLength(N) != 0) {
                    this.insert();
                }
                if (_self.row != "") {        //判断输入的行数是否为空
                    for (var i = 0; i < parseInt(_self.row); i++) {
                        this.new_deliveries.$set(i, {});
                    }
                }

                $('#addrow_modal').modal('hide');//打开增加行数的模态框


                _self.changeSequence();

                _self.id="";
            },

            moverow: function () {
                /* console.log(this.new_deliveries.length);*/
                var i = 0;
                while (i < this.new_deliveries.length) {
                    this.new_deliveries.$remove(this.new_deliveries[i]);
                }
            },

            changeSequence: function () {
                var _self = this;
                var D_ob = this.deliveries;
                var SQ = "";
                var N_arr = this.new_deliveries;
                
                for (var i = 0; i < parseInt(_self.row); i++) {
                    if (_self.id != "") {   //判断是否选中了元素
                        SQ = arrObj(_self.id, "sequence", _self.deliveries);    //获取被选中的行的序号
                        N_arr[i].sequence = String(parseFloat(SQ) + (1/Math.pow(10,getDecimal(SQ)+1)) * (i + 1))

                    } else {
                        if (objLength(D_ob) != 0) {    //判断原先是否存在发货记录
                            var last = D_ob[objLength(D_ob) - 2].sequence;
                            N_arr[i].sequence = String(parseFloat(last) +  i + 1)
                        } else {
                            N_arr[i].sequence = String(i + 1)

                        }

                    }

                }


            }
        }

    });
    /*Vue EDN*/


    //160818.4 给输入行数的input框，添加一个回车即等同按下按钮的事件
    $('#rowno').keydown(function (e) {
        if (e.keyCode == 13) {
            vue.addrow();
        }
    });


    /*$("tbody").on('onmouseover','.change_to_add',function () {
     alert(3)
     })*/


});