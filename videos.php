<?php
include('config.php');

// table name 

$tbl_name1="resources";

$query = "SELECT COUNT(*) as num FROM $tbl_name1 WHERE resource_type='video'";
$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];

	
	/* Setup vars for query. */
	$targetpage = "videos.php"; 	//your file name  (the name of this file)
	$limit = 2; 			//how many items to show per page
	$adjacents = ceil($total_pages/$limit);				
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql1 = "SELECT * FROM $tbl_name1 WHERE resource_type='video' ORDER BY resource_id DESC LIMIT $start, $limit";
	$result1 = mysql_query($sql1);
	if (false === $result1) {
                    echo mysql_error();
                   }
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Videos</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
 <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
</head>

<body>

<div id="main">
<div id="vert">

<div id="header">
<img src="banner-vjti.jpg"></img>
<div id="heading">STUDENT DASHBOARD</div>

<ul id="menu-bar">
 <li><a href="index.php">Home</a></li>
 <li><a href="news.php">News</a></li>
 <li><a href="events.php">Events</a></li>
 <li><a href="map.html">Map</a></li>
 <li><a href="images.php">Images</a></li>
 <li><a href="videos.php?page=1">Videos</a></li>
 <li><a href="links.php">Resources</a></li>
</ul>
</div>

<div id="site_content">
<div class="sidebar_container">       
		<div class="sidebar">
<div class="box">
<div class="subheading"><p>Popular Links</p></div>
<p><a href="http://www.vjti.ac.in/" target="_blank">VJTI</a></p>
<p><a href="http://technovanza.org/" target="_blank">Technovanza</a></p>
<p><a href="http://pratibimb.org/" target="_blank">Pratibimb</a></p>
<p><a href="http://enthusia.org/public_html/index.html" target="_blank">Enthusia</a></p>
</div>
<table cellpadding="2" cellspacing="0" border="0" style="border: #B13052 1px solid; background:url('minimal-background-pattern-wordpress-10.jpg') ;COLOR: #000; FONT: 13px arial, sans-serif; font-weight: bold;"><tr><td align="center">
<div class="subheading"><p>Upcoming Events</p></div>
</td></tr><tr><td>
<iframe id="NewsWindow" src="news_win.php" width="170" height="190" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" style="border: #000000 0px solid;background:url('minimal-background-pattern-wordpress-10.jpg');"></iframe>
</td></tr></table>

          
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	
		   
      <div id="content">
        <div class="content_item">
<div class="generalbox">
<div class="subheading"><p>Videos</p></div>
<center><?php
while($rows1=mysql_fetch_array($result1)){
?>
<p><? echo $rows1['resource_topic']; ?></p>
<? echo $rows1['resource_content']; ?>
<br><br>
<?php
}
mysql_close();
?>
<?=$pagination?></center>
</div>
        </div><!--close content_item-->
      </div><!--close content-->  
		   
     <div class="sidebar_container">       
		<div class="sidebar">

<div class="box">
<div class="subheading"><p>Login</p></div>
<form name="myForm" method="post" action="checklogin.php">
<div style="font-size:16px;color:#B13052;">Username : </div><input name="student_id" type="text" id="student_id" size="15"><br>
<p><div style="font-size:16px;color:#B13052;">Password : </div><input name="password" type="password" id="password" size="15"><br><br>
<input type="submit" name="Login" value="Login"><br><br>
<div style="font-size:16px;color:#B13052;"><a href="signup.php">Sign Up</a></div>
<div style="font-size:16px;color:#B13052;"><a href="forgotpassword.php">Forgot Password</a></div>
</form>
</div>

<div class="box">
<div class="subheading"><p>Societies</p></div>
<p><a href="http://sra.vjti.info/" target="_blank">SRA</a></p>
<p><a href="http://sae.vjti.info/" target="_blank">SAE</a></p>
<p><a href="http://ecellvjti.org/" target="_blank">E-CELL</a></p>
</div>
    
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	

</div>

<div id="footer">
<a href="aboutus.html">About This Website</a>
<hr width="1010">
<p>Copyright © 2012 VJTI. All Rights Reserved.</p>
</div>
</div>
</body>
</html>