<?php
session_start();

if(isset($_SESSION['teacher_id']))
{
$name=$_SESSION['name'];  

include('config.php');

// table name 
$tbl_name="submission";
$course_id=$_POST['course_id'];
$assignment_id=$_POST['assignment_id'];
if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            mysql_query("INSERT INTO $tbl_name (course_id, assignment_id, student_id, grade) VALUES
                ( 
	'$course_id',
	'$assignment_id',
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."' 
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: courses.php?'); die; 

}
else
{
header('Location: error.php?'); 
} 
}
else
{
header("location:login.php");
}
?>  


