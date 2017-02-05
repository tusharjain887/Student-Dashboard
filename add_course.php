<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
$t_id=$_SESSION['teacher_id'];

include('config.php');

// table name 
$tbl_name="courses";


// values sent from form 
$class_id=$_POST['class_id'];
$course_id=$_POST['course_id'];
$name=$_POST['course_name'];
$credit=$_POST['course_credit'];
$type=$_POST['course_type'];
echo $type;
// Insert data into database 
$sql="INSERT INTO $tbl_name(course_id, class_id, teacher_id, course_name, course_credits, course_type)VALUES('$course_id', '$class_id', '$t_id', '$name','$credit','$type')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email 
if($result){
echo "Activated";
header("location:courses.php");
}
else {
header("location:error.php");
}

}
else
{
header("location:login.php");
}
?>