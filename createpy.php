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
$store = 0;
$category = $_POST["category"];
$name =  $_POST["name"];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); 
mysql_select_db("mysql", $connect); 
$quel = mysql_query("SELECT * FROM FILTER WHERE CREATOR ='".$user_id."' AND FILTER_NAME = '".$name.".py'");
$count = mysql_num_rows($quel);

if($count == 0){
	$sql="insert into FILTER (CREATOR,FILE_NAME, FILTER_NAME, STORE, DOWNLOAD)";
	$sql.="values ('".$user_id."', '".$user_id."_".$name.".py', '".$name.".py', '".$store."', 2)";
	mysql_query($sql, $connect);
	mysql_close($connect);
}
else {
	$sql="update FILTER set DOWNLOAD = 2 WHERE CREATOR = '".$user_id."' AND FILTER_NAME = '".$name.".py'";
	mysql_query($sql, $connect);
	mysql_close($connect);
}

$uploaddir = '/up/'.$user_id.'/Filter/';
$uploadfile = $uploaddir . $user_id . "_".$name.".py";
$file = fopen($uploadfile,"w");
fclose($file);
$upload_manager = '/up/manager/'. $user_id . "_".$name.".py";

copy($uploadfile,$upload_manager);

chmod($uploadfile,0777);
chmod($upload_manager,0777);



//echo 'problem:';
//print_r($_FILES);

?>
<iframe id="ifrm" src="srcode.php" frameborder=0 width="100%" height ="300" scrolling=no border=50 ></iframe>
<a href='pyend.php' data-icon="arrow-r" data-role="button" name="button4">submit</a>
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
