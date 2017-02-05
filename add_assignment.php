<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
include('config.php');
$teacher_id=$_SESSION['teacher_id'];
$startdir =$_SESSION['diroo'];
echo $startdir;
$target = $startdir."/assignmentuploads/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 

// table name 
$tbl_name="course_assignments";

$filename=basename( $_FILES['uploaded']['name']) ;
echo $filename;
 $ok=1; 

if ($ok==0) 
 { 
 Echo "Sorry your file was not uploaded"; 
 } 
 
 //If everything is ok we try to upload it 
 else 
 { 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 { 
 echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded"; 
 } 
 else 
 { 
 echo "Sorry, there was a problem uploading your file."; 
 } 
 } 

// Get value of id that sent from hidden field 
$course_id=$_POST['course_id'];
$hash=$_POST['hash'];

// Find highest answer number. 
$sql="SELECT MAX(assignment_id) AS Maxa_id FROM $tbl_name WHERE course_id='$course_id'";
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
$name=$_POST['name']; 
$deadline=$_POST['deadline']; 
$subtype=$_POST['subtype'];
$sublink=$_POST['suburl'];
$suburl=$teacher_id."/".$sublink; 
echo str_replace("/","\\",$suburl);
$datetime=date("d/m/y H:i:s"); // create date and time
if($name!="" || $deadline!="" || $subtype!=""){
// Insert answer 
$sql2="INSERT INTO $tbl_name(course_id, assignment_id, assignment_name, assignment_date, deadline_date, submit_type,submit_url,filename)VALUES('$course_id','$Max_id', '$name','$datetime','$deadline','$subtype','$suburl','$filename')";
$result2=mysql_query($sql2);

$tbl_name4="courses";
$sql4="SELECT * FROM $tbl_name4 WHERE course_id ='$course_id'";
$result4=mysql_query($sql4);
$rows4=mysql_fetch_array($result4);
$class_id=$rows4['class_id'];

if($result2){
echo "Successful<BR>";
$page_file_temp = $_SERVER["PHP_SELF"];
$page_directory = dirname($page_file_temp);
echo $page_directory;
$tbl_name3="users";
$tbl_name5="registered_students";

$sql = "SELECT a.student_id,a.email_id
        FROM $tbl_name3 a, $tbl_name5 b
        WHERE a.student_id = b.student_id AND a.class_id ='$class_id' AND b.activate_email='yes'";

$result3 = mysql_query($sql);
while($rows=mysql_fetch_array($result3)){
// ---------------- SEND MAIL FORM ----------------
// send e-mail to ...
$to=$rows['email_id'];

// Your subject
$subject="New Class Assignment";

// From
$header="From: postmaster@localhost";

// Your message
$message="New Class Assignment \r\n";
$message.="$course_id \r\n";
$message.="$name \r\n";
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
header("location:view_course.php?course_id=$course_id&hash=$hash");
}
else {
header("location:error.php");
}
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