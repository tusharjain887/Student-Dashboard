<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="forum_topics";
if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
if(isset($_SESSION['admin_id']))
{$user_id=$_SESSION['admin_id'];
}

// table name 
$tbl_name1="categories";

// get data that sent from form 
$hash=$_POST['hash'];
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];
$datetime=date("d/m/y h:i:s"); //create date time

// Find highest answer number. 
$sql1="SELECT MAX(no_of_topics) AS Maxa_id FROM $tbl_name1 WHERE category_id='$category_id'";
$result1=mysql_query($sql1);
$rows1=mysql_fetch_array($result1);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows1) {
$Max_id = $rows1['Maxa_id']+1;
}
else {
$Max_id = 1;
}

$sql="INSERT INTO $tbl_name(category_id,topic_name, topic_detail, user_id, user_name, datetime, last_posted_by)VALUES('$category_id','$topic', '$detail', '$user_id', '$name' , '$datetime','$name')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
$sql2="UPDATE  $tbl_name1 SET  no_of_topics =  '$Max_id' WHERE  category_id ='$category_id'";
$result2=mysql_query($sql2);
header("location:view_category.php?category_id=$category_id&hash=$hash&category_name=$category_name");
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