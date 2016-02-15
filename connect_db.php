<?php
////////////////////////////이거 니꺼로 고쳐야됨////////////////////
$host="localhost";
$user="root";
$passwd="eqrqrr9326";

$connect=mysql_connect($host, $user, $passwd) or die("mysql서버 접속 에러");
mysql_select_db('mysql', $connect) or die("DB 접속 에러");
?>
