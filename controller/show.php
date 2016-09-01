<?php
require "../database/config.php";
$table=$_POST['table'];
$order=$_POST['order'];
$dates=$database->select($table, "*", ["ORDER" => $order,]);
echo json_encode($dates);

