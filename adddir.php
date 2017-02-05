<?php
$direc = $_POST['direc'];
$leadon = $_POST['leadon'];
$dir = $_POST['dir'];
mkdir($leadon."\\".$direc , 0777);
$thisdir=getcwd();
echo $thisdir;
$loc=$thisdir."\\".dirlist.php;
header("Location:dirlist.php?dir=$dir");
?>