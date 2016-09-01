<?php
require "../global.php";
require "vendor/medoo.php";
require "database/config.php";
error_reporting(0);

$table=$_POST['table'];
$order=$_POST['order'];
$dates=$database->select($table, "*", ["ORDER" => $order,]);
echo json_encode($dates);