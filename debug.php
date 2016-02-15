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
<font face ="Ubuntu">
<br/><br/>
<center>
<?php
// 4.1.0 이전의 PHP에서는, $_FILES 대신에 $HTTP_POST_FILES를
// 사용해야 합니다.z
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$src = $_POST["srccode"];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); //username과 pw_user는 mysql 사용자, 암호이며 해당시스템에 맞게 수정
mysql_select_db("mysql", $connect); //mysql에는 기본으로 mysql과 test DB가 있음
$quel = "SELECT FILE_NAME FROM FILTER WHERE CREATOR ='".$user_id."' AND DOWNLOAD = 2";
$result = mysql_query($quel);
$row=mysql_fetch_row($result);
$filename = $row[0];

$quel ="update FILTER set DOWNLOAD = 3 where  CREATOR ='".$user_id."' AND DOWNLOAD = 2";
mysql_query($quel);

$uploaddir = '/up/'.$user_id.'/Filter/';
$uploadfile = $uploaddir . $filename;
$upload_manager = '/up/manager/'. $filename;

$file = fopen($uploadfile,"w+");
fwrite($file,$src);
fclose($file);
$upload_manager = '/up/manager/'. $user_id . "_".$name.".py";

copy($uploadfile,$upload_manager);

chmod($uploadfile,0777);
chmod($upload_manager,0777);

system('python /var/www/test.py');
system('pyclean /up/'.$user_id.'/Filter');

?>
</center>
<body>
<br/>
            <tr>
			
			    <center>
				  <p><input type="submit" value="Source code" class ="button" onclick="history.back();"></p>
			    </center>
            </tr>

</body>
</font>
