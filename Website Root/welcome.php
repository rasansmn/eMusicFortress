<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include("misc.inc"); 
$action = null;
if (isset($_GET["action"])){$action = $_GET["action"];}
$connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
if (@$_SESSION['auth'] != "yes") //kick out if not logged in
{ 
header("Location: index.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Welcome | eMusicFortress</title></head>

<body>
<div align="center">

<div class="page">

    <div class="header"> eMusicFortress</div>

    <div class="main-menu"> 
      <?php
	mainmenu();
	?> 
    </div>
<div class="wrapper"> 
    <div class="v-menu"> 
      <?php
loggedmenu();
?>
    </div>    
    <div class="content"> 
      <h2>Welcome</h2>
      <?php
if ($action=="registered"){
echo "<img src=\"images/ok.gif\" /> You have completed your registration successfully";
}else if($action=="logged"){
echo "<img src=\"images/ok.gif\" /> Logged in successfully as $_SESSION[loginname]!";
}
?>
      <p>Go to the Exclusive <a href="audio.php?exclusive=1" title="Audio">Audio</a>, <a href="music_videos.php?exclusive=1" title="Music Videos">Music Videos</a> and <a href="remix.php?exclusive=1" title="DJ Remix">DJ Remix</a> sections to download lot of exclusive video and mp3 downloads 
        for our registered members and join to the discussions at Music Fortress Club <a href="forum.php" title="Forum">Forum</a> 
      </p>
	  <p><a href="index.php" title="Home">Home</a> &#187; Welcome</p>
    </div>
</div>
    <div class="footer"> 
     <?php footer(); ?> 
    </div>
	
  </div>
 </div>
</body>
</html>