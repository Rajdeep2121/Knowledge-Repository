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
button{
    margin: 20px 20px 20px 0px;
}
body{
    /* background-color: black;  */
    background: linear-gradient(to right, #F8CDDA, #1D2B64); 
}
.box{
    border: 1px solid white;
    border-radius: 10px;
    /* margin-left: 300px; */
    padding: 30px;
    /* width: 700px; */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    background-color: white;
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
                    <li><a color="white" href="profile.php">Home</a></li>
                    <li><a href="../login-profile/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
   
    <div class="container">
        <div class="box">
            <form action="deleteArticleFromDatabase.php" method="POST">
                <h2 style='text-align: center'>Delete Article <i class="fa fa-minus-circle" aria-hidden="true"></i></h2>
                <h4>Name:</h4>
                <input name="artname" class="form-control">
                
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

	</body>
</html>