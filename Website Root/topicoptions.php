<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include("misc.inc"); 
$action = null;
$connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
if (isset($_GET["action"])){$action = $_GET["action"];}
if (isset($_GET["tid"])){$tid = mysql_real_escape_string($_GET["tid"]);}
if (!isadmin(@$_SESSION['userid'])) //kick out if not admin
{ 
header("Location: index.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Admin CP - Topic Options | eMusicFortress</title></head>
<script src="scripts/myscript.js"></script>
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
      <h2>Admin CP - Topic Options</h2>
      <?php
				if($action=="update"){

						$name = mysql_real_escape_string($_POST["txtName"]);
						$text = mysql_real_escape_string($_POST["txtText"]);
						$res = mysql_query("UPDATE tbltopic SET name='".$name."', text='".$text."' WHERE topic_id='".$tid."'");
						echo "<p><img src=\"images/ok.gif\" /> Topic updated successfully</p>";
						echo "<p><a href=\"viewtopic.php?tid={$tid}\">View Topic</a></p>";
				}else if($action=="delete"){
				$res = mysql_query("DELETE FROM tbltopic WHERE topic_id='".$tid."'");
				$res = mysql_query("DELETE FROM tblpost WHERE topic_id='".$tid."'");
				echo "<p><img src=\"images/ok.gif\" /> Topic deleted successfully</p>";
				echo "<p><a href=\"forum.php\">Back to Forum</a></p>";	
				}else{						   
							$exe = mysql_query("SELECT * FROM tbltopic WHERE topic_id='".$tid."'") or die("Couldn’t execute query");
							$tdetails = mysql_fetch_array($exe);
							echo "<form action=\"topicoptions.php?action=update&tid={$tid}\" method=\"post\" onsubmit='return createtopicValidator()'>";
							echo "<fieldset>";
							echo "<legend>Topic Details</legend>";
							echo "<p>Topic Name:<input type=\"text\" value=\"$tdetails[1]\" name=\"txtName\" id=\"txtName\" /></p>";
							echo "<p>Text:<textarea name=\"txtText\" id=\"txtText\" >$tdetails[2]</textarea></p>";
							echo "</fieldset>";
							echo "<p class=\"submit-button\"><input type=\"submit\" name=\"Submit\" value=\"Update\" /></p>";
							echo "</form>";
							echo "<p><a href=\"topicoptions.php?action=delete&tid={$tid}\" title=\"Delete Topic\" onclick = \"if (! confirm('Are you sure you want to delete this topic?')) { return false; }\">Delete Topic</a></p>";
						}
								echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; <a href=\"forum.php\" title=\"Forum\">Forum</a> &#187; <a href=\"viewtopic.php?tid={$tid}\" title=\"Topic\">Topic</a> &#187; Topic Options</p>";
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
