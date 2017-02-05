<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="blog_articles";
if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
else if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
else
{$user_id=$_SESSION['admin_id'];
}
echo $user_id;
// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$datetime=date("d/m/y h:i:s"); //create date time
echo $topic;
$sql="INSERT INTO $tbl_name(article_name,article_detail, user_id, user_name, datetime)VALUES('$topic', '$detail', '$user_id', '$name','$datetime')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
header("location:blog.php?page=1");
}
else {
header("location:error.php");
}
mysql_close();
}
else
{
header("location:login.php");
}
?>