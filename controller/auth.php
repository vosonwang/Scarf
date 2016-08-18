<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/13
 * Time: 14:45
 */
session_start();

header('content-type:text/html;charset=utf-8');

require_once '../database/mysql.func.php';
require_once '../database/config.php';

error_reporting(0);

$link=connect2();
$table='users';



$un = $_POST[username];
$pw = $_POST[password];

$sql="select userrole,COUNT(*) as isuser from users where username='".$un."' and password='".$pw."'";
$row=fetchOne($sql);
if($row[isuser]==0){
    $arr=[0,"用户名或密码错误"];
}else{
    $_SESSION['userrole']=$row['userrole'];
    $_SESSION['username']=$un;
    $_SESSION['password']=$pw;
    $arr=[1,"window.location.href='../view/index.php'"];
};
$msg=json_encode($arr);
echo $msg;
