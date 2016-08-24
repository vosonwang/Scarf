<?php
require "../database/link.php";

$table='finishing';
foreach($_POST['id'] as $id){
    $res=delete($table,"id='".$id."'");
}
echo $res;