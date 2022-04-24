<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newstyle.css">
    <title>Home Page</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['name'])){
$x=$_SESSION['name'];
$y=$_SESSION['user'];
echo "<center><h1>My name is $x and my enrollment number is $y</h1><br>";

echo "<form action='update.php?name=$x' method='get'><input type='submit' value='Your Portfolio'></form>";
echo "<form action='download.php?name=$x' method='get'><input type='submit' value='Download'></form>";
include 'navigation.php';
echo "</center><br><br>";}
?>
<?php include 'footer.php' ?>
</body>
</html>
