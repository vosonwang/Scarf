<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/13
 * Time: 14:45
 */
session_start();

require "../global.php";
require "vendor/medoo.php";
require "database/config.php";
error_reporting(0);


$datas = $database->select("v_user_detail", "*", [
    "AND" => [
        "login_name" => $_POST[login_name],
        "password" => $_POST[password]
    ]
]);

if($datas){
    $_SESSION['user_id']=$datas[0][user_id];
    $_SESSION['user_name']=$datas[0][user_name];
    $_SESSION['role_name']=$datas[0][role_name];
    $_SESSION['role_id']=$datas[0][role_id];
    $_SESSION['login_name']=$datas[0][login_name];
    $_SESSION['password']=$datas[0][password];
    $arr=[1,"window.location.href='../view/index.php'"];
}else{
    $arr=[0,"用户名或密码错误"];
};
$msg=json_encode($arr);
echo $msg;
/*echo $datas;*/
