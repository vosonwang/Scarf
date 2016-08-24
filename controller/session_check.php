<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/14
 * Time: 15:55
 */

session_start();
error_reporting(0);
$url = $_SERVER['PHP_SELF'];
//截取文件名称
$name = substr($url, strrpos($url, '/') + 1);

if ($name != 'login.php') {
    if (!isset($_SESSION['username'])) {
        echo "<meta http-equiv='Refresh' content='0; url=../view/login.php'>";
        exit;
    } else {
        if ($name != "index.php") {
            echo "<script>window.location.href='../view/index.php'</script>";
        }
    }
}else{
    if (isset($_SESSION['username'])) {
        echo "<script>window.location.href='../view/index.php'</script>";
    }
}

?>