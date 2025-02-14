<?php 

include_once("Connections/connection.php");
$con = connection();

if(isset($_POST['delete'])){

    $id = $_POST['ID'];
    $sql = "DELETE FROM patient_list where ID = '$id'";
    $con->query($sql) or die ($con->error);

    echo header ("location: index.php?ID=.$id");
}