<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');
// $email = $_POST['email'];
$email = $_SESSION['email'];
$s = "select * from profiles where email='$email'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
$role = 'domain expert';
if($num==1){
    // $row = mysqli_fetch_array($result);
    // $_SESSION['name']=$row['name'];
    // $_SESSION['role']=$row['role'];
    // $_SESSION['logged_in']=true;
    $_SESSION['role']=$role;
    $s1 = "update profiles set role='$role' where email='$email'";
    $result1 = mysqli_query($con, $s1);  
    header('location:profile.php');
}
else{
echo "<h3 style='font-family:Segoe UI;'>Login Error</h3>";
echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
?>