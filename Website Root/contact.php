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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<script src="scripts/myscript.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact Us | eMusicFortress</title></head>

<body>
<div>

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
if (@$_SESSION['auth'] != "yes") 
{ //you are not logged in
notloggedmenu();
}else{
loggedmenu();
}
?>
    </div>    
    <div class="content"> 
      <h2>Contact Us</h2>
      <?php 
							      						   
				if($action=="submit"){
								                     
						$name = $_POST["txtName"];
						$email = $_POST["txtEmail"];
						$message = $_POST["txtMessage"];
						
						$mailsend = mail("rasansmn@gmail.com","A New Message From eMusicFortress", $message, $email); 
						echo "<p><img src=\"images/ok.gif\" /> Message sent successfully. Thank you for contacting us.</p>";
						
				}else{	
									   
							echo "<p>Questions and comments are welcome.</p>";
							echo "<form action=\"contact.php?action=submit\" method=\"post\" onsubmit=\"return contactValidator()\">";
							echo "<fieldset>";
							echo "<legend>Message Details</legend>";
							echo "<p><label>Your Name:</label><br/><input type=\"text\" name=\"txtName\" id=\"txtName\" /></p>";
							echo "<p>E-Mail:<br/><input type=\"text\" name=\"txtEmail\" id=\"txtEmail\" /></p>";
							echo "<p>Message:<br/><textarea name=\"txtMessage\" id=\"txtMessage\" cols=\"0\" rows=\"0\"></textarea></p>";
							echo "</fieldset>";
							echo "<p class=\"submit-button\"><input type=\"submit\" name=\"Submit\" value=\"Send\" /></p>";
							
							echo "</form>";
						}
						echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; Contact Us</p>";
						  					   
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