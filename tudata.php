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
<font face="Ubuntu">
<center><h1>Data type</h1></center><br/>
<strong><p>Data extension type</p></strong>
only '.dat' files are allowed. but any other extension type of data file available wich can be read by text reader. you just add '.dat' at end of the Data file name.
<strong><p>Data graph type</p></strong>

<div data-role="fieldcontain">
2D Graph :</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php

echo ' 
X	Y1	Y2... ... Yn
1	2	3
2	3	4
3	6	7
4	8	9
5	7	6
6	7	8
7	5	4
8	3	2
9	7	6
10	3	3'
?>

</textarea><br/><br/>
<img src ="/img/tutorial2d.png" style ="max-width:100%; height:auto;"/><br/>
</table>
</div>
<div data-role="fieldcontain">
<br/><p>3D vector Graph :</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php

echo ' 
X	Y	Z
1	2	3
2	3	4
3	6	7
4	8	9
5	7	6
6	7	8
7	5	4
8	3	2
9	7	6
10	3	3'
?>

</textarea><br/><br/>
<img src ="/img/tutorial3dv.png" style ="max-width:100%; height:auto;"/><br/>
</table>
</div>

<div data-role="fieldcontain">
<br/><p>3D level Graph :</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php

echo ' 
1	2	3	2	3	4
3	6	7	4	8	9
5	7	6	6	7	8
7	5	4	8	3	2
9	7	6	10	3	3'
?>
</textarea><br/><br/>
<img src ="/img/tutorial3dl.png" style ="max-width:100%; height:auto;"/><br/>
</table>
</div>

<div data-role="fieldcontain">
Time include :</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php

echo ' 
X	Y1	Y2
10	2	3
20	3	4
30	6	7
40	8	9
50	7	6
60	7	8
70	5	4
80	3	2
90	7	6
100	3	3'
?>

</textarea><br/><br/>
<img src ="/img/time_include.png" style ="max-width:100%; height:auto;"/><br/>
</table>
</div>

<div data-role="fieldcontain">
No time include :</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php

echo ' 
Y1	Y2
2	3
3	4
6	7
8	9
7	6
7	8
5	4
3	2
7	6
3	3'
?>

</textarea><br/><br/>
<img src ="/img/tutorial2d.png" style ="max-width:100%; height:auto;"/><br/>
</table>
</div>

<center>
				  <p><input type="submit" value="Back" class ="button" onclick="history.back();"></p>
			    </center>

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
