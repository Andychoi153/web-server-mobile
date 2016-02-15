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
session_start();

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
?>

<form method="POST" ENCTYPE="multipart/form-data" action="showsol.php">

            <tr>
                    <td align="center" colspan="2">
                            
			<div data-role="fieldcontain">

			
				<p></p>	
				<p><h3>Explanation</h3></p>
				<p>Please write explanation of your python function for other user</p>
			    <textarea rows ="10" cols="30" name ="explanation"></textarea><br/>
			</div>
			<div data-role="fieldcontain">
				<p></p>	
				<p><h3>Example</h3></p>
				<p>Example input data form</p>
			    <textarea rows ="5" cols="30" name ="inputdata"></textarea><br />
				Example output data form</p>
			    <textarea rows ="5" cols="30" name ="outputdata"></textarea><br />
			</div>
			<center><div data-role="controlgroup" data-type="horizontal">
			<input data-icon="arrow-r" type="submit" value="  send  "> <input data-icon="delete" type="reset" value="cancle"><br/>
			</div></center>
					    
                    </td>
			    
            </tr>
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
