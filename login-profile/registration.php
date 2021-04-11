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

$create = "create table profiles(name varchar(255) NOT NULL,password varchar(255) NOT NULL,email varchar(255) NOT NULL,role varchar(255), PRIMARY KEY(email))";
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
elseif ($name=='') {
    echo "<h3 style='font-family:Segoe UI;'>Cannot create user without name!!</h3>";
    // echo "alert('Enter valid email, name, password!!')";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
elseif ($email=='') {
    echo "<h3 style='font-family:Segoe UI;'>Cannot create user without Email ID!!</h3>";
    // echo "alert('Enter valid email, name, password!!')";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
elseif ($pass=='') {
    echo "<h3 style='font-family:Segoe UI;'>Cannot create user without password!!</h3>";
    // echo "alert('Enter valid email, name, password!!')";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
else{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        echo "<h3 style='font-family:Segoe UI;'>Invalid Email enterred!!</h3>";
        echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
    }
    else{
        $reg = "insert into profiles(name, password, email, role) values ('$name','$pass','$email','$role')";
        mysqli_query($con,$reg);
        echo "<h3 style='font-family:Segoe UI;'>Registration successful</h3><h4 style='font-family:Segoe UI;'>Login again!</h4>";
        echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
    }
}

?>
