<?php
require "../database/link.php";

$table='finishing';
$t=$_POST[json];
$array=json_decode($t);

//将对象转化为数组
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