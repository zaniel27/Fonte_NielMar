<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == "administrator"){  // galing database yung administrator
    echo "<div class ='message success'> Welcome ".$_SESSION['UserLogin'], "</div><br/> <br/>";
}else{
    echo header("Location: index.php");
}

include_once("Connections/connection.php");

$con = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM patient_list WHERE id = '$id'";
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
    <form action="delete.php" method="post">


        <div class="button-container">
            <a href ="index.php"> <-Back</a>   
            <a href ="edit.php?ID=<?php echo $row['id'];?>">Edit</a>

        <?php if($_SESSION['Access'] == "administrator"){?>
        <button type="submit" name="delete" class="button-danger">Delete</button>
            <?php } ?>

        </div>

        <input type="hidden" name="ID" value="<?php echo $row['id'];?>" >
    </form>

    <table>
    <thead>
        <tr>
            <th>First Name</TH>
            <th>Last Name</TH>
            <th>Middle Name</TH>
            <th>Birthday</TH>
            <th>Sex</TH>
        </tr>
    </thead>
        <tr> 
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['middle_name']; ?></td>
            <td><?php echo $row['birthday']; ?></td>
            <td><?php echo $row['sex']; ?></td>
            
        </tr>
    </table>
    <BR></BR>
    <BR></BR>
    <BR></BR>
    <TAble>
    <THEad>
        <tr>
            <th>Contact Number</th>
            <th>Street</th>
            <th>Barangay</th>
            <th>City/Municipality</th>
            <th>Province</th>
            <th>Added at</TH>
        </tr>        
    </THEad>
            <td><?php echo $row['contact_number']; ?></td>
            <td><?php echo $row['address_street']; ?></td>
            <td><?php echo $row['address_brgy']; ?></td>
            <td><?php echo $row['address_citymuni']; ?></td>
            <td><?php echo $row['address_province']; ?></td>
            <td><?php echo $row['added_at']; ?></td>
    </TAble>

</body>
</html>