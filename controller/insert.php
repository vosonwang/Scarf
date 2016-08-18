<?php
header('content-type:text/html;charset=utf-8');
require_once '../database/mysql.func.php';
require_once '../database/config.php';

$link=connect2();
$table='finishing';
$t=$_POST[json];
$array=json_decode($t);

function object_array($array){
    if(is_object($array)){
        $array = (array)$array;
    }
    if(is_array($array)){
        foreach($array as $key=>$value){
            $array[$key] = object_array($value);
        }
    }
    return $array;
}


foreach($array as $item){
    $item=object_array($item);
    $res=insert($item, $table);
}

echo $res;