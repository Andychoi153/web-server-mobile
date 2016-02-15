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
        <h1>Search result</h1>
      </div>
    <div data-role="content">
<?php
session_start();
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

$func_name = $_GET['func'];
$creator = $_GET['creator'];
$upload_org ='/up/'.$creator.'/Filter/'.$func_name;
$upload_file ='/up/'.$user_id.'/Filter/'.$func_name;


copy($upload_org,$upload_file);
chmod($upload_file,0777);


mysql_connect("localhost", "root", "eqrqrr9326") or die (mysql_error());
mysql_select_db("mysql");
$query="update FILTER set RANK = IFNULL(RANK,0) + 1 where FILE_NAME = '$func_name'"; 
mysql_query($query) or die (mysql_error());

?>
<form name='form' method="get" action="upex.php">
<p>
<ul data-role="listview" data-inset="true">
<li data-role="list-divider">Originaly provided Filter</li>
<li>Fast Fourier Transform</li>
<li>Lorentzian Filter</li>
<li>Gausian Filtting</li>
<li>Z-transform Low Pass Filter</li>
<li data-role="list-divider">Uploaded Filter</li>
<?php
$path = '/up/'.$user_id.'/Filter/'; 
$entrys = array();
$dirs = dir($path); 
while(false !== ($entry = $dirs->read())){
   if(($entry != '.') && ($entry != '..')) {
       if(is_dir($path.'/'.$entry)) { 
            $entrys['dir'][] = $entry;
       }
       else { 
            $entrys['file'][] = $entry;
      }
   }
}
 $dirs->close(); 

 $dircnt = count($entrys['dir']); 
 $filecnt = count($entrys['file']); 

for($i =0; $i<$filecnt;$i++){
	echo '<li>'.$entrys['file'][$i].'</li>';

}
echo '</ul>';
?>
<input type="submit" value="Home"><br />
</p>
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
