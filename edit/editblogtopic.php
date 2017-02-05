<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']) || isset($_SESSION['admin_id']))
{
include('config.php');

// table name 
$tbl_name="blog_articles";

if(isset($_POST['value'])){
$article_id= $_GET['article_id'];
$newText= $_POST['value'];
echo $newText;
$sql="UPDATE  $tbl_name SET  article_name =  '$newText' WHERE  article_id='$article_id'";
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