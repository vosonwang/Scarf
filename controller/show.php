<?php
header('content-type:text/html;charset=utf-8');
require_once '../database/mysql.func.php';
require_once '../database/config.php';

$link=connect2();

$sql='SELECT * FROM finishing';
$rows=fetchAll($sql);
echo json_encode($rows);

