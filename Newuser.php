<?php 
session_start();
if(isset($_GET['name'])){
    $servername = "localhost";
   $username = "root";
   $password = "sanyam@123";
   $dbname = "lampdb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $x=$_GET['name'];
    $sql = "UPDATE login SET registered=1 WHERE name='$x'";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $sql = "insert into login_data values('','','$x');";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
    header("location:index2.php");
}
?>
