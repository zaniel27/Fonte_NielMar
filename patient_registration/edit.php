<?php

include_once("Connections/connection.php");
$con = connection();
$id = $_GET['ID'];

$sql = "SELECT * FROM patient_list WHERE id = '$id'";
$patients = $con->query($sql) or die ($con->error);
$row = $patients->fetch_assoc();

if(isset($_POST['submit'])){
    $firstname = $_POST['FirstName'];
    $lastname = $_POST['LastName'];
    $middlename = $_POST['MiddleName'];
    $bday = $_POST['Birthday'];
    $sex = $_POST['Sex'];
    $contnum = $_POST['ContactNumber'];
    $street =  $_POST['AddressStreet'];
    $brgy =  $_POST['AddressBarangay'];
    $citymuni =  $_POST['AddressCity/Municipality'];
    $province =  $_POST['Province'];

    $sql = "UPDATE patient_list SET first_name = '$firstname', last_name = '$lastname', middle_name = '$middlename', birthday = '$bday'
    , sex = '$sex', contact_number = '$contnum', address_street = '$street', address_brgy = '$brgy', address_citymuni = '$citymuni',address_province = '$province' WHERE id = '$id'";
    $con->query($sql) or die ($con->error);

    echo header ("location: index.php?ID=.$id");            
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
<body>
    
<div class="add-container">
    <form action="" method="post">
        <label>First Name</label>
        <input type="text" name="FirstName" id="FirstName" value ="<?php echo $row['first_name'];?>">
       
        <label>Last Name</label>
        <input type="text" name="LastName" id="LastName" value ="<?php echo $row['last_name'];?>">

        <label>Middle Name</label>
        <input type="text" name="MiddleName" id="MiddleName" value ="<?php echo $row['middle_name'];?>">

        <label>Birthday</label>
        <input type="varchar" name="Birthday" id="Birthday" value ="<?php echo $row['birthday'];?>">

        <label>Sex</label>
        <select name="Sex" id="sex">
            <option value="Male" <?php echo ($row['sex'] == "Male")? 'Selected' : '';?>>Male </option>
            <option value="Female" <?php echo ($row['sex'] == "Female")? 'Selected' : '';?>>Female </option>
        </select>

        <label>Contact Number</label>
        <input type="varchar" name="ContactNumber" id="ContactNumber" value ="<?php echo $row['contact_number'];?>">

        <label>Street</label>
        <input type="varchar" name="AddressStreet" id="AddressStreet" value ="<?php echo $row['address_street'];?>">

        <label>Barangay</label>
        <input type="varchar" name="AddressBarangay" id="AddressBarangay" value ="<?php echo $row['address_brgy'];?>">

        <label>City/Municipality</label>
        <input type="varchar" name="AddressCity/Municipality" id="AddressCity/Municipality" value ="<?php echo $row['address_citymuni'];?>">

        <label>Province</label>
        <input type="varchar" name="Province" id="Province" value ="<?php echo $row['address_province'];?>">

        <input type="submit" name="submit" value="Update">
        
    </form>
    </div>
        <div class="button-container">
             <a href = "index.php"> Back </a>
        </div>
</body>
</html>