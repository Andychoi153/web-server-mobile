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
$quel = mysql_query("SELECT * FROM FILTER WHERE CREATOR ='".$user_id."' AND DOWNLOAD = 1");
$count = mysql_num_rows($quel);


$sql="update FILTER set CATEGORY ='".$category."', EXPLANATION='".$explanation."', INPUT_DATA='".$input_data."', OUTPUT_DATA='".$output_data."' WHERE CREATOR = '".$user_id."' AND DOWNLOAD = 1";
mysql_query($sql, $connect);

$sql="update FILTER set DOWNLOAD = 0 WHERE CREATOR = '".$user_id."' AND DOWNLOAD = 1";

mysql_query($sql, $connect);
mysql_close($connect);

$uploaddir = '/up/'.$user_id.'/Filter/';
$uploadfile = $uploaddir . $user_id . "_". basename($_FILES['userfile']['name']);
$upload_manager = '/up/manager/'. $user_id . "_". basename($_FILES['userfile']['name']);

if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

    print "negative\n";   
}
copy($uploadfile,$upload_manager);

chmod($uploadfile,0777);
chmod($upload_manager,0777);
$filename = $user_id . "_" . basename($_FILES['userfile']['name']);



//echo 'problem:';
//print_r($_FILES);

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

<?php
if($count == 0){
	echo '<center>';
	echo '<p></p>';
	echo '<p><h3>You did not upload python file.</h3> </p>
		<p>Please <strong>Upload python file</strong> first</p>';
	echo '<input type="button" value="Back" onclick="location.href='."'mbupfit.php'".'"/>';
}
else{
echo '<form name="form" method="get" action="upex.php">
<p>
<center><br>
Originaly provided Filter
</br>
</p>
<p>
Fast Fourier Transform</p>
<p>Lorentzian Filter</p>
<p>Gausian Filtting</p>
<p>Z-transform Low Pass Filter<br /></p>
<br>
Uploaded Filter<br />';
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
	echo '<p>'.$entrys['file'][$i].'</p>';

}
echo '<input type="submit" value="Home"><br />
</p>
</form>';
}

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
