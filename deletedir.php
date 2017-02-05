<?php
function rrmdir($dir) { 
  foreach(glob($dir . '/*') as $file) { 
    if(is_dir($file)) rrmdir($file); else unlink($file); 
  } rmdir($dir); 
}

$deldir = $_POST['direcdir'];
echo $deldir;

rrmdir($deldir);
$dir = $_POST['dir'];
header("Location:dirlist.php?dir=$dir");
?>