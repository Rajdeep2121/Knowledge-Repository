<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');


// CREATING TABLE IF NOT EXISTS
$create = "create table articles(id int NOT NULL, name varchar(255), image mediumtext, description longtext, approved int, PRIMARY KEY (id)";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}
$name = $_POST['artname'];
$desc = $_POST['artdesc'];
$img = $_POST['artimg'];
$approved = 0;

$result = mysqli_query($con, "SELECT MAX(id) AS MAXID FROM articles");
$row = mysqli_fetch_array($result);

$id = $row["MAXID"]+1;

$reg = "insert into articles(id, name, image, description, approved) values ('$id','$name','$img','$desc','$approved')";
mysqli_query($con,$reg);

echo "<h3 style='font-family:Segoe UI;'>Article Submitted for Review <i class='fa fa-check-circle-o' aria-hidden='true'></i></h3>";
echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";