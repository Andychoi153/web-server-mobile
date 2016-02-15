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
        <h1>tutorial</h1>
      </div>
    <div data-role="content">
<h1>Upload python file</h1><br/>
<strong><p>Note</p>
Main function name must same with python file name!</strong>
<br/><br/><br/>
Example<div data-role="fieldcontain">
File name : Hello.py</br><table>
<p></p><textarea rows ="5" cols="25" name ="srccode">
<?php
echo '
def plus(n) :
    n = n+1
    return n
 
def Hello(x,y) :

    k = plus(y)

    return x,k'
?>
</textarea><br/><br/>


Also Main function must have two argument and two return value.
You can use import numpy and import scipy.<br/><br/>
If you want view more example visit <a href='fitandplot.blogspot.com'>here</a>
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
