<?php

require "../../global.php";
require "vendor/medoo.php";
require "database/config.php";
session_start();
error_reporting(0);

$database->action(function($database) {
    $order_no_id=$database->insert("orders", [
        "order_no" =>json_decode($_POST[json])[0]->order_no,
    ]);

    $pattern_id=$database->insert("pattern", [
        "pattern" =>json_decode($_POST[json])[0]->pattern,

    ]);

    $order_pattern_id=$database->insert("order_pattern", [
        "orders_id"=>$order_no_id,
        "pattern_id" =>$pattern_id,
    ]);

    $receiving_id=$database->insert("receiving", [
        "receipt_date" =>json_decode($_POST[json])[0]->receipt_date,
        "pieces"=>json_decode($_POST[json])[0]->pieces,
        "trips"=>json_decode($_POST[json])[0]->trips,
        "users_id"=>$_SESSION['user_id'],
        "order_pattern_id"=>$order_pattern_id
    ]);


    if($order_no_id==false||$pattern_id==false||$order_pattern_id==false||$receiving_id==false){
        echo "新建失败！";
        return false;
    }

});