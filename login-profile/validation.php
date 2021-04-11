<?php
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');
$email = $_POST['email'];
$pass = $_POST['password'];
$s = "select * from profiles where email='$email' && password='$pass'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    $row = mysqli_fetch_array($result);
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
    $_SESSION['role']=$row['role'];
    $_SESSION['logged_in']=true;
    header('location:../profile/profile.php');
}
elseif ($email==''){
    echo "<h3 style='font-family: Segoe UI'>Enter valid email!!</h3>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
elseif ($pass==''){
    echo "<h3 style='font-family: Segoe UI'>Enter valid password!!</h3>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
else{
    echo "<h3 style='font-family: Segoe UI'>Login Error</h3>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
?>