<!DOCTYPE html>
  <head>
    <title>Sign up</title>
    <meta charset="euc-kr" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0,
            maximum-scale=1.0, minimum-scale=1.0,
            user-scalable=no"/>
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
  </head>
  <body>
    <div data-role="page" data-theme="d">
      <div data-role="header">
        <h1>Sign up</h1>
      </div>
    <div data-role="content">

<?php
$fuserid=$_POST['fuserid'];                           
$fpasswd=$_POST['fpasswd'];
$fpasswd_re=$_POST['fpasswd_re'];
$femail =$_POST['femail'];
    

include "connect_db.php";

if($fuserid == "" || $fpasswd == "" || $fpasswd_re =="" || $fpasswd != $fpasswd_re) 
{
	echo "<script>
	alert(' Please fill all form...');
	history.back();
	</script>";
	die;   
} 

$sql="select count(*) from plotdb where ID='$fuserid' ";
$res=mysql_query($sql, $connect);
$rs=mysql_fetch_row($res);
$reg_num=$rs[0];

if($reg_num>0) {
	echo " <script>
	alert('Username is Duplicated');
	history.back();
	</script> ";
	die;    
}


$sql="insert into plotdb (ID, PW, EMAIL)";
$sql.="values ('".$fuserid."', '".$fpasswd."', '".$femail."')";
$res=mysql_query($sql, $connect);
$tot_row=mysql_affected_rows();
mysql_close($connect);


if($tot_row > 0) {
	mkdir("/up/".$fuserid."");
	chmod("/up/".$fuserid."",0777);
	mkdir("/up/".$fuserid."/Data");
	chmod("/up/".$fuserid."/Data",0777);
	mkdir("/up/".$fuserid."/Filter");
	chmod("/up/".$fuserid."/Filter",0777);
	copy("/home/andychoi/Untitled.ipynb","/home/andychoi/".$fuserid.".ipynb");
	chmod("/home/andychoi/".$fuserid.".ipynb",0777);
	session_start();
	$_SESSION['user_id'] = $fuserid;
	$_SESSION['user_name'] = $femail;
	echo " <script>
	alert('Your account has been created.');
	location.replace('upex.php');
	</script> ";
} else {
	echo " <script>
	alert('Failed to create your account.');
	history.back();
	</script> ";
}


?>
