<?php
require "../database/link.php";
$sql='SELECT * FROM finishing ORDER BY sequence ';
$rows=fetchAll($sql);
echo json_encode($rows);

