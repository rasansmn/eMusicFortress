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
<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css" />
<title>Register | eMusicFortress</title>
<script src="scripts/myscript.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
echo "<form action=\"register.php?action=login\" method=\"post\" onsubmit=\"return loginValidator()\">";
echo "<table class=\"login\">";
echo "<tr><td>Username:</td><td><input type=\"text\" name=\"txtUsername\" id=\"txtUsername\" /></td></tr>";
echo "<tr><td>Password:</td><td><input type=\"password\" name=\"txtPassword\" id=\"txtPassword\" /></td></tr>";
echo "<tr><td>&nbsp;</td><td align=\"right\"><input type=\"submit\" name=\"Submit\" value=\"Login\" /></td></tr>";
echo "</table>";
echo "</form>";
?>
    </div>    
    <div class="content"> 
      <h2>Register</h2>
      <p>Enter your details in the form below. All fields are required.</p>
      <?php
if ($action=="register")
{
$username = mysql_real_escape_string($_POST["txtRegUsername"]);
$password = mysql_real_escape_string($_POST["txtRegPassword"]);
$name = mysql_real_escape_string($_POST["txtName"]);
$email = mysql_real_escape_string($_POST["txtEmail"]);

$exe = mysql_query("SELECT COUNT(*) FROM tbluser WHERE username='".$username."'") or die("Couldn’t execute query");
$ucount = mysql_fetch_array($exe);
$exe = mysql_query("SELECT COUNT(*) FROM tbluser WHERE email='".$email."'") or die("Couldn’t execute query");
$ecount = mysql_fetch_array($exe);
if ($ucount[0] > 0){
echo "<p class=\"err\">Username already exist.</p>";
}else if($ecount[0] > 0){
echo "<p class=\"err\">E-mail already exist.</p>";
}else{
$enpass = md5($password);
$res = mysql_query("INSERT INTO tbluser SET username='".$username."', password='".$enpass."', name='".$name."', email='".$email."'");
$from_head = "noreply@emusicfortress.rasan.net";
$content = "Hi $name, thank you for registering with eMusicFortress. your login credentials are as follows, username: $username , password: $password";
$mailsend = mail($email,"User Registration on eMusicFortress", $content, $from_head); 
//set logged
$_SESSION['auth']="yes";                           
$_SESSION['loginname'] = $username;  
$result = mysql_query("SELECT user_id FROM tbluser WHERE username='".$username."' AND password='".$enpass."'") or die("Couldn’t execute query");
$userinfo = mysql_fetch_array($result, MYSQL_ASSOC);
$_SESSION['userid'] = $userinfo['user_id'];  
//go for the welcome
header("Location: welcome.php?action=registered");
}
}
?>
      <form action="register.php?action=register" onsubmit="return registerValidator()" method="post">
	  <fieldset>
        <legend>Account Information</legend>
          <p> 
           Username:<br/>
           <input type="text" name="txtRegUsername" id="txtRegUsername" />
          </p>
          <p> 
            Name:<br/>
            <input type="text" name="txtName" id="txtName" />
          </p>
          <p> 
            E-Mail:<br/>
            <input type="text" name="txtEmail" id="txtEmail" />
          </p>
          <p>
            Password:<br/>
            <input type="password" name="txtRegPassword" id="txtRegPassword" />
          </p>
          <p> 
            Confirm Password:<br/>
            <input type="password" name="txtCpassword" id="txtCpassword" />
          </p>
		  </fieldset>
          <p class="submit-button"> 
        
            <input type="submit" name="btnSubmit" value="Register" />
          </p>
        
      </form>
	  <p><a href="index.php" title="Home">Home</a> &#187; Register</p>
    </div>
</div>
    <div class="footer"> 
      <?php footer(); ?> 
    </div>
	
  </div>
 </div>
</body>
</html>