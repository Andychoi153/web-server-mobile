<?php
$fuserid=$_POST['fuserid'];                           //���� ���� �����ؾ� ��
$fpasswd=$_POST['fpasswd'];
$fpasswd_re=$_POST['fpasswd_re'];
$femail =$_POST['femail'];
    

include "connect_db.php";

/* --- �ʼ� �Է� �׸� ���� �Է� ���� �˻�  --- */
if($fuserid == "" || $fpasswd == "" || $fpasswd_re =="" || $fpasswd != $fpasswd_re) 
{
	echo "<script>
	alert(' * �ʼ� �Է»����� �ݵ�� �Է��ؾ� �մϴ�...');
	history.back();
	</script>";
	die;    //���α׷��� �ߴ�
} 

$sql="select count(*) from plotdb where ID='$fuserid' ";
$res=mysql_query($sql, $connect);
$rs=mysql_fetch_row($res);
$reg_num=$rs[0];

if($reg_num>0) {
	echo " <script>
	alert('[��ϵ� ID] \r\n\r\n �ٸ� ID�� �����ϼ���.');
	history.back();
	</script> ";
	die;    //���α׷��� �ߴ�
}

/* --- �����ͺ��̽��� �Էµ� ���� ����  --- */
$sql="insert into plotdb (ID, PW, EMAIL)";
$sql.="values ('".$fuserid."', '".$fpasswd."', '".$femail."')";
$res=mysql_query($sql, $connect);
$tot_row=mysql_affected_rows();
mysql_close($connect);

echo "<center><br><font size=5> ��� ���� </font></center><hr>";
echo " �� ���� ���ڵ� = " . $tot_row . "��";

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
	alert('[��� ����]\\r\\nȸ������ ��ϵǾ����ϴ�.');
	location.replace('main.php');
	</script> ";
} else {
	echo " <script>
	alert('[��� ����]\\r\\nȸ������ ����� �����߽��ϴ�.');
	history.back();
	</script> ";
}


?>
