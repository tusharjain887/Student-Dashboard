<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
$name=$_SESSION['name'];
include('config.php');
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
$tbl_name="blog_articles";

$article_id=$_GET['article_id'];

$secret = 'MySecretWords';
$hash=$_REQUEST['hash'];
if (md5($secret . $article_id) ==$hash) {
  //no tampering detected, proceed with other processing
} else {
  echo " tamper";
  header("location:loginhome.php");
} 
$sql="SELECT * FROM $tbl_name WHERE article_id='$article_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View Blog</title>
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
<script language="javascript" src="scriptaculous/lib/prototype.js"></script>
<script language="javascript" src="scriptaculous/src/scriptaculous.js"></script>
<script type="text/javascript">
function validateForm()
{
var x1=document.forms["form1"]["comment"].value;

if (x1==null || x1=="")
{
alert("Please fill all the details");
return false;
}

}
</script>
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
<div class="subheading"><p>View Blog</p></div>
<div class="lform">
<center>
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<div id="editblogtopic"><p><? echo $rows['article_name']; ?></p></div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editblogtopic','edit/editblogtopic.php?article_id=<? echo $rows['article_id']; ?>',{
okText: 'Update',
cancelText: 'Cancel',
highlightColor:'#E2F1B1',
clickToEditText: 'Click me to edit',
loadingText: 'Loading..',
savingText: 'Saving..'}
);
</script>
<p>
<?php
}
else
{
echo "<p>".$rows['article_name']."</p>"; 
}
?>
</p></center>
<div style="margin:20px;">
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<div id="editblogdetail"><b><center><? echo $rows['article_detail']; ?></center></b><br></div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editblogdetail','edit/editblogdetail.php?article_id=<? echo $rows['article_id']; ?>',{
okText: 'Update',
cancelText: 'Cancel',
highlightColor:'#E2F1B1',
clickToEditText: 'Click me to edit',
loadingText: 'Loading..',
savingText: 'Saving..'}
);
</script>
<?php
}
else
{
echo "<center><b>".$rows['article_detail']."</center></b><br>"; 
}
?> 
Posted by <? echo $rows['user_name']; ?>,<? echo $rows['datetime']; ?>
<br><br></div>
<?php

$tbl_name2="blog_comments"; // Switch to table 
$sql2="SELECT * FROM $tbl_name2 WHERE article_id='$article_id' ORDER BY comment_id DESC";
$result2=mysql_query($sql2);
while($rows2=mysql_fetch_array($result2)){
?>
<center>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><b><? echo $rows2['comment_content']; ?></b></td>
</td>
</tr>
<tr>
<td width="100%" bgcolor="#F8F7F1">By <? echo $rows2['user_name']; ?>
</tr>
<tr>
<td bgcolor="#F8F7F1"><? echo $rows2['datetime']; ?>
<?php
if($user_id==$rows2['user_id'] || isset($_SESSION['admin_id'])){
?>
<center><form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="comment_id" value="<? echo $rows2['comment_id']; ?>" />
<input type="hidden" name="article" value="<? echo $rows2['article_id']; ?>" />
<input type="hidden" name="hash" value="<? echo $hash ?>" />
<input type="submit" name="Submit" value="Delete" /></center>
</form>
<?php
}
?>
</td>
</tr>
</table></td>
</tr>
</table></center><br>

<?php
}
mysql_close();
?>
<br>

<table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_blogcomment.php" onsubmit="return validateForm()">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Comment</strong></td>
<td valign="top">:</td>
<td><textarea name="comment" cols="45" rows="3" id="comment"></textarea></td>
</tr>
<tr>
<td><input name="hash" type="hidden" value="<? echo $hash; ?>" /></td>
<td><input name="article_id" type="hidden" value="<? echo $article_id; ?>" /></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</div></div>
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