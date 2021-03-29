<?php
session_start();
if(empty($_SESSION['logged_in'])){
    echo "You are not logged in. <a href='login.html'>Click here</a> to login";
    exit(1);
}
?>
<html>
    <head>
    <title>Profile Page</title>
    </head>
    <body>
        <div class="logout" style="float:right;">
            <button id="log" type="submit"><a href="logout.php">Logout</a></button>
        </div>

        <div class="left">
            <?php
                 echo "<h2>Welcome ",$_SESSION['name'],"</h2>"; 
            ?>
        </div>   
	</body>
</html>