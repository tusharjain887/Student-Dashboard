<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');

if(isset($_SESSION['student_id'])){
$user_id=$_SESSION['student_id'];
// table name 
$tbl_name1="users";

// values sent from form 
$email=$_POST['email_id'];

if($email!=""){
$sql="UPDATE  $tbl_name1 SET  email_id =  '$email' WHERE  student_id='$user_id'";
$result=mysql_query($sql);
header("location:spupdate.php");
}
else
{
header("location:error.php");
}
}
else
{
$tbl_name="teachers";
$user_id=$_SESSION['teacher_id'];

//values sent from form 
$email=$_POST['email_id'];
if($email!=""){
$sql="UPDATE  $tbl_name SET  email_id =  '$email' WHERE  teacher_id='$user_id'";
$result=mysql_query($sql);
header("location:tpupdate.php");
}
else
{
header("location:error.php");
}
}

// Close connection
mysql_close();
}
else
{
header("location:login.php");
}
?>