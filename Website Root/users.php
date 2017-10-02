<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 						
include("misc.inc"); 
$action = null;
$page = null;
$items_per_page= 5;
if (isset($_GET["action"])){ $action = $_GET["action"]; }
if (isset($_GET["page"])){ $page = $_GET["page"]; }
$connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
if (@$_SESSION['auth'] != "yes") 
{ //you are not logged in
header("Location: index.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Registered Users | eMusicFortress</title></head>

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
      <h2>Registered Users</h2>
      <?php 
if(($action=="delete") AND (isadmin($_SESSION['userid']))){ //only admin can do this
$res = mysql_query("DELETE FROM tbluser WHERE user_id='".mysql_real_escape_string($_GET["uid"])."'");
$res = mysql_query("DELETE FROM tblpost WHERE user_id='".mysql_real_escape_string($_GET["uid"])."'");
$res = mysql_query("DELETE FROM tbltopic WHERE user_id='".mysql_real_escape_string($_GET["uid"])."'");
echo "<p><img src=\"images/ok.gif\" /> User deleted successfully</p>";
}

if($page=="" || $page<=0)$page=1;
$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbluser ORDER BY user_id DESC")); //changable
$num_items = $noi[0];
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;
$query = "SELECT * FROM tbluser ORDER BY user_id DESC LIMIT $limit_start, $items_per_page";  
							                                 
                            $result = mysql_query($query); 
                            /* Display results in a table */ 
                            echo "<table cellspacing='10' border='0' cellpadding='0' width='100%'>"; 
                            echo "<tr><td><hr></td></tr>\n";
                           while ($row = mysql_fetch_array($result,MYSQL_ASSOC))                #38 
                            { 
                      		if (isadmin(@$_SESSION['userid'])){
							  $adminopt = "<a href=\"users.php?action=delete&uid={$row['user_id']}\" onclick = \"if (! confirm('Are you sure you want to delete this User?')) { return false; }\">[x]</a>";
							  }else{
							  $adminopt = null;
							  }        

        echo "<tr>\n"; 
        echo "<td><a href=\"viewuser.php?uid={$row['user_id']}\"><font size='+1'> <b>{$row['username']}</b></font></a> $adminopt</td>\n"; 
    	echo "</tr>\n"; 
        echo "<tr><td><hr></td></tr>\n"; 
      } 
	  if($num_pages>1)
    {
    echo "<tr><td>";
    if($page>1)
    {
      $ppage = $page-1;
      echo "<a href=\"users.php?page={$ppage}\">&#171;Prev</a> ";
    }
	echo "$page/$num_pages";
	if($page<$num_pages)
    {
      $npage = $page+1;
      echo " <a href=\"users.php?page={$npage}\"> Next&#187;</a>";
    }
	echo "</td></tr>";
	}
	echo "</table>\n"; 
		echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; Registered Users</p>";
   ?>
    </div>
</div>
    <div class="footer"> <?php footer(); ?>  </div>
	
  </div>
 </div>
</body>
</html>
