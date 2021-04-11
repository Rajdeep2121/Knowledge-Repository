
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
body{
    font-family: GothamBold;
    
    background: #44A08D;  
    background: -webkit-linear-gradient(to right, #093637, #44A08D); 
    background: linear-gradient(to right, #093637, #44A08D); 
}

@font-face {
    font-family: GothamBold;
    src: url(../fonts/Gotham-Font/Gotham-Bold.otf);
}
#article-card{
    /* margin: 1px; */
    text-align: center; 
    height: 200px;
    border: 1px solid lightgrey;
    transition: 0.5s ease-out;
    margin-bottom: 20px;
    background-color: white;
}
.container{
    width: 80%;
}
#article-card:hover{
    cursor: pointer;
    color: white;
    background-color: #15202b;
}
img{
    padding-top: 12px;
}
#searchHeader{
    padding: 20px;
    text-align: center; 
    background-color: whitesmoke;
}
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../index.php" id="sitehead" class="navbar-brand">Knowledge Repository</a>
            </div>
            <div class="collapse navbar-collapse" id="myNav">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a color="white" href="../index.php">Home</a></li>
                    <li><a color="white" href="../login-profile/login.html">Login | Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php
$link = $_SERVER['HTTP_HOST'];
$link = $_SERVER['REQUEST_URI'];

$url_components = parse_url($link);
parse_str($url_components['query'], $params);
$name = $params['q'];

echo "<div class='col-md-12'>";
echo "<h3 id='searchHeader'> Search results for <i>'".$name."'</i></h3>";
echo "</div>";

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$sql = "select * from articles where name like '%$name%' and approved=1";
$records = mysqli_query($con, $sql);
if($records==''){
    echo "No Articles to show!!";
}
else{
    echo "<div class='container'>";
    while($row = mysqli_fetch_array($records)){
        $temp = $row['id'];
        $link = "../articleDisplay.php?articleID=".$temp; 
        echo "<div class='col-md-4' id='article-card' onclick=\"window.location.href='$link'\">";
        echo "<div class='row'>";
        echo "<div class='col-md-8'><h3>".$row['name']."</h3>";
        $subString=$row['description'];
        $subString=substr($subString, 0, 150);
        echo "<p style='text-align: left; font-family: Arial; font-size: 15px'>".$subString."...</p></div>";
        echo "<div class='col-md-4'><img src=".$row['image']." width='100' height='auto'></div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
}

?>

</body>
</html>