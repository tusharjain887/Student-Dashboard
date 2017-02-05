<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Sign Up Confirm</title>
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

// Passkey that got from link 
$passkey=$_GET['passkey'];
$tbl_name1="temp_users";

// Retrieve data from table where row that match this passkey 
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried 
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_users"
if($count==1){
 
$rows=mysql_fetch_array($result1);
$id=$rows['student_id'];
$email=$rows['email_id'];
$password=$rows['password']; 
$tbl_name2="registered_students";
// Insert data that retrieves from "temp_users" into table "registered_students" 
$sql2="INSERT INTO $tbl_name2(student_id, password)VALUES('$id', '$password')";
$result2=mysql_query($sql2);

$thisdir = getcwd(); 
mkdir($thisdir."\\filemanager\Students\\".$id , 0777);  

}

// if not found passkey, display message "Wrong Confirmation code" 
else {
echo "Wrong Confirmation code";
}

// if successfully moved data from table"temp_users" to table "registered_students" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_users"
if($result2){

echo "Your account has been activated";
echo "<br><br>";
echo "<center><a href=login.php>Click here to login</a></center>";
// Delete information of this user from table "temp_users" that has this passkey 
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}
else
{echo "Sorry . The activation is not completed";}

}
?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
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