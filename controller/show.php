<?php
require "../database/link.php";
$table=$_POST['table'];
$order=$_POST['order'];
$sql='SELECT * FROM '.$table.' ORDER BY '.$order.'';
$rows=fetchAll($sql);
echo json_encode($rows);

