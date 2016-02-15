<?php
$fuserid=$_POST['fuserid'];                           //제일 먼저 선언해야 됨
$fpasswd=$_POST['fpasswd'];
$fpasswd_re=$_POST['fpasswd_re'];
$femail =$_POST['femail'];
    

include "connect_db.php";

/* --- 필수 입력 항목에 대한 입력 여부 검사  --- */
if($fuserid == "" || $fpasswd == "" || $fpasswd_re =="" || $fpasswd != $fpasswd_re) 
{
	echo "<script>
	alert(' * 필수 입력사항은 반드시 입력해야 합니다...');
	history.back();
	</script>";
	die;    //프로그램을 중단
} 

$sql="select count(*) from plotdb where ID='$fuserid' ";
$res=mysql_query($sql, $connect);
$rs=mysql_fetch_row($res);
$reg_num=$rs[0];

if($reg_num>0) {
	echo " <script>
	alert('[등록된 ID] \r\n\r\n 다른 ID를 선택하세요.');
	history.back();
	</script> ";
	die;    //프로그램을 중단
}

/* --- 데이터베이스에 입력된 정보 저장  --- */
$sql="insert into plotdb (ID, PW, EMAIL)";
$sql.="values ('".$fuserid."', '".$fpasswd."', '".$femail."')";
$res=mysql_query($sql, $connect);
$tot_row=mysql_affected_rows();
mysql_close($connect);

echo "<center><br><font size=5> 등록 성공 </font></center><hr>";
echo " ■ 생성 레코드 = " . $tot_row . "개";

if($tot_row > 0) {
	mkdir("/up/".$fuserid."");
	chmod("/up/".$fuserid."",0777);
	mkdir("/up/".$fuserid."/Data");
	chmod("/up/".$fuserid."/Data",0777);
	mkdir("/up/".$fuserid."/Filter");
	chmod("/up/".$fuserid."/Filter",0777);
	session_start();
	$_SESSION['user_id'] = $fuserid;
	$_SESSION['user_name'] = $femail;
	echo " <script>
	alert('[등록 성공]\\r\\n회원으로 등록되었습니다.');
	location.replace('main.php');
	</script> ";
} else {
	echo " <script>
	alert('[등록 실패]\\r\\n회원으로 등록을 실패했습니다.');
	history.back();
	</script> ";
}


?>
