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
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<title>Home | eMusicFortress</title>
<script src="scripts/myscript.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="description" content="The official website of Music Fortress Club, University of Queensland Australia" />
<meta name="keywords" content="music,forum,audio,video,remix,downloads" />
<meta name="author" content="Rasan Samarasinghe" />
</head>

<body>
<div>

<div class="page">

    <div class="header"> eMusicFortress</div>
    <div class="main-menu">
	<?php mainmenu(); ?> 
    </div>
<div class="wrapper"> 
    <div class="v-menu"> 
      <?php

if (@$_SESSION['auth'] != "yes") 
{ //you are not logged in
$err = null;
			if ($action=="login"){
			$sql = "SELECT user_id FROM tbluser WHERE username='".mysql_real_escape_string($_POST["txtUsername"])."' AND password='".md5(mysql_real_escape_string($_POST["txtPassword"]))."'"; 
          $result = mysql_query($sql) or die("Couldn’t execute query");          #30 
          $num2 = mysql_num_rows($result); 
          if ($num2 > 0)   // password is correct                   #32 
          { 
            $_SESSION['auth']="yes";                                #34 
            $logname=$_POST['txtUsername']; 
            $_SESSION['loginname'] = $logname;                        #36 
            $userinfo = mysql_fetch_array($result, MYSQL_ASSOC);
			$_SESSION['userid'] = $userinfo['user_id'];    
			header("Location: welcome.php?action=logged");
			}else{
			$err = "<p class=\"err\">Invalid username and password</p>";
			}
		}                  
//login form
echo "<p><b>Are you a member?</b></p>";
echo $err;
echo "<form action=\"index.php?action=login\" method=\"post\" onsubmit='return loginValidator()'>";
//echo "<p>";
echo "<table class=\"login\">";
echo "<tr><td>Username:</td><td><input type=\"text\" name=\"txtUsername\" id=\"txtUsername\" /></td></tr>";
echo "<tr><td>Password:</td><td><input type=\"password\" name=\"txtPassword\" id=\"txtPassword\" /></td></tr>";
echo "<tr><td>&nbsp;</td><td align=\"right\"><input type=\"submit\" name=\"Submit\" value=\"Login\" /></td></tr>";
echo "</table>";
//echo "</p>";
echo "</form>";

echo "<p><b>Not registered yet?</b></p>";
echo "<p><a href=\"register.php\" title=\"Register\">Register</a> on Music Fortress Club and enjoy exclusive downloads for our members and join the discussion forum about music!</p>";
  							  
} //end you are not logged in
else //you are logged in
{						   					   
loggedmenu();
} 
?>
    </div>    
    <div class="content"> 
      <h2>Welcome to Music Fortress Club!</h2>
	  <p><img src="images/mFortressClub.png" alt="eMusicFortress" class="main"/></p>
      <p>Music Fortress Club is a team of university students who are music enthusiastic 
        of the University of Queensland, Australia.</p>
		<p>This active club of Music Fortress enthusiasts rehearses regularly and contributes to the many outstanding musical performances on University of Queensland. The Music Fortress Club is open to all interested individuals.</p>
		<p>The Club encourages students to  develop as a team and learn from each other.  It includes three faculty coachings and a master class each term in which all  groups perform for one another. At the end of the year, the Club presents a benefit concert to fundraise for a charity of the Ensemble's choosing.</p>
		<p>Check out our exclusive <a href="audio.php?exclusive=1" title="Audio">Audio</a>, <a href="music_videos.php?exclusive=1" title="Music Videos">Music Videos</a> and <a href="remix.php?exclusive=1" title="DJ Remix">DJ Remix</a> sections to download lot of exclusive video and mp3 downloads 
        for our registered members and join to the discussions at Music Fortress Club <a href="forum.php" title="Forum">Forum</a>.
      </p>
    </div>
</div>
    <div class="footer"> 
     <?php footer(); ?> 
    </div>
	
  </div>
 </div>
</body>
</html>