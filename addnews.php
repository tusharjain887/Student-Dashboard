<?php
session_start();

if(isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');

// table name 
$tbl_name="general_news";

$sql1="SELECT * FROM $tbl_name ORDER BY news_id DESC";
$result1=mysql_query($sql1);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Add News</title>
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
<script type="text/javascript">
function validateForm()
{
var x1=document.forms["form1"]["topic"].value;
var x2=document.forms["form1"]["detail"].value;

if (
x1==null || x1=="" ||
x2==null || x2=="")
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

<ul id="menu-bar">
 <li><a href="adminhome.php">Home</a></li>
 <li><a href="users.php">Users</a></li>
 <li><a href="webmail/index.php" target="_blank">Email</a></li>
<li><a href="dirlist.php">Documents</a></li>
 <li><a href="blog.php?page=1">Blog</a></li>
 <li><a href="forum.php">Forum</a></li>
</ul>
</div>

<div id="site_content">	
<div class="sidebar_container">       
		<div class="sidebar">
</div>
</div>		   	
		   
      <div id="content">
<div class="content_item">
<div class="generalbox">
<br>
<div class="subheading"><p>Add News</p></div>
<br><center>
<?php

while($rows1=mysql_fetch_array($result1)){
?>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#F8F7F1"><strong>ID</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows1['news_id']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Topic</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows1['news_topic']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Detail</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows1['news_content']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows1['datetime']; ?></td>
</tr>
<tr>
<td >&nbsp</td>
<td>&nbsp</td>
<td>
<form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="news_id" value="<? echo $rows1['news_id']; ?>" />
<input type="submit" name="Submit" value="Delete" />
</form>
</td>
</tr>
</table></td>
</tr>
</table><br>
<?php
}
mysql_close();
?>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="insertnews.php" onsubmit="return validateForm()">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong>Add a news<br></strong> </td>
</tr>
<tr>
<td width="14%"><strong><br>&nbsp&nbsp&nbsp&nbspTopic<br></strong></td>
<td width="2%">:</td>
<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
</tr>
<tr>
<td valign="top"><strong><br>&nbsp&nbsp&nbsp&nbspDetail<br></strong></td>
<td valign="top">:</td>
<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><br><center><input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" /></center><br></td>
</tr>
</table>
</td>
</form>
</tr>
</table></center>
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
header("location:index.php");
}
?>