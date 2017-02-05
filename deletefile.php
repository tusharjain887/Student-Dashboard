<?php
$delfile = $_POST['direc'];
unlink($delfile);
$dir = $_POST['dir'];
header("Location:dirlist.php?dir=$dir");
?>