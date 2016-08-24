<?php
/**
 * Created by PhpStorm.
 * User: voson
 * Date: 16/8/14
 * Time: 16:25
 */
$url = $_SERVER['PHP_SELF'];
//截取文件名称
$name= substr($url ,strrpos($url ,'/')+1 );
echo $name;