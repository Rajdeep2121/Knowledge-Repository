<?php
session_start();

$link = $_SERVER['HTTP_HOST'];
$link = $_SERVER['REQUEST_URI'];
// echo $link;
$url_components = parse_url($link);
parse_str($url_components['query'], $params);
$id = (int) $params['articleID'];

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$s = "update articles set approved=1 where id=$id";
$result = mysqli_query($con,$s);
echo $result;
$num = mysqli_num_rows($result);
echo $num;
if(mysqli_num_rows($result)==1 || $result==1){
    echo "<script>setTimeout(\"location.href = 'profile.php';\",20000);</script>";
    header('location:profile.php');
    // echo "1";
}
else{
    echo $num;
    echo "<h3 style='font-family:Segoe UI;'>Error</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
?>