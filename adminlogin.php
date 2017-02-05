<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Admin Login</title>
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
</head>

<body>

<div id="main">
<div id="vert">

<div id="header">
<img src="banner-vjti.jpg"></img>
<div id="heading">STUDENT DASHBOARD</div>


</div>

<div id="site_content">
<div class="sidebar_container">       
		<div class="sidebar">
          
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	
		   
      <div id="content">
        <div class="content_item">
<div class="generalbox">
<div class="subheading"><p> Admin Login</p></div>
</center>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="450" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong><br><center>&nbsp</center><br></strong></td>
</tr>
<tr>
<td width="200">ID no.</td>
<td width="45">:</td>
<td width="205"><input name="admin_id" type="text" id="admin_id" size="30"></td>
</tr>

<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password" size="30"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><br><br><input type="submit" name="Login" value="Login"> &nbsp;</td>
</tr>
</table></center>
</form></td>
</tr>
</table><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
        </div><!--close content_item-->
      </div><!--close content-->  
		   
     <div class="sidebar_container">       
		<div class="sidebar">
    
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	

</div>

<div id="footer">
<a href="aboutus.html">About This Website</a>
<hr width="1010">
<p>Copyright © 2012 VJTI. All Rights Reserved.</p>
</div>
</div>
</body>
</html>
<?php

include('config.php');

// table name 
$tbl_name="admin";

// username and password sent from form 
$admin_id=$_POST['admin_id']; 
$password=$_POST['password']; 

$sql="SELECT * FROM $tbl_name WHERE admin_id='$admin_id' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

$tbl_name1="admin";
$sql1="SELECT * FROM $tbl_name1 WHERE admin_id='$admin_id'";
$result1=mysql_query($sql1);
$rows1=mysql_fetch_array($result1);
$name=$rows1['name'];

$thisdir = getcwd();  
 $diroo=$thisdir."\\filemanager\\";
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("admin_id");
session_register("name"); 
session_register("diroo"); 
header("location:adminhome.php");
}
else {
/*header("location:index.php");*/
}
?>