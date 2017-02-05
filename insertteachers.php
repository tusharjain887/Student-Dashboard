<?php
session_start();

if(isset($_SESSION['admin_id']))
{
$name=$_SESSION['name'];
include('config.php');
// table name 
$tbl_name="teachers";
$teacher_id=$_POST['teacher_id']; 
$name=$_POST['name'];
$gender=$_POST['gender'];
$email_id=$_POST['email_id'];
$branch_id=$_POST['branch_id'];
$password=$_POST['password'];
$sql="INSERT INTO $tbl_name(teacher_id,name,gender,email_id,branch_id,password)VALUES('$teacher_id', '$name','$gender','$email_id','$branch_id','$password')";
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