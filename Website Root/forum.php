<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 						
include("misc.inc"); 
$lookin = null;
$stext = null;
$page = null;
$items_per_page= 5;
$connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
$db = mysql_select_db($database,$connection) or die("Couldn’t connect database"); 
if (isset($_GET["page"])){ $page = $_GET["page"]; }
if (isset($_GET["lstLookin"])){ $lookin = mysql_real_escape_string($_GET["lstLookin"]); }
if (isset($_GET["txtSearch"])){ $stext = mysql_real_escape_string($_GET["txtSearch"]); }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>Forum | eMusicFortress</title></head>

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
          <h2>Forum</h2>
          <?php 
                           if (@$_SESSION['auth'] != "yes") 
                           { 
                              echo "<p>Please <a href=\"register.php\" title=\"Login\">Login</a> to access into the Forum.</p>";
                           } else{		   						   														
							if($page=="" || $page<=0)$page=1;					   						   
							if (($lookin != "") AND ($stext != "")){
							$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbltopic WHERE ".$lookin. " LIKE '%".$stext."%' ORDER BY topic_id DESC")); //changable
							$num_items = $noi[0];
							$num_pages = ceil($num_items/$items_per_page);
							if(($page>$num_pages)&&$page!=1)$page= $num_pages;
							$limit_start = ($page-1)*$items_per_page;
							$query = "SELECT * FROM tbltopic WHERE ".$lookin. " LIKE '%".$stext."%' ORDER BY topic_id DESC LIMIT $limit_start, $items_per_page";  
							}else{
							$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tbltopic ORDER BY topic_id DESC")); //changable
							$num_items = $noi[0];
							$num_pages = ceil($num_items/$items_per_page);
							if(($page>$num_pages)&&$page!=1)$page= $num_pages;
							$limit_start = ($page-1)*$items_per_page;
							$query = "SELECT * FROM tbltopic ORDER BY topic_id DESC LIMIT $limit_start, $items_per_page";          
							}     						  						  						  			  														            
                            $result = mysql_query($query); 

                            /* Display results in a table */ 
                            echo "<table cellspacing='10' border='0' cellpadding='0' width='100%'>"; 
                            //echo "<tr><td colspan='3' align='right'>Search<br><hr> </td></tr>\n"; 
							echo "<form action=\"forum.php\" method=\"get\">
							<tr><td align='right'>
							Look in: <select name=\"lstLookin\">
							<option value=\"name\">Topic Name</option>
							<option value=\"text\">Topic Text</option>
							</select>
							<input name=\"txtSearch\" type=\"text\" />
							<input name=\"btnSearch\" type=\"submit\" value=\"Search\" />
							<br><hr> </td></tr></form>\n"; 
							
							
                           while ($row = mysql_fetch_array($result,MYSQL_ASSOC))               
                            { 
                                $username = getusername_uid($row['user_id']);
								$time=date("d/m/Y-H:i", $row['created_time']);
								/* display row for each download */ 
								echo "<tr>\n"; 
								echo "<td><a href=\"viewtopic.php?tid={$row['topic_id']}\"><font size='+1'> <b>{$row['name']}</font></b></a> By: <a href=\"viewuser.php?uid={$row['user_id']}\">$username</a><br/>$time</td>\n"; 
								
								echo "<td></td>\n"; 
								echo "<td></td>\n";
								echo "</tr>\n"; 
								echo "<tr><td colspan='3'><hr></td></tr>\n"; 
							} 
						     if($num_pages>1)
								{
								echo "<tr><td colspan='3'>";
								if($page>1)
								{
								  $ppage = $page-1;
								  echo "<a href=\"forum.php?page={$ppage}&lstLookin={$lookin}&txtSearch={$stext}\">&#171;Prev</a> ";
								}
								echo "$page/$num_pages";
								if($page<$num_pages)
								{
								  $npage = $page+1;
								  echo " <a href=\"forum.php?page={$npage}&lstLookin={$lookin}&txtSearch={$stext}\"> Next&#187;</a>";
								}
								echo "</td></tr>";
								}
							echo "</table>\n"; 
						   echo "<p><a href=\"createtopic.php\">Create a Topic</a></p>";
						   
						   }//end of logged in
						   echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; Forum</p>";					   
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
