<?php
/**
 * Created by PhpStorm.
 * User: Voson_2
 * Date: 2016/8/29
 * Time: 21:45
 */


require("../temple/header.html")
?>
<title>后道厂收货记录</title>
<body style="font-family: 微软雅黑,Arial">
<div class="container" id="receiving">
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        <div class="col-xs-12" >
            <div style="height: 40px;background-color: rgb(245,245,245);">
                <h4 style="margin-bottom: 0;font-weight: bold;width: 100px;display:inline">收货记录</h4>

            <div class="pull-right" style="display: inline">
                <button class="btn btn-default" type="submit" @click="insert">保存</button>
                <button class="btn btn-default right" type="submit" @click="delete">删除</button>
                <button class="btn btn-default right" type="submit" @click="showmodal">增加</button>
            </div>
            </div>
        </div>
        <div class="col-xs-12">
            <table
                class="table table-striped table-bordered table-hover table-bordersed table-condensed text-center unselectable">
                <thead>
                <tr>
                    <th class="text-center border">No</th>
                    <th class="text-center">收货日期</th>
                    <th class="text-center">单号</th>
                    <th class="text-center">花型</th>
                    <th class="text-center">条数</th>
                    <th class="text-center">匹数</th>
                    <th class="text-center">发货人</th>
                </tr>
                </thead>
                <tbody>
                <template v-for="(index,item) in records | orderBy 'receipt_date' ">
                    <tr @click="getId(item,$event)" id="i{{item.id}}">
                        <th class="border text-center change_to_add"
                        ">{{index+1}}</th>
                        <td>{{item.receipt_date | dateFormat}}</td>
                        <td>{{item.order_no}}</td>
                        <td>{{item.pattern}}</td>
                        <td>{{item.pieces}}</td>
                        <td>{{item.trips}}</td>
                        <td>{{item.user_name}}</td>
                    </tr>
                </template>

                </tbody>
            </table>
        </div>

    </div>


</div>


<script src="../viewmodel/receiving.js"></script>

</body>