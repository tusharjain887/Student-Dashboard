<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sign Up</title>
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
var x1=document.forms["form1"]["student_id"].value;
var x2=document.forms["form1"]["email_id"].value;
var z=document.forms["form1"]["password"].value;
var a=document.forms["form1"]["confirmpassword"].value;

var atpos=x2.indexOf("@");
var dotpos=x2.lastIndexOf(".");
var alpha="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
var digits="0123456789";
	var temp;
if (
x1==null || x1=="" ||
x2==null || x2=="" || 
z==null || z=="" ||
a==null || a=="" )
{
alert("Please fill all the details");
return false;
}
else
{

//check Password match
 if(z!=a)
 {alert("Password Mismatch");
 return false;}

 
}
}
</script>
</head>

<body>

<div id="main">
<div id="vert">

<div id="header">
<img src="banner-vjti.jpg"></img>
<div id="heading">STUDENT DASHBOARD</div>

<ul id="menu-bar">
 <li><a href="index.php">Home</a></li>
 <li><a href="news.php">News</a></li>
 <li><a href="events.php">Events</a></li>
 <li><a href="map.html">Map</a></li>
 <li><a href="images.php">Images</a></li>
 <li><a href="videos.php?page=1">Videos</a></li>
 <li><a href="links.php">Resources</a></li>
</ul>
</div>

<div id="site_content">
<div class="sidebar_container">       
		<div class="sidebar">
          
        </div><!--close sidebar-->     		
       </div><!--close sidebar_container-->	
		   
      <div id="content">
        <div class="content_item">
<div class="generalbox"><br>
<div class="subheading"><p>Sign Up</p></div><br>
</center>
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><form name="form1" method="post" action="signup_ac.php" onsubmit="return validateForm()">
<table width="450" border="0" cellspacing="4" cellpadding="0">
<tr>
<td colspan="3"><strong><br>Sign Up<br></strong></td>
</tr>
<tr>
<td width="200">Id no</td>
<td width="45">:</td>
<td width="205"><input name="student_id" type="text" id="student_id" size="30"></td>
</tr>
<tr>
<td>E-mail</td>
<td>:</td>
<td><input name="email_id" type="text" id="email_id" size="30"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="password" size="30"></td>
</tr>
<tr>
<td>Confirm Password</td>
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
</table><br><br><br><br><br><br><br><br><br><br></div>
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
</p>
</div>
</div>
</body>
</html>