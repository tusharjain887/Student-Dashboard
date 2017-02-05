<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sign Up AC</title>
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
<div class="generalbox"><br><br><br>
<?php

include('config.php');

// table name 
$tbl_name1="users";
$tbl_name2="temp_users";
$tbl_name3="registered_students";

// values sent from form 
$student_id=$_POST['student_id'];
$email=$_POST['email_id'];
$password=$_POST['password'];

$sql3="SELECT * FROM $tbl_name3 WHERE student_id ='$student_id'";
$result3=mysql_query($sql3);
$count=mysql_num_rows($result3);

if($count==0){
// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name1 WHERE student_id ='$student_id'";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){
$page_file_temp = $_SERVER["PHP_SELF"];
$page_directory = dirname($page_file_temp);
$rows=mysql_fetch_array($result1);
if($student_id==$rows['student_id'] && $email==$rows['email_id'])
{
// Random confirmation code 
$confirm_code=md5(uniqid(rand())); 

// Insert data into database 
$sql="INSERT INTO $tbl_name2(confirm_code, student_id, email_id, password)VALUES('$confirm_code', '$student_id', '$email', '$password')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
if($result){
// ---------------- SEND MAIL FORM ----------------

// send e-mail to ...
$to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="From: postmaster@localhost";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="http://localhost$page_directory/signup_confirm.php?passkey=$confirm_code";

// send email
$sentmail = mail($to,$subject,$message,$header);
}

// if not found 
else {
header("location:error.php");
}

// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
?>
<a href="http://localhost/webmail/webmail.php">Enter your email id to activate</a>
<?php
}
else {
header:("location:error.php");
}
}
else
{echo "Wrong Email or Id no";
}
}
else
{echo "Wrong Email or Id no";
}
}
else
{echo "You have already registered yourself";
}
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
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