<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  						
include("misc.inc"); 
$action = null;
if (isset($_GET["action"])) { $action = $_GET["action"]; }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="scripts/myscript.js"></script>
<title>Create Topic | eMusicFortress</title></head>

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
      <h2>Create Topic</h2>
      <?php 
							
                           if (@$_SESSION['auth'] != "yes") 
                           { 
                              echo "<p>you are not logged in</p>";
                           } else{
						   
				if($action=="create"){
				
				                            $connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
											$db = mysql_select_db($database,$connection) or die("Couldn’t connect database"); 
						$name = mysql_real_escape_string($_POST["txtName"]);
						$text = mysql_real_escape_string($_POST["txtText"]);
						$userid = $_SESSION['userid'];
						$time = time();
						$res = mysql_query("INSERT INTO tbltopic SET name='".$name."', text='".$text."', user_id='".$userid."', created_time='".$time."'");
						echo "<p><img src=\"images/ok.gif\" /> Topic created successfully</p>";
						echo "<p><a href=\"forum.php\">Back to Forum</a></p>";
				}else{						   

							echo "<form action=\"createtopic.php?action=create\" method=\"post\" onsubmit='return createtopicValidator()'>";
							echo "<fieldset>";
							echo "<legend>Topic Details</legend>";
							echo "<p>Topic Name:<input type=\"text\" name=\"txtName\" id=\"txtName\" /></p>";
							echo "<p>Text:<textarea name=\"txtText\" id=\"txtText\"></textarea></p>";
							echo "</fieldset>";
							echo "<p class=\"submit-button\"><input type=\"submit\" name=\"Submit\" value=\"Create\" /></p>";
							echo "</form>";
						}
						echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; <a href=\"forum.php\" title=\"Forum\">Forum</a> &#187; Create Topic</p>";
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
