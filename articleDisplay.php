
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
    background: #3A1C71;  
    background: -webkit-linear-gradient(to left, #FFAF7B, #D76D77, #3A1C71);  
    background: linear-gradient(to left, #FFAF7B, #D76D77, #3A1C71);
    font-family: GothamBold;
}
.box{
    background-color: lightgrey;
    border-radius: 10px;
    width: 100%;
    padding: 10px;
    box-shadow: 5px 10px 8px #D76D77;
}
@font-face {
    font-family: GothamBold;
    src: url(fonts/Gotham-Font/Gotham-Bold.otf);
}

.art-name{
    padding-bottom: 30px;
}
</style>
</head>
<body>
<?php
$link = $_SERVER['HTTP_HOST'];
$link = $_SERVER['REQUEST_URI'];
// echo $link;
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
?>


<div class="container">
    <div class="box">
        <div class="row">
            <div class="col-md-8">
                <h1 class="art-name"><?php echo $name; ?></h1>
                <p><?php echo $description; ?></p>
            </div>
            <div class="col-md-4">
                <img class="art-name" src="<?php echo $image; ?>">
            </div>
        </div>
    </div>
</div>
</body>
</html>