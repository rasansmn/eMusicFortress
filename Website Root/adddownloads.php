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
if (!isadmin(@$_SESSION['userid'])) //kick out if not admin
{ 
header("Location: index.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Admin CP - Add New Download  | eMusicFortress</title></head>
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
      <h2>Admin CP - Add New Download</h2>
      <?php
if ($action=="submit"){
$dname = mysql_real_escape_string($_POST["txtDname"]);
$url = mysql_real_escape_string($_POST["txtUrl"]);
$artist = mysql_real_escape_string($_POST["txtArtist"]);
$description = mysql_real_escape_string($_POST["txtDescription"]);
$type = mysql_real_escape_string($_POST["lstFiletype"]);
$exclusive = mysql_real_escape_string($_POST["lstExclusive"]);

$res = mysql_query("INSERT INTO tbldownload SET name='".$dname."', url='".$url."', artist='".$artist."', description='".$description."', file_type='".$type."', exclusive='".$exclusive."'");
echo "<p><img src=\"images/ok.gif\" /> Download added successfully</p>";
}

?>
      <form action="adddownloads.php?action=submit" onsubmit='return adddownloadValidator()' method="post">
 <fieldset><legend>Download Information</legend>
          <p> 
            Download Name:<br/>
            <input type="text" name="txtDname" id="txtDname" />
          </p>
          <p> 
            URL:<br/>
            <input type="text" name="txtUrl" id="txtUrl" />
          </p>
          <p> 
            Artist:<br/>
            <input type="text" name="txtArtist" id="txtArtist" />
          </p>
          <p> 
            Description:<br/>
            <textarea name="txtDescription" id="txtDescription"></textarea>
          </p>
          <p> 
            File Type:<br/>
            <select name="lstFiletype" id="lstFiletype">
                <option value="mp3">MP3</option>
                <option value="video">Video</option>
				<option value="remix">DJ Remix</option>
              </select>
          </p>
          <p> 
            Exclusive:<br/>
            <select name="lstExclusive">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
          </p>
		  </fieldset>
          <p class="submit-button"> 
            <input type="submit" name="btnSubmit" value="Submit" />
          </p>

      </form>
	  <p><a href="index.php" title="Home">Home</a> &#187; Admin CP - Add New Download</p>
    </div>
</div>
    <div class="footer"> 
      <?php footer(); ?> 
    </div>
	
  </div>
 </div>
</body>
</html>