<?php
require "../database/link.php";
$sql='SELECT * FROM finishing';
$rows=fetchAll($sql);
echo json_encode($rows);

