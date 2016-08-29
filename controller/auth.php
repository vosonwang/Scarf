<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/13
 * Time: 14:45
 */
session_start();

require "../database/link.php";

$table='v_user_detail';

$ln = $_POST[login_name];
$pw = $_POST[password];

$sql="select role_name,COUNT(*) as isuser from ".$table." where login_name='".$ln."' and password='".$pw."'";
$row=fetchOne($sql);
if($row[isuser]==0){
    $arr=[0,"用户名或密码错误"];
}else{
    $_SESSION['userrole']=$row['userrole'];
    $_SESSION['login_name']=$ln;
    $_SESSION['password']=$pw;
    $arr=[1,"window.location.href='../view/index.php'"];
};
$msg=json_encode($arr);
echo $msg;
