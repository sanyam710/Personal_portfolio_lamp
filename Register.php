<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<center>
<?php 
session_start();  
session_destroy();
?>
<?php require 'config.php' ?>
<form action="" method=POST> 
  <div class="container">
    <h1>Register</h1>
    <p>Create your account, its free and it only takes a minute.</p>
    <input type="text" placeholder="Name" name="name" id="name" required>
    <input type="password" placeholder="Password" name="user" id="user" required>
    <button type="submit" class="registerbtn">Register Now</button>
  </div>
</form>

<?php 
if(isset($_POST['name'])){
    $servername = "localhost";
    $username = "root";
    $password = "sanyam@123";
    $dbname = "lampdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $name=$_POST['name'];
    $user=$_POST['user'];
    $sql="select * from login;";
    $result = $conn->query($sql);
    $x=$result->num_rows+1;
    $sql = "insert into login values($x,'$name','$user',0);";
    $result = $conn->query($sql);
    $conn->close();
    $to =$name+"@gmail.com" ;
    $subject = "Account registered";
    $txt = "Your account is registered. Wait for reply from admin.";
    $headers = "From: sanyambothra3@gmail.com" . "\r\n";
    mail($to,$subject,$txt,$headers);
    header("location:login.php");
}
?>
<p id="last">Already have an account? <a href="login.php">Sign in</a>.</p>
</center>
</body>
</html>
