<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  						
include("misc.inc"); 
$action = null;
$tid = null;
$text = null;
if (isset($_GET["action"])) { $action = $_GET["action"]; }
if (isset($_GET["tid"])) { $tid = $_GET["tid"]; }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="scripts/myscript.js"></script>
<title>Post Reply | eMusicFortress</title></head>

<body>
<div align="center">

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
notloggedmenu();
}else{
loggedmenu();
}
?>
    </div>    
    <div class="content"> 
      <h2>Post Reply</h2>
      <?php 
							
                           if (@$_SESSION['auth'] != "yes") 
                           { 
                              echo "<p>you are not logged in</p>";
                           } else{
						   
				if($action=="reply"){
				
				                            $connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
											$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
						$text = mysql_real_escape_string($_POST["txtText"]);
						$userid = $_SESSION['userid'];
						$time = time();
						$res = mysql_query("INSERT INTO tblpost SET text='".$text."', topic_id='".$tid."', user_id='".$userid."', created_time='".$time."'");
						echo "<p><img src=\"images/ok.gif\" /> Message posted successfully</p>";
						echo "<p><a href=\"viewtopic.php?tid={$tid}\">View Topic</a></p>";
				}else{						   

							echo "<form action=\"postreply.php?action=reply&tid={$tid}\" method=\"post\" onsubmit='return postreplyValidator()'>";
							echo "<fieldset>";
							echo "<legend>Post Details</legend>";
							echo "<p>Text:<textarea name=\"txtText\" id=\"txtText\" ></textarea></p>";
							echo "</fieldset>";
							echo "<p class=\"submit-button\"><input type=\"submit\" name=\"Submit\" value=\"Reply\" /></p>";
							echo "</form>";
						}
						echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; <a href=\"forum.php\" title=\"Forum\">Forum</a> &#187; <a href=\"viewtopic.php?tid={$tid}\" title=\"Topic\">Topic</a> &#187; Post Reply</p>";
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
