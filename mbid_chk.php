<!DOCTYPE html>
  <head>
    <title>Username check</title>
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
        <h1>Username Check</h1>
      </div>
    <div data-role="content">
<?php
$fuserid=$_GET['fuserid'];             //GET방식으로 전송 받음 
include "connect_db.php";

$sql="select count(*) from plotdb where ID='$fuserid' ";
$res=mysql_query($sql, $connect);
$rs=mysql_fetch_array($res);
$num=$rs[0];
mysql_close();
?>

<html>
<head><title> Username Duplicated check </title>
</head>
<body>
<form name="chkid_form">
<tr height="120"><td align="center"> 
  <?php if($num>0) { ?>
  <center><strong>Someone already have username as  <?php echo $fuserid; ?> .</strong> <br>
  <strong>Please choose another username.</strong><br><br></center>
  <?php } else { ?>
  [ <?php echo $fuserid; ?> ] can be used.<br><br>
  <?php } ?>
  <input type="button" name="Button" value=" Ok "                    onClick="self.close();"></td>
	</tr>
</table>
</form>
</body>
</html>
