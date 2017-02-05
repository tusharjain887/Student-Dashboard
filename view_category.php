<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];

 if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
else if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
else
{$user_id=$_SESSION['admin_id'];
}
// table name 
$tbl_name="forum_topics";

$secret1 = 'MySecretWords';
$category_id=$_GET['category_id'];
$category_name=$_GET['category_name'];
$hash1=$_REQUEST['hash'];
if (md5($secret1 . $category_id) ==$hash1) {
  //no tampering detected, proceed with other processing
} else {
  echo " tamper";
  header("location:loginhome.php");
} 
$sql="SELECT * FROM $tbl_name WHERE category_id='$category_id' ORDER BY topic_id DESC";
$result=mysql_query($sql);
if (false === $result) {
    echo mysql_error();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View Category</title>
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
 <li><a href="roundcube/index.php" target="_blank">Emails</a></li>
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
<div class="subheading"><p>Categories</p></div>
<center><p><? print $category_name; ?></p></center><br><br>
<table width="700" border="0" align="center" cellpadding="18" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td width="57%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Views</strong></td>
<td width="13%" align="center" bgcolor="#E6E6E6"><strong>Replies</strong></td>
<td width="15%" align="center" bgcolor="#E6E6E6"><strong>Last Posted By</strong></td>
</tr>

<?php
 
// Start looping table row
while($rows=mysql_fetch_array($result)){
$secret = 'MySecretWords';
$category_id = $rows['category_id'];
$hash = md5($secret . $category_id);
?>
<tr>
<td bgcolor="#FFFFFF"><a href="view_topic.php?category_id=<? echo $category_id ?>&hash=<? echo $hash ?>&category_name=<? echo $category_name ?>&topic_id=<? echo $rows['topic_id']; ?>"><? echo $rows['topic_name']; ?></a><BR><br><? echo $rows['user_name']; ?><? echo $rows['datetime']; ?>
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="topic_id" value="<? echo $rows['topic_id']; ?>" />
<input type="hidden" name="category_id" value="<? echo $category_id ?>" />
<input type="hidden" name="category_name" value="<? echo $category_name ?>" />
<input type="hidden" name="hash" value="<? echo $hash1 ?>" />
<input type="submit" name="Submit" value="Delete" />
</form>
<?php
}
?>
</td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['view']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['reply']; ?></td>
<td align="center" bgcolor="#FFFFFF"><? echo $rows['last_posted_by']; ?></td>
</tr>

<?php
// Exit looping and close connection 
}
mysql_close();
?>

<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="create_topic.php?category_id=<? echo $category_id ?>&hash1=<? echo $hash1 ?>&category_name=<? echo $category_name ?>"><strong>Create New Topic</strong> </a></td>
</tr>
</table>

</div>	 
        </div><!--close content_item-->
      </div><!--close content-->  

</div>

<div id="footer">
<a href="aboutus.html" target="_blank">About This Website</a>
<hr width="1010">
<p>Copyright © 2012 VJTI. All Rights Reserved.</p>
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