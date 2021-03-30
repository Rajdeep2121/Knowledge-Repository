<?php
session_start();
if(empty($_SESSION['logged_in'])){
    echo "You are not logged in. <a href='login.html'>Click here</a> to login";
    exit(1);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Profile Page</title>
    <style>
*{
    font-family: GothamBold;
}
@font-face {
    font-family: GothamBold;
    src: url(../fonts/Gotham-Font/Gotham-Bold.otf);
}

.headercontainer{
    /* background: -webkit-linear-gradient(360deg,#224e4d 10%,#083023 360%);  */
    /* background: linear-gradient(360deg,#224e4d 10%,#083023 360%); */
    background: #C04848;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #480048, #C04848);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #480048, #C04848); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border-radius: 0 0 50% 50%;
    color: whitesmoke;
    margin-top: -20px;
    width: 100%;
    height: 300px;
    padding: 1px;
    margin-bottom: 5x;
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
    /* margin-bottom: 20px; */
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
h1{
    padding: 20px;
    text-align: center;
    font-size: 50px;
    font-weight: bold;
    font-family: GothamBold;
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
                <a href="index.html" id="sitehead" class="navbar-brand">Knowledge Repository</a>
            </div>
            <div class="collapse navbar-collapse" id="myNav">
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a color="white" href="profile.php">Welcome <?php echo $_SESSION['name']; ?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                        if($_SESSION['role']=='contributor'){
                            echo "<li><a href='domExpert.php'>Apply for Domain Expert</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="headercontainer">
        <h1>KNOWLEDGE REPOSITORY</h1>
        <br><br>
        <div class="searchcontainer">
            <form action="../search/search.php" method="GET">
                <input type="text" name="searchbar" id="searchbar" placeholder="Search Articles">
                <br><br>
                <button type="submit">Search <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </form>
        </div>
    </div>
   
	</body>
</html>