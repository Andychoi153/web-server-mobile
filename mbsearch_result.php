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
        <h1>Search result</h1>
      </div>
    <div data-role="content">
<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$func_name = $_GET['func'];
echo "<p></p><p><strong>".$func_name."</strong></p>";
mysql_connect("localhost", "root", "eqrqrr9326") or die (mysql_error());
mysql_select_db("mysql");
$query="select * from FILTER where FILE_NAME ='".$func_name."'";
$result=mysql_query($query) or die (mysql_error());
$row=mysql_fetch_row($result);
echo '<div data-role="collapsible">
<h3>creator name</h3>
<p>'.$row[0].'</p>
</div>';
echo '<div data-role="collapsible">
<h3>fucntion name</h3>
<p>'.$row[2].'</p>
</div>';
echo '<div data-role="collapsible">
<h3>explanation</h3>
<p>'.$row[5].'</p>
</div>';
echo "<p><strong>Example</strong></p>";
echo '<div data-role="collapsible">
<h3>Input Data</h3>
<p>'.$row[6].'</p>
</div>';
echo '<div data-role="collapsible">
<h3>Output Data</h3>
<p>'.$row[7].'</p>
</div>';

echo '<p><input type="button" name="button1" value ="install filter" onclick="location.href='."'mbfilt_download.php?func=".$func_name."&creator=".$row[0]."'".'"></p>';
?>
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
