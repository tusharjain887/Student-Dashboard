<?php
session_start();

if(isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');
// table name 
$tbl_name="users";
$student_id=$_POST['student_id']; 
$name=$_POST['name'];
$gender=$_POST['gender'];
$email_id=$_POST['email_id'];
$class_id=$_POST['class_id'];
$sql="INSERT INTO $tbl_name(student_id,name,gender,email_id,class_id)VALUES('$student_id', '$name','$gender','$email_id','$class_id')";
$result=mysql_query($sql);
if($result){
header("location:users.php");
}
else {
header("location:error.php");
}
mysql_close();
}
else
{
header("location:index.php");
}
?>