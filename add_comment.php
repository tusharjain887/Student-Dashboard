<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');
$name=$_SESSION['name'];
if(isset($_SESSION['student_id']))
{$user_id=$_SESSION['student_id'];
$str = "$user_id";
if(strlen($str)==8){
$intr=substr($str,0,4);
}
else {
$intr=substr($str,0,5);
}
$class_id=(int)$intr;
}
else
{
$tbl_name2="teachers";
$user_id=$_SESSION['teacher_id'];
}

// table name 
$tbl_name="event_comments";

// Get value of id that sent from hidden field 
$event_id=$_POST['event_id'];
$hash=$_POST['hash'];

// Find highest answer number. 
$sql="SELECT MAX(event_comment_id) AS Maxa_id FROM $tbl_name WHERE event_id='$event_id'";
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
$a_answer=$_POST['comment']; 

$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer 
$sql2="INSERT INTO $tbl_name(event_id, event_comment_id, event_comment,user_id,user_name,datetime)VALUES('$event_id','$Max_id', 
'$a_answer','$user_id','$name','$datetime')";
$result2=mysql_query($sql2);

if($result2){
echo "Successful<BR>";
header("location:view_event.php?event_id=$event_id&hash=$hash");
}
else {
header("location:error.php");
}

// Close connection
mysql_close();
}
else
{
header("location:login.php");
}
?>