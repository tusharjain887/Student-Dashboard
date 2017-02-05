<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="teachers";

$user_id=$_SESSION['teacher_id'];

$sql="SELECT * FROM $tbl_name WHERE teacher_id ='$user_id'";

$result=mysql_query($sql);
if (false === $result) {
    echo mysql_error();
}
$rows=mysql_fetch_array($result);

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
<script type="text/javascript">
function validateForm()
{
var x2=document.forms["form1"]["email_id"].value;
var atpos=x2.indexOf("@");
var dotpos=x2.lastIndexOf(".");
var alpha="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
var digits="0123456789";
	var temp;
if (
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
<td><form name="form1" method="post" action="updatefinal.php" onsubmit="return validateForm()">
<table width="450" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong><br>Personal Details<br></strong></td>
</tr>
<tr>
<td width="200">Id no</td>
<td width="45">:</td>
<td width="205"><input name="teacher_id" type="text" id="teacher_id" size="30" value="<? echo $rows['teacher_id']; ?>" readonly></td>
</tr>
<tr>
<td width="200">Name</td>
<td width="45">:</td>
<td width="205"><input name="name" type="text" id="name" size="30" value="<? echo $rows['name']; ?>" readonly></td>
</tr>
<tr>
<td width="200">Gender</td>
<td width="45">:</td>
<td width="205"><input name="gender" type="text" id="gender" size="30" value="<? echo $rows['gender']; ?>" readonly></td>
</tr>
<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email_id" type="text" id="email_id" size="30" value="<? echo $rows['email_id']; ?>"></td>
</tr>
<tr>
<td><br><br></td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"> &nbsp;
<input type="reset" name="Reset" value="Reset"></td>
</tr>
</table></center>
</form></td>
</tr>
</table>
<br><br><br><center><a href="updatepwd.php">Change Password</a></center>
</div></div>
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