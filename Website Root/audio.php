<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 						
include("misc.inc"); 
$action = null;
$exclusive = null;
$lookin = null;
$stext = null;
$page = null;
$items_per_page= 3;
$connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
$db = mysql_select_db($database,$connection) or die("Couldn’t connect database"); 
if (isset($_GET["action"])){ $action = $_GET["action"]; }
if (isset($_GET["page"])){ $page = $_GET["page"]; }
if (isset($_GET["exclusive"])){ $exclusive = mysql_real_escape_string($_GET["exclusive"]); }
if (isset($_GET["lstLookin"])){ $lookin = mysql_real_escape_string($_GET["lstLookin"]); }
if (isset($_GET["txtSearch"])){ $stext = mysql_real_escape_string($_GET["txtSearch"]); }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Audio | eMusicFortress</title></head>

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
      <h2>Audio</h2>
      <?php                					   
if(($action=="delete") AND (isadmin($_SESSION['userid']))){ //only admin can do this
$res = mysql_query("DELETE FROM tbldownload WHERE download_id='".mysql_real_escape_string($_GET["did"])."'");
echo "<p><img src=\"images/ok.gif\" /> Download deleted successfully</p>";
}	
				   						   
if($page=="" || $page<=0)$page=1;					   						   
if (($lookin != "") AND ($stext != "")){
$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbldownload WHERE ".$lookin. " LIKE '%".$stext."%' AND file_type='mp3' AND exclusive='".$exclusive."' ORDER BY download_id DESC")); //changable
$num_items = $noi[0];
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;
$query = "SELECT * FROM tbldownload WHERE ".$lookin. " LIKE '%".$stext."%' AND file_type='mp3' AND exclusive='".$exclusive."' ORDER BY download_id DESC LIMIT $limit_start, $items_per_page";  
}else{
$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbldownload WHERE file_type='mp3' AND exclusive='".$exclusive."' ORDER BY download_id DESC")); //changable
$num_items = $noi[0];
$num_pages = ceil($num_items/$items_per_page);
if(($page>$num_pages)&&$page!=1)$page= $num_pages;
$limit_start = ($page-1)*$items_per_page;
$query = "SELECT * FROM tbldownload WHERE file_type='mp3' AND exclusive='".$exclusive."' ORDER BY download_id DESC LIMIT $limit_start, $items_per_page";          
}                           

                   			$result = mysql_query($query); 

                            /* Display results in a table */ 
                            echo "<table cellspacing='10' border='0' cellpadding='0' width='100%'>"; 
                            echo "<form action=\"audio.php?action=search&exclusive=".$exclusive."\" method=\"get\"><tr><td>";
							if ($exclusive > 0){
							echo "<a href=\"audio.php?exclusive=0\" title=\"Free\">Free</a> | Exclusive";
							}else{
							echo "Free | <a href=\"audio.php?exclusive=1\" title=\"Exclusive\">Exclusive</a>";
							}
							
							echo "</td><td align='right'>
							Look in: <select name=\"lstLookin\">
							<option value=\"name\">Name</option>
							<option value=\"description\">Description</option>
							<option value=\"artist\">Artist</option>
							</select>
							<input name=\"txtSearch\" type=\"text\" />
							<input name=\"btnSearch\" type=\"submit\" value=\"Search\" /></td></tr>
							<tr><td colspan='2'><hr> </td></tr></form>\n"; 
                           
						    if ((@$_SESSION['auth'] != "yes") AND ($exclusive > 0))
                           { 
                              echo "<tr><td colspan='2'>Pleaser <a href=\"register.php\" title=\"Login\">Login</a> to access into the Exclusive Downloads section.</td></tr>";
                           } else{
						   
						   while ($row = mysql_fetch_array($result,MYSQL_ASSOC))              
                            { 
                              if (isadmin(@$_SESSION['userid'])){
							  $adminopt = "<a href=\"audio.php?action=delete&did={$row['download_id']}&exclusive={$exclusive}\" onclick = \"if (! confirm('Are you sure you want to delete this Download?')) { return false; }\">[x]</a>";
							  }else{
							  $adminopt = null;
							  } 
        /* display row for each download */ 
        echo "<tr>\n"; 
        echo "<td colspan='2'><a href=\"{$row['url']}\"><font size='+1'> <b>{$row['name']}</b></font></a> ({$row['file_type']}) $adminopt<br/>Artist: {$row['artist']}<br/>Description: {$row['description']}</td>\n";  
    	echo "</tr>\n"; 
        echo "<tr><td colspan='2'><hr></td></tr>\n"; 
      						} 
							
							if($num_pages>1)
							{
							echo "<tr><td colspan='2'>";
							if($page>1)
							{
							  $ppage = $page-1;
							  echo "<a href=\"audio.php?exclusive={$exclusive}&page={$ppage}&lstLookin={$lookin}&txtSearch={$stext}\">&#171;Prev</a> ";
							}
							echo "$page/$num_pages";
							if($page<$num_pages)
							{
							  $npage = $page+1;
							  echo " <a href=\"audio.php?exclusive={$exclusive}&page={$npage}&lstLookin={$lookin}&txtSearch={$stext}\"> Next&#187;</a>";
							}
							echo "</td></tr>";
							}
							
							
							}
							
      echo "</table>\n"; 
	   

		if (isadmin(@$_SESSION['userid'])){
		echo "<p><a href=\"adddownloads.php\">Add New Download</a></p>";
		}			
		echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; Audio</p>";				   				   
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
