<?php

    function connection(){

       $host = "localhost";
       $username = "root";
       $password = "0427";
       $database = "patient_registration";
      
       $con = new mysqli($host, $username, $password, $database);
      
      if($con->connect_error){
              echo $con->connect_error;
      } else{
       return $con;
      }
    }