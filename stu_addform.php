<html>
<head><title> �л� ��� </title>
</head>
<body>

<script>

function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("ID�� �Է��ϼ���.");
		user_form.fuserid.focus();
		return false;

	} else if(user_form.fname.value=="") {
		alert("�̸����� �Է��ϼ���.")
		user_form.fname.focus();
		return false;

	} else if(user_form.fpasswd.value=="") {
		alert("��й�ȣ�� �Է��ϼ���.")
		user_form.fpasswd.focus();
		return false;

	} else if(user_form.fpasswd_re.value=="") {
		alert("��й�ȣ Ȯ���� �Է��ϼ���.")
		user_form.fpasswd_re.focus();
		return false;

	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[��й�ȣ �Է� ����] \r\n��й�ȣ�� �ٽ� �Է��ϼ���.");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
		return false;

	} else {
		return true;
	}
}

</script>

<center><font size=6><b>  ȸ������</b> </font><hr>
[ <a href="stu_loginform.php"> �� �� �� </a> ]
<form name="user_form" action="stu_add_db.php" method="post" onSubmit="return chk_input()">
<table border=1 width=700 align=center cellspacing=0 cellpadding="3">
<tr>
	<td width="696" height="30" colspan="2" bgcolor="blue">&nbsp;<font color="white">
	<b> �� ȸ�� ����</b> [ * ǥ�� �ݵ�� ������ �����Դϴ�. ID�� PW�� 20�� ���� �ۼ��ٶ��ϴ�. ] </font></td>
</tr>

<tr>     <!-- �й� �Է»��ڿ� ���� fuserid ����  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> ID </p></td>
	<td width="80%"><input type="text" name="fuserid" id="fuserid" size="12" 
	maxlength="12" onblur="if(fuserid.value!='') chk_id();">
	<input type="button" name="Button" value="�ߺ��˻�" onClick="chk_id();">
	<font size="2"> (ID 20�� ����) </font>

	<script>
	function chk_id( )
	{
		if(user_form.fuserid.value=='') {
			alert('ID�� �Է��ϼ���.');
			user_form.fuserid.focus();
		} else {
			window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin', 'width=400, height=200');
		}
	}
	</script>

    </td>
</tr>

<tr>     <!-- ��й�ȣ �Է»��ڿ� ���� fpasswd ����  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> * ��й�ȣ  </p></td>
	<td width="80%"><input type="password" name="fpasswd" id="fpasswd" size="12" 
	maxlength="10">
	<font size="2"> (������ ���� ȥ�� 10�ڸ�����)  </font></td>
</tr>

<tr>     <!--  ��й�ȣ Ȯ�� �Է»��ڿ� ���� fpasswd_re ����  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> * ��й�ȣ Ȯ��  </p></td>
	<td width="80%"><input type="password" name="fpasswd_re" id="fpasswd_re" 
	size="12" maxlength="10" onblur="chk_passwd( )">
	<font size="2"> (��й�ȣ�� �Ȱ��� �Է��ϼ���.)  </font></td>
</tr>

<tr>     <!--  ��ȭ��ȣ  ���� femail ����  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right">  ��ȭ��ȣ  </p></td>
	<td width="80%">
		<input type="text" name="femail" size="30" maxlength="30"> 
		<font size="2"> (�� : google@google.com) </font></td>
</tr>

<tr>
	<td width="696" height="50" colspan="2"><p align="center"> 
	<input type="submit" name="smt" value=" �����ϱ� " >
	<input type="reset" name="rst" value=" �ٽ��ۼ� ">
</tr>
</table>
</form>
</body>
</html>