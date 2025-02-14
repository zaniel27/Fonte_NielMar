<?php
 
 if(!isset($_SESSION)){
    session_start();
}

include_once("Connections/connection.php");
$con = connection();


if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_account WHERE username = '$username' AND password = '$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;

    if($total > 0) {
        $_SESSION['UserLogin'] = $row ['username'];
        $_SESSION ['Access'] = $row['access'];  
        echo header ("location: index.php"); 
    }else{ 
        echo "<div class='Message warning'> No user found. </div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="css/style.css">


</head>
<body id="formlogin">

    <div class="login-container">
        <h2> Patient Registraion</h2>
        <h2> Login Page</h2>
        <br>

        <!-- <div class="form-logo">
            <img src="img/DOH_LOGO.png" alt="">
        </div> -->
        
        <form action="" method="post">

        <div class="form-element">
            <label>Username</Label>
            <input type="username" name="username" id="username" autocomplete="off" placeholder="Enter Username" required>
        </div>

        <div class="form-element">
            <label>Password</Label>
            <input type="password" name="password" id="password" autocomplete="off" placeholder="Enter Password" Required>
        </div>

        <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>

