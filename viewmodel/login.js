/**
 * Created by voson on 16/8/14.
 * 用于登录验证
 */
$(function () {
    var login = new Vue({
        el: '#login',
        data: {
            userinfo: {}
        },
        methods: {
            login: function () {
                var _self = this;
                var un = _self.userinfo.username;
                var pw = _self.userinfo.password;

                //过滤为空的值
                if (un == undefined || pw == undefined || un == "" || pw == "") {
                    alert("请输入用户名或密码!");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: '../controller/auth.php',
                        data: _self.userinfo,
                        success: function (data) {
                            /*console.log(data);*/
                            var arr=JSON.parse(data);
                            if(arr[0]==0){
                                alert("用户名或密码错误!");
                            }else{
                             eval(arr[1]);
                            }
                        }
                    })
                }
            }
        }
    });


});