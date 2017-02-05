<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
include('config.php');

// table name 
$tbl_name="courses";

if(isset($_POST['value'])){
$course_id= $_GET['course_id'];
$newText= $_POST['value'];
echo $newText;
$sql="UPDATE  $tbl_name SET  course_name =  '$newText' WHERE  course_id='$course_id'";
$result=mysql_query($sql);
} 
else { 
echo 'Error! Please fill all fileds!';
}
mysql_close();
}
else
{
echo "Please click here to login " . "<a href=login.php>Login Page</a>";
}
?>
?>