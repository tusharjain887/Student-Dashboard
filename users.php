<?php
session_start();

if(isset($_SESSION['admin_id']))
{
$name=$_SESSION['name'];
include('config.php');

// table name 
$tbl_name="class";
$tbl_name1="teachers";

$sql1="SELECT * FROM $tbl_name";
$result1=mysql_query($sql1);

$sql2="SELECT DISTINCT branch_id FROM $tbl_name1";
$result2=mysql_query($sql2);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Users</title>
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
<script type='text/javascript'>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type='text/javascript'>
function showUse(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q=&t="+str,true);
xmlhttp.send();
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
<div class="subheading"><p>Students</p></div>
<br><center>
<a href="addstudents.php">Add A New Student To The Record</a><br><br>
<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a class:</option>
<?php
while($rows1=mysql_fetch_array($result1)){
?>
<option value="<? echo $rows1['class_id']; ?>"><? echo $rows1['class_name']; ?></option>
<?php
}
?>
</select>
</form>
<div id="txtHint"><b>Registered Students info will be listed here.</b></div>
<br><br>
<br>
<div class="subheading"><p>Teachers</p></div>
<br><a href="addteachers.php">Add A New Teacher To The Record</a><br><br>
<form>
<select name="users" onchange="showUse(this.value)">
<option value="">Select branch id:</option><br>
<?php
while($rows2 = mysql_fetch_array($result2)){
?>
<option value="<? echo $rows2['branch_id']; ?>"><? echo $rows2['branch_id']; ?></option>
<?php
}
?>
</select>
</form>
<div id="txtHint1"><b>Teacher info will be listed here.</b></div>
<br><br><br><br><br><br><br>
<?php
mysql_close();
?>

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