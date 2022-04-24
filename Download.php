<?php
session_start();
?>
<?php
try{
$x=$_SESSION["name"];
$f = fopen("$x.csv", 'w');
$servername = "localhost";
$username = "root";
$password = "sanyam@123";
$dbname = "lampdb";
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * from login_data where name='$x';";
$result = $conn->query($sql);
$data=array();
$i=1;
$data[0]=array("name","Academic Details","Academic Skills");
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()) {
    $data[$i]=array($row['name'],$row['academic_details'],$row['academic_skills']);
    $i++;
  }
} else {
  echo "0 results";
}
$conn->close();
foreach ($data as $row) {
  fputcsv($f, $row);
}
fclose($f);}
header("location:index.php");}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
