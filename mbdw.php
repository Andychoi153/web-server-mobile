<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); 
mysql_select_db("mysql", $connect);

$quel = "select F_NAME from plotdb where ID = '".$user_id."'";
$result = mysql_query($quel);
$row=mysql_fetch_row($result); 
$filename = $row[0];


$filepath = '/up/'.$user_id.'/Data/fitted_'.$filename;
$filesize = filesize($filepath);
$path_parts = pathinfo($filepath);
$filename = $path_parts['basename'];
$extension = $path_parts['extension'];
 
header("Pragma: public");
header("Expires: 0");
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Transfer-Encoding: binary");
header("Content-Length: $filesize");
 
ob_clean();
flush();
readfile($filepath);
?>
