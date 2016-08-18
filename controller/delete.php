<?php
header('content-type:text/html;charset=utf-8');
require_once '../database/mysql.func.php';
require_once '../database/config.php';

$link=connect2();
$table='finishing';
$key=$_POST[id];
$res=delete($table,"id='".$key."'");
if($res=1){
    echo "删除成功";
}else{
    echo '删除失败';
}
