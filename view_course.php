<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="courses";

$course_id=$_GET['course_id'];
$secret = 'MySecretWords';
$hash=$_REQUEST['hash'];
if (md5($secret . $course_id) ==$hash) {
  //no tampering detected, proceed with other processing
} else {
  echo " tamper";
  header("location:loginhome.php");
} 
$sql="SELECT * FROM $tbl_name WHERE course_id='$course_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View Course</title>
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
var x1=document.forms["form1"]["name"].value;
var x2=document.forms["form1"]["deadline"].value;
var x3=document.forms["form1"]["subtype"].value;

if (x1==null || x1=="")
{
alert("Please fill all the details");
return false;
}
if (x2==null || x2=="")
{
alert("Please fill all the details");
return false;
}
if (x3==null || x3=="")
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
<div class="subheading"><p>View Course</p></div>
<div class="lform">
<center>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="1">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
<td bgcolor="#F8F7F1"><strong>  
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editcourseid"><? echo $rows['course_id']; ?> </div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editcourseid','edit/editcourseid.php?course_id=<? echo $rows['course_id']; ?>',{
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
echo $rows['course_id']; 
}
?>
</strong></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editcoursename"><? echo $rows['course_name']; ?> </div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editcoursename','edit/editcoursename.php?topic_id=<? echo $rows['course_id']; ?>',{
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
echo $rows['course_name']; 
}
?>
</strong></td>
</tr>

<tr>
<?php
$tbl_name3="teachers"; // Switch to table 
$sql3="SELECT * FROM $tbl_name3 WHERE teacher_id='$rows[teacher_id]'";
$result3=mysql_query($sql3);
$rows3=mysql_fetch_array($result3);
?>
<td bgcolor="#F8F7F1"><? echo $rows3['name']; ?></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editcoursecredit"><? echo $rows['course_credits']; ?> </div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editcoursecredit','edit/editcoursecredit.php?course_id=<? echo $rows['course_id']; ?>',{
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
echo $rows['course_credits']; 
}
?>
</strong></td>
</tr>

<tr>
<td bgcolor="#F8F7F1"><strong>
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editcoursetype"><? echo $rows['course_type']; ?> </div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editcoursetype','edit/editcoursetype.php?course_id=<? echo $rows['course_id']; ?>',{
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
echo $rows['course_type']; 
}
?>
</strong></td>
</tr>
<tr><td><?php
if(isset($_SESSION['teacher_id'])){
?>
<center><br><form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="course_id" value="<? echo $rows['course_id']; ?>" />
<input type="hidden" name="hash" value="<? echo $hash ?>" />
<input type="submit" name="Submit" value="Delete Course" /></center><br>
</form>
<?php
}
?></td></tr>
</table></td>
</tr>
</table>
<BR>
<div class="subheading"><p>Course Assignments</p></div>
<?php
$tbl_name2="course_assignments"; // Switch to table 
$sql2="SELECT * FROM $tbl_name2 WHERE course_id='$course_id' ORDER BY assignment_id DESC";
$result2=mysql_query($sql2);
while($rows2=mysql_fetch_array($result2)){
$secret1 = 'MySecretWords';
$hash1 = md5($secret . $course_id);
?>

<table width="500" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td><a href="view_assignment.php?course_id=<? echo $course_id ?>&hash=<? echo $hash1 ?>&assignment_id=<? echo $rows2['assignment_id']; ?>"><center><? echo $rows2['assignment_name']; ?></center></td>
</tr>
</table></td>
</tr>
</table><br>

<?php
}

mysql_close();
if(isset($_SESSION['teacher_id'])){
?>

<BR>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" enctype="multipart/form-data" method="post" action="add_assignment.php">
<td>
<table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong><br><br>Name</strong></td>
<td valign="top"><br><br>:</td>
<td><br><br><textarea name="name" cols="50" rows="4" id="name"></textarea><br><br></td>
</tr>
<tr>
<td valign="top"><strong>Deadline Date</strong></td>
<td valign="top">:</td>
<td><input type="text" name="deadline" size="45" id="deadline" /><br><br></td>
</tr>
<tr>
<td valign="top"><strong>Submit Type</strong></td>
<td valign="top">:</td>
<td><input type=radio name="subtype" value="Online">Online<input type=radio name="subtype" value="Offline">Offline<br><br></td>
</tr>
<tr>
<td valign="top"><strong>Submit Url</strong></td>
<td valign="top">:</td>
<td><input type="text" name="suburl"  size="65" id="suburl" /><br>
eg. folder1/folder2/<br><br></td>
</tr>
<tr>
<td valign="top"><strong>Please choose a file</strong></td>
<td valign="top">:</td>
<td><input name="uploaded" type="file" /><br><br></td>
</tr>
<tr>
<td><input name="hash" type="hidden" value="<? echo $hash; ?>" /></td>
<td><input name="course_id" type="hidden" value="<? echo $course_id; ?>" /></td>
<td>&nbsp </td>
</tr>
<tr>
<td>&nbsp</td>
<td>&nbsp</td>
<td><input type="submit" value=" Add Assignment" /></td>
</tr>
</table></td>
</tr>
</table>
 </form> 
<?php
}
?>
</center></div><br><br><br></div>
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