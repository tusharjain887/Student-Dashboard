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
var x1=document.forms["form1"]["teacher_id"].value;
var x2=document.forms["form1"]["email_id"].value;
var x3=document.forms["form1"]["name"].value;
var x5=document.forms["form1"]["branch_id"].value;
var x6=document.forms["form1"]["password"].value;

var atpos=x2.indexOf("@");
var dotpos=x2.lastIndexOf(".");
var alpha="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
var digits="0123456789";
	var temp;
if (
x1==null || x1=="" ||
x2==null || x2=="" || 
x3==null || x3=="" ||
x5==null || x5=="" ||
x6==null || x6=="")
{
alert("Please fill all the details");
return false;
}
else
{

 //check email
 if(atpos<1 || dotpos<atpos+2 || dotpos+2>=x2.length)
 {alert("Invalid email");
 return false;}

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
<div class="subheading"><p>Add Teacher</p></div><br>
</center>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1" method="post" action="insertteachers.php" onsubmit="return validateForm()">
<table width="450" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong><br>ADD A NEW STUDENT<br></strong></td>
</tr>
<tr>
<td width="200">Id no</td>
<td width="45">:</td>
<td width="205"><input name="teacher_id" type="text" id="teacher_id" size="30"></td>
</tr>
<tr>
<td>Name</td>
<td>:</td>
<td><input name="name" type="text" id="name" size="30"></td>
</tr>
<tr>
<td>Gender</td>
<td>:</td>
<td><input type=radio name="gender" value="Male">Male<input type=radio name="gender" value="Female">Female</td>
</tr>
<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email_id" type="text" id="email_id" size="30"></td>
</tr>
<tr>
<td>Branch Id</td>
<td>:</td>
<td><input name="branch_id" type="text" id="branch_id" size="30"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password" size="30"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> &nbsp;
<input type="reset" name="Reset" value="Reset"></td>
</tr>
</table></center>
</form></td>
</tr>
</table><br><br><br><br><br><br><br><br><br><br>
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