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
    font-family: ProximaNova;
}
h1{
    padding: 20px;
    text-align: center;
    font-size: 70px;
    font-weight: bold;
    /* font-family: ProximaNova; */
}

@font-face {
    font-family: GothamBold;
    src: url(fonts/Gotham-Font/Gotham-Bold.otf);
}
@font-face {
    font-family: ProximaNova;
    src: url(fonts/ProximaNovaBold.otf);
}

.headercontainer{
    background-image: url(images/jonathan-adams-0m-cPyH_WDU-unsplash.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    box-shadow: inset 0 0 20em 5em #000;

    background-position: center ;
    color: whitesmoke;
    margin-top: -20px;
    width: 100%;
    height: 500px;
    padding: 30px;
    margin-bottom: 50px;
}

input[type="text"]{
    padding: 15px;
    height: 50px;
    border-radius: 5px;
    width: 50%;
    border: none;
    color: black;
}

.searchcontainer{
    text-align: center;
}

button[type="submit"]{
    border-radius: 0;
    width: 100px;
    border: 1px solid #4c8bf5;
    border-radius: 15px;
    background-color: #4c8bf5;
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
    border: 1px solid lightgrey;
    transition: 0.5s ease-out;
    margin-bottom: 20px;
    justify-content: space-around;
    height: 200px;
    /* margin-right:10px; */
}
#article-card:hover{
    cursor: pointer;
    /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */
    color: white;
    background-color: #15202b;
}
img{
    padding-top: 12px;
}
.article-container{
    margin-bottom: 40px;
    width: 80%;
    margin: 0 10%;
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
        <h1 style='font-family: GothamBold; font-size: 70px;color: white'>Knowledge Repository</h1>
        <br><br>
        <div class="searchcontainer">
            <input type="text" placeholder="Search Article" id="searchbar"><br><br>
            <button type="submit" onclick="searchQuery()" id="searchBtn">Search <i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
    </div>
    

    <div class="article-container">
        <div class="article-heading"><h3 style='text-align: center;padding-bottom: 10px;'><b>Start Reading...</b></h3></div>
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
var input=document.getElementById("searchbar");
input.addEventListener("keyup", function(event) {
    if(event.keyCode===13){
        event.preventDefault();
        document.getElementById("searchBtn").click();
    }
});
function searchQuery() {
    var query=document.getElementById("searchbar").value;
    var searchLink = "search/search.php?q="+query;
    window.location.href=searchLink;
}

</script>
</body>
</html>