<?php
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php  						
include("misc.inc"); 
$action = null;
$tid = null;
$page = null;
$items_per_page= 5;
if (isset($_GET["action"])){ $action = $_GET["action"]; }
if (isset($_GET["tid"])){ $tid = $_GET["tid"]; } 
if (isset($_GET["page"])){ $page = $_GET["page"]; }
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<title>View Topic | eMusicFortress</title></head>

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
        <?php 
							
                           if (@$_SESSION['auth'] != "yes") 
                           { 
                              echo "<p>you are not logged in</p>";
                           } else{
                            $connection = mysql_connect($host,$user,$password) or die("Couldn’t connect mysql"); 
							$db = mysql_select_db($database,$connection) or die("Couldn’t connect database");
						   $tinfo = mysql_fetch_array(mysql_query("SELECT * from tbltopic WHERE topic_id='".$tid."'"));
						   $tnm = htmlspecialchars($tinfo[1]);
						   $ttime=date("d/m/Y-H:i",$tinfo[4]);
						   echo "<h2>$tnm</h2>";						   
                           if (isadmin(@$_SESSION['userid'])){
							  $adminopt = "<a href=\"topicoptions.php?tid={$tinfo[0]}\">[options]</a>";
							  }else{
							  $adminopt = null;
							  }
                            /* Display results in a table */ 
                            echo "<table cellspacing='10' border='0' cellpadding='0' width='100%'>"; 
							if($page=="" || $page<=0)$page=1;
							 if($page==1)
    							{
                            	echo "<tr><td colspan='2' align='right'><hr></td></tr>\n"; 
								echo "<tr>\n"; 
								$username = getusername_uid($tinfo[3]);
								echo "<td><a href=\"viewuser.php?uid={$tinfo[3]}\"><font size='+1'> <b>$username</b></font></a>: {$tinfo[2]} $adminopt<br/>$ttime</td>\n"; 
								echo "<td></td>\n"; 
								echo "</tr>\n"; 
								//$items_per_page= 4;
								}
								
								echo "<tr><td colspan='2'><hr></td></tr>\n"; 					   						   
								$noi = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM tblpost  WHERE topic_id='".$tid."'")); //changable
								$num_items = $noi[0]+1; //where did the 1 come from? the topic text!
								$num_pages = ceil($num_items/$items_per_page);
								if(($page>$num_pages)&&$page!=1)$page= $num_pages;
								if ($page==1)$items_per_page= 4;
								$limit_start = ($page-1)*$items_per_page;
								if ($page>1)$limit_start--;
								$query = "SELECT * FROM tblpost WHERE topic_id='".$tid."' LIMIT $limit_start, $items_per_page";  
																        
                            $result = mysql_query($query); 
                           while ($row = mysql_fetch_array($result,MYSQL_ASSOC))               
                            { 
                              if (isadmin(@$_SESSION['userid'])){
							  $adminopt = "<a href=\"postoptions.php?pid={$row['post_id']}&tid={$tinfo[0]}\">[options]</a>";
							  }else{
							  $adminopt = null;
							  }
								/* display row for each download */ 
								echo "<tr>\n"; 
								$username = getusername_uid($row['user_id']);
								$time=date("d/m/Y-H:i", $row['created_time']);
								echo "<td><a href=\"viewuser.php?uid={$row['user_id']}\"><font size='+1'> <b>$username</b></font></a>: {$row['text']} $adminopt<br/>$time</td>\n"; 
								echo "<td></td>\n"; 
								echo "</tr>\n"; 
								echo "<tr><td colspan='2'><hr></td></tr>\n"; 
							} 
						  		if($num_pages>1)
								{
								echo "<tr><td colspan='2'>";
								if($page>1)
								{
								  $ppage = $page-1;
								  echo "<a href=\"viewtopic.php?page={$ppage}&tid={$tid}\">&#171;Prev</a> ";
								}
								echo "$page/$num_pages";
								if($page<$num_pages)
								{
								  $npage = $page+1;
								  echo " <a href=\"viewtopic.php?page={$npage}&tid={$tid}\"> Next&#187;</a>";
								}
								echo "</td></tr>";
								}
							echo "</table>\n"; 
						   echo "<p><a href=\"postreply.php?tid={$tinfo[0]}\">Post Reply</a></p>";
						   echo "<p><a href=\"index.php\" title=\"Home\">Home</a> &#187; <a href=\"forum.php\" title=\"Forum\">Forum</a> &#187; $tnm</p>";
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
