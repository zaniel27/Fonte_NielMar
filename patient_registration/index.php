<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo "<div class = 'message success'> welcome ".$_SESSION['UserLogin'].'</div>';
}else{
    echo "<div class = 'message info'> welcome Guest. </div>";
}

include_once("Connections/connection.php");

$con = connection();
$sql = "SELECT * from patient_list ORDER BY id DESC";
$patients = $con->query($sql) or die ($con->error);
$row = $patients->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="wrapper">
    <h1>Patient Registration Sytem</h1>
    <br/>
    <br/>


    <div class="search-container">
        <form action="result.php" method="get">
            <input type = "text" name = "search" id="search" class="search-input">
            <button type="submit" class="search-button"> Search </button>
        </form>
    </div>

<div class="button-container">
    <?php if(isset($_SESSION['UserLogin'])){?>
    <a href="logout.php">Logout</a>
    <?php } else{ ?>
        <a href="login.php">Login</a>
    <?php } ?>
        <a href="add.php">Add New</a>
</div>
    <table>  
        <thead>
        <tr>
            <th></th>
            <th>First Name</TH>
            <th>Last Name</TH>
        </tr>
        </thead>
        <tbody>
        <?php do{ ?>
        <tr>
            <td width="30"><a href = "details.php?ID=<?php echo $row['id'];?>"class="button-small">View </a></td> 
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
        </tr>
        <?php }while($row = $patients->fetch_assoc()) ?>
        </tbody>
    </table>
    </div>
</body>
</html>