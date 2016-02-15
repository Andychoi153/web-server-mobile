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
// 4.1.0 이전의 PHP에서는, $_FILES 대신에 $HTTP_POST_FILES를
// 사용해야 합니다.z
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); //username과 pw_user는 mysql 사용자, 암호이며 해당시스템에 맞게 수정
mysql_select_db("mysql", $connect); //mysql에는 기본으로 mysql과 test DB가 있음
$quel = mysql_query("SELECT * FROM plotdb WHERE ID ='".$user_id."' AND FIT_FLAG = 2");
$count = mysql_num_rows($quel);


if($count == 0){
	echo '<center>';
	echo '<p></p>';
	echo '<p><h3>You did not upload Data file.</h3> </p>
		<p>Please <strong>Upload Data</strong> first</p>';
	echo '<input type="button" value="Back" onclick="location.href='."'upex.php'".'"/>';
}
else{
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
echo '<form method="POST" ENCTYPE="multipart/form-data" action="mbup.php">';
echo "<input id='radio1' type='radio' name='chk_info' value='manager.fft.py'>";
echo "<label for='radio1'>Fast Fourier Transform</label>";
echo "<input id='radio2' type='radio' name='chk_info' value='manager.lf.py'>";
echo "<label for='radio2'>Lorentzian Filter</label>";
echo "<input id='radio3' type='radio' name='chk_info' value='manager.gf.py'>";
echo "<label for='radio3'>Gausian Filtting</label>";
echo "<input id='radio4' type='radio' name='chk_info' value='manager.zf.py'>";
echo "<label for='radio4'>Z-transform Low Pass Filter</label>";


for($i =0; $i<$filecnt;$i++){
	echo '<input id="radio'.(5+$i).'" type="radio" name="chk_info" value="'.$entrys['file'][$i].'">';
	echo '<label for="radio'.(5+$i).'">'.$entrys['file'][$i].'</label>';
}
echo '</p>';
echo '<input type="submit" value="Click"><br />
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
