<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
    <center>
    <h1>Update Your Portfolio</h1>
    <form action="" method="post">
    
<?php
session_start();
    $servername = "localhost";
    $username = "root";
    $password = "sanyam@123";
    $dbname = "lampdb";
    $x=$_SESSION["name"];
    if($x=="admin"){
        $x=$_GET["name"];
    }
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="select * from login_data where name='$x'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
          $de=$row['academic_details'];
          $sk=$row['academic_skills'];
          
        }
        echo "Academic Details <input type='text' value='$de' name='acad_d' id='acad_d'><br><br>Academic Skills <input type='text' value='$sk' name='acad_sk' id='acad_s'><br><br><input type='submit' value='update'></form>";
      }
    
if(isset($_POST['acad_d'])){
    $acad_d=$_POST["acad_d"];
    $acad_sk=$_POST["acad_sk"];
    $sql = "UPDATE login_data set academic_details='$acad_d',academic_skills='$acad_sk' WHERE name='$x'";
    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    
    $conn->close();
    if($_SESSION["name"]=="admin")
    header("location:index2.php");
    else
    header("location:index.php");
}
?>
</center>
</body>
</html>
