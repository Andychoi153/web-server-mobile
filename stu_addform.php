<html>
<head><title> 학생 등록 </title>
</head>
<body>

<script>

function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("ID를 입력하세요.");
		user_form.fuserid.focus();
		return false;

	} else if(user_form.fname.value=="") {
		alert("이메일을 입력하세요.")
		user_form.fname.focus();
		return false;

	} else if(user_form.fpasswd.value=="") {
		alert("비밀번호를 입력하세요.")
		user_form.fpasswd.focus();
		return false;

	} else if(user_form.fpasswd_re.value=="") {
		alert("비밀번호 확인을 입력하세요.")
		user_form.fpasswd_re.focus();
		return false;

	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[비밀번호 입력 오류] \r\n비밀번호를 다시 입력하세요.");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
		return false;

	} else {
		return true;
	}
}

</script>

<center><font size=6><b>  회원가입</b> </font><hr>
[ <a href="stu_loginform.php"> 로 그 인 </a> ]
<form name="user_form" action="stu_add_db.php" method="post" onSubmit="return chk_input()">
<table border=1 width=700 align=center cellspacing=0 cellpadding="3">
<tr>
	<td width="696" height="30" colspan="2" bgcolor="blue">&nbsp;<font color="white">
	<b> ■ 회원 가입</b> [ * 표는 반드시 기입할 사항입니다. ID와 PW는 20자 내로 작성바랍니다. ] </font></td>
</tr>

<tr>     <!-- 학번 입력상자에 변수 fuserid 선언  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> ID </p></td>
	<td width="80%"><input type="text" name="fuserid" id="fuserid" size="12" 
	maxlength="12" onblur="if(fuserid.value!='') chk_id();">
	<input type="button" name="Button" value="중복검사" onClick="chk_id();">
	<font size="2"> (ID 20자 이하) </font>

	<script>
	function chk_id( )
	{
		if(user_form.fuserid.value=='') {
			alert('ID를 입력하세요.');
			user_form.fuserid.focus();
		} else {
			window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin', 'width=400, height=200');
		}
	}
	</script>

    </td>
</tr>

<tr>     <!-- 비밀번호 입력상자에 변수 fpasswd 선언  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> * 비밀번호  </p></td>
	<td width="80%"><input type="password" name="fpasswd" id="fpasswd" size="12" 
	maxlength="10">
	<font size="2"> (영문과 숫자 혼합 10자리까지)  </font></td>
</tr>

<tr>     <!--  비밀번호 확인 입력상자에 변수 fpasswd_re 선언  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right"> * 비밀번호 확인  </p></td>
	<td width="80%"><input type="password" name="fpasswd_re" id="fpasswd_re" 
	size="12" maxlength="10" onblur="chk_passwd( )">
	<font size="2"> (비밀번호와 똑같이 입력하세요.)  </font></td>
</tr>

<tr>     <!--  전화번호  변수 femail 선언  --> 
	<td width="20%" height="30" bgcolor="#FFFF99"><p align="right">  전화번호  </p></td>
	<td width="80%">
		<input type="text" name="femail" size="30" maxlength="30"> 
		<font size="2"> (예 : google@google.com) </font></td>
</tr>

<tr>
	<td width="696" height="50" colspan="2"><p align="center"> 
	<input type="submit" name="smt" value=" 가입하기 " >
	<input type="reset" name="rst" value=" 다시작성 ">
</tr>
</table>
</form>
</body>
</html>
