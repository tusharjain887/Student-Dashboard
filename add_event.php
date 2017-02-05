<?php
session_start();

if(isset($_SESSION['student_id']) || isset($_SESSION['teacher_id']))
{
include('config.php');
$name=$_SESSION['name'];
// table name 
$tbl_name="events";

// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];

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
$level=0;
}
else
{
$level=$_POST['level'];
$tbl_name2="teachers";
$user_id=$_SESSION['teacher_id'];
echo $user_id;
$sql2="SELECT * FROM $tbl_name2 WHERE teacher_id ='$user_id'";
$result2=mysql_query($sql2);
$rows2=mysql_fetch_array($result2);
$class_id=$level.$rows2['branch_id'];
}

$sql="INSERT INTO $tbl_name(class_id,user_id,user_name,event_topic, event_detail,event_level)VALUES('$class_id','$user_id','$name','$topic', '$detail','$level')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
$page_file_temp = $_SERVER["PHP_SELF"];
$page_directory = dirname($page_file_temp);
echo $page_directory;
$tbl_name3="users";
$tbl_name5="registered_students";

$sql3 = "SELECT a.student_id,a.email_id
        FROM $tbl_name3 a, $tbl_name5 b
        WHERE a.student_id = b.student_id AND a.class_id ='$class_id' AND b.activate_email='yes'";

$result3 = mysql_query($sql3);
while($rows=mysql_fetch_array($result3)){
// ---------------- SEND MAIL FORM ----------------
// send e-mail to ...
$to=$rows['email_id'];

// Your subject
$subject="New Class Event";

// From
$header="From: postmaster@localhost";

// Your message
$message="New Class Event \r\n";
$message.="$name \r\n";
$message.="$topic \r\n";
$message.="Click on this link to stop receiving mails \r\n";
$message.="http://localhost$page_directory/unsubscribe.php?student_id=$rows[student_id]";

// send email
$sentmail = mail($to,$subject,$message,$header);
}
// if your email succesfully sent
if($sentmail){
echo "Your Confirmation link Has Been Sent To Your Email Address.";
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}
header("location:loginevents.php?page=1");
}
else {
/*header("location:error.php");*/
echo mysql_error();
}
mysql_close();
}
else
{
header("location:index.php");
}
?>