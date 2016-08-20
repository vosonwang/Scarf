<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/13
 * Time: 14:45
 */
session_start();

require "../database/link.php";

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
