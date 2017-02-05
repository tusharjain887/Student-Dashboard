<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
include('config.php');

// table name 
$tbl_name="course_assignments";

if(isset($_POST['value'])){
$course_id= $_GET['course_id'];
$assignment_id= $_GET['assignment_id'];
$newText= $_POST['value'];
echo $newText;
$sql="UPDATE  $tbl_name SET  submit_url =  '$newText' WHERE  course_id='$course_id' AND assignment_id='$assignment_id'";
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