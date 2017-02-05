<?php
session_start();

if(isset($_SESSION['admin_id']))
{
$name=$_SESSION['name'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
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
var z=document.forms["form1"]["npassword"].value;
var a=document.forms["form1"]["confirmpassword"].value;
var o=document.forms["form1"]["opassword"].value;
if (
z==null || z=="" ||
a==null || a=="" ||
o==null || o=="")
{
alert("Please fill all the details");
return false;
}
else  if(z!=a)
 {alert("Password Mismatch");
 return false;}

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
<div class="subheading"><p>Update Details</p></div>
</center>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1" method="post" action="admineditpwd.php" onsubmit="return validateForm()">
<table width="450" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong><br>Change Password<br></strong></td>
</tr>
<tr>
<td>Old Password</td>
<td>:</td>
<td><input name="opassword" type="password" id="opassword" size="30" ></td>
</tr>
<tr>
<td>New Password</td>
<td>:</td>
<td><input name="npassword" type="password" id="npassword" size="30"></td>
</tr>
<tr>
<td>Confirm New Password</td>
<td>:</td>
<td><input name="confirmpassword" type="password" id="confirmpassword" size="30"></td>
</tr>
<tr>
<td>
<?php
if($_POST['student_id']!=""){
echo $_POST['student_id'];
?>
<input type="hidden" name="student_id" value="<? echo $_POST['student_id']; ?>">
<?php
}
else if($_POST['teacher_id']!=""){
echo $_POST['teacher_id'];
?>
<input type="hidden" name="student_id" value="">
<input type="hidden" name="teacher_id" value="<? echo $_POST['teacher_id']; ?>"> 
<?php
}
?></td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> &nbsp;
<input type="reset" name="Reset" value="Reset"></td>
</tr>
</table></center>
</form></td>
</tr>
</table>
</div>	 
        </div><!--close content_item-->
      </div><!--close content-->  
<div class="sidebar_container">       
		<div class="sidebar">
</div>
</div>
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