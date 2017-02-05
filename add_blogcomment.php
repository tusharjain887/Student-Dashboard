<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="blog_comments";

if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
}
else if(isset($_SESSION['teacher_id']))
{$user_id=$_SESSION['teacher_id'];
}
else
{$user_id=$_SESSION['admin_id'];
}
// Get value of id that sent from hidden field 
$article_id=$_POST['article_id'];
$hash=$_POST['hash'];
// Find highest answer number. 
$sql="SELECT MAX(comment_id) AS Maxa_id FROM $tbl_name WHERE article_id='$article_id'";
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
$comment=$_POST['comment']; 

$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer 
$sql2="INSERT INTO $tbl_name(article_id, comment_id, comment_content,user_id,user_name,datetime)VALUES('$article_id','$Max_id', 
'$comment','$user_id','$name','$datetime')";
$result2=mysql_query($sql2);

if($result2){

// If added new answer, add value +1 in reply column 
$tbl_name2="blog_articles";
$sql3="UPDATE $tbl_name2 SET comments='$Max_id' WHERE article_id='$article_id'";
$result3=mysql_query($sql3);
echo "Successful<BR>";
header("location:view_article.php?article_id=$article_id&hash=$hash");
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