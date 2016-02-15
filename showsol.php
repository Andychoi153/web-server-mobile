<?php
// 4.1.0 이전의 PHP에서는, $_FILES 대신에 $HTTP_POST_FILES를
// 사용해야 합니다.z
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$store = 0;
$category = $_POST["category"];
$explanation =  $_POST["explanation"];
$input_data =  $_POST["inputdata"];
$output_data =  $_POST["outputdata"];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); //username과 pw_user는 mysql 사용자, 암호이며 해당시스템에 맞게 수정
mysql_select_db("mysql", $connect); //mysql에는 기본으로 mysql과 test DB가 있음
$quel = mysql_query("SELECT * FROM FILTER WHERE CREATOR ='".$user_id."' AND DOWNLOAD = 3");
$count = mysql_num_rows($quel);


$sql="update FILTER set CATEGORY ='".$category."', EXPLANATION='".$explanation."', INPUT_DATA='".$input_data."', OUTPUT_DATA='".$output_data."' WHERE CREATOR = '".$user_id."' AND DOWNLOAD = 3";
mysql_query($sql, $connect);

$sql="update FILTER set DOWNLOAD = 0 WHERE CREATOR = '".$user_id."' AND DOWNLOAD = 3";

mysql_query($sql, $connect);
mysql_close($connect);

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
        <h1>Search result</h1>
      </div>
    <div data-role="content">
<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

?>
<form name='form' method="get" action="upex.php">
<p>
<ul data-role="listview" data-inset="true">
<li data-role="list-divider">Originaly provided Filter</li>
<li>Fast Fourier Transform</li>
<li>Lorentzian Filter</li>
<li>Gausian Filtting</li>
<li>Z-transform Low Pass Filter</li>
<li data-role="list-divider">Uploaded Filter</li>
<?php
$path = '/up/'.$user_id.'/Filter/'; // 오픈하고자 하는 폴더
$entrys = array(); // 폴더내의 정보를 저장하기 위한 배열
$dirs = dir($path); // 오픈하기
while(false !== ($entry = $dirs->read())){ // 읽기
   if(($entry != '.') && ($entry != '..')) {
       if(is_dir($path.'/'.$entry)) { // 폴더이면
            $entrys['dir'][] = $entry;
       }
       else { // 파일이면
            $entrys['file'][] = $entry;
      }
   }
}
 $dirs->close(); // 닫기

 $dircnt = count($entrys['dir']); // 폴더 수
 $filecnt = count($entrys['file']); // 파일 수

for($i =0; $i<$filecnt;$i++){
	echo '<li>'.$entrys['file'][$i].'</li>';

}
echo '</ul>';
?>
<input type="submit" value="Home"><br />
</p>
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
