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
if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
	echo "<meta http-equiv='refresh' content='0;url=mblogin.php'>";
	exit;
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

echo "<center><p><h3>Welcome to plot $user_id</h3></p></center>";

?>

<iframe id="ifrm" src="lib.php" frameborder=0 width="100%" height ="300" scrolling=no border=50 ></iframe> 
    
<?php
echo '<div data-role="controlgroup">';
echo '<a href='."'upcrpy.html'".' data-icon="arrow-r" data-role="button" name="button1">Upload python module</a>';
echo '<a href='."'mbstore.php'".' data-icon="search" data-role="button" name="button2">Search module</a>';
echo '<a href='."'mbfit.php'".' data-icon="grid" data-role="button" name="button3">Fitting</a>';
echo '<a href='."'tutorial.php'".' data-icon="info" data-role="button" name="button4">Tutorial</a>';
echo '</div>';
echo "<p><center><a href='mblogout.php'>Logout</a></center></p>";

?>
</div>
    <div data-role="footer" data-position="fixed">
      <h1>Main menu</h1>
    </div>
              </div>
      </body>
</html>
