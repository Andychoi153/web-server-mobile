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


mysql_connect("localhost", "root", "eqrqrr9326") or die (mysql_error());
mysql_select_db("mysql");
$category = $_POST["category"];
$src_name = $_POST["src_name"];
$src_value = $_POST["src_value"];

if ($src_value != '') {
	if($category == "all"){
		$where = 'where '.$src_name.' like "%'.$src_value.'%" and STORE = 0';
		
	}
	else {
		$where = 'where '.$src_name.' like "%'.$src_value.'%" and like CATEGORY ='.$category.' and STORE = 0';	
	}
}


$query="select FILE_NAME from FILTER $where"; 
$result=mysql_query($query) or die (mysql_error());
$i = 0;
while($row[$i]=mysql_fetch_array($result)){

	$i++;
}
$cnt = count($row);
$cnt_result = count($result);
for ($i=$cnt; $i>0; $i--){
	for($j=0; $j<$i; $j++){
		if($row[$j][9]<$row[$j+1][9]||$row[$j][9]==''){
			$temp = $row[$j][9];
			$row[$j][9] = $row[$j+1][9];
			$row[$j+1][9] = $temp;
			$temp = $row[$j][0];
			$row[$j][0] = $row[$j+1][0];
			$row[$j+1][0] = $temp; 
		}
	}
}

echo '<ul data-role="listview" data-inset="true">';


for ($i=2; $i<$cnt+1; $i++){
	echo '<li><a href = "mbsearch_result.php?func='.$row[$i][0].'" >'.$row[$i][0].'</a></li>';
}

?>
</ul>
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
