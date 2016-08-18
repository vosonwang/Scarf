<?php
require("../controller/session_check.php");
require("../temple/header.html")
?>

<div class="container" id="finishing">
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-striped table-bordered table-hover table-bordersed table-condensed text-center">
                <thead>
                <tr>
                    <th class="text-center border">No</th>
                    <th class="text-center">日期</th>
                    <th class="text-center">花型</th>
                    <th class="text-center">条数</th>
                    <th class="text-center">单价</th>
                    <th class="text-center">金额</th>
                    <th class="text-center">件数</th>
                    <th class="text-center">收货人</th>
                    <th class="text-center">单号</th>
                    <th class="text-center">收货地址</th>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(index,item) in delivery" v-on:click="dataClick(item)" id="i{{item.id}}">
                    <th class="border text-center">{{index+1}}</th>
                    <td>{{item.delivery_date}}</td>
                    <td>{{item.pattern}}</td>
                    <td>{{item.pieces}}</td>
                    <td>{{item.price}}</td>
                    <td>{{item.pieces*item.price}}</td>
                    <td>{{item.packages}}</td>
                    <td>{{item.consignee}}</td>
                    <td>{{item.orders}}</td>
                    <td>{{item.address}}</td>
                </tr>
                <tr v-for="(index,item) in new_delivery">
                    <td class="border"><input class="addRow" disabled="disabled" value="+"></td>
                    <td><input class="addRow" name="delivery_date" v-model="item.delivery_date"
                               pattern="^1[345678][0-9]{9}$"></td>
                    <td><input class="addRow" type="text" name="pattern" v-model="item.pattern"></td>
                    <td><input class="addRow" type="number" name="pieces" v-model="item.pieces"></td>
                    <td><input class="addRow" type="number" name="price" v-model="item.price"></td>
                    <td>
                        <input class="addRow" type="number" name="amount" v-if="item.pieces!=''&&item.price!=''"
                               value="{{item.pieces*item.price}}" disabled="disabled">
                        <input class="addRow" type="number" name="amount" v-else value="" disabled="disabled">
                    </td>
                    <td><input class="addRow" type="number" name="packages" v-model="item.packages"></td>
                    <td><input class="addRow" type="text" name="consignee " v-model="item.consignee"></td>
                    <td><input class="addRow" type="text" name="orders" v-model="item.orders"></td>
                    <td><input class="addRow" type="text" name="address" v-model="item.address"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12">
            <button class="btn btn-default" type="submit" @click="insert">保存</button>
            <button class="btn btn-default" type="submit" @click="delete">删除</button>
            <button class="btn btn-default" type="submit" @click="addrow">增加</button>
        </div>
    </div>


    <!-- Small modal -->

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         id="addrow_modal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="col-xs-offset-11 col-xs-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <br>
                <br>
                <div class="col-xs-offset-1 col-xs-6">
                    <input class="insertRows" type="number" v-model="row" placeholder="请输入行数" id="rowno">
                </div>
                <div class="col-xs-5">
                    <button type="button" class="btn btn-primary" @click="addrow()">确认</button>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>


</div>


<script src="../viewmodel/myjs.js"></script>
