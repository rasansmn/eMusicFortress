<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  						
include("misc.inc"); 
$uid = null;
if (isset($_GET["uid"])){ $uid = $_GET["uid"]; }
if (@$_SESSION['auth'] != "yes") 
{ //you are not logged in
header("Location: index.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>View User Profile | eMusicFortress</title></head>

<body>
<div align="center">

<div class="page">

    <div class="header"> eMusicFortress</div>

    <div class="main-menu"> 
     <?php mainmenu(); ?> 
    </div>
<div class="wrapper">
      <div class="v-menu"> 
        <?php loggedmenu(); ?>
      </div>      
      <div class="content"> 
        <?php 
							
                           if (@$_SESSION['auth'] != "yes") 
                           { 
                              echo "<p>you are not logged in</p>";
                           } else{
                            $connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
							$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
						   $uinfo = mysql_fetch_array(mysql_query("SELECT * from tbluser WHERE user_id='".$uid."'"));
						   
						   echo "<h2>$uinfo[1]</h2>";						   
                 		echo "<table width=\"50%\" cellspacing=\"10px\">";
					   echo "<tr><td>User ID: </td><td>$uinfo[0]</td></tr>";
						echo "<tr><td>Username: </td><td>$uinfo[1]</td></tr>";
						echo "<tr><td>Name: </td><td>$uinfo[3]</td></tr>";
						echo "<tr><td>E-Mail: </td><td>$uinfo[4]</td></tr>";
					   echo "</table>";
					   	if (isadmin(@$_SESSION['userid'])){
					   echo "<p><a href=\"users.php?action=delete&uid={$uinfo[0]}\" onclick = \"if (! confirm('Are you sure you want to delete this User?')) { return false; }\">Delete User</a></p>";
					   }
						   echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; <a href=\"users.php\" title=\"Registered Users\">Registered Users</a> &#187; $uinfo[1]</p>";
						   }//end of logged in					   
   ?>
   
      </div>

    </div>
    <div class="footer"> 
      <?php footer(); ?> 
    </div>
	
  </div>
 </div>
</body>
</html>
