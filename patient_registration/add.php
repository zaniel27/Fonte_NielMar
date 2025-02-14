<?php

include_once("Connections/connection.php");
$con = connection();

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


    $sql = "INSERT INTO `patient_list`(`first_name`, `last_name`, `middle_name`, `birthday`, `sex`, `contact_number`, `address_street`, `address_brgy`, `address_citymuni`, `address_province`) VALUES ('$firstname', '$lastname', '$middlename', '$bday', '$sex', '$contnum', ' $street', '$brgy', '$citymuni', ' $province')";
    $con->query($sql) or die ($con->error);

    echo header ("location: index.php");
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
        <input type="text" name="FirstName" id="FirstName" required placeholder= "Enter First Name">
       
        <label>Last Name</label>
        <input type="text" name="LastName" id="LastName" required placeholder= "Enter Last Name">

        <label>Middle Name</label>
        <input type="text" name="MiddleName" id="MiddleName" required placeholder= "Enter Middle Name">

        <label>Birthday</label>
        <input type="varchar" name="Birthday" id="Birthday" required placeholder= "Enter Birthday">

        <label>Sex</label>
            <select name="Sex" id="Sex" required>
            <option value="">--Select Sex--</option>
            <option value = "Male">Male</option>
            <option value = "Female">Female</option>
        </select>

        <label>Contact Number</label>
        <input type="varchar" name="ContactNumber" id="ContactNumber" required placeholder= "Enter Contact Number">

        <label>Street</label>
        <input type= "varchar" name="AddressStreet" id="AddressStreet" required placeholder= "Enter Street">

        <label>Barangay</label>
        <input type="varchar" name="AddressBarangay" id="AddressBarangay" required placeholder= "Enter Barangay">

        <label>City/Municipality</label>
        <input type="varchar" name="AddressCity/Municipality" id="AddressCity/Municipality" required placeholder= "Enter City/Municipality">

        <label>Province</label>
        <input type="varchar" name="Province" id="Province" required placeholder= "Enter Province">


        <input type="submit" name="submit" value="Submit form">

</form>
</div>
        <div class="button-container">
             <a href = "index.php"> Back </a>
        </div>
</body>
</html>