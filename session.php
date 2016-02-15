<?php
session_start();

$fuserid=$_POST['fuserid'];
$fpasswd=$_POST['pfasswd'];

$_SESSION['ses_userid']=$fuserid;
$_SESSION['ses_pass']=$fpasswd;

?>
