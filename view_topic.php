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

$topic_id=$_GET['topic_id'];
$category_id=$_GET['category_id'];
$category_name=$_GET['category_name'];

$secret = 'MySecretWords';
$hash=$_REQUEST['hash'];
if (md5($secret . $category_id) ==$hash) {
  //no tampering detected, proceed with other processing
} else {
  echo " tamper";
  header("location:loginhome.php");
} 
$sql="SELECT * FROM $tbl_name WHERE topic_id='$topic_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View Forum Topic</title>
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
var x1=document.forms["form1"]["reply"].value;

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
<div id="profile"><p><b><? echo $name ?></b>,<a href="logout.php">Logout</a></div>
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
<div class="subheading"><p>View Topic</p></div>
<div class="lform">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" >
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1">
<tr>
<td bgcolor="#F8F7F1"><strong>
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<div id="editforumtopic"><center><p><? echo $rows['topic_name']; ?></center></p></div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editforumtopic','edit/editforumtopic.php?topic_id=<? echo $rows['topic_id']; ?>',{
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
echo "<center><p>".$rows['topic_name']."</center></p><br>"; 
}
?>
 </strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1">
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<div id="edittopicdetail"><center><b><? echo $rows['topic_detail']; ?></center></b><br></div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'edittopicdetail','edit/editforumdetail.php?topic_id=<? echo $rows['topic_id']; ?>',{
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
echo "<center><b>".$rows['topic_detail']."</center></b><br>"; 
}
?>
</td>
</tr>
<tr>
<td bgcolor="#F8F7F1">Posted By <? echo $rows['user_name']; ?>,<? echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<BR><br><br>
<?php

$tbl_name2="forum_replies"; // Switch to table 
$sql2="SELECT * FROM $tbl_name2 WHERE topic_id='$topic_id' ORDER BY reply_id DESC";
$result2=mysql_query($sql2);
while($rows2=mysql_fetch_array($result2)){
?>

<table width="650" border="0" align="center" cellpadding="0" cellspacing="1" >
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" >
<tr>
<td width="77%" bgcolor="#F8F7F1"><? echo $rows2['reply_content']; ?></td>
</tr>
<tr>
<td ><? echo $rows2['user_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><? echo $rows2['datetime']; ?>
<?php
if($user_id==$rows2['user_id'] || isset($_SESSION['admin_id'])){
?>
<center><form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="topic" value="<? echo $rows2['topic_id']; ?>" />
<input type="hidden" name="reply_id" value="<? echo $rows2['reply_id']; ?>" />
<input type="hidden" name="category_id" value="<? echo $category_id ?>" />
<input type="hidden" name="category_name" value="<? echo $category_name ?>" />
<input type="hidden" name="hash" value="<? echo $hash ?>" />
<input type="submit" name="Submit" value="Delete" />
</form></center>
<?php
}
?>
</td>
</tr>
</table></td>
</tr>
</table><br>

<?php
}

$sql3="SELECT view FROM $tbl_name WHERE topic_id='$topic_id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $tbl_name(view) VALUES('$view') WHERE topic_id='$topic_id'";
$result4=mysql_query($sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $tbl_name set view='$addview' WHERE topic_id='$topic_id'";
$result5=mysql_query($sql5);

?>

<BR>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_reply.php" onsubmit="return validateForm()">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Reply</strong></td>
<td valign="top">:</td>
<td><textarea name="reply" cols="45" rows="3" id="reply"></textarea></td>
</tr>
<tr>
<td valign="top">&nbsp</td>
<td valign="top"><input type="hidden" name="category_name" value="<? echo $category_name ?>" /></td>
<td><input type="hidden" name="hash" value="<? echo $hash ?>" /></td>
</tr>
<tr>
<td><input name="category_id" type="hidden" value="<? echo $category_id; ?>" /></td>
<td><input name="topic_id" type="hidden" value="<? echo $topic_id; ?>" /></td>
<td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div><br><br><br></div>
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