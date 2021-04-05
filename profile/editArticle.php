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
                    <li><a color="white" href="profile.php">Welcome <?php echo $_SESSION['name']; ?></a></li>
                    <?php
                        if($_SESSION['role']=='contributor'){
                            echo "<li><a href='../login-profile/domExpert.php'>Apply for Domain Expert</a></li>";
                            echo "<li><a href='newArticle.php'>New Article</a></li>";
                        }
                        elseif($_SESSION['role']=='domain expert'){
                            echo "<li><a href='removeArticle.php'>Delete Article</a></li>";
                        }
                        ?>
                    <li><a href="../login-profile/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

<?php
$link = $_SERVER['HTTP_HOST'];
$link = $_SERVER['REQUEST_URI'];
$url_components = parse_url($link);
parse_str($url_components['query'], $params);
$id = $params['articleID'];
// echo $id;

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userprofiles');

$sql = "select * from articles where id='$id'";
$records = mysqli_query($con, $sql); 
if($records==''){
    echo "Go back to Home Page!";
}
else{
    while($row = mysqli_fetch_array($records)){
        $name = $row['name'];
        $image = $row['image'];
        $description = $row['description'];
    }
}

$_SESSION['edit_artid']=$id;
$_SESSION['edit_artname']=$name;
$_SESSION['edit_artimg']=$image;
?>

    <div class="container">
        <div class="box">
            <form action="editArticleDatabase.php" method="post">
                <h2 style='text-align: center'>Edit Article</h2>
                
                <h4>Name:</h4>
                <p style='color: #4C8BF5'><?php echo $name; ?></p>
                
                <h4>Original Content:</h4>
                <p style='color: #4C8BF5'><?php echo $description; ?></p>
                
                <br><br>

                <h4>Name:</h4>
                <input type='text' name="artname" class="form-control" placeholder="<?php echo $name; ?>" readonly>
                
                <h4>ID:</h4>
                <input type='text' name="artid" class="form-control" placeholder="<?php echo $id; ?>" readonly>

                <h4>New Content:</h4>
                <textarea name="artdesc" rows="10" class="form-control"></textarea>
                
                <button class="btn btn-danger" type="submit">Submit</button>
            </form>
        </div>
    </div>

	</body>
</html>