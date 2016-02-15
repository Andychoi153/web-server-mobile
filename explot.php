<?php
// 4.1.0 이전의 PHP에서는, $_FILES 대신에 $HTTP_POST_FILES를
// 사용해야 합니다.z
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$data_type = $_POST["dt"];
$time = $_POST["time"];

$connect = mysql_connect("localhost", "root", "eqrqrr9326") or die("cannot connect to mysql"); //username과 pw_user는 mysql 사용자, 암호이며 해당시스템에 맞게 수정
mysql_select_db("mysql", $connect); //mysql에는 기본으로 mysql과 test DB가 있음

// 테이블 생성
$quel = "update plotdb set LOGIN = 1 where (ID= '".$user_id."')";
mysql_query($quel);

$quel = "update plotdb set DIM ='".$data_type."'  where (ID= '".$user_id."')";
mysql_query($quel);

$quel = "update plotdb set TIME ='".$time."'  where (ID= '".$user_id."')";
mysql_query($quel);

$quel = "update plotdb set FIT_FLAG = 2 where (ID= '".$user_id."')";
mysql_query($quel);

$uploaddir = '/up/'.$user_id."/Data/";
$uploadfile = $uploaddir . $user_id . ".". basename($_FILES['userfile']['name']);

if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {

    print "negative\n";   
}
chmod($uploadfile,0777);
$filename = $user_id . "." . basename($_FILES['userfile']['name']);
//echo "Positive\n";
//echo "'".$filename."'";
$quel = "update plotdb set F_NAME ='".$filename."'  where (ID= '".$user_id."')";
mysql_query($quel);


//echo 'problem:';
//print_r($_FILES);

system('python /var/www/plot.py');
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
<center>
<img src ="/img/<?php echo $filename . '.png'?>" style ="max-width:100%; height:auto;"/>

            <tr>
			
			    <center>
				  <p><input type="submit" value="Back" class ="button" onclick="history.back();"></p>
			    </center>
            </tr>
</body>

