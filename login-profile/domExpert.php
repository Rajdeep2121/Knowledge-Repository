<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$email = $_SESSION['email'];
$s = "select * from profiles where email='$email'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
$role = 'domain expert';
if($num==1){
    $_SESSION['role']=$role;
    $s1 = "update profiles set role='$role' where email='$email'";
    $result1 = mysqli_query($con, $s1);  
    header('location:../profile/profile.php');
}
else{
echo "<h3 style='font-family:Segoe UI;'>Login Error</h3>";
echo "<script>setTimeout(\"location.href = '../profile/profile.php';\",1500);</script>";
}
?>