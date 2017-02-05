<?php
session_start();

if(isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');

if($_POST['student_id']){
$student_id=$_POST['student_id'];
    $sql="DELETE FROM registered_students WHERE student_id='$student_id'";
    $result=mysql_query($sql) or die("oopsy, error when tryin to delete events 2");
$user_id=$_POST['student_id'];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
$thisdir = getcwd(); 
$deldir=$thisdir."\\filemanager\Students\\".$student_id;
rrmdir($deldir);

if($result){
header("location:users.php");
}
else {
header("location:error.php");
}
}

else if($_POST['teacher_id']){
$teacher_id=$_POST['teacher_id'];
echo $teacher_id;
    $sql2="DELETE FROM teachers WHERE teacher_id='$teacher_id'";
    $result2=mysql_query($sql2) or die("oopsy, error when tryin to delete events 2");

$sql3="DELETE FROM courses WHERE teacher_id='$teacher_id'";
    $result3=mysql_query($sql3) or die("oopsy, error when tryin to delete events 2");
$user_id=$_POST['teacher_id'];
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}
$thisdir = getcwd(); 
$deldir=$thisdir."\\filemanager\Teachers\\".$teacher_id;
rrmdir($deldir);

if($result2){
header("location:users.php");
}
else {
header("location:error.php");
}
}
$sql4="DELETE FROM blog_articles WHERE user_id='$user_id'";
    $result4=mysql_query($sql4) or die("oopsy, error when tryin to delete events 2");
$sql5="DELETE FROM forum_topics WHERE user_id='$user_id'";
    $result5=mysql_query($sql5) or die("oopsy, error when tryin to delete events 2");
$sql6="DELETE FROM events WHERE user_id='$user_id'";
    $result6=mysql_query($sql6) or die("oopsy, error when tryin to delete events 2");
mysql_close();
}
else
{
header("location:index.php");
}
?>