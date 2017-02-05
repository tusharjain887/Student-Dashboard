<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="forum_replies";

if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
if(isset($_SESSION['admin_id']))
{$user_id=$_SESSION['admin_id'];
}

// Get value of id that sent from hidden field 
$topic_id=$_POST['topic_id'];
$category_id=$_POST['category_id'];
$category_name=$_POST['category_name'];
$hash=$_POST['hash'];

// Find highest answer number. 
$sql="SELECT MAX(reply_id) AS Maxa_id FROM $tbl_name WHERE topic_id='$topic_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form 
$reply=$_POST['reply']; 

$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer 
$sql2="INSERT INTO $tbl_name(topic_id, reply_id, reply_content,user_id,user_name,datetime)VALUES('$topic_id','$Max_id', 
'$reply','$user_id','$name','$datetime')";
$result2=mysql_query($sql2);

if($result2){
// If added new answer, add value +1 in reply column 
$tbl_name2="forum_topics";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE topic_id='$topic_id'";
$result3=mysql_query($sql3);

$sql4="UPDATE $tbl_name2 SET last_posted_by='$name' WHERE topic_id='$topic_id' AND category_id='$category_id'";
$result4=mysql_query($sql4);

header("location:view_topic.php?category_id=$category_id&hash=$hash&category_name=$category_name&topic_id=$topic_id");
}
else {
echo "ERROR";
}

// Close connection
mysql_close();
}
else
{
header("location:login.php");
}
?>