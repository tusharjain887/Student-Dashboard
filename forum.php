<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];

// table name 
$tbl_name="categories";

$sql="SELECT * FROM $tbl_name";

$result=mysql_query($sql);
if (false === $result) {
    echo mysql_error();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Forum</title>
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
<div id="profile"><b><? echo $name ?></b>,<a href="logout.php">Logout</a></div>
<img src="banner-vjti.jpg"></img>
<div id="loginheading">STUDENT DASHBOARD</div>
<?php
if(isset($_SESSION['admin_id'])){
?>
<ul id="menu-bar">
 <li><a href="adminhome.php">Home</a></li>
 <li><a href="users.php">Users</a></li>
 <li><a href="webmail/index.php" target="_blank">Email</a></li>
<li><a href="dirlist.php">Documents</a></li>
 <li><a href="blog.php?page=1">Blog</a></li>
 <li><a href="forum.php">Forum</a></li>
</ul>
<?php
}
else if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
?>
<ul id="menu-bar">
 <li><a href="loginhome.php">Home</a></li>
 <li><a href="loginevents.php?page=1">Events</a></li>
<li><a href="courses.php">Courses</a></li>
 <li><a href="webmail/index.php" target="_blank">Emails</a></li>
 <li><a href="dirlist.php">Documents</a></li>
 <li><a href="blog.php?page=1">Blog</a></li>
 <li><a href="forum.php">Forum</a></li>
</ul>
<?php
}
?>
</div>
<div id="site_content">
<?php
if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id'])){
?>
<div class="sidebar_container">       
		<div class="sidebar">
<br>
<div class="box">
<div class="subheading"><p>Useful Links</p></div>
<p><a href="http://www.vjti.ac.in/" target="_blank">VJTI</a></p>
<p><a href="http://nptel.iitm.ac.in/" target="_blank">NPTEL</a></p>
<p><a href="http://www.academicprojects.co.in/" target="_blank">Academic Projects</a></p>
<p><a href="http://iitb.vlab.co.in/" target="_blank">Virtual Library</a></p>
<p><a href="https://www.edx.org/" target="_blank">EdX</a></p>
</div>
<div class="box">
<div class="subheading"><p>Profile</p></div>
<?php
if(isset($_SESSION['student_id'])){
$tag=$_SESSION['tag'];
?>
<p>Class : <? echo $tag ?></p>
<p><a href="spupdate.php">Profile</a></p>
<?php
}
else if(isset($_SESSION['teacher_id']))
{
?>
<p><a href="tpupdate.php">Profile</a></p>
<?php
}
?>
<p><a href="myevents.php">My Events</a></p>
<p><a href="myarticles.php">My articles</a></p>
<p><a href="myposts.php">My posts</a></p>
</div>
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	
		   
      <div id="lcontent">
        <div class="lcontent_item">
<?php
}
else if(isset($_SESSION['admin_id'])){
?>
<div class="sidebar_container">       
		<div class="sidebar">
</div>
</div>		   
      <div id="content">
        <div class="content_item">
<?php
}
?>
<div class="generalbox">
<br>
<div class="subheading"><p>Forum</p></div>
<div class="lform">
<table width="600px" border="0" align="center" cellpadding="13" cellspacing="23">
<tr>
<td width="67%" align="center" bgcolor="#E6E6E6"><strong><p>Categories</p></strong></td>
<td width="33%" align="center" bgcolor="#E6E6E6"><strong><p>Topics</p></strong></td>
</tr>
<?php
// Start looping table row
while($rows=mysql_fetch_array($result)){
$secret = 'MySecretWords';
$category_id = $rows['category_id'];
$hash = md5($secret . $category_id);
?>
<tr>
<td align="center" bgcolor="#FFFFFF"><a href="view_category.php?category_id=<? echo $category_id ?>&hash=<? echo $hash ?>&category_name=<? echo $rows['category_name'] ?>"><? echo $rows['category_name']; ?></a><BR><? echo $rows['category_detail']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['no_of_topics']; ?><BR></td>
</tr>
<?php
// Exit looping and close connection 
}
mysql_close();
?>
</table></div><br><br><br></div>

        </div><!--close content_item-->
      </div><!--close content-->  	

</div>

<div id="footer">
<a href="aboutus.html" target="_blank">About This Website</a>
<hr width="1010">
<p>Copyright � 2012 VJTI. All Rights Reserved.</p>
</div>
</div>
</body>
</html>
<?php
}
else
{
header("location:login.php");
}
?>