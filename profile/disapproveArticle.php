<?php
session_start();

$link = $_SERVER['HTTP_HOST'];
$link = $_SERVER['REQUEST_URI'];

$url_components = parse_url($link);
parse_str($url_components['query'], $params);
$id = (int) $params['articleID'];

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$s = "delete from articles where id='$id'";
$result = mysqli_query($con,$s);

if(mysqli_num_rows($result)==1 || $result==1){
    echo "<script>setTimeout(\"location.href = 'profile.php';\",2000);</script>";
    header('location:profile.php');
}
else{
    echo "<h3 style='font-family:Segoe UI;'>Error</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
?>