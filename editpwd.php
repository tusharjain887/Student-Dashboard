<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');

if(isset($_SESSION['student_id'])){
$user_id=$_SESSION['student_id'];
// table name 
$tbl_name1="users";
$tbl_name2="registered_students";

// values sent from form 
$opassword=$_POST['opassword'];
$npassword=$_POST['npassword'];

$sql1="SELECT * FROM $tbl_name2 WHERE student_id =$user_id";
$result1=mysql_query($sql1);
$rows1=mysql_fetch_array($result1);
$password=$rows1['password'];

if($opassword==$password){
$sql2="UPDATE  $tbl_name2 SET  password =  '$npassword' WHERE  student_id='$user_id'";
$result2=mysql_query($sql2);
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
$opassword=$_POST['opassword'];
$npassword=$_POST['npassword'];

$sql1="SELECT * FROM $tbl_name WHERE teacher_id ='$user_id'";
$result1=mysql_query($sql1);
$rows1=mysql_fetch_array($result1);
$password=$rows1['password'];

if($opassword==$password){
$sql2="UPDATE  $tbl_name SET  password =  '$npassword' WHERE  teacher_id='$user_id'";
$result2=mysql_query($sql2);
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