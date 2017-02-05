<?php
session_start();

if(isset($_SESSION['admin_id']))
{

$name=$_SESSION['name'];
include('config.php');

$tbl_name1="resources";

if($_POST['rtopic']){
$rtopic=$_POST['rtopic']; 
$rdetail=$_POST['rdetail'];
$rtype=$_POST['type'];
$datetime=date("d/m/y H:i:s"); // create date and time 

$sql1="INSERT INTO $tbl_name1(resource_topic, resource_type , resource_content,datetime)VALUES('$rtopic','$rtype','$rdetail','$datetime')";
$result1=mysql_query($sql1);

if($result1){
header("location:addresources.php");
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
header("location:login.php");
}
?>