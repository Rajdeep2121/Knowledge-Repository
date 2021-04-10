<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$create = "create table articles(id int NOT NULL, name varchar(255), image mediumtext, description longtext, approved int, PRIMARY KEY (id)";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}
$name = $_POST['artname'];

$result = mysqli_query($con, "SELECT * FROM articles where name='$name'");
$num = mysqli_num_rows($result);
if($num==0){
    echo "<h3 style='font-family:Segoe UI;'>No Article found</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
else{
    $reg = "delete from articles where name='$name'";
    $result1 = mysqli_query($con,$reg);
    echo $result1 ;
    echo "<h3 style='font-family:Segoe UI;'>Article Deleted <i class='fa fa-minus-circle' aria-hidden='true'></i></h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}