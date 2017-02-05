<?php
include('config.php');

// table name 
$tbl_name="general_news";
$tbl_name1="resources";

$sql="SELECT * FROM $tbl_name ORDER BY news_id DESC LIMIT 0,10";
$result=mysql_query($sql);

$sql1="SELECT * FROM $tbl_name1 where resource_type='link' ORDER BY resource_id DESC";
$result1=mysql_query($sql1);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Home</title>
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
<table border=0 cellspacing=10>        
<tr><td rowspan=2><div style="width:330px;"><div class="announce">
<div class="subheading"><p>Announcements</p></div>
<?php
while($rows=mysql_fetch_array($result)){
?>
<p><? echo $rows['news_topic']; ?></p><hr>
<?php
}
?>
</div></div></td>
<td><div style="width:280px;"><div class="announce">
<div class="subheading"><p>Sites</p></div>
<center>
<a href="http://www.vjti.ac.in/" target="_blank"><img src="images/vjti.gif" height=80 width=80></img>&nbsp&nbsp</a>
<a href="http://sra.vjti.info/" target="_blank"><img src="images/sravjti.png" height=80 width=80></img>&nbsp&nbsp</a>
<a href="http://sae.vjti.info/" target="_blank"><img src="images/saevjti.jpg" height=80 width=80></img>&nbsp&nbsp</a>
<a href="http://ecellvjti.org/" target="_blank"><img src="images/ecelllogo.jpg" height=80 width=80></img>&nbsp&nbsp</a>
<a href="http://dla.vjti.info/" target="_blank"><img src="images/dlavjti.jpg" height=80 width=80></img>&nbsp&nbsp</a>
<a href="https://mail.google.com/mail/" target="_blank"><img src="images/gmail.png" height=80 width=80></img>&nbsp&nbsp</a>
<a href="blog.php?page=1" target="_blank"><img src="images/blogger.png" height=80 width=80></img>&nbsp&nbsp</a>
<a href="http://www.youtube.com/" target="_blank"><img src="images/youtube.png" height=80 width=80></img>&nbsp&nbsp</a>
<a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.png" height=80 width=80></img>&nbsp&nbsp</a>
</center>
</div></div></td></tr>
<tr><td><div style="width:280px;"><div class="announce">
<div class="subheading"><p>Learning Resources</p></div>
<?php
while($rows1=mysql_fetch_array($result1)){
?>
<p><a href="<? echo $rows1['resource_content']; ?>" target="_blank"><? echo $rows1['resource_topic']; ?></a></p>
<?php
}
mysql_close();
?>
</div></div></td></tr>
</table>	 
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
</p>
</div>
</div>
</body>
</html>