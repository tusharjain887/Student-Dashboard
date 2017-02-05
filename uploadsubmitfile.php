<?php
session_start();

if(isset($_SESSION['student_id']))
{
include('config.php');

$thisdir = getcwd(); 
$target=$_POST['url'];
echo $target; 
 $target = $thisdir."\\filemanager\Teachers\\".str_replace("/","\\",$target) . basename( $_FILES['uploaded']['name']) ; 
echo $target; 
$filename=basename( $_FILES['uploaded']['name']) ;
echo $filename;
 $ok=1; 

if ($ok==0) 
 { 
 Echo "Sorry your file was not uploaded";
header("location:error.php"); 
 } 
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
 header("location:courses.php"); 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
header("location:error.php");
 } 
 } 

// Close connection
mysql_close();
}
else
{
header("location:index.php");
}
?>