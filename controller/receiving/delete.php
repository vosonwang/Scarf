<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 2016/9/2
 * Time: 13:41
 */

require "../../global.php";
require "vendor/medoo.php";
require "database/config.php";
error_reporting(0);
foreach($_POST['id'] as $id){
    $i=$id;
    $database->action(function ($database) {
        global $i;


        $order_pattern_id=$database->select("receiving",[
            "order_pattern_id",
        ],[
            "id"=>$i
        ]);


        $del_receiving=$database->delete("receiving",[
            "id"=>$i
        ]);


        if($order_pattern_id==false||$del_receiving==false){
            return false;
        }


    });
}

