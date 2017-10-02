<?php 
$user="rasansmn"; 
$host="localhost"; 
$password="684684"; 
$database="fortressdb"; 


function isadmin($uid)
{
  $admn = mysql_fetch_array(mysql_query("SELECT permission FROM tbluser WHERE user_id='".$uid."'"));
  if($admn[0]>='1')
  {
    return true;
  }else{
    return false;
  }
}


function getusername_uid($uid)
{
  $uname = mysql_fetch_array(mysql_query("SELECT username FROM tbluser WHERE user_id='".$uid."'"));
  return $uname[0];
}

function loggedmenu()
{
echo "<p><b>Hello $_SESSION[loginname]!</b></p>";
echo "<p>You have logged into the members only area where you can find lot of exclusive features.</p>";
//echo "<p>Memebers Area:</p>";
echo "<p><a href=\"music_videos.php?exclusive=1\" title=\"Music Videos\"><img src=\"images/video.png\" class=\"thumb\" /> Music Videos</a></p>";
echo "<p><a href=\"audio.php?exclusive=1\" title=\"Audio\"><img src=\"images/audio.png\" class=\"thumb\" /> Audio</a></p>";
echo "<p><a href=\"remix.php?exclusive=1\" title=\"DJ Remix\"><img src=\"images/remix.png\" class=\"thumb\" /> DJ Remix</a></p>";
echo "<p><a href=\"forum.php\" title=\"Forum\"><img src=\"images/forum.png\" class=\"thumb\" /> Forum</a></p>";
echo "<p><a href=\"users.php\" title=\"Registered Members\"><img src=\"images/users.png\" class=\"thumb\" /> Registered Members</a></p>";
echo "<p><a href=\"logout.php\" title=\"Logout\"><img src=\"images/logout.png\" class=\"thumb\" /> Logout</a></p>";
return true;
}

function notloggedmenu()
{
echo "<p><b>Memebers Area</b></p>";
echo "<p><a href=\"register.php\" title=\"Register\">Register or Login</a> to the Music Fortress Club and enjoy exclusive downloads for our members and join the discussion forum about music!</p>";
return true;
}

function mainmenu()
{
$lnkregister = null;
$lnklogout = null;
if (@$_SESSION['auth'] != "yes") 
{ //you are not logged in
$lnkregister = "<a href=\"register.php\">Register</a> | ";
}else{
$lnklogout = " | <a href=\"logout.php\">Logout</a>";
}
echo "<a href=\"index.php\">Home</a> | "; 
echo $lnkregister;  
echo "<a href=\"music_videos.php?exclusive=0\">Music Videos</a> | ";
echo "<a href=\"audio.php?exclusive=0\">Audio</a> | ";
echo "<a href=\"remix.php?exclusive=0\">DJ Remix</a> | ";
echo "<a href=\"forum.php\">Forum</a> | ";
echo "<a href=\"contact.php\">Contact Us</a>";
echo $lnklogout;
return true;
}

function footer()
{
echo "Copyright © 2013 Music Fortress Club. All rights reserved. Developed by <a href=\"http://twitter.com/rasansmn\">Rasan</a>";
return true;
}

?> 