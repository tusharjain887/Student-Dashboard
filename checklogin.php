<?php

include('config.php');

// table name 
$tbl_name="registered_students";

// username and password sent from form 
$student_id=$_POST['student_id']; 
$password=$_POST['password']; 

$sql="SELECT * FROM $tbl_name WHERE student_id='$student_id' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$rows=mysql_fetch_array($result);

$tbl_name1="users";
$sql1="SELECT * FROM $tbl_name1 WHERE student_id='$student_id'";
$result1=mysql_query($sql1);
$rows1=mysql_fetch_array($result1);
$name=$rows1['name'];
$class_id=$rows1['class_id'];
$tbl_name2="class";
$sql2="SELECT * FROM $tbl_name2 WHERE class_id='$class_id'";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2);
$tag=$rows2['class_name'];
$thisdir = getcwd(); 
$diroo=$thisdir."\\filemanager\Students\\".$student_id;
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("student_id");
session_register("name"); 
session_register("diroo");
session_register("tag");
header("location:loginhome.php");
}
else {
header("location:error.php");
}
?>