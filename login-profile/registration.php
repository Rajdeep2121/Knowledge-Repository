<?php
session_start();
$con = mysqli_connect('localhost','root','');

$createdb = "create database userprofiles";
if($con->query($createdb) === TRUE){
    echo "";
}
else{
    echo "";
}

mysqli_select_db($con,'userprofiles');

$create = "create table profiles(name varchar(255),password varchar(255),email varchar(255),role varchar(255), PRIMARY KEY(email))";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}


$email = $_POST['email'];
$pass = $_POST['password'];
$name = $_POST['name'];
$role = 'contributor';
$s = "select * from profiles where email='$email'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    echo "<h3 style='font-family:Segoe UI;'>Email already exists</h3>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
else{
    $reg = "insert into profiles(name, password, email, role) values ('$name','$pass','$email','$role')";
    mysqli_query($con,$reg);
    echo "<h3 style='font-family:Segoe UI;'>Registration successful</h3><h4 style='font-family:Segoe UI;'>Login again!</h4>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}

?>
