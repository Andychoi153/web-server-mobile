<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); //username과 pw_user는 mysql 사용자, 암호이며 해당시스템에 맞게 수정
mysql_select_db("mysql", $connect); //mysql에는 기본으로 mysql과 test DB가 있음

$quel = "select FILTER_NAME from FILTER WHERE CREATOR ='".$user_id."' AND DOWNLOAD = 2";
$result = mysql_query($quel);
$row=mysql_fetch_row($result);

$filtername = $row[0];
$filtername = substr($filtername,0,-3);
?>
<head>
<style type="text/css">

.button {
  display: inline-block;
  padding: .5em .75em;
  color: #999;
  font-size: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #fdfdfd;
  cursor: pointer;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
}

</style>

</head>
<body onload="parent.iframe_init();">
<form method="POST" ENCTYPE="multipart/form-data" action="debug.php">
	<font face="Ubuntu">
			<center>
			<strong>Source Code</strong>
			</div>

			<p></p><textarea rows ="10" cols="32" name ="srccode">
<?php

echo 'import numpy as np
import scipy
def '.$filtername.'(x,y) : 
    x_fitting=x
    y_fitting=y
    return x_fitting,y_fitting';
?>

</textarea><br/><br/>
        
            <tr>
			
			    <center>
				  <input type="submit" value="Debug" class ="button">
			    </center>
            </tr>
	</font>
    </table>
    </form>
</body>

