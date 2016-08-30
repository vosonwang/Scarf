/**
 * Created by Voson_2 on 2016/8/29.
 */
$(function () {
    var vue = new Vue({
        el: '#receiving',
        data: {
            records: [],
            new_records:[{}]
        },
        ready: function () {
            this.show();
        },

        methods: {
            show: function () {
                var _self = this;
                $.ajax({
                    type: 'post',
                    data: {table: 'v_receiving', order: 'receipt_date'},
                    url: '../controller/show.php',
                    success: function (data) {
                        if (JSON.parse(data)) {
                            _self.records = JSON.parse(data);
                        }
                    }
                });
            },
            insert: function () {
                var _self = this;
                if (_self.new_records.length != 0) {
                    json = JSON.stringify(_self.new_records);
                    $.ajax({
                        type: 'POST',
                        url: '../controller/insert.php',
                        data: {json: json},
                        success: function (msg) {
                            _self.show();
                            $('#new_records').modal('hide');
                            _self.new_records = [];
                        }
                    });
                }
            },


            delete:function () {

            }
        }
    });

    //日期格式转换
    Vue.filter('dateFormat', function (date) {
        date = date.replace(/-/g, "/");
        date = new Date(date);

        var y = date.getFullYear();
        var m = date.getMonth() + 1;
        m = m < 10 ? ('0' + m) : m;
        var d = date.getDate();
        d = d < 10 ? ('0' + d) : d;
        var h = date.getHours();
        var minute = date.getMinutes();
        minute = minute < 10 ? ('0' + minute) : minute;
        return m + '-' + d + ' ' + h + ':' + minute;
    })

});