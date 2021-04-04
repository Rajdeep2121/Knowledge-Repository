<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Knowledge Repository</title>
    <style>
body{
    font-family: GothamBold;
    /* background-color:lightgrey; */
}
h1{
    padding: 20px;
    text-align: center;
    font-size: 50px;
    font-weight: bold;
    font-family: GothamBold;
}

@font-face {
    font-family: GothamBold;
    src: url(fonts/Gotham-Font/Gotham-Bold.otf);
}

.headercontainer{
    background-image: url(images/2964941.jpg);
    background-position: right bottom;
    /* background: #0F2027;  
    background: -webkit-linear-gradient(to top, #2C5364, #203A43, #0F2027); 
    background: linear-gradient(to top, #2C5364, #203A43, #0F2027); */
    border-radius: 0 0 320px 320px;
    color: whitesmoke;
    margin-top: -20px;
    width: 100%;
    height: 300px;
    padding: 1px;
    margin-bottom: 100px;
}

input[type="text"]{
    padding: 5px;
    width: 50%;
    color: black;
}

.searchcontainer{
    text-align: center;
}

button[type="submit"]{
    border-radius: 0;
    width: 100px;
    border: 1px solid black;
    background-color: black;
    padding: 10px;
    color: white;
}
button[type="submit"]:hover{
    background-color: white;
    border: 1px solid white;
    color: black;
    transition: 0.4s ease-out;
}
#article-card{
    text-align: center; 
    /* padding: 10px; */
    border: 1px solid lightgrey;
    transition: 1s ease-out;
    margin-bottom: 20px;
    justify-content: space-around;
}
#article-card:hover{
    cursor: pointer;
    color: white;
    background-image: url(images/a.jpg);
}
img{
    padding-top: 12px;
}
.article-container{
    margin-bottom: 40px;
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
                <a href="index.php" id="sitehead" class="navbar-brand">Knowledge Repository</a>
            </div>
            <div class="collapse navbar-collapse" id="myNav">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a color="white" href="index.php">Home</a></li>
                    <li><a color="white" href="login-profile/login.html">Login | Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="headercontainer">
        <h1>KNOWLEDGE REPOSITORY</h1>
        <br><br>
        <div class="searchcontainer">
            <!-- <form action="search/search.php" method="POST">
                <input type="text" name="searchbar" id="searchbar" placeholder="Search Articles">
                <br><br>
                <button type="submit">Search <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form> -->
            <input type="text" placeholder="Search Article" id="searchbar">
            <button type="submit" onclick="onClick()">Search <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>
    

    <div class="article-container">
        <div class="article-heading"><h3 style='text-align: center;'><b>ARTICLES  <i class="fa fa-list-alt" aria-hidden="true"></i></b></h3></div><br><br>
<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$sql = "select * from articles where approved=1";
$records = mysqli_query($con, $sql);
if($records==''){
    echo "No Articles to show!!";
}
else{
    while($row = mysqli_fetch_array($records)){
        $temp = $row['id'];
        $link = "articleDisplay.php?articleID=".$temp; 
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
}

?>
    </div>

<script>
function onClick(){
    var searchQuery = document.getElementById("searchbar");
    console.log(searchQuery.innerHTML);
}
</script>
</body>
</html>