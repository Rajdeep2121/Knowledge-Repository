<?php
session_start();
if(empty($_SESSION['logged_in'])){
    echo "You are not logged in. <a href='../login-profile/login.html'>Click here</a> to login";
    exit(1);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Profile Page</title>
    <style>
body{
    font-family: GothamBold;
}
@font-face {
    font-family: GothamBold;
    src: url(../fonts/Gotham-Font/Gotham-Bold.otf);
}
#article-card{
    text-align: center; 
    /* padding: 10px; */
    border: 1px solid lightgrey;
    transition: 0.5s ease-out;
    margin-bottom: 20px;
}
#article-card:hover{
    cursor: pointer;
    color: white;
    background-color: teal;
    /* background-image: url(../images/a.jpg); */
}
img{
    padding-top: 12px;
}
.article-container{
    margin-bottom: 40px;
}
#approvebtn, #approvebtn{
    margin: 10px;
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
                    <li><a color="white" href="profile.php">Welcome <?php echo $_SESSION['name']; ?></a></li>
                    <li><a href="../login-profile/logout.php">Logout</a></li>
                    <?php
                        if($_SESSION['role']=='contributor'){
                            echo "<li><a href='../login-profile/domExpert.php'>Apply for Domain Expert</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
   
<?php

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

if($_SESSION['role']=='domain expert'){
    echo "<h2 class='page-header'>Articles To Be Approved!</h2>";
    $sql = "select * from articles where approved=0";
    $records = mysqli_query($con, $sql);
    if($records==''){
        echo "All articles have been approved by Domain Experts!!";
    }
    else{
        while($row=mysqli_fetch_array($records)){
            $temp = $row['id'];
            $link = "../articleDisplay.php?articleID=".$temp; 
            echo "<div class='col-md-4' id='article-card'>";
            echo "<div class='row'>";
            echo "<div class='col-md-8'><h3>".$row['name']."</h3>";
            $subString=$row['description'];
            $subString=substr($subString, 0, 150);
            echo "<p style='text-align: left; font-family: Arial; font-size: 15px'>".$subString."...</p>";
            echo "<button class='btn btn-primary' id='read' onclick=\"window.location.href='$link'\" >Read</button>";
            echo "<button class='btn btn-success' id='approvebtn' onclick=\"window.location.href='approveArticle.php?articleID=$temp'\" >Approve</button></div>";
            echo "<div class='col-md-4'><img src=".$row['image']." width='100' height='auto'></div>";
            echo "</div>";
            echo "</div>";
        }
    }
}
elseif($_SESSION['role']=='contributor'){
    // echo 2;
    echo "<h2 style='text-align: center'> Articles to Read <i class='fa fa-list-alt' aria-hidden='true'></i></h2><br><br>";
    $sql = "select * from articles where approved=1";
    $records = mysqli_query($con, $sql);
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
}

?>
	</body>
</html>