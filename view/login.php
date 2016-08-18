<?php
require ("../controller/session_check.php");
require("../temple/header.html")
?>


<div class="container">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-2">
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
            &nbsp;<br>
        </div>
        <div class="col-md-offset-4 col-md-4" id="login">
            <form class="form-horizontal" @submit.prevent>
                <div class="form-group">
                    <label class="col-sm-3 control-label">用户名</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control text-left" v-model="userinfo.username" >
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">密码</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control text-left" v-model="userinfo.password" autocomplete="off">
                    </div>
                </div>
                <!--<div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" class="left"> 记住这台电脑
                            </label>
                        </div>
                    </div>
                </div>-->
                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-3">
                        <button  class="btn btn-default" @click="login">登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="../viewmodel/login.js"></script>
