<?php
session_start();
if(isset($_SESSION['user'])){
   $servername = "localhost";
   $username = "root";
   $password = "sanyam@123";
   $dbname = "lampdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
$user=$_SESSION["user"];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    if($row['email']==$user)
    {
      echo "<center><u><h1>Ishita Goyal-----E20CSE153</h1></u>";
      echo "Firstname is ".$row['firstname']."<br>";
      echo "Lastname is ".$row['lastname']."<br>";
      echo "Email is ".$row['email']."<br>";
      echo "Birthday is ".$row['birthday']."<br>";
      echo "Password is ".$row['pass']."<br>";
      break;
    }
   }
}
    else
    {
        echo "NO DATA!!";
    }
$conn->close();
}
echo "<form action='logout.php'><input type='submit' value='Logout'></form>";
?>
