<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="blog_articles";
 if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
else if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
else
{$user_id=$_SESSION['admin_id'];
}

$sql = "SELECT * FROM $tbl_name WHERE user_id='$user_id'";
$result = mysql_query($sql);
if (false === $result) {
echo mysql_error();
 }
		
?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>My Articles</title>
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
<div class="subheading"><p>My Articles</p></div>
<div class="lform">
<?php
// Start looping table row
while($rows=mysql_fetch_array($result)){
$secret = 'MySecretWords';
$article_id = $rows['article_id'];
$hash = md5($secret . $article_id);
?>
<p><a href="view_article.php?article_id=<? echo $rows['article_id']; ?>&hash=<? echo $hash ?>"><? echo $rows['article_name']; ?></a></p>
<center><b>
<?php
$adetail=substr($rows['article_detail'],0,50); 
echo $adetail;
 ?>
</center></b><br><br>
Posted by <? echo $rows['user_name']; ?>,<? echo $rows['datetime']; ?><br><br>
<?php
if($user_id==$rows['user_id'] || isset($_SESSION['admin_id'])){
?>
<form id="form1" name="form1" method="post" action="deletecontent.php">
<input type="hidden" name="article_id" value="<? echo $rows['article_id']; ?>" />
<input type="hidden" name="page" value="<? echo $page; ?>" />
<input type="submit" name="Submit" value="Delete" />
</form>
<?php
}
?>
<hr><br>
<?php
// Exit looping and close connection 
}
mysql_close();
?>
<br>
<a href="create_article.php"><strong>Create New Article</strong> </a>
</div></div>
        </div><!--close content_item-->
      </div><!--close content-->  

</div>

<div id="footer">
<a href="#">About This Website</a>
<hr width="1010">
<p>Copyright � 2012 VJTI. All Rights Reserved.</p>
<p><a href="#">VJTI</a>&nbsp&nbsp&nbsp&nbsp<a href="#">Contacts</a>&nbsp&nbsp&nbsp&nbsp<a href="#">Privacy</a> 
</p>
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