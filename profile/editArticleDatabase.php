<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

// echo $link;
$name = $_SESSION['edit_artname']; 
$id = $_SESSION['edit_artid']; 
$img = $_SESSION['edit_artimg']; 
$desc= mysqli_real_escape_string($con, $_POST['artdesc']);
$approved= 0;

$q2 = "update articles set approved='$approved', description='$desc' where id='$id'";
$result2 = mysqli_query($con,$q2);
// echo $id.$desc.$result2;


echo "<h3 style='font-family:Segoe UI;'>Edited Article Submitted for Review</h3>";
echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
?>