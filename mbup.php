<!DOCTYPE html>
  <head>
    <title>plot&fit</title>
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
        <h1>Main menu</h1>
      </div>
    <div data-role="content">
<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$filt_name = $_POST["chk_info"];
$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql");
mysql_select_db("mysql", $connect); 

$quel = "update plotdb set FIT_FUNC ='".$filt_name."'  where (ID= '".$user_id."')";
mysql_query($quel);
$quel = "update plotdb set FIT_FLAG = 1  where (ID= '".$user_id."')";
mysql_query($quel);
system('python /var/www/filter.py');
system('pyclean /up/'.$user_id.'/Filter');
$quel = "select F_NAME from plotdb where ID = '".$user_id."'";
$result = mysql_query($quel);
$row=mysql_fetch_row($result);
$filename = $row[0];
mysql_connect("localhost", "root", "eqrqrr9326") or die (mysql_error());
mysql_select_db("mysql");
$query="update FILTER set RANK = IFNULL(RANK,0) + 1 where FILE_NAME = '$filt_name'";
mysql_query($query) or die (mysql_error());
?>
<html>
<head>
</head>
<body>
<p>
<center><br>
<img src ="/img/<?php echo $filename . '.png'?>" style ="max-width:100%; height:auto;"/><br/>
<img src ="/img/<?php echo $filename . '_fitted.png'?>" style ="max-width:100%; height:auto;"/><br/>
<iframe id="ifrm" src="mbdw_button.php" frameborder=0 width="100%" height ="50" scrolling=no border=50 ></iframe> 
</p>
</div>
    <div data-role="footer" data-position="fixed">
	<div data-role="navbar">
	  <ul>
	    <li><a href="upex.php" data-icon="home"
		data-transition="slide" data-direction="reverse">Main menu</a></li>
	  </ul>
    </div>
</div>
      </body>
</html>
