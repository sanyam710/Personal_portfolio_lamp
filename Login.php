    <!DOCTYPE html>
    <html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="newstyle.css">
    </head>
    <body>
    <?php require 'header.php' ?>

    <table id="qwer" border=1 cellspacing=10 cellpadding=25>
            <tr>
                <td>
                    <div class="login-page">
                        <div id="form-wrapper">
                            <div class="login">
                                <div class="login-header">
                                    
                                </div>
                            </div>
                            <form action="" method='post'>
                                <h1>Login</h1><br>
                                Name:<br><input type="text" name="name" id="name"><br><br>
                                Password:<br><input type="password" name="user" id="user"><br><br>
                                <input type="submit" value="Login">
                            </form>
                            </div>
                    </div>
                </td>
            
            </tr> 
        </table>
        <div>
        <form action="register.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="submit" value="Register">
    </form>
    </div>
    <?php
    session_start();
    if(isset($_POST['user'])){
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
    $sql = "SELECT * from login;";
    $result = $conn->query($sql);
    $f=0;
    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        if($row['name']==$name && $row['user']==$user && $row['registered']==1){
            $f=1;
            break;
        }
        if($row['name']==$name && $row['user']==$user && $row['registered']==2){
        $f=2;
        break;
    }
    }
    if($f==2){
    $_SESSION['name']=$name;
    $_SESSION['user']=$user; 
    header("location:index2.php");
    }
    elseif($f==1){
    $_SESSION['name']=$name;
    $_SESSION['user']=$user;
    header("location:index.php");
    }
    else{
        echo "Invalid Login";
    }}
    else {
    echo "No Login Data";
    }
    $conn->close();
    }
    ?>
    <?php include 'footer.php' ?>
    </body>
    </html>
