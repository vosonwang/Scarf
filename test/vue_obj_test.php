<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/15
 * Time: 14:21
 */
//遍历vue对象
require("../temple/header.html");

?>

<div id="test">
    <input v-model="obj.a" type="number">
    <input v-model="obj.b" type="number">
    <input v-model="obj.c" type="number">
    <button @click="test()"></button>
</div>
<script>
    new Vue({
        el:'#test',
        data:{
            obj:{}
        },
        methods:{
            test:function () {
                console.log(this.obj);
                /*var _self=this;*/
                $.each(this.obj,function (key,value) {   //不需要申明全局变量,this可以读取到
                    console.log(key);
                    console.log(value);
                })
            }
        }
    })
</script>

<!--
结果:
a
2
b
3
c
4-->
