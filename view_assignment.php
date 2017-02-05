<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
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
$tbl_name="course_assignments"; 
$tbl_name1="submission"; 

$course_id=$_GET['course_id'];
$assignment_id=$_GET['assignment_id'];
$secret = 'MySecretWords';
$hash=$_REQUEST['hash'];
if (md5($secret . $course_id) ==$hash) {
  //no tampering detected, proceed with other processing
} else {
  echo " tamper";
 header("location:loginhome.php"); 
} 
$sql="SELECT * FROM $tbl_name WHERE course_id='$course_id' AND assignment_id='$assignment_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

$tbl_name2="courses";
$sql3="SELECT * FROM $tbl_name2 WHERE course_id='$course_id'";
$result3=mysql_query($sql3);
$rows3=mysql_fetch_array($result3); 
$teacher_id=$rows3['teacher_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View Assignment</title>
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
<div class="subheading"><p>View Assignment</p></div>
<div class="lform">
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%" bgcolor="#F8F7F1"><strong>Name : </strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><? echo $rows['assignment_name']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Posted</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['assignment_date']; ?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Deadline</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1">
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editassigndeadline"><? echo $rows['deadline_date']; ?> </div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editassigndeadline','edit/editassigndeadline.php?course_id=<? echo $rows['course_id']; ?>&assignment_id=<? echo $rows['assignment_id']; ?>',{
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
echo $rows['deadline_date'];
}
?>
</td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong>Submit</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><? echo $rows['submit_type']; ?>
<?php
if(isset($_SESSION['teacher_id'])){
?>
<div id="editassignfile"><? echo $rows['filename']; ?></div>
<a href="download.php?filename=<? echo $rows['filename']; ?>&teacher_id=<? echo $teacher_id ?>" class="links"><? echo $rows['filename']; ?></a> 
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editassignfile','edit/editassignfile.php?course_id=<? echo $rows['course_id']; ?>&assignment_id=<? echo $rows['assignment_id']; ?>',{
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
?>
<a href="download.php?filename=<? echo $rows['filename']; ?>&teacher_id=<? echo $teacher_id ?>" class="links"><? echo $rows['filename']; ?></a>
<?php
}
?>
</td>
</tr>
<?php
if(isset($_SESSION['teacher_id'])){
?>
<tr>
<td bgcolor="#F8F7F1"><strong>Submit Url</strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1">
<div id="editassignurl"><? echo $rows['submit_url']; ?></div>
<script type="text/javascript">
new Ajax.InPlaceEditor(
'editassignurl','edit/editassignurl.php?course_id=<? echo $rows['course_id']; ?>&assignment_id=<? echo $rows['assignment_id']; ?>',{
okText: 'Update',
cancelText: 'Cancel',
highlightColor:'#E2F1B1',
clickToEditText: 'Click me to edit',
loadingText: 'Loading..',
savingText: 'Saving..'}
);
</script>
</td>
</tr>
</table></td>
</tr>
</table><br>
<form action="import.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Upload Marks :<br>
<b>CSV format : Column 1-Student Id nos  &nbsp&nbsp&nbsp  Column 2-Their corresponding marks<br><b>
  <input name="csv" type="file" id="csv" /> <br>
  <input type="hidden" name="course_id" value="<? echo $course_id ?>" /> 
  <input type="hidden" name="assignment_id" value="<? echo $assignment_id ?>" /> 
  <center><input type="submit" name="Submit" value="Submit" /></center> <br><br>
</form> 
<form id="form" name="form" method="post" action="deletecontent.php">
<input type="hidden" name="course" value="<? echo $course_id ?>" />
<input type="hidden" name="assignment_id" value="<? echo $assignment_id ?>" />
<input type="hidden" name="hash" value="<? echo $hash ?>" />
<input type="submit" name="Submit" value="Delete Assignment" />
</form>
<?php
}
else if(isset($_SESSION['student_id']))
{
?>
</table></td>
</tr>
</table><br>
<?php
 $sql2="SELECT grade FROM $tbl_name1 WHERE course_id='$course_id' AND assignment_id='$assignment_id' AND student_id='$user_id'";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2);
if($rows2['grade']=="" && $rows['submit_type']=="Online"){
?>
 <form action="uploadsubmitfile.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
 <tr>
 <td><strong>Submit Assignment 1 ( file)</strong></td>
 </tr>
 <tr>
 <td>Select file 
<input name="uploaded" type="file" id="uploaded" size="50" />
<input name="url" type="hidden" id="url" value="<? echo $rows['submit_url']; ?>" /></td>
 </tr>
 <tr>
 <td align="center"><input type="submit" name="Submit" value="Upload" /></td>
 </tr>
 </table>
 </td>
 </form> 
<?php
}
else
{ 
?>
Marks   :    
<?php
echo $rows2['grade'] ;
}
}
?>
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