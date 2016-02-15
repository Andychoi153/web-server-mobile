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
<form method='post' action='mblogin_ok.php'>

	<p>User name<input type='text' name='user_id' tabindex='1'></p>
	


	<p>Password<input type='password' name='user_pw' tabindex='2'></p>
<p rowspan='2'><center><input type='submit' tabindex='3' value='Sign in' style='height:50px'/><center></p>

</form>

<tr>
	<td><a href="mbstu_addform.html"><center>sign up</center></a></td>
</tr>

