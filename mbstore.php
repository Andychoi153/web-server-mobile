<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>
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


	<form method=post action='mbsearch.php'>
	<tr>
        <td width=100% colspan=5 align=center>
	
		
			<input type=text name=src_value size=30>
		
	
	<div data-role="controlgroup" >
			<table>
			<select name=src_name>
			<option value="CREATOR">name</option>
			<option value="FILTER_NAME" selected>title</option>
			<option value="EXPLANATION">contents</option>
			</select>
			<select name=category>
			<option value="all">All</option>
			<option value="economy">Economy</option>
			<option value="traffic">Traffic</option>
			<option value="region">Region</option>
			<option value="weather">Weather</option>
			<option value="laboratory">Laboratory</option>
			</select></table>
	</div>
			<input data-icon ="search" type=submit value=search >
	

		</td>
	</tr>
	</form>
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
