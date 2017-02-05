<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');
$name=$_SESSION['name'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Profile</title>
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
<div id="profile"><b><? echo $name ?></b>,<a href="logout.php">Logout</a></div>
<img src="banner-vjti.jpg"></img>
<div id="loginheading">STUDENT DASHBOARD</div>

<ul id="menu-bar">
 <li><a href="loginhome.php">Home</a></li>
 <li><a href="loginevents.php?page=1">Events</a></li>
<li><a href="courses.php">Courses</a></li>
 <li><a href="webmail/index.php" target="_blank">Emails</a></li>
 <li><a href="dirlist.php">Documents</a></li>
 <li><a href="blog.php?page=1">Blog</a></li>
 <li><a href="forum.php">Forum</a></li>
</ul>
</div>

<div id="site_content">
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
<div class="generalbox">
<br>
<div class="subheading"><p>Update Details</p></div>
<div class="lform">
</center>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1" method="post" action="editpwd.php" onsubmit="return validateForm()">
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
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> &nbsp;
<input type="reset" name="Reset" value="Reset"></td>
</tr>
</table></center>
</form></td>
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