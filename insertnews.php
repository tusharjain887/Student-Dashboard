<?php
session_start();

if(isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');
// table name 
$tbl_name="general_news";
if($_POST['topic']){
$topic=$_POST['topic']; 
$detail=$_POST['detail'];
$datetime=date("d/m/y H:i:s"); // create date and time 
$sql="INSERT INTO $tbl_name(news_topic, news_content,datetime)VALUES('$topic','$detail','$datetime')";
$result=mysql_query($sql);
if($result){
header("location:addnews.php");
}
else {
header("location:error.php");
}
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